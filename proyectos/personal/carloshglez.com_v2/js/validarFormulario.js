function enviar(url,idForm,lugar)
{
	var correcto = true;
		var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;    
		$(".error").remove();        
		if( $("#Nombre").val() == "" ){            
			$("#Nombre").focus().after("<span class='error'>Ingresa tu nombre</span>");            
			correcto = false;
		}else if( $("#Correo").val() == "" || !emailreg.test($("#Correo").val()) ){            
			$("#Correo").focus().after("<span class='error'>Ingresa un email correcto</span>");            
			correcto = false;
		}else if( $("#Mensaje").val() == "" ){            
			$("#Mensaje").focus().after("<span class='error'>Ingresa un mensaje</span>");            
			correcto = false;    
		}
		
		if(correcto==true)
			EnviarForm(url,idForm,lugar);
}

function validar()
{	
	var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;    
	
	$("#Nombre, #Mensaje").keyup(function(){        
		if( $(this).val() != "" ){
			$(".error").fadeOut();            
			return false;        
		}    
	});    
	$("#Correo").keyup(function(){        
		if( $(this).val() != "" && emailreg.test($(this).val())){            
			$(".error").fadeOut();            
			return false;        
		}    
	});
}