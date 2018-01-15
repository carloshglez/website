<?php if(!isset($_SESSION['usuario']))
		session_start();  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Control Revisiones</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
	<?php
	include("funcionesPhp/conexionSql.php");
	include("funcionesPhp/Cempleado.php");
	include("funcionesPhp/Crevision.php");
	include("funcionesPhp/Cpermisos.php");
	
	$opcion=0;
	$opcion=$_GET["opcion"];
	$ruta="/proyectos/profesional/calidad/Programa5S/Fotos5s/";
	
	if($opcion==2||$opcion==3)
	{
		$id=$_GET["id"];
		$revision=obtenerEvaluacion($id);
		
		$nomina=$revision[1];
		$miFecha=$revision[2];
		$fecha=regresarFormatoFecha($miFecha);
		$clasificar=$revision[3];
		$ordenar=$revision[4];
		$limpieza=$revision[5];
		$estandarizar=$revision[6];
		$calificacion=$revision[7];
		$disciplina=$revision[8];
		$foto=$ruta.$revision[9];
		$observaciones=$revision[10];
		
	}
	else
	{
		$id=obtenerNuevoId();
		$nomina=$_GET["nomina"];
		$fecha=fechaHoy();
	}
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
        if (isNaN(val)) errors+='- '+nm+' debe ser un número.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' debe ser un número entre '+min+' y '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' es necesario.\n'; }
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
    <td width="450" class="titulo1">Administrar Revisiones </td>
    <td width="450" class="titulo2">&nbsp;</td>
  </tr>
  <tr>
  	<!-- INICIO DE INGRESAR REVISIÓN -->
	<?php
	if($opcion==1)
	{
	?>
    <td colspan="2"><form enctype="multipart/form-data" action="resultado.php?opcion=1" method="post" name="ingresar" id="ingresar" onSubmit="MM_validateForm('nomina','','R','fecha','','R','clasificar','','RinRange0:100','ordenar','','RinRange0:100','limpieza','','RinRange0:100','estandarizar','','RinRange0:100');return document.MM_returnValue">
      <table align="center">
        <tr>
          <td colspan="4" class="titulo3">Ingresar Revisi&oacute;n </td>
          </tr>
        <tr>
          <td width="129">&nbsp;</td>
          <td width="129">&nbsp;</td>
          <td width="170">&nbsp;</td>
          <td width="170">&nbsp;</td>
          </tr>
        <tr>
          <td rowspan="10"><img src="imagenes/agregarRevision.png" width="128" height="128"></td>
          <td class="texto2"><div align="center">Identificador</div></td>
          <td><div align="center"><strong># <?php echo($id);?> </strong></div></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="texto2"><div align="center">N&oacute;mina</div></td>
          <td><div align="center">
              <input name="nomina" type="text" id="nomina" value="<?php echo($nomina);?>" size="10" maxlength="10">
          </div></td>
          <td>&nbsp;</td>
          </tr>
        <tr>
          <td class="texto2"><div align="center">Fecha</div></td>
          <td><div align="center">
              <input name="fecha" type="text" id="fecha" value="<?php echo($fecha);?>" size="10" maxlength="10">
          </div></td>
          <td class="nota">DD-MM-AAAA</td>
          </tr>
        <tr>
          <td colspan="3"><hr></td>
          </tr>
        <tr>
          <td class="texto2"><div align="center">Clasificar</div></td>
          <td><div align="center">
              <input name="clasificar" type="text" id="clasificar" size="10" maxlength="3">
          </div></td>
          <td rowspan="4" class="nota">0 a 100 </td>
        </tr>
        <tr>
          <td class="texto2"><div align="center">Ordenar</div></td>
          <td><div align="center">
              <input name="ordenar" type="text" id="ordenar" size="10" maxlength="3">
          </div></td>
          </tr>
        <tr>
          <td class="texto2"><div align="center">Limpieza</div></td>
          <td><div align="center">
              <input name="limpieza" type="text" id="limpieza" size="10" maxlength="3">
          </div></td>
          </tr>
        <tr>
          <td class="texto2"><div align="center">Estandarizar</div></td>
          <td><div align="center">
              <input name="estandarizar" type="text" id="estandarizar" size="10" maxlength="3">
          </div></td>
          </tr>
        <tr>
          <td colspan="3"><hr></td>
          </tr>
        <tr>
          <td class="texto2"><div align="center">Foto</div></td>
          <td colspan="2">						    <input name="foto" type="file" id="foto" VALUE="" size="30"></td></tr>
        <tr>
          <td>&nbsp;</td>
          <td class="texto2">&nbsp;</td>
          <td colspan="2" class="nota">Formato: JPG || Tama&ntilde;o: menor de 300 KB</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="texto2"><div align="center"></div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="texto2"><div align="center">Observaciones </div></td>
          <td colspan="2">
              <div align="left">
                <textarea name="observaciones" cols="30" rows="5" id="observaciones"></textarea>
            </div></td></tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3"><hr></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div align="center">
              <input name="btLimpiar" type="reset" id="btLimpiar" value="Limpiar">
          </div></td>
          <td><div align="center">
              <input name="btIngresar" type="submit" id="btIngresar" value="Ingresar Revisi&oacute;n">
          </div></td>
          <td>&nbsp;</td>
          </tr>
      </table>
    </form></td>
	<?php
	}
	?>
	<!-- FIN DE INGRESAR REVISIÓN -->
  </tr>
  <tr>
   	<!-- INICIO DE MODIFICAR REVISIÓN -->
	<?php
	if($opcion==2)
	{
	?>
    <td colspan="2"><form enctype="multipart/form-data" action="resultado.php?opcion=2" method="post" name="modificar" id="modificar" onSubmit="MM_validateForm('nomina','','R','fecha','','R','clasificar','','RinRange0:100','ordenar','','RinRange0:100','limpieza','','RinRange0:100','estandarizar','','RinRange0:100','foto','','R');return document.MM_returnValue">
      <table border="0" align="center">
        <tr>
          <td colspan="4" class="titulo3">Modificar Revisi&oacute;n </td>
          </tr>
        <tr>
          <td width="129">&nbsp;</td>
          <td width="129">&nbsp;</td>
          <td width="170">&nbsp;</td>
          <td width="170"><input name="identificador" type="hidden" id="identificador" value="<?echo $id?>"></td>
        </tr>
        <tr>
          <td rowspan="8"><img src="imagenes/modificarRevision.png" width="128" height="128"></td>
          <td class="texto2"><div align="center">Identificador</div></td>
          <td><div align="center"><strong># <?php echo($id);?> </strong></div></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="texto2"><div align="center">N&oacute;mina</div></td>
          <td><div align="center">
              <input name="nomina" type="text" id="nomina" size="10" maxlength="10" readonly value="<?echo $nomina?>">
          </div></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="texto2"><div align="center">Fecha</div></td>
          <td><div align="center">
              <input name="fecha" type="text" id="fecha" size="10" maxlength="10" value="<?echo $fecha?>">
          </div></td>
          <td class="nota">DD-MM-AAAA</td>
        </tr>
        <tr>
          <td colspan="3"><hr></td>
          </tr>
        <tr>
          <td class="texto2"><div align="center">Clasificar</div></td>
          <td><div align="center">
              <input name="clasificar" type="text" id="clasificar" size="10" maxlength="3" value="<?echo $clasificar?>">
          </div></td>
          <td rowspan="4" class="nota">0 a 100 </td>
        </tr>
        <tr>
          <td class="texto2"><div align="center">Ordenar</div></td>
          <td><div align="center">
              <input name="ordenar" type="text" id="ordenar" size="10" maxlength="3" value="<?echo $ordenar?>">
          </div></td>
          </tr>
        <tr>
          <td class="texto2"><div align="center">Limpieza</div></td>
          <td><div align="center">
              <input name="limpieza" type="text" id="limpieza" size="10" maxlength="3" value="<?echo $limpieza?>">
          </div></td>
          </tr>
        <tr>
          <td class="texto2"><div align="center">Estandarizar</div></td>
          <td><div align="center">
              <input name="estandarizar" type="text" id="estandarizar" size="10" maxlength="3" value="<?echo $estandarizar?>">
          </div></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3"><hr></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="texto2"><div align="center">Calificaci&oacute;n</div></td>
          <td><div align="center"><?php echo($calificacion);?></div></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="texto2"><div align="center">Disciplina</div></td>
          <td><div align="center"><?php echo($disciplina);?></div></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4"><hr></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="texto2"><div align="center">Foto</div></td>
          <td colspan="2"><input name="foto" type="file" id="foto" size="30"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="texto2">&nbsp;</td>
          <td colspan="2" class="nota">Formato: JPG || Tama&ntilde;o: menor de 300 KB</td>
        </tr>
        <tr>
          <td colspan="4"><div align="center"><img src="<? echo $foto ?>" width="640" height="480"></div>
						  <div align="center" class="observaciones"><br>
		      <? echo $revision[9] ?></div>
			</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="texto2"><div align="center"></div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="texto2"><div align="center"> Observaciones </div></td>
          <td colspan="2"><div align="left">
              <textarea name="observaciones" cols="30" rows="5" id="observaciones"><? echo $observaciones ?></textarea>
          </div></td>
        </tr>
        <tr>
          <td colspan="4"><hr></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div align="center">
              </div></td>
          <td><div align="center">
              <input name="btModificar" type="submit" id="btModificar" value="Modificar Revisi&oacute;n">
          </div></td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form></td>
	<?php
	}
	?>
   	<!-- FIN DE MODIFICAR REVISIÓN -->
  </tr>
  <tr>
   	<!-- INICIO DE ELIMINAR REVISIÓN -->
	<?php
	if($opcion==3)
	{
	?>
    <td colspan="2"><form action="resultado.php?opcion=3" method="post" name="eliminar" id="eliminar">
      <table border="0" align="center">
        <tr>
          <td colspan="3" class="titulo3">Eliminar Revisi&oacute;n</td>
          </tr>
        <tr>
          <td width="129">&nbsp;</td>
          <td width="129">&nbsp;</td>
          <td width="170"><input name="identificador" type="hidden" id="identificador" value="<?echo $id?>"></td>
          </tr>
        <tr>
          <td rowspan="8"><img src="imagenes/eliminarRevision.png" width="128" height="128"></td>
          <td class="texto2"><div align="center">Identificador</div></td>
          <td><div align="center"><strong># <?php echo($id);?> </strong></div></td>
          </tr>
        <tr>
          <td class="texto2"><div align="center">N&oacute;mina</div></td>
          <td><div align="center"><?php echo($nomina);?></div></td></tr>
        <tr>
          <td class="texto2"><div align="center">Fecha</div></td>
          <td><div align="center"><?php echo($fecha);?></div></td></tr>
        <tr>
          <td colspan="2"><hr></td>
          </tr>
        <tr>
          <td class="texto2"><div align="center">Clasificar</div></td>
          <td>          <div align="center"><?php echo($clasificar);?></div></td></tr>
        <tr>
          <td class="texto2"><div align="center">Ordenar</div></td>
          <td>          <div align="center"><?php echo($ordenar);?></div></td></tr>
        <tr>
          <td class="texto2"><div align="center">Limpieza</div></td>
          <td>          <div align="center"><?php echo($limpieza);?></div></td></tr>
        <tr>
          <td class="texto2"><div align="center">Estandarizar</div></td>
          <td>          <div align="center"><?php echo($estandarizar);?></div></td></tr>
        <tr>
          <td colspan="3"><hr></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="texto2"><div align="center">Calificaci&oacute;n</div></td>
          <td><div align="center"><?php echo($calificacion);?></div></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="texto2"><div align="center">Disciplina</div></td>
          <td><div align="center"><?php echo($disciplina);?></div></td>
          </tr>
        <tr>
          <td colspan="3"><hr></td>
        </tr>
        <tr>
          <td colspan="3"><div align="center"><img src="<? echo $foto ?>" width="640" height="480"></div>
		  <div align="center" class="observaciones"><br>
		      <? echo $revision[9] ?></div>
		  </td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="texto2"><div align="center"></div></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="texto2"><div align="center">Observaciones</div></td>
          <td class="observaciones"><?php if($observaciones!=""){ echo($observaciones);}else{echo("Ninguna");}?></td>
        </tr>
        <tr>
          <td colspan="3"><hr></td>
        </tr>
        <tr>
          <td colspan="3"><div align="center">
            </div>            <div align="center">
                <input name="btEliminar" type="submit" id="btEliminar" value="Eliminar Revisi&oacute;n">
            </div></td>
          </tr>
      </table>
    </form></td>
	<?php
	}
	?>
   	<!-- FIN DE ELIMINAR REVISIÓN -->
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
