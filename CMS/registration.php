<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

    <?php 

        $msg = "";
    
        if(isset($_POST['submit'])){

            if(empty($username) || empty($password) || empty($email)){
                $msg = "<div class='alert alert-danger'><strong>Please fill in all the fields.</strong></div>";
            }
            else{
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email    = $_POST['email'];

                $username = mysqli_real_escape_string($connect, $username);
                $password = mysqli_real_escape_string($connect, $password);
                $email    = mysqli_real_escape_string($connect, $email);


                $qry = "SELECT user_randSalt FROM users";
                $get_salt = mysqli_query($connect, $qry);
                if(!$get_salt){
                    die("Query failed to get salt: " . mysqli_error($connect));
                }

                while($row = mysqli_fetch_array($get_salt)){
                    $salt = $row['user_randSalt'];

                    $qry  = "INSERT INTO users(user_name, user_email, user_password, user_role) ";
                    $qry .= "VALUES('{$username}', '{$email}', '{$password}', 'subscriber')";
                    $reg_user = mysqli_query($connect, $qry);
                    if(!$reg_user){
                        die("Failed to register user: " . mysqli_error($connect) . ' ' . mysqli_errno($connect));
                    }
                }

                $msg = "<div class='alert alert-success'><strong>User registered!</strong></div>";
            }

        }
    
    ?>

    <!-- Navigation -->
    
    <?php  include "includes/nav.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <?php echo $msg; ?>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
