<html>
		
		<!---->
		
		<header><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
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
/*
 $host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2";
 $con=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $con);
mysqli_query($con,"SET NAMES UTF8");
*/
require('con.php');

if(isset($_REQUEST['Modificar'])){

$Nombre=$_POST['Nombre'];
$Periodo=$_POST['periodo'];
$Duracion=$_POST['Duracion'];
$CursoInicio=$_POST['CursoInicio'];
$CursoFin=$_POST['CursoFin'];
$Horario=$_POST['horario'];
$Horario1=$_POST['horario1'];
$Sed=$_POST['Sede'];
$Objetivo=$_POST['Objetivo'];
$Instructor=$_POST['Instructor'];
$Tec=$_POST['Tec'];
$Introduccion=$_POST['Introduccion'];
$Justificacion=$_POST['Justificacion'];
$Descripcion=$_POST['Descripcion'];
$Resultados=$_POST['Resultados'];
$Fuentes=$_POST['Fuentes'];
$InsAux=$_POST['InsAux'];
$TipoCurso=$_POST['TipoCurso'];
$Numero=$_POST['Numero'];

$dirigido=$_POST['dirigido'];

$NOMBRECURSO=$_POST['cursoU'];
//echo "1".$Nombre."2".$Periodo."3".$Duracion."4".$CursoInicio."5".$CursoFin."6".$Horario."7".$Horario1."8".$Sed."9".$Objetivo."1".$Instructor."2".$Tec."3".$Introduccion."4".$Justificacion."5".$Descripcion."6".$Resultados."7".$Fuentes."8".$InsAux."9".$TipoCurso."<br><br><br><br>";

//echo "".$CursoInicio."<br><br><br><br>";
//echo "".$CursoFin."<br><br><br><br>";

$qur="UPDATE matriculas set Curso='".$Nombre."' where Curso='".$NOMBRECURSO."'";
$qurt1="UPDATE tbl_documentos set titulo='".$Nombre."' where titulo='".$NOMBRECURSO."'";
$qurt2="UPDATE tbl_documentos2 set titulo='".$Nombre."' where titulo='".$NOMBRECURSO."'";
$qurt3="UPDATE tbl_documentos3 set titulo='".$Nombre."' where titulo='".$NOMBRECURSO."'";


$queryi="UPDATE `curso` SET `Nombre`='".$Nombre."',`Periodo`='".$Periodo."',`Duracion`='".$Duracion."',`CursoInicio`='".$CursoInicio."',`CursoFin`='".$CursoFin."',`Horario`='".$Horario."',`Horario1`='".$Horario1."',`Sede`='".$Sed."',`Objetivo`='".$Objetivo."',`Instructor`='".$Instructor."',`Tec`='".$Tec."',`Introduccion`='".$Introduccion."',`Justificacion`='".$Justificacion."',`Descripcion`='".$Descripcion."',`Resultados`='".$Resultados."',`Fuentes`='".$Fuentes."',`InsAux`='".$InsAux."',`TipoCurso`='".$TipoCurso."',`dirigido_a`='".$dirigido."' WHERE Numero=".$Numero."";

//$query($con,i="update maestro set Contrasena='$alupas',Area='$area',Nombre='$nombre' where Emp='$aluctr'";//consulta sql

//echo "".$query($con,i;

$val=mysqli_query($con,$queryi);//ejecutando consulta

$val1=mysqli_query($con,$qur);//ejecutando consulta
$val2=mysqli_query($con,$qurt1);//ejecutando consulta
$val3=mysqli_query($con,$qurt2);//ejecutando consulta
$val4=mysqli_query($con,$qurt3);//ejecutando consulta

if(!$val || !$val1 || !$val2 || !$val3 || !$val4){
echo "No se ha podido Modificar".mysqli_error();
echo $val1, $val2,$val3,$val4;
}
else {
echo "<center><h1>Datos Modificados Correctamente<br><br>";
echo "<a href='Menu.php'><IMG SRC='../Img/menu.png' WIDTH=150 HEIGHT=45>	 </a>";
}
}
?>


</html>

