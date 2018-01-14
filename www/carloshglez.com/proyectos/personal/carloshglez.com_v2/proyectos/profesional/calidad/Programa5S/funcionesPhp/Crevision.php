<?php
/***************************************************************************************
Función para ingresar una nueva revisión al sistema.
Recibe los siguientes datos:
	String	nómina del empleado
	String	fecha de la revisión
	int		calificación en el aspecto de 'clasificar'
	int		calificación en el aspecto de 'ordenar'
	int		calificación en el aspecto de 'limpieza'
	int		calificación en el aspecto de 'estandarizar'
	String	ruta de la foto
	String	observaciones
Hace el cálculo de la calificación promedio de los aspectos de 'clasificar, ordenar, limpieza y estandarizar'.
Hace el cálculo de la calificación en el aspecto de 'disciplina'.
Regresa 'true' o 'false' lo que permite validar si se pudo ingresar la revisión en la base de datos del sistema.
***************************************************************************************/
function insertarEvaluacion($nomina,$fecha,$clasificar,$ordenar,$limpieza,$estandarizar,$foto,$observaciones)
{
	$Conexion=Conectar();
	$calificacion=($clasificar+$ordenar+$limpieza+$estandarizar)/4;
	$disciplina=calcularDisciplina($Conexion,$clasificar,$ordenar,$limpieza,$estandarizar,$nomina,0);
	
    $VSql="INSERT INTO `evaluacion`(nomina,fecha_revision,clasificar,ordenar,limpieza,estandarizar,disciplina,calificacion,foto,observaciones)
	VALUES('$nomina','$fecha','$clasificar','$ordenar','$limpieza','$estandarizar','$disciplina','$calificacion','$foto','$observaciones');";
    
	if(mysql_query($VSql, $Conexion))
	{
		Desconectar($Conexion);
		return true;
	}
	else
	{
		Desconectar($Conexion);
		return false;
	}
	Desconectar($Conexion);
	return false;
}

/***************************************************************************************
Función para modificar una revisión ya almacenada en el sistema.
Recibe los siguientes datos:
	int		identificador único de la revisión
	String	nómina del empleado
	String	fecha de la revisión
	int		calificación en el aspecto de 'clasificar'
	int		calificación en el aspecto de 'ordenar'
	int		calificación en el aspecto de 'limpieza'
	int		calificación en el aspecto de 'estandarizar'
	String	ruta de la foto
	String	observaciones
Hace nuevamente el cálculo de la calificación promedio con los nuevos aspectos de 'clasificar, ordenar, limpieza y estandarizar'.
Hace nuevamente el cálculo de la calificación en el aspecto de 'disciplina'.
Regresa 'true' o 'false' lo que permite validar si se pudo modificar la revisión en la base de datos del sistema.
***************************************************************************************/
function modificarEvaluacion($id,$nomina,$fecha,$clasificar,$ordenar,$limpieza,$estandarizar,$foto,$observaciones)
{
	$Conexion=Conectar();
	if($id<=8)
	{
		echo("<script>alert('Gracias por usar el DEMO. Esta revisión no se puede modificar debido a que la aplicación está bajo un entorno de demostración.');</script>");
	}
	else
	{
	$calificacion=($clasificar+$ordenar+$limpieza+$estandarizar)/4;
	$disciplina=calcularDisciplina($Conexion,$clasificar,$ordenar,$limpieza,$estandarizar,$nomina,$id);
	
    $VSql="UPDATE evaluacion
        SET
			nomina='$nomina',
            fecha_revision='$fecha',
			clasificar='$clasificar',
			ordenar='$ordenar',
			limpieza='$limpieza',
			estandarizar='$estandarizar',
			disciplina='$disciplina',
			calificacion='$calificacion',
            foto='$foto',
			observaciones='$observaciones'
        WHERE
            id_eval='$id';";
    
	if(mysql_query($VSql, $Conexion))
	{
		Desconectar($Conexion);
		return true;
	}
	else
	{
		Desconectar($Conexion);
		return false;
	}
	}
	Desconectar($Conexion);
	return false;
}

