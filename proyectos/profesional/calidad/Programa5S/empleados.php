<?php if(!isset($_SESSION['usuario']))
		session_start();  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Empleados</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
	<?php
	include("funcionesPhp/conexionSql.php");
	include("funcionesPhp/Cdepartamento.php");
	include("funcionesPhp/Cempleado.php");
	include("funcionesPhp/Crevision.php");
	include("funcionesPhp/Cpermisos.php");
	
	$numEmpleados=0;
	$miDep=$_GET["dep"]; 
	$nombreDepartamento=obtenerNombreDepartamento($miDep);
	$empleados=obtenerEmpleados($miDep);
	?> 
	<script type="text/javascript">	
	function popUpEmpleados(URL)
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
    <td class="titulo2">Programa de 5 S </td>
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
		$empleado=esEmpleado($_SESSION['usuario']);
		$pertenece=perteneceAlDepartamento($_SESSION['usuario'],$miDep);
		$aceptado=0;
		
		if(($directorDep==1)&&($pertenece==1))
			$aceptado=1;
		else
		if(($administrador==1)||($consultor==1))
			$aceptado=1;
		else
		if(($empleado==1)&&($pertenece==1))
			$aceptado=1;
		
		if($aceptado==1)
		{
			?>
			  <tr>
			  <?php
				if(($administrador==1)||($consultor==1)||($directorDep==1))
				{
			  ?>
				    <td width="450"><img src="imagenes/atras.png" width="20" height="20"> <a href="departamentos.php" class="mylink1">Ver Departamentos</a></td>
			        <?php
				}
				else
				{
					echo("<td width='450'>&nbsp;</td>");
				}
 			?>
			    <td width="450" colspan="2"><div align="right"><a href="../index.php" class="mylink1">Terminar Sesi&oacute;n<img src="imagenes/salir.png"></a></div></td>
			  </tr>
			  <tr>
                <td colspan="2"><hr></td>
  </tr>
			  <tr>
			    <td class="texto">Selecciona un &Aacute;rea: </td>
			    <td>&nbsp;</td>
  </tr>
			  <tr>
				<td width="450" class="marca">&nbsp;</td>
				<td width="450" class="texto2"><strong>Departamento: <?php echo($nombreDepartamento);?> </strong></td>
			  </tr>
			  <tr>
				<td colspan="2">
				<?php
				if(($empleado==1)&&($pertenece==1))
				{
				?>
					<!-- VISTA DE EMPLEADO -->
					<table border="0" align="center" cellspacing="20" id="empleados">
					  <tr>
						<?php
						for($i=1; $i<=$empleados[0]; $i++)
						{
							$nombre=$empleados[$i];
							$i++;
							$nomina=$empleados[$i];
							$i++;
							$area=$empleados[$i];
							$i++;
							$promedio=$empleados[$i];
							
							if($nomina==$_SESSION['usuario'])
							{
						?>
						<td><table width="260" height="180" border="0" align="center" cellspacing="5" background="imagenes/cuadroEmpleado.png" class="observaciones" id="empleado1">
						  <tr>
							<td width="81"><strong>&Aacute;rea(s):</strong></td>
							<td colspan="2"><?php echo($area);?> </td>
						  </tr>
						  <tr>
							<td><strong>Nombre:</strong></td>
							<td colspan="2"><?php echo($nombre);?></td>
						  </tr>
						  <tr>
							<td><strong>Usuario:</strong></td>
							<td width="93"><?php echo($nomina);?></td>
						  <td width="60" rowspan="2" align="right"><?php if($promedio!=0)
									{	?>
                                <a href="evaluacion.php?nomina=<?php echo($nomina);?>&dep=<?php echo($miDep);?>"> <img src="imagenes/verRevision.png" alt="Ver Evaluaci&oacute;n" border="0"> </a>
                                <?php }	?>
                            </td>
						  </tr>
						  <tr>
							<td><strong>Promedio:</strong></td>
							<td><strong>
							<?php if($promedio==0) {$promedio='No Evaluado';} echo($promedio);?>
							</strong>
							<div align="left"></div></td>
						  </tr>
						</table>
						</td>
						<?php
							$numEmpleados++;
							if($numEmpleados==3)
							{
								echo("</tr>");
								echo("<tr>");
								$numEmpleados=0;
							}
						}//end if
					}//end for
						?>
					  </tr>
					</table>
					<!-- FIN VISTA DE EMPLEADO -->									
				<?php				
				}
				else
				{
				?>
				<!-- VISTA DE ADMINISTRADOR, CONSULTOR, DIRECTOR DE DEPARTAMENTO -->
					<table border="0" align="center" cellspacing="20" id="NoEmpleados">
					  <tr>
						<?php
						for($i=1; $i<=$empleados[0]; $i++)
						{
							$nombre=$empleados[$i];
							$i++;
							$nomina=$empleados[$i];
							$i++;
							$area=$empleados[$i];
							$i++;
							$promedio=$empleados[$i];
						?>
						<td><table width="260" height="180" border="0" align="center" cellspacing="5" background="imagenes/cuadroEmpleado.png" class="observaciones" id="empleado1">
						  <tr>
							<td width="81"><strong>&Aacute;rea(s):</strong></td>
							<td width="149" colspan="2"><?php echo($area);?> </td>
						  </tr>
						  <tr>
							<td><strong>Nombre:</strong></td>
							<td colspan="2"><?php echo($nombre);?></td>
						  </tr>
						  <tr>
							<td><strong>Usuario:</strong></td>
							<td><?php echo($nomina);?></td>
						  <td rowspan="2" align="right"><?php if($promedio!=0)
									{	?>
                                <a href="evaluacion.php?nomina=<?php echo($nomina);?>&dep=<?php echo($miDep);?>"> <img src="imagenes/verRevision.png" alt="Ver Evaluaci&oacute;n" border="0"> </a>
                                <?php }	
									else if($administrador==1)
									{	?>
                                <a href="evaluacion.php?nomina=<?php echo($nomina);?>&dep=<?php echo($miDep);?>"> <img src="imagenes/verRevision.png" alt="Ver Evaluaci&oacute;n" border="0"> </a>
                                <?php }	?>
                            </td>
						  </tr>
						  <tr>
							<td><strong>Promedio:</strong></td>
							<td><strong>
							<?php if($promedio==0) {$promedio='No Evaluado';} echo($promedio);?>
							</strong>
							<div align="left"></div></td>
						  </tr>
						</table>
						<?php
						if(($administrador==1))
								{
									$linkModificar="javascript:popUpEmpleados('control_empleados.php?opcion=2&nomina=$nomina&dep=$miDep')";
									$linkEliminar="javascript:popUpEmpleados('control_empleados.php?opcion=3&nomina=$nomina&dep=$miDep')";
								?>
							  <table width="100" border="0" align="center" cellspacing="5" id="administrador">
								<tr>
								  <td><div align="center"><a href="<?php echo($linkModificar);?>"><img src="imagenes/modificar.png" alt="Modificar Empleado" width="15" height="15" border="0"></a></div></td>
								  <td><div align="center"><a href="<?php echo($linkEliminar);?>"><img src="imagenes/eliminar.png" alt="Eliminar Empleado" width="15" height="15" border="0"></a></div></td>
								</tr>
							  </table>
								<?php
								}  
								?>
						</td>
						<?php
							$numEmpleados++;
							if($numEmpleados==3)
							{
								echo("</tr>");
								echo("<tr>");
								$numEmpleados=0;
							}
						}
						?>
					  </tr>
					</table>
					<!-- FIN VISTA DE ADMINISTRADOR, CONSULTOR, DIRECTOR DE DEPARTAMENTO -->				
				<?php	
				}
				?>
				</td>
			  </tr>
			  <tr>
			  	<?php
				if(($administrador==1))
				{
				?>
                	<td colspan="2" class="observaciones" align="right">
            		<a href="javascript:popUpEmpleados('control_empleados.php?opcion=1&dep=<?php echo($miDep);?>')" class="mylink1">
					<img src="imagenes/agregar.png" width="15" height="15">Agregar &Aacute;rea </a>
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
			echo("<td align='center'><h3><img src='imagenes/error.png'>No tienes permiso de ver esta p&aacute;gina.</h3></td>"."<br>".$aceptado);
		}
 	}
	else
	{
		echo("<td align='center'><h3><img src='imagenes/error.png'>No has iniciado sesi&oacute;n correctamente.</h3></td>");
	}
	?>  
</table>
</body>
</html>
