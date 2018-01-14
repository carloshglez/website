//FUNCIONES DE EFECTO DE BRILLO EN EL LOGO////////////////////////////////////////////////////////////////////////////////
function high(which2)
{
theobject=which2;
highlighting=setInterval("highlightit(theobject)",50);
	
}
function low(which2)
{
clearInterval(highlighting);
which2.filters.alpha.opacity=80;
}
function highlightit(cur2)
{
if(cur2.filters.alpha.opacity<100)
cur2.filters.alpha.opacity+=5
else if(window.highlighting)
clearInterval(highlighting)
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
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////



/*SIN USO
//FUNCIONES DE INICIO////////////////////////////////////////////////////////////////////////////////
	
	congresos=new Array()
//				  0		 1         2         3
//	congresos[0]=["", "titulo", "texto", "imagen"]

	congresos[1]=["", "COMIENZA LA IDEA: C1", 			"<p><strong>Fecha:</strong><br>...<br><br><strong>Lugar Sede:</strong><br>...<br><br><strong>Otra informaci&oacute;n:</strong><br>...<br><br><br><br><br><br><br><br>...</p>", 	"<img src='imagenes/LogoC1_grande.png'>"]
	congresos[2]=["", "CONGRESO DE INGENIERÍA: C2", 	"<p><strong>Fecha:</strong><br>29,30,31 de Marzo del 2001<br><br><strong>Lugar Sede:</strong><br>Puerto de Veracruz<br><br><strong>Otra informaci&oacute;n:</strong><br>...<br><br><br><br><br><br><br><br>...</p>", 	"<img src='imagenes/LogoC2_grande.png'>"]
	congresos[3]=["", "EL NACIMIENTO DE UNA ERA: C3", 	"<p><strong>Fecha:</strong><br>2002	<br><br><strong>Lugar Sede:</strong><br>...<br><br><strong>Otra informaci&oacute;n:</strong><br>...<br><br><br><br><br><br><br><br>...</p>", 	"<img src='imagenes/LogoC3_grande.png'>"]
	congresos[4]=["", "CONGRESO DE INGENIERÍA: C4", 	"<p><strong>Fecha:</strong><br>3,4,5 de Abril de 2003<br><br><strong>Lugar Sede:</strong><br>Word Trade Center,Veracruz<br><br><strong>Otra informaci&oacute;n:</strong><br>...<br><br><br><br><br><br><br><br>...</p>", 	"<img src='imagenes/LogoC4_grande.png'>"]
	congresos[5]=["", "CONGRESO DE INGENIERÍA: C5", 	"<p><strong>Fecha:</strong><br>18,19,20 de Marzo del 2004<br><br><strong>Lugar Sede:</strong><br>Word Trade Center,Veracruz<br><br><strong>Otra informaci&oacute;n:</strong><br>...<br><br><br><br><br><br><br><br>...</p>",		"<img src='imagenes/LogoC5_grande.png'>"]
	congresos[6]=["", "CONGRESO DE INGENIERÍA: C6", 	"<p><strong>Fecha:</strong><br>2005<br><br><strong>Lugar Sede:</strong><br>...<br><br><strong>Otra informaci&oacute;n:</strong><br>...<br><br><br><br><br><br><br><br>...</p>",		"<img src='imagenes/LogoC6_grande.png'>"]
	congresos[7]=["", "CONGRESO DE INGENIERÍA: C7", 	"<p><strong>Fecha:</strong><br>2006<br><br><strong>Lugar Sede:</strong><br>...<br><br><strong>Otra informaci&oacute;n:</strong><br>...<br><br><br><br><br><br><br><br>...</p>",		"<img src='imagenes/LogoC7_grande.png'>"]
	congresos[8]=["", "INOVANDO EL FUTURO: C8", 		"<p><strong>Fecha:</strong><br>22,23,24 de Marzo 2007<br><br><strong>Lugar Sede:</strong><br>...<br><br><strong>Otra informaci&oacute;n:</strong><br>...<br><br><br><br><br><br><br><br>...</p>",		"<img src='imagenes/LogoC8_grande.png'>"]
	congresos[9]=["", "REVOLUCIÓN TECNOLÓGICA: C9", 	"<p><strong>Fecha:</strong><br>2008<br><br><strong>Lugar Sede:</strong><br>Word Trade Center,Veracruz<br><br><strong>Otra informaci&oacute;n:</strong><br>...<br><br><br><br><br><br><br><br>...</p>",		"<img src='imagenes/LogoC9_grande.png'>"]
	congresos[10]=["","PRÓXIMAMENTE: C10",			"X Congreso Internacional de Ingeniería<br> <p><strong>Fecha:</strong><br>23, 24 y 25 de Abril del 2009<br><br><strong>Lugar Sede:</strong><br>Word Trade Center,Veracruz<br><br><strong>Otra informaci&oacute;n:</strong><br>...<br><br><br><br><br><br><br><br>...</p>",	"<img src='imagenes/LogoC10_grande.png'>"]
	function cambiarTexto(posicion){
		if(iens6 || ns4) {
			oMensaje1=new makeChangeTextObj('titulo')
			oMensaje2=new makeChangeTextObj('informacion')
			oMensaje3=new makeChangeTextObj('imagen')

			oMensaje1.writeIt(congresos[posicion][1])
			oMensaje2.writeIt(congresos[posicion][2])
			oMensaje3.writeIt(congresos[posicion][3])
		}
	}
			
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////	*/