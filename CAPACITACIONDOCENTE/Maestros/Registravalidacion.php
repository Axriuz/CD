<html>
<body> 
 
 
  <br>

<?php 
header('Content-Type: text/html; charset=UTF-8');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: /index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];
$c1 = $_POST['NC']; 

/*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $conexion);
mysql_query("SET NAMES UTF8");
*/
require('con.php');

$sql =  "UPDATE `curso` SET validado = '1' WHERE Nombre = '$c1' ";

$result = mysqli_query($con,$sql);
if(!$result) {  
 echo 'ERROR: ' . mysqli_error() . "\n";
   }else {
   header('Location: Menu.php'). $_SESSION['usuario'];
   } 
 
   	
?> 


</body>
</html>



