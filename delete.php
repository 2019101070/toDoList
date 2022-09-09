<?php

require_once "db_connect.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    db();
    global $link;
    $query = "DELETE FROM todo WHERE id = '$id'";
    $delete = mysqli_query($link, $query);
    if($delete){
        echo 'To-do successfully deleted!';
    }
}
?>

<br><br>
<button type='submit'><a href='index.php' style='text-decoration:none'>List of my To-do</a></button>
