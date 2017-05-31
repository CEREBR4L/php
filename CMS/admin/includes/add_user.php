
<?php 
    if(isset($_POST['create_user'])){

        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];

        $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

        //$user_img = $_FILES['user_image']['name'];
        //$user_img_temp = $_FILES['user_image']['tmp_name'];
        //move_uploaded_file($post_img_temp, "../images/$post_img");

        $query = "INSERT INTO users( ";
        $query .= "         user_name, user_password, user_firstname, user_lastname, "; 
        $query .= "         user_email, user_role ";
        $query .= "      ) ";
        $query .= "VALUES( ";
        $query .= "         '{$user_name}', '{$user_password}', '{$user_firstname}', "; 
        $query .= "         '{$user_lastname}', '{$user_email}', '{$user_role}' "; 
        $query .= "      ) ";

        $create_user_query = mysqli_query($connect, $query);
        confirm($create_user_query);
        echo "<div class='alert alert-success'><strong>User created successfully</strong> <a href='users.php'>Return to view all users.</a></div>";
        //header("Location: users.php");
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
            <option value="">Select Role...</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
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

