<?php

require_once "db_connect.php";
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    db();
    global $link;
    $query = "SELECT todoTitle, todoDescription, date FROM todo WHERE id = '$id'";
    $result = mysqli_query($link, $query);
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        if($row){
            $title = $row['todoTitle'];
            $description = $row['todoDescription'];
            $date = $row['date'];

            echo "
            <h1>$title</h1>
            <h3>description</h3>
            <h1>$description</h1>
            <h3>$date</h3>
            ";
        }
    }else{
        echo 'no To-do';
    }
}
?>
<br><br>
<button type='submit'><a href='index.php' style='text-decoration:none'>List of my To-do</a></button>