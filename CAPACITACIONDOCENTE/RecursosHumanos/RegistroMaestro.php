<html>
<body> 
 
 
  <br>

<?php 
error_reporting(0);
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$Emp = $_POST["Nombre"];
$Nombre = $_POST["Nombre2"]; 
$Nombre1 = $_POST["Nombre3"]; 
$Nombre2 = $_POST["Nombre4"];
$Area = $_POST["Area"]; 

require('con.php');


$sql = "INSERT INTO `PersonalRH`(`Emp`, `Nombre`,`Area`,`ApellidoP`,`ApellidoM`,`Contrasena`) VALUES ('$Emp', '$Nombre','$Area','$Nombre1','$Nombre2','$Emp' )";  
//echo "".$sql;
   $result = mysqli_query($con,$sql);
if(!$result) {  
//header('Location: InscribirMaestro.php'). $_SESSION['usuario'];
 echo'<script languaje="javascript">alert("El usuario ya existe ");history.back();</script>';
   }else {
  echo'<script languaje="javascript">alert("Registrado con éxito '.$Nombre.' '.$Nombre1.' '.$Nombre2.'");history.back();</script>';
 // header('Location: InscribirMaestro.php'). $_SESSION['usuario'];
   
   } 
?>    	


 
</body>
</html>







