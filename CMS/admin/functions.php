<?php 

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
