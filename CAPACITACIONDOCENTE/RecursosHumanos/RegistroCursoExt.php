<html>
<body> 
 
 
  <br>

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
//Esta bandera sirve al momento de verificar si el curso ya existe, si ya esxiste se cambia a 1
$BAN=0;

include('con.php');

//Variables donde se guardo la información del formulario.
$instructor= $_POST['instructor'];
$tec = $_POST["tec"];  
$curso = $_POST["curso"]; 
$periodo = $_POST["periodo"]; 
$inicurso = $_POST["INICURSO"]; 
$fincurso = $_POST["FINCURSO"]; 
$duracion = $_POST["duracion"]; 
$horario = $_POST["horario"]; 
$horario1 = $_POST["horario1"]; 

$TipoCurso=$_POST["TipoCurso"];

//Verificamos que la fechad e inico sea menor que la de fin 
if($inicurso > $fincurso){
	$BAN=1;
	echo '<script language="javascript">alert("LA FECHA DE INICIO DEBE SER MENOR QUE LA DE FIN");</script>';
	$cvadc = '';	
}

//Comprobamos si el curso no existe ya en el mismo periodo y hora
$sql2="SELECT Nombre,Periodo FROM cursoRH WHERE Nombre='$curso' and Periodo='$periodo' and Horario='$horario'";
$resSql2=mysqli_query($con,$sql2); 
$dato2=mysqli_fetch_row($resSql2);

if ($dato2!=""){
	$BAN=1;
    echo '<script language="javascript">alert("CURSO YA EXISTENTE");</script>';
    //header('Location: AddCursoExt.php'). $_SESSION['usuario'];
	
}


if($BAN==0){
	 $BAN=0;
$sql = "INSERT INTO `cursoRH`(`Nombre`, `Periodo`, `Duracion`, `CursoInicio`,`CursoFin`, `Horario`,`Horario1`, `Sede`, `Objetivo`, `Temario`, `Instructor` , `Numero`, `Tec` , `Cv` , `Introduccion` , `Justificacion` , `Descripcion` , `Resultados` , `Fuentes` , `Material`, `InfComp` , `InsAux` , `cvinsaux` , `validado` , `Ins_evaluado`  ,`TipoCurso`,`dirigido_a`) VALUES  ('$curso', '$periodo', '$duracion', '$inicurso','$fincurso','$horario','$horario1', '$sede', '$objetivo', '', '$instructor', ' ', '$tec', '' ,'$introduccion','$justificacion','$descripcion','$resultados','$fuentes','','','','','0','0','$TipoCurso','$dir')";

   $result = mysqli_query($con,$sql);
if(!$result) 
{  
 echo 'ERROR: ' . mysql_error() . "\n";
 }
 
 else {	   
   echo '<script language="javascript">alert("CURSO REGISTRADO");</script>';
   } 
}
?> 

</body>

<?php 
	
?> 
</html>








