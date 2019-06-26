<?php
 require('db_connection.php');

 if (isset($_POST['user_id']) and isset($_POST['user_pass'])){

// Assigning POST values to variables.
$username = $_POST['user_id'];
$password = $_POST['user_pass'];
$passwordVerify = $_POST['user_pass_verify'];

db();
global $link;

if($password == $passwordVerify)
{
  $query = "INSERT INTO COURSEWORK.users (username,Password) VALUES ('$username','$password');";
  $insertUser = mysqli_query($link, $query);
  if($insertUser){
      echo ("Account Successfully Created");
      header('Location: index.php');
  }
  else{
      echo ("SQL Failure: ");
      echo mysqli_error($link);
  }
}
else{
  echo "Passwords Do Not Match";
}
}
