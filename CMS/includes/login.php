
<?php 
    ob_start();
    session_start(); 
    include "db.php";
    include "../admin/functions.php";

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        loginUser($username, $password);
    }
?>
