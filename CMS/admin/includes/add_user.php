
<?php 
    if(isset($_POST['create_post'])){

        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_img = $row['user_img'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];

        $post_img = $_FILES['post_image']['name'];
        $post_img_temp = $_FILES['post_image']['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');

        move_uploaded_file($post_img_temp, "../images/$post_img");

        $query = "INSERT INTO posts( ";
        $query .= "         post_category_id, post_title, post_author, post_date, post_image, "; 
        $query .= "         post_content, post_tags, post_status ";
        $query .= "      ) ";
        $query .= "VALUES( ";
        $query .= "         {$post_category}, '{$post_title}', '{$post_author}', now(), "; 
        $query .= "        '{$post_img}', '{$post_content}', '{$post_tags}', "; 
        $query .= "        '{$post_status}' ";
        $query .= "      ) ";

        $create_post_query = mysqli_query($connect, $query);
        confirm($create_post_query);
    }
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Username</label>
        <input type="text" class="form-control" name="title">    
    </div>

    <div class="form-group">
        <label for="post_tags">User Password</label>
        <input type="password" class="form-control" name="post_tags">    
    </div>

    <div class="form-group">
        <label for="user_role">User Role</label>
        <br>
        <select name="user_role" id="" class="form-control">
            <?php 
                $qry = "SELECT * FROM users";
                $select_roles = mysqli_query($connect, $qry);
                confirm($select_roles);

                while($row = mysqli_fetch_assoc($select_roles)){
                    $user_id = $row['user_id'];
                    $user_role = $row['user_role'];

                    echo "<option value='{$user_id}'>{$user_role}</option>";
                }
            ?>
        </select>     
    </div>

    <div class="form-group">
        <label for="author">Firstname</label>
        <input type="text" class="form-control" name="author">    
    </div>

    <div class="form-group">
        <label for="post_status">Lastname</label>
        <input type="text" class="form-control" name="post_status">    
    </div>

    <!--<div class="form-group">
        <label for="post_image">User Image</label>
        <input type="file" name="post_image">    
    </div>-->

    <div class="form-group">
        <label for="post_tags">User Email</label>
        <input type="email" class="form-control" name="post_tags">    
    </div>

    

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">    
    </div>

</form>

