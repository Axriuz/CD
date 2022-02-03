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
$num = $_POST["numero"]; 
$usuario =$_SESSION['usuario'];


/*$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query($con,"SET NAMES UTF8");
*/

require('con.php');

$sql = "UPDATE `NoRH` SET No_Personal='$num' WHERE Id = '1' ";
  
   $result = mysqli_query($con,$sql, $conexion);
if(!$result) {  
 echo 'ERROR: ' . mysqli_error() . "\n";
   }else 
   {
	   
echo '<script>alert("Número de docentes actualizado a '.$num.'");window.location.href="Menu.php"</script>";';

  // header('Location: Menu.php'). $_SESSION['usuario'];
   
   
   } 
   	
?> 

</body>
</html>






