<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<link rel="stylesheet" href="css_da/menu_css.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css_da/menu_css.css" />
	<style type="text/css"> 
		
		body{
			font: 1em "Cambria", Georgia, bold, serif;	
			align-items: center;
            text-align: center;
			}	
	</style> 
</head>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
header('Content-Type: text/html; charset=UTF-8');  

session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];

require('_con.php');

?>
<html>
<head>
<title>Consulta de Cursos</title>
</head>
<body>
	<!--Header -->
	<nav class="navbar navbar-expand-sm bg-light navbar-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">
			<img src="../Img/educacion.png" alt="Avatar Logo" style="width:600px;" > 
			</a>
		</div>
		<div class="container-fluid">
			<a class="navbar-brand" href="#">
			<img src="../Img/itcg.png" alt="Avatar Logo" style="width:105px; height:129px;"> 
			</a>
		</div>
	</nav> 
		<!--Fin header -->
		<!--Menu desarrollo docente-->
		<nav class="navbar navbar-expand-lg navbar-light bg-#1b396a" style="background-color: #1b396a;">
				<a class="navbar-brand" href="Menu.php" style="color: #ffffff;"><i class="bi bi-house-fill"></i></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #fff;">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item">
					<a class="nav-link" href="CambioNip.php"style="color: #ffffff;">MODIFICAR CONTRASEÑA</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="ModificarDatos.php" style="color:#ffffff;">MODIFICAR DATOS</a>
					</li>
					<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
						CURSOS
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="InscribirCurso.php">INSCRIBIR CURSO</a>
						<a class="dropdown-item" href="ConsultarCursos.php">CONSULTAR CURSOS</a>
						<a class="dropdown-item" href="ConsultarCursos.php">ASISTENCIA CURSOS</a>
						<a class="dropdown-item" href="ConsultarCursos.php">CALIFICACIÓN CURSOS</a>
					</div>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="ReporteCursosMaestros.php" style="color:#ffffff;">REPORTE DE CURSOS</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="constancia1.php" style="color:#ffffff;">CONSULTAR CONSTANCIAS</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="encuesta1.php" style="color:#ffffff;">REALIZAR ENCUESTAS</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="../Logout.php" style="color:#ffffff;">CERRAR SESIÓN</a>
					</li>
				</ul>
			</div>
		</nav>
		<!--Fin Menu desarrollo docente-->
<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
  mysqli_query($con,"SET NAMES 'utf8'");

 	$consulta_mysqli="select * from  maestro where `Emp` =  $usuario";
	$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);

		while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
		
		if ($fila[10] == 1 &&  $fila[0] != $fila [8])
		{
			
		}
		else
		{	
			echo '<script language="javascript">alert("Para un mejor uso de la plataforma se recomienda actualizar sus datos y contraseña");</script>'; 
			header('Location: Menu.php'). $_SESSION['usuario'];	
		}
		}


echo "<br>";

echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";
echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/conscursos.png' >";
echo "</td>";
echo "<td>";
echo "<CENTER>";
echo "<h2>";

echo "CURSOS AUTORIZADOS";

echo "</h2>";

echo "<form method='post' action='mostrarcursos.php' >";
//$consulta_mysqli='select * from curso where activo = 1 and validado = 1 and ins_evaluado = 1 and Periodo = "Agosto - Diciembre"';
$consulta_mysqli='select distinct nombre from curso ';
$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
  
echo "<select name='curso'>";
while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
	
   // echo "<option value='".$fila['Nombre']."'>".$fila['Nombre']."</option>";
    echo "<option value='".$fila['nombre']."'>".$fila['nombre']."</option>";
}
echo "</select>";  


echo "<br>";
echo "<br>";
echo "<input type='submit' name='Submit'   value='Mostrar Contenido de Curso' style='BORDER: #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 

echo "<br>";
echo "<br>";
echo "</form>";
echo "</CENTER>";
echo "</td>";
echo "</tr>";
echo "</table>";

?>
<br>
<!-- Footer -->
<footer class="mt-auto" style="background-color:#1b396a; color:white;">
  <div class="footer-copyright text-center py-3">
		Avenida Tecnológico #100. Ciudad Guzmán, Mpio. de Zapotlán el Grande, Jalisco, México.
		<br>
		Teléfono: 01 (341) 575 20 50
		<br>
		Fax: 01 (341) 575 20 74
  </div>
</footer>
<!-- Footer -->	
</footer>
</body>
</html>