<html>
		
		
	<header><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
		<center>Tecnol��gico Nacional de M��xico
		<br>
		INSTITUTO TECN�0�7LOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	
	<body>
		<article>

<BR>
	<BR>
<?php

session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];
/*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query($con,"SET NAMES UTF8");
*/

require('con.php');
?>
<html>
<head>
</head>
<body>

<?php


echo "<br>";

echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";
echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/c.png' >";
echo "</td>";
echo "<td>";
echo "<CENTER>";
echo "<h2>";

echo "ENCUESTA DE EVALUACI�0�7N DE CURSOS";

echo "</h2>";







echo "<form method='post' action='encuesta2.php' >";
echo " <input type='hidden' name='ID' value='".$usuario."'>";



$consulta_mysqli="SELECT DISTINCT matriculas.curso FROM curso, matriculas WHERE matriculas.Emp = '$usuario' AND curso.Activo = '1' and Eval=0";
$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
  
echo "<select name='curso'>";
while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
	
    echo "<option value='".$fila['curso']."'>".$fila['curso']."</option>";
}
echo "<option value = 'SOFTWARE LIBRE'> </option>";
echo "</select>";

echo "<br>";
echo "<br>";
echo "<input type='submit' name='Submit'   value='Realizar Encuesta' style='BORDER: #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 
echo "</form>";
echo "</CENTER>";
echo "</td>";
echo "</tr>";
echo "</table>";

?>
<br>
<br>
	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>



</body>
</html>