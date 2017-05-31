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

?>
