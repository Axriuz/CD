<?php 

 
error_reporting(0); 
$tipo=$_POST['tipo']; 
$asunto=$_POST['asunto']; 
$descripcion= $_POST['opinion']; 
$tipo2=$_POST['tipo2']; 


$header = "Hola"; 
$mensaje .= "Su e-mail es: " . $descripcion . " \r\n"; 
$para = "DptoDesarrollo_Academico@outlook.com";  

mail($para, $asunto, utf8_decode($mensaje), $header); 
 
 
  echo " 
 <script language='JavaScript'> 
 alert('El Mensaje Fue Enviado Correctamente'); 
 
 </script> ";
 
  header('Location: Quejas.php'). $_SESSION['usuario'];
 
 ?>
