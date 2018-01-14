	//FUNCIONES DE HOSPEDAJE////////////////////////////////////////////////////////////////////////////////
	
	hoteles=new Array()
	
	hoteles[0]="infoHotelDali.htm"
	hoteles[1]="infoHotelVilla.htm"
	hoteles[2]="infoHotelBello.htm"
	
	function getInfo(i)
	{ 
		var urlToCall = hoteles[i];
		
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
				
					changeItem(XMLHttpRequestObject.responseText);
					
					delete XMLHttpRequestObject;
					XMLHttpRequestObject = null;
				} 
			} 
		XMLHttpRequestObject.send(null); 
		}
	}
	
	
	function changeItem(texto){
			changeItemInit()
				if(iens6 || ns4) {
					oMessage.writeIt(texto)
				}
			}

	function changeItemInit(){
				if(iens6 || ns4) {
					oMessage=new makeChangeTextObj('infoHoteles')
				}
			}
			
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////	