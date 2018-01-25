	
	//SOLICITA CON AJAX EL ARCHIVO HTML CON EL CONTENIDO/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	function getText(i)
	{ 
		var urlToCall = archivo[i];
		
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
				
					//alert ("Ajax recibió el archivo "+urlToCall+" con el siguiente contenido:\n\n"+XMLHttpRequestObject.responseText);
				
					changeText(XMLHttpRequestObject.responseText);
					
					delete XMLHttpRequestObject;
					XMLHttpRequestObject = null;
				} 
			} 
		XMLHttpRequestObject.send(null); 
		}
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	//DESPLEGAR EL CONTENIDO////////////////////////////////////////////////////////////////////////////////
	var iens6=document.all||document.getElementById
	var ns4=document.layers
	
	/* Array Archivo[]:
		0 -- Sede
		1 -- Hospedaje
		2 -- Conferencias
		3 -- Inscripciones
		4 -- Agenda
		5 -- Eventos Sociales
		6 -- Contacto
		7 -- NO USAR
		8 -- Inicio
		9 -- Mapa de Sitio
		10 -- Conferencias especializadas
		11 -- Conferencias magnas
		12 -- Talleres
		13 -- Ponentes
	*/
	
	archivo=new Array()
	archivo[0]="infoSede.htm"
	archivo[1]="infoHospedaje.htm"
	archivo[2]="infoInscripcion.htm"
	archivo[3]="infoAgenda.htm"
	archivo[4]="infoEventos.htm"
	archivo[5]="infoContacto.htm"
	archivo[6]="infoPonencias.htm"
	archivo[7]=""
	archivo[8]="infoInicio.htm"
	archivo[9]="infoMapa.htm"
	archivo[10]="infoConferencias.htm"
	archivo[11]="infoConferenciasM.htm"
	archivo[12]="infoTalleres.htm"
	archivo[13]="infoPonentes.htm"
	archivo[14]="galeria.htm"
	
	
	function changeText(text){
		changeTextInit()
		if(iens6 || ns4) {
			oMessage1.writeIt(text)
		}
	}
	
	function changeTextInit(){
		if(iens6 || ns4) {
			oMessage1=new makeChangeTextObj('contenido')
		}
	}
	
	function makeChangeTextObj(obj){											
		//this.writeref=(ns4) ? alert("opcion1"):alert("opcion2");
	   	this.writeref=(ns4) ? eval('document.'+obj+'.document'):eval(document.getElementById(obj));
		this.writeIt=b_writeIt;	
	}

	function b_writeIt(text){
		if(ns4){
			this.writeref.write(text)
			this.writeref.close()
		}
		if(iens6){
		//alert(text);
		this.writeref.innerHTML=text
		}
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////