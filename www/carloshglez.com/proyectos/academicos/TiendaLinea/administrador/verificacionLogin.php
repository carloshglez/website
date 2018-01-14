<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrador</title>
</head>

<body>

<?php
	$usuario=$_POST['Usuario'];
	$password=$_POST['Clave'];


	if(!($link=mysql_connect("localhost","carlosh_demo","demo1234"))){
		print("Error en la conexion al servidor de la base de datos");	
		exit();
	}
	if(!(mysql_select_db("tienda_peliculas",$link))){
		print("No se encontro la base de datos");	
		exit();
	}
	$res=mysql_query("SELECT * FROM login WHERE Usuario='".$usuario."' AND Password='".$password."'",$link);
	$num=mysql_num_rows($res);
	
	if($num<=0){
		?>
		<script type="text/javascript">	
			alert("Acceso no permitido. Usuario o clave incorrectos.");
			open("../inicio.php","_self");
		</script>
		<?php
	}
	else{
		
		
 		include("header.html");
 ?>
  <td width="750" bgcolor="#FFFFFF">
   <h1> Bienvenido </h1>
   <p align="justify">Somos una empresa dedicada a la venta de peliculas, establecida en Córdoba-Veracruz.
   Somos los primeros en traer a ti la película que esperabas ver con ansiedad desde la comodida de tu hogar.</p>
  
</td>
</tr>
  
<?php 
 		include("footer.html");
	}
 ?>
</body>
</html>