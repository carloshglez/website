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
<title>ENVIAR COMPRA DE PRODUCTOS</title> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<script type="text/javascript" src="../js/validaciones.js"></script>
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
<table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" align="center" bgcolor="#FFFFFF"><h4><img src="vercarrito.gif" alt="" width="24" height="21"> Realizar la compra <img src="vercarrito.gif" width="24" height="21"></h4></td>
  </tr>
  <tr>
    <td width="275" bgcolor="#FFFFFF" style="font-size:10px"><?php  
	$compras="Usted a comprado los sigientes productos:<br>";
if($carro){ 
foreach($carro as $k => $v){ 
	$compras .= "------------------------------------------------------<br>";
	$compras .= "Producto: ".$v['producto']."<br>";
	$compras .= "Precio unitario: $".number_format($v['precio'],2)."<br>";
	$compras .= "Cantidad: ".$v['cantidad']."<br>";	
		$subto=$v['cantidad']*$v['precio'];
	$compras .= "Subtotal: ".number_format($subto,2)."<br>";	
		$suma=$suma+$subto;
}
	$compras .= "**************************************<br>";
	$compras .= "<b>TOTAL: $".number_format($suma,2)."</b><br>";	
	print($compras);
}
?>
      </td>
    <td width="275" align="center" bgcolor="#FFFFFF"><form name="enviarCompra" method="post" onSubmit="return validarEnvio(this)" action="enviado.php">
      <table width="260" border="0" cellspacing="0" cellpadding="5" style="font-size:12px">
        <tr>
          <td width="110" align="center">Nombre:</td>
          <td width="160"><input type="text" name="nombre" id="nombre"></td>
        </tr>
        <tr>
          <td align="center">E-mail:</td>
          <td><input type="text" name="correo" id="correo"></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="hidden" name="mensaje" id="mensaje" value="<?php print($compras) ?>">
          <input type="submit" value="Enviar"></td>
        </tr>
      </table>
      <br>
</form></td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#FFFFFF" id="clave">Cerrar <a href="javascript:cerrarVentana()"> <img src="continuar.gif" alt="Cerrar Ventana" width="13" height="13" border="0"></a></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
</body> 
</html>
