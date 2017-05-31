
<?php 

    include "delete_modal.php";

    if(isset($_POST['checkBoxArray'])){
        foreach($_POST['checkBoxArray'] as $post_id_update){
            $options = $_POST['bulkOption'];
            switch($options){
                case 'publish':
                    $qry = "UPDATE posts SET post_status = 'published' WHERE post_id = {$post_id_update}";
                    $update_posts_bulk_publish = mysqli_query($connect, $qry);
                    break;
                case 'draft':
                    $qry = "UPDATE posts SET post_status = 'draft' WHERE post_id = {$post_id_update}";
                    $update_posts_bulk_draft = mysqli_query($connect, $qry);
                    break;
                case 'delete':
                    $qry = "DELETE FROM posts WHERE post_id = {$post_id_update}";
                    $delete_posts_bulk = mysqli_query($connect, $qry);
                    break;
                case 'clone':
                    $qry = "SELECT * FROM posts WHERE post_id = {$post_id_update}";
                    $clone_posts_bulk = mysqli_query($connect, $qry);

                    while($row = mysqli_fetch_array($clone_posts_bulk)){
                        $post_author = $row['post_author'];
                        $post_title = $row['post_title'];
                        $post_category_id = $row['post_category_id'];
                        $post_status = $row['post_status'];
                        $post_image = $row['post_image'];
                        $post_tags = $row['post_tags'];
                        $post_date = $row['post_date'];
                        $post_content = $row['post_content'];
                    }

                    $query = "INSERT INTO posts( ";
                    $query .= "         post_category_id, post_title, post_author, post_date, post_image, "; 
                    $query .= "         post_content, post_tags, post_status ";
                    $query .= "      ) ";
                    $query .= "VALUES( ";
                    $query .= "         {$post_category_id}, '{$post_title}', '{$post_author}', {$post_date}, "; 
                    $query .= "        '{$post_image}', '{$post_content}', '{$post_tags}', "; 
                    $query .= "        '{$post_status}' ";
                    $query .= "      ) ";
                    $copy_post_query = mysqli_query($connect, $query);
                    confirm($copy_post_query);

                    break;
                default:
                    break;
            }
        }
    }

?>

<form action="" method="post">
    <div class="row" style="margin-bottom: 20px">
        <div id="bulkOptionsContainer" class="col-xs-4">
            <select class="form-control" name="bulkOption" id="">
                <option value="">Select Options...</option>
                <option value="publish">Publish</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
                <option value="clone">Clone</option>
            </select>
        </div>

        <div class="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
        </div>
    </div>

    <table class="table table-bordered table-hover">

        <thead>
            <tr>
                <th><input id='selectAllBoxes' type='checkbox'></th>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
                <th>Views</th>
                <th>Edit</th>
                <th>Remove?</th>
            </tr>
        </thead>

        <tbody>

            <?php 

                $query = "SELECT * FROM posts ORDER BY post_id DESC";
                $select_posts = mysqli_query($connect, $query);

                while($row = mysqli_fetch_assoc($select_posts)){

                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_user = $row['post_user'];
                    $post_title = $row['post_title'];
                    $post_category_id = $row['post_category_id'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_date = $row['post_date'];
                    $post_views = $row['post_views'];

                    $query =  "SELECT * FROM categories";
                    $query .= " WHERE cat_id = {$post_category_id}";

                    $select_categories_id = mysqli_query($connect, $query);

                    while($row = mysqli_fetch_assoc($select_categories_id)){
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                    }

                    $qry = "SELECT * FROM comments WHERE comment_post_id = $post_id";
                    $get_comment = mysqli_query($connect, $qry);
                    $comments = mysqli_fetch_array($get_comment);
                    $comment_id = $row['comment_id'];
                    $count_comments = mysqli_num_rows($get_comment);

                    if($post_author == NULL){
                        $qry_author = "SELECT * FROM users WHERE user_id = {$post_user}";
                        $get_user = mysqli_query($connect, $qry_author);
                        $row = mysqli_fetch_assoc($get_user);
                        $post_author = $row['user_name'];
                    }

                    echo "<tr>";
                    echo "<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='{$post_id}'></td>";
                    echo "<td>{$post_id}</td>";
                    echo "<td><a href='../post.php?p_id={$post_id}'>{$post_title}</a></td>";
                    echo "<td>{$post_author}</td>";
                    echo "<td>{$cat_title}</td>";
                    echo "<td>{$post_status}</td>";
                    echo "<td><img src='../images/{$post_image}' width='100' ></td>";
                    echo "<td>{$post_tags}</td>";
                    echo "<td><a href='post_comments.php?id=$post_id'>{$count_comments}</a></td>";
                    echo "<td>{$post_date}</td>";
                    echo "<td><a href='posts.php?reset={$post_id}'>{$post_views}</a></td>";
                    echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                    echo "<td><a class='delete_link' rel='$post_id'' href='javascript:void(0)'>Delete</a></td>";
                    echo "</tr>";

                }

            ?>

        </tbody>

    </table>

</form>


<?php
    if(isset($_GET['delete'])){
        $del_post_id = $_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id = {$del_post_id}";
        $delete_qry = mysqli_query($connect, $query);
        header("Location: posts.php");
    }

    if(isset($_GET['reset'])){
        $reset_views = $_GET['reset'];
        $query = "UPDATE posts SET post_views = 0 WHERE post_id = {$reset_views}";
        $reset_qry = mysqli_query($connect, $query);
        header("Location: posts.php");
    }
?>

<script>
    
$(document).ready(function(){

    $(".delete_link").on('click', function(){
        var id = $(this).attr("rel");
        var delete_url = "posts.php?delete=" + id;
        $(".modal_delete_link").attr("href", delete_url);
        $("#myModal").modal('show');
    });

});

</script>
