

<?php include ('upload.php'); ?>


<?php  

session_start();

include('sessioncheck.php'); 

?>

<!DOCTYPE html>
<html>
<head>
    <title>Oldal szöveges tartalmának szerkesztési felülelete</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/style2.css" rel="stylesheet" type="text/css"/>
    <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-custom">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="cms.php">Rólam szekció</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="cms.php" id="navbardrop" data-toggle="dropdown">Szolgáltatások szekció</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="cms_1_1.php">Lektorálás</a>
                    <a class="dropdown-item" href="cms_1_2.php">Fordítás</a>
                    <a class="dropdown-item" href="cms_1_3.php">Informatikai oktatás</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="cms.php" id="navbardrop" data-toggle="dropdown">Referenciák szekció</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="cms_2_1.php">Lektorálás</a>
                    <a class="dropdown-item" href="cms_2_2.php">Fordítás</a>
                    <a class="dropdown-item" href="cms_2_3.php">Informatikai oktatás</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="picupload.php">Hozzáadás a képekhez</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Kijelentkezés</a></li>
        </ul>
    </nav>
    <div class="container">
        <h3 class="text-center">A felület használata során figyelembe veendő legfontosabb szempontok:</h3>
        <h4 class="text-danger bg-light text-center">A sikeres hozzáadás végleges, és nem visszavonható!</h4>
    </div>
    <div class="container">
    <h1 class="text-center">Kép feltöltése</h1>
    <hr>
    </div>
    <div class="container unistyle">
        <form method="post" action="upload.php" enctype="multipart/form-data">
            <input  class="form-control-file" type="file" name="file">
            <button class="btn btn-success btn-lg" type="submit" name="submit">Feltöltés</button>
        </form>
    </div>
    
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
