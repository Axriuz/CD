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

echo "<form action='docentesxperiodo.php' method='post'>";
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
echo "SELECCIONE EL ÁREA DEL QUE SE GENERARA LA LISTA";

echo "<br><br>";echo "";

echo "</h2>";

echo "<br>";
  



$consulta_mysqli='select distinct Area from PersonalRH where area is not null and Area!=""';
$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
  
echo "<select name='cursos'>";
while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
  
    echo " <option value='".$fila['Area']."'>".$fila['Area']."</option>";
}
echo "</select>";



echo "<br>";
echo "<br>";
echo "<input type ='submit' formaction='docentesxperiodo.php' value= 'Generar Lista por periodo'  style='BORDER::#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 

echo "
<input type='submit' formaction='docentesxareaanio.php' value= 'Generar Lista por año' style='BORDER::#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 
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