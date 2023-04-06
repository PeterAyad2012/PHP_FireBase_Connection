<script>
    <?php
        function get_reserved($party_id){
            include('dbconf.php');
            $table = $party_id;
            $fetchdata = $database->getReference($table)->getValue();
            $reserved_seats = array();
            if($fetchdata > 0){
                foreach($fetchdata as $dkey => $drow){
                    if($drow['reserved']==true){
                        array_push($reserved_seats,$dkey);
                    }
                }                     
            }
            $reserved_s = json_encode($reserved_seats); 
            return $reserved_s;
        }
    
    
        if(isset($_GET['clear'])&&$_GET['clear']==1){
            include('dbconf.php');
            $table_id = 'party1';
            $user_id = '';
            $reserved = false;
            $allseats = $database->getReference($table_id)->getValue();
            $updateData = [
                            'user_id'=>$user_id,
                            'reserved'=>$reserved,
                        ];
            foreach($allseats as $seat_id => $seat_data){
                $current_seat = $table_id.'/'.$seat_id;
                $updateq = $database->getReference($current_seat)->update($updateData);
            }
        }
    ?>
</script>