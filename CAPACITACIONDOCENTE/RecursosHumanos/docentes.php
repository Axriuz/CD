<html>
		 <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<header>
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
  header('Location: /index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];

$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $conexion);
mysql_query("SET NAMES UTF8");

$Cursos = $_POST["cursos"]; 


echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#D149F6' ;>";
echo "<form action='Registravalidacion.php' method='post'>";



echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/icono_empleado.png' >";
echo "</td>";
echo "<td>";
echo "<form method='post' action='Registravalidacion.php'>";

echo "<center>";
echo "Validar Curso";


  



$consulta_mysql='select * from curso where (SELECT DISTINCT  area  FROM  maestro, curso   WHERE maestro.Emp = curso.Instructor) = (select area from maestro where emp = '.$usuario.' ) and validado = 0';
$resultado_consulta_mysql=mysql_query($consulta_mysql);
  
echo "<select name='anterior'>";
while($fila=mysql_fetch_array($resultado_consulta_mysql)){
  
    echo " <option value='".$fila['Nombre']."'>".$fila['Nombre']."</option>";
}
echo "</select>";




echo "<input type ='submit' value= 'Actualizar' />";
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
