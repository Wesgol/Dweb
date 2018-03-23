<?php



if(isset($_POST['submit']))
{
    $file = $_FILES['file'];
    //print_r($file);
    
    //fájl neve, a fájl könyvtáram a fájl mérete, a fájl típusa.
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    
    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    
    //Engedélyezett filetípusok.
    $allowed = array('jpg', 'jpeg', 'png');
    
    if(in_array($fileActualExt, $allowed))
    {
        //Ha nincs hiba...
        if($fileError === 0)
        {
            //A fájl méretének vizsgálata.
            if($fileSize < 3000000)
            {
                //A fájl egyedi nevet kap a feltöltést követően.
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                //A feltöltött fájl ebbe a mappába kerül.
                $fileDestination = '../carouselpics/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("refresh:1; picupload.php");
                echo "<script type='text/javascript'>alert('Sikeres feltöltés!')</script>";
            }
            else
            {
                echo "<script type='text/javascript'>alert('A fájl mérete túl nagy!')</script>";
            }
        }
        else
        {
            echo "<script type='text/javascript'>alert('Valami hiba történt a feltöltés során!')</script>";
        }
    }
    else
    {
        echo "<script type='text/javascript'>alert('Nem tölthetsz fel ilyen típusú fájlt!')</script>";
    }
    
    
}










?>