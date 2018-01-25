<?php if(!isset($_SESSION['usuario']))
		session_start();  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Departamentos</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
<?php
	include("funcionesPhp/conexionSql.php");
	include("funcionesPhp/Cdepartamento.php");
	include("funcionesPhp/Crevision.php");
	include("funcionesPhp/Cpermisos.php");
	$departamentos=obtenerDepartamentos();
	$numDepartamentos=0;
?>
	<script type="text/javascript">	
	function popUpDepartamentos(URL)
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
    <td colspan="2"><hr></td>
  </tr>
      <?php
  if(isset($_SESSION['usuario']))
	{
		$administrador=esAdministrador($_SESSION['usuario']);
		$consultor=esConsultor($_SESSION['usuario']);
		$directorDep=esDirectorDepartamento($_SESSION['usuario']);
		$idDep=obtenerDepartamento($_SESSION['usuario']);
				
		if(($administrador==1)||($consultor==1)||($directorDep==1))
		{
			?>
		  <tr>
		  <?php
			if(($administrador==1)||($consultor==1))
			{
		  ?>
			<td width="450"><img src="imagenes/atras.png" width="20" height="20"> <a href="../programas.php" class="mylink1">Ver Programas </a></td>
		  <?php
			}
			else
			{
				echo("<td width='450'>&nbsp;</td>");
			}
			?>
		    <td width="450"><div align="right"><a href="../index.php" class="mylink1">Terminar Sesi&oacute;n <img src="imagenes/salir.png"></a></div></td>
  			</tr>
		  <tr>
            <td colspan="2"><hr></td>
  </tr>
		  <tr>
			<td width="450" class="titulo1">Selecciona un Departamento:</td>
			<td width="450">&nbsp;</td>
		  </tr>
		  <tr>
			<td colspan="2"><table border="0" align="center" cellspacing="10">
			  <tr>
				<?php
				for($i=1; $i<=$departamentos[0]; $i++)
				{
					$id_dep=obtenerIdDepartamento($departamentos[$i]);
				?>
					<td width="249" height="72" colspan="2" background="imagenes/cuadroDepartamentos.png"><div align="center" class="texto2">
					<?php if(($directorDep==1)&&(perteneceAlDepartamento($_SESSION['usuario'],$id_dep)==1))
						{	?>
							<a href="empleados.php?dep=<?php echo($id_dep)?>" class="mylink1"><?php print_r($departamentos[$i]);?></a>
					<?php }
						else if(($administrador==1)||($consultor==1))
						{	?>
							<a href="empleados.php?dep=<?php echo($id_dep)?>" class="mylink1"><?php print_r($departamentos[$i]);?></a>
					<?php }
						else{
							print_r($departamentos[$i]);
							}?>
							</div><div align="center" class="observaciones"><strong>&lt;&lt; <?php evaluacionDepartamento($id_dep); ?> &gt;&gt;</strong> </div></td>
							
		              		<?php
						if(($administrador==1))
						{
							$linkModificar="javascript:popUpDepartamentos('control_departamentos.php?opcion=2&dep=$id_dep')";
							$linkEliminar="javascript:popUpDepartamentos('control_departamentos.php?opcion=3&dep=$id_dep')";
						?>
							<td height="72">
								<a href="<?php echo($linkModificar);?>">
									<img src="imagenes/modificar.png" alt="Modificar Departamento" width="15" height="15" border="0">
								</a>
								<br>
								<a href="<?php echo($linkEliminar);?>">
									<img src="imagenes/eliminar.png" alt="Eliminar Departamento" width="15" height="15" border="0">
								</a>
							</td>
						<?php
						}  
						?>
						
				<?php
					$numDepartamentos++;
					if($numDepartamentos==3)
					{
						echo("</tr>");
						echo("<tr>");
						$numDepartamentos=0;
					}
				}
				?>
			  </tr>
			</table></td>
		  </tr>
		  <tr>
			<?php
			if(($administrador==1))
			{
			?>
               	<td colspan="2" class="observaciones" align="right">
            	<a href="javascript:popUpDepartamentos('control_departamentos.php?opcion=1')" class="mylink1">
				<img src="imagenes/agregar.png" width="15" height="15">Agregar Departamento </a>
				</td>
		    <?php
			}  
			?>
		  </tr>
		   <tr>
            <td colspan="2"><hr></td>
		  </tr>
		  <?php
		}
		else
		{
			echo("<td align='center'><h3><img src='imagenes/error.png'>No tienes permiso de ver esta página.</h3></td>");
		}
 	}
	else
	{
		echo("<td align='center'><h3><img src='imagenes/error.png'>No has iniciado sesión correctamente.</h3></td>");
	}
	?>  
</table>
</body>
</html>
