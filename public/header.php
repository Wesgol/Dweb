<?php
session_start();


//Ha a felhasználó már be van logolva, akkor átdobja őt a "rejtett" oldalra.
if(isset($_SESSION['loggedIN']))
{
    header("Location: ../hidden/hidden.php");
    exit();
}



?>


        <!--==========================
              Header Top
        ============================-->
        
        <div class="jumbotron jumbotron-fluid jumbotronbg">
            <div class="container">
                <h1 class="display-3 jumbohead">Fúsznet</h1>
                <p class="lead jumbohead2">Figyelem, új szó!</p>
            </div>
        </div>
        <nav class="navbar navbar-expand-md navbar-light bg-dark sticky-top navbar-custom" role="navigation">
            <div class="container">
                <button class="navbar-toggler" data-toggle="collapse" onclick="openFunction()"  data-target="#collapse_target">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse " id="collapse_target">
                    <a class="navbar-brand" href="index.php"><img src="pics/fuszlogo.png" alt="fuszlogo"/></a>
                    <ul class="navbar-nav nav-fill w-100">
                        <li class="nav-item"><a class="nav-link" onclick="closeFunction()" href="#section1">Rólam</a></li>
                        <li class="nav-item"><a class="nav-link" onclick="closeFunction()" href="#section2">Szolgáltatások</a></li>
                        <li class="nav-item"><a class="nav-link" onclick="closeFunction()" href="#section3">Képek</a></li>
                        <li class="nav-item"><a class="nav-link" onclick="closeFunction()" href="#section4">Referencia</a></li>
                        <li class="nav-item"><a class="nav-link" onclick="closeFunction()" href="#section5">Kapcsolat</a></li>
                        <li class="nav-item"><a class="nav-link"  data-toggle="modal" data-target="#regmodal">Regisztráció</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#logmodal">Bejelentkezés</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        
        
        
        <!--==========================
              Header Bottom
        ============================-->
        
        
        
        
        
         <!--==========================
              Regmodal Top
        ============================-->
        
        <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
         
         
        <div class="modal fade" id="regmodal" tabindex="-1" role="dialog">
            <div class="modal-dialog cascading-modal" role="document">
                <form id="modal_form_register" method="POST" action="control/register.php" autocomplete="off">
                    <div class="modal-content">
                        <div class="modal-header modalhead">
                            <h4 class=" modal-title"><i class="fa fa-user-plus"></i>Regisztráció</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Felhasználónév</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user-circle"></i>
                                    </span>
                                    <input type="text" id="reguser" name="regusername" class="form-control" placeholder="Felhasználónév">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>E-mail cím</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <script>
                                    function emailChar(input) 
                                    {
                                    var regex = /[^a-z0-9.@]/gi;
                                    input.value = input.value.replace(regex, "");
                                    }
                                    </script>
                                    <input type="email" id="regemail" name="regemail" class="form-control" placeholder="E-mail cím"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" onkeyup="emailChar(this)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jelszó</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input type="password" id="regpass" name="regpassword" class="form-control" placeholder="Jelszó">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jelszó megerősítése</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input type="password" id="regpassconf" name="confirmpassword" class="form-control" placeholder="Jelszó megerősítése">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="button" id="register" name="register" class="btn btn-outline-success">Regisztráció<i class="fa fa-sign-in ml-1"></i></button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="footertext">
                                <p>Már van regisztrációja?<a class="btn btn-outline-secondary" data-toggle="modal" href="#logmodal" data-dismiss="modal">Bejelentkezés Itt</a></p>
                            </div>
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Bezárás</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
         
         <script type="text/javascript">
          
          $(document).ready(function(){
              $('#register').click(function(){
                  var regusername = $('#reguser').val();
                  var regemail = $('#regemail').val();
                  var regpassword = $('#regpass').val();
                  var confirmpassword = $('#regpassconf').val();
                  
                    if(regusername.length == 0 || regemail.length == 0 || regpassword.length == 0 || confirmpassword.length == 0)
                    {
                      alert("Minden mezőt ki kell tölteni!");
                    }
                    if(regpassword != confirmpassword)
                    {
                     alert("A jelszavak nem egyeznek!");
                    }
                    else if(regusername != '' && regemail != '' && regpassword != '' && confirmpassword != '')
                    {
                    
                    $.ajax({
                    url:"control/register.php",
                    method:"POST",
                    data: {
                        register:1,
                        regusername:regusername, 
                        regemail:regemail, 
                        regpassword: regpassword, 
                        confirmpassword: confirmpassword
                           },
                           success:function(data)
                           {
                               if(data == 'usernameexists')
                               {
                                   alert("Már létezik ilyen felhasználó!");
                               }
                               else
                               {
                                   alert("Sikeres regisztráció, most már beléphet!");
                                   $('#register').hide();
                                   setTimeout(function(){
                                   location.reload();
                                   },1500);
                               }
                           }
                           });
                    }
                });
            });
        
         </script>
         
         
        <!--==========================
              Regmodal Bottom
        ============================-->
        
        
        
        
        
        
        <!--==========================
              Logmodal Top
        ============================-->
        
        
        <div class="modal fade" id="logmodal" tabindex="-1" role="dialog">
            <div class="modal-dialog cascading-modal" role="document">
                <p id="response"></p>
                <form id="modal_form_login" method="POST" action="control/login.php"  autocomplete="off">
                    <div class="modal-content">
                        <div class="modal-header modalhead">
                            <h4 class="modal-title"><i class="fa fa-user"></i>Bejelentkezés</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Felhasználónév</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user-circle"></i>
                                    </span>
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Felhasználónév">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jelszó</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-unlock-alt"></i>
                                    </span>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Jelszó">
                                </div>
                                <div class="text-center buttonnew1">
                                    <button type="button" name="login" id="login" class="btn btn-outline-success buttonnew2">Bejelentkezés<i class="fa fa-sign-in ml-1"></i></button>
                                    <p id="response"></p>
                                </div>
                            </div>
                        </div>
                            <div class="modal-footer">
                                <div class="footertext">
                                    <p>Még nincs regisztrálva?<a class="btn btn-outline-secondary" data-toggle="modal" href="#regmodal" data-dismiss="modal">Regisztráció</a></p>
                                </div>
                                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Bezárás</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
        
        <script type="text/javascript">
        
        
        $(document).ready(function(){
            $('#login').click(function(){
                var username = $('#username').val();
                var password = $('#password').val();
                if(username != '' && password != '')
                {  
                    $.ajax({
                     url:"control/login.php",
                     method:"POST",
                     data: {
                         login:1,
                         usernameAjax:username,
                         passwordAjax:password
                           },
                           success:function(data)
                           {
                               if(data == 'Nem')
                           {
                               alert("Hibás adatok!");
                           }
                           else
                           {
                               alert("Sikeres bejelentkezés!");
                               $('#login').hide();
                               setTimeout(function(){
                               location.reload();
                               },1500);
                           }
                           }
                       });
                }
                else
                {
                    alert("A mezők nem lehetnek üresek!");
                }
            });
        });
                </script>
        <!--==========================
              Logmodal Bottom
        ============================-->