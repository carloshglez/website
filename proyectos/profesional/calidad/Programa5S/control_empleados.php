<?php if(!isset($_SESSION['usuario']))
		session_start();  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Control Empleados</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
	<?php
	include("funcionesPhp/conexionSql.php");
	include("funcionesPhp/Cdepartamento.php");
	include("funcionesPhp/Cempleado.php");
	include("funcionesPhp/Crevision.php");
	include("funcionesPhp/Cpermisos.php");
	
	$opcion=$_GET["opcion"];
	$id_dep=$_GET["dep"];	
	
	$nombreDepartamento=obtenerNombreDepartamento($id_dep);
	$listaDep=obtenerDepartamentos();
	$tamaño=sizeof($listaDep);
	
	?>
	<script type="text/javascript">	
	function cerrarVentana()
	{
		window.close();
	}
	</script>
    <script language="JavaScript" type="text/JavaScript">
<!--
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
  } if (errors) alert('Han ocurrido los siguientes errores:\n'+errors);
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
    <td width="450" class="titulo1">Administrar Empleados </td>
    <td width="450" class="titulo2">&nbsp;</td>
  </tr>
  <tr>
  	<!-- INICIO DE INGRESAR AREA -->
	<?php
	if($opcion==1)
	{
	?>
    <td colspan="2"><form action="resultado_empleados.php?opcion=1" method="post" name="ingresar" id="ingresar" onSubmit="MM_validateForm('nomina','','R','nombre','','R','area','','R');return document.MM_returnValue">
      <table align="center">
        <tr>
          <td colspan="3" class="titulo3">Dar de alta</td>
          </tr>
        <tr>
          <td width="149">&nbsp;</td>
          <td width="149">&nbsp;</td>
          <td width="150">&nbsp;</td>
          </tr>
        <tr>
          <td rowspan="5"><div align="center"><img src="imagenes/agregarEmpleado.png" width="128" height="128"></div></td>
          <td class="texto2"><div align="center">Usuario</div></td>
          <td>
              <div align="left">
                <input name="nomina" type="text" id="nomina" size="10" maxlength="9">
              </div></td>
          </tr>
        <tr>
          <td class="texto2"><div align="center">Nombre</div></td>
          <td>
              <div align="left">
                <input name="nombre" type="text" id="nombre" size="30" maxlength="100">
              </div></td>
          </tr>
        <tr>
          <td colspan="2"><hr></td>
          </tr>
        <tr>
          <td class="texto2"><div align="center">&Aacute;rea(s)</div></td>
          <td>
              <div align="left">
                <input name="area" type="text" id="area" size="30" maxlength="50">
              </div></td>
          </tr>
        <tr>
          <td class="texto2"><div align="center">Departamento</div></td>
          <td>
              <div align="left">
                <SELECT NAME="departamento">
					  <?
					  for($i=1; $i<=$listaDep[0]; $i++)
					  {
						$id=obtenerIdDepartamento($listaDep[$i]);
					  	if($id==$id_dep)
						{ ?>
							<OPTION VALUE="<? echo($id); ?>" selected>
						<? }
						else
						{ ?>
							<OPTION VALUE="<? echo($id); ?>" >
						<? } ?>
						<? print_r($listaDep[$i]); ?>
						</OPTION>
					  <?
					  }
					  ?>
			  </SELECT>
              </div></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="texto2"><div align="center">Tipo</div></td>
          <td><div align="left">
              <SELECT NAME="permisos">
                <option value="4" selected>Empleado</option>
                <option value="3">Director de Departamento</option>
                <option value="2">Consultor</option>
                <option value="1">Administrador</option>
              </SELECT>
          </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2"><hr></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div align="center">
              <input name="btLimpiar" type="reset" id="btLimpiar" value="Limpiar">
          </div></td>
          <td><div align="center">
              <input name="btIngresar" type="submit" id="btIngresar" value="Dar de alta">
          </div></td>
          </tr>
      </table>
    </form></td>
	<?php
	}
	?>
	<!-- FIN DE INGRESAR AREA -->
  </tr>
  <tr>
   	<!-- INICIO DE MODIFICAR AREA -->
	<?php
	if($opcion==2)
	{
	$nomina=$_GET["nomina"];
	$nombre=obtenerDatoEmpleado($nomina,"nombre");
	$area=obtenerDatoEmpleado($nomina,"area");
	$tipo=mostrarPermiso($nomina);
	?>
    <td colspan="2"><form action="resultado_empleados.php?opcion=2" method="post" name="modificar" id="modificar" onSubmit="MM_validateForm('nomina','','R','nombre','','R','area','','R');return document.MM_returnValue">
      <table border="0" align="center">
        <tr>
          <td colspan="3" class="titulo3">Modificar datos</td>
          </tr>
        <tr>
          <td width="149">&nbsp;</td>
          <td width="149">&nbsp;</td>
          <td width="150"><input name="nominaAnt" type="hidden" id="nominaAnt" value="<?echo $nomina?>">&nbsp;</td>
          </tr>
        <tr>
          <td rowspan="5"><div align="center"><img src="imagenes/modificarEmpleado.png" width="128" height="128"></div></td>
          <td class="texto2"><div align="center">Usuario</div></td>
          <td>
              <div align="left">
                <input name="nomina" type="text" id="nomina" size="10" maxlength="9" value="<?echo $nomina?>">
              </div></td>
          </tr>
        <tr>
          <td class="texto2"><div align="center">Nombre</div></td>
          <td>
              <div align="left">
                <input name="nombre" type="text" id="nombre" size="30" maxlength="100" value="<?echo $nombre?>">
              </div></td>
          </tr>
        <tr>
          <td colspan="2"><hr></td>
          </tr>
        <tr>
          <td class="texto2"><div align="center">&Aacute;rea(s)</div></td>
          <td>
              <div align="left">
                <input name="area" type="text" id="area" size="30" maxlength="50" value="<?echo $area?>">
              </div></td>
          </tr>
        <tr>
          <td class="texto2"><div align="center">Departamento</div></td>
          <td>
              <div align="left">
                <SELECT NAME="departamento">
					  <?
					  for($i=1; $i<=$listaDep[0]; $i++)
					  {
						$id=obtenerIdDepartamento($listaDep[$i]);
					  	if($id==$id_dep)
						{ ?>
							<OPTION VALUE="<? echo($id); ?>" selected>
						<? }
						else
						{ ?>
							<OPTION VALUE="<? echo($id); ?>" >
						<? } ?>
						<? print_r($listaDep[$i]); ?>
						</OPTION>
					  <?
					  }
					  ?>
			  </SELECT>
              </div></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="texto2"><div align="center">Tipo</div></td>
          <td><div align="left">
              <SELECT NAME="permisos">
				<?
					$administrador=esAdministrador($nomina);
					$consultor=esConsultor($nomina);
					$directorDep=esDirectorDepartamento($nomina);
					$empleado=esEmpleado($nomina);
						if($administrador==1)
						{
				?>
						<option value="4">Empleado</option>
						<option value="3">Director de Departamento</option>
						<option value="2">Consultor</option>
						<option value="1" selected>Administrador</option>
				<?
						}
						else if($consultor==1)
						{
				?>
						<option value="4">Empleado</option>
						<option value="3">Director de Departamento</option>
						<option value="2" selected>Consultor</option>
						<option value="1">Administrador</option>
				<?
						}
						else if($directorDep==1)
						{
				?>
						<option value="4">Empleado</option>
						<option value="3" selected>Director de Departamento</option>
						<option value="2">Consultor</option>
						<option value="1">Administrador</option>
				<?
						}
						else if($empleado==1)
						{
				?>
						<option value="4" selected>Empleado</option>
						<option value="3">Director de Departamento</option>
						<option value="2">Consultor</option>
						<option value="1">Administrador</option>
				<?
						}
						else
						{
				?>
						<option value="4" selected>Empleado</option>
						<option value="3">Director de Departamento</option>
						<option value="2">Consultor</option>
						<option value="1">Administrador</option>
				<?
						}
				?>
              </SELECT>
          </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2"><hr></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
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
   	<!-- FIN DE MODIFICAR AREA -->
  </tr>
  <tr>
   	<!-- INICIO DE ELIMINAR AREA -->
	<?php
	if($opcion==3)
	{
	$nomina=$_GET["nomina"];
	$nombre=obtenerDatoEmpleado($nomina,"nombre");
	$area=obtenerDatoEmpleado($nomina,"area");
	$tipo=mostrarPermiso($nomina);
	?>
    <td colspan="2"><form action="resultado_empleados.php?opcion=3" method="post" name="eliminar" id="eliminar">
      <table width="500" border="0" align="center">
        <tr>
          <td colspan="3" class="titulo3">Dar de baja</td>
          </tr>
        <tr>
          <td width="149">&nbsp;</td>
          <td width="149">&nbsp;</td>
          <td width="150"><input name="nomina" type="hidden" id="nomina" value="<?echo $nomina?>">&nbsp;</td>
        </tr>
        <tr>
          <td rowspan="5"><div align="center"><img src="imagenes/eliminarEmpleado.png" width="128" height="128"></div></td>
          <td class="texto2"><div align="center">Usuario</div></td>
          <td><div align="center"><?php echo($nomina);?></div></td></tr>
        <tr>
          <td class="texto2"><div align="center">Nombre</div></td>
          <td><div align="center"><?php echo($nombre);?></div></td></tr>
        <tr>
          <td colspan="2"><hr></td>
          </tr>
        <tr>
          <td class="texto2"><div align="center">&Aacute;rea(s)</div></td>
          <td>          <div align="center"><?php echo($area);?></div></td></tr>
        <tr>
          <td class="texto2"><div align="center">Departamento</div></td>
          <td><div align="center"><?php echo($nombreDepartamento);?></div></td></tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="texto2"><div align="center">Tipo</div></td>
          <td><div align="center"><?php echo($tipo);?></div></td>
        </tr>
        <tr>
          <td colspan="3"><hr></td>
        </tr>
        <tr>
          <td colspan="3" class="observaciones"><div align="left"><img src="imagenes/alerta.png" width="30" height="30">             Al dar de baja a un empleado,
            se eliminar&aacute;n tambi&eacute;n todas sus revisiones de &quot;5S&quot;.</div></td>
          </tr>
        <tr>
          <td colspan="3"><div align="center">
            </div>            <div align="center">
                <input name="btEliminar" type="submit" id="btEliminar" value="Dar de baja">
            </div></td>
          </tr>
      </table>
    </form></td>
	<?php
	}
	?>
   	<!-- FIN DE ELIMINAR AREA -->
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
