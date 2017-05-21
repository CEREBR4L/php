
<?php 

    session_start(); 

    $_SESSION['user_id'] = null;
    $_SESSION['username'] = null;
    $_SESSION['user_role'] = null;
    $_SESSION['user_firstname'] = null;
    $_SESSION['user_lastname'] = null;

    header("Location: ../index.php");

?>
