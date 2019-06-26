<?php

require_once "db_connection.php";
if(isset($_GET['idtodoList'])){
    $idtodoList = $_GET['idtodoList'];
    db();
    global $link;
    $query = "DELETE FROM COURSEWORK.todoList WHERE idtodoList = '$idtodoList'";
    $delete = mysqli_query($link, $query);
    if($delete){
        echo 'Item successfully deleted';
        header("Location: main_page.php");
    }
}
