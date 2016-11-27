<?php

    require 'classes/connect.php';

    $database = new Database;

    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if(isset($_POST['delete'])){

        $delete_id = $_POST['delete_id'];

        $database->query('DELETE FROM posts WHERE id = :id');
        $database->bind(':id', $delete_id);
        $database->execute();

    }

    if(isset($_POST['submit'])){

        $id = $post['id'];
        $title = $post['title'];
        $body = $post['body'];

        $database->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
        $database->bind(':id', $id);
        $database->bind(':title', $title);
        $database->bind(':body', $body);
        $database->execute();
        
        
    }

    $database->query('SELECT * FROM posts');
    //$database->bind(':id', 2);
    $rows = $database->resultsSet();

?>

    <h1>Add Post</h1>

    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <label for="title">Post ID</label><br />
        <input type="text" name="id" placeholder="ID..." /> <br /><br />
        <label for="title">Title</label><br />
        <input type="text" name="title" placeholder="The Story..." /> <br /><br />
        <label for="body">Body</label> <br />
        <textarea name="body" cols="100"></textarea> <br /><br />
        <input type="submit" name="submit" value="Submit" />
    </form>

<?php
    
    foreach($rows as $row){
        echo "<h1>" . $row['title'] . "</h1>";
        echo "<p>" . $row['body'] . "</p>"; ?>

        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
            <input type="submit" name="delete" value="Delete">
        </form>

        <?php
    }

?>
