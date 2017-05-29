<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

    <?php 
    
        if(isset($_POST['submit'])){
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
                echo $salt = $row['user_randSalt'];
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
