	
	//FUNCIONES DE SEDE////////////////////////////////////////////////////////////////////////////////
	
	var speed=2
	var limiteAbajo=150
	var limiteArriba=0;
			
	function movedown(){
		if (iens6&&parseInt(crossobj.style.top)>=(contentheight*(-1)+limiteAbajo))
			crossobj.style.top=parseInt(crossobj.style.top)-speed+"px"
		else if (ns4&&crossobj.top>=(contentheight*(-1)+limiteArriba))
			crossobj.top-=speed
		movedownvar=setTimeout("movedown()",20)
	}
			
	function moveup(){
		if (iens6&&parseInt(crossobj.style.top)<=limiteArriba)
			crossobj.style.top=parseInt(crossobj.style.top)+speed+"px"
		else if (ns4&&crossobj.top<=limiteArriba)
			crossobj.top+=speed
	moveupvar=setTimeout("moveup()",20)
	}
			
	function getcontent_height(preparaVariables){
		if(preparaVariables==1){ //Sede
			speed=2
			limiteAbajo=150
			limiteArriba=0;
		}
		else
		if(preparaVariables==2){ //Hodspedaje
			speed=2
			limiteAbajo=250
			limiteArriba=0;
		}
		else
		if(preparaVariables==3){ //Organizadores
			speed=2
			limiteAbajo=150
			limiteArriba=0;
		}
		else
		if(preparaVariables==4){ //Ponentes
			speed=2
			limiteAbajo=150
			limiteArriba=0;
		}
		else
		if(preparaVariables==5){ //Inicio
			speed=2
			limiteAbajo=150
			limiteArriba=0;
		}
	
		if (iens6){
			crossobj=document.getElementById? document.getElementById("content") : document.all.content
			contentheight=crossobj.offsetHeight
			}
		else if (ns4){
			crossobj=document.nscontainer.document.nscontent
			contentheight=crossobj.clip.height
			}
				
		if (iens6)
			contentheight=crossobj.offsetHeight
		else if (ns4)
			document.nscontainer.document.nscontent.visibility="show"
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////


	
	//EFECTO DE LA IMAGEN////////////////////////////////////////////////////////////////////////////////
	function repetirError() {
		setTimeout("efectoImagen()",2000);
	return true;
	}

	window.onerror = repetirError

	// Creamos las imágenes que utilizaremos
	// Definimos la URL de la imagen
	// Definimos el enlace que se cargará al hacer click sobre la imagen

	var image1 = new Image()
	image1.src = "imagenes/wtc3.png"
	link1 = 'http://enlace1.html'

	var image2 = new Image()
	image2.src = "imagenes/wtc2.png"
	link2 = 'http://enlace2.html'

	var image3 = new Image()
	image3.src = "imagenes/wtc1.png"
	link3 = 'http://enlace3.html'

	// Definimos si queremos utilizar la imagen como enlace hacia otra página
	var enlace = false
	// Cantidad de imágenes a utilizar en el efecto
	var numImagenes = 3
	// Velocidad del efecto en segundos
	var velocidad = 3
	// Definimos que imagen se carga primero
	var pasoImagen = 1

	efectoImagen();

	function efectoImagen() {
		if (!document.images) {
			return }
		if (document.all) {
			efecto.filters.blendTrans.apply()
			document.images.efecto.src = eval("image"+pasoImagen+".src") }
		if (document.all) {
			efecto.filters.blendTrans.play() }
		if (pasoImagen < numImagenes) {
			pasoImagen++ }
		else {
			pasoImagen = 1 }
			
		if (document.all) {
			setTimeout("efectoImagen()",velocidad*1000+3000) }
		else {
			setTimeout("efectoImagen()",velocidad*1000) }

	} // Fin de la función efectoImagen()

	function efectoLink() {
		if (enlace) {

		var imgCargada = document.images.efecto.src
		pasoImagenTemp = imgCargada.substring(imgCargada.length-5,imgCargada.length-4)

			if (pasoImagenTemp == '0') {
				window.location = link1 }
			else if (pasoImagenTemp == '1') {
				window.location = link2 }
			else {
				window.location = link3 }
		}
		else { return }
	} // Fin de la función efectoLink()
	