<?php


$server = "localhost";
$user = "root";
$password = "";
$db = "fusz";




$connect = mysqli_connect($server, $user, $password, $db) or die(mysqli_connect_error());
mysqli_set_charset($connect, 'utf8');




?>