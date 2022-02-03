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



echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#D149F6' ;>";
echo "<form action='noti.php' method='post'>";


echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
?>

<h2>  PROGRAMACION DE ACTIVIDADES </h2> 
<br>
<br>
<b>Estructura de Cursos:  <input type="file" name="estructura">
<br>
<br>

Planteamiento de Cursos (Instructores):
<br>

De:  <input type="date" name="fecha1">  &nbsp;&nbsp; &nbsp;&nbsp;   Hasta: <input type="date" name="fecha2">

<br>
<br>
Validacion de Cursos (Jefes de Departamento):
<br>
De: <input type="date" name="fecha3">   &nbsp;&nbsp; &nbsp;&nbsp;   Hasta: <input type="date" name="fecha4">

<br>
<br>
Inscripcion a Cursos:
<br>
De: <input type="date" name="fecha5">    &nbsp;&nbsp; &nbsp;&nbsp;  Hasta: <input type="date" name="fecha6">
<br>
<br>
Inicio de Cursos: <input type="date" name="fecha7"></b>

<br>
<br>
<br>
<br>
</form>
 &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp; <input type="submit" value="ENVIAR NOTIFICACIONES"  style= 'BORDER: rgb(210,122,234) 2px solid; BACKGROUND-COLOR: #D149F6; COLOR: #FCFCFD;'> 

<?php
echo "</td>";
echo "<td>";


$consulta_mysql='select * from maestro where JefeDpto = 1';
$resultado_consulta_mysql=mysql_query($consulta_mysql);
  echo "<center>";
echo "<h2> JEFES DE DEPARTAMENTO</h2>";
echo "<table width='100%' border='1' cellpadding=5 CELLSPACING=5  bordercolor='#D149F6' ;>";
while($fila=mysql_fetch_array($resultado_consulta_mysql)){

echo "<tr>";
echo "<td>";
    echo "Docente:  ".$fila[Nombre]." ";

	echo "</td>";
	echo "<td>";
	echo "Email:  ".$fila[Email]." ";
	echo "</td>";


	}
echo "</table>";
	echo "</center>";




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
