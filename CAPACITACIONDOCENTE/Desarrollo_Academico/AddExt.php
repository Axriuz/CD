<html>
<body> 
 
 
  <br>

<?php 
error_reporting(0);
session_start();

if(!isset($_SESSION['usuario'])) {
  header('Location: ../index.html'); 
  exit();
}
//Variables 
$Nombre = $_POST["nombreExt"]; 
$Nombre1 = $_POST["APExt"]; 
$Nombre2 = $_POST["AMExt"]; 
$total = $_POST["id"];
$sexo= $_POST["sexo"];

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

 
//Insertamos al usuario externo
$sql = "INSERT INTO  maestro (Emp,Nombre,sexo,Tipo_Usuario,ApellidoP,ApellidoM) VALUES ('E$total','$Nombre','$sexo','2','$Nombre1','$Nombre2')";  
$result = mysqli_query( $con,$sql);
if(!$result) { 
echo '<script language="javascript">alert("Error usuario NO agregado");</script>';
//header('Location: AgregarExt.php'). $_SESSION['usuario'];
}else {
  echo'<script languaje="javascript">alert("Registrado con éxito '.$Nombre.' '.$Nombre1.' '.$Nombre2.'");history.back();</script>';
 // header('Location: InscribirMaestro.php'). $_SESSION['usuario'];
   
  } 
?>    	


 
</body>
</html>


