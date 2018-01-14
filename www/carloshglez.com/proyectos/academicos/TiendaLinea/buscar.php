<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0" id="intro">
  <tr>
    <td class="migas">Inicio &gt; Buscar Peliculas</td>
  </tr>
  <tr>
    <td><h2>Buscar Peliculas</h2></td>
  </tr>
  <tr>
    <td><table width="510" border="0" align="center" cellpadding="0" cellspacing="0" id="formularios">
        <tr>
          <td><form id="formNombre" name="formNombre" method="post" onSubmit="return false">
          <fieldset>
          <legend><strong>Buscar por Nombre</strong></legend>
          <table width="500" border="0" align="center" cellpadding="10" cellspacing="0" id="porNombre">
            <tr>
              <td width="40" align="center" valign="middle">&nbsp;</td>
              <td width="165" align="center">Nombre de la pelicula:</td>
              <td width="145" align="center"><input type="text" name="Nombre" id="nombre" /></td>
              <td width="70" align="center"><input type="submit" value="Buscar" onClick="validarNombrePelicula('resultadoNombre.php?Bandera=0&Inicio=0&Fin=0&Subir=1&Bajar=0;','formNombre','contenido')"/></td>
            </tr>
            </table>
          </fieldset>
          </form></td>
        </tr>
        <tr>
          <td><br />
          <br /></td>
        </tr>
        <tr>
          <td><form id="formGenero" name="formGenero" method="post" onSubmit="return false">
            <fieldset>
              <legend><strong>Buscar por Género</strong></legend>
              <table width="500" border="0" align="center" cellpadding="10" cellspacing="0" id="porGenero">
                <tr>
                  <td width="40" align="center" valign="middle">&nbsp;</td>
                  <td width="185" align="center">Género de la pelicula:</td>
                  <td width="125" align="center"><select name="Genero" id="genero">
                    <option value="1">Drama</option>
                    <option value="2">Comedia</option>
                    <option value="3">Accion</option>
                    <option value="4">Aventura</option>
                    <option value="5">Terror</option>
                    <option value="6">Romantico</option>
                    <option value="7">Musical</option>
                    <option value="8">Melodrama</option>
                    <option value="9">Suspenso</option>
                    <option value="10">Fantasia</option>
                    <option value="11">Ciencia Ficcion</option>
                    <option value="12">Animacion</option>
                    </select></td>
                  <td width="70" align="center"><input type="submit" value="Buscar" onClick="EnviarForm('resultadoGenero.php?Bandera=0&Inicio=0&Fin=0&Subir=1&Bajar=0;','formGenero','contenido')"/></td>
                </tr>
                </table>
            </fieldset>
          </form></td>
        </tr>
        <tr>
          <td><br />
          <br /></td>
        </tr>
        <tr>
          <td><form id="formClasificacion" name="formClasificacion" method="post" onSubmit="return false">
            <fieldset>
              <legend><strong>Buscar por Clasificación</strong></legend>
              <table width="500" border="0" align="center" cellpadding="10" cellspacing="0" id="porClasificacion">
                <tr>
                  <td width="40" align="center" valign="middle">&nbsp;</td>
                  <td width="185" align="center">Clasificación de la pelicula:</td>
                  <td width="125" align="center"><select name="Clasificacion" id="clasificacion">
                    <option value="1">A</option>
                    <option value="2">B</option>
                    <option value="3">B-15</option>
                    <option value="4">C</option>
                    <option value="5">D</option>
                    </select></td>
                  <td width="70" align="center"><input type="submit" value="Buscar" onClick="EnviarForm('resultadoClasificacion.php?Bandera=0&Inicio=0&Fin=0&Subir=1&Bajar=0;','formClasificacion','contenido')"/></td>
                </tr>
                </table>
            </fieldset>
          </form></td>
        </tr>
    </table><br /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>