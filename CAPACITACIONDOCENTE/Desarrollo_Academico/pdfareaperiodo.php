<?php
error_reporting(0);
$curso = $_POST["curso"]; 
$anio = $_POST["a"]; 
$p= $_POST["periodo"]; 


$usuario =$_SESSION['usuario'];

require('_con.php');

//Configuración PDF
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
header("Content-Type: text/html; charset=UTF-8");

        $html.= '';

header("Content-Type: text/html;charset=utf-8");
//header('Content-Type: text/html; charset=iso-8859-1');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: /index.html'); 
  exit();
}
//$html.='<img src="arribatodo.JPG" alt="Smiley face" align="middle">';
// $html.= '<img src="piep.JPG"/>';

$html.='<style>
#myimg{
    position:absolute;
    bottom:40px;
}
#apDiv6 {
	position: absolute;
	width: 704px;
	height: 91px;
	z-index: 6;
	left: 0px;
	top: 1px;
	background-image: url(arribatodo.JPG);
}';
$html.='</style>';
$html.= '<img id="myimg1" src="arribatodo.JPG">';


$html.='<div id="apDiv6"></div>';

//Connsulta que retorna la cantidad de mujeres que tomaron cursos en el periodo seleccionado 
$sqlsexF=mysqli_query($con,"SELECT COUNT( * ) AS total FROM maestro inner join matriculas on maestro.Emp=matriculas.Emp inner join curso on matriculas.curso=curso.nombre where Area='$curso' and curso.Periodo='$p' and Year(curso.CursoInicio)='$anio' and maestro.sexo='Femenino'");
$totalF = mysqli_fetch_row($sqlsexF);

//Consulta que retorna la cantidad de hombres que tomaron cursos en el periodo seleccionado 
$sqlsexM=mysqli_query($con,"SELECT COUNT( * ) AS total FROM maestro inner join matriculas on maestro.Emp=matriculas.Emp inner join curso on matriculas.curso=curso.nombre where Area='$curso' and curso.Periodo='$p' and Year(curso.CursoInicio)='$anio' and maestro.sexo='Masculino'");
$totalM = mysqli_fetch_row($sqlsexM);

//Consulta para obetener datos del maestro del area seleccionada.
$sql="select distinct maestro.ApellidoP,maestro.ApellidoM,maestro.Nombre,maestro.Emp from maestro inner join matriculas on maestro.Emp=matriculas.Emp inner join curso on matriculas.curso=curso.nombre where Area='$curso' and curso.Periodo='$p' and Year(curso.CursoInicio)='$anio'  order by maestro.ApellidoP";

/*
SELECT column_name(s)
FROM table1
INNER JOIN table2 ON table1.column_name = table2.column_name;
*/
$resSql=mysqli_query($con,$sql); 
mysqli_query($con,"SET NAMES 'utf-8'");
$html.= "<br>";
//$html.= "".$sql;
//$html.= "<br>";
//$html.= "<br>";
$html.= '<center>';	
$html.= "<h3>";
$html.= utf8_decode('CURSOS POR DOCENTES DEL ÁREA DE '.mb_strtoupper($curso, "UTF-8"));
$html.= "</h3>";
$html.= '<br>';
$html.= utf8_decode(mb_strtoupper('AÑO: '.$anio." PERIODO: ".$p, "UTF-8"));
$html.= '</center>';	
$html.= "<br>";
		
	$html.= utf8_decode('<table border= "1"  cellspacing="0" cellpadding="0" width="100%" height="100%">');
	$html.= '<tr>';
	$html.= '<td WIDTH="5">';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'No.';
	$html.="</strong>";
	$html.= '</center>';	
	$html.= '</td>';
	$html.= '<td WIDTH="85">';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'NOMBRE';
	$html.="</strong>";
	$html.= '</center>';	
	$html.= '</td>';
	$html.= '<td WIDTH="10">';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'CURSOS';
	$html.="</strong>";
	$html.= '</center>';
	$html.= '<td WIDTH="10">';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'INICIO';
	$html.="</strong>";
	$html.= '</center>';
	$html.= '</td>';
	$html.= '<td WIDTH="10">';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'FIN';
	$html.="</strong>";
	$html.= '</center>';
	$html.= '</td>';
	$html.= '</td>';

	$html.= '</tr>';
	$contador=1;
while ($dato=mysqli_fetch_row($resSql))
{	
	$html.= '<tr>';
	$html.= '<td WIDTH="5">';
	$html.= '<center>';
	$html.= utf8_decode($contador);
	$html.= '</center>';
	$html.= '</td>';
	$html.= '<td WIDTH="85">';
	$html.=utf8_decode( $dato[0]." ".$dato[1]." ".$dato[2]);
	$html.= '</td>';
	$html.= '<td WIDTH="10">';
	$html.= '<center>';
	
//Consulta que retorna los cursos que tomaron los maestros.
	$sql1="SELECT curso from matriculas where Emp=$dato[3]"; 
	$resSql1=mysqli_query($con,$sql1); 
	$cadena="";
	
while ($dato1=mysqli_fetch_row($resSql1))
{	
// $html.= $dato1[0];

//Consulta que retorna los nombres delos cursos que se tomaron en el periodo seleccionado.
 	$sql11="SELECT Nombre from curso where (Nombre='$dato1[0]' and Periodo='$p' and year(CursoInicio)='$anio') "; 


	 $resSql11=mysqli_query($con,$sql11); 
while ($dato11=mysqli_fetch_row($resSql11))
{	
	$cadena= $cadena." ".mb_strtoupper((utf8_decode(utf8_encode($dato11[0]))),'UTF-8')."<br>";


mysqli_query($con,"SET lc_time_names = 'es_ES'" ); 
$fechaInicio = "SELECT DATE_FORMAT(  `CursoInicio` ,  '%d de %M ' ) AS modified_date
FROM curso where (Nombre='$dato11[0]')";
$RFI = mysqli_query($con,$fechaInicio);  

$fechaFin = "SELECT DATE_FORMAT(  `CursoFin` ,  '%d de %M de %Y' ) AS modified_date
FROM curso where (Nombre='$dato11[0]')";
$RFF = mysqli_query($con,$fechaFin);
while ($dato12=mysqli_fetch_row($RFI))
{	

$inicio=$dato12[0];	
	
}
while ($dato121=mysqli_fetch_row($RFF))
{	

	$fin=$dato121[0];
	
}

}

}
	//$cadena= $cadena." ".$dato1[0];
    $html.= utf8_decode($cadena);
    $html.= '</center>';
	$html.= '</td>';
	$html.= '<td WIDTH="5">';
	$html.= '<center>';
	$html.= $inicio;
	$html.= '</center>';
	$html.= '</td>';
	$html.= '<td WIDTH="5">';
	$html.= '<center>';
	$html.= $fin;
	$html.= '</center>';
	$html.= '</td>';
	$html.= '</tr>';
	$contador=$contador+1;
}
$html.= "<br>";

$html.= '</table>';

$html.='<img id="myimg" src="piep.JPG" alt="Smiley face" align="middle">';
 
$mipdf = new DOMPDF();
$mipdf ->set_paper("A4", "portrait");
$mipdf ->load_html(utf8_decode(utf8_encode($html)));
$mipdf ->render();
$mipdf ->stream('DOCENTES DEL ÁREA '.$curso.' AÑO'.$anio.' PERIODO '.$p.'.pdf');
//$mipdf ->Image('sep.jpg',10,72,150);
 $pdf->Output();
 
 ?>
 
 
 