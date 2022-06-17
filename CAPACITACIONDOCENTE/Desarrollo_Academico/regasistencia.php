<html>
<body> 
 

   
  <br>

<?php 
error_reporting(0);
header("Content-Type: text/html;charset=utf-8");
session_start();
if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
/*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query($con,("SET NAMES UTF8");
*/
require('_con.php');

$usuario =$_SESSION['usuario'];
$curso = $_POST['nom']; 
$num=$_POST["num"];


//echo "".$curso;
$UNO=0;

echo "<table>";
    foreach ($_POST as $key => $value) 
	{
		$UNO=1;
		$a[]=$key;
        echo "<tr>";
        echo "<td>";
      //  echo $key;
        echo "</td>";
        echo "<td>";
       // echo $value;
	   $b[]=$value;
        echo "</td>";
        echo "</tr>";
		//}
		
    }
	$LUNES=3;
	$MARTES=4;
	$MIERCOLES=5;
	$JUEVES=6;
	$VIERNES=7;
	
	$NOMBRE=2;
	$ban=TRUE;
	for($num=0;$num<$b[0];$num ++)
    {
	
$nombres = explode(" ",$b[$NOMBRE]);
 
//echo $nombres[0]; 
//echo $nombres[1]; 
//echo $nombres[2]; 
$Emp="SELECT EMP from maestro where ApellidoP like '".$nombres[0]."%' and ApellidoM like'".$nombres[1]."%' and Nombre like'".$nombres[2]."%'";	

//echo "".$Emp."<br>";
	
$resultado = mysqli_query($con,$Emp);
//$resultado = mysqli_query($con,( "SELECT EMP from maestro where Nombre='".$b[$NOMBRE]."'");

$fila = mysqli_fetch_row($resultado);

		
$query="UPDATE matriculas SET Asistencia=".($b[$LUNES]+$b[$MARTES]+$b[$MIERCOLES]+$b[$JUEVES]+$b[$VIERNES]).
", ALU =".$b[$LUNES].", AMA = ".$b[$MARTES].", AMI = ".$b[$MIERCOLES].", AJU = ".$b[$JUEVES].", AVI = ".$b[$VIERNES]
." WHERE Emp = '".$fila[0]."' and Curso ='".$curso."'";
$val=mysqli_query($con,$query);//ejecutando consulta






//echo "".$query($con,i."<br>";
if(!$val){
//echo "No se ha podido Modificar";

}
else {
	$BAN=FALSE;
//echo "<center><h1>Datos Modificados Correctamente<br><br>";
//echo "<a href='Principal.html'>Regresar</a></center></h1><br><br>";
}


/*
$query($con,i="update maestro set Contrasena='$alupas' where Emp='$aluctr'";//consulta sql

$val=mysqli_query($con,($query($con,i,$con);//ejecutando consulta

if(!$val){
echo "No se ha podido Modificar";
}
else {
echo "<center><h1>Datos Modificados Correctamente<br><br>";
echo "<a href='Menu.php'>Regresar</a></center></h1><br><br>";
}
*/


$LUNES=$LUNES+6;
$MARTES=$MARTES+6;
$MIERCOLES=$MIERCOLES+6;
$JUEVES=$JUEVES+6;
$VIERNES=$VIERNES+6;
$NOMBRE=$NOMBRE+6;
	}
	
IF($BAN==FALSE)
{
echo "<center><h1>Datos Modificados Correctamente<br><br>";
echo "<a href='Menu.php'>Regresar</a></center></h1><br><br>";
	}	
	
	
	//var_dump($b);
echo "</table>";
//$curso = $_POST['c1']; 
//$docente = $_POST['d1']; 
//$AntD = $_POST["anteriorA"]; 
//$LU = $_POST["LU"]; 
//$MA = $_POST["MA"]; 
//$MI = $_POST["MI"]; 
//$JU = $_POST["JU"]; 
//$VI = $_POST["VI"]; 

//header('Location: Menu.php'). $_SESSION['usuario'];
/*
$R = $LU+$MA+$MI+$JU+$VI;
$sql1 =  "SELECT EMP from maestro where Nombre='$docente'";
$result1 = mysqli_query($con,($sql1);
$re= mysqli_result($result1, 0); 
$sql =  "UPDATE matriculas SET Asistencia=$R, ALU ='$LU', AMA = '$MA', AMI = '$MI', AJU = '$JU', AVI = '$VI' WHERE Emp = '$re' and Curso = '$curso'";
$result = mysqli_query($con,($sql, $conexion);

*/





  //header('Location: Menu.php'). $_SESSION['usuario'];
?> 
 </body>
</html>


