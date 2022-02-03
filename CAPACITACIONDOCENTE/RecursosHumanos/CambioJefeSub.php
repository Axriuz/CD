<html>
		 
	<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNOLÓGICO DE CD. GUZMÁN
		<hr height: 10px; > 
		</center>
	</header>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
header('Content-Type: text/html; charset=UTF-8');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: /index.html'); 
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
require('con.php');

echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";
echo "<form action='CambioJefeS.php' method='post'>";



echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/icono_empleado.png'  width='115' height='115'>";
echo "</td>";
echo "<td>";


echo "<center>";
echo "<strong>";
echo "SUBDIRECTOR ACADEMICO";
echo "</strong>";
echo"<br>";
echo"<br>";
echo "<strong>";
echo "Subdirector Academico Actual:";
echo "</strong>";
echo"<br>";
$consulta_mysqli='select * from maestro where JefeDpto = 2';
$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
  
echo "<select name='anteriorD'>";
while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
    echo " <option value='".$fila['Nombre']."'>".$fila['Nombre']." ".$fila['ApellidoP']." ".$fila['ApellidoM']."</option>";
}
echo "</select>";
echo"<br>";
echo"<br>";
echo "<strong>";
echo "Seleccione el Nuevo Subdirector Academico:";
echo "</strong>";
echo"<br>";
$consulta_mysqli="select * from maestro where JefeDpto != 4 and JefeDpto != 3 and  JefeDpto != 2 and  JefeDpto != 1 AND nombre !=  'DESARROLLO_ACADEMICO' and Nombre != ' '  order by Nombre ";
$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
  
echo "<select name='nuevoD' >";
while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
    echo "<option value='".$fila['Nombre']."'>".$fila['Nombre']." ".$fila['ApellidoP']." ".$fila['ApellidoM']."</option>";

	echo "</center>";
}
echo "</select>";

echo"<br>";
echo"<br>";
echo "<input type ='submit' value= 'Actualizar' style='BORDER: #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 
echo "</form>";
echo "</td>";
echo "</tr>";










echo "</table>";
echo "</div>";

?>

<br>

	<a href="CambioJefe.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
	</body>
</html>
