<html>
		 <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<header>
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNOLÓGICO DE CD. GUZMÁN
		<hr height: 10px; > 
		</center>
	</header>

<?php

header('Content-Type: text/html; charset=UTF-8');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: /index.html'); 
  exit();
}

$usuario =$_SESSION['usuario'];
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $conexion);
mysql_query("SET NAMES UTF8");

echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#D149F6' ;>";
echo"<h1><center>PLANTILLAS DE FORMATOS</center> </h1>";
echo "<form action='RegistroCambioJefe.php' method='post'>";
echo "<tr>";

echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/formatos1.png'  width='115' height='115'>";
echo"<br>";
echo"<h3><center>Cedula Inscripción</center> </h3>";
echo "</td>";


echo "<td>";
echo"<h3><center>Plantilla de Cedula de Inscripción</h3></center>";
echo"<br>";

echo"<h3><center><input type='file' name='material' size='15'> </center> ";



echo "</td>";

echo "</tr>";
echo "<tr>";

echo "<td>";

echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/formatos1.png'  width='115' height='115'>";
echo"<br>";
echo"<h3><center>Formato de Evaluación Docente</center> </h3>";


echo "</td>";

echo "<td>";
echo"<h3><center>Plantilla de Formato de Evaluación Docente</center> </h3>";
echo"<br>";
echo "<center><input type='file' name='material' size='15'></center>";

echo "</td>";
echo "</tr>";


echo "<tr>";

echo "<td>";

echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/formatos1.png'  width='115' height='115'>";
echo"<br>";
echo"<h3><center>Formato de Aceptación de Instructores</center> </h3>";


echo "</td>";

echo "<td>";
echo"<h3><center>Plantilla de Aceptación de Instructores</center> </h3>";
echo"<br>";
echo "<center><input type='file' name='material' size='15'></center>";

echo "</td>";
echo "</tr>";




echo "</table>";
echo "</div>";

?>

<br>
	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
	</body>
</html>
