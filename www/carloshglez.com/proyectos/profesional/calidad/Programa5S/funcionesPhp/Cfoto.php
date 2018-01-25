<?php	

function validarFoto($file_type,$file_error,$file_size)
{	
	if ($file_error > 0) {
		echo "Error en el archivo: Código ".$file_error."<br>";
		return false;
	}
	else
  	if( ($file_type != 'image/pjpeg') && ($file_type != 'image/jpeg') && ($file_type != 'image/jpg')) {
		echo "Error en la extensión (image/pjpeg | image/jpeg | image/jpg): ".$file_type."<br>";
		return false;
	}
	if($file_size > 300000) {
		echo "Error en el tamaño (300,000): ".$file_size."<br>";
		return false;
	}
	else
		return true;

}

function subirFoto($file,$file_name)
{
	$upfile = "/home/carloshglez/public_html/proyectos/profesional/calidad/Programa5S/Fotos5s/".$file_name;
	//$upfile = "C:/xampp/htdocs/sitio/proyectos/profesional/calidad/Programa5S/Fotos5s/".$file_name;
	
	
	$correcto=false;
	
	if (is_uploaded_file($file))
	{
   		if(!move_uploaded_file($file, $upfile))
       		$correcto=false;
		else
			$correcto=true;
	}
	return $correcto;
}

?>