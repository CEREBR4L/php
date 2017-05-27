
<?php 

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
            </select>
        </div>

        <div class="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a href="add_post.php" class="btn btn-primary">Add New</a>
        </div>
    </div>

    <table class="table table-bordered table-hover">

        <thead>
            <tr>
                <th>Select</th>
                <th>ID</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
                <th>Edit</th>
                <th>Remove?</th>
            </tr>
        </thead>

        <tbody>

            <?php 

                $query = "SELECT * FROM posts";
                $select_posts = mysqli_query($connect, $query);

                while($row = mysqli_fetch_assoc($select_posts)){

                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_category_id = $row['post_category_id'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_date = $row['post_date'];

                    $query =  "SELECT * FROM categories";
                    $query .= " WHERE cat_id = {$post_category_id}";

                    $select_categories_id = mysqli_query($connect, $query);

                    while($row = mysqli_fetch_assoc($select_categories_id)){
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                    }

                    echo "<tr>";
                    echo "<td><input id='select_post_boxes' type='checkbox' name='checkBoxArray[]' value='{$post_id}'></td>";
                    echo "<td>{$post_id}</td>";
                    echo "<td>{$post_author}</td>";
                    echo "<td>{$post_title}</td>";
                    echo "<td>{$cat_title}</td>";
                    echo "<td>{$post_status}</td>";
                    echo "<td><img src='../images/{$post_image}' width='100' ></td>";
                    echo "<td>{$post_tags}</td>";
                    echo "<td>{$post_comment_count}</td>";
                    echo "<td>{$post_date}</td>";
                    echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                    echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
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
?>
