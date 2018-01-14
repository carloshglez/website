
<?php 
 		include("header.html");
?>
 <td bgcolor="#FFFFFF" width="750">
<?php

function insertarPelicula($nombre, $genero, $autor, $director, $clasificacion, $formato, $imagen, $precio){
	
	if(!($link=mysql_connect("localhost","carlosh_demo","demo1234"))){
		print("Error en la conexion al servidor de la base de datos");	
		exit();
	}
	if(!(mysql_select_db("tienda_peliculas",$link))){
		print("No se encontro la base de datos");	
		exit();
	}
	
	/*$res=mysql_query("INSERT INTO `pelicula` (Id_Pelicula,Nombre,Genero,Autor,Director,Clasificacion,Formato,Imagen,Precio)
	VALUES ('', '$nombre', '$genero', '$autor', '$director', '$clasificacion', '$formato', '$imagen', '$precio'	);"
	,$link);
	if($res==1)
	print("Se ha dado de alta satisfactoriamente la pelicula ".$nombre);
	else
	print("No se ha podido dar de alta la pelicula");*/
	print("Gracias por usar el DEMO.<br>La pelicula no puede ser ingresada debido a que el programa se ejecuta bajo un entorno de demostracion.");
	mysql_close($link); 
	
}
	//Recepcion de los parametros	
	$nombre = $_POST['nombre'];
	$genero = $_POST['genero'];
	$autor=$_POST['autor'];
	$director=$_POST['director'];
	$clasificacion = $_POST['clasificacion'];
	$formato = $_POST['formato'];
	$imagen=$_POST['imagen'];
	$precio=$_POST['precio'];
	
	insertarPelicula($nombre, $genero, $autor, $director, $clasificacion, $formato, $imagen, $precio);
?>
	</td>
</tr>
  
<?php 
 		include("footer.html");
 ?>
 