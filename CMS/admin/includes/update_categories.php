<form action="" method="post">
    
    <div class="form-group">
        
        <label for="cat_title">Category Update</label>

        <?php
            if(isset($_GET['edit'])){

                $cat_id_update = $_GET['edit'];

                $query = "SELECT * FROM categories";
                $query .= "  WHERE cat_id = {$cat_id_update}";

                $select_categories_id = mysqli_query($connect, $query);

                while($row = mysqli_fetch_assoc($select_categories_id)){

                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    ?>

                    <input class="form-control" value="<?php if(isset($cat_title)) echo $cat_title; ?>" type="text" name="cat_title">

                    <?php

                }

            }

            if(isset($_POST['update'])){
                $cat_title_update = $_POST['cat_title'];

                $query = mysqli_prepare($connect, "UPDATE categories SET cat_title = ? WHERE cat_id = ?");
                mysqli_stmt_bind_param($query, 'si', $cat_title_update, $cat_id);
                mysqli_stmt_execute($query);

                if(!$query){
                    die("Error updating this record: " . mysqli_error($connect) ); 
                }

                header("Location: categories.php");
            }

        ?>
        

    </div>

    <div class="form-group">
        
        <input class="btn btn-primary" type="submit" name="update" value="Edit Category">

    </div>
    

</form>

