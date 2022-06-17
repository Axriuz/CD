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
$fecha = $_POST['fecha'];
?>
<?php
require('_con.php');
$dip1 = mysqli_query($con, "SELECT * FROM diplomados WHERE DiplomadoCompetenciasDocentes != 0000-00-00");
$dip2 = mysqli_query($con, "SELECT * FROM diplomados WHERE DiplomadoTutores !=0000-00-00");
$dip3 = mysqli_query($con, "SELECT * FROM diplomados WHERE DiplomadoVirtualesAprendizaje !=0000-00-00");
$dip4 = mysqli_query($con, "SELECT * FROM diplomados WHERE DiplomadoEducacionInclusiva !=0000-00-00");
$res_u = mysqli_query($con, "SELECT * FROM diplomados WHERE Emp='$Emp'");
$res_p = mysqli_query($con, "SELECT * FROM maestro WHERE Emp='$Emp'");
if (mysqli_num_rows($res_u)) {#Compara si el docente está registrado, con lo cual se usaria alter table	
	if (mysqli_num_rows($dip1)) {	
		echo'<script languaje="javascript">alert("Ya se encuentra registrado");history.back();</script>';
		if (mysqli_num_rows($dip2)) {
			echo'<script languaje="javascript">alert("Ya se encuentra registrado");history.back();</script>';
			if (mysqli_num_rows($dip3)) {
				echo'<script languaje="javascript">alert("Ya se encuentra registrado");history.back();</script>';
				if (mysqli_num_rows($dip4)) {
					echo'<script languaje="javascript">alert("Ya se encuentra registrado");history.back();</script>';
				}
				else{
					echo'<script languaje="javascript">alert("Diplomado registrado");history.back();</script>';
				}
			}
			
			else{
				echo'<script languaje="javascript">alert("Diplomado registrado");history.back();</script>';
			}
		}
		else{
			echo'<script languaje="javascript">alert("Diplomado registrado");history.back();</script>';
		}
	}
	else{
		echo'<script languaje="javascript">alert("Diplomado registrado");history.back();</script>';
	}
	
}
else if(mysqli_num_rows($res_p)){#Si no está registrado se usa insert into
	$sql = "INSERT INTO `diplomados`(`$Diplo`,`Emp`)
    VALUES ($fecha','$Emp')";  
	$result = mysqli_query($con,$sql);
	if(!$result) {  
		echo'<script languaje="javascript">alert("El usuario ya existe ");history.back();</script>';
	}
	else {
		echo'<script languaje="javascript">alert("Registrado con éxito");history.back();</script>';
	}
}
else{
	echo'<script languaje="javascript">alert("El número de SIE del docente no existe");history.back();</script>';
}

?>    	 
</body>
</html>
