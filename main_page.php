<?php
include('header.php');
require_once("db_connection.php");
?>

<html>
<head>
    <title>My To Do List</title>
</head>
<link rel="stylesheet" type="text/css" href="CSS/style.css">
<body id="body_bg">
<h2>
    Remaining Items:
</h2>

<?php
session_start();


db();
global $link;

$usrSession = $_SESSION['username'];

$query  = "SELECT idtodoList, title, description, priority, completed FROM COURSEWORK.todoList WHERE username = '$usrSession' AND completed = 0";
$result = mysqli_query($link, $query);
//check if there's any data inside the table
if(mysqli_num_rows($result) >= 1){
    while($row = mysqli_fetch_array($result)){
        $idtodoList = $row['idtodoList'];
        $title = $row['title'];
        $priority = $row['priority'];
        $description = $row['description'];
        $completed = $row['completed'];
        ?>

    <ul>
        <li><a href="viewAll.php?idtodoList=<?php echo $idtodoList?>"><?php echo $title ?></a></li>
        <button type="button"><a href="modify.php?idtodoList=<?php echo $idtodoList ?>">Modify</a></button>
        <button type="button"><a href="completed.php?idtodoList=<?php echo $idtodoList ?>">Mark As Complete</a></button>
        <button type="button"><a href="delete.php?idtodoList=<?php echo $idtodoList ?>">Delete</a></button>
    </ul>
<?php
    }
}

?>
<br>
<br>
<p><a href="showCompleted.php">View All Items</a></p>

</body>
</html>
