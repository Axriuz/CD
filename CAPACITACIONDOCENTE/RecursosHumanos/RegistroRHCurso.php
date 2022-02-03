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
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}

require('con.php');

$consulta_mysqli="select * from PersonalRH";
$resultado=mysqli_query($con,$consulta_mysqli);

$consulta_mysql="select * from cursoRH";
$resultadoc=mysqli_query($con,$consulta_mysql);

echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";

echo "<form action='MatricularRH.php' method='post' name= 'f1' id = 'f1'>";
echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/agregarMaestro2.PNG' >";
echo "</td>";
echo "<td>";
echo "<br>";
echo "<br>";
echo "<b>";
echo "</b>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<center>";
echo "<select name='nuevoA' >";
while($fila=mysqli_fetch_array($resultado)){
    echo "<option value='".$fila['Emp']."'>".$fila['Nombre']." ".$fila['ApellidoP']." ".$fila['ApellidoM']."</option>";
}
echo "</select>";
echo "<select name='nuevoC' >";
while($fila=mysqli_fetch_array($resultadoc)){
    echo "<option value='".$fila['Nombre']."'>".$fila['Nombre']."
    </option>";

	echo "</center>";
}
echo "</select>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<center>";
?>
<?php
 

  
  

echo "<input type='submit' name='Submit' value='MATRICULAR' style='BORDER: rgb(165, 39, 63) 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 
echo "</center>";
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
