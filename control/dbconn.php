<?php

//Az adatbázishoz kapcsolódás beállításai

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "fusz";



$fuszdb =  mysqli_connect($dbHost, $dbUser, $dbPass, $dbName) or die(mysqli_connect_error());

mysqli_set_charset($fuszdb, 'utf8');