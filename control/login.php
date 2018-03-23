<?php


session_start();



if(isset($_POST['login']))
{
    
    //Eltérő csatlakozás használata, mint a szöveges tartalom elérésének esetében.
    //Webhostnál figyelni kell rá, mert mások a csatlakozási adatok!!
    $conn = new mysqli('localhost', 'root', '', 'fusz');
    
    // A login form input mezőibe bevitt adatok fogadása.
    $user = $conn->real_escape_string(strip_tags(trim($_POST['usernameAjax'])));
    //A jelszó sha1 titkosítása.
    $password = sha1($conn->real_escape_string(strip_tags(trim($_POST['passwordAjax']))));
    
    //Összevetés az adatbázisban található adatokkal.
    $adatok = $conn->query("SELECT id FROM felhasznalok WHERE felhasznalonev='$user' AND jelszo='$password'");
    
    
    //Ha minden rendben, akkor beléptetés, és alert a sikeres belépésről, vagy alert a bevitt adatok ellenőrzésére.
    if($adatok->num_rows > 0)
    {
        //Session létrehozása.
        $_SESSION['loggedIN'] = '1';
        $_SESSION['felhasznalonev'] = $user;
        $_SESSION['felhasznalonev'] = $_POST['usernameAjax'];
        echo 'Igen';
        
    }
    else
    {
        
        
        echo 'Nem';
    }
    
    
    
    
    //Hiba az adatbázishoz kapcsolódás esetén.
        
    if(mysqli_connect_error())
        {
          die('Hibakód: '.mysqli_connect_error());
        }
}





?>