/***************************************************************************************
Función para eiminar una revisión ya almacenada en el sistema.
Recibe los siguientes datos:
	int		identificador único de la revisión
Regresa 'true' o 'false' lo que permite validar si se pudo eliminar la revisión en la base de datos del sistema.
***************************************************************************************/
function eliminarEvaluacion($id)
{
	$Conexion=Conectar();
	if($id<=8)
	{
		echo("<script>alert('Gracias por usar el DEMO. Esta revisión no se puede eliminar debido a que la aplicación está bajo un entorno de demostración.');</script>");
	}
	else
	{
    $VSql="DELETE FROM evaluacion
			WHERE id_eval='$id'
			LIMIT 1;";
    
	if(mysql_query($VSql, $Conexion))
	{
		Desconectar($Conexion);
		return true;
	}
	else
	{
		Desconectar($Conexion);
		return false;
	}
	}
	Desconectar($Conexion);
	return false;
}

/***************************************************************************************
Función para obtener el identificador único que tendrá una nueva revisión.
No recibe ningún dato.
Regresa el identificador único que tendrá la nueva revisión.
***************************************************************************************/
function obtenerNuevoId()
{
	$Conexion=Conectar();
    
	$VSql="SELECT MAX(id_eval) AS maximoId FROM `evaluacion`";
	$VBusqueda=mysql_query($VSql, $Conexion);
	$nuevoId=(mysql_result($VBusqueda,0,"maximoId"))+1;
	
	Desconectar($Conexion);
	
	return $nuevoId;
}

/***************************************************************************************
Función para obtener la calificación en el aspecto de 'disciplina' de un empleado.
El cálculo de la 'disciplina' se realiza cómo sigue:
	id_revisión		Clasificar	Ordenar	Llimpieza	Estandarizar		Disciplina
		3				80		100			60			80
		4				70		70			100			90					10
	
	La disciplina de la revisión 4 es:
	disciplina	=	(70-80)   + 	(70-100)   +	(100-60)   +	(90-80)
	disciplina	=.	-10	   +	-30	   +	40 	+	10	=	'10'
	
Recibe los siguientes datos:
	SQL		conexión de la base de datos
	int		calificación en el aspecto de 'clasificar'
	int		calificación en el aspecto de 'ordenar'
	int		calificación en el aspecto de 'limpieza'
	int		calificación en el aspecto de 'estandarizar'
	String	nómina del empleado
	int		identificador único de la revisión(id)
Cuando el id = 0 indica que se va a ingresar una nueva revisión y se va a hacer el cálculo de la 'disciplina' con
los datos de la última revisión registrada.
Cuando el id > 0 indica que se va a modificar una revisión y se va a hacer el cálculo de la 'disciplina' con
los datos de la revisión anterior registrada.
Regresa la calificación en el aspecto de 'disciplina' de un empleado.
***************************************************************************************/
function calcularDisciplina($Conexion,$clasificar,$ordenar,$limpieza,$estandarizar,$nomina,$id)
{
	if($id==0)
	{
		$VSql="SELECT * FROM `evaluacion` WHERE id_eval=(SELECT MAX(id_eval) FROM `evaluacion` WHERE nomina='$nomina' LIMIT 1)";
		$VBusqueda=mysql_query($VSql, $Conexion);
		$totalResultados=mysql_num_rows($VBusqueda);
	}
	else
	if($id>0)
	{
		$VSql="SELECT MIN(id_eval) AS minimoId FROM `evaluacion` WHERE nomina='$nomina' LIMIT 1";
		$VBusqueda=mysql_query($VSql, $Conexion);
		$primerId=mysql_result($VBusqueda,0,"minimoId");

		$i=1;
		do {
			$VSql="SELECT * FROM `evaluacion` WHERE id_eval=('$id'-'$i') AND nomina='$nomina' LIMIT 1";
			$VBusqueda=mysql_query($VSql, $Conexion);
			$totalResultados=mysql_num_rows($VBusqueda);

			if(!($totalResultados>0))
				if($primerId<($id-$i))
					$i++;
				else
				{
					$VSql="SELECT * FROM `evaluacion` WHERE id_eval=('$id') AND nomina='$nomina' LIMIT 1";
					$VBusqueda=mysql_query($VSql, $Conexion);
					$totalResultados=mysql_num_rows($VBusqueda);
					break;
				}
				
		}while(!($totalResultados>0));
	}
	
	if($totalResultados>0)
    {
		$clasificar_2=mysql_result($VBusqueda,0,"clasificar");
		$ordenar_2=mysql_result($VBusqueda,0,"ordenar");
		$limpieza_2=mysql_result($VBusqueda,0,"limpieza");
		$estandarizar_2=mysql_result($VBusqueda,0,"estandarizar");

		$disciplina=( ($clasificar-$clasificar_2)+($ordenar-$ordenar_2)+($limpieza-$limpieza_2)+($estandarizar-$estandarizar_2)	);
	}
	else
		$disciplina=0;
	
	return $disciplina;
}

