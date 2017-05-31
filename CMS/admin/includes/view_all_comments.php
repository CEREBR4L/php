
<table class="table table-bordered table-hover">

    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Email</th>
            <th>Post</th>
            <th>Comment</th>
            <th>Date</th>
            <th>Status</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>
    </thead>

    <tbody>

        <?php 

            $query = "SELECT * FROM comments";
            $select_comments = mysqli_query($connect, $query);

            while($row = mysqli_fetch_assoc($select_comments)){

                $comment_id = $row['comment_id'];
                $comment_author = $row['comment_author'];
                $comment_email = $row['comment_email'];
                $comment_post_id = $row['comment_post_id'];
                $comment_content = $row['comment_content'];
                $comment_date = $row['comment_date'];
                $comment_status = $row['comment_status'];

                $query =  "SELECT * FROM posts ";
                $query .= " WHERE post_id = {$comment_post_id} ";
                $select_posts_id = mysqli_query($connect, $query);
                $row = mysqli_fetch_assoc($select_posts_id);
                $post_title = $row['post_title'];


                echo "<tr>";
                echo "<td>{$comment_id}</td>";
                echo "<td>{$comment_author}</td>";
                echo "<td>{$comment_email}</td>";
                echo "<td><a href='../post.php?p_id={$comment_post_id}'>{$post_title}</a></td>";
                echo "<td>{$comment_content}</td>";
                echo "<td>{$comment_date}</td>";
                echo "<td>{$comment_status}</td>";
                echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
                echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
                echo "<td><a href='comments.php?edit={$comment_id}'>Edit</a></td>";
                echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
                echo "</tr>";

            }

        ?>

    </tbody>

</table>


<?php
    if(isset($_GET['delete'])){
        $del_comment_id = $_GET['delete'];
        $query = "DELETE FROM comments WHERE comment_id = {$del_comment_id}";
        $delete_qry = mysqli_query($connect, $query);
        header("Location: comments.php");
    }

    if(isset($_GET['approve'])){
        $app_comment_id = $_GET['approve'];
        $query = "UPDATE comments SET  comment_status = 'approved' WHERE comment_id = {$app_comment_id}";
        $approve_qry = mysqli_query($connect, $query);
        header("Location: comments.php");
    }

    if(isset($_GET['unapprove'])){
        $upapp_comment_id = $_GET['unapprove'];
        $query = "UPDATE comments SET  comment_status = 'unapproved' WHERE comment_id = {$upapp_comment_id}";
        $unapprove_qry = mysqli_query($connect, $query);
        header("Location: comments.php");
    }
?>
