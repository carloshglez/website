<?php 
 		include("header.html");
 ?>
 <td bgcolor="#FFFFFF" width="750">
<?php
	if(!($link=mysql_connect("mysql.nixiweb.com","u506695579_movie","carlos"))){
		print("Error en la conexion al servidor de la base de datos");	
		exit();
	}
	if(!(mysql_select_db("u506695579_movie",$link))){
		print("No se encontro la base de datos");	
		exit();
	}
	//Recepcion de los parametros	
	$ant= $_POST['anterior'];
	$nombre = $_POST['nombre'];
	$genero = $_POST['genero'];
	$autor=$_POST['autor'];
	$director=$_POST['director'];
	$clasificacion = $_POST['clasificacion'];
	$formato = $_POST['formato'];
	$imagen=$_POST['imagen'];
	$precio=$_POST['precio'];
	
	
	//$res=mysql_query("UPDATE pelicula SET Nombre='".$nombre."',Genero='".$genero."',Autor='".$autor."',Director='".$director."',Clasificacion='".$clasificacion."',Formato='".$formato."',Imagen='".$imagen."',Precio='".$precio."' WHERE Id_Pelicula='".$ant."'",$link);
	//print("Se ha actualizado la pelicula ".$nombre);
	print("Gracias por usar el DEMO.<br>La pelicula no puede ser actualizada debido a que el programa se ejecuta bajo un entorno de demostracion.");
	
?>

</td>
</tr>
<?php 
 		include("footer.html");
 ?>