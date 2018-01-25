<?php
/***************************************************************************************
Función para eliminar a todos los empleados de un departamento en el sistema.
Es utilizada cuando se da la instrucción de eliminar un departamento.
Recibe los siguientes datos:
	int		identificador único del departamento
Regresa 'true' o 'false' lo que permite validar si se pudo eliminar a todos los empleados del departamento señalado en la base de datos del sistema.
***************************************************************************************/
function eliminarEmpleadosDepartamento($id_dep)
{
	$Conexion=Conectar();
	if($id_dep<=3)
	{
		//
	}
	else
	{
    $VSql="DELETE FROM empleados
			WHERE id_dep='$id_dep';";
    
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
Función para eliminar todas las revisiones de un empleado en el sistema.
Es utilizada cuando se da la instrucción de eliminar un empleado.
Recibe los siguientes datos:
	String	nómina
Regresa 'true' o 'false' lo que permite validar si se pudo eliminar todas las revisiones del empleado señalado en la base de datos del sistema.
***************************************************************************************/
function eliminarEvaluacionesEmpleado($nomina)
{
	$Conexion=Conectar();
	if($nomina=="admin"||$nomina=="consultor"||$nomina=="director"||$nomina=="empleado")
	{
		//
	}
	else
	{
    $VSql="DELETE FROM evaluacion
			WHERE nomina='$nomina';";
    
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

?>
