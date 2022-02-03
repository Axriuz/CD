

<html>
		
		<!---->
		
		<header><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	

<?php
error_reporting(0);
header('Content-Type: text/html; charset=UTF-8');  
session_start();

$anio=$_REQUEST['a'];
$periodo=$_REQUEST['periodo'];

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
mysqli_query($con,$con,"SET NAMES UTF8");
*/

require('con.php');

echo "<form action='S2.php' method='post'>";
echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30 bordercolor='#497f43'  ;>";

echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/icono_empleado.png' >";
echo "</td>";
echo "<td>";

echo "<center>";
echo "<h2>";
echo "SELECCIONE EL CURSO DEL QUE SE GENERARA LA LISTA";
echo "</h2>";

echo "<br>";
  



$consulta_mysqli='select distinct * from curso where Activo = 1 and YEAR(CursoInicio)="'.$anio.'"and Periodo="'.$periodo.'"';
//echo "".$consulta_mysqli;
$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
  
echo "<select name='cursos'>";
while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
  
    echo " <option value='".$fila['Nombre']."'>".$fila['Nombre']."</option>";
}
echo "</select>";
echo "<br>";
echo "<br>";
echo "<input type ='submit' value= 'Generar Lista'  style='BORDER::#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 
echo "<input type ='submit' value= 'Generar Lista Excel' formaction='Excel4.php' style='BORDER::#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 

 echo ' <input type="hidden" name="consulta" value="'.$consulta_mysqli.'">';
  echo ' <input type="hidden" name="anio" value="'.$anio.'">';
   echo ' <input type="hidden" name="periodo" value="'.$periodo.'">';

echo "<input type ='submit' value= 'Generar Todas las listas' formaction='S2todos.php' style='BORDER::#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 
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
