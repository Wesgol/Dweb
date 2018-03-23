<?php  include('cmsdb.php'); ?>
<?php  include('cms_rolam.php'); ?>



<?php  include('sessioncheck.php'); ?>





<?php
        //Szerkesztés
        if (isset($_GET['edit'])) 
            {
                //A szerkeszteni kívánt elem id-ja.
                $id = $_GET['edit'];
                
                //Amennyiben a szerkesztés gomb megnyomásra kerül, úgy az válik aktívvá, az jelenik meg a mentés gomb helyett.
                $update = true;
                //Az adatbázisban a megfelelő id-val rendelkező tartalom kiválasztása.
                $eredmeny = mysqli_query($connect, "SELECT * FROM rolam WHERE id=$id");
                
                //Asszociatív tömb képzése a mysqli_fetch_array-el.
                $a = mysqli_fetch_array($eredmeny);
                $bekezdes = $a['bekezdes'];
            }
            
            
            
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
                <link href="css/style2.css" rel="stylesheet" type="text/css"/>
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
    
    <!-- Üzenet kiírása -->
    <?php if (isset($_SESSION['message'])): ?>
        <div class="msg">
        <?php 
        echo $_SESSION['message']; 
        unset($_SESSION['message']);
        ?>
        </div>
    <?php endif ?>
    
    
    
    <!-- A táblázatba történő kiíráshoz bekérés az adatbázisból  -->
    <?php $results = mysqli_query($connect, "SELECT * FROM rolam"); ?>
    
    
<div class="container">
    <h3 class="text-center">A felület használata során figyelembe veendő legfontosabb szempontok:</h3>
    <h4 class="text-danger bg-light text-center">A törlés végleges, és nem visszavonható!</h4>
    <h4 class="text-warning bg-light text-center">A szerkesztés jóváhagyásával a szövegbeviteli mezőbe írt szöveg válik érvényessé!</h4>
</div>
    
    
    
<div class="container">
    <h1 class="text-center">Rólam</h1>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr class="text-center">
                <th>Bekezdések tartalma</th>
                <th colspan="2">Műveletek</th>
            </tr>
        </thead>
        <tbody>
        <!-- Az összes adatbázisban fellelhető találat kiírása while ciklussal.   -->
        <?php while ($row = mysqli_fetch_array($results)) { ?>
            <tr>
                <td><?php echo $row['bekezdes']; ?></td>
                <td>
                    <a type="button" class="btn btn-warning" href="cms.php?edit=<?php echo $row['id']; ?>">Szerkesztés</a>
                </td>
                <td>
                    <a type="button" class="btn btn-danger" href="cms_rolam.php?del=<?php echo $row['id']; ?>">Törlés</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
    
    
<div class="container">
    <form method="post" action="cms_rolam.php" >
        <div class="form-group">
            <label for="szoveg">Szövegbeviteli mező:</label>
            <!-- A táblázatban található tartalom id-ja a szerkesztéshez.  -->
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <textarea class="form-control" type="text" name="szoveg" id="editor"><?php echo $bekezdes; ?></textarea>
        </div>
        <div>
            <!-- Alapesetben mentés funkció, amikor viszont a szerkesztés van kiválasztva, akkor az Szerkesztés gomb az aktív. -->
            <?php if ($update == true): ?>
            <button type="submit" class="btn btn-warning btn-lg" name="update">Szerkesztés</button>
                <?php else: ?>
            <button type="submit" class="btn btn-success btn-lg" name="save">Mentés</button>
                <?php endif ?>
        </div>
    </form>
</div>
    
    
    
    
    <script>
        
        
        /*A CkEditor config.js fájljába be kellett írni a következőt, annak érdekében, 
          hogy ne hülye karaktereket rögzítsen az adatbázisba az ékezetes betűk használata esetén: config.entities = false;*/
        CKEDITOR.replace( 'editor' );
        
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
