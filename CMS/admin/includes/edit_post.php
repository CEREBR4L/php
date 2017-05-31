<?php
    
    if(isset($_GET['p_id'])){
        $p_id = $_GET['p_id'];
    }

    $query = "SELECT * FROM posts WHERE post_id = $p_id";
    $select_posts_by_id = mysqli_query($connect, $query);

    while($row = mysqli_fetch_assoc($select_posts_by_id)){

                $post_id = $row['post_id'];
                $post_user = $row['post_user'];
                $post_title = $row['post_title'];
                $post_category_id = $row['post_category_id'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_tags = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
                $post_date = $row['post_date'];
                $post_text = $row['post_content'];
    }

    if(isset($_POST['update_post'])){
        
        $title = $_POST['title'];
        $post_category = $_POST['post_category'];
        $post_user = $_POST['post_user'];
        $post_status = $_POST['post_status'];
        $post_img = $_FILES['post_image']['name'];
        $post_img_temp = $_FILES['post_image']['tmp_name'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        
        move_uploaded_file($post_img_temp, "../images/$post_img");

        if(empty($post_img)){
            $query = "SELECT * FROM posts WHERE post_id = $p_id";
            $get_img = mysqli_query($connect, $query);
            while($row = mysqli_fetch_array($get_img)){ $post_img = $row['post_image']; }
        }

        $query =  "UPDATE posts SET ";
        $query .= "post_title = '{$title}', "; 
        $query .= "post_user = '{$post_user}', "; 
        $query .= "post_category_id = '{$post_category}', "; 
        $query .= "post_date = now(), "; 
        $query .= "post_status = '{$post_status}', "; 
        $query .= "post_tags = '{$post_tags}', "; 
        $query .= "post_content = '{$post_content}', "; 
        $query .= "post_image = '{$post_img}' "; 
        $query .= "WHERE post_id = {$p_id} "; 
        
        $update_post_query = mysqli_query($connect, $query);
        confirm($update_post_query);
        echo "<div class='alert alert-success'><strong>Post Updated Successfully.</strong> <a href='posts.php'>Return to view all posts?</a></div>";
        

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
        <select name="post_category" id="" class="form-control">
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
        <label for="post_user">Post Author</label>
        <br>
        <select name="post_user" id="" class="form-control">
            <?php 
                $qry = "SELECT * FROM users";
                $select_users = mysqli_query($connect, $qry);
                confirm($select_users);
                while($row = mysqli_fetch_assoc($select_users)){
                    $user_id = $row['user_id'];
                    $user_name = $row['user_name'];

                    echo "<option value='{$user_id}'>{$user_name}</option>";
                }
            ?>
        </select>          
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select name="post_status" id="" class="form-control">
            <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
            <?php 
                if($post_status == 'draft'){
                    echo "<option value='published'>Published</option>";
                }
                else{
                    echo "<option value='draft'>Draft</option>";
                }
            ?>
        </select>        
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <br>
        <img width="300px" src="../images/<?php echo $post_image; ?>" alt="img">
        <input type="file" name="post_image">      
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">    
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" col="30" rows="10"><?php echo $post_text; ?></textarea>    
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Submit Post">    
    </div>

</form>




