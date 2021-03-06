<?php

    require 'classes/connect.php';

    $database = new Database;

    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if(isset($_POST['submit'])){

        $title = $post['title'];
        $body = $post['body'];

        $database->query('INSERT INTO posts (title, body) VALUES(:title, :body)');
        $database->bind(':title', $title);
        $database->bind(':body', $body);
        $database->execute();
        
        if($database->lastInsertId()){
            echo "<p>Post added</p>";
        }

    }

    $database->query('SELECT * FROM posts');
    //$database->bind(':id', 2);
    $rows = $database->resultsSet();

?>

    <h1>Add Post</h1>

    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <label for="title">Title</label><br />
        <input type="text" name="title" placeholder="The Story..." /> <br /><br />
        <label for="body">Body</label> <br />
        <textarea name="body" cols="100"></textarea> <br /><br />
        <input type="submit" name="submit" value="Submit" />
    </form>

<?php
    
    foreach($rows as $row){
        echo "<h1>" . $row['title'] . "</h1>";
        echo "<p>" . $row['body'] . "</p>";
    }

?>
