<?php
session_start();

$usrSession = $_SESSION['username'];

include('header.php');
require_once("db_connection.php");
if(isset($_GET['idtodoList'])){
    $idtodoList = $_GET['idtodoList'];
    db();
    global $link;
    $query = "SELECT title, description, priority FROM COURSEWORK.todoList WHERE idtodoList = '$idtodoList' AND username = '$usrSession'";
    $result = mysqli_query($link, $query);
    if(mysqli_num_rows($result)==1){
        $row=mysqli_fetch_array($result);
        if($row){
            $title = $row['title'];
            $description = $row['description'];
            $priority = $row['priority'];
            echo "
                <h2>Edit Item</h2>

            <form action='modify.php?idtodoList=$idtodoList' method='post'>
            <p>Title</p>
             <input type='text' name='title' value='$title'>
             <p>Description</p>
             <input type='text' name='description' value='$description'>
             <p>Priority: </p>
             <select name='priority' value = '$priority'>
               <option value='High'>High</option>
               <option value='Medium'>Medium</option>
               <option value='Low'>Low</option>
             </select>
             <br>
             <input type='submit' name='submit' value='modify'>
            </form>

            ";
        }
    }
    else{
        echo "Item Not Available";
    }
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $priority = $_POST['priority'];
        $completed = $_POST['completed'];
        db();
        $query = "UPDATE COURSEWORK.todoList SET title = '$title', description = '$description', priority = '$priority' WHERE idtodoList = '$idtodoList' AND username = '$usrSession'";
        $modifiedList = mysqli_query($link, $query);
        if($modifiedList){
            echo "successfully updated";
        }
        else{
            echo mysqli_error($link);
        }
    }

}
?>
<html>
<body>

<button type="submit"><a href="main_page.php">Back To Home Page</a></button>
</body>
</html>
