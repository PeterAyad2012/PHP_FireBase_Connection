<?php 
    session_start();
    include('dbconf.php');

    if(isset($_POST['save'])){
        $first = $_POST['first'];
        $last = $_POST['last'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        
        $postData = [
            'f'=>$first,
            'l'=>$last,
            'm'=>$email,
            'p'=>$phone,
        ];
        
        $table = 'Contacts';
        $postRes = $database->getReference($table)->push($postData);

        if($postRes){
            $_SESSION['status'] = 'Added';
            header('Location: index.php');
            exit();
        }else{
            $_SESSION['status'] = 'Not Added';
            header('Location: index.php');
            exit();
        }
    }

    if(isset($_POST['update'])){
        $contact_key = $_POST['contact_key'];
        $first = $_POST['first'];
        $last = $_POST['last'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        
        $updateData = [
            'f'=>$first,
            'l'=>$last,
            'm'=>$email,
            'p'=>$phone,
        ];
        
        $table = 'Contacts/'.$contact_key;
        $updateq = $database->getReference($table)->update($updateData);

        if($updateq){
            $_SESSION['status'] = 'updated';
            header('Location: index.php');
            exit();
        }else{
            $_SESSION['status'] = 'does not updated';
            header('Location: index.php');
            exit();
        }
    }
?>