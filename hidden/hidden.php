<?php

session_start();

//Ha a felhasználó nincs belogolva, akkor visszadobja őt, az index.php-ra.
if(!isset($_SESSION['loggedIN']))
{
    header("Location: ../index.php");
    exit();
}

?>



<!DOCTYPE html>
<html lang="hu">
    <head>
        <title>Fúsznet</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="keywords" content="oktatás ,pécs ,oktatas ,pecs ,fordítás ,lektorálás, lektoralas, forditas">
        <meta name="language" content="hu">
        <meta name="author" content="A. P.">
        <?php include 'h_css.php'; ?>
    </head>
    <body class="bg" data-spy="scroll" data-target=".navbar" data-offset="50">
        
        
        <?php include 'h_header.php'; ?>
        
        
        <?php include 'h_sections.php'; ?>
        
        
        <?php include 'h_footer.php'; ?>
        
        
        <?php include 'h_js.php'; ?>
        
        
    </body>
</html>