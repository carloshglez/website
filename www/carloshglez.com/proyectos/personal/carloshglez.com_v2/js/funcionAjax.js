function getText(urlToCall,lugar)
	{
		var XMLHttpRequestObject = false;
		if (window.XMLHttpRequest) {
			XMLHttpRequestObject = new XMLHttpRequest();
		}
		else if (window.ActiveXObject) {
			XMLHttpRequestObject = new
			ActiveXObject("Microsoft.XMLHTTP");
		}

		if(XMLHttpRequestObject) {
			XMLHttpRequestObject.open("GET", urlToCall);
			XMLHttpRequestObject.onreadystatechange = function()
			{
				if (XMLHttpRequestObject.readyState == 4 &&
					XMLHttpRequestObject.status == 200) {

					//alert ("Se recibe el archivo "+urlToCall+" con el siguiente contenido:\n\n"+XMLHttpRequestObject.responseText);
					changeText(XMLHttpRequestObject.responseText,lugar);
					aplicarEfectos();
					
					delete XMLHttpRequestObject;
					XMLHttpRequestObject = null;
				}
                                else
                                    document.getElementById(lugar).innerHTML = "<br><br><br><br><br><br><br><br><br><br><br><div align=center><img src='imagenes/espera.gif'/></div>";
			}
		XMLHttpRequestObject.send(null);
		}
	}


var iens6=document.all||document.getElementById
var ns4=document.layers


function changeText(text,lugar)
{
	changeTextInit(lugar)
	if(iens6 || ns4) {
		oMessage1.writeIt(text)
	}
}

function changeTextInit(lugar)
{
	if(iens6 || ns4) {
		oMessage1=new makeChangeTextObj(lugar)
	}
}

function makeChangeTextObj(obj){
   	this.writeref=(ns4) ? eval('document.'+obj+'.document'):eval(document.getElementById(obj));
	this.writeIt=b_writeIt;
}

function b_writeIt(text)
{
	if(ns4){
		this.writeref.write(text)
		this.writeref.close()
	}
	if(iens6){
	this.writeref.innerHTML=text
	}
}



function ajaxFunction()
{
    var xmlHttp;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp=new XMLHttpRequest();
        return xmlHttp;
    } catch (e) {
        // Internet Explorer
        try {
            xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
            return xmlHttp;
        } catch (e) {
            try {
                xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
                return xmlHttp;
            } catch (e) {
                alert("Tu navegador no soporta AJAX!");
                return false;
            }
        }
    }
}


function EnviarForm(_pagina,formid,capa) {
    var ajax;
    var Formulario = document.getElementById(formid);
    var longitudFormulario = Formulario.elements.length;
    var cadenaFormulario = "";
    var sepCampos;

    sepCampos = "";
    for (var i=0; i <= Formulario.elements.length-1;i++) {
        cadenaFormulario += sepCampos+Formulario.elements[i].name+'='+encodeURI(Formulario.elements[i].value);
        sepCampos="&";
    }
    ajax = ajaxFunction();
    ajax.open("POST", _pagina, true);
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange = function() {
        if (ajax.readyState==1) {
            document.getElementById(capa).innerHTML = "<div align=center><img src='imagenes/espera.gif' widht='25' height='25'/></div>";
        }
        if (ajax.readyState == 4) {
            document.getElementById(capa).innerHTML = ajax.responseText;
        }
    }
    ajax.send(cadenaFormulario);
}

function aplicarEfectos() {
	$("img.reflect").reflect({/* Put custom options here */});
	
	$("[rel^='prettyPhoto']").prettyPhoto();
	
	$('#button').click(function(e) { // Button which will activate our modal
	$('#modal').reveal({ // The item which will be opened with reveal
		animation: 'fade',                   // fade, fadeAndPop, none
		animationspeed: 600,                       // how fast animtions are
		closeonbackgroundclick: true,              // if you click background will modal close?
		dismissmodalclass: 'close'    // the class of a button or element that will close an open modal
		});
		return false;
	});
	
	validar();
}

