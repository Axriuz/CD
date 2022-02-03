<html>
<body> 
 
 <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <br>

<?php 
header('Content-Type: text/html; charset=UTF-8');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];
$a1 = $_POST['ins']; 

$host='mysql.webcindario.com';
 $user='cursosdesacad';
 $pass='jmrs1905';
 $conexion=mysql_connect($host,$user,$pass);
  mysql_query("SET NAMES 'utf8'");
$bd_seleccionada = mysql_select_db('cursosdesacad', $conexion);



$Ins = $_POST["Ins"];   	
$Fecha = $_POST["Fecha"];
$EmpIns = $_POST["EmpIns"];

	  



$Fp = $_POST["fp"];
$Ec = $_POST["ec"];
$Md = $_POST["md"];
$Ch = $_POST["ch"];
$Ed = $_POST["ed"];
$Ca = $_POST["ca"];

$RES = $Fp+$Ec+$Md+$Ch+$Ed+$Ca;

IF ($RES > 24)
 {
	  
$sql = "INSERT INTO `EncEvaIns`(`Instructor`, `EmpIns`, `Fecha`, `Fp`,`Ec`, `Md`,`Ch`, `Ed`, `Ca`) VALUES  ('$Ins', '$EmpIns', '$Fecha', '$Fp','$Ec','$Md','$Ch', '$Ed', '$Ca')";
	$result = mysql_query($sql, $conexion );

IF ($RES > 24)
{$sql1 = "UPDATE curso set Ins_evaluado = 1 where Instructor = (select Emp from maestro where nombre = '$Ins') or InsAux = (select Emp from maestro where nombre = '$Ins')";
	$result = mysql_query($sql1, $conexion );
}
	header('Location: Menu.php'). $_SESSION['usuario'];
	     
  }

		header('Location: Menu.php'). $_SESSION['usuario'];
?> 


</body>
</html>

