<?php
$destinatario="informes@congresoingenieria.com";
$asunto="Correo C10";
$mensaje="Remitente: ".$_POST['txtNombre']."\n";
$mensaje.="Correo Remitente: ".$_POST['txtCorreo']."\n\n";
$mensaje.="El mensaje es:\n".$_POST['txtMensaje']."";

if (mail($destinatario,$asunto,$mensaje))
echo ("MENSAJE ENVIADO");
else
echo ("MENSAJE FALLIDO");
?>
