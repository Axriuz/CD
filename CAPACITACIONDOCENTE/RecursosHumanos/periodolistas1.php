<html>
		
		
		<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	

<?php
error_reporting(0);
//header('Content-Type: text/html; charset=UTF-8');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];

$cursos=$_POST['cursos'];

require('con.php');

echo "<form action='listadocentes1.php' method='post'>";
echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30   bordercolor='#497f43'  ;>";




echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/icono_empleado.png' >";
echo "</td>";
echo "<td>";

echo "<center>";
echo "<h2>";
echo "POR PERIODO";
echo "</h2>";
echo "<br>";

$year=date("Y");  



$consulta_mysql='SELECT MAX(Year(CursoInicio)) from curso';
$consulta_mysql1='SELECT MIN(Year(CursoInicio)) from curso';

$resultado_consulta_mysql=mysqli_query($con,$consulta_mysql);
$resultado_consulta_mysql1=mysqli_query($con,$consulta_mysql1);
$MAX=0;
$MINN=0;

while($fila=mysqli_fetch_array($resultado_consulta_mysql)){
  
   $MAX=$fila[0];
}
while($fila1=mysqli_fetch_array($resultado_consulta_mysql1)){
  
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
</select>
<br>
<br>

";

echo "<br>";
echo "<input type ='submit' value= 'Generar Lista'  style='BORDER::#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 
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