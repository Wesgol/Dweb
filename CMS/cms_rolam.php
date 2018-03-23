<?php


include_once 'cmsdb.php';

session_start();


//Alap változók. A $update = false miatt a mentés gomb jelenik meg alapesetben.
$bekezdes = "";
$id = 0;
$update = false;


    //Mentés funkció. Sikeres mentés esetén üzenet.
    if (isset($_POST['save'])) 
        {
        $bekezdes = mysqli_real_escape_string($connect, $_POST['szoveg']);
        //A CkEditor alaphelyzetből <p> tagekkel látja el a bevitt szöveget. Ez a funkció eltávolítja a szövegről a <p> tageket.
        $bekezdes = str_ireplace('<p>','',$bekezdes);
        $bekezdes = str_ireplace('</p>','',$bekezdes);
        mysqli_query($connect, "INSERT INTO rolam (bekezdes) VALUES ('$bekezdes')"); 
        $_SESSION['message'] = "Szöveg mentve!"; 
        header('location: cms.php');
        }
        
        
        //Szerkesztés funkció. Sikeres szerkesztés esetén a kiválasztott szöveg felülírásra kerül a textarea-ba bevitt adatokkal.
        if (isset($_POST['update'])) 
            {
            $id = $_POST['id'];
           $bekezdes = mysqli_real_escape_string($connect, $_POST['szoveg']);
            $bekezdes = str_ireplace('<p>','',$bekezdes);
            $bekezdes = str_ireplace('</p>','',$bekezdes);
            $sql = "UPDATE rolam SET bekezdes='$bekezdes' WHERE id=$id";
            mysqli_query($connect, $sql);
            $_SESSION['message'] = "Szöveg szerkesztve!"; 
            header('location: cms.php');
            }
            
        //Törlés funkció. A törlés gomb megnyomásával a bejegyzés véglegesen törlődik.
        if (isset($_GET['del'])) 
            {
            $id = $_GET['del'];
            $sql = "DELETE FROM rolam WHERE id=$id";
            mysqli_query($connect, $sql);
            $_SESSION['message'] = "Szöveg törölve!"; 
            header('location: cms.php');
            
            }
            


?>