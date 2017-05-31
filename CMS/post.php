<?php 
    
    include "includes/db.php";
    include "includes/header.php"; 
    include "includes/nav.php";

?>
    
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <!-- First Blog Post -->
                <?php 

                    if(isset($_GET['p_id'])){
                        $p_id = $_GET['p_id'];
                    }
                    else{
                        header("Location: index.php");
                    }

                    $add_view = "UPDATE posts SET post_views = post_views + 1 WHERE post_id = {$p_id}";
                    $update_view = mysqli_query($connect, $add_view);

                    $query = "SELECT * FROM posts WHERE post_id = {$p_id}";
                    $select_all_posts_query = mysqli_query($connect, $query);

                    while($row = mysqli_fetch_assoc($select_all_posts_query)){

                        $post_title = $row['post_title'];
                        $post_author = $row['post_user'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];

                        ?>

                        <h2>
                            <a href="#"><?php echo $post_title; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="author.php?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                        <hr>
                        <p><?php echo $post_content; ?></p>
                        <hr>

                        <?php

                    }

                ?>

                 <!-- Comments Form -->

                 <?php 
                    if(isset($_POST['create_comment'])){
                        $p_id = $_GET['p_id'];
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment = $_POST['comment'];

                        if(!empty($comment_author) && !empty($comment_email) && !empty($comment)){
                            $qry  = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
                            $qry .= " VALUES({$p_id}, '{$comment_author}', '{$comment_email}', '{$comment}', 'unapproved', now())";
                            $submit_comment = mysqli_query($connect, $qry);
                            
                            if(!$submit_comment){
                                die("Failed to create comment: " . mysqli_error($connect));
                            }

                            /*$qry  = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                            $qry .= "WHERE post_id = {$p_id}";
                            $submit_comment = mysqli_query($connect, $qry);
                            */
                            if(!$submit_comment){
                                die("Failed to update comment count: " . mysqli_error($connect));
                            }
                        }
                        else{
                            echo "<script>alert('Fields can not be empty')</script>";
                        }

                    }
                 ?>

                <div class="well">
                    <h4>Leave a Comment</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <label for="comment_author">Name</label>
                            <input type="text" name="comment_author" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="comment_email">Email</label>
                            <input type="email" name="comment_email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" rows="3" name="comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php 

                    $qry  = "SELECT * FROM comments WHERE comment_post_id = {$p_id} ";
                    $qry .= "AND comment_status = 'approved' "; 
                    $qry .= "ORDER BY comment_id DESC";

                    $comment_qry = mysqli_query($connect, $qry);
                    if(!$comment_qry){
                        die("Failed to load comments: " . mysqli_error($connect));
                    }

                    while($row = mysqli_fetch_array($comment_qry)){
                        $comment_date = $row['comment_date'];
                        $comment_content = $row['comment_content'];
                        $comment_author = $row['comment_author'];
                        ?>
                        <div class="media">
                            <a class="pull-left" href="#">
                                <!--<img class="media-object" src="http://placehold.it/64x64" alt="">-->
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $comment_author; ?>
                                    <small><?php echo $comment_date; ?></small>
                                </h4>
                                <?php echo $comment_content; ?>
                            </div>
                        </div>
                    <?php    
                    }

                ?>


                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>


<?php include "includes/footer.php"; ?>