/***************************************************************************************
Función para obtener el promedio de un empleado.
Recibe los siguientes datos:
	SQL		conexión de la base de datos
	String	nómina del empleado
Regresa el promedio (con dos decimales) de un empleado.
***************************************************************************************/
function calcularPromedio($Conexion,$nomina)
{
	$VSql="SELECT IFNULL(AVG(calificacion),0) AS prom FROM evaluacion WHERE nomina='$nomina'";
    $VBusqueda=mysql_query($VSql, $Conexion);
	$prom=mysql_result($VBusqueda,0,"prom");
	
	$promedio=round($prom,2);
	//echo($promedio);
	return $promedio;
}

/***************************************************************************************
Función para obtener la información de una revisión a través del identificador único de la revisión.
Se utiliza para mostrar la información cuando se desea modificar algún dato de ella.
Recibe los siguientes datos:
	int	identificador único de la revisión
Regresa en un arreglo la información de una revisión.
***************************************************************************************/
function obtenerEvaluacion($id)
{
	$Conexion=Conectar();
	$VSql="SELECT * FROM `evaluacion` WHERE id_eval='$id' LIMIT 1";
    $VBusqueda=mysql_query($VSql, $Conexion);
	
	$totalResultados=mysql_num_rows($VBusqueda);
	
	if($totalResultados>0)
    {
		$id_rev=mysql_result($VBusqueda,0,"id_eval");
		$nomina=mysql_result($VBusqueda,0,"nomina");
		$fecha=mysql_result($VBusqueda,0,"fecha_revision");
		$clasificar=mysql_result($VBusqueda,0,"clasificar");
		$ordenar=mysql_result($VBusqueda,0,"ordenar");
		$limpieza=mysql_result($VBusqueda,0,"limpieza");
		$estandarizar=mysql_result($VBusqueda,0,"estandarizar");
		$disciplina=mysql_result($VBusqueda,0,"disciplina");
		$calificacion=mysql_result($VBusqueda,0,"calificacion");
		$foto=mysql_result($VBusqueda,0,"foto");
		$observaciones=mysql_result($VBusqueda,0,"observaciones");
			
		$revision[0]=$id_rev;
		$revision[1]=$nomina;
		$revision[2]=$fecha;
		$revision[3]=$clasificar;
		$revision[4]=$ordenar;
		$revision[5]=$limpieza;
		$revision[6]=$estandarizar;
		$revision[7]=$calificacion;
		$revision[8]=$disciplina;
		$revision[9]=$foto;
		$revision[10]=$observaciones;
	
	}
	else
		$revision[0]=0;
		
	Desconectar($Conexion);
	
	return $revision;
}

