<html>
		 
	<header><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
		<center>Tecnol��gico Nacional de M��xico
		<br>
		INSTITUTO TECNOL�0�7GICO DE CD.GUZM�0�9N
		<hr height: 10px; > 
		</center>
	</header>

<?php

header('Content-Type: text/html; charset=UTF-8');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
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
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";
echo "<form action='RegistroCambioJefe.php' method='post'>";
echo "<tr>";

echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<a href='CambioJefeDirect.php'><IMG SRC='../Img/director.png'  width='115' height='115'>	 </a>";
echo"<br>";
echo"<h3><center>Director</center> </h3>";
echo "</td>";


echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<a href='CambioJefeSub.php'><IMG SRC='../Img/icono_empleado.png'  width='115' height='115'>	 </a>";
echo"<br>";
echo"<h3><center>Subdierector Acad��mico</center> </h3>";
echo "</td>";


echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<a href='CambioJefeDesAcad.php'><IMG SRC='../Img/desarrollo_academico.png'  width='115' height='115'>	 </a>";
echo"<br>";
echo"<h3><center>Jefe de Departamento Desarrollo Acad��mico</center> </h3>";
echo "</td>";


echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<a href='CambioJefeJDpto.php'><IMG SRC='../Img/docentes.png'  width='115' height='115'>	 </a>";
echo"<br>";
echo"<h3><center>Jefe de Departamento por �0�9rea</center> </h3>";
echo "</td>";


echo "</tr>";
echo "</table>";
echo "</div>";


?>

<br>
	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
	</body>
</html>
