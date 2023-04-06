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
?>