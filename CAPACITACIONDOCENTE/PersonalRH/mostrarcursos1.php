<html>
		
	<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNOLÓGICO DE CD. GUZMÁN
		<hr height: 10px; > 
		</center>
	</header>
<body>

<?
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
 $c = $_POST['curso'];
  
//antes de Yahve
$consulta_mysqli="select * from curso where Nombre = '$c'";
//++++++++++++++++++++++++++++++
//$consulta_mysqli="select * from curso where Nombre=c";

//$consulta_mysqli="Select * from curso where Nombre='.$c.'";
echo ".$c.";
$resultado=mysqli_query($con,$consulta_mysqli);


if($row = mysqli_fetch_row($resultado)) 
{

	echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#D149F6' ;>";


echo "<tr>";
echo "<td>";
echo "<center>";
echo "<h3>";
echo "DATOS DEL CURSO '$c' ";
echo "</h3>";
echo "</center>";
echo "<br>";

echo "<form method='post' action='Registravalidacion.php'>";

echo "<center>";
echo " <input type ='text'  size= '40'   style='visibility:hidden'  name='NC' value='$c'>";
echo "<br>";

echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo "INSTRUCTOR : <input type ='text' disabled='disabled' size= '40' name='Emp' value='".$row[27]."'/>";
echo "<br>";
echo "<br>";
echo "PERIODO:  <input type ='text' disabled='disabled'  size= '25' value='". $row[1] ."'/>";
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo "HORARIO:  <input type ='text' disabled='disabled'  size= '25'  value='".$row[5]. ' -a- ' .$row[6]."'/>";
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo "DURACION:  <input type ='text' disabled='disabled'  size= '25'  value='". $row[2] ."'/>";
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo "SEDE:  <input type ='text' disabled='disabled'  size= '25'  value='". $row[7] ."'/>";
echo "</center>";

echo "<br>";
echo "<br>";
echo "<center>";

echo "OBJETIVO:  <input type ='text' style='visibility:hidden' disabled='disabled'  size= '1'  value='". $row[8] ."'/>";
echo "<br>";
echo"<textarea name='message' disabled='disabled' cols='115' rows='7'>". $row[8] ."</textarea>";
echo "<br>";
echo "<br>";
echo "INTRODUCCI�N:  <input type ='text' style='visibility:hidden' disabled='disabled'  size= '1'  value='". $row[14] ."'/>";
echo "<br>";
echo"<textarea name='message' disabled='disabled' cols='115' rows='7'>". $row[14] ."</textarea>";
echo "<br>";
echo "<br>";
echo "JUSTIFICACI�N:  <input type ='text' style='visibility:hidden' disabled='disabled' size= '1'  value='". $row[15] ."'/>";
echo "<br>";
echo"<textarea name='message' disabled='disabled' cols='115' rows='7'>". $row[15] ."</textarea>";
echo "<br>";
echo "<br>";
echo "DESCRIPCI�N:  <input type ='text' style='visibility:hidden' disabled='disabled' size= '1'  value='". $row[16] ."'/>";
echo "<br>";
echo"<textarea name='message' disabled='disabled' cols='115' rows='7'>". $row[16] ."</textarea>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<center>";
echo "<input type='Submit' value='VALIDAR' style='BORDER: rgb(210,122,234) 2px solid; BACKGROUND-COLOR: #D149F6; COLOR: #FCFCFD;'>";
echo "</center>";
}
 echo "</form> ";
   
  echo " </td>";
echo "</tr>";
echo "</table>";
echo "<br>";
echo "</div>";
?>

<br>
	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>	
	</body>
</html>