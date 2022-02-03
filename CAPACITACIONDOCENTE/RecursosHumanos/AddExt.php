<html>
<body> 
 
 
  <br>

<?php 
error_reporting(0);
session_start();

if(!isset($_SESSION['usuario'])) {
  header('Location: /index.html'); 
  exit();
}
//Variables 
$Nombre = $_POST["nombreExt"]; 
$Nombre1 = $_POST["APExt"]; 
$Nombre2 = $_POST["AMExt"]; 
$total = $_POST["id"];
$sexo= $_POST["sexo"];

require('con.php');
 
//Insertamos al usuario externo
$sql = "INSERT INTO  PersonalRH (Emp,Nombre,sexo,Tipo_Usuario,ApellidoP,ApellidoM) VALUES ('E$total','$Nombre','$sexo','3','$Nombre1','$Nombre2')";  
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


