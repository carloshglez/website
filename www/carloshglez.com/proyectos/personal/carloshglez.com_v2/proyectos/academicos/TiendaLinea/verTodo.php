<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
	$inicio=$_GET['Inicio'];
	$fin=$_GET['Fin'];
	$subir=$_GET['Subir'];
	$bajar=$_GET['Bajar'];
	
	$hayResultados=false;
		if(!($link=mysql_connect("mysql.nixiweb.com","u506695579_movie","carlos"))){
			print("Error en la conexion al servidor de la base de datos");	
			exit();
		}
		if(!(mysql_select_db("u506695579_movie",$link))){
			print("No se encontro la base de datos");	
			exit();
		}
		
		$res=mysql_query("SELECT * FROM pelicula ORDER BY Nombre",$link);
			
		$num=mysql_num_rows($res);
		
		if($num<=0){
			$hayResultados=false;
		}
		else{
				$hayResultados=true;
			$i=0;
			while($reg=mysql_fetch_row($res)){
				$arreglo[$i]=$reg;
				$i++; 		
			}
			mysql_close($link);
		}
?>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0" id="intro">
<tr>
    <td class="migas">Inicio &gt; Ver Peliculas</td>
  </tr>
  <tr>
    <td><h2>Lista de Peliculas</h2></td>
</tr>
<tr>
    <?php
	if($hayResultados==false)
		print("<td align=center>No se encontraron peliculas.</td></tr>");
	else
	{
  ?>
<td height="220" valign="top">
	<?php
			print("<table align=center width=700 border=0 id=tablaResultados><tr>");
			print("<th align=center width=100 bgcolor=#7DA8C8>Nombre </th>");	
			print("<th align=center width=75 bgcolor=#7DA8C8>Genero </th>");
			print("<th align=center width=100 bgcolor=#7DA8C8>Autor </th>");
			print("<th align=center width=100 bgcolor=#7DA8C8>Director </th>");
			print("<th align=center width=100 bgcolor=#7DA8C8>Clasificacion </th>");
			print("<th align=center width=50 bgcolor=#7DA8C8>Formato</th>");
			print("<th align=center width=100 bgcolor=#7DA8C8>Imagen</th>");
			print("<th align=center width=50 bgcolor=#7DA8C8>Precio</th>");
			print("<th align=center width=25 bgcolor=#7DA8C8><img src=imagenes/vercarrito.gif></th></tr>");			
			
			
	if($subir==1){		
		$count = count($arreglo);
		if($count<5)
		{
			$fin = $count;
		}
		else {
		
			$fin = $fin + 4;			
		}
		
		if ($fin>=$count){
			$fin = $count - 1;
		}
	}else if($bajar==1){
		$count = count($arreglo);
		if($count<5)
		{
			$fin = $count;
		}
		else if ($fin==$count){
			$dif=$fin % 5;
			$fin = $fin - $dif-1;
						$fin = $fin - 5;
		}else if($count>5) {
			$fin = $fin - 6;
		}
		
	}
	
	for($i=$inicio; $i<=$fin; $i++)
	{
				$reg = $arreglo[$i];
				print("<tr>");	
				print("<td align=center>".$reg[1]. "</td>");
				print("<td align=center>".$reg[2]. "</td>");
				print("<td align=center>".$reg[3]."</td>");
				print("<td align=center>".$reg[4]. "</td>");
				print("<td align=center>".$reg[5]. "</td>");
				print("<td align=center>".$reg[6]."</td>");
				print("<td align=center><img src=".$reg[7]." border=0 width=30% height=30% /></td>");
				print("<td align=center>$".$reg[8]. "</td>");
				
				print("<td align=center>");
				?>
                
                <a href="javascript:ventanaCarrito('funcionesPhp/agregacar.php?<?php echo SID ?>&id=<?php echo ($reg[0]); ?>')"> 
                <img src="imagenes/continuar.gif" border="0" title="Agregar al Carrito"></a>
                
                <?php
				print("</td>");
				print("</tr>");
	}
		 		print("</table>"); 

	$in=$inicio;
	$enlaceSig = "&nbsp;";
	$enlaceAtr = "&nbsp;";

	if($fin < (count($arreglo)-1))
	{
		$inicio = $fin + 1;
			$enlaceSig = "<a href=# class=mylink3 onClick=getText('verTodo.php?Inicio=".$inicio."&Fin=".($fin+1)."&Subir=1&Bajar=0','contenido')>Siguiente<img src=imagenes/siguiente.png border=0 width=30 height=30/></a>";
	}if($in>0){
		if($fin==9)
			$inicio=0;
	 	else{
			$dif2=$fin % 5;
			$inicio=	$fin - $dif2-5;
			}
			$enlaceAtr = "<a href=# class=mylink3 onClick=getText('verTodo.php?Inicio=".$inicio."&Fin=".($fin+1)."&Subir=0&Bajar=1','contenido')><img src=imagenes/atras.png border=0 width=30 height=30/>Atras</a>";
	}
	?>
    </td>
    <?php
	}
  ?>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="600" border="0" cellpadding="0" cellspacing="0" id="navegacion" align="center">
      <tr>
        <td width="200" align="center" valign="middle"><?php print($enlaceAtr);?></td>
        <td align="center" valign="middle">&nbsp;</td>
        <td width="200" align="center" valign="middle"><?php print($enlaceSig);?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>