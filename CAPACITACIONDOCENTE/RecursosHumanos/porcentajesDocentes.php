rh<html>
		
		
		<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
//header('Content-Type: text/html; charset=UTF-8');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];

/*$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysqli_connect($con,$host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query($con,"SET NAMES UTF8");

*/
require('con.php');

echo "<form action='RELACIONDOCENTES.php' method='post'>";
echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43';>";




echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/icono_empleado.png' >";
echo "</td>";
echo "<td>";

echo "<center>";
echo "<h2>";
echo "SELECCIONE EL CRITERIO";
echo "</h2>";
echo "<br>";


$consulta_mysqli='SELECT MAX(Year(CursoInicio)) from cursoRH';
$consulta_mysqli1='SELECT MIN(Year(CursoInicio)) from cursoRH';

$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
$resultado_consulta_mysqli1=mysqli_query($con,$consulta_mysqli1);
$MAX=0;
$MINN=0;

while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
  
   $MAX=$fila[0];
}
while($fila1=mysqli_fetch_array($resultado_consulta_mysqli1)){
  
   $MINN=$fila1[0];
}

echo 'Año
<select name="a">';
for ($inicio=$MINN;$inicio<=$MAX; $inicio ++)
{
echo'
  <option value="'.$inicio.'">'.$inicio.'</option>';
}
  echo '
</select><br><br>
';

echo"
Periodo
    
<select name='periodo'  required>
<option value='Enero - Mayo'    >Enero - Mayo</option>
<option value='Junio - Agosto'  >Junio - Agosto</option>
<option value='Septiembre - Diciembre' >Septiembre - Diciembre</option>
<option value='Todo el año' >Todo el año</option>
</select>
";




echo "<br><br>
<input type='submit' formaction='RELACIONDOCENTES.php' value= 'Generar reporte' style='BORDER::#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 
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