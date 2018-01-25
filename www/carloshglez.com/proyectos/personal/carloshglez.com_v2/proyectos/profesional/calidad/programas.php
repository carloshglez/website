<?php if(!isset($_SESSION['usuario']))
		session_start();  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Programas</title>
<link href="Programa5S/estilos.css" rel="stylesheet" type="text/css">
<?php
	include("Programa5S/funcionesPhp/conexionSql.php");
	include("Programa5S/funcionesPhp/Cpermisos.php");
	include("Programa5S/funcionesPhp/Cdepartamento.php");
?>
<script type="text/javascript">	
	function popUpPermisosSistemaProcesos(URL)
	{
		day = new Date();
		id = day.getTime();
		eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=940,height=600,left=100,top=100');");
	}
	</script>
</head>

<body>
<table width="910" border="0" align="center">
  <tr>
    <td colspan="2"><img src="Programa5S/imagenes/encabezado.jpg" width="900" height="96"></td>
  </tr>
  <tr>
    <td class="texto">&nbsp;</td>
    <td class="texto"><div align="right">Sistema de Calidad </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="titulo4">EMPRESA</td>
  </tr>
  <tr>
    <td colspan="2"><hr></td>
  </tr>
    <?php
  if(isset($_SESSION['usuario']))
	{
		$administrador=esAdministrador($_SESSION['usuario']);
		$consultor=esConsultor($_SESSION['usuario']);
		$directorDep=esDirectorDepartamento($_SESSION['usuario']);
		$empleado=esEmpleado($_SESSION['usuario']);

		$accesoProcesos=0;
		
		if(($administrador==1)||($consultor==1)||($directorDep==1))
		{
			$acceso5s=1;
			$enlace="Programa5S/departamentos.php";
		}
		else if($empleado==1){
			$acceso5s=1;
			$miDep=obtenerDepartamento($_SESSION['usuario']);
			$enlace="Programa5S/empleados.php?dep=$miDep";
			}
			
		if(($administrador==1)||($consultor==1)||($directorDep==1)||($empleado==1)||($accesoProcesos==1))
		{
			
			if($administrador==1)
				$tipoUsuario=1;
			else
				$tipoUsuario=2;
			
			?>
		  <tr>
		    <td class="titulo1">&nbsp;</td>
		    <td width="450"><div align="right"><a href="index.php" class="mylink1">Terminar Sesi&oacute;n <img src="Programa5S/imagenes/salir.png"></a></div></td>
  </tr>
		  <tr>
            <td colspan="2"><hr></td>
  </tr>
		  <tr>
			<td width="450" class="titulo1">Selecciona un Programa:</td>
			<td width="450">&nbsp;</td>
		  </tr>
		  <!--<tr>
			<td colspan="2">&nbsp;</td>
		  </tr>-->
		  <tr>
			<td colspan="2"><table width="255" border="0" align="center" cellspacing="0" cellpadding="20">
			  <tr>
				<?php
					if($acceso5s==1)
					{
				?>
				<td><a href="<?php echo($enlace)?>"><img src="Programa5S/imagenes/cuadro5S.png" width="250" height="229" border="0"></a><br><br><br></td>
				<?php
					}
					if($acceso5s!=1&&$accesoProcesos!=1)
					{
						echo("<td>No estas registrado en ningún programa.</td>");
					}
				?>
			  </tr>
			  
			</table></td>
		  </tr>
		  <!--<tr>
		    <td colspan="2">&nbsp;</td>
		  </tr>-->
		  <tr>
            <td colspan="2"><hr></td>
  </tr>
		  <?php
		}
		else
		{
			echo("<td align='center'><h3><img src='Programa5S/imagenes/error.png'>No tienes permiso de ver esta página.</h3></td>");
		}
 	}
	else
	{
		echo("<td align='center'><h3><img src='Programa5S/imagenes/error.png'>No has iniciado sesión correctamente.</h3></td>");
	}
	?>
</table>
</body>
</html>
