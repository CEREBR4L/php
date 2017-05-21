
<?php 

    include "db.php"; 

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
            echo $user_id = $row['user_id'];
        }

    }


?>
