<html>
		
		
		<header><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	

<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
header('Content-Type: text/html; charset=UTF-8');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];
$a=$_POST['a'];
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 


$con=mysqli_connect("$host","$user","$pass",'sigacitc_cursosdesacadCP');
if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 exit;
}

$bd_seleccionada = mysqli_select_db($con,'sigacitc_cursosdesacadCP');
mysqli_query($con,"SET NAMES UTF8");

echo "<form action='INSTRUC.php' method='get'>";
//echo "<form action='popo.php' method='get'>";

//echo "<form action='unoPDF.php' method='get'>";

//echo "<form action='docentespdf2asistencia.php' method='get'>";
echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";




echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/icono_empleado.png' >";
echo "</td>";
echo "<td>";

echo "<center>";
echo "<h2>";
echo "SELECCIONE EL CURSO DEL QUE SE GENERARÁ LA LISTA";
echo "</h2>";

echo "<br>";
  
$resultado_consulta_mysql=mysqli_query($con,"select Nombre from curso where year(CursoInicio)= '$a'");


echo "<select name='cursos'>";
while($fila=mysqli_fetch_array($resultado_consulta_mysql)){
    echo " <option value='".mb_strtoupper($fila['Nombre'],'UTF-8')."'>".mb_strtoupper($fila['Nombre'],'UTF-8')."</option>";
}


echo "</select>";
echo '<br>';
echo '<br>';
echo '<input type ="submit" value= "Generar Lista"  style="BORDER: #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;" />';
echo "</form>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";

?>

<br>
<br>
	<a href="listas.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
	</body>
</html>