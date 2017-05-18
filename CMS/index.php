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

                    $query = "SELECT * FROM posts WHERE post_status = 'published'";
                    $select_all_posts_query = mysqli_query($connect, $query);
                    if(mysqli_num_rows($select_all_posts_query) == 0){
                        echo "<h1>No Posts here!</h1>";
                    }
                    while($row = mysqli_fetch_assoc($select_all_posts_query)){

                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'], 0, 200);
                        $post_status = $row['post_status'];

                        ?>

                        <h2>
                            <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                        <hr>
                        <a href="post.php?p_id=<?php echo $post_id; ?>">
                            <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                        </a>
                        <hr>
                        <p><?php echo $post_content; ?>...</p>
                        <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>

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
