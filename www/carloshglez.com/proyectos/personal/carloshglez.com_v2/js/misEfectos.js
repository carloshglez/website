		$().ready(function() {
			$('.kwicks').kwicks({
				max : 300,
				spacing : 5
			});
		});
			
		function cargarSitio(){
			getText("inicio/sobreMi.html","contenido");
		}
		
		function inicio(){
			document.getElementById('listaInicio').style.display='inherit';
			document.getElementById('listaCV').style.display='none';
			document.getElementById('listaProyectos').style.display='none';
			document.getElementById('listaContacto').style.display='none';
			document.getElementById('navigation-block').style.top='-185px';
			slide("#listaInicio", 25, 15, 150, .8);
			getText("inicio/sobreMi.html","contenido");
		}
		function cv(){
			document.getElementById('listaInicio').style.display='none';
			document.getElementById('listaCV').style.display='inherit';
			document.getElementById('listaProyectos').style.display='none';
			document.getElementById('listaContacto').style.display='none';
			document.getElementById('navigation-block').style.top='-170px';
			slide("#listaCV", 25, 15, 150, .8);
			getText("cv/index.html","contenido");
		}
		function proyectos(){
			document.getElementById('listaInicio').style.display='none';
			document.getElementById('listaCV').style.display='none';
			document.getElementById('listaProyectos').style.display='inherit';
			document.getElementById('listaProfesional').style.display='none';
			document.getElementById('listaAcademico').style.display='none';
			document.getElementById('listaPersonal').style.display='none';
			document.getElementById('listaContacto').style.display='none';
			document.getElementById('navigation-block').style.top='-165px';
			slide("#listaProyectos", 25, 15, 150, .8);
			getText("proyectos/index.html","contenido");
		}
		function contacto(){
			document.getElementById('listaInicio').style.display='none';
			document.getElementById('listaCV').style.display='none';
			document.getElementById('listaProyectos').style.display='none';
			document.getElementById('listaContacto').style.display='inherit';
			document.getElementById('navigation-block').style.top='-155px';
			slide("#listaContacto", 25, 15, 150, .8);
			getText("contacto/datos.html","contenido");
		}
		
		function verProyectosProfesional(){
			document.getElementById('listaProfesional').style.display='inherit';
			document.getElementById('listaAcademico').style.display='none';
			document.getElementById('listaPersonal').style.display='none';
			document.getElementById('navigation-block').style.top='-27px';
		}
		function verProyectosAcademico(){
			document.getElementById('listaProfesional').style.display='none';
			document.getElementById('listaAcademico').style.display='inherit';
			document.getElementById('listaPersonal').style.display='none';
			document.getElementById('navigation-block').style.top='-20px';
		}
		function verProyectosPersonal(){
			document.getElementById('listaProfesional').style.display='none';
			document.getElementById('listaAcademico').style.display='none';
			document.getElementById('listaPersonal').style.display='inherit';
			document.getElementById('navigation-block').style.top='-80px';
		}
