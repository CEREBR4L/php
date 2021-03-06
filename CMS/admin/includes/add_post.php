
<?php 
    if(isset($_POST['create_post'])){
        $post_title = $_POST['title'];
        $post_author = $_POST['post_user'];
        $post_category = $_POST['post_category'];
        $post_status = $_POST['post_status'];

        $post_img = $_FILES['post_image']['name'];
        $post_img_temp = $_FILES['post_image']['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');

        move_uploaded_file($post_img_temp, "../images/$post_img");

        $query = "INSERT INTO posts( ";
        $query .= "         post_category_id, post_title, post_user, post_date, post_image, "; 
        $query .= "         post_content, post_tags, post_status ";
        $query .= "      ) ";
        $query .= "VALUES( ";
        $query .= "         {$post_category}, '{$post_title}', '{$post_author}', now(), "; 
        $query .= "        '{$post_img}', '{$post_content}', '{$post_tags}', "; 
        $query .= "        '{$post_status}' ";
        $query .= "      ) ";

        $create_post_query = mysqli_query($connect, $query);
        confirm($create_post_query);
        echo "<div class='alert alert-success'><strong>Post Created Successfully.</strong> <a href='posts.php'>View all post?</a></div>";
    }
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">    
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
            <option value="">Select...</option>
            <option value='published'>Published</option>
            <option value='draft'>Draft</option>
        </select>          
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image">    
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">    
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" col="30" rows="10"></textarea>    
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Submit Post">    
    </div>

</form>

