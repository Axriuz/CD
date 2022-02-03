<?php
	function generarLinkTemporal($idusuario, $username){

		$cadena = $idusuario.$username.rand(1,9999999).date('Y-m-d');
		$token = sha1($cadena);
		


		$conexion = new mysqli('sigacitcg.com.mx', 'sigacitc', 'Itcg11012016_2', 'sigacitc_cursosdesacadCP');
mysql_query("SET NAMES UTF8");

		$sql = "INSERT INTO tblreseteopass (idusuario, username, token, creado) VALUES($idusuario,'$username','$token',NOW());";

		$resultado = $conexion->query($sql);
		if($resultado){
			//
		//	$enlace = 'http://'. $_SERVER["SERVER_NAME"].'/pass/restablecer.php?idusuario='.sha1($idusuario).'&token='.$token;
			//
		$enlace = $_SERVER["SERVER_NAME"].'/pass/restablecer.php?idusuario='.sha1($idusuario).'&token='.$token;
			return $enlace;
		}
		else
			return FALSE;
	}

	function enviarEmail( $email, $link ){

		$mensaje = '<html>
		<head>
 			<title>Restablece tu contraseña</title>
		</head>
		<body>
 			<p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
 			<p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
 			<p>
 				<strong>Enlace para restablecer tu contraseña</strong><br>
 				<a href="'.$link.'"> Restablecer contraseña </a>
 			</p>
		</body>
		</html>';

		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$cabeceras .= 'From: Codedrinks <cursos@sigacitcg.com.mx>' . "\r\n";
		
		mail($email, "Recuperar contraseña", $mensaje, $cabeceras);
	}
	
	$email = $_POST['email'];
	$respuesta = new stdClass();

	if( $email != "" ){   
	$conexion = new mysqli('sigacitcg.com.mx', 'sigacitc', 'Itcg11012016_2', 'sigacitc_cursosdesacadCP');
mysql_query("SET NAMES UTF8");

   		$sql = " SELECT * FROM maestro WHERE Email = '$email' ";
   		$resultado = $conexion->query($sql);

   		if($resultado->num_rows > 0){
      		$usuario = $resultado->fetch_assoc();
			$linkTemporal = generarLinkTemporal( $usuario['Emp'], $usuario['Nombre'] );
      		if($linkTemporal){
        		enviarEmail( $email, $linkTemporal );
        		$respuesta->mensaje = '<div class="alert alert-info"> Un correo ha sido enviado a su cuenta de email con las instrucciones para restablecer la contraseña </div>';
      		}
   		}
   		else
   			$respuesta->mensaje = '<div class="alert alert-warning"> No existe una cuenta asociada a ese correo. </div>';
	}
	else
   		$respuesta->mensaje= "Debes introducir el email de la cuenta";
 	echo json_encode( $respuesta );