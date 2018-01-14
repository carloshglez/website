<?php if(!isset($_SESSION['usuario']))
		session_start();  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Revisi&oacute;n</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
	<?php
	include("funcionesPhp/conexionSql.php");
	include("funcionesPhp/Cdepartamento.php");
	include("funcionesPhp/Cempleado.php");
	include("funcionesPhp/Crevision.php");
	include("funcionesPhp/Cpermisos.php");

	$nomina=$_GET["nomina"];
	$nombre=obtenerDatoEmpleado($nomina,"nombre");
	$area=obtenerDatoEmpleado($nomina,"area");
	$tabla=evaluacionEmpleado($nomina);
	
	$renglones=sizeof($tabla);
	$columnas=sizeof($tabla[0]);
	$numRevisiones=$renglones-1;
	if($renglones>=1 && $columnas>=1)
		$promedio=$tabla[$renglones-1][$columnas-4];
	else
		$promedio=0;
	
	$miDep=$_GET["dep"];
	$nombreDepartamento=obtenerNombreDepartamento($miDep);
	?> 

	<script type="text/javascript">	
	function popUpObservaciones(URL)
	{
		day = new Date();
		id = day.getTime();
		eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=300,height=300,left=100,top=100');");
	}
	function popUpFoto(URL)
	{
		day = new Date();
		id = day.getTime();
		eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=670,height=670,left=100,top=100');");
	}
	function popUpRevisiones(URL)
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
    <td colspan="3"><img src="imagenes/encabezado.jpg" width="900" height="96"></td>
  </tr>
  <tr>
    <td class="titulo2">Programa de 5 S </td>
    <td colspan="2" class="texto"><div align="right">Sistema de Calidad </div></td>
  </tr>
  <tr>
    <td><div align="left">Sistema de mejora continua</div></td>
    <td colspan="2" class="titulo4">EMPRESA</td>
  </tr>
  <tr>
    <td colspan="3"><hr></td>
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

		if(($empleado==1)&&($pertenece==1))
		{
			if($nomina==$_SESSION['usuario'])
			$aceptado=1;
		}

		if(($directorDep==1)&&($pertenece==1))
			$aceptado=1;
		else
		if(($administrador==1)||($consultor==1))
		{
			$pertenece=perteneceAlDepartamento($nomina,$miDep);
			if($pertenece==1)
				$aceptado=1;
		}
		
		if($aceptado==1)
		{
			?>  
			  <tr>
					<td width="450">
						<img src="imagenes/atras.png" width="20" height="20"> <a href="empleados.php?dep=<?php echo($miDep)?>" class="mylink1">
					  <?php
						if($empleado==1)
						{
							echo("Regresar");
						}
						else
						{
							echo("Ver Áreas");
						}
						?>
						</a>
					</td>
			    <td colspan="2"><div align="right"><a href="../index.php" class="mylink1">Terminar Sesi&oacute;n<img src="imagenes/salir.png"></a></div></td>
			  </tr>
			  <tr>
                <td colspan="3"><hr></td>
			  </tr>
			  <tr>
			    <td class="texto">Tabla de Revisiones: </td>
			    <td colspan="2">&nbsp;</td>
			  </tr>
			  <tr>
				<td width="450" class="texto">&nbsp;</td>
				<td width="450" class="texto2"><strong>Departamento: <?php echo($nombreDepartamento);?> </strong></td>
			  </tr>
			  <tr>
			    <td><table width="300" height="130" border="0" align="center" cellspacing="5" background="imagenes/cuadroEmpleado2.png" id="empleado1">
                  <tr>
                    <td width="81" class="observaciones"><div align="left"><strong>&Aacute;rea(s):</strong></div></td>
                    <td width="149" class="observaciones"><div align="left"><?php echo($area);?> </div></td>
                  </tr>
                  <tr>
                    <td class="observaciones"><div align="left"><strong>Nombre:</strong></div></td>
                    <td class="observaciones"><div align="left"><?php echo($nombre);?></div></td>
                  </tr>
                  <tr>
                    <td class="observaciones"><div align="left"><strong>Usuario:</strong></div></td>
                    <td class="observaciones"><div align="left"><?php echo($nomina);?></div></td>
                  </tr>
                  <tr>
                    <td class="observaciones"><div align="left"><strong>Promedio:</strong></div></td>
                    <td class="observaciones"><div align="left"><?php if($promedio==0) {$promedio='No Evaluado';} echo($promedio);?></div></td>
                  </tr>
                </table></td>
				<td colspan="2" valign="bottom" class="observaciones"><div align="center"><em>Total de Revisiones: 
                <?php if($numRevisiones==-1) {$numRevisiones=0;} echo($numRevisiones);?> 
	            </em></div></td>
			  </tr>
			  <tr>
				<td colspan="3">&nbsp;</td>
			  </tr>
			  <tr>
				<td colspan="3"><div align="center">
				  <table width="890" border="0">
					  <tr>
						<td colspan="3"><div align="center">
						  <table width="730" border="1" align="center" cellpadding="2" cellspacing="0" id="revisiones">
                            <tr class="nota">
							<?php
							if(($administrador==1))
							{
							?>
                              <td colspan="2" bgcolor="#00CC33"><div align="center"><img src="imagenes/alerta.png" width="30" height="30"></div></td>
						    <?php
							}  
							?>
                              <td bgcolor="#00CC33"><div align="center"><strong>ID REVISI&Oacute;N</strong></div></td>
                              <td bgcolor="#00CC33"><div align="center"><strong>FECHA</strong></div></td>
                              <td bgcolor="#6699FF"><div align="center"><strong>CLASIFICAR</strong></div></td>
                              <td bgcolor="#6699FF"><div align="center"><strong>ORDENAR</strong></div></td>
                              <td bgcolor="#6699FF"><div align="center"><strong>LIMPIEZA</strong></div></td>
                              <td bgcolor="#6699FF"><div align="center"><strong>ESTANDARIZAR</strong></div></td>
                              <td bgcolor="#CCCCCC"><div align="center"><strong>Calificaci&oacute;n<br>
        por Revisi&oacute;n </strong></div></td>
                              <td bgcolor="#6699FF"><div align="center"><strong>DISCIPLINA</strong></div></td>
                              <td bgcolor="#00CC33" class="nota"><strong>FOTO</strong></td>
                              <td bgcolor="#00CC33" class="nota"><strong>OBSERVACIONES</strong></td>
                            </tr>
                            <!-- Llenar los Renglones -->
                            <?php
								for($i=0; $i<$renglones; $i++)
								{
									if($i!=$renglones-1)
									{
										$id=$tabla[$i][0];
										$fecha=$tabla[$i][1];
										$clasificar=$tabla[$i][2];
										$ordenar=$tabla[$i][3];
										$limpieza=$tabla[$i][4];
										$estandarizar=$tabla[$i][5];
										$calificacion=$tabla[$i][6];
										$disciplina=$tabla[$i][7];
										if($i==0)
											$disciplina="---";
										$foto=$tabla[$i][8];
										$observaciones=$tabla[$i][9];
											
											if(strlen($foto)>1)
												$linkFoto="<a href=javascript:popUpFoto('foto.php?id=$id')><img src='imagenes/mini_camara.jpg' alt='Ver Foto'></a>";
											else
												$linkFoto="";
												
											if(strlen($observaciones)>1)
												$linkObser="<a href=javascript:popUpObservaciones('observaciones.php?id=$id')><img src='imagenes/mini_nota.jpg' alt='Ver Observaciones'></a>";
											else
												$linkObser="";
										?>
                            <tr>
							<?php
							if(($administrador==1))
							{
								$linkModificar="javascript:popUpRevisiones('control_revisiones.php?opcion=2&id=$id')";
								$linkEliminar="javascript:popUpRevisiones('control_revisiones.php?opcion=3&id=$id')";
							?>
                              <td width="30" class="nota"><div align="center"><a href="<?php echo($linkModificar);?>"><img src="imagenes/modificar.png" alt="Modificar Revisi&oacute;n" width="15" height="15" border="0"></a></div></td>
                              <td width="30" class="nota"><div align="center"><a href="<?php echo($linkEliminar);?>"><img src="imagenes/eliminar.png" alt="Eliminar Revisi&oacute;n" width="15" height="15" border="0"></a></div></td>
							<?php
							}  
							?>
                              <td class="nota"><div align="center"><?php echo($id);?></div></td>
                              <td class="nota"><div align="center"><?php echo($fecha);?></div></td>
                              <td class="marca"><div align="center"><?php echo($clasificar);?></div></td>
                              <td class="marca"><div align="center"><?php echo($ordenar);?></div></td>
                              <td class="marca"><div align="center"><?php echo($limpieza);?></div></td>
                              <td class="marca"><div align="center"><?php echo($estandarizar);?></div></td>
                              <td bgcolor="#EEEEEE" class="marca"><div align="center"><?php echo($calificacion);?></div></td>
                              <td class="marca"><div align="center"><?php echo($disciplina);?></div></td>
                              <td class="marca"><div align="center"><?php echo($linkFoto);?></div></td>
                              <td class="marca"><div align="center"><?php echo($linkObser);?></div></td>
                            </tr>
                            <?php
										//echo("</tr>");
										//echo("<tr class='nota'>");
									}
									else
									{
										$totalClasificar=$tabla[$i][2];
										$totalOrdenar=$tabla[$i][3];
										$totalLimpieza=$tabla[$i][4];
										$totalEstandarizar=$tabla[$i][5];
									?>
                            <!-- Llenar los Renglones -->
                            <!-- Llenar &uacute;ltimo Rengl&oacute;n -->
                            <tr>
							<?php
							if(($administrador==1))
							{
							?>
                              <td width="30" class="nota"><div align="center"></div></td>
                              <td width="30" class="nota"><div align="center"></div></td>
							<?php
							}  
							?>							  
                              <td colspan="2" bgcolor="#CCCCCC" class="nota"><div align="center"><strong>Calificaci&oacute;n por Categoria </strong></div></td>
                              <td bgcolor="#EEEEEE" class="marca"><div align="center"><?php echo($totalClasificar);?></div></td>
                              <td bgcolor="#EEEEEE" class="marca"><div align="center"><?php echo($totalOrdenar);?></div></td>
                              <td bgcolor="#EEEEEE" class="marca"><div align="center"><?php echo($totalLimpieza);?></div></td>
                              <td bgcolor="#EEEEEE" class="marca"><div align="center"><?php echo($totalEstandarizar);?></div></td>
                              <td bgcolor="#CCCCCC" class="marca"><div align="center"><strong><?php echo($promedio);?></strong></div></td>
                              <td class="marca"><div align="center"></div></td>
                              <td class="marca"><div align="center"></div></td>
                              <td class="marca"><div align="center"></div></td>
                            </tr>
                            <?php
									}
						}//Fin for
						  ?>
                            <!-- Llenar &uacute;ltimo Rengl&oacute;n -->
                          </table>
				        </div></td>
					  </tr>
					  <tr>
					    <td colspan="3" class="observaciones">
							<div align="center">
						  <?php
							if(($administrador==1))
							{
							?>
							<a href="javascript:popUpRevisiones('control_revisiones.php?opcion=1&nomina=<?php echo($nomina);?>')" class="mylink1">
							<img src="imagenes/agregar.png" width="15" height="15">Agregar Revisi&oacute;n </a><br><br>
						<?php
							}  
							?>		
							</div>
						</td>
				    </tr>
					  <tr>
                        <td class="nota"><div align="left"><strong>
      NOTAS:</strong><br>
      CALIFICACI&Oacute;N POR REVISI&Oacute;N: Rango de 0 a 100<br>
      CALIFICACI&Oacute;N POR CATEGORIA: Rango de 0 a 100</div></td>
				        <td class="nota"><div align="left"><strong>INTERPRETACI&Oacute;N DISCIPLINA:</strong><br>
			              Disciplina mayor que 0: Mejora<br>
			              Disciplina menor que 0: Sin Mejora<br>
</div></td>
				        <td valign="bottom" class="nota"><div align="left">Disciplina igual que 0: Sin Mejora pero se mantuvo<br>
		                Disciplina &quot;---&quot;: No es posible evaluar a&uacute;n</div></td>
				    </tr>
				  </table>
				</div></td>
			  </tr>
		  <tr>
            <td colspan="3"><hr></td>
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
