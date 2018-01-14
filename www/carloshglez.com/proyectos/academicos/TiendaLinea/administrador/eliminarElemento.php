 <?php 
 		include("header.html");
 ?>
 <td bgcolor="#FFFFFF" width="750">

<?php
	if(!($link=mysql_connect("localhost","carlosh_demo","demo1234"))){
		print("Error en la conexion al servidor de la base de datos");	
		exit();
	}
	if(!(mysql_select_db("tienda_peliculas",$link))){
		print("No se encontro la base de datos");	
		exit();
	}
	
	$parametro=$_GET['Id_Pelicula'];
	$parametro2=$_GET['Nombre'];
	//$res=mysql_query("DELETE FROM pelicula WHERE Id_Pelicula=".$parametro."", $link);
	print("Gracias por usar el DEMO.<br>La pelicula no se puede borrar debido a que el programa se ejecuta bajo un entorno de demostracion.");
	//print("Se ha eliminado la pelicula ".$parametro2);
	
?>
</td>
</tr>
  
<?php 
 		include("footer.html");
 ?>
 