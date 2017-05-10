<?php
    
    if(isset($_GET['p_id'])){
        $p_id = $_GET['p_id'];
    }

    $query = "SELECT * FROM posts WHERE post_id = $p_id";
    $select_posts_by_id = mysqli_query($connect, $query);

    while($row = mysqli_fetch_assoc($select_posts_by_id)){

                $post_id = $row['post_id'];
                $post_author = $row['post_author'];
                $post_title = $row['post_title'];
                $post_category_id = $row['post_category_id'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_tags = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
                $post_date = $row['post_date'];
                $post_text = $row['post_content'];
    }
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">    
    </div>

    <div class="form-group">
        <label for="post_category">Post Category ID</label>
        <br>
        <!--<input value="<?php //echo $post_category_id; ?>" type="text" class="form-control" name="post_category">-->
        <select name="" id="" class="form-control">
            <?php 
                $qry = "SELECT * FROM categories";
                $select_categories = mysqli_query($connect, $qry);
                confirm($select_categories);
                while($row = mysqli_fetch_assoc($select_categories)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
                }
            ?>
        </select>    
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="author">    
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status">    
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <br>
        <img width="300px" src="../images/<?php echo $post_image; ?>" alt="img">   
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">    
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" col="30" rows="10">
            <?php echo $post_text; ?>
        </textarea>    
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Submit Post">    
    </div>

</form>




