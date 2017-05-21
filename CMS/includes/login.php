
<?php 

    include "db.php";
    session_start(); 

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $username = mysqli_real_escape_string($connect, $username);
        $password = mysqli_real_escape_string($connect, $password);

        $qry = "SELECT * FROM users WHERE user_name = '{$username}'";
        $find_user = mysqli_query($connect, $qry);
        
        if(!$find_user){
            die("Failed to find user: " . mysqli_error($connect));
        }

        while($row = mysqli_fetch_array($find_user)){
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_role = $row['user_role'];
        }

        if($username !== $user_name && $password !== $user_password){
            header("Location: ../index.php");
        }
        else if($username == $user_name && $password == $user_password){
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $user_name;
            $_SESSION['user_role'] = $user_role;
            $_SESSION['user_firstname'] = $user_firstname;
            $_SESSION['user_lastname'] = $user_lastname;
            header("Location: ../admin/");
        }
        else{
            header("Location: ../index.php");
        }

    }


?>
