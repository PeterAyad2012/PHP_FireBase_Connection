<?php
    session_start();
    include('dbconf.php');

    if(isset($_POST['update'])){
        $user_id = $_POST['user_id'];
        $party_id = $_POST['party_id'];
        $seats = $_POST['seats'];
        $err_seat = array();
        $err_flag=0;
        
        if(count($seats)>0){
            $get_location = $party_id;
            $get_reserved = $database->getReference($get_location)->getValue();
            $get_reserved_seats = array();
            if($get_reserved > 0){
                foreach($get_reserved as $rkey => $rrow){
                    if($rrow['reserved']==true){
                        array_push($get_reserved_seats,$rkey);
                    }
                }                     
            }
            
            foreach($seats as $check_seat){
                if (in_array($check_seat, $get_reserved_seats)) {
                    $_SESSION['status'] = 'One or more of wanted seats are already reserved, Please try again';
                    header('Location: index.php?id='.$user_id.'err=3');
                    exit();
                }
            }
            
            foreach($seats as $seat){
                $updateData = [
                    'user_id'=>$user_id,
                    'reserved'=>true,
                ];

                $table = $party_id.'/'.$seat;
                $updateq = $database->getReference($table)->update($updateData);

                if($updateq){
                    
                }else{
                    $err_flag=1;
                    array_push($err_seat,$seat);
                }
            }
        }else{
            $_SESSION['status'] = 'There is no selected seats to reserve';
            header('Location: index.php?id='.$user_id.'err=2');
            exit();
        }
        
        if($err_flag==1){
            $err_st = implode(", ", $err_seat);
            $_SESSION['status'] = 'Seats No. '.$err_st.' cannot be reserved, Please try again';
            header('Location: index.php?id='.$user_id.'err=1');
            exit();
        }else{
            $_SESSION['status'] = 'The requsted seats has reserved successfully';
            header('Location: index.php?id='.$user_id.'err=0');
            exit();
        }
    }
?>