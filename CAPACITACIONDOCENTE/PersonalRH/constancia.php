<html>
		
	<header><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNOLÓGICO DE CD. GUZMÁN
		<hr height: 10px; > 
		</center>
	</header>
<body>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
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

$cursoseleccionado = $_POST["curso"];



$consulta_mysqli="select constacia from matriculas where Emp = '$usuario' and Activo = '1' and Curso ='$cursoseleccionado'";
$resultado=mysqli_query($con,$consulta_mysqli);

if($row = mysqli_fetch_row($resultado)) {

	echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43';>";


echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/constancia.png' >";

echo "</td>";
echo "<td>";

echo "<center>";
echo "<form method='post' action='RegistroDeModificacion.php'>";
echo "ESTADO DE LA CONSTANCIA DEL CURSO ' $cursoseleccionado ' &nbsp;&nbsp; ";  
echo "<br>";
echo "<br>";
echo " <input type ='text' disabled='disabled' size= '25' name='Emp' value='".$row[0]."'/>";
echo "</center>";

echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
}
?>
<br>

	<a href="constancia1.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>	
	</body>
</html>
