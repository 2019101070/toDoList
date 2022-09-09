<?php

require_once 'db_connect.php';
if(isset($_POST['submit'])) {
    $title = $_POST['todoTitle'];
    $description = $_POST['todoDescription']; 

    // check strings
    function check($string){
        $string  = htmlspecialchars($string);
        $string = strip_tags($string);
        $string = trim($string);
        $string = stripslashes($string);
        return $string;
    }

    // check for empty title
    if(empty($title)){
        $error  = true;
        $titleErrorMsg = "Title cannot be empty";
    }
    // check for empty description
    if(empty($description)){
        $error = true;
        $descriptionErrorMsg = "Description cannot be empty";
    }

    // connect to database
    db();
    global $link;
    $query = "INSERT INTO todo(todoTitle, todoDescription, date) VALUES ('$title', '$description', now() )";
    $insertTodo = mysqli_query($link, $query);
    if($insertTodo){
        echo "You added a new To-do";
    }else{
        echo mysqli_error($link);
    }

}
?>


<html>
<head>
    <title>Create a To-do list</title>
</head>
<body>
<h1>Create To-do List</h1>
<button type="submit"><a href="index.php" style='text-decoration:none'>View all To-do</a></button>
<form method="post" action="create.php">
    <p>To-do title: </p>
    <input name="todoTitle" type="text">
    <p>To-do description: </p>
    <input name="todoDescription" type="text">
    <br><br>
    <input type="submit" name="submit" value="submit">
</form>
</body>
</html>