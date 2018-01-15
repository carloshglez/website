<?php  
session_start(); 
//Iniciamos o retomamos la 
//sesión 
if(isset($_SESSION['carro'])) 
$carro=$_SESSION['carro'];else $carro=false; 
//La asignamos a la variable 
//$carro si existe o ponemos a false $carro 
//en caso contrario 
?> 
<html> 
<head> 
<title>ENVIAR COMPRAS DE PRODUCTOS</title> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<script type="text/javascript">
function cerrarVentana()
	{
		window.close();
	}
</script>

<style type="text/css">
<!--
@import url("../css/estilos.css");
@import url("../css/estilos2.css");
-->
</style>
</head> 
<body>
<?php
$resultado="<h4><img src=vercarrito.gif width=24 height=21> Su compra ha sido realizada <img src=vercarrito.gif width=24 height=21></h4>";
session_destroy();

	/*$asunto="Tienda de Peliculas";
	$destinatario=$_POST['correo'];
	$nombre=$_POST['nombre'];
	$mensaje="Estimado(a) cliente ".$nombre.":\n".$_POST['mensaje']."\n";
	$headers = "From: tiendaPeliculas@dominio.com\r\n"."MIME-Version: 1.0\n"."Content-type: text/plain; charset=iso-8859-1"; 

	$resultado="";
	
	if( mail($destinatario,$asunto,$mensaje,$headers) )
	{
		$resultado="<h4><img src=vercarrito.gif width=24 height=21> Su compra ha sido realizada <img src=vercarrito.gif width=24 height=21></h4>";
	}
	else
	{
	$resultado="<h4><img src=vercarrito.gif width=24 height=21> Su compra no ha sido enviada <img src=vercarrito.gif width=24 height=21></h4>";
	}
*/
	?>
<table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF" align="center"><?php print($resultado) ?>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF" id="clave">Cerrar <a href="javascript:cerrarVentana()"> <img src="continuar.gif" alt="Cerrar Ventana" width="13" height="13" border="0"></a></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>

</body> 
</html>
