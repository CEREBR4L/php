
<?php
    if(isset($_GET['u_id'])){
        $u_id = $_GET['u_id'];

        $qry_user = "SELECT * FROM users WHERE user_id = {$u_id}";
        $get_user_query = mysqli_query($connect, $qry_user);

        while($row = mysqli_fetch_assoc($get_user_query)){

            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_password = $row['user_password'];
            $user_img = $row['user_img'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
        }
    }

    if(isset($_POST['update_user'])){

        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];

        //$user_img = $_FILES['user_image']['name'];
        //$user_img_temp = $_FILES['user_image']['tmp_name'];
        //move_uploaded_file($post_img_temp, "../images/$post_img");

        $qry = "SELECT user_randSalt FROM users";
        $get_salt = mysqli_query($connect, $qry);

        if(!$get_salt){
            die("Query failed to get salt: " . mysqli_error($connect));
        }

        $row = mysqli_fetch_array($get_salt);
        $salt = $row['user_randSalt'];
        $crypt_password = crypt($user_password, $salt);

        $query  = "UPDATE users SET ";
        $query .= " user_name = '{$user_name}', "; 
        $query .= " user_password = '{$crypt_password}', "; 
        $query .= " user_firstname = '{$user_firstname}', "; 
        $query .= " user_lastname = '{$user_lastname}', "; 
        $query .= " user_email = '{$user_email}', "; 
        $query .= " user_role = '{$user_role}' "; 
        $query .= " WHERE user_id = {$u_id} ";

        $update_user_query = mysqli_query($connect, $query);
        confirm($update_user_query);
        echo "<div class='alert alert-success'><strong>Users Updated Successfully.</strong> <a href='users.php'>Return to view all users?</a></div>";
    }
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_name">Username</label>
        <input type="text" class="form-control" name="user_name" value="<?php echo $user_name; ?>">    
    </div>

    <div class="form-group">
        <label for="user_password">User Password</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">    
    </div>

    <div class="form-group">
        <label for="user_email">User Email</label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">    
    </div>

    <div class="form-group">
        <label for="user_role">User Role</label>
        <br>
        <select name="user_role" id="" class="form-control">
            <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
            <?php 
                if($user_role == 'admin'){
                    echo "<option value='subscriber'>Subscriber</option>";
                }
                else{
                    echo "<option value='admin'>Admin</option>";
                }
            ?>
        </select>     
    </div>

    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">    
    </div>

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">    
    </div>

    <!--<div class="form-group">
        <label for="post_image">User Image</label>
        <input type="file" name="post_image">    
    </div>-->

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_user" value="Edit User">    
    </div>

</form>