/***************************************************************************************
Función para obtener la información de todas las revisiones de un empleado.
Se utiliza para mostrar la tabla de revisiones de cada empleado.
Recibe los siguientes datos:
	String	nómina del empleado
Regresa en un arreglo la información de todas las revisiones de un empleado ordenadas por la fecha.
***************************************************************************************/
function evaluacionEmpleado($nomina)
{
	$tabla=array();
	$Conexion=Conectar();
	$VSql="SELECT * FROM `evaluacion` WHERE nomina='$nomina' ORDER BY fecha_revision";
    $VBusqueda=mysql_query($VSql, $Conexion);
	
	$totalResultados=mysql_num_rows($VBusqueda);
	
	if($totalResultados>0)
    {
		for($i=0; $i<$totalResultados; $i++)
        {
			$id=mysql_result($VBusqueda,$i,"id_eval");
			$nomina=mysql_result($VBusqueda,$i,"nomina");
			$fecha=mysql_result($VBusqueda,$i,"fecha_revision");
			$clasificar=mysql_result($VBusqueda,$i,"clasificar");
			$ordenar=mysql_result($VBusqueda,$i,"ordenar");
			$limpieza=mysql_result($VBusqueda,$i,"limpieza");
			$estandarizar=mysql_result($VBusqueda,$i,"estandarizar");
			$disciplina=mysql_result($VBusqueda,$i,"disciplina");
			$calificacion=mysql_result($VBusqueda,$i,"calificacion");
			$foto=mysql_result($VBusqueda,$i,"foto");
			$observaciones=mysql_result($VBusqueda,$i,"observaciones");
		
			$tabla[$i][0]=$id;
			$tabla[$i][1]=$fecha;
			$tabla[$i][2]=$clasificar;
			$tabla[$i][3]=$ordenar;
			$tabla[$i][4]=$limpieza;
			$tabla[$i][5]=$estandarizar;
			$tabla[$i][6]=$calificacion;
			$tabla[$i][7]=$disciplina;
			$tabla[$i][8]=$foto;
			$tabla[$i][9]=$observaciones;
			
			$sumaClasificar+=$clasificar;
			$sumaOrdenar+=$ordenar;
			$sumaLimpieza+=$limpieza;
			$sumaEstandarizar+=$estandarizar;
		}
		
		$ultimoRenglon=$totalResultados;
		$tabla[$ultimoRenglon][0]=$totalResultados;
		$tabla[$ultimoRenglon][1]=$totalResultados;
		$tabla[$ultimoRenglon][2]=round(($sumaClasificar/$totalResultados),2);
		$tabla[$ultimoRenglon][3]=round(($sumaOrdenar/$totalResultados),2);
		$tabla[$ultimoRenglon][4]=round(($sumaLimpieza/$totalResultados),2);
		$tabla[$ultimoRenglon][5]=round(($sumaEstandarizar/$totalResultados),2);
		$tabla[$ultimoRenglon][6]=calcularPromedio($Conexion,$nomina);
		$tabla[$ultimoRenglon][7]=$totalResultados;
		$tabla[$ultimoRenglon][8]=$totalResultados;
		
		//print_r($tabla[0][0]);
	}
	Desconectar($Conexion);
	
	return $tabla;
}

/***************************************************************************************
Función para obtener la fecha actual.
Se utiliza para mostrar la fecha actual al momento de capturar una nueva revisión.
No recibe ningún dato.
Regresa la fecha actual en el formato: dia-mes-año (DD-MM-AAAA).
***************************************************************************************/
function fechaHoy()
{
	$ahora = getdate();
	 
	$dia=$ahora["mday"];
	$mes=$ahora["mon"];
	$anio=$ahora["year"];

	$fecha_actual = $dia."-".$mes."-".$anio;
	
	//echo ($fecha_actual);
	return($fecha_actual);
}

/***************************************************************************************
Función para validar la fecha.
Se utiliza para no permitir la entrada de una fecha incorrecta.
Recibe los siguientes datos:
	String	Fecha
Regresa 'true' o 'false' para validar que la la fecha es correcta.
***************************************************************************************/
function validarFecha($fecha)
{
	list($anio,$mes,$dia)=explode("-",$fecha); 
	$fecha_valida=checkdate($mes, $dia, $anio);
	if($fecha_valida==true)
		return true;
	else
		return false;
}

/***************************************************************************************
Función para cambiar el formato de la fecha a: año-mes-dia (AAAA-MM-DD).
Se utiliza para guardar la fecha en la base de datos con este formato.
Recibe los siguientes datos:
	String	Fecha
Regresa la cadena con la fecha en el nuevo formato.
***************************************************************************************/
function cambiarFormatoFecha($fecha)
{ 
	list($dia,$mes,$anio)=explode("-",$fecha);
	return $anio."-".$mes."-".$dia; 
}

/***************************************************************************************
Función para cambiar el formato de la fecha a: dia-mes-año (DD-MM-AAAA).
Se utiliza para mostrar al usuario la fecha de una revisión con este formato.
Recibe los siguientes datos:
	String	Fecha
Regresa la cadena con la fecha en el nuevo formato.
***************************************************************************************/
function regresarFormatoFecha($fecha)
{ 
	list($anio,$mes,$dia)=explode("-",$fecha);
	return $dia."-".$mes."-".$anio; 
}

?>
