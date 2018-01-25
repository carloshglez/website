<?php
			$sNombre=$HTTP_POST_VARS["Nombre"];
			$sCorreo=$HTTP_POST_VARS["Correo"];
			$sMensaje=$HTTP_POST_VARS["Mensaje"];
			$sOpcion=$HTTP_POST_VARS["Opcion"];
			
			$asunto="Duda del C10";
			$Mensaje="Escrito por: ".$sNombre."\nCorreo:".$sCorreo."\n\n".$sMensaje;
			if(mail ($Opcion, $asunto, $Mensaje)){
				echo("1");
			} else {
				echo ("0");
			}
?>