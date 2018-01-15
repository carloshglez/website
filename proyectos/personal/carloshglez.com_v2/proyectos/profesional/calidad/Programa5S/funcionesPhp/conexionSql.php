<?php

function Conectar()
{
	if(!($Conecta=mysql_connect("p3plcpnl0928.prod.phx3.secureserver.net","carlosh","u506695579"))){
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