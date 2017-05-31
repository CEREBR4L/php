<?php 

    function GetRecordCount($table, $where){
        global $connect;
        $qry  = "SELECT * FROM " . $table;
        if($where != ""){
            $qry .= " WHERE " . $where;
        }

        $select = mysqli_query($connect, $qry);
        return mysqli_num_rows($select);
    }

    function usersOnline(){

        if(isset($_GET['onlineusers'])){
            global $connect;
            if(!$connect){
                session_start();
                include("../includes/db.php");
            }

            $session = session_id();
            $time = time();
            $timeout_in_seconds = 60;
            $timeout = $time - $timeout_in_seconds;

            $qry = "SELECT * FROM users_online WHERE session = '$session'";
            $get_online_users = mysqli_query($connect, $qry);
            $online_count = mysqli_num_rows($get_online_users);

            if($online_count == NULL){
                mysqli_query($connect, "INSERT INTO users_online(session, time) VALUES ('$session', '$time')");
            } 
            else{
                mysqli_query($connect, "UPDATE users_online SET time = '$time' WHERE session = '$session')"); 
            }

            $users_online_session = mysqli_query($connect, "SELECT * FROM users_online WHERE time > '$timeout')");
            if($users_online_session){
                echo mysqli_num_rows($users_online_session);
            }
            else{
                echo 0;
            }
        }
    }

    usersOnline();

    function confirm($result){
        global $connect;

        if(!$result){
            die("Query failed: SQL::  " . mysqli_error($connect));
        }
    }

    function insert_categories(){

        global $connect;

        if(isset($_POST['submit'])){

            $cat_title = $_POST['cat_title'];

            if($cat_title == "" || empty($cat_title)){

                echo "Please enter something!";

            }
            else{

                $query  = " INSERT INTO categories(cat_title) ";
                $query .= " VALUES('{$cat_title}') ";

                $create_category = mysqli_query($connect, $query);

                if(!$create_category){

                    die("Error creating category: " . mysqli_error);

                }
            }
        }
    }



    function find_all_categories(){

        global $connect;

        $query = "SELECT * FROM categories";
        $select_categories_sidebar = mysqli_query($connect, $query);

        while($row = mysqli_fetch_assoc($select_categories_sidebar)){

            $cat_title = $row['cat_title'];
            $cat_id = $row['cat_id'];

            echo "<tr>";
            echo "<td>{$cat_id}</td>";
            echo "<td>{$cat_title}</td>";
            echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
            echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
            echo "</tr>";

        }

    }



    function delete_category(){

        global $connect;

        if(isset($_GET['delete'])){

            $cat_id_remove = $_GET['delete'];

            $query  = "DELETE FROM categories ";
            $query .= " WHERE cat_id = {$cat_id_remove}";

            $delete_category = mysqli_query($connect, $query);

            header("Location: categories.php");

        }

    }

    function is_admin($username){
        global $connect;

        $qry = "SELECT user_role FROM users WHERE user_name = '{$username}'";
        $user_role = mysqli_query($connect, $qry);
        confirm($user_role);
        $row = mysqli_fetch_array($user_role);

        if($row['user_role'] == 'admin'){
            return true;
        }

        return false;
    }

    function usernameExists($username){
        global $connect;

        $qry = "SELECT user_name FROM users WHERE user_name = '{$username}'";
        $user_name = mysqli_query($connect, $qry);
        confirm($user_name);

        if(mysqli_num_rows($user_name) > 0){
            return true;
        }

        return false;
    }

    function emailExists($email){
        global $connect;

        $qry = "SELECT user_email FROM users WHERE user_email = '{$email}'";
        $user_email = mysqli_query($connect, $qry);
        confirm($user_email);

        if(mysqli_num_rows($user_email) > 0){
            return true;
        }

        return false;
    }

    function registerUser($username, $password, $email){
        global $connect;

        if(usernameExists($username)){
            return "<div class='alert alert-danger'><strong>Username already exists, please choose another.</strong></div>";
        }
        else if(emailExists($email)){
            return "<div class='alert alert-danger'><strong>Email already in use.</strong></div>";
        }
        else{

            if(empty($username) || empty($password) || empty($email)){
                 return "<div class='alert alert-danger'><strong>Please fill in all the fields.</strong></div>";
            }
            else{
                $username = mysqli_real_escape_string($connect, $username);
                $password = mysqli_real_escape_string($connect, $password);
                $email    = mysqli_real_escape_string($connect, $email);
                $password_hash = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

                $qry  = "INSERT INTO users(user_name, user_email, user_password, user_role) ";
                $qry .= "VALUES('{$username}', '{$email}', '{$password_hash}', 'subscriber')";
                $reg_user = mysqli_query($connect, $qry);
                if(!$reg_user){
                    die("Failed to register user: " . mysqli_error($connect) . ' ' . mysqli_errno($connect));
                }
                else{
                    return "<div class='alert alert-success'><strong>User registered!</strong> <a href='index.php'>Go to homepage...</a></div>";
                }
            }

        }
    }

    function loginUser($username, $password){
        global $connect;

        $username = trim(mysqli_real_escape_string($connect, $username));
        $password = trim(mysqli_real_escape_string($connect, $password));

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
            $user_randSalt = $row['user_randSalt'];
        }

        if(password_verify($password, $user_password)){
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $user_name;
            $_SESSION['user_role'] = $user_role;
            $_SESSION['user_firstname'] = $user_firstname;
            $_SESSION['user_lastname'] = $user_lastname;
            header("Location: /myCMS/admin/");
        }
        else{
            header("Location: /myCMS/index.php");
        }

    }

?>
