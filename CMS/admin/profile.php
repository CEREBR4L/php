<?php include "includes/admin_header.php"; ?>

<?php 

    if(isset($_SESSION['username'])){
       $username = $_SESSION['username'];
       $qry_get_user = "SELECT * FROM users WHERE user_name = '{$username}'";
       $get_user_query = mysqli_query($connect, $qry_get_user);

       while($row = mysqli_fetch_array($get_user_query)){

            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_password'];
            $user_password = $row['user_role'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
        }
    }

?>

    <div id="wrapper">
        <?php include "includes/admin_nav.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Profile
                            <small>Manage your profile</small>
                        </h1>

                        
                        <?php
                            if(isset($_POST['update_user'])){

                                $user_name = $_POST['user_name'];
                                $user_password = $_POST['user_password'];
                                $user_firstname = $_POST['user_firstname'];
                                $user_lastname = $_POST['user_lastname'];
                                $user_email = $_POST['user_email'];
                                $user_role = $_POST['user_role'];

                                $query  = "UPDATE users SET ";
                                $query .= " user_name = '{$user_name}', "; 
                                $query .= " user_password = '{$user_password}', "; 
                                $query .= " user_firstname = '{$user_firstname}', "; 
                                $query .= " user_lastname = '{$user_lastname}', "; 
                                $query .= " user_email = '{$user_email}', "; 
                                $query .= " user_role = '{$user_role}' "; 
                                $query .= " WHERE user_id = {$u_id} ";

                                $update_user_query = mysqli_query($connect, $query);
                                confirm($update_user_query);
                                header("Location: users.php");
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
                                <input class="btn btn-primary" type="submit" name="update_user" value="Update Profile">    
                            </div>

                        </form>


        
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>
