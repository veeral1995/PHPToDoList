<?php
session_start();

$usrSession = $_SESSION['username'];
require_once "db_connection.php";
if(isset($_GET['idtodoList'])){
    $idtodoList = $_GET['idtodoList'];
    db();
    global $link;
    $query = "UPDATE COURSEWORK.todoList SET completed = 1 WHERE idtodoList = '$idtodoList' AND username = '$usrSession'";
    $delete = mysqli_query($link, $query);
    if($delete){
        echo 'Item successfully Completed';
        header('Location: main_page.php');
    }
}
