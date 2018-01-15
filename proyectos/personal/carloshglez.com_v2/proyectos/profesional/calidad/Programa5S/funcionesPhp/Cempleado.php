<?php
/***************************************************************************************
Función para dar de alta a un nuevo empleado al sistema.
Recibe la nómina, el nombre, el área del empleado y también recibe el identificador único de su departamento.
Regresa 'true' o 'false' lo que permite validar si se pudo dar de alta en la base de datos del sistema.
***************************************************************************************/
function insertarEmpleado($nomina,$nombre,$area,$id_dep)
{
	$Conexion=Conectar();
	if($nomina=="admin"||$nomina=="consultor"||$nomina=="director"||$nomina=="empleado")
	{
		echo("<script>alert('Gracias por usar el DEMO. Esta área no se puede agregar debido a que la aplicación está bajo un entorno de demostración.');</script>");
	}
	else
	{
    $VSql="INSERT INTO `empleados`(nomina,nombre,area,id_dep)
	VALUES('$nomina','$nombre','$area','$id_dep');";
    
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
Función para modificar los datos de un empleado en el sistema.
Recibe la nómina, el nombre, el área del empleado y también recibe el identificador único de su departamento.
Regresa 'true' o 'false' lo que permite validar si se pudo modificar en la base de datos del sistema.
***************************************************************************************/
function modificarEmpleado($nomina_anterior,$nomina,$nombre,$area,$id_dep)
{
	$Conexion=Conectar();
	if($nomina_anterior=="admin"||$nomina_anterior=="consultor"||$nomina_anterior=="director"||$nomina_anterior=="empleado")
	{
		echo("<script>alert('Gracias por usar el DEMO. Esta área no acepta modificaciones debido a que la aplicación está bajo un entorno de demostración.');</script>");
	}
	else
	{
    $VSql="UPDATE empleados
        SET
			nomina='$nomina',
            nombre='$nombre',
			area='$area',
			id_dep='$id_dep'
        WHERE
            nomina='$nomina_anterior';";
    
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
Función para dar de baja a un empleado ya registrado en el sistema.
Recibe la nómina del empleado.
Regresa 'true' o 'false' lo que permite validar si se pudo dar de baja en la base de datos del sistema.
***************************************************************************************/
function eliminarEmpleado($nomina)
{
	$Conexion=Conectar();
	if($nomina=="admin"||$nomina=="consultor"||$nomina=="director"||$nomina=="empleado")
	{
		echo("<script>alert('Gracias por usar el DEMO. Esta área no se puede eliminar debido a que la aplicación está bajo un entorno de demostración.');</script>");
	}
	else
	{
    $VSql="DELETE FROM empleados
			WHERE nomina='$nomina'
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
Función para obtener una lista con los datos de todos los empleados registrados en el sistema de cierto departamento.
Recibe los siguientes datos:
	int		identificador único del departamento
Regresa en un arreglo la lista con los datos de todos los empleados registrados en el sistema de cierto departamento.
***************************************************************************************/
function obtenerEmpleados($departamento)
{
	$empleados;
	$Conexion=Conectar();
	$VSql="SELECT nomina,nombre,area FROM empleados WHERE id_dep='$departamento' ORDER BY nomina";
    $VBusqueda=mysql_query($VSql, $Conexion);
	
	$totalResultados=mysql_num_rows($VBusqueda);
	
	if($totalResultados>0)
    {
		$j=1;
		$empleados[0]=$totalResultados*4;	//tamaño del arreglo
		for($i=0; $i<$totalResultados; $i++)
        {
			$empleados[$i+$j]=mysql_result($VBusqueda,$i,"nombre");
			$j++;
			$empleados[$i+$j]=mysql_result($VBusqueda,$i,"nomina");
			$nomina=$empleados[$i+$j];
			$j++;
			$empleados[$i+$j]=mysql_result($VBusqueda,$i,"area");
			$j++;
			$empleados[$i+$j]=calcularPromedio($Conexion,$nomina);
		}
	}
	Desconectar($Conexion);
	
	return $empleados;
}

/***************************************************************************************
Función para obtener una dato en específico de un empleado registrados en el sistema.
Recibe los siguientes datos:
	String	nómina del empleado
	String	palabra que identifica el dato que se desea: 'nombre' o 'área'.
Regresa el dato en específico de un empleado registrados en el sistema.
***************************************************************************************/
function obtenerDatoEmpleado($nomina,$dato)
{
	$Conexion=Conectar();
	$VSql="SELECT nombre,area FROM empleados WHERE nomina='$nomina'";
    $VBusqueda=mysql_query($VSql, $Conexion);
	
	$totalResultados=mysql_num_rows($VBusqueda);
	
	if($totalResultados>0)
    {
		for($i=0; $i<$totalResultados; $i++)
        {
			if($dato=="nombre")
			$dato=mysql_result($VBusqueda,$i,"nombre");
			else
			$dato=mysql_result($VBusqueda,$i,"area");
		}
	}
	Desconectar($Conexion);
	
	return $dato;
}

?>