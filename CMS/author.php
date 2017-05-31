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
                        $author = $_GET['author'];
                    }

                    $query = "SELECT * FROM posts WHERE post_user = '{$author}'";
                    $select_all_posts_query = mysqli_query($connect, $query);

                    echo "<h1>All posts by {$author}!</h1>";

                    while($row = mysqli_fetch_assoc($select_all_posts_query)){

                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];

                        ?>

                        <h2>
                            <a href="#"><?php echo $post_title; ?></a>
                        </h2>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                        <hr>
                        <p><?php echo $post_content; ?></p>
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
