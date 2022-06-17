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

<?php
$consulta_mysqli="select * from maestro where Emp = '$usuario'";
$resultado=mysqli_query($con,$consulta_mysqli);

if($row = mysqli_fetch_row($resultado)) {

	echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";


echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/ModMas.png' >";

echo "</td>";
echo "<td>";

echo "<form method='post' action='RegistroDeModificacion.php'>";
echo "NÚMERO DE EMPLEADO: <input type ='text' disabled='disabled' size= '17' name='Emp' value='".$row[0]."'/>";
echo "<br>";
echo "NOMBRE    :<input type ='text' disabled='disabled'  size= '15' name='Nombre' value='".$row[1]."'/>
<input type ='text' disabled='disabled'  size= '15' name='apa' value='".$row[17]."'/>
<input type ='text' disabled='disabled'  size= '15' name='ama' value='".$row[18]."'/>";
echo "<br>";
echo "<br>";
?>
<table width="704" border=0>
 <tr>
<td width="213">SEXO: 
</td>   
<td width="360">

<select name='Sexo'>
<option value='Masculino'   <?php if($row[2] == "Masculino") echo "selected";?> >Hombre</option>
<option value='Femenino'  <?php if($row[2] == "Femenino") echo "selected";?>>Mujer</option>
</select>


</td>
</tr>


<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
echo "<tr>
      <td>";
echo "CORREO ELECTRÓNICO   :  
      </td> 
	  <td><input type ='text' size= '26' pattern='^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$'  name='Email' value='".$row[6]."' required> </td>
	  </tr>
	  <tr>
	  ";
echo " <td>";
echo "RFC :  </td>    <td>         <input type ='text' size= '26' name='Rfc' value='".$row[3]."' required>";
echo " </td></tr>";
?>

<tr>
    
  <td>
ÁREA:</td>   

<td>        
<select name='Area'> 
<option value='Ciencias Básicas'  <?php if($row[4] == "Ciencias Básicas") echo "selected";?>  >Ciencias Básicas</option>
<option value='Ciencias Eco-Administrativas'  <?php if($row[4] == "Ciencias Eco-Administrativas") echo "selected";?>   >Ciencias Eco-Administrativas</option>
<option value='Sistemas y Computación'  <?php if($row[4] == "Sistemas y Computación") echo "selected";?>  >Sistemas y Computación</option>
<option value='Metal-Mecánica'  <?php if($row[4] == "Metal-Mecánica") echo "selected";?>  >Metal-Mecánica</option>
<option value='Eléctrica y Electrónica'  <?php if($row[4] == "Eléctrica y Electrónica") echo "selected";?>  >Electrica y Electronica</option>
<option value='Ciencias de la Tierra'  <?php if($row[4] == "Ciencias de la Tierra") echo "selected";?>  >Ciencias de la Tierra</option>
<option value='Industrial'  <?php if($row[4] == "Industrial") echo "selected";?>  >Industrial</option>
</select>
</td>
</tr>

<tr>
    
  <td>PUESTO:  </td>   
   <td>       
<select name='Puesto'>
<option value='Docente'   <?php if($row[5] == "Docente") echo "selected";?> >Docente</option>
<option value='Jefe de Departamento'  <?php if($row[5] == "Jefe de Departamento") echo "selected";?> >Jefe(a) de Departamento</option>
<option value='Jefe de Oficina'  <?php if($row[5] == "Jefe de Oficina") echo "selected";?> >Jefe(a) de Oficina</option>
<option value='Directivo' <?php if($row[5] == "Directivo") echo "selected";?> >Directivo</option>
<option value='Coordinador de Carrera' <?php if($row[5] == "Coordinador de Carrera") echo "selected";?>>Coordinador(a) de Carrera</option>
<option value='Auxiliar en Laboratorio' <?php if($row[5] == "Auxiliar en Laboratorio") echo "selected";?> >Auxiliar en Laboratorio</option>
</select>
 </td>
</tr>

 <tr>
    
  <td>
TIPO DE PUESTO: </td> 
<td>           
<select name='TP'> 
<option value='Base'   <?php if($row[13] == "Base") echo "selected";?> >Base</option>
<option value='Confianza'  <?php if($row[13] == "Confianza") echo "selected";?> >Confianza</option>
</select>
</td>
</tr>

 <tr>
  <td>
NIVEL DE PUESTO:    </td>    
  <td>        
<select name='Tipo' >
<option value='Funcionario' <?php if($row[11] == "Funcionario") echo "selected";?> >Funcionario</option>
<option value='Docente' <?php if($row[11] == "Docente") echo "selected";?> >Docente</option>
</select>
  </td>
   </tr>

<tr>
  <td>
ESTUDIOS:  </td> 
<td>                 
<select name='Estudios' >
<option value='Primaria' <?php if($row[15] == "Primaria") echo "selected";?> >Primaria</option>
<option value='Secundaria' <?php if($row[15] == "Secundaria") echo "selected";?> >Secundaria</option>
<option value='Carrera Técnica' <?php if($row[15] == "Carrera Técnica") echo "selected";?> >Carrera Técnica</option>
<option value='Bachillerato' <?php if($row[15] == "Bachillerato") echo "selected";?> >Bachillerato</option>
<option value='Licenciatura' <?php if($row[15] == "Licenciatura") echo "selected";?> >Licenciatura</option>
<option value='Maestría' <?php if($row[15] == "Maestría") echo "selected";?> >Maestría</option>
<option value='Doctorado' <?php if($row[15] == "Doctorado") echo "selected";?> >Doctorado</option>
</select>
  </td>
   </tr>
  
<?php
echo "
<tr>
  <td>CARRERA CURSADA:</td><td>    <input type ='text' size= '26' name='Carrera' value='".$row[16]."' required></td>";
echo "</tr>";
?>


<?php
echo "<tr>
  <td>TELÉFONO:  </td><td><input type ='text'  size= '26'name='Telefono' value='".$row[7]."' required></td>";
echo " </tr>";
?>
</table>

<?php
echo "<br>";
echo "<br>";
echo "<br>";
echo "<center>";
echo "<input type='submit' name='Submit' value='GUARDAR CAMBIOS' style='BORDER: #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>" ; 
echo "</center>";
echo "</form>";


echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
}
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
