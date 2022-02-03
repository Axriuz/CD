<html>
		
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<header>
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
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
  header('Location: /index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];

$host='mysql.webcindario.com';
 $user='cursosdesacad';
 $pass='jmrs1905';
 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('cursosdesacad', $conexion);

?>
<html>
<head>
</head>
<body>

<?php


echo "<br>";

echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#D149F6' ;>";
echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/constancia.png' >";
echo "</td>";
echo "<td>";
echo "<CENTER>";
echo "<h2>";

echo "CONSULTA DE ESTATUS DE CONSTANCIAS";

echo "</h2>";







echo "<form method='post' action='constancia.php' >";
$consulta_mysql="SELECT DISTINCT matriculas.curso FROM curso, matriculas WHERE matriculas.Emp = '$usuario' AND curso.Activo = '1'";
$resultado_consulta_mysql=mysql_query($consulta_mysql);
  
echo "<select name='curso'>";
while($fila=mysql_fetch_array($resultado_consulta_mysql)){
	
    echo "<option value='".$fila['curso']."'>".$fila['curso']."</option>";
}
echo "</select>";

echo "<br>";
echo "<br>";
echo "<input type='submit' name='Submit'   value='Verificar Constancia' style='BORDER: rgb(210,122,234) 2px solid; BACKGROUND-COLOR: #D149F6; COLOR: #FCFCFD;'>"; 
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