<html>
<body> 
 
 
  <br>

<?php 
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
session_start();
if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$Emp = $_POST["numero"];
 
/*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $conexion);
mysql_query("SET NAMES UTF8");
*/

require('con.php');
$sql = "DELETE FROM `maestro` WHERE Emp = '$Emp' ";
  
   $result = mysqli_query($con,$sql);
if(!$result) {  
 
   }else {
   header('Location: BorrarMaestro.php'). $_SESSION['usuario'];} 
   	
?> 

</body>
</html>







