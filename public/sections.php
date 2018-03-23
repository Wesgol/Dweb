<?php 

include_once 'control/dbconn.php';



?>




        <!--==========================
              Section 1 Top
        ============================-->
        
        <div class="container col-md-8 selfcont containerbg">
        <section id="section1">
            <div class="container">
                <h1 class="text-center" id="h1"><img src="pics/leaf.png" alt="leaf"/>Rólam</h1>
                <hr>
                <div class="row">
                    <div class="col-md-12 text-justify psize1">
                        <?php 
                        
                        //Csatlakozás a "rolam" táblához.
                        $conn = "SELECT * FROM rolam;";
                        
                        //Eredményhalmaz az adatbázisból.
                        $result = mysqli_query($fuszdb, $conn);
                        
                        //Az "eredményhalmaz" sorainak száma.
                        $resultell = mysqli_num_rows($result);
                        
                        //Ha az eredmény mennyisége több mint nulla, akkor végiglépés a tartalom egészén, és <p> tagek közé kiírása.
                        if($resultell > 0)
                            {
                               while($row = mysqli_fetch_assoc($result))
                                    {
                                       print  '<p class="s1p">' .$row['bekezdes']. '</p>';
                                    }
                            }
                            
                        ?>
                    </div>
                </div>
            </div>
        </section>
        
        <!--==========================
              Section 1 Bottom
        ============================-->
        
        
        <!--==========================
              Section 2 Top
        ============================-->
        
        
        <section id="section2">
            <div class="container" >
                    <h1 class="text-center" id="h2"><img src="pics/leaf.png" alt="leaf"/>Szolgáltatások</h1>
                    <hr>
                    <div class="row">
                        <div class="col-md-4 psize2">
                            <h4 class="h4size">Fordítás</h4>
                            <?php 
                            
                            //Csatlakozás a "szolgaltatások_forditas" táblához.
                            $connford = "SELECT * FROM szolgaltatasok_forditas;";
                            
                            //Eredményhalmaz az adatbázisból.
                            $fordresult = mysqli_query($fuszdb, $connford);
                            
                            //Az "eredményhalmaz" sorainak száma.
                            $fordresultell = mysqli_num_rows($fordresult);
                            
                            //Ha az eredmény mennyisége több mint nulla, akkor végiglépés a tartalom egészén, és <p> tagek közé kiírása.
                            if($fordresultell > 0)
                            {
                              while($fordszoveg = mysqli_fetch_assoc($fordresult))
                                    {
                                  
                                  print  '<p class="s2p">' .$fordszoveg['forditas_szoveg']. '</p>';
                                    }
                            }
                        ?>
                        </div>
                        <div class="col-md-4 psize2">
                            <h4 class="h4size">Lektorálás</h4>
                            <?php 
                            
                            //Csatlakozás a "szolgaltatások_lektoralas" táblához.
                            $connlekt = "SELECT * FROM szolgaltatasok_lektoralas;";
                            
                            //Eredményhalmaz az adatbázisból.
                            $lektresult = mysqli_query($fuszdb, $connlekt);
                            
                            //Az "eredményhalmaz" sorainak száma.
                            $lektresultell = mysqli_num_rows($lektresult);
                            
                            //Ha az eredmény mennyisége több mint nulla, akkor végiglépés a tartalom egészén, és <p> tagek közé kiírása.
                            if($lektresultell > 0)
                            {
                              while($lektszoveg = mysqli_fetch_assoc($lektresult))
                                    {
                                  
                                  print  '<p class="s2p">' .$lektszoveg['lektoralas_szoveg']. '</p>';
                                    }
                            }
                        ?>
                        </div>
                        <div class="col-md-4 psize2">
                            <h4 class="h4size">Informatikai oktatás</h4>
                            <?php 
                            
                            //Csatlakozás a "szolgaltatások_infokt" táblához.
                            $conninfokt = "SELECT * FROM szolgaltatasok_infokt;";
                            
                            //Eredményhalmaz az adatbázisból.
                            $infoktresult = mysqli_query($fuszdb, $conninfokt);
                            
                            //Az "eredményhalmaz" sorainak száma.
                            $infoktresultell = mysqli_num_rows($infoktresult);
                            
                            //Ha az eredmény mennyisége több mint nulla, akkor végiglépés a tartalom egészén, és <p> tagek közé kiírása.
                            if($infoktresultell > 0)
                            {
                              while($infoktszoveg = mysqli_fetch_assoc($infoktresult))
                                    {
                                  
                                  print  '<p class="s2p">' .$infoktszoveg['infokt_szoveg']. '</p>';
                                    }
                            }
                        ?>
                        </div>
                    </div>
                    <p>
                        <button class="btn btn-success btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Kattintásra további tartalom:
                        </button>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body text-center">
                           További tartalom még fejlesztés alatt! Ennélfogva jelenleg a regisztráció nem kötelező.
                        </div>
                    </div>
            </div>
        </section>
         
        <!--==========================
              Section 2 Bottom
        ============================-->


