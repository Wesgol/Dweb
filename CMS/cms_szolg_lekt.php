<?php

include_once 'cmsdb.php';

session_start();

$bekezdes = "";
$id = 0;
$update = false;



if (isset($_POST['save'])) 
    {
    $bekezdes = mysqli_real_escape_string($connect, $_POST['szoveg']);
    $bekezdes = str_ireplace('<p>','',$bekezdes);
    $bekezdes = str_ireplace('</p>','',$bekezdes);
    mysqli_query($connect, "INSERT INTO szolgaltatasok_lektoralas (lektoralas_szoveg) VALUES ('$bekezdes')"); 
    $_SESSION['message'] = "Szöveg mentve!"; 
    header('location: cms_1_1.php');
    
    }
        
    if (isset($_POST['update'])) 
        {
        $id = $_POST['id'];
        $bekezdes = mysqli_real_escape_string($connect, $_POST['szoveg']);
        $bekezdes = str_ireplace('<p>','',$bekezdes);
        $bekezdes = str_ireplace('</p>','',$bekezdes);
        $sql = "UPDATE szolgaltatasok_lektoralas SET lektoralas_szoveg='$bekezdes' WHERE id=$id";
        mysqli_query($connect, $sql);
        $_SESSION['message'] = "Szöveg szerkesztve!"; 
        header('location: cms_1_1.php');
        }
        
        if (isset($_GET['del'])) 
            {
            $id = $_GET['del'];
            $sql = "DELETE FROM szolgaltatasok_lektoralas WHERE id=$id";
            mysqli_query($connect, $sql);
            $_SESSION['message'] = "Szöveg törölve!"; 
            header('location: cms_1_1.php');
            }