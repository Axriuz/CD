<html>
		
		
	<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnol贸gico Nacional de M茅xico
		<br>
		INSTITUTO TECN脫LOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	
	<body>
	
<BR>
	<BR>
<?php 
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
session_start();
if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}


require('con.php');
  
$curso = $_POST["c1"];
$empleado = $_POST["c2"];



   $sql1 = "INSERT INTO `matriculasRH`(`Id_matricula`,`curso`,`Emp`,`Constacia`,`Asistencia`, `Activo`) VALUES ('','$curso','$empleado','Pendiente (Sin Elaborar)', '|0|0|0|0|0|','1')";
   $result1 = mysqli_query($con,$sql1);
   
   if(!$result1) { 
echo '<script language="javascript">alert("Error matricula NO agregada");</script>';
//header('Location: AgregarExt.php'). $_SESSION['usuario'];
}else {
  echo'<script languaje="javascript">alert("Registrado con éxito");history.back();</script>';
 // header('Location: InscribirMaestro.php'). $_SESSION['usuario'];
   
  } 
  

  
?> 
	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
					
				
				
	</body>
</html>




