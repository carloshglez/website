	//FUNCIONES DE HOSPEDAJE////////////////////////////////////////////////////////////////////////////////
	msgFont3='Verdana, Arial, Helvetica, sans-serif'
	msgFontSize3="10"
	msgFontColor3="#FFFFFF"
	messages3=new Array()
	//			0		1				2
	messages3[0]=["","<img src='imagenes/Ricardo.png'>","<strong>La inovaci&oacute;n como herramienta en tiempos de crisis</strong><br>"]
	messages3[1]=["","<img src='imagenes/sang shin.gif'>","<strong>Cloud computing</strong><br>The cloud computing is emerging as a next generation computing platform and for good reasons.  The cloud computing encompasses many different areas - software as a service, platform as a service, grid computing, database as a service, virtualization, utility computing, application hosting, infrastructure as a service, and so on. In this session, we are going to look into the motivation of the cloud computing first.  The key traits of cloud computing is then explored. The business and ownership models of how clouding computing can be used in a public or in an organization is going to be talked about. Finally concrete cloud computing technologies and services will be talked about and demonstrated."]
	messages3[2]=["","<img src='imagenes/habacuc.jpg'>","<strong><font color='red'>Foro de Viedojuegos</font></strong><br>"]
	messages3[3]=["","<img src='imagenes/montalvo.png'>","<strong>El poder de creer</strong><br>"]


			
	
	
	function changeItem3(num){
			changeItemInit3()
				if(iens6 || ns4) {
					oMessage5.writeIt(messages3[num][1])
					oMessage6.writeIt(messages3[num][2])
				}
			}

	function changeItemInit3(){
				if(iens6 || ns4) {
					oMessage5=new makeChangeTextObj3('infoConferencias')
					oMessage6=new makeChangeTextObj3('infoTexto')
				}
			}
			
	function makeChangeTextObj3(obj){												
	   	this.writeref=(ns4) ? eval('document.'+obj+'.document'):eval(obj);		
		this.writeIt=b_writeIt3;	
	}

	function b_writeIt3(text){
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