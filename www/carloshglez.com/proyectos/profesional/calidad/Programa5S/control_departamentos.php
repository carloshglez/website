<?php if(!isset($_SESSION['usuario']))
		session_start();  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Control Departamentos</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
	<?php
	include("funcionesPhp/conexionSql.php");
	include("funcionesPhp/Cdepartamento.php");
	include("funcionesPhp/Cpermisos.php");
	
	$opcion=$_GET["opcion"];

	?>
<script type="text/javascript">
<!--
function cerrarVentana()
	{
		window.close();
	}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- "'+nm+'" es necesario.\n'; }
  } if (errors) alert('Ha ocurrido el siguiente error:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
</head>

<body>
<table width="910" border="0" align="center">
  <tr>
    <td colspan="2"><img src="imagenes/encabezado.jpg" width="900" height="96"></td>
  </tr>
  <tr>
    <td width="450" class="titulo2">Programa de 5 S </td>
    <td class="texto"><div align="right">Sistema de Calidad </div></td>
  </tr>
  <tr>
    <td><div align="left">Sistema de mejora continua</div></td>
    <td class="titulo4">EMPRESA</td>
  </tr>
  <tr>
    <td colspan="2" class="titulo1"><hr></td>
  </tr>
  <?php
  if(isset($_SESSION['usuario']))
	{
		$administrador=esAdministrador($_SESSION['usuario']);
		if($administrador==1)
		{
		?>
  <tr>
    <td width="450" class="titulo1">Administrar Departamentos </td>
    <td width="450" class="titulo2">&nbsp;</td>
  </tr>
  <tr>
  	<!-- INICIO DE INGRESAR DEPARTAMENTO -->
	<?php
	if($opcion==1)
	{
	?>
    <td colspan="2"><form action="resultado_departamentos.php?opcion=1" method="post" name="ingresar" id="ingresar" onSubmit="MM_validateForm('nombre','','R');return document.MM_returnValue">
      <table align="center">
        <tr>
          <td colspan="3" class="titulo3">Dar de alta Departamento </td>
          </tr>
        <tr>
          <td width="149" rowspan="3"><div align="center"><img src="imagenes/agregarDep.png" width="128" height="128"></div></td>
          <td width="149">&nbsp;</td>
          <td width="150">&nbsp;</td>
          </tr>
        <tr>
          <td class="texto2"><div align="center">Nombre</div></td>
          <td>
              <div align="left">
                <input name="nombre" type="text" id="nombre" size="30" maxlength="100">
              </div></td>
          </tr>
        <tr>
          <td><div align="center">
              <input name="btLimpiar" type="reset" id="btLimpiar" value="Limpiar">
          </div></td>
          <td><div align="center">
              <input name="btIngresar" type="submit" id="btIngresar" value="Dar de alta Departamento">
          </div></td>
          </tr>
      </table>
    </form></td>
	<?php
	}
	?>
	<!-- FIN DE INGRESAR DEPARTAMENTO -->
  </tr>
  <tr>
   	<!-- INICIO DE MODIFICAR DEPARTAMENTO -->
	<?php
	if($opcion==2)
	{
		$id_dep=$_GET["dep"];
		$nombre=obtenerNombreDepartamento($id_dep);
	?>
    <td colspan="2"><form action="resultado_departamentos.php?opcion=2" method="post" name="modificar" id="modificar" onSubmit="MM_validateForm('nombre','','R');return document.MM_returnValue">
      <table border="0" align="center">
        <tr>
          <td colspan="3" class="titulo3">Modificar datos de Departamento </td>
          </tr>
        <tr>
          <td width="149" rowspan="3"><div align="center"><img src="imagenes/modificarDep.png" width="128" height="128"></div></td>
          <td width="149">&nbsp;</td>
          <td width="150"><input name="id_dep" type="hidden" id="id_dep" value="<?echo $id_dep?>"></td>
          </tr>
        <tr>
          <td class="texto2"><div align="center">Nombre</div></td>
          <td>
              <div align="left">
                <input name="nombre" type="text" id="nombre" size="30" maxlength="100" value="<?echo $nombre?>">
              </div></td>
          </tr>
        <tr>
          <td colspan="2"><div align="center">
              </div>            <div align="center">
                <input name="btModificar" type="submit" id="btModificar" value="Modificar Datos">
            </div></td>
          </tr>
      </table>
    </form></td>
	<?php
	}
	?>
   	<!-- FIN DE MODIFICAR DEPARTAMENTO -->
  </tr>
  <tr>
   	<!-- INICIO DE ELIMINAR DEPARTAMENTO -->
	<?php
	if($opcion==3)
	{
		$id_dep=$_GET["dep"];
		$nombre=obtenerNombreDepartamento($id_dep);
	?>
    <td colspan="2"><form action="resultado_departamentos.php?opcion=3" method="post" name="eliminar" id="eliminar">
      <table width="500" border="0" align="center">
        <tr>
          <td colspan="3" class="titulo3">Dar de baja Departamento </td>
          </tr>
        <tr>
          <td width="149" rowspan="4"><div align="center"><img src="imagenes/eliminarDep.png" width="128" height="128"></div></td>
          <td width="149">&nbsp;</td>
          <td width="150"><input name="id_dep" type="hidden" id="id_dep" value="<?echo $id_dep?>">
          &nbsp;</td>
        </tr>
        <tr>
          <td class="texto2"><div align="center">Nombre</div></td>
          <td><div align="center"><?php echo($nombre);?></div></td></tr>
        <tr>
          <td colspan="2" class="observaciones"><div align="left"><img src="imagenes/alerta.png" width="30" height="30">  Al dar de baja a un departamento,<br>
  se eliminar&aacute;n todos sus empleados asi como sus respectivas revisiones</div></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
                <input name="btEliminar" type="submit" id="btEliminar" value="Dar de baja Departamento">
                        </div></td>
          </tr>
      </table>
    </form></td>
	<?php
	}
	?>
   	<!-- FIN DE ELIMINAR DEPARTAMENTO -->
  </tr>
	<?php
		}
		else
		{
			echo("<td align='center'><h3><img src='imagenes/error.png'>No tienes permiso de ver esta página.</h3></td>");
		}
 	}
	else
	{
		echo("<td align='center'><h3><img src='imagenes/error.png'>No has iniciado sesión correctamente.</h3></td>");
	}
	?>
  <tr>
    <td><div align="center"><a href="javascript:cerrarVentana()" class="mylink1">Cancelar</a></div></td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
