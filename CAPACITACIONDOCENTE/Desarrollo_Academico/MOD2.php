<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="css_da/menu_css.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<style type="text/css"> 
		body{
			font: 1em "Cambria", Georgia, bold, serif;
			
		}
		table {
			text-align: center;
		}
	</style> 
</head>	
<body>
	<!--Header -->
	<nav class="navbar navbar-expand-sm bg-light navbar-light">
	<div class="container-fluid">
		<a class="navbar-brand" href="#">
		<img src="../Img/educacion.png" alt="Avatar Logo" style="width:600px;" class="rounded-pill"> 
		</a>
	</div>
	<div class="container-fluid">
		<a class="navbar-brand" href="#">
		<img src="../Img/itcg.png" alt="Avatar Logo" style="width:105px; height:129px;" class="rounded-pill"> 
		</a>
	</div>
	</nav> 
	<!--Fin header --> 
<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];
/*
 $host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2";
 $con=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $con);
mysqli_query($con,"SET NAMES UTF8");
*/
require('_con.php');
?>
<!--Menu desarrollo docente-->
<nav class="navbar navbar-expand-lg navbar-light bg-#1b396a" style="background-color: #1b396a;">
        <a class="navbar-brand" href="Menu.php" style="color: #ffffff;"><i class="bi bi-house-fill"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #fff;">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="CambioNip.php"style="color: #ffffff;">MODIFICAR CONTRASE??A</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
                MAESTROS
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="NOMAESTROS.php">N??MERO DE DOCENTES</a>
                <a class="dropdown-item" href="InscribirMaestro.php">REGISTRAR MAESTROS</a>
                <a class="dropdown-item" href="BorrarMaestro.php">ELIMINAR MAESTRO</a>
				<a class="dropdown-item" href="Principal.php">MODIFICAR CONTRASE??A DE USUARIOS</a>
              </div>
            </li>
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
                EXTERNOS
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item" href="AgregarExt.php">REGISTRAR PERSONAL EXTERNO</a>
				<a class="dropdown-item" href="BorrarExt.php">ELIMINAR PERSONAL EXTERNO</a>
				<a class="dropdown-item" href="AddCursoExt.php">PROPONER CURSO EXTERNO</a>
				<a class="dropdown-item" href="DeleteCursoExt.php">ELIMINAR CURSO EXTERNO</a> 
              </div>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="CambioJefe.php" style="color:#ffffff;">JEFES DE DEPARTAMENTO</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="actcontancias.php" style="color:#ffffff;">ACTUALIZAR CONSTANCIAS</a>
            </li>
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
                REPORTES
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			  	<a class="dropdown-item" href="encuestaCurso.php">GENERAR ENCUESTAS DE CURSOS</a>
				<a class="dropdown-item" href="instructorSelect.php">GENERAR ENCUESTAS DE EVALUACI??N DE INSTRUCTORES</a>
				<a class="dropdown-item" href="listas.php">GENERAR REPORTES</a>
				<a class="dropdown-item" href="PieyEncabe.php">MODIFICAR PIE Y ENCABEZADO DE REPORTES</a>
              </div>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="Evaluar.php" style="color:#ffffff;">EVALUACI??N DE INSTRUCTORES</a>
            </li>
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
                CURSO
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			  	<a class="dropdown-item" href="asistencia1.php">LISTAS DE ASISTENCIA</a>
				<a class="dropdown-item" href="seleccionar_anio_curso.php">ACTIVAR CURSO</a>
				<a class="dropdown-item" href="desactivar.php">DESACTIVAR CURSO</a>
				<a class="dropdown-item" href="MOD.php">MODIFICAR CURSO</a>
				<a class="dropdown-item" href="consulcur.php">CONSULTAR DATOS DEL CURSO</a>
				<a class="dropdown-item" href="BorrarMaestroCurso.php">ELIMINAR MAESTRO DEL CURSO</a>
				<a class="dropdown-item" href="GETCV.php">DESCARGAR INFORMACI??N DE CURSO</a>
              </div>
            </li>
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
                DIPLOMADOS
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			 	<a class="dropdown-item" href="InscrDiplo.php">INSCRIPCION A DIPLOMADOS</a>
				<a class="dropdown-item" href="ConsulDiplo.php">CONSULTA DE DIPLOMADOS</a>
				<a class="dropdown-item" href="asisdiplo.php">ASISTENCIA DIPLOMADOS</a>
              </div>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="respaldos.php" style="color:#ffffff;">BACKUP</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="../Logout.php" style="color:#ffffff;">CERRAR SESI??N</a>
            </li>
          </ul>
        </div>
      </nav>
	  <br>
