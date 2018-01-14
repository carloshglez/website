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
	
	$param=$_GET['Id_Pelicula'];
	$res=mysql_query("SELECT * FROM pelicula WHERE Id_Pelicula='".$param."'",$link);
	
	$num=mysql_num_rows($res);
	
	if($num<=0){
		print("No se encontraron registros en la tabla");	
	}
	else{
		while($reg=mysql_fetch_row($res)){
	
	?>
<form name="form1" onsubmit="return validarInfoPelicula(this)" action="actualizacion.php" method="post">

<input type="hidden" name="anterior" value="<?php print($reg[0]);?>"/> 

							Indique el nombre:
                            <input type="text" name="nombre" id="nombre" value="<?php print($reg[1]); ?>"/><br />
                            Indique el género: 
                            <label>
                              <select name="genero" size="1" id="genero">
                              <?php if($reg[2]=="Drama"){ ?>
                                <option selected value="Drama">Drama</option>
                                <option value="Comedia">Comedia</option>
                                <option value="Accion">Accion</option>
                                <option value="Aventura">Aventura</option>
                                <option value="Terror">Terror</option>
                                <option value="Romantico">Romantico</option>
                                <option value="Musical">Musical</option>
                                <option value="Melodrama">Melodrama</option>
                                <option value="Suspenso">Suspenso</option>
                                <option value="Fantasia">Fantasia</option>
                                <option value="Ciencia Ficcion">Ciencia Ficcion</option>
                                <option value="Animacion">Animacion</option>
                                <?php }else if($reg[2]=="Comedia"){ ?>
                                <option selected value="Comedia">Comedia</option>
                                <option value="Drama">Drama</option>
                                <option value="Accion">Accion</option>
                                <option value="Aventura">Aventura</option>
                                <option value="Terror">Terror</option>
                                <option value="Romantico">Romantico</option>
                                <option value="Musical">Musical</option>
                                <option value="Melodrama">Melodrama</option>
                                <option value="Suspenso">Suspenso</option>
                                <option value="Fantasia">Fantasia</option>
                                <option value="Ciencia Ficcion">Ciencia Ficcion</option>
                                <option value="Animacion">Animacion</option>
                                 <?php }else if($reg[2]=="Accion"){ ?>
                                <option selected value="Accion">Accion</option>
                                <option value="Drama">Drama</option>
                                <option value="Comedia">Comedia</option>
                                <option value="Aventura">Aventura</option>
                                <option value="Terror">Terror</option>
                                <option value="Romantico">Romantico</option>
                                <option value="Musical">Musical</option>
                                <option value="Melodrama">Melodrama</option>
                                <option value="Suspenso">Suspenso</option>
                                <option value="Fantasia">Fantasia</option>
                                <option value="Ciencia Ficcion">Ciencia Ficcion</option>
                                <option value="Animacion">Animacion</option>
                                 <?php }else if($reg[2]=="Aventura"){ ?>
                                <option selected value="Aventura">Aventura</option>
                                <option value="Drama">Drama</option>
                                <option value="Accion">Accion</option>
                                <option value="Comedia">Comedia</option>
                                <option value="Terror">Terror</option>
                                <option value="Romantico">Romantico</option>
                                <option value="Musical">Musical</option>
                                <option value="Melodrama">Melodrama</option>
                                <option value="Suspenso">Suspenso</option>
                                <option value="Fantasia">Fantasia</option>
                                <option value="Ciencia Ficcion">Ciencia Ficcion</option>
                                <option value="Animacion">Animacion</option>
                                 <?php }else if($reg[2]=="Terror"){ ?>
                                <option selected value="Terror">Terror</option>
                                <option value="Drama">Drama</option>
                                <option value="Accion">Accion</option>
                                <option value="Aventura">Aventura</option>
                                <option value="Comedia">Comedia</option>
                                <option value="Romantico">Romantico</option>
                                <option value="Musical">Musical</option>
                                <option value="Melodrama">Melodrama</option>
                                <option value="Suspenso">Suspenso</option>
                                <option value="Fantasia">Fantasia</option>
                                <option value="Ciencia Ficcion">Ciencia Ficcion</option>
                                <option value="Animacion">Animacion</option>
                                 <?php }else if($reg[2]=="Romantico"){ ?>
                                <option selected value="Romantico">Romantico</option>
                                <option value="Drama">Drama</option>
                                <option value="Accion">Accion</option>
                                <option value="Aventura">Aventura</option>
                                <option value="Terror">Terror</option>
                                <option value="Comedia">Comedia</option>
                                <option value="Musical">Musical</option>
                                <option value="Melodrama">Melodrama</option>
                                <option value="Suspenso">Suspenso</option>
                                <option value="Fantasia">Fantasia</option>
                                <option value="Ciencia Ficcion">Ciencia Ficcion</option>
                                <option value="Animacion">Animacion</option>
                                <?php }else if($reg[2]=="Musical"){ ?>
                                <option selected value="Musical">Musical</option>
                                <option value="Drama">Drama</option>
                                <option value="Accion">Accion</option>
                                <option value="Aventura">Aventura</option>
                                <option value="Terror">Terror</option>
                                <option value="Romantico">Romantico</option>
                                <option value="Comedia">Comedia</option>
                                <option value="Melodrama">Melodrama</option>
                                <option value="Suspenso">Suspenso</option>
                                <option value="Fantasia">Fantasia</option>
                                <option value="Ciencia Ficcion">Ciencia Ficcion</option>
                                <option value="Animacion">Animacion</option>
                                 <?php }else if($reg[2]=="Melodrama"){ ?>
                                <option selected value="Melodrama">Melodrama</option>
                                <option value="Drama">Drama</option>
                                <option value="Accion">Accion</option>
                                <option value="Aventura">Aventura</option>
                                <option value="Terror">Terror</option>
                                <option value="Romantico">Romantico</option>
                                <option value="Musical">Musical</option>
                                <option value="Comedia">Comedia</option>
                                <option value="Suspenso">Suspenso</option>
                                <option value="Fantasia">Fantasia</option>
                                <option value="Ciencia Ficcion">Ciencia Ficcion</option>
                                <option value="Animacion">Animacion</option>
                                 <?php }else if($reg[2]=="Suspenso"){ ?>
                                <option selected value="Suspenso">Suspenso</option>
                                <option value="Drama">Drama</option>
                                <option value="Accion">Accion</option>
                                <option value="Aventura">Aventura</option>
                                <option value="Terror">Terror</option>
                                <option value="Romantico">Romantico</option>
                                <option value="Musical">Musical</option>
                                <option value="Melodrama">Melodrama</option>
                                <option value="Comedia">Comedia</option>
                                <option value="Fantasia">Fantasia</option>
                                <option value="Ciencia Ficcion">Ciencia Ficcion</option>
                                <option value="Animacion">Animacion</option>
                                 <?php }else if($reg[2]=="Fantasia"){ ?>
                                <option selected value="Fantasia">Fantasia</option>
                                <option value="Drama">Drama</option>
                                <option value="Accion">Accion</option>
                                <option value="Aventura">Aventura</option>
                                <option value="Terror">Terror</option>
                                <option value="Romantico">Romantico</option>
                                <option value="Musical">Musical</option>
                                <option value="Melodrama">Melodrama</option>
                                <option value="Suspenso">Suspenso</option>
                                <option value="Comedia">Comedia</option>
                                <option value="Ciencia Ficcion">Ciencia Ficcion</option>
                                <option value="Animacion">Animacion</option>
                                 <?php }else if($reg[2]=="Ciencia Ficcion"){ ?>
                                <option selected value="Ciencia Ficcion">Ciencia Ficcion</option>
                                <option value="Drama">Drama</option>
                                <option value="Accion">Accion</option>
                                <option value="Aventura">Aventura</option>
                                <option value="Terror">Terror</option>
                                <option value="Romantico">Romantico</option>
                                <option value="Musical">Musical</option>
                                <option value="Melodrama">Melodrama</option>
                                <option value="Suspenso">Suspenso</option>
                                <option value="Fantasia">Fantasia</option>
                                <option value="Comedia">Comedia</option>
                                <option value="Animacion">Animacion</option>
                                 <?php }else if($reg[2]=="Animacion"){ ?>
                                <option selected value="Animacion">Animacion</option>
                                <option value="Drama">Drama</option>
                                <option value="Accion">Accion</option>
                                <option value="Aventura">Aventura</option>
                                <option value="Terror">Terror</option>
                                <option value="Romantico">Romantico</option>
                                <option value="Musical">Musical</option>
                                <option value="Melodrama">Melodrama</option>
                                <option value="Suspenso">Suspenso</option>
                                <option value="Fantasia">Fantasia</option>
                                <option value="Ciencia Ficcion">Ciencia Ficcion</option>
                                <option value="Comedia">Comedia</option>
                                <?php } ?>
                              </select>
                            </label>
                    <br />
                            Indique su autor:
                            <input type="text" name="autor" id="autor" value="<?php print($reg[3]); ?>"/><br />
                            Indique su director: 
                            <input type="text" name="director" id="director" value="<?php print($reg[4]); ?>"/><br />
                            Indique su clasificacion: 
                            <label>
                              <select name="clasificacion" size="1" id="clasificacion">
                              <?php if($reg[5]=="A"){ ?>
                                <option selected value="A">A</option>
                                <option value="B">B</option>
                                <option value="B-15">B-15</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                               <?php }else if($reg[5]=="B"){?>
                                 <option selected value="B">B</option>
                                <option value="A">A</option>
                                <option value="B-15">B-15</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <?php }else if($reg[5]=="B-15"){?>
                                 <option selected value="B-15">B-15</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <?php }else if($reg[5]=="C"){?>
                                 <option selected value="C">C</option>
                                <option value="A">A</option>
                                <option value="B-15">B-15</option>
                                <option value="B">B</option>
                                <option value="D">D</option>
                                <?php }else if($reg[5]=="D"){?>
                                 <option selected value="D">D</option>
                                <option value="A">A</option>
                                <option value="B-15">B-15</option>
                                <option value="C">C</option>
                                <option value="B">B</option>
                                <?php } ?>
                              </select>
                            </label><br />
                            Indique su formato:
                             <label>
                              <select name="formato" size="1" id="formato">
                              <?php if($reg[6]=="Dvd"){ ?>
                                <option selected value="Dvd">Dvd</option>
                                <option value="Blu-Ray">Blu-Ray</option>
                               <?php }else if($reg[6]=="Blu-Ray"){?>
                                <option value="Dvd">Dvd</option>
                                <option selected value="Blu-Ray">Blu-Ray</option>
                                <?php } ?>
                              </select>
                            </label><br />
							<img src="<?php print($reg[7]); ?>" border=0 width=30% height=30% /><br />
                            Indique su imagen:
                            <input type="text" name="imagen" id="imagen" value="<?php print($reg[7]); ?>"/><br />
                            Indique su precio: 
                            <input type="text" name="precio" id="precio" value="<?php print($reg[8]); ?>"/><br />
                            <input type="submit" value="Actualizar"/>
					
					</form> <?php } }?>
                    
</td>
</tr>
<?php 
 		include("footer.html");
 ?>