<?php 

//A carouselpics mappa tartalmának "átvizsgálása".
$files = scandir("carouselpics/");



?>

        <!--==========================
              Section 3 Top
        ============================-->
         
         
         <section id="section3">
             <div class="container containerfix">
                     <h1 class="text-center" id="h3"><img src="pics/leaf.png" alt="leaf"/>Képek</h1>
                     <hr>
                     <div class="row">
                         <div class="col-md-12 center-block">
                             <div id="carousel" class="carousel slide" data-ride="carousel">
                                 <div id="slider" class="carousel slide" data-ride="carousel">
                                      <ul class="carousel-indicators">
                                         <?php
                                         
                                         //A carouselpics mappa tartalmának "végigjárása" for ciklus segítségével.
                                         $i = 0;
                                         for($a = 2; $a < count($files); $a++):
                                         
                                         ?>
                                         
                                         <li data-target="#slider" data-slide-to="<?php echo $i; ?>" class="<?php echo $i == 0 ? 'active': '';  ?>"></li>
                                         <?php 
                                         
                                         //A for ciklus segítségével a slider végig tud menni az elemeken, mert mindegyik kap számozást 0-tól kezdődően, egészen az utolsó képelemig.
                                         //A bootstrap data-slide-to parancsa html kódban minden egyes kép esetében új <li> elemet jelent. A for ciklus ezt megoldja magától is.
                                         $i++;
                                         endfor;
                                         
                                         ?>
                                         
                                      </ul>
                                     <div class="carousel-inner pics" role="listbox">
                                         <?php
                                         
                                         //A fentihez hasonlóan a for ciklus itt is végigmegy immáron a konkrét képeken, és azokat behelyezi az <img> tagbe.
                                         //A for ciklus megspórolja az újabb és újabb <img> tagek szükségességét.
                                         //"alt"-ként a képek nevét vettem használatba.
                                         
                                         $i = 0;
                                         for($a = 2; $a < count($files); $a++):
                                         
                                         ?>
                                         
                                         <div class="carousel-item <?php echo $i == 0 ? 'active': '';  ?>">
                                             <img class="d-block img-fluid" src="carouselpics/<?php echo $files[$a]; ?>" alt="<?php echo $files[$a]; ?>">
                                         </div>
                                         
                                         <?php 
                                         
                                         $i++;
                                         endfor;
                                         
                                         ?>
                                         
                                     </div>
                                     <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
                                         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                         <span class="sr-only">Previous</span>
                                     </a>
                                     <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
                                         <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                         <span class="sr-only">Next</span>
                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
         </section>
         
        <!--==========================
              Section 3 Bottom
        ============================-->

       <!--==========================
              Section 4 Top
        ============================-->
         
         
         <section id="section4">
                 <div class="container">
                     <h1 class="text-center" id="h4"><img src="pics/leaf.png" alt="leaf"/>Referencia</h1>
                     <hr>
                     <div class="row">
                         <div class="col-md-4 psize3">
                             <h4 class="h4size">Fordítás</h4>
                             <?php 
                            
                            //Csatlakozás a "referencia_forditas" táblához.
                            $connford2 = "SELECT * FROM referencia_forditas;";
                            
                            //Eredményhalmaz az adatbázisból.
                            $fordresult2 = mysqli_query($fuszdb, $connford2);
                            
                            //Az "eredményhalmaz" sorainak száma.
                            $fordresultell2 = mysqli_num_rows($fordresult2);
                            
                            //Ha az eredmény mennyisége több mint nulla, akkor végiglépés a tartalom egészén, és <p> tagek közé kiírása.
                            if($fordresultell2 > 0)
                            {
                              while($fordszoveg2 = mysqli_fetch_assoc($fordresult2))
                                    {
                                  
                                  print  '<p class="s2p">' .$fordszoveg2['ref_ford_szoveg']. '</p>';
                                    }
                            }
                            ?>
                         </div>
                         <div class="col-md-4 psize3">
                             <h4 class="h4size">Lektorálás</h4>
                             <?php 
                            
                            //Csatlakozás a "referencia_forditas" táblához.
                            $connlekt2 = "SELECT * FROM referencia_lektoralas;";
                            
                            //Eredményhalmaz az adatbázisból.
                            $lektresult2 = mysqli_query($fuszdb, $connlekt2);
                            
                            //Az "eredményhalmaz" sorainak száma.
                            $lektresultell2 = mysqli_num_rows($lektresult2);
                            
                            //Ha az eredmény mennyisége több mint nulla, akkor végiglépés a tartalom egészén, és <p> tagek közé kiírása.
                            if($lektresultell2 > 0)
                            {
                              while($lektszoveg2 = mysqli_fetch_assoc($lektresult2))
                                    {
                                  
                                  print  '<p class="s2p">' .$lektszoveg2['ref_lekt_szoveg']. '</p>';
                                    }
                            }
                            ?>
                         </div>
                         <div class="col-md-4 psize3">
                             <h4 class="h4size">Informatikai oktatás</h4>
                             <?php 
                            
                            //Csatlakozás a "referencia_forditas" táblához.
                            $conninfokt2 = "SELECT * FROM referencia_infokt;";
                            
                            //Eredményhalmaz az adatbázisból.
                            $infoktresult2 = mysqli_query($fuszdb, $conninfokt2);
                            
                            //Az "eredményhalmaz" sorainak száma.
                            $infoktresultell2 = mysqli_num_rows($infoktresult2);
                            
                            //Ha az eredmény mennyisége több mint nulla, akkor végiglépés a tartalom egészén, és <p> tagek közé kiírása.
                            if($infoktresultell2 > 0)
                            {
                              while($infoktszoveg2 = mysqli_fetch_assoc($infoktresult2))
                                    {
                                  
                                  print  '<p class="s2p">' .$infoktszoveg2['ref_infokt_szoveg']. '</p>';
                                    }
                            }
                            ?>
                         </div>
                     </div>
                 </div>
         </section>
         
        <!--==========================
              Section 4 Bottom
        ============================-->



        <!--==========================
              Parallax Top
        ============================-->
        
        
         <div class="parallax"></div>
         
        <!--==========================
              Parallax Top
        ============================-->
         
        
        <!--==========================
              Section 5 Top
        ============================-->
         
        
        
        
         
        <section class="text-center" id="section5">
                <div class="container">
                    <h1 id="h5"><img src="pics/leaf.png" alt="leaf"/>Kapcsolat</h1>
                    <hr>
                    <div class="row psize4">
                    <div class="container col-md-6">
                        <div class="form-group">
                            
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
                            <script>
                            $(document).ready(function(){
                                $("#contact-form").submit(function(event){
                                    event.preventDefault();
                                    var name = $("#mail-name").val();
                                    var email = $("#mail-email").val();
                                    var subject = $("#mail-subject").val();
                                    var message = $("#mail-message").val();
                                    var submit = $("#mail-submit").val();
                                    $(".form-message").load("control/mail.php", {
                                        name: name,
                                        email: email,
                                        subject: subject,
                                        message: message,
                                        submit: submit
                                    });
                                });
                            });
                            </script>
                            <script type='text/javascript'>
                                  $(document).ready(function(){
                                      $("button").click(function(){
                                  $('#text').fadeOut(7000);
                               });
                            });
                            </script>
                            <p id="text" class="form-message"></p>
                            <form action="control/mail.php" method="POST" id="contact-form" enctype="multipart/form-data">
                                <div class="input-field">
                                    <input id="mail-name" type="text" class="form-control" placeholder="Név" name="name">
                                </div>
                                <div class="input-field">
                                    <script>
                                    function emailChar2(input) 
                                    {
                                    var regex = /[^a-z0-9.@]/gi;
                                    input.value = input.value.replace(regex, "");
                                    }
                                    </script>
                                    <input id="mail-email" type="email" class="form-control" placeholder="E-mail cím" name="email" onkeyup="emailChar2(this)">
                                </div>
                                <div class="input-field">
                                    <input id="mail-subject" type="text" class="form-control" placeholder="Tárgy" name="subject">
                                </div>
                                <div class="input-field">
                                    <textarea id="mail-message" class="form-control" placeholder="Üzenet" rows="3" name="message"></textarea>
                                </div>
                                <button class=" btn btn-success btn btn-send" id="mail-submit" type="submit" name="submit">Üzenet Küldése</button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
        </section>
        
         <!--==========================
              Section 5 Bottom
        ============================-->
         
         <!--==========================
              Parallax Bottom
        ============================-->
         
         <div class="parallax"></div>
         
         <!--==========================
              Parallax Bottom
        ============================-->