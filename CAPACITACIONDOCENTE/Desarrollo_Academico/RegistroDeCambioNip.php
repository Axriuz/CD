<html>
<body> 
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

require('_con.php');

$sql = "UPDATE `maestro` SET Contrasena='$Contrasena' WHERE Emp = '$usuario' ";
  
   $result = mysqli_query($con,$sql);
if(!$result) {  
 echo 'ERROR: '. "\n";
   }else {
   header('Location: CambioNip.php'). $_SESSION['usuario'];} 
   	
?> 

</body>
</html>







