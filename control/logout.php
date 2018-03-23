<?php

//Kijelentkezés esetén a session törlésre kerül,
//és a felhasználó visszadobásra kerül az index.php-ra.
session_start();
unset($_SESSION['loggedIN']);
session_destroy();
header("Location: ../index.php");
exit();

?>