 <?php 
 		include("header.html");
 ?>
 
 <td bgcolor="#FFFFFF" width="750">
 	<h1>Alta de una Pelicula</h1>
     <form id="form1" onsubmit="return validarInfoPelicula2(this)" action="altaPeliculaSQL.php" method="post">
                            Indique el nombre:
                            <input type="text" name= "nombre" id="nombre"/> <br />
                            Indique el género: 
                            <input type="text" name="genero" id="genero"/> <br />
                            Indique su autor:
                            <input type="text" name="autor" id="autor"/> <br />
                            Indique su director: 
                            <input type="text" name="director" id="director"/> <br />
                            Indique su clasificacion: 
                            <input type="text" name="clasificacion" id="clasificacion"/> <br />
                            Indique su formato:
                            <input type="text" name="formato" id="formato"/> <br />
                            Indique su imagen:
                            <input type="text" name="imagen" id="imagen"/> <br />
                            Indique su precio: 
                            <input type="text" name="precio" id="precio"/> <br />
                            <input type="submit" value="Dar de Alta"/>
                        
     </form>
  </td>
 </tr>
  
  
  <?php 
 		include("footer.html");
 ?>
 