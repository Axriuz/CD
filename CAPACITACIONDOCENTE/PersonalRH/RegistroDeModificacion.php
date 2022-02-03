<html>
<body> 
 
 
  <br>

<?php 
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
session_start();
if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$Rfc = $_POST["Rfc"];
$Area = $_POST["Area"]; 
$Puesto = $_POST["Puesto"]; 
$Email = $_POST["Email"]; 
$Telefono = $_POST["Telefono"]; 
$Sexo = $_POST["Sexo"];
$Estudios = $_POST["Estudios"]; 
$Carrera = $_POST["Carrera"];


$TipoEmp = $_POST["Tipo"];
$Tipo = $_POST["TP"];
 
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

$sql = "UPDATE `maestro` SET Modificacion = 1, Rfc='$Rfc', Area='$Area', Puesto='$Puesto',Email='$Email',Telefono='$Telefono',Tipo_p_d='$TipoEmp', Sexo = '$Sexo' , Tp = '$Tipo',Carrera = '$Carrera' ,Estudios = '$Estudios'  WHERE Emp = '$usuario' ";
  
   $result = mysqli_query($con,$sql, $conexion);
if(!$result) {  
 echo 'ERROR: ' . mysqli_error() . "\n";
   }else {
   header('Location: Menu.php'). $_SESSION['usuario'];} 
   	
?> 

</body>
</html>







