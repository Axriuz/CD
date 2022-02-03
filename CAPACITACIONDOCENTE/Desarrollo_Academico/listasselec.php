<html>
		
		
		<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	

<?php
//header('Content-Type: text/html; charset=UTF-8');  
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



echo "<form action='#' method='post'>";
echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#0037FF';>";




echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/icono_empleado.png' >";
echo "</td>";
echo "<td>";

echo "<center>";
echo "<h2>";
echo "SELECCIONE CRITERIO";
echo "</h2>";

echo "<br>";
//echo "<input type ='submit' formaction='reportegeneralcursos.php' value= 'Generar Lista por periodo'  style='BORDER::rgb(0,43,200) 2px solid; BACKGROUND-COLOR: #0037FF; COLOR: #FCFCFD;'>"; 

echo "<input type ='submit' formaction='generalperiodo.php' value= 'Generar Lista por periodo'  style='BORDER::rgb(0,43,200) 2px solid; BACKGROUND-COLOR: #0037FF; COLOR: #FCFCFD;'>"; 

echo "
<input type='submit' formaction='generalanio.php' value= 'Generar Lista por año' style='BORDER::rgb(0,43,200) 2px solid; BACKGROUND-COLOR: #0037FF; COLOR: #FCFCFD;'>"; 
echo "</form>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";

?>

<br>
<br>
	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
	</body>
</html>