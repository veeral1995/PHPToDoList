<?php
session_start();
include('header.php');
require_once "db_connection.php";

$usrSession = $_SESSION['username'];
if(isset($_GET['idtodoList'])) {
    $idtodoList = $_GET['idtodoList'];
    db();
    global $link;
    $query = "SELECT title, description, priority, completed FROM COURSEWORK.todoList WHERE idtodoList = '$idtodoList' AND username = '$usrSession' ";
    $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        if($row){
            $title = $row['title'];
            $description = $row['description'];
            $priority = $row['priority'];
            $completed = $row['completed'];
            if($completed = 0){
              $status = 'Not Completed';
            }
            else{
              $status = 'Completed';
            }
            echo "
            <h2>Title: $title</h2>
            <p>Description: $description</p>
            <p>Priority: $priority</p>
            <p>Task Status: $status</p>
            ";
        }
    else{
        echo 'No Data Available';
    }


}
?>
<html>
<body id="body_bg">

<button type="submit"><a href="main_page.php">Back To Home Page</a></button>
</body>
</html>
