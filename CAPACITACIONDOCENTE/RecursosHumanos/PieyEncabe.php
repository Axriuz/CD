<html>
		
		
		<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];
require ('con.php');

echo "<form action='PieyEncabeFinal.php' method='post' enctype='multipart/form-data'>";
echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43';>";


echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/icono_empleado.png' >";
echo "</td>";
echo "<td>";

echo "<center>";
echo 'SELECCIONE IMAGEN PARA ENCABEZADO EN FORMATO "JPG"';
echo "<br>";
echo "<br>";
echo'<input id="encabezado" type="file" name="encabezado"> ';
echo "<br>";
echo "<br>";
echo 'SELECCIONE IMAGEN PARA PIE EN FORMATO "JPG"';
echo "<br>";
echo "<br>";
echo'<input id="pie" type="file" name="pie">';
echo "<br>";
  
echo "<br>";
echo "<br>";

echo "
<input type='submit' value= 'Modificar' style='BORDER::#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 
echo "</form>";

echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";

?>

<br>
<br>
	<a href="listas.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
	</body>
</html>