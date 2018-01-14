<?php
/***************************************************************************************
Función para validad el ingreso de un usuario válido al sistema.
Esta función fue proporcionada por el campus.
***************************************************************************************/
function validaEmpleadoContraDirectorio($username,$upasswd)
	{
	  //Conectarse al directorio activo
 	$ldaphost = "10.50.65.11";

	$ldapport = 389;
	
	$ds = ldap_connect($ldaphost, $ldapport)
	or die("No se pudo conectar a: $ldaphost");

	if ($ds) {
		
		$binddn = "CN=$username,OU=empleados,OU=VER,DC=SVCS,DC=ITESM,DC=MX";
		$ldapbind = ldap_bind($ds, $binddn, $upasswd);

 		if ($ldapbind) 	return true;
 		else {
			$binddn = "CN=$username,OU=empleados,OU=RUV,DC=SVCS,DC=ITESM,DC=MX";
			$ldapbind = ldap_bind($ds, $binddn, $upasswd);

 			if ($ldapbind) 		return true;
			else     			return false;
			
  		}
	}  else  return false;
	
	return false;
	}
?>