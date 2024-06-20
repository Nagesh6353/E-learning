<!-- Start Contact-Us Section -->
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

   if(isset($_POST['Send'])){

    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $msg = $_POST['message'];


//Load Composer's autoloader
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings

    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'hareshkumavat49@gmail.com';                     //SMTP username
    $mail->Password   = 'xyhg bwxu hsnb lysy';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('hareshkumavat49@gmail.com', 'Contact Form');
    $mail->addAddress('elearning083@gmail.com', 'my website');     //Add a recipient
   
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Subject - $subject";
    $mail->Body    = "Sender Name - $name <br> Sender Email - $email <br> Message - $msg";
    

    $mail->send();
    echo '<div class="alert alert-success col-sm-3 al">Message has been sent successfully. !</div>';
} catch (Exception $e) {
    echo '<div class="alert alert-danger col-sm-3 al">Message could not be sent. !</div>';
}
   }
?>

<style>
    .al{
        top: 470px;
        margin-left: 200px;
    }
</style>

<div class="container mt-4 contact" id="Contact">
    <h2 class="text-center mb-4">Contact US</h2>
    <div class="row">
        <div class="col-md-8">
            <form method="post">
                <input type="text" class="form-control" name="name" placeholder="Name"><br>
                <input type="text" class="form-control" name="subject" placeholder="Subject"><br>
                <input type="email" class="form-control" name="email" placeholder="Email"><br>
                <textarea class="form-control" name="message" placeholder="Message"
                    style="height:120px;"></textarea><br>
                <input type="submit" class="btn btn-primary" value="send" name="Send" style="font-weight: bold;"><br><br>
            </form>
        </div>
        <!-- Start contact us offline address section -->
        <div class="stripe col-md-4 text-white text-center">
            <h4>E-learning Platform</h4>
            <p>E-learning Platform,<br />
                Vansda - 396580<br />
                elearning083@gmail.com</p>
        </div>
        <!-- End contact us offline address section -->
    </div>
</div>
<!-- End Contact-Us Section -->