<?php
if(isset($_REQUEST['Modificar'])){

$Nombre=$_POST['Nombre'];
$Periodo=$_POST['periodo'];
$Duracion=$_POST['Duracion'];
$CursoInicio=$_POST['CursoInicio'];
$CursoFin=$_POST['CursoFin'];
$Horario=$_POST['horario'];
$Horario1=$_POST['horario1'];
$Sed=$_POST['Sede'];
$Objetivo=$_POST['Objetivo'];
$Instructor=$_POST['Instructor'];
$Tec=$_POST['Tec'];
$Introduccion=$_POST['Introduccion'];
$Justificacion=$_POST['Justificacion'];
$Descripcion=$_POST['Descripcion'];
$Resultados=$_POST['Resultados'];
$Fuentes=$_POST['Fuentes'];
$InsAux=$_POST['InsAux'];
$TipoCurso=$_POST['TipoCurso'];
$Numero=$_POST['Numero'];

$dirigido=$_POST['dirigido'];

$NOMBRECURSO=$_POST['cursoU'];
//echo "1".$Nombre."2".$Periodo."3".$Duracion."4".$CursoInicio."5".$CursoFin."6".$Horario."7".$Horario1."8".$Sed."9".$Objetivo."1".$Instructor."2".$Tec."3".$Introduccion."4".$Justificacion."5".$Descripcion."6".$Resultados."7".$Fuentes."8".$InsAux."9".$TipoCurso."<br><br><br><br>";

//echo "".$CursoInicio."<br><br><br><br>";
//echo "".$CursoFin."<br><br><br><br>";

$qur="UPDATE matriculas set Curso='".$Nombre."' where Curso='".$NOMBRECURSO."'";
$qurt1="UPDATE tbl_documentos set titulo='".$Nombre."' where titulo='".$NOMBRECURSO."'";
$qurt2="UPDATE tbl_documentos2 set titulo='".$Nombre."' where titulo='".$NOMBRECURSO."'";
$qurt3="UPDATE tbl_documentos3 set titulo='".$Nombre."' where titulo='".$NOMBRECURSO."'";


$queryi="UPDATE `curso` SET `Nombre`='".$Nombre."',`Periodo`='".$Periodo."',`Duracion`='".$Duracion."',`CursoInicio`='".$CursoInicio."',`CursoFin`='".$CursoFin."',`Horario`='".$Horario."',`Horario1`='".$Horario1."',`Sede`='".$Sed."',`Objetivo`='".$Objetivo."',`Instructor`='".$Instructor."',`Tec`='".$Tec."',`Introduccion`='".$Introduccion."',`Justificacion`='".$Justificacion."',`Descripcion`='".$Descripcion."',`Resultados`='".$Resultados."',`Fuentes`='".$Fuentes."',`InsAux`='".$InsAux."',`TipoCurso`='".$TipoCurso."',`dirigido_a`='".$dirigido."' WHERE Numero=".$Numero."";

//$query($con,i="update maestro set Contrasena='$alupas',Area='$area',Nombre='$nombre' where Emp='$aluctr'";//consulta sql

//echo "".$query($con,i;

$val=mysqli_query($con,$queryi);//ejecutando consulta

$val1=mysqli_query($con,$qur);//ejecutando consulta
$val2=mysqli_query($con,$qurt1);//ejecutando consulta
$val3=mysqli_query($con,$qurt2);//ejecutando consulta
$val4=mysqli_query($con,$qurt3);//ejecutando consulta

if(!$val || !$val1 || !$val2 || !$val3 || !$val4){
echo "No se ha podido Modificar";
echo $val1, $val2,$val3,$val4;
}
else {
echo "<center><h1>Datos Modificados Correctamente<br><br></h1>";
}
}
?>
<!-- Footer -->
<footer class="mt-auto" style="background-color:#1b396a; color:white;">
  <div class="footer-copyright text-center py-3">
		Avenida Tecnol??gico #100. Ciudad Guzm??n, Mpio. de Zapotl??n el Grande, Jalisco, M??xico.
		<br>
		Tel??fono: 01 (341) 575 20 50
		<br>
		Fax: 01 (341) 575 20 74
  </div>
</footer>
<!-- Footer -->	
</body>

</html>

