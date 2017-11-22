<?php
	session_start();
	include '../../includes/db-config.php';
	$code = rand(100000, 999999);
	$email=$_SESSION['email'];
	$_SESSION['code']=$code;

    require 'PHPMailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'duccas2017@gmail.com';                 // SMTP username
    $mail->Password = 'iit12345';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom('fnafis0@gmail.com', 'TigerNetBD');
    $mail->addAddress($email, '');


    $mail->IsHTML(true);
    $mail->Subject = "TigerNetBD recovery code";
    $mail->Body = "
			Here is your recovery code $code .<br><br>
			Thank you";
    if (!$mail->Send()) {
        echo "<script>alert('Something goes wrong.Try again!')</script>";
    } else {
        echo "<script>alert('Recovery code sent to your email.Check it!')</script>";
		echo"
		<script type='text/javascript'>
						window.location='sendRecoveryCode.php';            
					</script>";

    }
?>