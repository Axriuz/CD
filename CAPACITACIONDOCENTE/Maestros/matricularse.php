
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
 $cursos = $_POST['c1']; 

/*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query($con,"SET NAMES UTF8");
*/

require('_con.php');
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
		<article>


<?php
 $consulta_mysqli="select curso from  matriculas where `Emp` =  $usuario";
	$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);

		while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
		
		if ($fila[0] <> $cursos)
		{	

	
	}
		else 
		{  

  header('Location: Menu.php'). $_SESSION['usuario'];
	
	
	}
		
		}
 
 
 
 

echo "<CENTER>";  
echo "<h2>CEDULA DE INSCRIPCION</h2>"; 
echo "</CENTER>";

echo "<form method='post' action='registroMatricula.php'>";
echo "<BR>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";
echo "<tr>";
echo "<td>";

$fecha_actual = localtime(time(), 1);
$anyo_actual  = $fecha_actual["tm_year"] + 1900;
$mes_actual   = $fecha_actual["tm_mon"] + 1;
$dia_actual   = $fecha_actual["tm_mday"]-1;
print "<p>FECHA: $dia_actual/$mes_actual/$anyo_actual</p>";

echo " <input type ='text'  size= '40'   style='visibility:hidden'  name='fecha' value='$dia_actual/$mes_actual/$anyo_actual'>";
echo " <input type ='text'  size= '40'   style='visibility:hidden'  name='c1' value='$cursos'>";
?>	
<BR>
<BR>
<CENTER>
UNIDAD RESPONSABLE:
<input type="text" name="unidadres" size="30" required >
&nbsp;
&nbsp;
&nbsp;

AREA:
<input type="text" name="area" size="30" required>	
&nbsp;
&nbsp;
&nbsp;
PLAZA ACTUAL:
<select name="plaza">
<option value="E3817">E3817 Profesor de carrera Titular "C"</option>
<option value="E3815">E3815 Profesor de carrera Titular "B"</option>
<option value="E3813">E3813 Profesor de carrera Titular "A"</option>
<option value="E3811">E3811 Profesor de carrera Asociado "C"</option>
<option value="E3809">E3809 Profesor de carrera Asociado "B"</option>
<option value="E3807">E3807 Profesor de carrera Asociado "A"</option>
<option value="E3717">E3717 Profesor de carrera Titular "C"</option>
<option value="E3715">E3715 Profesor de carrera Titular "B"</option>
<option value="E3713">E3713 Profesor de carrera Titular "A"</option>
<option value="E3711">E3711 Profesor de carrera Asociado "C"</option>
<option value="E3709">E3709 Profesor de carrera Asociado "B"</option>
<option value="E3707">E3707 Profesor de carrera Asociado "A"</option>
<option value="E3617">E3617 Profesor de carrera Titular "C"</option>
<option value="E3615">E3615 Profesor de carrera Titular "B"</option>
<option value="E3613">E3613 Profesor de carrera Titular "A"</option>
<option value="E3611">E3611 Profesor de carrera Asociado "C"</option>
<option value="E3609">E3609 Profesor de carrera Asociado "B"</option>
<option value="E3607">E3607 Profesor de carrera Asociado "A"</option>
<option value="E3841">E3841 Tecnico docente  Asociado "C"</option>
<option value="E3839">E3839 Tecnico docente  Asociado "B"</option>
<option value="E3837">E3837 Tecnico docente  Asociado "A"</option>
<option value="E3641">E3641 Tecnico docente  Asociado "C"</option>
<option value="E3639">E3639 Tecnico docente  Asociado "B"</option>
<option value="E3637">E3637 Tecnico docente  Asociado "A"</option>
<option value="E3525">E3525 Profesor de Asignatura "C"</option>
<option value="E3521">E3521 Profesor de Asignatura "B"</option>
<option value="E3519">E3519 Profesor de Asignatura "A"</option>
<option value="E3509">E3509 Tecnico docente  Asignatura "C"</option>
<option value="E3507">E3507 Tecnico docente  Asignatura "B"</option>
<option value="E3505">E3505 Tecnico docente  Asignatura "A"</option>
</select>

<BR>
<BR>
HORARIO DE TRABAJO:
<input type="text" name="horario" size="15" required>	
&nbsp;
&nbsp;
&nbsp;
NOMBRE DEL/DE LA JEFE(A) INMEDIATO:
<input type="text" name="jefe" size="15" required>	
<BR>
<BR>

DOMICILIO OFICIAL:
<input type="text" name="domofi" size="15" required>	
&nbsp;
&nbsp;
&nbsp;
TELEFONO OFICIAL:
<input type="text" name="tel" size="20" required>
&nbsp;
&nbsp;
&nbsp;
EXT:
<input type="text"   name="ext" size="15" required>	
<BR>
<BR>



<input type="Submit" name="enviar" value="REGISTRARSE" style='BORDER:#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'  onclick='alert("TE MATRICULASTE SATISFACTORIAMENTE.")'>
</CENTER>
   </form> 
   
   </td>
</tr>
</table>
<br> 
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
</article>				
</body>
</html>
