<?php

function db(){
    global $link;
    $servername = "127.0.0.1";
    $username = "veeral";
    $password = "veeral1995";
    $link = new mysqli ($servername, $username, $password);

    if($link ->connect_error){
      die ("Connection Failed: " . $link->connect_error);
    }
    return $link;
}
