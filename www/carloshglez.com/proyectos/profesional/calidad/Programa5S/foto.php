<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Foto</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
<?php
	include("funcionesPhp/conexionSql.php");
	include("funcionesPhp/Crevision.php");
	
	$ruta="/proyectos/profesional/calidad/Programa5S/Fotos5s/";
	
	$id=$HTTP_GET_VARS[id];
	$revision=obtenerEvaluacion($id);
		$nomina=$revision[1];
		$fecha=$revision[2];
		$clasificar=$revision[3];
		$ordenar=$revision[4];
		$limpieza=$revision[5];
		$estandarizar=$revision[6];
		$calificacion=$revision[7];
		$disciplina=$revision[8];
		$foto=$ruta.$revision[9];
		$observaciones=$revision[10];
?>
</head>

<body>
<table width="600" border="1">
  <tr>
    <td class="observaciones"><strong>N&oacute;mina: </strong><?php echo($nomina);?></td>
    <td class="observaciones"><strong>Fecha: </strong><?php echo($fecha);?></td>
  </tr>
  <tr>
    <td colspan="2" class="observaciones"><div align="center"><img src="<? echo $foto ?>" width="640" height="480"></div></td>
  </tr>
</table>

</body>
</html>
