<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
//ob_start("ob_gzhandler"); 

if(isset($_SESSION['carro'])) 
	$carro=$_SESSION['carro'];
else
	$carro=false; 
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tienda de Peliculas</title>
<style type="text/css">
<!--
@import url("css/estilos.css");
@import url("css/estilos2.css");
-->
</style>
<script type="text/javascript" src="js/funcionAjax.js"></script>
<script type="text/javascript" src="js/validaciones.js"></script>
<script type="text/javascript">	
	function ventanaCarrito(URL)
	{
		day = new Date();
		id = day.getTime();
		eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=600,height=300,left=100,top=100');");
	}
	</script>
</head>

<body onload="javascript:getText('bienvenida.php','contenido')">
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id="master">
  <tr>
    <td colspan="2"><table width="950" border="0" cellpadding="0" cellspacing="0" background="imagenes/banner.jpg" id="banner">
      <tr>
        <td><img src="imagenes/pixel.gif" alt="" width="10" height="150" /></td>
        <td width="250" valign="top"><table width="180" border="0" align="right" cellpadding="4" cellspacing="0" id="enlaces">
          <tr>
            <td width="100" align="center"><div align="center"><a class="mylink1" href="#" onclick="javascript:getText('bienvenida.php','contenido')">Inicio</a></div></td>
            <td class="style4"><div align="center" class="style1">|</div></td>
            <td width="100" class="style4"><a href="#" class="mylink1" onclick="javascript:getText('acerca.php','contenido')"><div align="center" class="style1">Acerca de</div></a></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="150" align="left" valign="top" bgcolor="#467CA4">
    <table width="150" border="0" align="center" cellpadding="0" cellspacing="0" id="menu">
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><strong><a class="mylink1" href="#" onclick="javascript:getText('bienvenida.php','contenido')">Inicio</a></strong></td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><strong><a href="#" class="mylink1" onclick="javascript:getText('verTodo.php?Inicio=0&Fin=0&Subir=1&Bajar=0','contenido')">Ver Peliculas</a></strong></td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><strong><a href="#" class="mylink1" onclick="javascript:getText('buscar.php','contenido')">Buscar Peliculas</a></strong></td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><strong><a class="mylink1" href="javascript:ventanaCarrito('funcionesPhp/vercarrito.php')">Ver carrito</a></strong></td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><hr /></td>
      </tr>
      <tr>
        <td align="center" class="style2">Login Administrador</td>
      </tr>
      <tr>
        <td align="center" class="style1"><hr /></td>
      </tr>
      <tr>
        <td align="center" class="style2"><form id="adminForm" method="post" onsubmit="return validarLogin(this)" action="administrador/verificacionLogin.php">
          <table width="140" border="0" align="center" cellpadding="0" cellspacing="0" id="admin">
            <tr>
              <td width="60" align="center">Usuario:</td>
              <td width="80" align="center"><input name="Usuario" type="text" id="Usuario" size="10" /></td>
            </tr>
            <tr>
              <td align="center">Clave:</td>
              <td align="center"><input name="Clave" type="password" id="Clave" size="10" /></td>
            </tr>
            <tr>
              <td colspan="2" align="center"><label>
                <input type="submit" value="Entrar" />
              </label></td>
            </tr>
          </table>
        </form></td>
      </tr>
      <tr>
        <td align="center" class="style1"><hr />
		<font size="1">
			  <b>Datos de acceso</b><br>
			  Usuario: <i>demo</i><br>
			  Clave: <i>demo</i>
			  </font>
		</td>
      </tr>
    </table></td>
    <td width="800" valign="top">
	    <div id="contenido">
        	&nbsp;
		</div>
    </td>
  </tr>
  <tr bgcolor="#5156A7">
    <td colspan="2" bgcolor="#355F7D"><table border="0" align="center" cellpadding="8" cellspacing="0">
      <tr valign="bottom">
        <td><div align="center" class="style2"><a href="#" class="mylink2" onclick="javascript:getText('verTodo.php?Inicio=0&Fin=0&Subir=1&Bajar=0','contenido')"">Ver Peliculas</a></div></td>
        <td class="style2">|</td>
        <td><div align="center" class="style2"><a href="#" class="mylink2" onclick="javascript:getText('buscar.php','contenido')">Buscar Peliculas</a></div></td>
        <td class="style2"><div align="center">|</div></td>
        <td class="style2"><div align="center"><a href="#" class="mylink2" onclick="javascript:getText('acerca.php','contenido')">Acerca de</a></div></td>
      </tr>
    </table></td>
  </tr>
  <tr bgcolor="#000000">
    <td colspan="2"><table width="600" border="0" align="center" cellpadding="5" cellspacing="0">
      <tr>
        <td><div align="center" class="style1 style3">
          NombreTienda A.C Copyright &copy; 2010 - Sitio elaborado para proyecto final de la materia de Aplicaciones Distribuidas
        </div></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php  
//ob_end_flush(); 
?> 