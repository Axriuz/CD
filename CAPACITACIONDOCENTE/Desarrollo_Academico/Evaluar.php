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
error_reporting(E_ALL ^ E_DEPRECATED);
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
 $conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query($con,("SET NAMES UTF8");
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
              <a class="nav-link" href="CambioNip.php"style="color: #ffffff;">MODIFICAR CONTRASEÑA</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
                MAESTROS
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="NOMAESTROS.php">NÚMERO DE DOCENTES</a>
                <a class="dropdown-item" href="InscribirMaestro.php">REGISTRAR MAESTROS</a>
                <a class="dropdown-item" href="BorrarMaestro.php">ELIMINAR MAESTRO</a>
				<a class="dropdown-item" href="Principal.php">MODIFICAR CONTRASEÑA DE USUARIOS</a>
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
				<a class="dropdown-item" href="instructorSelect.php">GENERAR ENCUESTAS DE EVALUACIÓN DE INSTRUCTORES</a>
				<a class="dropdown-item" href="listas.php">GENERAR REPORTES</a>
				<a class="dropdown-item" href="PieyEncabe.php">MODIFICAR PIE Y ENCABEZADO DE REPORTES</a>
              </div>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="Evaluar.php" style="color:#ffffff;">EVALUACIÓN DE INSTRUCTORES</a>
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
				<a class="dropdown-item" href="GETCV.php">DESCARGAR INFORMACIÓN DE CURSO</a>
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
              <a class="nav-link" href="../Logout.php" style="color:#ffffff;">CERRAR SESIÓN</a>
            </li>
          </ul>
        </div>
      </nav>
	  <br>
<table width='100%' border='7' cellpadding=30 CELLSPACING=30  bordercolor='#445c4f';>

<tr>
<td>
<center>
<h2> FORMATO DE CRITERIOS PARA SELECCIONAR INSTRUCTORES INTERNOS Y EXTERNOS </h2>

<form action="Evaluar1.php" method="post"> 
<br>
<br>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$fecha = date("Y");
$consulta_mysqli="select distinct * from 
maestro m inner join curso c on  m.Emp = c.Instructor 
where c.activo = 1 and c.ins_evaluado = 0 and m.nombre!=''
and c.validado = '1'
union
select distinct * from 
maestro m inner join curso c on  m.Emp = c.InsAux where 
c.activo = 1 and c.ins_evaluado = 0 and m.nombre!='' and c.validado = '1'";

$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
echo "<h2>Seleccione el/la Instructor(a) que desea evaluar:</h2>";
echo "<select name='Ins'>";
while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
	 echo " <option value='".utf8_decode(utf8_encode($fila[0]))."'>".utf8_decode(utf8_encode($fila[1].' '.$fila[17].' '.$fila[18]))."</option>";
}
echo "</select>";
echo "<br>";
$Fecha=date("d/m/Y"); 

echo " <input type ='text'  size= '40' readonly style='visibility:hidden;' name='Fecha' value='$Fecha'>";  
?>

<br>
<h3> Empresa o Institución </h3>
<input type=text  name='EmpIns' size ='30' required>
<br>
<br>
1.	FORMACIÓN PROFESIONAL RELACIONADA A LA CAPACITACIÓN A IMPARTIR
<br>
Malo <input type="radio" name="fp"  value="1" required> 

Regular <input type="radio" name="fp"  value="2"required>  
 
Bien <input type="radio" name="fp" value="3"required> 

Muy bien <input type="radio" name="fp"  value="4"required>  
 
Excelente <input type="radio" name="fp" value="5"required> 
<br>
<br>
<br>


2.	EXPERIENCIA EN CAPACITACIÓN Y EN LA TEMÁTICA A IMPARTIR
<br>
Malo <input type="radio" name="ec"  value="1" required> 

Regular <input type="radio" name="ec"  value="2" required>  
 
Bien <input type="radio" name="ec" value="3" required> 

Muy bien <input type="radio" name="ec"  value="4" required>  
 
Excelente <input type="radio" name="ec" value="5" required> 
<br>
<br>
<br>


3.	MATERIALES DIDÁCTICOS A UTILIZAR
<br>
Malo <input type="radio" name="md"  value="1" required> 

Regular <input type="radio" name="md"  value="2" required>  
 
Bien <input type="radio" name="md" value="3" required> 

Muy bien <input type="radio" name="md"  value="4" required>  
 
Excelente <input type="radio" name="md" value="5" required> 
<br>
<br>
<br>



4.	COSTOS POR HORA DE CAPACITACIÓN 
<br>
Malo <input type="radio" name="ch"  value="1" required> 

Regular <input type="radio" name="ch"  value="2" required>  
 
Bien <input type="radio" name="ch" value="3" required> 

Muy bien <input type="radio" name="ch"  value="4" required>  
 
Excelente <input type="radio" name="ch" value="5" required> 
<br>
<br>
<br>


5.	EMPRESAS DIFERENTES EN LAS QUE HA PARTICIPADO COMO INSTRUCTOR(A)
<br>
Malo <input type="radio" name="ed"  value="1" required> 

Regular <input type="radio" name="ed"  value="2" required>  
 
Bien <input type="radio" name="ed" value="3" required> 

Muy bien <input type="radio" name="ed"  value="4" required>  
 
Excelente <input type="radio" name="ed" value="5" required> 
<br>
<br>
<br>


6.	CERTIFICACIONES Y ACREDITACIONES RELACIONADAS AL ÀREA DE CAPACITACIÓN
<br>
Malo <input type="radio" name="ca"  value="1" required> 

Regular <input type="radio" name="ca"  value="2" required>  
 
Bien <input type="radio" name="ca" value="3" required> 

Muy bien <input type="radio" name="ca"  value="4" required>  
 
Excelente <input type="radio" name="ca" value="5" required> 
<br>
<br>
<br>

<input type="submit" value="GUARDAR"  style='BORDER:#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>

</form> 

</center>
</td>
</tr>
</table>
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
<br><br>
</body>
</html>