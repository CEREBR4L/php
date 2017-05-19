
<table class="table table-bordered table-hover">

    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>User Img</th>
            <th>User Email</th>
            <th>User Role</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>

        <?php 

            $query = "SELECT * FROM users";
            $select_comments = mysqli_query($connect, $query);

            while($row = mysqli_fetch_assoc($select_comments)){

                $user_id = $row['user_id'];
                $user_name = $row['user_name'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_img = $row['user_img'];
                $user_email = $row['user_email'];
                $user_role = $row['user_role'];

                echo "<tr>";
                echo "<td>{$user_id}</td>";
                echo "<td>{$user_name}</td>";
                echo "<td>{$user_firstname}</td>";
                echo "<td>{$user_lastname}</td>";
                echo "<td>{$user_img}</td>";
                echo "<td>{$user_email}</td>";
                echo "<td>{$user_role}</td>";
                echo "<td><a href='comments.php?edit={$user_id}'>Edit</a></td>";
                echo "<td><a href='comments.php?delete={$user_id}'>Delete</a></td>";
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
