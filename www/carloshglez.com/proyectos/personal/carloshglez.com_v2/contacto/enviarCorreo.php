<?php
$remitente=$_POST['Nombre'];
$correrRemitente=$_POST['Correo'];
$msj=$_POST['Mensaje'];

	$destinatario="carlos_3349@hotmail.com";
	$asunto="Correo de Mi Sitio Web";
	$mensaje="Remitente: ".$remitente."\n";
	$mensaje.="Correo Remitente: ".$correrRemitente."\n\n";
	$mensaje.="El mensaje es:\n".$msj;


	if( mail($destinatario,$asunto,$mensaje) )
	{
		?>
		<img src="imagenes/correcto.png" width="25" height="25"/>
		Tu mensaje se ha enviado.<br>Gracias por escribir.
		<?php
	}
	else
	{
		?>
		<img src="imagenes/error.png" width="25" height="25"/>
		Tu mensaje no puede enviarse.
		<?php
	}
?>
