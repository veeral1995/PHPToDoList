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
    All Items (Even Those Previosuly Marked As Completed):
</h2>

<?php
session_start();

    $usrSession = $_SESSION['username'];

    db();
    global $link;

    $query = "SELECT idtodoList, title, description, priority, completed FROM COURSEWORK.todoList WHERE username = '$usrSession' ";
    $result = mysqli_query($link, $query);

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
        <button type="button"><a href="delete.php?idtodoList=<?php echo $idtodoList ?>">Delete</a></button>
    </ul>
<?php
    }
?>

<button type="submit"><a href="main_page.php">Back To Home Page</a></button>
</body>
</html>
