<script>
    function get_reserved(party_id){
        <?php
            include('dbconf.php');
            $table = 'Contacts';
            $fetchdata = $database->getReference($table)->getValue();
            ?>
                var reserved_seats = [];
            <?php
            if($fetchdata > 0){
                foreach($fetchdata as $dkey => $drow){
                    if($drow['f']){
                    ?>
                        reserved_seats.push('<?=$drow['l']?>')
                    <?php
                    }
                }                     
            }
        ?>
        return reserved_seats;
    }
    
    function set_reserved(user_id, party_id, seats){
        
    }
</script>