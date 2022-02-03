<?php
 session_start(); 
 ?> 
<!DOCTYPE html>
<html >

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
  <title>Inicio de sesi&oacuten</title>
</head>
		
        
      <link rel="stylesheet" href="css/style.css">
		
	<header>
	
		<center>Tecnol&oacutegico Nacional de M&eacutexico
		<br>
		INSTITUTO TECN&OacuteLOGICO DE CD. GUZM&AacuteN
		<hr height: 10px; > 
		</center>
	</header>
<body> 

 <?php 
 error_reporting(E_ALL ^ E_DEPRECATED);
 
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

 require 'PHPMailer/Exception.php';
 require 'PHPMailer/PHPMailer.php';
 require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);


 $host_db = "sigacitcg.com.mx"; 
 $user_db = "sigacitc"; 
 $pass_db = "Itcg11012016_2"; 
 $db_name = "sigacitc_cursosdesacadCP"; 
 $tbl_name = "maestro"; 
 
$con=mysqli_connect("$host_db", "$user_db", "$pass_db",$db_name)or die("Cannot Connect to Data Base."); 
mysqli_select_db($con,"$db_name")or die("Cannot Select Data Base"); 
$username = $_POST['usuario']; 
 

$query = mysqli_query($con,"SELECT Email FROM maestro WHERE Emp = $username"); 
$contra =mysqli_query($con,"SELECT Contrasena FROM maestro WHERE Emp = $username");
$fila = mysqli_fetch_array($query);
$c=mysqli_fetch_array($contra);

    if($fila['Email']!="")
    {

	echo "<H1><CENTER>SE ENVIO LA CONTRASEÑA A ".$fila['Email']."<BR><BR> Si no conoce la contraseña 
		de esta cuenta favor de comunicarse con el administrador <BR><BR></CENTER></H1>"; 
	//echo "<H1><CENTER><a href='login.php'>Regresar</a>	</CENTER></H1>";
	try {
		//Server settings
		$mail->SMTPDebug = 0;                      // Enable verbose debug output
		$mail->isSMTP();                                            // Send using SMTP
		$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$mail->Username   = 'contrasenas.cursos@gmail.com';                     // SMTP username
		$mail->Password   = 'Cursos2020';                               // SMTP password
		$mail->SMTPSecure = 'tls';       // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
	
		//Recipients
		$mail->setFrom('contrasenas.cursos@gmail.com', 'ITCG');
		$mail->addAddress($fila['Email']);     // Add a recipient
		//$mail->addAddress('nallely15290875@itcg.edu.mx');               // Name is optional
		
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Recuperación de contraseña';
		$mail->Body    = 'Su contraseña es: '.$c['Contrasena'];
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		$mail->CharSet ="utf-8";
		$mail->Encoding = 'quoted-printable';
		$mail->send();
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
		
    }
    else
   {
	echo "<H1><CENTER>Usuario ".$username." no cuenta con email registrado <BR></CENTER></H1>";
	
	}

	echo "<H1><CENTER><a href='login.php'>Regresar</a>	</CENTER></H1>"; 	


?> 


</body> 
</html> 

