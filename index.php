<?php
require_once("db_connect.php");
?>

<html>
<head>
    <title>My To-dos</title>
</head>
<body>
<h2>
    List of my To-do
</h2>
<p><a href="create.php" style='text-decoration:none'>Add To-do</a></p>
<?php
db();
global $link;
$query  = "SELECT id, todoTitle, todoDescription, date FROM todo";
$result = mysqli_query($link, $query);
//check if there's any data inside the table
if(mysqli_num_rows($result) >= 1){
    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $title = $row['todoTitle'];
        $date = $row['date'];

        ?>

    <ul>
        <li><a href="detail.php?id=<?php echo $id?>"><?php echo $title ?></a></li> <?php echo "[[$date]]";?>
        <button type="button"><a href="edit.php?id=<?php echo $id?>" style='text-decoration:none'>Edit</a></button>
        <button type="button"><a href="delete.php?id=<?php echo $id?>" style='text-decoration:none'>Delete</a></button>
    </ul>
<?php
    }
}

?>

</body>
</html>