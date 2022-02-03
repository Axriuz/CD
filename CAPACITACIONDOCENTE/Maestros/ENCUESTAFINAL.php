<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
header("Content-Type: text/html;charset=utf-8");
//print "<pre>";
//print_r($_REQUEST);

//var_dump($_REQUEST);
$USUARIO=$_POST['ID'];
//print "</pre>\n";
echo "<table>";
 foreach ($_POST as $key => $value) 
	{
		
		//$UNO=1;
		//$a[]=$key;
      //  echo "<tr>";
      //  echo "<td>";
      //  echo $key;ef
	$a[]=$key;
      //  echo "</td>";
      //  echo "<td>";
      //  echo $value;
	$b[]=$value;
      //  echo "</td>";
      //  echo "</tr>";
		//}	
    }
	echo "</table>";
	///
/*
$servername = 'sigacitcg.com.mx';
$username = 'sigacitc';
$password = 'Itcg11012016_2';
$dbname = 'sigacitc_cursosdesacadCP';
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Error:  " . mysqli_connect_error());
}
*/

require('con.php');
//+++++

for ($UNO=0;$UNO<=19;$UNO ++)
{
$sql = "INSERT INTO Evaluacion (TipoP, Valor, Emp, CURSO)
VALUES ('".$a[$UNO]."', '".$b[$UNO]."', '".$USUARIO."','".$b[21]."')";

if (mysqli_query($con, $sql)) {
 //   echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
}

$sql = "INSERT INTO Comentario (Emp, CURSO, COMENTARIO)
VALUES ('".$USUARIO."','".$b[21]."','".$b[22]."')";

if (mysqli_query($con, $sql)) {
  //  echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
//

/*
$servername = "sigacitcg.com.mx"; 
$username = "sigacitc"; 
$password = "Itcg11012016_2"; 
$dbname = "sigacitc_cursosdesacadCP";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysql_query("SET NAMES UTF8");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE matriculas SET Eval='1' WHERE (Emp = '".$USUARIO."' and Curso='".$b[21]."')";
echo "".$sql;

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

*/

//
/*$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysqli_connect($con,$host,$user,$pass);
$bd_seleccionada = mysqli_select_db($con,'sigacitc_cursosdesacadCP');*/


mysqli_query($con,"SET NAMES UTF8");
$queryi= "UPDATE matriculas SET Eval='1' WHERE (Emp = '".$USUARIO."' and Curso='".$b[21]."')";
$val=mysqli_query($con,$query);//ejecutando consulta

if(!$val){


}
else {


}



echo "<script type=\"text/javascript\">alert(\"Éxito al evaluar curso : ".$b[21]."\"); window.location.href='Menu.php'; </script>";
			 //+++++++window.history.back('Menu.php'); 


//header('Location: Menu.php'). $_SESSION['usuario'];
	///
	
	
?>