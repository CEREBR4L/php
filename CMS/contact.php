<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

    <?php 
    
        if(isset($_POST['submit'])){

            $to      = "legitimised@gmail.com";
            $subject = wordwrap($_POST['subject'], 100);
            $body    = $_POST['body'];
            $header  = "From: " . $_POST['email'];

            mail($to, $subject, $body, $header);

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
                <h1>Contact</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                         <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                        <div class="form-group">
                            <label for="subject" class="">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Hello there...">
                        </div>
                         <div class="form-group">
                            <label for="password">Body</label>
                            <textarea name="body" id="body" class="form-control" rows="5"></textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Send Email">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
