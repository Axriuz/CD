<?php
error_reporting(0);//para trabajar con la version actual de mysqli
session_start();
$curso = $_POST["curso"];
if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];

require('_con.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Asistencia</title>
    <link rel="stylesheet" href="css_da/menu_css.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
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
					<a class="nav-link" href="CambioNip.php"style="color: #ffffff;">MODIFICAR CONTRASE??A</a>
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
						<a class="dropdown-item" href="calificacioncurso.php">CALIFICACI??N CURSOS</a>
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
					<a class="nav-link" href="../Logout.php" style="color:#ffffff;">CERRAR SESI??N</a>
					</li>
				</ul>
			</div>
		</nav>
		<!--Fin Menu desarrollo docente-->
        <?php
			error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
			echo "<br>";

			echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";
			echo "<tr>";
			echo "<td width=300>";
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
			echo "<br><CENTER>1- Asistencia				0-Falta";
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

			echo "<br>";
			echo "<br>";
			echo "<input type='submit' name='Submit'   value='Actualizar' style='BORDER::#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 

			echo "</form>";
			echo "</CENTER>";
			echo "</td>";
			echo "</tr>";
			echo "</table>";

		?>
<!-- Footer -->
<br>
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