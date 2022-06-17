<html>
<body> 
 
 
  <br>

<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
header('Content-Type: text/html; charset=UTF-8');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];
$a1 = $_POST['ins']; 



  /*
  $host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
  mysqli_query($con,("SET NAMES 'utf8'");
*/
require('_con.php');



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

$sqlNomIns="select * from maestro where Emp = '$Ins'";
$resNom=mysqli_query($con,$sqlNomIns); 
$auxiliar;
	while ($fila=mysqli_fetch_row($resNom)){
	    $auxiliar = utf8_decode((utf8_encode($fila[1].' '.$fila[17].' '.$fila[18])));
	}



IF ($RES > 24)
 {
	  
$sql = "INSERT INTO `EncEvaIns`(`Instructor`, `EmpIns`, `Fecha`, `Fp`,`Ec`, `Md`,`Ch`, `Ed`, `Ca`) VALUES  ('$auxiliar', '$EmpIns', '$Fecha', '$Fp','$Ec','$Md','$Ch', '$Ed', '$Ca')";
	$result = mysqli_query($con,$sql, $conexion );

IF ($RES > 24)
{$sql1 = "UPDATE curso set Ins_evaluado = 1 where Instructor = $Ins";
	$result = mysqli_query($con,$sql1, $conexion );
}
	header('Location: Menu.php'). $_SESSION['usuario'];
	     
  }

		header('Location: Menu.php'). $_SESSION['usuario'];
?> 


</body>
</html>

