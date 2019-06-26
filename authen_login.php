<?php
session_start();
require('db_connection.php');

$_SESSION['username'] = $_POST['user_id'];

if (isset($_POST['user_id']) and isset($_POST['user_pass'])){

  db();
  global $link;

  $username = $_POST['user_id'];
  $password = $_POST['user_pass'];

  $_SESSION['username'] = $username;

  $query = "SELECT * FROM COURSEWORK.users WHERE username='$username' and Password='$password'";
  $auth = mysqli_query($link, $query);
  if(mysqli_num_rows($auth) > 0){
    header('Location: main_page.php');
    exit;
  }
  else{
    echo "Login Failed!";
  }

}
