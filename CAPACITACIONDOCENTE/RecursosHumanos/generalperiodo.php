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


require('con.php');

echo'
<form id="CreateForm" action="generalperiodomodificar.php" method="post style="margin-bottom: 100px;">
</form>

<button type="submit" form="CreateForm" style="BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;">Editar encabezado</button>
';

echo "<form action='reportegeneralcursos2.php' method='post'>";
echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30   bordercolor='#497f43';>";
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
</select>
<br>
<br>
Fecha de elaboración
 <input type='date' name='aprobof' required>
<br>
<br> 
 fecha de aprobación
  <input type='date' name='elaborof' required>
<br>
<br>
";

echo "
<center><br>Quien Elaboró
 <input title='Se necesita un nombre' type='text' name='elaboro'>";
echo "<br><br>Quien Aprobó
<input title='Se necesita un nombre' type='text' name='aprobo'>
<center>";
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
	<a href="cursosselec.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
	</body>
</html>