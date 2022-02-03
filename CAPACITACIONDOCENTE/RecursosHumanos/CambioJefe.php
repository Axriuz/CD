<html>
		 
	<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNOLÓGICO DE CD.GUZMÁN
		<hr height: 10px; > 
		</center>
	</header>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
header('Content-Type: text/html; charset=UTF-8');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}

$usuario =$_SESSION['usuario'];

echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";
echo "<form action='RegistroCambioJefe.php' method='post'>";
echo "<tr>";

echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<a href='CambioJefeDirect.php'><IMG SRC='../Img/director.png'  width='115' height='115'>	 </a>";
echo"<br>";
echo"<h3><center>Director(a)</center> </h3>";
echo "</td>";


echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<a href='CambioJefeSub.php'><IMG SRC='../Img/icono_empleado.png'  width='115' height='115'>	 </a>";
echo"<br>";
echo"<h3><center>Subdirector(a) Académico</center> </h3>";
echo "</td>";


echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<a href='CambioJefeDesAcad.php'><IMG SRC='../Img/desarrollo_academico.png'  width='115' height='115'>	 </a>";
echo"<br>";
echo"<h3><center>Jefe(a) de Departamento Desarrollo Académico</center> </h3>";
echo "</td>";


echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<a href='CambioJefeJDpto.php'><IMG SRC='../Img/docentes.png'  width='115' height='115'>	 </a>";
echo"<br>";
echo"<h3><center>Jefe(a) de Departamento por Área</center> </h3>";
echo "</td>";


echo "</tr>";
echo "</table>";
echo "</div>";

?>

<br>
	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
	</body>
</html>
