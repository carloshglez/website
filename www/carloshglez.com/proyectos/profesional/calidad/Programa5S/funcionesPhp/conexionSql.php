<?php

function Conectar()
{
	if(!($Conecta=mysql_connect("localhost","carlosh_demo","demo1234"))){
		print("Error en la conexion al servidor de la base de datos");	
		exit();
	}
	if(!(mysql_select_db("sistema_calidad", $Conecta))){
		print("No se encontro la base de datos");	
		exit();
	}
	return $Conecta;
}

function Desconectar($Conexion)
{
	mysql_close($Conexion);
}

?>