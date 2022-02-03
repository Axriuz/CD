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
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43'  ;>";
echo "<form action='CambioJefeD.php' method='post'>";



echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/director.png'  width='115' height='115'>";
echo "</td>";
echo "<td>";
echo "<center>";
echo "<strong>";
echo "DIRECTOR";
echo "</strong>";
echo"<br>";
echo"<br>";
echo "<strong>";
echo "Director Actual:";
echo "</strong>";
echo"<br>";
$consulta_mysql='select * from maestro where JefeDpto = 3';
$resultado_consulta_mysql=mysql_query($consulta_mysql);
  
echo "<select name='anteriorD'>";
while($fila=mysql_fetch_array($resultado_consulta_mysql)){

    echo " <option value='".$fila['Nombre']."'>".$fila['Nombre']." ".$fila['ApellidoP']." ".$fila['ApellidoM']."</option>";
 
}
echo "</select>";
echo"<br>";
echo"<br>";
echo "<strong>";
echo "Seleccione el Nuevo Director:";
echo "</strong>";
echo"<br>";
$consulta_mysql="select * from maestro where  JefeDpto != 4 and JefeDpto != 3 and  JefeDpto != 2 and  JefeDpto != 1 AND nombre !=  'DESARROLLO_ACADEMICO' and Nombre != ' '   order by `Nombre`";
$resultado_consulta_mysql=mysql_query($consulta_mysql);
  
echo "<select name='nuevoD' >";
while($fila=mysql_fetch_array($resultado_consulta_mysql)){
	
    echo "<option value='".$fila['Nombre']."'>".$fila['Nombre']." ".$fila['ApellidoP']." ".$fila['ApellidoM']."</option>";

	echo "</center>";
}
echo "</select>";

echo"<br>";
echo"<br>";
echo "<input type ='submit' value= 'Actualizar' style='BORDER: #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 
echo "</form>";
echo "</td>";
echo "</tr>";










echo "</table>";
echo "</div>";

?>

<br>

	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
	</body>
</html>
