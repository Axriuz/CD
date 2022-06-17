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
		<img src="../Img/educacion.png" alt="Avatar Logo" style="width:600px;"> 
		<img src="../Img/itcg.png" alt="Avatar Logo" style="width:105px; height:129px;"> 
		</a>
	</div>
	<div class="container-fluid">
		<a class="navbar-brand" href="#">
		
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
 $curso = $_POST['curso']; 
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
<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
echo "<br>";

echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";
echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/conscursos.png' >";
echo "</td>";
echo "<td>";
//echo "<CENTER>";
echo "<h2>";
echo "Docentes matriculados en el curso $curso";
echo "</h2>";
//echo " <input type ='text'  size= '40'   style='visibility:hidden'  name='c1' value='$curso'>";


$sql="select m.ApellidoP,m.ApellidoM,m.nombre,ALU,AMA,AMI,AJU,AVI,Asistencia from maestro m inner join matriculas a on m.Emp = a.Emp where a.curso = '$curso' order by m.ApellidoP";
$resultado = mysqli_query($con,$sql);

$numero_filas = mysqli_num_rows($resultado);
echo "<CENTER>".$numero_filas." Registros\n</CENTER><br>";
echo "<br><CENTER>1- Asistencia				0-Falta</CENTER>";

$numAux=1;
	echo "<form method='post' action='regasistencia.php' >";
	
		echo "  <input type ='text'  size= '50'   style='visibility:hidden'  name='num' value='".$numero_filas."' readonly>";
		echo "  <input type ='text'  size= '50'   style='visibility:hidden'  name='nom' value='".$curso."' readonly>";

echo "<TABLE style='text-align:center;' width='743'  border='0'  CELLPADDING=3 CELLSPACING=0>";
while ($row = mysqli_fetch_row($resultado))
      { 
	echo "<tr>";
	$nombre=trim($row[0])." ".trim($row[1])." ".trim($row[2]);
	echo "<span style='font-size: 12pt; font-weight: bold; color: black; text-align: center;'>";
	echo "  <td align='left'><input type ='text'  size= '50'   style='visibility:visible'  name='d1".$numAux."' value='".$nombre."' 	readonly></td >";
	//
	if($row[8]=='|0|0|0|0|0|')
	{
		echo "<td >Lunes<select name='LU".$numAux."'>
   <option value='0'>0</option> 
   <option selected value='1'>1</option> 
</select></td >
<td >Martes<select name='MA".$numAux."'>
   <option value='0'>0</option> 
   <option selected value='1'>1</option> 
</select></td >
<td >Miercoles<select name='MI".$numAux."'>
   <option value='0'>0</option> 
   <option  selected value='1'>1</option> 
</select></td >
<td >Jueves<select name='JU".$numAux."'>
   <option value='0'>0</option> 
   <option selected value='1'>1</option> 
</select></td >
<td >Viernes<select name='VI".$numAux."'>
   <option value='0'>0</option> 
   <option selected value='1'>1</option> 
</select></td ";
	}
	
	else
	{
	
	if($row[3]=='0')
	{
 echo"<td >Lunes<select name='LU".$numAux."'>
   <option selected value='0'>0</option> 
   <option value='1'>1</option> 
</select></td >";
	}
	if($row[3]=='1')
	{
		 echo"<td >Lunes<select name='LU".$numAux."'>
   <option value='0'>0</option> 
   <option selected value='1'>1</option> 
</select></td >";
	}
	
	if($row[4]=='0')
	{
echo"<td >Martes<select name='MA".$numAux."'>
   <option selected value='0'>0</option> 
   <option value='1'>1</option> 
</select></td >";
	}
	if($row[4]=='1')
	{
echo"<td >Martes<select name='MA".$numAux."'>
   <option value='0'>0</option> 
   <option selected value='1'>1</option> 
</select></td >";
	}
	
	if($row[5]=='0')
	{
			echo"<td >Miercoles<select name='MI".$numAux."'>
   <option selected value='0'>0</option> 
   <option value='1'>1</option> 
</select></td >";
	}
	if($row[5]=='1')
	{
			echo"<td >Miercoles<select name='MI".$numAux."'>
   <option value='0'>0</option> 
   <option  selected value='1'>1</option> 
</select></td >";
	}
	
	if($row[6]=='0')
	{
			echo"<td >Jueves<select name='JU".$numAux."'>
   <option selected value='0'>0</option> 
   <option value='1'>1</option> 
</select></td >";
	}
	if($row[6]=='1')
	{
			echo"<td >Jueves<select name='JU".$numAux."'>
   <option value='0'>0</option> 
   <option selected value='1'>1</option> 
</select></td >";
	}
	//
	if($row[7]=='0')
	{
		echo"<td >Viernes<select name='VI".$numAux."'>
   <option selected value='0'>0</option> 
   <option value='1'>1</option> 
</select></td >";
	}
	if($row[7]=='1')
	{
		echo"<td >Viernes<select name='VI".$numAux."'>
   <option value='0'>0</option> 
   <option selected value='1'>1</option> 
</select></td >";
	}
	
	}
	
	//
	
	//
		
	//
	
	
	
	//echo" <td >Lunes<input type='text'  size= '1' name='LU".$numAux."'  value='0' style='BORDER: rgb(0,43,200) 2px solid; BACKGROUND-COLOR: 	#FFFFFF; COLOR: #000000  ;'></td >";
	//echo" <td >Martes<input type='text'  size= '1' name='MA".$numAux."'  value='0' style='BORDER: rgb(0,43,200) 2px solid; BACKGROUND-COLOR:#FFFFFF; COLOR: #000000  ;'></td >";
	//echo" <td >Miercoles<input type='text'  size= '1' name='MI".$numAux."'  value='0' style='BORDER: rgb(0,43,200) 2px solid; BACKGROUND-COLOR:#FFFFFF; COLOR: #000000  ;'></td >";
	//echo" <td >Jueves<input type='text'  size= '1' name='JU".$numAux."'  value='0' style='BORDER: rgb(0,43,200) 2px solid; BACKGROUND-COLOR:#FFFFFF; COLOR: #000000  ;'></td >";
	//echo" <td >Viernes<input type='text'  size= '1' name='VI".$numAux."'  value='0' style='BORDER: rgb(0,43,200) 2px solid; BACKGROUND-COLOR:#FFFFFF; COLOR: #000000  ;'> </td >";
	echo "</tr>";
	echo "</span>";
	$numAux=$numAux+1;
	   } 

echo "</TABLE>";
echo "<CENTER>";
echo "<br>";
echo "<br>";
echo "<input type='submit' name='Submit'   value='Actualizar' style='BORDER::#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 

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
</body>
</html>