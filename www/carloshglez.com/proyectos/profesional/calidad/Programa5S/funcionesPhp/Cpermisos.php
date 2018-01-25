<?php
/***************************************************************************************
Función para definir permisos a un empleado para trabajar con en el sistema de 5S.
Recibe los siguientes datos:
	String	nómina del empleado
	int		identificador único del permiso
Regresa 'true' o 'false' lo que permite validar si se pudo definir el permiso en la base de datos del sistema.
***************************************************************************************/
function darPermisos($nomina,$id_permiso)
{	
	$administrador=0;
	$consultor=0;
	$directorDep=0;
	$empleado=0;
	
	$Conexion=Conectar();
	if($nomina=="admin"||$nomina=="consultor"||$nomina=="director"||$nomina=="empleado")
	{
		//
	}
	else
	{
	switch($id_permiso)
	{
		case 1: $administrador=1; break;
		case 2: $consultor=1; break;
		case 3: $directorDep=1; break;
		case 4: $empleado=1; break;
	}
	
    $VSql="INSERT INTO `permisos`(nomina,administrador,consultor,directorDep,empleado)
	VALUES('$nomina','$administrador','$consultor','$directorDep','$empleado');";
    
	if(mysql_query($VSql, $Conexion))
	{
		Desconectar($Conexion);
		return true;
	}
	else
	{
		Desconectar($Conexion);
		return modificarPermisos($nomina,$nomina,$id_permiso);
	}
	}
	Desconectar($Conexion);
	return false;
}

/***************************************************************************************
Función para modoficar permisos a un empleado para trabajar con en el sistema de 5S.
Recibe los siguientes datos:
	String	nómina del empleado
	int		identificador único del permiso
Regresa 'true' o 'false' lo que permite validar si se pudo modificar el permiso en la base de datos del sistema.
***************************************************************************************/
function modificarPermisos($nomina_anterior,$nomina,$id_permiso)
{	
	$administrador=0;
	$consultor=0;
	$directorDep=0;
	$empleado=0;
	
	$Conexion=Conectar();
	if($nomina_anterior=="admin"||$nomina_anterior=="consultor"||$nomina_anterior=="director"||$nomina_anterior=="empleado")
	{
		//
	}
	else
	{	
	switch($id_permiso)
	{
		case 1: $administrador=1; break;
		case 2: $consultor=1; break;
		case 3: $directorDep=1; break;
		case 4: $empleado=1; break;
	}
	
	
    $VSql="UPDATE permisos
        SET
			nomina='$nomina',
            administrador='$administrador',
			consultor='$consultor',
			directorDep='$directorDep',
			empleado='$empleado'
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
Función para quitar permisos a un empleado para trabajar con en el sistema de 5S.
Recibe los siguientes datos:
	String	nómina del empleado
Regresa 'true' o 'false' lo que permite validar si se pudo quitar el permiso en la base de datos del sistema.
***************************************************************************************/
function quitarPermisos($nomina)
{	
	$Conexion=Conectar();
	if($nomina=="admin"||$nomina=="consultor"||$nomina=="director"||$nomina=="empleado")
	{
		//
	}
	else
	{
    $VSql="UPDATE permisos
        SET
			nomina='$nomina',
            administrador=0,
			consultor=0,
			directorDep=0,
			empleado=0
        WHERE
            nomina='$nomina';";
    
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
Función para verificar el permiso de 'Administrador' de un empleado.
Recibe los siguientes datos:
	String	nómina del empleado
Regresa el valor asignado al permiso que puede ser '1' o '0'.
Si el valor es '1' indica que el empleado está registrado como 'Administrador'.
***************************************************************************************/
function esAdministrador($nomina)
{
	$administrador=0;
	$Conexion=Conectar();
	$VSql="SELECT administrador FROM permisos WHERE nomina='$nomina'";
    $VBusqueda=mysql_query($VSql, $Conexion);
	
	$totalResultados=mysql_num_rows($VBusqueda);
	
	if($totalResultados>0)
    {
		for($i=0; $i<$totalResultados; $i++)
        {
			$administrador=mysql_result($VBusqueda,$i,"administrador");
		}
	}
	Desconectar($Conexion);
	
	return $administrador;
}

/***************************************************************************************
Función para verificar el permiso de 'Consultor' de un empleado.
Recibe los siguientes datos:
	String	nómina del empleado
Regresa el valor asignado al permiso que puede ser '1' o '0'.
Si el valor es '1' indica que el empleado está registrado como 'Consultor'.
***************************************************************************************/
function esConsultor($nomina)
{
	$consultor=0;
	$Conexion=Conectar();
	$VSql="SELECT consultor FROM permisos WHERE nomina='$nomina'";
    $VBusqueda=mysql_query($VSql, $Conexion);
	
	$totalResultados=mysql_num_rows($VBusqueda);
	
	if($totalResultados>0)
    {
		for($i=0; $i<$totalResultados; $i++)
        {
			$consultor=mysql_result($VBusqueda,$i,"consultor");
		}
	}
	Desconectar($Conexion);
	
	return $consultor;
}

/***************************************************************************************
Función para verificar el permiso de 'Director de Departamento' de un empleado.
Recibe los siguientes datos:
	String	nómina del empleado
Regresa el valor asignado al permiso que puede ser '1' o '0'.
Si el valor es '1' indica que el empleado está registrado como 'Director de Departamento'.
***************************************************************************************/
function esDirectorDepartamento($nomina)
{
	$directorDep=0;
	$Conexion=Conectar();
	$VSql="SELECT directorDep FROM permisos WHERE nomina='$nomina'";
    $VBusqueda=mysql_query($VSql, $Conexion);
	
	$totalResultados=mysql_num_rows($VBusqueda);
	
	if($totalResultados>0)
    {
		for($i=0; $i<$totalResultados; $i++)
        {
			$directorDep=mysql_result($VBusqueda,$i,"directorDep");
		}
	}
	Desconectar($Conexion);
	
	return $directorDep;
}

/***************************************************************************************
Función para verificar el permiso de 'Empleado' de un empleado.
Recibe los siguientes datos:
	String	nómina del empleado
Regresa el valor asignado al permiso que puede ser '1' o '0'.
Si el valor es '1' indica que el empleado está registrado como 'Empleado'.
***************************************************************************************/
function esEmpleado($nomina)
{
	$empleado=0;
	$Conexion=Conectar();
	$VSql="SELECT empleado FROM permisos WHERE nomina='$nomina'";
    $VBusqueda=mysql_query($VSql, $Conexion);
	
	$totalResultados=mysql_num_rows($VBusqueda);
	
	if($totalResultados>0)
    {
		for($i=0; $i<$totalResultados; $i++)
        {
			$empleado=mysql_result($VBusqueda,$i,"empleado");
		}
	}
	Desconectar($Conexion);
	
	return $empleado;
}

/***************************************************************************************
Función para mostrar el nombre del permiso(tipo) de un empleado.
Utiliza las 4 funciones anteriores.
Recibe los siguientes datos:
	String	nómina del empleado
Regresa el nombre del permiso(tipo) de un empleado.
***************************************************************************************/
function mostrarPermiso($nomina)
{
	$administrador=esAdministrador($nomina);
	$consultor=esConsultor($nomina);
	$directorDep=esdirectorDepartamento($nomina);
	$empleado=esEmpleado($nomina);
	
	if($administrador==1)
		$tipo="Administrador";
	else
	if($consultor==1)
		$tipo="Consultor";
	else
	if($directorDep==1)
		$tipo="Director de Departamento";
	else
	if($empleado==1)
		$tipo="Empleado";	
		
	return $tipo;
}

?>