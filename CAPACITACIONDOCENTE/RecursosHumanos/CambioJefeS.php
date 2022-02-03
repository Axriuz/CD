<html>
<body> 
 

   
  <br>

<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
/*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query($con,("SET NAMES UTF8");
*/
require('con.php');


$AntD = $_POST["anteriorD"]; 
$NuevoD = $_POST["nuevoD"]; 



$sql =  "UPDATE maestro SET JefeDpto='0' WHERE Nombre = '".$AntD."'";
   $result = mysqli_query($con,$sql, $conexion);
  
$sql1 = "UPDATE maestro SET JefeDpto='2' WHERE Nombre = '".$NuevoD."'";
   $result1 = mysqli_query($con,$sql1, $conexion );
  

 

    header('Location: CambioJefe.php'). $_SESSION['usuario'];
  
   	

?> 
 </body>
</html>
