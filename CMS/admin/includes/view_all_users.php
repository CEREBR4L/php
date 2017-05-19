
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
                echo "<td><a href='users.php?edit={$user_id}'>Edit</a></td>";
                echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                echo "</tr>";

            }

        ?>

    </tbody>

</table>


<?php
    if(isset($_GET['delete'])){
        $del_user_id = $_GET['delete'];
        $query = "DELETE FROM users WHERE user_id = {$del_user_id}";
        $delete_qry = mysqli_query($connect, $query);
        header("Location: users.php");
    }
?>
