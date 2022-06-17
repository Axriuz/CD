<html>
		 
	<header><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNOLÓGICO DE CD. GUZMÁN
		<hr height: 10px; > 
		</center>
	</header>

<?php
header('Content-Type: text/html; charset=UTF-8');  
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


require('_con.php');

echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#D149F6' ;>";

echo "<form method='post' action='mostrarcursos1.php' >";


echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/A.png' >";
echo "</td>";
echo "<td>";

echo "<center>";

echo "<H2>";
echo "CURSOS A VALIDAR";
echo "</H2>";

  echo "<br>";
echo "CURSO: &nbsp; &nbsp;";
// ORIGINAL // $consulta_mysqli='select * from curso where (SELECT DISTINCT  area  FROM  maestro, curso   WHERE maestro.Emp = curso.Instructor and validado = 0) = (select area from maestro where emp = '.$usuario.' ) and validado = 0';
//$consulta_mysqli='select * from curso where ((select area from maestro where emp = '.$usuario.' ) in (SELECT DISTINCT  area  FROM  maestro, curso   WHERE maestro.Emp = curso.Instructor ))  and validado = 0';
//original antes de Yahve++++++++++
//$consulta_mysqli='select * from curso where (SELECT DISTINCT  area  FROM  maestro, curso   WHERE maestro.Emp = curso.Instructor) = (select area from maestro where emp = '.$usuario.' ) and validado = 0';
//+++++++++++++++++++++++++++++++++
$consulta_mysqli='select * from curso where validado = 0';


//$consulta_mysqli='select * from curso where (SELECT DISTINCT  area  FROM  maestro, curso   WHERE maestro.Emp = curso.Instructor) = (select area from maestro where emp = '.$usuario.' ) and validado = 0';
$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
  
echo "<select name='curso'>";
while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){

  //echo " <option value=".$fila['Nombre'].">".$fila['Nombre']."</option>";
    echo "<option value='".$fila['Nombre']."'>".$fila['Nombre']."</option>";
}
echo "</select>";



echo "<br>";
echo "<br>";
echo "<input type='submit' name='Submit'   value='Mostrar Contenido de Curso' style='BORDER: rgb(210,122,234) 2px solid; BACKGROUND-COLOR: #D149F6; COLOR: #FCFCFD;'>"; 
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
