<html>
		 
	<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNOLÓGICO DE CD. GUZMÁN
		<hr height: 10px; > 
		</center>
	</header>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: /index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];

require('con.php');
  $curso = $_POST['Emp']; 
   $curso1 = $_POST['OPCIONESCONSTANCIA']; 
   $cursoUNO = $_POST['cursoA']; 

?>
<head>
<title>Consulta Actuales</title>
</head>
<body>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
echo "<br>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30   bordercolor='#497f43'  ;>";
echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/conscursos.png' >";
echo "</td>";
echo "<td>";
echo "<CENTER>";
echo "<h2>";

echo "ACTUALIZADO";
echo "</h2>";
$fecha_actual = localtime(time(), 1);
$anyo_actual  = $fecha_actual["tm_year"] + 1900;
$mes_actual   = $fecha_actual["tm_mon"] + 1;
$dia_actual   = $fecha_actual["tm_mday"]-1;
echo " Fecha última de actualización   <input type ='text'  size= '20' name='fecha' value='$dia_actual/$mes_actual/$anyo_actual' readonly>";
echo"<br><br><br>";
$sqlup="UPDATE matriculasRH SET Constacia='$curso1',fechaM='$anyo_actual/$mes_actual/$dia_actual' WHERE Emp='$curso' and Curso='$cursoUNO'";
//echo "".$sqlup;
$successful = mysqli_query($con,$sqlup);
//mysqli_query($con,$sqla);
if ($successful) {
   // echo 'Affected rows: ' . mysqli_affected_rows();
    if (mysqli_affected_rows()==0) {
    // echo 'Error, compruebe que el docente este en el curso indicado' ;
	    echo 'Se actualizó correctamente ';
} else {
   
    echo 'Se actualizó correctamente ';
}
} else {
    echo 'Fail: ' . mysqli_error();
}
    echo ' Oprima Menú para regresar';
echo "<br>";
echo "<br>";
echo "</form>";
echo "</CENTER>";
echo "</td>";
echo "</tr>";
echo "</table>";
?>
<br>
<br>
	<a href="actcontancias.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
</body>
</html>