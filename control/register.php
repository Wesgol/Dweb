<?php

if(!session_id())
    {
      session_start();
    }

include_once 'dbconn.php';




if(isset($_POST['register']))
    {
    
    //A regisztrációs form input mezőibe bevitt adatok fogadása.
    $user = mysqli_real_escape_string($fuszdb, strip_tags(trim($_POST['regusername'])));
    $email = mysqli_real_escape_string($fuszdb, strip_tags(trim($_POST['regemail'])));
    $password = mysqli_real_escape_string($fuszdb, strip_tags(trim($_POST['regpassword'])));
    $confirmpassword = mysqli_real_escape_string($fuszdb, strip_tags(trim($_POST['confirmpassword'])));
    
    
    
    
    
    //A felhasználónév meglétének vizsgálata, és szükség esetén a user figyelmeztetése.
    $userell = "SELECT * FROM felhasznalok WHERE felhasznalonev='$user'";
    $eredmeny = mysqli_query($fuszdb, $userell);
    $felhasznalo = mysqli_num_rows($eredmeny);
    
    //Ha a felhasználó már létezik, vagy van már ilyen e-mail cím, akkor hibaüzenet kiírása, vagy az adatok adatbázisba küldése.
    if($felhasznalo > 0)
    {
        echo "usernameexists";
    }
    else
    {
        //Jelszó kódolása, mielőtt az adatbázisba kerül.
        $password = sha1($password);
        $insert = "INSERT INTO felhasznalok (felhasznalonev, email, jelszo) VALUES('$user', '$email', '$password')";
        $eredmeny = mysqli_query($fuszdb, $insert);
        
        if($eredmeny)
        {
            echo "success";
        }
    }
    

    //Amennyiben valamiért nem sikerült az adatbázishoz kapcsolódni, akkor hibaüzenet kiírása.
    if(mysqli_connect_error())
        {
         die ('Hibakód: ' .mysqli_connect_error());
        }
    }



?>