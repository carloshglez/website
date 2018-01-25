	
	//DECLRACIÓN DE VARIABLES////////////////////////////////////////////////////////////////////////////////
	var slidemenu_width='1001px' //specify width of menu (in pixels)
	var slidemenu_reveal='1001px' //specify amount that menu should protrude initially
	var slidemenu_top='50px'   //specify vertical offset of menu on page
	
	var ns4=document.layers?1:0
	var ie4=document.all
	var ns6=document.getElementById&&!document.all?1:0
	
	if (ie4||ns6){
	document.write('<div id="slidemenubar2" style="left:'+((parseInt(slidemenu_width)-parseInt(slidemenu_reveal))*-1)+'px; z-index:2; top:'+slidemenu_top+'; width:'+slidemenu_width+'" onMouseover="pull()" onMouseout="draw()">')
	}
	else if (ns4){
	document.write('<style>\n#slidemenubar{\nwidth:'+slidemenu_width+';}\n<\/style>\n')
	document.write('<layer id="slidemenubar" left=0 top='+slidemenu_top+' width='+slidemenu_width+' z-index:2; onMouseover="pull()" onMouseout="draw()" visibility=hide>')
	}
	/////////////////////////////////////////////////////////
	
	//CONTENIDO DEL MENU////////////////////////////////////////////////////////////////////////////////
	var sitems=new Array()
	
	//siteitems[x]=["Item Text", "Optional URL associated with text", "Image", "Image_onMouseOver", "Image_onMouseOut"]
	
	sitems[0]=["", "#", "imagenes/barraVacia.png", "this.src='imagenes/barraVacia.png'", "this.src='imagenes/barraVacia.png'"]
	sitems[1]=["", "#", "imagenes/vacio.png", "this.src='imagenes/vacio.png'", "this.src='imagenes/vacio.png'"]
	sitems[2]=["", "#", "imagenes/vacio.png", "this.src='imagenes/vacio.png'", "this.src='imagenes/vacio.png'"]
	sitems[3]=["", "#", "imagenes/vacio.png", "this.src='imagenes/vacio.png'", "this.src='imagenes/vacio.png'"]
	sitems[4]=["", "#", "imagenes/img1.png", "this.src='imagenes/img1a.png'", "this.src='imagenes/img1.png'"]
	sitems[5]=["", "#", "imagenes/img2.png", "this.src='imagenes/img2a.png'", "this.src='imagenes/img2.png'"]
	sitems[6]=["", "#", "imagenes/img3.png", "this.src='imagenes/img3a.png'", "this.src='imagenes/img3.png'"]
	sitems[7]=["", "#", "imagenes/img5.png", "this.src='imagenes/img5a.png'", "this.src='imagenes/img5.png'"]
	sitems[8]=["", "#", "imagenes/img6.png", "this.src='imagenes/img6a.png'", "this.src='imagenes/img6.png'"]
	sitems[9]=["", "#", "imagenes/img7.png", "this.src='imagenes/img7a.png'", "this.src='imagenes/img7.png'"]
	sitems[10]=["", "#", "imagenes/img9.png", "this.src='imagenes/img9a.png'", "this.src='imagenes/img9.png'"]	

	var subimg1="this.src='imagenes/imgsub1.png'"
	var subimg1a="this.src='imagenes/imgsub1a.png'"
	
	var subimg2="this.src='imagenes/imgsub2.png'"
	var subimg2a="this.src='imagenes/imgsub2a.png'"
	
	var subimg3="this.src='imagenes/imgsub3.png'"
	var subimg3a="this.src='imagenes/imgsub3a.png'"
	
	var subimg4="this.src='imagenes/imgsub4.png'"
	var subimg4a="this.src='imagenes/imgsub4a.png'"
	
	//If you want the links to load in another frame/window, specify name of target (ie: target="_new")
	var target=""
	/////////////////////////////////////////////////////////
	
	//CONSTRUCCIÓN DEL MENU////////////////////////////////////////////////////////////////////////////////
	var posicionSubmenu=6
	var x=-4
	if (ie4||ns4||ns6){
		for (i=0;i<sitems.length;i++){
			if (sitems[i][1]){
				if (i==posicionSubmenu){	//Crea el item con el submenu
					document.write('<img src="imagenes/vacio.png" border="0">')
					document.write('<div id="Layer1" style="position:absolute; width:100px; height:70px; z-index:2; left:501px; top:0px; overflow:hidden" onMouseOver="big()"; onMouseOut="small()";>')
					document.write('<img src="'+sitems[i][2]+'" border="0" onMouseOver="'+sitems[i][3]+';" onMouseOut="'+sitems[i][4]+';">')
					document.write('<br>')
					
					//Items del submenu
					document.write('<img src="imagenes/imgsub1.png" border="0" onMouseOver="'+subimg1a+';" onMouseOut="'+subimg1+';" onClick="getText(10)";>')
					document.write('<br>')
					
					document.write('<img src="imagenes/imgsub2.png" border="0" onMouseOver="'+subimg2a+';" onMouseOut="'+subimg2+';" onClick="getText(11)";>')
					document.write('<br>')
					
					document.write('<img src="imagenes/imgsub3.png" border="0" onMouseOver="'+subimg3a+';" onMouseOut="'+subimg3+';" onClick="getText(12)";>')
					document.write('<br>')
					
					document.write('<img src="imagenes/imgsub4.png" border="0" onMouseOver="'+subimg4a+';" onMouseOut="'+subimg4+';" onClick="getText(13)";>')
					//document.write('<br>')
					/////////////////////////////////////////////
					
					document.write('</div>')
					document.write('')
				}
				else{
					document.write('<img src="'+sitems[i][2]+'" border="0" onMouseOver="'+sitems[i][3]+';" onMouseOut="'+sitems[i][4]+';" onClick="getText('+x+')";>')
					document.write('')
					x++;
				}
			}
		}
	}
	/////////////////////////////////////////////////////////

	//FUNCIONES DEL MENU////////////////////////////////////////////////////////////////////////////////
	function regenerate(){
		window.location.reload()
		}
		function regenerate2(){
			if (ns4){
			document.slidemenubar.left=((parseInt(slidemenu_width)-parseInt(slidemenu_reveal))*-1)
			document.slidemenubar.visibility="show"
			setTimeout("window.onresize=regenerate",400)
		}
	}
	window.onload=regenerate2
	//var previousOnload = window.onload;
	//window.onload = function () { if(previousOnload) previousOnload(); addReflections(); regenerate2(); }
	
	rightboundary=0
	leftboundary=(parseInt(slidemenu_width)-parseInt(slidemenu_reveal))*-1
	
	if (ie4||ns6){
		document.write('</div>')
		themenu=(ns6)? document.getElementById("slidemenubar2").style : document.all.slidemenubar2.style
	}
	else if (ns4){
		document.write('</layer>')
		themenu=document.layers.slidemenubar
	}
	
	function pull(){
		if (window.drawit)
		clearInterval(drawit)
		pullit=setInterval("pullengine()",10)
	}
	function draw(){
		clearInterval(pullit)
		drawit=setInterval("drawengine()",10)
	}
	
	function pullengine(){
		if ((ie4||ns6)&&parseInt(themenu.left)<rightboundary)
			themenu.left=parseInt(themenu.left)+10+"px"
		else if(ns4&&themenu.left<rightboundary)
				themenu.left+=10
		else if (window.pullit){
				themenu.left=0
				clearInterval(pullit)
			 }
	}
	
	function drawengine(){
		if ((ie4||ns6)&&parseInt(themenu.left)>leftboundary)
			themenu.left=parseInt(themenu.left)-10+"px"
		else if(ns4&&themenu.left>leftboundary)
			themenu.left-=10
		else if (window.drawit){
			themenu.left=leftboundary
			clearInterval(drawit)
			 }
	}
	/////////////////////////////////////////////////////////
	
	
	//FUNCIONES DEL SUBMENU////////////////////////////////////////////////////////////////////////////////
	function big() {
		document.getElementById("Layer1").style.height='250px';
	}

	function small() {
		document.getElementById("Layer1").style.height='70px';
	}

	function start() {
		document.all.Layer1.style.height='70px';
	}
	/////////////////////////////////////////////////////////