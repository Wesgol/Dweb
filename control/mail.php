<?php
        
        error_reporting(0);
        
        
        //A PHPMailer funkcióinak/osztályainak használata.
        use PHPMailer\PHPMailer\PHPMailer;
        include_once "PHPMailer/PHPMailer.php";
        include_once "PHPMailer/Exception.php";
        include_once "PHPMailer/SMTP.php";
        
        //Ha az üzenet küldése gomb megnyomásra kerül...
        if (isset($_POST['submit'])) 
            {
                $name = strip_tags($_POST['name']);
                $email = strip_tags($_POST['email']);
                $subject = strip_tags($_POST['subject']);
                $message = strip_tags($_POST['message']);
                
                $errorEmpty = false;
                $errorEmail = false;
                
                if(empty($name) || empty($email) || empty($subject) || empty($message))
                    {
                    echo "<span class='form-error'>Minden mezőt ki kell tölteni!</span>";
                    $errorEmpty = true;
                    
                    }
                    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
                            {
                        echo "<span class='form-error'>Email cím megadása nem megfelelő formában történt!</span>";
                        $errorEmail = true;
                        
                            }
                
                
                
                $mail = new PHPMailer(true);
                $mail->IsSMTP();
                
                //Ha a küldés SMTP-n keresztül megy.
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 465; // vagy 587-es port
                $mail->SMTPAuth = true;
                $mail->Username = "fuszteszt@gmail.com";
                $mail->Password = "nm65wes3";
                $mail->SMTPSecure = "ssl"; // vagy TLS
                $mail->CharSet = 'UTF-8';
                //Az üzenet erre az e-mail címre fog megérkezni.
                $mail->addAddress('adam.petofi@gmail.com');
                //A feladó e-mail címe. (gmail-ről gmail-es címre a feladó e-mail címe felülírásra kerül,
                //a Google nem veszi figyelembe, gmail-ről nem gmail-es e-mail címre nincs ilyen probléma.)
                $mail->setFrom($email);
                //Az üzenet tárgya.
                $mail->Subject = $subject;
                //A feladó neve.
                $mail->Name = $name;
                $mail->isHTML(true);
                //Az üzenet tartalma.
                $mail->Body = $message;
                
                
                
                if ($mail->send())
                {
                    //Sikeres üzenetküldés szövege.
                    echo "<span class='form-success'>Az üzenet elküldésre került, hamarosan felveszem Önnel a kapcsolatot!</span>";
                    
                }
                
                else
                {
                    //Sikertelen üzenetküldés üzenete.
                   echo "<span class='form-success'>Valami hiba történt!</span>";
                }
                
            }
        
?>



<script>
    $("#mail-name, #mail-email, #mail-subject, #mail-message").removeClass("input-error");
    
//Üzenet kiírása.
var errorEmpty = "<?php echo $errorEmpty ?>";
var errorEmail = "<?php echo $errorEmail ?>";


if(errorEmpty == true)
{
    $("#mail-name, #mail-email, #mail-subject, #mail-message").addClass("input-error");
}
if(errorEmail == true)
{
    $("#mail-email").addClass("input-error");
}

if(errorEmpty == false && errorEmail == false)
{
    $("#mail-name, #mail-email, #mail-subject, #mail-message").val("");
}


</script>