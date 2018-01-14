<?php if(!isset($_SESSION['usuario']))
		session_start();  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Control Sistema</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
<?php
	if(isset($_SESSION['usuario']))
	{
		include("funcionesPhp/conexionSql.php");
		include("funcionesPhp/Cdepartamento.php");
		include("funcionesPhp/Cempleado.php");
		include("funcionesPhp/Crevision.php");
		include("funcionesPhp/Cpermisos.php");		
		include("funcionesPhp/Celiminaciones.php");
		
		$opcion=$_GET["opcion"];
		$correcto=false;
		
		if($opcion==1)
		{
			$nomina=$_POST['nomina'];
			$nombre=$_POST['nombre'];
			$area=$_POST['area'];
			$id_dep=$_POST['departamento'];
			$id_permiso=$_POST['permisos'];
			
			$correcto1=insertarEmpleado($nomina,$nombre,$area,$id_dep);
			$correcto2=darPermisos($nomina,$id_permiso);
			
			if($correcto1&&$correcto2)
				$correcto=true;
		}
		else if($opcion==2)
		{
			$nomina=$_POST['nomina'];
			$nominaAnt=$_POST['nominaAnt'];
			$nombre=$_POST['nombre'];
			$area=$_POST['area'];
			$id_dep=$_POST['departamento'];
			$id_permiso=$_POST['permisos'];
			
			$correcto1=modificarEmpleado($nominaAnt,$nomina,$nombre,$area,$id_dep);
			$correcto2=modificarPermisos($nominaAnt,$nomina,$id_permiso);
			
			if($correcto1&&$correcto2)
				$correcto=true;
		}
		else if($opcion==3)
		{
			$nomina=$_POST['nomina'];
			$id_permiso=$_POST['permisos'];
			
			$correcto1=eliminarEvaluacionesEmpleado($nomina);
			$correcto2=eliminarEmpleado($nomina);
			$correcto3=quitarPermisos($nomina);
			
			if($correcto1&&$correcto2&&correcto3)
				$correcto=true;
		}
	}
?>
<script type="text/javascript">	
	function actualizar()
	{
		window.close();
		opener.document.location.reload(); 
	}
</script>
</head>

<body>
<table width="900" border="0" align="center">
  <tr>
    <td colspan="2"><img src="imagenes/encabezado.jpg" width="900" height="96"></td>
  </tr>
  <tr>
    <td width="450" class="titulo2">Programa de 5 S </td>
    <td class="texto"><div align="right">Sistema de Calidad </div></td>
  </tr>
  <tr>
    <td><div align="left">Sistema de mejora continua</div></td>
    <td class="titulo4">EMPRESA</td>
  </tr>
  <tr>
    <td colspan="2" class="titulo1"><hr></td>
  </tr>
  <tr>
    <td width="450" class="titulo1">&nbsp;</td>
    <td width="450" class="titulo2">&nbsp;</td>
  </tr>
    <?php
	  if(isset($_SESSION['usuario']))
	  {
		$administrador=esAdministrador($_SESSION['usuario']);
		if($administrador==1)
		{
			if($correcto==false)
			{
			?>
			  <tr>
				<td colspan="2"><div align="center" class="titulo3"><img src='imagenes/error.png'>Ha ocurrido un error en la operaci&oacute;n </div></td>
			  </tr>
			<?php
			}
			else
			{
			?>
			  <tr>
				<td colspan="2" class="titulo3">La operaci&oacute;n se realiz&oacute; exitosamente<img src='imagenes/info.png'></td>
			  </tr>
			<?php
			}
		}
		else
		{
			echo("<td align='center'><h3><img src='imagenes/error.png'>No tienes permiso de ver esta p�gina.</h3></td>");
		}
 	}
	else
	{
		echo("<td align='center'><h3><img src='imagenes/error.png'>No has iniciado sesi�n correctamente.</h3></td>");
	}			
			?>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center"><a href="javascript:actualizar()" class="mylink1">Cerrar</a></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
