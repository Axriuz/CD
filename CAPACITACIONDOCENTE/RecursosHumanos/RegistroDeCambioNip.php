<html>
<body> 
 
 
  <br>

<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$Contrasena = $_POST["Contrasena"]; 

 
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

$sql = "UPDATE `maestro` SET Contrasena='$Contrasena' WHERE Emp = '$usuario' ";
  
   $result = mysqli_query($con,$sql);
if(!$result) {  
 echo 'ERROR: ' . mysqli_error() . "\n";
   }else {
   header('Location: CambioNip.php'). $_SESSION['usuario'];} 
   	
?> 

</body>
</html>







