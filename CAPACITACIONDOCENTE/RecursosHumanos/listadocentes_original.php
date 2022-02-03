<html>
		
		<!--<meta charset="UTF-8">-->
		<meta charset="UTF-8">
		<header>
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	

<?php
//header('Content-Type: text/html; charset=UTF-8');  
session_start();

$anio=$_REQUEST['a'];
$periodo=$_REQUEST['periodo'];

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


echo "<form action='docentespdf.php' method='post'>";
echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30 bordercolor='#0037FF'  ;>";

echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/icono_empleado.png' >";
echo "</td>";
echo "<td>";

echo "<center>";
echo "<h2>";
echo "SELECCIONE EL CURSO DEL QUE SE GENERARA LA LISTA";
echo "</h2>";

echo "<br>";
  



$consulta_mysql='select distinct * from curso where Activo = 1 and YEAR(CursoInicio)="'.$anio.'"and Periodo="'.$periodo.'"';
//echo "".$consulta_mysql;
$resultado_consulta_mysql=mysql_query($consulta_mysql);
  
echo "<select name='cursos'>";
while($fila=mysql_fetch_array($resultado_consulta_mysql)){
  
    echo " <option value='".$fila['Nombre']."'>".$fila['Nombre']."</option>";
}
echo "</select>";
echo "<br>";
echo "<br>";
echo "<input type ='submit' value= 'Generar Lista'  style='BORDER::rgb(0,43,200) 2px solid; BACKGROUND-COLOR: #0037FF; COLOR: #FCFCFD;'>"; 

 echo ' <input type="hidden" name="consulta" value="'.$consulta_mysql.'">';
  echo ' <input type="hidden" name="anio" value="'.$anio.'">';
   echo ' <input type="hidden" name="periodo" value="'.$periodo.'">';


echo "<input type ='submit' value= 'Generar Todas las listas' formaction='todosdocentespdf.php' style='BORDER::rgb(0,43,200) 2px solid; BACKGROUND-COLOR: #0037FF; COLOR: #FCFCFD;'>"; 
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