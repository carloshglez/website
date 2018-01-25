<?php
/***************************************************************************************
Función para insertar un nuevo departamento al sistema.
Recibe los siguientes datos:
	String	nombre del nuevo departamento
Regresa 'true' o 'false' lo que permite validar si se pudo almacenar en la base de datos del sistema.
***************************************************************************************/
function insertarDepartamento($departamento)
{
	$Conexion=Conectar();
    $VSql="INSERT INTO `departamentos`(departamento)
	VALUES('$departamento');";
    
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
Función para modificar los datos de un departamento ya almacenado en el sistema.
Recibe los siguientes datos:
	String	nombre del departamento
	int		identificador único del departamento
Regresa 'true' o 'false' lo que permite validar si se pudo modificar en la base de datos del sistema.
***************************************************************************************/
function modificarDepartamento($departamento,$id_dep)
{
	$Conexion=Conectar();
	if($id_dep<=3)
	{
		echo("<script>alert('Gracias por usar el DEMO. Este departamento no acepta modificaciones debido a que la aplicación está bajo un entorno de demostración.');</script>");
	}
	else
	{
	
    $VSql="UPDATE departamentos
        SET
            departamento='$departamento'
        WHERE
            id_dep='$id_dep';";
    
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
Función para eliminar un departamento del sistema.
Recibe los siguientes datos:
	int		identificador único del departamento
Regresa 'true' o 'false' lo que permite validar si se pudo eliminar en la base de datos del sistema.
***************************************************************************************/
function eliminarDepartamento($id_dep)
{
	$Conexion=Conectar();
	if($id_dep<=3)
	{
		echo("<script>alert('Gracias por usar el DEMO. Este departamento no se puede eliminar debido a que la aplicación está bajo un entorno de demostración.');</script>");
	}
	else
	{
    $VSql="DELETE FROM departamentos
			WHERE id_dep='$id_dep'
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
Función para verificar que un empleado pertenece a un departamento.
Recibe los siguientes datos:
	String	nómina del empleado
	int		identificador único del departamento
Regresa '1' si el empleado pertenece al departamento recibido o '0' si no pertenece.
***************************************************************************************/
function perteneceAlDepartamento($nomina,$id_dep)
{
	// Caso Especial
	if(($nomina=="L00997338")||($nomina=="l00997338"))
	{
		if($id_dep==2)
			return 1;
		else if($id_dep==5)
			return 1;
		else if($id_dep==7)
			return 1;
		else if($id_dep==9)
			return 1;
	}
	else
	{
		$Conexion=Conectar();
		$VSql="SELECT id_dep FROM empleados WHERE nomina='$nomina'";
	    $VBusqueda=mysql_query($VSql, $Conexion);
		
		$totalResultados=mysql_num_rows($VBusqueda);
		
		if($totalResultados>0)
	    {
			for($i=0; $i<$totalResultados; $i++)
	        {
				$id_dep_2=mysql_result($VBusqueda,$i,"id_dep");
			}
			if($id_dep==$id_dep_2)
			{
				Desconectar($Conexion);
				return 1;
			}
			else
			{
				Desconectar($Conexion);
				return 0;
			}
		}
		else
		{
			Desconectar($Conexion);
			return 0;
		}
	}
	
	Desconectar($Conexion);
	return 0;
}

/***************************************************************************************
Función para obtener el identificador único de un departamento en el que pertenece un empleado.
Recibe los siguientes datos:
	String	nómina del empleado
Regresa el identificador único del departamento al que pertenece el empleado recibido.
***************************************************************************************/
function obtenerDepartamento($nomina)
{
	$Conexion=Conectar();
	$VSql="SELECT id_dep FROM empleados WHERE nomina='$nomina'";
    $VBusqueda=mysql_query($VSql, $Conexion);
	
	$totalResultados=mysql_num_rows($VBusqueda);
	
	if($totalResultados>0)
    {
		for($i=0; $i<$totalResultados; $i++)
        {
			$id_dep=mysql_result($VBusqueda,$i,"id_dep");
		}
	}
	else
	{
		Desconectar($Conexion);
		return 0;
	}
	
	Desconectar($Conexion);
	return $id_dep;
}

/***************************************************************************************
Función para obtener una lista con los nombres de todos los departamentos registrados en el sistema.
No recibe ningún dato.
Regresa en un arreglo la lista con los nombres de todos los departamentos registrados en el sistema.
***************************************************************************************/
function obtenerDepartamentos()
{
	$Conexion=Conectar();
	$VSql="SELECT departamento FROM departamentos";
    $VBusqueda=mysql_query($VSql, $Conexion);
	
	$totalResultados=mysql_num_rows($VBusqueda);
	
	if($totalResultados>0)
    {
		$departamentos[0]=$totalResultados;	//tamaño del arreglo
		for($i=0; $i<$totalResultados; $i++)
        {
			$departamentos[$i+1]=mysql_result($VBusqueda,$i,"departamento");
		}
	}
	Desconectar($Conexion);
	
	return $departamentos;
}

/***************************************************************************************
Función para obtener el nombre de un departamento registrado en el sistema a través de su identificador único.
Recibe los siguientes datos:
	int		identificador único del departamento
Regresa el nombre del departamento.
***************************************************************************************/
function obtenerNombreDepartamento($id_Departamento)
{
	$departamento=0;
	$Conexion=Conectar();
	$VSql="SELECT departamento FROM departamentos WHERE id_dep='$id_Departamento'";
    $VBusqueda=mysql_query($VSql, $Conexion);
	
	$totalResultados=mysql_num_rows($VBusqueda);
	
	if($totalResultados>0)
    {
		for($i=0; $i<$totalResultados; $i++)
        {
			$departamento=mysql_result($VBusqueda,$i,"departamento");
		}
	}
	Desconectar($Conexion);
	
	return $departamento;
}

/***************************************************************************************
Función para obtener el identificador único de un departamento a través del nombre del departamento.
Recibe los siguientes datos:
	String	nombre del departamento
Regresa el identificador único del departamento.
***************************************************************************************/
function obtenerIdDepartamento($nombreDepartamento)
{
	$Conexion=Conectar();
	$VSql="SELECT id_dep FROM departamentos WHERE departamento='$nombreDepartamento'";
    $VBusqueda=mysql_query($VSql, $Conexion);
	
	$totalResultados=mysql_num_rows($VBusqueda);
	
	if($totalResultados>0)
    {
		for($i=0; $i<$totalResultados; $i++)
        {
			$id_dep=mysql_result($VBusqueda,$i,"id_dep");
		}
	}
	Desconectar($Conexion);
	
	return $id_dep;
}

/***************************************************************************************
Función para obtener el promedio de las calificaciones que han obtenido sus empleados en las revisiones.
Recibe los siguientes datos:
	int		identificador único del departamento
Despliega y regresa el promedio (con dos decimales) de las calificaciones que han obtenido sus empleados en las revisiones.
***************************************************************************************/
function evaluacionDepartamento($departamento)
{
	$Conexion=Conectar();
	$VSql="SELECT empleados.nomina FROM empleados
			INNER JOIN departamentos
			ON departamentos.id_dep=empleados.id_dep
			INNER JOIN evaluacion
			ON evaluacion.nomina=empleados.nomina
			WHERE departamentos.id_dep='$departamento'
			GROUP BY nomina";
	$VBusqueda=mysql_query($VSql, $Conexion);
	
	$totalResultados=mysql_num_rows($VBusqueda);
	
	if($totalResultados>0)
    {
		for($i=0; $i<$totalResultados; $i++)
        {
			$nomina=mysql_result($VBusqueda,$i,"nomina");
			$suma+=calcularPromedio($Conexion,$nomina);
		}
		$prom=($suma)/$totalResultados;
		$promedio=round($prom,2);
		if($promedio==0)
			$promedio="No evaluado";
	}
	else
		$promedio="No evaluado";
	
	Desconectar($Conexion);
	
	echo($promedio);
	return $promedio;
}

?>
