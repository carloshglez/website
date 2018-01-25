<?php if(!isset($_SESSION['usuario']))
		session_start();  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Validaci&oacute;n</title>
<link href="Programa5S/estilos.css" rel="stylesheet" type="text/css">
<?php
	include("Programa5S/funcionesPhp/conexionSql.php");
	include("Programa5S/funcionesPhp/Cvalidacion.php");
	include("Programa5S/funcionesPhp/Cpermisos.php");
	include("Programa5S/funcionesPhp/Cdepartamento.php");
	
	$nomina=$_POST['nomina'];
	$clave=$_POST['clave'];	
	$_SESSION['usuario']=$nomina;
?>
</head>

<body>
<table width="900" border="0" align="center">
  <tr>
    <td width="900"><img src="Programa5S/imagenes/encabezado.jpg" width="900" height="96"></td>
  </tr>
  <tr>
    <td><hr></td>
  </tr>
  <tr>
    <td align="center">
	<?php
	if(isset($_SESSION['usuario']))
	{	
		//$permitirAcceso=validaEmpleadoContraDirectorio($_SESSION['usuario'],$clave);
		$permitirAcceso = esAdministrador($_SESSION['usuario']) ||
						esConsultor($_SESSION['usuario']) ||
						esDirectorDepartamento($_SESSION['usuario']) ||
						esEmpleado($_SESSION['usuario']);

		if($permitirAcceso==true)
		{
			$administrador=esAdministrador($_SESSION['usuario']);
			$consultor=esConsultor($_SESSION['usuario']);
			$directorDep=esDirectorDepartamento($_SESSION['usuario']);
			$empleado=esEmpleado($_SESSION['usuario']);
			
			//$accesoProcesos=tieneAccesoProcesos($_SESSION['usuario']);
			
			$mensaje="<h2>Bienvenido al Sistema de Calidad</h2><br>";
			
			if($administrador==1)
			{
				echo($mensaje."Has ingresado como Administrador<br>");
				echo("<a href='programas.php' class='mylink1'><img src='Programa5S/imagenes/alerta_big.png'><br>Continuar</a>");
			}
			else if($consultor==1)
			{
				echo($mensaje);
				echo("<a href='programas.php' class='mylink1'>Continuar</a>");
			}
			else if($directorDep==1)
			{
				echo($mensaje);
				echo("<a href='programas.php' class='mylink1'>Continuar</a>");
			}
			else if($empleado==1)
			{
				$miDep=obtenerDepartamento($nomina);
				echo($mensaje);
				echo("<a href='programas.php' class='mylink1'>Continuar</a>");
			}
			else if($accesoProcesos==1)
			{
				echo($mensaje);
				echo("<a href='programas.php' class='mylink1'>Continuar</a>");
			}
			else
			{
				echo("<h3><img src='Programa5S/imagenes/error.png'>No estas registrado en el sistema.</h3><br>");
			}
		}
		else if($permitirAcceso==false)
		{
			echo("<h3><img src='Programa5S/imagenes/error.png'>Acceso denegado.</h3><br>");
		}
	}
	else
	{
		echo("<h3><img src='Programa5S/imagenes/error.png'>No has iniciado sesión correctamente.</h3><br>");
	}
	?>
	</td>
  </tr>
</table>
</body>
</html>
