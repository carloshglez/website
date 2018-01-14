<?php
$nombre = $_POST['nombre'];
$mail = $_POST['mail'];
$empresa = $_POST['escuela'];

$header = 'From: ' . $mail . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Este mensaje fue enviado por " . $nombre . ", de la escuela " . $escuela . " \r\n";
$mensaje .= "Su e-mail es: " . $mail . " \r\n";
$mensaje .= "Mensaje: " . $_POST['mensaje'] . " \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());

$para = 'alcienporciento@hotmail.com';
$asunto = 'Contacto desde la página del sitio';

mail($para, $asunto, utf8_decode($mensaje), $header);

echo '&estatus=ok&';

?>