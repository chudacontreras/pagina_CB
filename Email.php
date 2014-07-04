<?php
require("C:\Servidor\www\phpMailer\class.phpmailer.php");
$mail = new phpMailer();
$mail->Host = "mail.cantv.net";
$mail->From = "webmaster@consulbank.net";
$mail->FromName = "WebMaster";
$mail->Subject = "Registro";
$mail->AddAddress("j_contreras@consulbank.net","Jesus");
$mail->AddAddress("chudacontreras@gmai.com","chuda"); 
$mail->AddCC("l_lemus@consulbank.net");
$mail->AddBCC("j_contreras@consulbank.net"); 
$body  = "Hola <strong>amigo</strong><br>";
$body .= "probando <i>PHPMailer<i>.<br><br>";
$body .= "<font color='red'>Saludos</font>";
$mail->Body = $body;
$mail->AltBody = "Hola amigo\nprobando PHPMailer\n\nSaludos"; 

//$mail->AddAttachment("footer_bg.gif");
//$mail->AddAttachment("files/demo.zip", "demo.zip"); 
$mail->Send(); 
?> 