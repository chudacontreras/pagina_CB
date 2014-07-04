<?php       

include("C:\Servidor\www\phpMailer\class.phpmailer.php");
include("C:\Servidor\www\phpMailer\class.smtp.php");

function validaLongitud($valor, $permiteVacio, $minimo, $maximo)
{
	$cantCar=strlen($valor);
	if(empty($valor))
	{
		if($permiteVacio) return TRUE;
		else return FALSE;
	}
	else
	{
		if($cantCar>=$minimo && $cantCar<=$maximo) return TRUE;
		else return FALSE;
	}
}

function validaCorreo($valor)
{
	if(eregi("([a-zA-Z0-9._-]{1,30})@([a-zA-Z0-9.-]{1,30})", $valor)) return TRUE;
	else return FALSE;
}


if($_POST)
{
	foreach($_POST as $clave => $valor) $$clave=addslashes(trim(utf8_decode($valor)));
	sleep(5);
	if(!validaLongitud($nombre, 0, 4, 50)) $error=1;
	if(!validaLongitud($empresa, 1, 4, 50)) $error=1;
	if(!validaLongitud($telefono, 1, 4, 50)) $error=1;
	if(!validaCorreo($correo)) $error=1;
	if(!validaLongitud($comentarios, 0, 5, 500)) $error=1;
	
	if($error==1) echo "Error";
	else
	{
		$fecha=date("d/m/y - H:i");
		$mensaje="
		Tienes un nuevo mensaje desde el Sitio:<br><br>
		Fecha: $fecha <br>
		Nombre: $nombre <br>
		Telefono: $telefono <br>
		Correo electrónico: $correo <br><br>
		Comentarios: $comentarios";
		//mail("edanps@gmail.com", "Comentario desde la Web", $mensaje, "From: Sitio Web <servicios@formatoweb.com.ar>");
        $mail = new PHPMailer();
        $mail->IsSMTP(); // SMTP
        $mail->Host = "mail.cantv.net"; // SMTP server
        $mail->SMTPAuth = true;     // autenticacion ON
        $mail->Username = "j_contreras@consulbank.net";  // USERNAME
        $mail->Password = "11235813"; // SMTP password
        $mail->From = "webmaster@consulbank.net"; //direccion remitente
        $mail -> FromName = $nombre." ".$correo; //nombre remitente
      //  $mail->AddAddress("webmaster@alcaldiadebarquisimeto.gov.ve"); // direccion Destino
		$mail->AddAddress("chudacontreras@gmail.com"); // direccion Destino
		//$mail->AddAddress($correo); // direccion Destino
        $mail->Subject = "Registro";
        $mail->Body = $mensaje;
        $mail->WordWrap = 50;
        $mail->AltBody  =  "";
        $mail->IsHTML(true); 

        //Aqui se manda el mail
        if(!$mail->Send())
        {
            echo("<h1 align='center'>Error al intentar enviar correo</h1><br>");
            echo 'Mailer error: ' . $mail->ErrorInfo;
			
			   
        }
        else
        {
		echo "OK";
		
            
        } 		
		
	}
}

 
?>