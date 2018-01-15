
  
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
	$res=mysql_query("SELECT * FROM pelicula",$link);
	$num=mysql_num_rows($res);
	
	if($num<=0){
		print("No se encontraron registros en la tabla");	
	}
	else{

		
			print("<table width=600 border=1 id=tablaResultados align=center><tr>");
			print("<th>Id_Pelicula </th>"); 
			print("<th>Nombre </th>");	
			print("<th>Genero </th>");
			print("<th>Autor </th>");
			print("<th>Director </th>");
			print("<th>Clasificacion </th>");
			print("<th>Formato</th>");
			print("<th>Imagen</th>");
			print("<th>Precio</th></tr>");
		
		while($reg=mysql_fetch_row($res)){
			print("<tr>");	
			print("<td>".$reg[0]."</td>");
			print("<td>".$reg[1]. "</td>");
			print("<td>".$reg[2]. "</td>");
			print("<td>".$reg[3]."</td>");
			print("<td>".$reg[4]. "</td>");
			print("<td>".$reg[5]. "</td>");
			print("<td>".$reg[6]."</td>");
			print("<td align=center><img src=".$reg[7]." border=0 width=30% height=30% /></td>");
			print("<td>".$reg[8]. "</td></tr>");     		
		}
		 print("</table>"); 
		mysql_close($link);
	}
?>
</td>
</tr>
  
<?php 
 		include("footer.html");
 ?>
 