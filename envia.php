<html>
<head>
<title>envia</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
// Verifico si vienen los valores

$ingreso_todo = "S";
if (empty($nombre))
{
echo("No ingreso Nombre<br>");
$ingreso_todo = "N";
}
if (empty($apellido))
{
echo("No ingreso Pais<br>");
$ingreso_todo = "N";
}
if (empty($correo))
{
echo("No ingreso E-mail<br>");
$ingreso_todo = "N";
}
if (empty($asunto))
{
echo("No ingreso Asunto<br>");
$ingreso_todo = "N";
}
if (empty($tema))
{
echo("No ingreso Mensaje<br>");
$ingreso_todo = "N";
}

if ($ingreso_todo == "S")
{
$Cuerpo_mensaje = "From: registro:\n "."nombre: ".$nombre."\n"."Apellido: ".$apellido."\n"."email: ".$correo."\n"."Asunto: ".$asunto."\n"."Mensaje: " .$tema;
mail("info@consulbank.net", "Enviado por: $nombre", $Cuerpo_mensaje);
mail("j_contreras@consulbank.net", "Enviado por: $nombre", $Cuerpo_mensaje);
mail("l_lemus@consulbank.net", "Enviado por: $nombre", $Cuerpo_mensaje);
echo "Gracias por escribirnos, le responderemos lo antes posible.";
}
else
{
echo("Vuelava atrás e intentelo nuevamente");
}
?>
<a href="registro.html"/>Volver</a>
</body>
</html>


