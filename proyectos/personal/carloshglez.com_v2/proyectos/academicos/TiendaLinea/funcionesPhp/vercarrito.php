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
<title>PRODUCTOS AGREGADOS AL CARRITO</title> 
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
<table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" bgcolor="#FFFFFF"><h4><img src="vercarrito.gif" alt="" width="24" height="21"> Carrito de compras <img src="vercarrito.gif" width="24" height="21"></h4></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><?php  
if($carro){ 
//si el carro no est&aacute; vac&iacute;o, 
//mostramos los productos  
?>
      <table border="0" cellspacing="0" cellpadding="0" align="center" id="carrito">
        <tr bgcolor="#333333">
          <td width="100" align="center" bgcolor="#7DA8C8"><strong>Producto</strong></td>
          <td width="100" align="center" bgcolor="#7DA8C8"><strong>Precio</strong></td>
          <td colspan="2" align="center" bgcolor="#7DA8C8"><strong>Cantidad de Unidades</strong></td>
          <td width="80" align="center" bgcolor="#7DA8C8"><strong>Borrar</strong></td>
          <td width="80" align="center" bgcolor="#7DA8C8"><strong>Actualizar</strong></td>
        </tr>
        <?php 
$color=array("#ffffff","#F0F0F0"); 
$contador=0; 
//las 2 l&iacute;neas anteriores 
//sirven s&oacute;lo para hacer 
//una tabla con colores  
//alternos 
$suma=0; 
//antes de recorrer todos 
//los valores de la matriz 
//$carro, ponemos a cero la 
//variable $suma, en la que 
//iremos sumando los subtotales 
//del costo de cada item por la 
//cantidad de unidades que se 
//especifiquen  
foreach($carro as $k => $v){ 
//recorremos la matriz que tiene 
//todos los valores del carro,  
//calculamos el subtotal y el 
// total  
$subto=$v['cantidad']*$v['precio'];
$suma=$suma+$subto;
$contador++; 
//este es el contador que usamos 
//para los colores alternos  
?>
        <form name="a<?php echo $v['identificador'] ?>" method="post" action="actualizarcar.php?<?php echo SID ?>" id="a<?php echo $v['identificador'] ?>">
          <tr bgcolor="<?php echo $color[$contador%2]; ?>">
            <td align="center"><?php echo $v['producto'] ?></td>
            <td align="center">$<?php echo $v['precio'] ?></td>
            <td width="50" align="center"><?php echo $v['cantidad'] ?></td>
            <td width="100" align="center"><input name="cantidad" type="text" id="cantidad" value="<?php echo $v['cantidad'] ?>" size="8">
              <input name="id" type="hidden" id="id" value="<?php echo $v['id'] ?>"></td>
            <td align="center"><a href="borracar.php?<?php echo SID ?>&id=<?php echo $v['id'] ?>"><img src="trash.gif" width="12" height="14" border="0" title="Quitar del Carrito"></a></td>
            <td align="center"><input name="imageField" type="image" src="actualizar.gif" width="20" height="20" border="0" title="Actualizar"></td>
          </tr>
        </form>
        <?php 
//por cada item creamos un 
//formulario que submite a 
//agregar producto y un link 
//que permite eliminarlos  
} 
?>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><div align="center" id="clave">Total de Art&iacute;culos: <?php echo count($carro); 
//el total de items va a ser igual 
//a la cantidad de elementos que 
//tenga la matriz $carro, valor 
//que obtenemos con la funci&oacute;n 
//count o con sizeof  
 ?> </div>
      <br>
      <div align="center" id="clave"><b>Total: $<?php echo number_format($suma,2); 
//mostramos el total de la variable 
//$suma formate&aacute;ndola a 2 decimales  
?> </b></div>
      <br>
      <div align="center" id="clave">
      Cerrar <a href="javascript:cerrarVentana()"> <img src="continuar.gif" alt="Cerrar Ventana" width="13" height="13" border="0"></a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Realizar la compra <a href="enviarCompra.php"> <img src="continuar.gif" alt="Cerrar Ventana" width="13" height="13" border="0"></a>
      </div>
      <?php }else{ ?>
      <div align="center" id="clave"> No hay productos seleccionados <a href="javascript:cerrarVentana()"> <img src="continuar.gif" alt="Cerrar Ventana" width="13" height="13" border="0"></a>
        <?php }?>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
<div align="center"></div>
</body> 
</html>
