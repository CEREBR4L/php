
<?php 
    if(isset($_POST['create_user'])){

        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];

        //$user_img = $_FILES['user_image']['name'];
        //$user_img_temp = $_FILES['user_image']['tmp_name'];
        //move_uploaded_file($post_img_temp, "../images/$post_img");

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
        <label for="user_name">Username</label>
        <input type="text" class="form-control" name="user_name">    
    </div>

    <div class="form-group">
        <label for="user_password">User Password</label>
        <input type="password" class="form-control" name="user_password">    
    </div>

    <div class="form-group">
        <label for="user_email">User Email</label>
        <input type="email" class="form-control" name="user_email">    
    </div>

    <div class="form-group">
        <label for="user_role">User Role</label>
        <br>
        <select name="user_role" id="" class="form-control">
            <option value="admin">Select Role...</option>
            <option value="admin">Admin</option>
            <option value="admin">Subscriber</option>
        </select>     
    </div>

    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" class="form-control" name="user_firstname">    
    </div>

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" name="user_lastname">    
    </div>

    <!--<div class="form-group">
        <label for="post_image">User Image</label>
        <input type="file" name="post_image">    
    </div>-->

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">    
    </div>

</form>
