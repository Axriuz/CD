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
//header('Content-Type: text/html; charset=UTF-8');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];

require('con.php');


echo "<form action='dosArea.php' method='post'>";
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
echo "RELACIÓN DE CURSOS POR PERIODO POR DEPARTAMENTOS";
echo "</h2>";
echo "<h2>";
echo "SELECCIONE EL DEPARTAMENTO PARA GENERAR LISTA";
echo "</h2>";

echo "<br>";
  



$consulta_mysqli='select distinct Area from PersonalRH where Area!="NULL" and Area!=""';
$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
  
echo "<select name='cursos'>";
while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
  
    echo " <option value='".$fila['Area']."'>".$fila['Area']."</option>";
}
echo "</select>";

echo "<br>";
echo "<br>";
echo "<input type ='submit' formaction='periodocursosareas.php' value= 'Generar Lista por periodo'  style='BORDER::#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 

echo "
<input type='submit' formaction='periodocursosareasanio.php' value= 'Generar Lista por año' style='BORDER::#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 
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