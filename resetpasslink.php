<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

   if(isset($_POST['sending'])){

    $email = $_POST['email'];

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
    $mail->setFrom('hareshkumavat49@gmail.com', 'Reset Password');
    $mail->addAddress("$email", 'my website');     //Add a recipient
   
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Subject : Reset Password";
    $mail->Body    = 'Click here to reset your password <a href="http://localhost/e-learning/newpassword.php">http://localhost/e-learning/newpassword.php</a>';
    

    $mail->send();
    echo '<span class="alert alert-success mailmsg">Message has been sent successfully. !</span>';
} catch (Exception $e) {
    echo '<span class="alert alert-danger mailmsg">Message could not be sent. !</span>';
}
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
           
        }
        .container {
            max-width: 400px;
            margin-top: 50px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            background-color: #fff;
        }
        h2 {
            font-size: 30px;
            color: #333;
            font-weight: bold;
            margin-bottom: 30px;
        }
       .note{
        margin-top: 5px;
        opacity: .5;
       }
       .btnsize{
        width: 300px;
        height: 50px;
       }
       .link{
        text-decoration: none;
       }
       .mailmsg{
        margin-left: 620px;
        top: 500px;
       }
        footer {
            margin-top: 30px;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Reset Your Password</h2>
        <form method="post">
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Enter your email address" required>
            </div>
            <div class="note">
            <small class="text">We will send you reset link to reset your password</small>
            </div><br>
            <button type="submit" class="btn btn-danger btnsize" name="sending">Send Reset Link</button>
        </form><br>
        <a href="index.php" class="link">Back to Home</a>
        <footer>© 2024 E-Learning. All rights reserved.</footer>
    </div>
</body>
</html>

