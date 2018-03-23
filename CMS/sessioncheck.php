<?php

//Session meglétének vizsgálata. Amennyiben nincs, vagyis a felhasználó nincs
//belépve, akkor az index.cms-re visszadobás.
//Ez az összes aloldalra is vonatkozik.
if (!isset($_SESSION['username'])) 
      {
      header('location: index.php');
      
      }
?>