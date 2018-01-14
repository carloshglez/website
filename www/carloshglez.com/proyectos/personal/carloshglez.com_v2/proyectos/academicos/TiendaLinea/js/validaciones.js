// JavaScript Document
	function validarNombrePelicula(pagina,formId,capa)
	{
		var nombre = document.getElementById("nombre");
		var Template = /^[a-z0-9 ]+$/i //Formato de alfanumerico

		if(!Template.test(nombre.value))
			alert("El nombre ingresado no es valido.");
		else
		   	EnviarForm(pagina,formId,capa);
	}
	
	function validarInfoPelicula(formulario)
	{
		var correcto = 0;
		var mensajeError = "";
		
		var nombre = document.getElementById("nombre");
		var formatoNombre = /^[a-z0-9 ]+$/i;
		var autor = document.getElementById("autor");	
		var formatoAutor = /^[a-z ]+$/i;
		var director = document.getElementById("director");	
		var formatoDirector = /^[a-z ]+$/i;	
		var imagen = document.getElementById("imagen");
		var formatoImagen = /^[a-z0-9\/\.\:\-]+$/i;
		var precio = document.getElementById("precio");
		var formatoPrecio = /^[0-9]+\.[0-9]{2}$/;
		
		if(formatoNombre.test(nombre.value))
			correcto++;
		else
			mensajeError += "El nombre ingresado no es valido.\n";

		if(formatoAutor.test(autor.value))
			correcto++;
		else
			mensajeError += "El autor ingresado no es valido.\n";

		if(formatoDirector.test(director.value))
			correcto++;
		else
			mensajeError += "El director ingresado no es valido.\n";
			
		if(formatoImagen.test(imagen.value))
			correcto++;
		else
			mensajeError += "La url ingresada de la imagen no es valida.\n";
			
		if(formatoPrecio.test(precio.value))
			correcto++;
		else
			mensajeError += "El precio ingresado no es valido.\n";
		
		if(correcto==5)
			return true;
		else
		{
			alert(mensajeError);
			return false;
		}
	}
	
	function validarInfoPelicula2(formulario)
	{
		var correcto = 0;
		var mensajeError = "";
		
		var nombre = document.getElementById("nombre");
		var formatoNombre = /^[a-z0-9 ]+$/i;
		var genero = document.getElementById("genero");	
		var formatoGenero = /^[a-z ]+$/i;
		
		var autor = document.getElementById("autor");	
		var formatoAutor = /^[a-z ]+$/i;
		var director = document.getElementById("director");	
		var formatoDirector = /^[a-z ]+$/i;	

		var clasificacion = document.getElementById("clasificacion");		
		var formatoClasificacion = /^[a-z0-9 ]+$/i;
		var formato = document.getElementById("formato");
		var formatoFormato = /^[a-z ]+$/i;		
		
		var imagen = document.getElementById("imagen");
		var formatoImagen = /^[a-z0-9\/\.\:\-]+$/i;
		var precio = document.getElementById("precio");
		var formatoPrecio = /^[0-9]+\.[0-9]{2}$/;
		
		if(formatoNombre.test(nombre.value))
			correcto++;
		else
			mensajeError += "El nombre ingresado no es valido.\n";

		if(formatoGenero.test(genero.value))
			correcto++;
		else
			mensajeError += "El genero ingresado no es valido.\n";
			
		if(formatoAutor.test(autor.value))
			correcto++;
		else
			mensajeError += "El autor ingresado no es valido.\n";

		if(formatoDirector.test(director.value))
			correcto++;
		else
			mensajeError += "El director ingresado no es valido.\n";

		if(formatoClasificacion.test(clasificacion.value))
			correcto++;
		else
			mensajeError += "La clasificacion ingresada no es valido.\n";
			
		if(formatoFormato.test(formato.value))
			correcto++;
		else
			mensajeError += "El formato ingresado no es valido.\n";			
			
		if(formatoImagen.test(imagen.value))
			correcto++;
		else
			mensajeError += "La url ingresada de la imagen no es valida.\n";
			
		if(formatoPrecio.test(precio.value))
			correcto++;
		else
			mensajeError += "El precio ingresado no es valido.\n";
		
		if(correcto==8)
			return true;
		else
		{
			alert(mensajeError);
			return false;
		}
	}
	
	function validarLogin(formulario)
	{
		var correcto = 0;
		var mensajeError = "";
		
		var usuario = document.getElementById("Usuario");
		var formatoUsuario = /^[a-z0-9 ]+$/i;
		var clave = document.getElementById("Clave");
		var formatoClave = /^[a-z0-9 ]+$/i;
		
		if(formatoUsuario.test(usuario.value))
			correcto++;
		else
			mensajeError += "El usuario ingresado no es valido.\n";

		if(formatoClave.test(clave.value))
			correcto++;
		else
			mensajeError += "La clave ingresada no es valido.\n";

		if(correcto==2)
			return true;
		else
		{
			alert(mensajeError);
			return false;
		}
	}
	
	function validarEnvio(formulario)
	{
		var correcto = 0;
		var mensajeError = "";
		
		var nombre = document.getElementById("nombre");
		var formatoNombre = /^[a-z0-9 ]+$/i;
		var correo = document.getElementById("correo");
		var formatoCorreo = /^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/;
		
		if(formatoNombre.test(nombre.value))
			correcto++;
		else
			mensajeError += "El nombre ingresado no es valido.\n";

		if(formatoCorreo.test(correo.value))
			correcto++;
		else
			mensajeError += "El correo ingresado no es valido.\n";

		if(correcto==2)
			return true;
		else
		{
			alert(mensajeError);
			return false;
		}
	}
	
