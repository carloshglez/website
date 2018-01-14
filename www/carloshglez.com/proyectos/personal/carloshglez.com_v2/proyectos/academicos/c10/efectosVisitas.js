	//FUNCIONES DE HOSPEDAJE////////////////////////////////////////////////////////////////////////////////
	messages2=new Array()
	//			0		1				2
	messages2[0]=["", "<b>Telmex, empresa lider de telefonía en México, apoya al Decimo Congreso de Ingeniera. Dentro de alrededor de 1 semana contaremos con su patrocinio </b>"]
	messages2[1]=["", "<b>TELCEL, empresa lider de telefonía celular, apoya al Decimo Congreso de Ingenieria. Dentro de alrededor de 1 semana contaremos con su patrocinio</b>"]

			
	msgFont2='Arial,helvetiva'
	msgFontSize2="12"
	msgFontColor2="white"
	
	function changeItem2(num){
			changeItemInit2()
				if(iens6 || ns4) {
					oMessage5.writeIt('<span style="font-size:' +msgFontSize2+'px; font-family:'+msgFont2+'; color:'+msgFontColor2+'">'+messages2[num][1]+'</span>')
					oMessage6.writeIt('<span style="font-size:' +msgFontSize2+'px; font-family:'+msgFont2+'; color:'+msgFontColor2+'">'+messages2[num][1]+'</span>')
				}
			}

	function changeItemInit2(){
				if(iens6 || ns4) {
					oMessage5=new makeChangeTextObj2('infoEmpresa')
					oMessage6=new makeChangeTextObj2('infoEmpresa')
				}
			}
			
	function makeChangeTextObj2(obj){												
	   	this.writeref=(ns4) ? eval('document.'+obj+'.document'):eval(obj);		
		this.writeIt=b_writeIt2;	
	}

	function b_writeIt2(text){
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