<html>

<body> 

<?php 
session_start();
if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$id = $_POST["id"];

/*
$host= "sigacitcg.com.mx"; 
$user = "sigacitc"; 
$pass= "Itcg11012016_2"; 

 $con=mysqli_connect("$host","$user","$pass","sigacitc_cursosdesacadCP");
 if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
   exit;
 }
 $bd_seleccionada = mysqli_select_db($con,'sigacitc_cursosdesacadCP');
 mysqli_query($con,"SET NAMES UTF8");
*/
require('_con.php');

$res=mysqli_query($con,"SELECT emp,nombre,apellidoP,apellidoM from maestro where emp='".$id."'"); 

if(!$res) {
    echo'<script languaje="javascript">alert("Usuario no existente");history.back();</script>';
}
else{
    $result =mysqli_query($con,"DELETE FROM `maestro` where emp='"."E".$id."'");
    if(!$res) {
    }else{
    echo'<script languaje="javascript">alert("Eliminado con exito");history.back();</script>';
}
}
?> 

</body>
</html>







