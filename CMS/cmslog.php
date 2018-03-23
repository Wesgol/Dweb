<?php


include_once 'cmsdb.php';

session_start();


//Alapértékek
$username = "";
$errors = array();



//A bejelentkezés gomb megnyomása esetén ellenőrzés lefutása.
if (isset($_POST['login'])) 
    {
    $username = mysqli_real_escape_string($connect, strip_tags(trim($_POST['username'])));
    $password = mysqli_real_escape_string($connect, strip_tags(trim($_POST['password'])));
    
    //Ha valamelyik mező üres, hibaüzenet kiiírása.
    if (empty($username)) 
        {
        array_push($errors, "Felhasználónév kitöltése kötelező!");
        }
        if (empty($password)) 
        {
        array_push($errors, "Jelszó kitöltése kötelező!");
        }
        
        //Ha nincs hiba, akkor az adatbázisból specifikusan kiválasztott felhasználó beengedése.
        if (count($errors) == 0) 
        {
        $password = sha1($password);
        $db = "SELECT * FROM felhasznalok WHERE id = 3 AND felhasznalonev='$username' AND jelszo='$password'";
        $eredmeny = mysqli_query($connect, $db);
        if (mysqli_num_rows($eredmeny) == 1) {
            $_SESSION['username'] = $username;
            header('location: cms.php');
        }
        //Ha nem megfelelőek a bevitt adatok, akkor hibaüzenet kiírása.
        else 
        {
            array_push($errors, "Nem megfelelő felhasználónév/jelszó kombináció!");
        }
        }
    }