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
/*$usuario =$_SESSION['usuario'];
$host= "sigacitcg.com.mx";     
	$user = "sigacitc"; 	  			
	$pass= "Itcg11012016_2";
 $conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query($con,"SET NAMES UTF8");
*/

require('con.php');

$consulta_mysqli="select * from NoMaestros where Id =1";
$resultado=mysqli_query($con,$consulta_mysqli);





if($row = mysqli_fetch_row($resultado)) {

echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";

echo "<form action='NoMaestrosFIN.php' method='post' name= 'f1' id = 'f1'>";
echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/agregarMaestro2.PNG' >";
echo "</td>";
echo "<td>";
echo "Número Actual: <input type ='text'  disabled='disabled' name='Contrasena2'  size ='10' value='".$row[1]."'/>";
echo "<br>";
echo "<br>";
echo "<b>";
echo "</b>";
echo "<br>";
echo "<br>";
echo "<br>";

echo "Ingrese el nuevo número de docentes:";
echo "<input type=number name='numero' >";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<center>";
?>
<?php
 

  
  

echo "<input type='submit' name='Submit' value='ACTUALIZAR NÚMERO' style='BORDER: rgb(165, 39, 63) 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 
echo "</center>";
echo "</form>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
}
?>

<br>
<br>
	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
	</body>
</html>
