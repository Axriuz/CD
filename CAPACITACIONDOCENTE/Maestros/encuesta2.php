<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$idusuario = $_POST['ID'];
$curso = $_POST['curso'];
?>
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
						<a class="dropdown-item" href="asistenciacurso.php">ASISTENCIA CURSOS</a>
						<a class="dropdown-item" href="calificacioncurso.php">CALIFICACIÓN CURSOS</a>
						<!--<a class="dropdown-item" href="conscurso.php">GENERAR CONSTANCIA</a>-->
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
		<br>

<?php
//echo 'HOLA '.$idusuario ;
echo "
<table width='100%' border='5' cellpadding=50 CELLSPACING=50  bordercolor='#497f43' ;>

<tr>
<td>
<center>
<h2>  FORMATO PARA PARTICIPANTES INSCRITOS </h2>

<form action='ENCUESTAFINAL.php' method='post'> 
<br>
<h2>  INSTRUCTOR </h2>

<strong>Expuso el objetivo y metario del curso.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
    <td>
  
Totalmente de acuerdo<input type='radio' name='tipo1'  value='Totalmente de acuerdo' required></td>
<td>
Parcialmente de acuerdo<input type='radio' name='tipo1'  value='Parcialmente de acuerdo'> </td>
 <td>
Parcialmente en desacuerdo<input type='radio' name='tipo1' value='Parcialmente en desacuerdo'> </td>
<td>
En desacuerdo<input type='radio' name='tipo1' value='En desacuerdo'> </td>
</tr>
</table>
<br>
<br>
<br>
<strong>Mostró dominio del contenido abordado.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo2'  value='Totalmente de acuerdo' required ></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo2'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo2' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo2' value='En desacuerdo'></td>
</tr>
</table>
<br><br>
<br>
<strong>Fomentó la participación del grupo.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo3'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo3'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo3' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo3' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br><br>
<strong>Aclaró las dudas que se presentaron.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo4'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo4'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo4' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo4' value='En desacuerdo'></td>
</tr>
</table>
<br><br>
<br>
<strong>Dio retroalimentación a los ejercicios realizados.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo5'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo5'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo5' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo5' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br><br>
<strong>Aplicó una evaluación final relacionada con los contenidos del curso.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo6'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo6'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo6' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo6' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br><br>
<strong>Inició y concluyó puntualmente las sesiones.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo7'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo7'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo7' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo7' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br>
<br>
<br>

<h2>  MATERIAL DIDÁCTICO </h2>

<strong>El material didáctico fue útil a lo largo del curso.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo8'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo8'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo8' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo8' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br>
<br>
<strong>La impresión del material didáctico fue legible.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo9'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo9'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo9' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo9' value='En desacuerdo'></td>
</tr>
</table>

<br>
<br>
<br>
<strong>La variedad del material didáctico fue suficiente para apoyar su aprendizaje.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo10'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo10'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo10' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo10' value='En desacuerdo'></td>
</tr>
</table>



<br>
<br>
<br>
<br>
<h2>  CURSO </h2>

<strong>La distribución del tiempo fue adecuada para cubrir el contenido.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo11'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo11'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo11' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo11' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br>
<br>
<strong>Los temas fueron suficientes para alcanzar el objetivo del curso.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo12'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo12'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo12' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo12' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br>
<br>
<strong>El curso compredió ejercicios de práctica relacionados con el contenido.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo13'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo13'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo13' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo13' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br>
<br>
<strong>El curso cubrió sus expectativas.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo14'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo14'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo14' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo14' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br>
<br>
<br>

<h2>  INFRAESTRUCTURA </h2>

<strong>La iluminación del aula fue adecuada.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo15'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo15'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo15' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo15' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br>
<br>
<strong>La ventilación del aula fue adecuada.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo16'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo16'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo16' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo16' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br>
<br>
<strong>El aseo del aula fue adecuado.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo17'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo17'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo17' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo17' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br>
<br>
<strong>El servicio de los sanitarios fue adecuado (limpieza, abasto de papel, toallas, jabon, etc.)</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo18'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo18'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo18' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo18' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br>
<br>
<strong>El servicio de café fue adecuado.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo19'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo19'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo19' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo19' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br>
<br>
<strong>Recibió apoyo del personal que coordinó el curso.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo20'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo20'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo20' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo20' value='En desacuerdo'></td>
  <input type='hidden' name='ID' value='$idusuario'>
  
  <input type='hidden' name='curso' value='$curso'>
</tr>
</table>
<br>
<br>
<br>

COMENTARIO
<BR>
<BR>
<TEXTAREA COLS=50 ROWS=10 NAME='Texto'> 
</TEXTAREA> 
<BR>
<BR>
<BR>
<br>
Gracias por su participación
<br>
<br>
<input type='submit' value='REGISTRAR ENCUESTA'  style= 'BORDER:  #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'> 


</form> 

</center>
</td>
</tr>
</table>
<br>";

?>

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
	</body>
</html>


