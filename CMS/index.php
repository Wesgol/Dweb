<?php include('cmslog.php') ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bejelentkező felület</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="css/mdb.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="row justify-content-center topmarg">
            <div class="card" style="width: 28rem;">
                <div class="header pt-3 grey lighten-2">
                    <div class="row d-flex justify-content-start">
                        <h3 class="deep-grey-text mt-3 mb-4 pb-1 mx-5">Belépés</h3>
                    </div>
                </div>
                <?php include('errors.php'); ?>
                <form method="POST" action="index.php">
                <div class="card-body mx-4 mt-4">
                    <div class="md-form">
                        <input type="text" name="username" id="Form-email4" class="form-control">
                        <label>Felhasználónév</label>
                    </div>
                    <div class="md-form pb-3">
                        <input type="password" name="password" id="Form-pass4" class="form-control">
                        <label>Jelszó</label>
                    </div>
                    <div class="text-center mb-4">
                        <button type="submit" name="login" class="btn btn-danger btn-block z-depth-2">Bejelentkezés</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        
        
        
        
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/mdb.min.js" type="text/javascript"></script>
    </body>
</html>