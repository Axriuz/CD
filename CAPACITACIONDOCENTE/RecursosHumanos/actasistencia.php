<html>
		 
	<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNOLÓGICO DE CD. GUZMÁN
		<hr height: 10px; > 
		</center>
	</header>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];
 $curso = $_POST['curso']; 
 /*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query($con,("SET NAMES UTF8");
*/
require('con.php');
?>
<head>
<title>Actualización de Asistencia</title>
</head>
<body>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
echo "<br>";

echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";
echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/conscursos.png' >";
echo "</td>";
echo "<td>";
//echo "<CENTER>";
echo "<h2>";
echo "Docentes matriculados en el curso $curso";
echo "</h2>";
//echo " <input type ='text'  size= '40'   style='visibility:hidden'  name='c1' value='$curso'>";


$sql="select m.ApellidoP,m.ApellidoM,m.nombre,ALU,AMA,AMI,AJU,AVI,Asistencia from maestro m inner join matriculas a on m.Emp = a.Emp where a.curso = '$curso' order by m.ApellidoP";
$resultado = mysqli_query($con,$sql, $conexion);

$numero_filas = mysqli_num_rows($resultado);
echo "<CENTER>".$numero_filas." Registros\n</CENTER><br>";
echo "<br><CENTER>1- Asistencia				0-Falta</CENTER>";

$numAux=1;
	echo "<form method='post' action='regasistencia.php' >";
	
		echo "  <input type ='text'  size= '50'   style='visibility:hidden'  name='num' value='".$numero_filas."' readonly>";
		echo "  <input type ='text'  size= '50'   style='visibility:hidden'  name='nom' value='".$curso."' readonly>";

echo "<TABLE style='text-align:center;' width='743'  border='0'  CELLPADDING=3 CELLSPACING=0>";
while ($row = mysqli_fetch_row($resultado))
      { 
	echo "<tr>";
	$nombre=trim($row[0])." ".trim($row[1])." ".trim($row[2]);
	echo "<span style='font-size: 12pt; font-weight: bold; color: black; text-align: center;'>";
	echo "  <td align='left'><input type ='text'  size= '50'   style='visibility:visible'  name='d1".$numAux."' value='".$nombre."' 	readonly></td >";
	//
	if($row[8]=='|0|0|0|0|0|')
	{
		echo "<td >Lunes<select name='LU".$numAux."'>
   <option value='0'>0</option> 
   <option selected value='1'>1</option> 
</select></td >
<td >Martes<select name='MA".$numAux."'>
   <option value='0'>0</option> 
   <option selected value='1'>1</option> 
</select></td >
<td >Miercoles<select name='MI".$numAux."'>
   <option value='0'>0</option> 
   <option  selected value='1'>1</option> 
</select></td >
<td >Jueves<select name='JU".$numAux."'>
   <option value='0'>0</option> 
   <option selected value='1'>1</option> 
</select></td >
<td >Viernes<select name='VI".$numAux."'>
   <option value='0'>0</option> 
   <option selected value='1'>1</option> 
</select></td ";
	}
	
	else
	{
	
	if($row[3]=='0')
	{
 echo"<td >Lunes<select name='LU".$numAux."'>
   <option selected value='0'>0</option> 
   <option value='1'>1</option> 
</select></td >";
	}
	if($row[3]=='1')
	{
		 echo"<td >Lunes<select name='LU".$numAux."'>
   <option value='0'>0</option> 
   <option selected value='1'>1</option> 
</select></td >";
	}
	
	if($row[4]=='0')
	{
echo"<td >Martes<select name='MA".$numAux."'>
   <option selected value='0'>0</option> 
   <option value='1'>1</option> 
</select></td >";
	}
	if($row[4]=='1')
	{
echo"<td >Martes<select name='MA".$numAux."'>
   <option value='0'>0</option> 
   <option selected value='1'>1</option> 
</select></td >";
	}
	
	if($row[5]=='0')
	{
			echo"<td >Miercoles<select name='MI".$numAux."'>
   <option selected value='0'>0</option> 
   <option value='1'>1</option> 
</select></td >";
	}
	if($row[5]=='1')
	{
			echo"<td >Miercoles<select name='MI".$numAux."'>
   <option value='0'>0</option> 
   <option  selected value='1'>1</option> 
</select></td >";
	}
	
	if($row[6]=='0')
	{
			echo"<td >Jueves<select name='JU".$numAux."'>
   <option selected value='0'>0</option> 
   <option value='1'>1</option> 
</select></td >";
	}
	if($row[6]=='1')
	{
			echo"<td >Jueves<select name='JU".$numAux."'>
   <option value='0'>0</option> 
   <option selected value='1'>1</option> 
</select></td >";
	}
	//
	if($row[7]=='0')
	{
		echo"<td >Viernes<select name='VI".$numAux."'>
   <option selected value='0'>0</option> 
   <option value='1'>1</option> 
</select></td >";
	}
	if($row[7]=='1')
	{
		echo"<td >Viernes<select name='VI".$numAux."'>
   <option value='0'>0</option> 
   <option selected value='1'>1</option> 
</select></td >";
	}
	
	}
	
	//
	
	//
		
	//
	
	
	
	//echo" <td >Lunes<input type='text'  size= '1' name='LU".$numAux."'  value='0' style='BORDER: rgb(0,43,200) 2px solid; BACKGROUND-COLOR: 	#FFFFFF; COLOR: #000000  ;'></td >";
	//echo" <td >Martes<input type='text'  size= '1' name='MA".$numAux."'  value='0' style='BORDER: rgb(0,43,200) 2px solid; BACKGROUND-COLOR:#FFFFFF; COLOR: #000000  ;'></td >";
	//echo" <td >Miercoles<input type='text'  size= '1' name='MI".$numAux."'  value='0' style='BORDER: rgb(0,43,200) 2px solid; BACKGROUND-COLOR:#FFFFFF; COLOR: #000000  ;'></td >";
	//echo" <td >Jueves<input type='text'  size= '1' name='JU".$numAux."'  value='0' style='BORDER: rgb(0,43,200) 2px solid; BACKGROUND-COLOR:#FFFFFF; COLOR: #000000  ;'></td >";
	//echo" <td >Viernes<input type='text'  size= '1' name='VI".$numAux."'  value='0' style='BORDER: rgb(0,43,200) 2px solid; BACKGROUND-COLOR:#FFFFFF; COLOR: #000000  ;'> </td >";
	echo "</tr>";
	echo "</span>";
	$numAux=$numAux+1;
	   } 

echo "</TABLE>";
echo "<CENTER>";
echo "<br>";
echo "<br>";
echo "<input type='submit' name='Submit'   value='Actualizar' style='BORDER::#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 

echo "</form>";
echo "</CENTER>";
echo "</td>";
echo "</tr>";
echo "</table>";

?>


<br>
<br>
	<a href="asistencia1.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>

</body>
</html>