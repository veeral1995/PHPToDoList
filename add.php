<?php
session_start();
include('header.php');
require('db_connection.php');

if(isset($_POST['submit'])) {
    $title = $_POST['todoTitle'];
    $description = $_POST['todoDescription'];
    $priority = $_POST['todoPriority'];
    $usrSession = $_SESSION['username'];

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
        $titleErrorMsg = "Title Cannot Be empty";
    }
    // check for empty priority
    if(empty($priority)){
        $error = true;
        $descriptionErrorMsg = "Priority Cannot Be Empty";
    }
    // connect to database
    db();
    global $link;
    $completed = 0;
    $query = "INSERT INTO COURSEWORK.todoList(title, description, priority, completed, username) VALUES ('$title', '$description', '$priority', 0, '$usrSession')";
    $insertTodo = mysqli_query($link, $query);
    if($insertTodo){
        echo "Successfull Addition of Item";
    }else{
        echo mysqli_error($link);
    }
}
?>

<html>
<head>
    <title>Create Task(s)</title>
</head>
<body id="body_bg">
<h1>Create New Task</h1>
<button type="submit"><a href="main_page.php">View All Tasks</a></button>
<form method="post" action="add.php">
    <p>Title: </p>
    <input name="todoTitle" type="text">
    <p>Description: </p>
    <input name="todoDescription" type="text">
    <p>Priority: </p>
    <select name="todoPriority">
      <option value="High">High</option>
      <option value="Medium">Medium</option>
      <option value="Low">Low</option>
    </select>
    <br>
    <br>
    <input type="submit" name="submit" value="submit">
</form>
</body>
</html>
