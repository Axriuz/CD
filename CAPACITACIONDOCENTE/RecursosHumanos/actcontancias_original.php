<html>
		
    	
		<header><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
		<center>Tecnol��gico Nacional de M��xico
		<br>
		INSTITUTO TECN�0�7LOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
<?php

session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
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
<title>Consulta Actuales</title>
</head>
<body>

<?php
echo "<br>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";
echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/conscursos.png' >";
echo "</td>";
echo "<td>";
echo "<CENTER>";
echo "<h2>";

echo "CURSOS ACTUALES";

echo "</h2>";

echo "<form method='post' action='UNO.php' >";


$consulta_mysql='Select Nombre from curso where validado=1 and activo=1';
$resultado_consulta_mysql=mysql_query($consulta_mysql);
echo "<select name='curso'>";
while($fila=mysql_fetch_array($resultado_consulta_mysql)){
	
    echo "<option value='".$fila['Nombre']."'>".$fila['Nombre']."</option>";
         
        ///
        
        ///
    
}
echo "</select>";  
///
       








echo "<br>";
echo "<br>";
echo "<input type='submit' name='Submit'   value='Actualizar Constancias' style='BORDER: #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 

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