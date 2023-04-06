<?php 
    session_start();
    include('dbconf.php');

    if(isset($_GET['id'])){
        $delete_id = $_GET['id'];

        $table = 'Contacts/'.$delete_id;
        $deleteRes = $database->getReference($table)->remove();

        if($deleteRes){
            $_SESSION['status'] = 'Deleted';
            header('Location: index.php');
            exit();
        }else{
            $_SESSION['status'] = 'Does Not Deleted';
            header('Location: index.php');
            exit();
        }
    }
?>