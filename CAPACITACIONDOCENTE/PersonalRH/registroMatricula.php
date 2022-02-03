<html>
		
		
	<header><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	
	<body>
	
<center><h1>DATOS CURSO</h1></center>
<BR>
	<BR>
<?php 
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
session_start();
if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}


 
$usuario =$_SESSION['usuario'];
/*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query($con,"SET NAMES UTF8");
*/

require('con.php');
  
$unidadres = $_POST["unidadres"];
$area = $_POST["area"]; 
$plaza = $_POST["plaza"]; 
$jefe = $_POST["jefe"]; 
$domofi = $_POST["domofi"]; 
$tel = $_POST["tel"];
$ext = $_POST["ext"]; 
$horario = $_POST["horario"];
$c2 = $_POST["c1"];
$fecha = $_POST["fecha"];
  

  
  

	
	$sql = "INSERT INTO `CedulaIns`(`UnidadResponsable`, `PlazaActual`,  `NombreJefe`,`DomicilioOficial`, `TelefonoOficial`,  `HorarioTrabajo`,`IdCedula`, `Area`,  `Extension`,  `fecha` , `curso`,  `Emp` ) VALUES  ('$unidadres', '$plaza','$jefe','$domofi', '$tel','$horario','', '$area','$ext','$fecha','$c2','$usuario' )";
	$result2 = mysqli_query($con,$sql);
	
	
	$q = "select IdCedula	from CedulaIns where Emp ='$usuario' and Curso = '$c2'";
	$result = mysqli_query($con,$q); 
while ($row =mysqli_fetch_row($result)) { 
 $idcedula = $row[0]; 
 
} 



	
	
	 
   $sql1 = "INSERT INTO `matriculas`(`Id_matricula`,`curso`,`Emp`,`Constacia`,`Asistencia`, `Activo`, `cedulains`,`fechaM`) VALUES ('','$c2','$usuario','Pendiente (Sin Elaborar)', '|0|0|0|0|0|','1','$idcedula','$fecha')";
   $result1 = mysqli_query($con,$sql1);
   
  
  header('Location: Menu.php'). $_SESSION['usuario'];
  
?> 
	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
					
				
				
	</body>
</html>




