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
?>
<html>
<head>
<title>Consulta de Cursos</title>
</head>
<body>

<?php




echo "<br>";

echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#D149F6' ;>";
echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/conscursos.png' >";
echo "</td>";
echo "<td>";
echo "<CENTER>";
echo "<h2>";

echo "CURSOS AUTORIZADOS";

echo "</h2>";

echo "<form method='post' action='mostrarcursos.php' >";
$consulta_mysql='select * from curso where validado = 1';
$resultado_consulta_mysql=mysql_query($consulta_mysql);
  
echo "<select name='curso'>";
while($fila=mysql_fetch_array($resultado_consulta_mysql)){
	
    echo "<option value='".$fila['Nombre']."'>".$fila['Nombre']."</option>";
}
echo "</select>";  


echo "<br>";
echo "<br>";
echo "<input type='submit' name='Submit'   value='Mostrar Contenido de '".$fila['Nombre']."'' style='BORDER: rgb(210,122,234) 2px solid; BACKGROUND-COLOR: #D149F6; COLOR: #FCFCFD;'>"; 

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