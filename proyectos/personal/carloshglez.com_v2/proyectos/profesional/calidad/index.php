<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Sistema de Calidad</title>
<link href="Programa5S/estilos.css" rel="stylesheet" type="text/css">
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
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' es necesario.\n'; }
  } if (errors) alert('Han ocurrido los siguientes errores:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
</head>

<body>
<table width="900" border="0" align="center">
  <tr>
    <td width="900"><img src="Programa5S/imagenes/encabezado.jpg" width="900" height="96"></td>
  </tr>
  <tr>
    <td><h2>Sistema de Calidad</h2></td>
  </tr>
  <tr>
    <td class="titulo3">EMPRESA</td>
  </tr>
  <tr>
    <td><br><br>&nbsp;
    </td>
  </tr>
  <tr>
    <td><form action="validacion.php" method="post" name="ingreso" id="ingreso" onSubmit="MM_validateForm('nomina','','R','clave','','R');return document.MM_returnValue">
      <table width="243" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor="#000000">
        <tr>
          <td><table width="240" border="0" align="center" cellpadding="7">
            <tr>
              <td colspan="2"><div align="center">Iniciar Sesi&oacute;n <img src="Programa5S/imagenes/llaves.png" width="30" height="30"></div></td>
              </tr>
            <tr>
              <td width="120"><div align="center">Usuario:</div></td>
              <td width="120"><input name="nomina" type="text" id="nomina" size="20"></td>
            </tr>
            <tr>
              <td><div align="center">Contrase&ntilde;a:</div></td>
              <td><input name="clave" type="password" id="clave" size="20"></td>
            </tr>
            <tr>
              <td colspan="2"><div align="center">
                  <input name="btEntrar" type="submit" id="btEntrar" value="Entrar">
              </div></td>
            </tr>
          </table></td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td>
	<table align="center" width="500">
	<tr>
		<td colspan="4" rowspan="1" align="center">
			<font size="1">
			<br><br><hr><b>Datos de acceso</b><br>
			</font>
		</td>
	</tr>
	<tr>
		<td align="center">
			<font size="1">
			Usuario: <i>admin</i><br>
			Contraseña: <i>admin</i>
			</font>
		</td>
		<td align="center">
			<font size="1">
			Usuario: <i>consultor</i><br>
			Contraseña: <i>consultor</i>
			</font>
		</td>
		<td align="center">
			<font size="1">
			Usuario: <i>director</i><br>
			Contraseña: <i>director</i>
			</font>
		</td>
		<td align="center">
			<font size="1">
			Usuario: <i>empleado</i><br>
			Contraseña: <i>empleado</i>
			</font>
		</td>
	</tr>
	</table>
	</td>
  </tr>
</table>
</body>
</html>
