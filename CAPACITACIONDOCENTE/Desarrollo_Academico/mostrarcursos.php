<html>
		
	<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNOLÓGICO DE CD. GUZMÁN
		<hr height: 10px; > 
		</center>
	</header>
<body>

<?php
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];

 $curso = $_POST["curso"]; 


$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $conexion);
mysql_query("SET NAMES UTF8");



$consulta_mysql="select * from curso where Nombre = '$curso'";
//$consulta_mysql='select * from curso where validado = 1';
$resultado=mysql_query($consulta_mysql);

if($row = mysql_fetch_row($resultado)) {

	echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#D149F6' ;>";


echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/ModMas.png' >";

echo "</td>";
echo "<td>";

echo "<form method='post' action='matricularse.php'>";
echo "Nombre Curso: <input type ='text' disabled='disabled' size= '17' name='Emp' value='".$row[0]."'/>";
echo "<br>";
echo "NOMBRE    :  <input type ='text' disabled='disabled'  size= '36' name='Nombre' value='". $row[1] ."'/>";
echo "<br>";
echo "<br>";
?>
SEXO: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
<select name='Sexo'>
<option value='Masculino'   <?php if($row[2] == "Masculino") echo "selected";?> >Masculino</option>
<option value='Femenino'  <?php if($row[2] == "Femenino") echo "selected";?>>Femenino</option>
</select>

<?php
echo "<br>";
echo "CORREO ELECTRÓNICO  : <input type ='text' size= '17' pattern='^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$'  name='Email' value='".$row[6]."'/>";
echo "<br>";
echo "RFC :  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type ='text' size= '26' name='Rfc' value='".$row[3]."'/>";
echo "<br>";
?>

ÁREA: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
<select name='Area'> 
<option value='Ciencias Básicas'  <?php if($row[4] == "Ciencias Básicas") echo "selected";?>  >Ciencias Básicas</option>
<option value='Ciencias Eco-Administrativas'  <?php if($row[4] == "Ciencias Eco-Administrativas") echo "selected";?>   >Ciencias Eco-Administrativas</option>
<option value='Sistemas e Informática'  <?php if($row[4] == "Sistemas e Informática") echo "selected";?>  >Sistemas e Informatica</option>
<option value='Metal-Mecánica'  <?php if($row[4] == "Metal-Mecánica") echo "selected";?>  >Metal-Mecánica</option>
<option value='Eléctrica y Electrónica'  <?php if($row[4] == "Eléctrica y Electrónica") echo "selected";?>  >Electrica y Electronica</option>
<option value='Ciencias de la Tierra'  <?php if($row[4] == "Ciencias de la Tierra") echo "selected";?>  >Ciencias de la Tierra</option>
<option value='Industrial'  <?php if($row[4] == "Industrial") echo "selected";?>  >Industrial</option>
</select>


<br>
PUESTO: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
<select name='Puesto'>
<option value='Docente'   <?php if($row[5] == "Docente") echo "selected";?> >Docente</option>
<option value='Jefe de Departamento'  <?php if($row[5] == "Jefe de Departamento") echo "selected";?> >Jefe(a) de Departamento</option>
<option value='Jefe de Oficina'  <?php if($row[5] == "Jefe de Oficina") echo "selected";?> >Jefe(a) de Oficina</option>
<option value='Directivo' <?php if($row[5] == "Directivo") echo "selected";?> >Directivo</option>
<option value='Coordinador de Carrera' <?php if($row[5] == "Coordinador de Carrera") echo "selected";?>>Coordinador(a) de Carrera</option>
<option value='Auxiliar en Laboratorio' <?php if($row[5] == "Auxiliar en Laboratorio") echo "selected";?> >Auxiliar en Laboratorio</option>
</select>
<br>

 
TIPO DE PUESTO:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
<select name='TP'> 
<option value='Base'   <?php if($row[13] == "Base") echo "selected";?> >Base</option>
<option value='Confianza'  <?php if($row[13] == "Confianza") echo "selected";?> >Confianza</option>
</select>
<br>

NIVEL DE PUESTO:   &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
<select name='Tipo' >
<option value='Funcionario' <?php if($row[11] == "Funcionario") echo "selected";?> >Funcionario</option>
<option value='Docente' <?php if($row[11] == "Docente") echo "selected";?> >Docente</option>
</select>
<br>


ESTUDIOS: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
<select name='Estudios' >
<option value='Primaria' <?php if($row[15] == "Primaria") echo "selected";?> >Primaria</option>
<option value='Secundaria' <?php if($row[15] == "Secundaria") echo "selected";?> >Secundaria</option>
<option value='Carrera Técnica' <?php if($row[15] == "Carrera Técnica") echo "selected";?> >Carrera Técnica</option>
<option value='Bachillerato' <?php if($row[15] == "Bachillerato") echo "selected";?> >Bachillerato</option>
<option value='Licenciatura' <?php if($row[15] == "Licenciatura") echo "selected";?> >Licenciatura</option>
<option value='Maestría' <?php if($row[15] == "Maestría") echo "selected";?> >Maestría</option>
<option value='Doctorado' <?php if($row[15] == "Doctorado") echo "selected";?> >Doctorado</option>
</select>
<br>

<?php
echo "CARRERA CURSADA:   &nbsp; &nbsp;<input type ='text'  name='Carrera' value='".$row[16]."'/>";
echo "<br>";
?>


<?php
echo "TELÉFONO:  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type ='text'  name='Telefono' value='".$row[7]."'/>";
echo "<br>";
?>


<?php
echo "<br>";
echo "<br>";
echo "<br>";
echo "<center>";
echo "<input type='submit' name='Submit' value='GUARDAR CAMBIOS' style='BORDER: rgb(210,122,234) 2px solid; BACKGROUND-COLOR: #D149F6; COLOR: #FCFCFD;'>" ; 
echo "</center>";
echo "</form>";


echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
}
?>
<br>

	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>	
	</body>
</html>
