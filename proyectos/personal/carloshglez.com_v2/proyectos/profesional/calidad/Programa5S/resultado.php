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
		include("funcionesPhp/Cfoto.php");		
		
		$opcion=0;
		$opcion=$_GET["opcion"];
		$correcto=false;
		
		if($opcion==1)
		{
			$nomina=$_POST['nomina'];
			$miFecha=$_POST['fecha'];
			$fecha=cambiarFormatoFecha($miFecha);
			$clasificar=$_POST['clasificar'];
			$ordenar=$_POST['ordenar'];
			$limpieza=$_POST['limpieza'];
			$estandarizar=$_POST['estandarizar'];
			$file = $HTTP_POST_FILES['foto']['tmp_name'];
			$file_name = $HTTP_POST_FILES['foto']['name'];
			$file_size = $HTTP_POST_FILES['foto']['size'];
			$file_type = $HTTP_POST_FILES['foto']['type'];
			$file_error = $HTTP_POST_FILES['foto']['error'];
			$observaciones=$_POST['observaciones'];
			
			$fechaCorrecta=validarFecha($fecha);
			$revisionEnviada=false;
			if($fechaCorrecta==true)
			{
				$fotoValida=validarFoto($file_type,$file_error,$file_size);
				if($fotoValida==true)
					$fotoEnviada=subirFoto($file,$file_name);
				if($fotoValida&&$fotoEnviada)
				{
					$revisionEnviada=insertarEvaluacion($nomina,$fecha,$clasificar,$ordenar,$limpieza,$estandarizar,$file_name,$observaciones);
				}
				if($revisionEnviada==true)
					$correcto=true;
			}
		}
		else if($opcion==2)
		{
			$id=$_POST['identificador'];
			$nomina=$_POST['nomina'];
			$miFecha=$_POST['fecha'];
			$fecha=cambiarFormatoFecha($miFecha);
			$clasificar=$_POST['clasificar'];
			$ordenar=$_POST['ordenar'];
			$limpieza=$_POST['limpieza'];
			$estandarizar=$_POST['estandarizar'];
			$file = $HTTP_POST_FILES['foto']['tmp_name'];
			$file_name = $HTTP_POST_FILES['foto']['name'];
			$file_size = $HTTP_POST_FILES['foto']['size'];
			$file_type = $HTTP_POST_FILES['foto']['type'];
			$file_error = $HTTP_POST_FILES['foto']['error'];
			$observaciones=$_POST['observaciones'];
			
			$fechaCorrecta=validarFecha($fecha);
			if($fechaCorrecta)
			{
				$fotoValida=validarFoto($file_type,$file_error,$file_size);
				if($fotoValida)
					$fotoEnviada=subirFoto($file,$file_name);
					
				if($fotoValida&&$fotoEnviada)
				{
					$revisionEnviada=modificarEvaluacion($id,$nomina,$fecha,$clasificar,$ordenar,$limpieza,$estandarizar,$file_name,$observaciones);
				}
				if($revisionEnviada==true)
					$correcto=true;
			}
		}
		else if($opcion==3)
		{
			$id=$_POST['identificador'];
			
			$correcto=eliminarEvaluacion($id);
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
				if($fechaCorrecta==false)
					$error="La fecha es incorrecta: ".$miFecha." no es válida.";
				else if($fotoValida==false){
					$error="La foto no es válida.";
					}
				else if($fotoEnviada==false)
					$error="Error al enviar la foto.";
				else if($revisionEnviada==false)
					$error="Error de la base de datos.";										
			?>
			  <tr>
				<td colspan="2"><div align="center" class="titulo3"><img src='imagenes/error.png'>Ha ocurrido un error en la operaci&oacute;n </div></td>
			  </tr>
			  <tr>
			    <td colspan="2" class="observaciones"><div align="center"><?php echo($error);?></div></td>
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
			echo("<td align='center'><h3><img src='imagenes/error.png'>No tienes permiso de ver esta página.</h3></td>");
		}
 	}
	else
	{
		echo("<td align='center'><h3><img src='imagenes/error.png'>No has iniciado sesión correctamente.</h3></td>");
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
