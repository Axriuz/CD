<?php
error_reporting(0);

 $usuario =$_SESSION['usuario'];
require('con.php');

require_once '../pdf/dompdf_config.inc.php';

        $html.= '';

header("Content-Type: text/html;charset=utf-8");
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: /index.html'); 
  exit();
}

$curso = $_POST["curso"]; 
$anio = $_POST["a"]; 

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
$sql="SELECT m.ApellidoP,m.ApellidoM,m.nombre, count(ma.emp) FROM matriculasRH ma INNER JOIN PersonalRH m ON ma.emp = m.emp INNER JOIN cursoRH on cursoRH.Nombre=ma.Curso WHERE year(cursoRH.CursoInicio)='".$anio."' and m.area = '$curso' GROUP BY ma.emp HAVING count( ma.emp ) >=0  ORDER BY m.ApellidoP "; 


////

$resSql=mysqli_query($con,$sql); 
//$html.=$sql."-HOLA";
mysqli_query($con,"SET NAMES 'utf-8'");
$html.= "<br>";


$html.= '<center>';	
$html.= "<h3>";
$html.=utf8_decode("$curso");
$html.= "</h3>";
$html.= '<br>';
$html.= 'NUMERO DE CURSOS POR PERSONAL';
	
$html.= "<br>";
$html.= utf8_decode("Año ".$anio." Periodo:Enero - Diciembre");
$html.= '</center>';
$html.= "<br>";
		
	$html.= '<table border= "1" cellspacing="0" cellpadding="0" width="100%" height="100%">';
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
	$html.= 'NO. CURSOS';
	$html.="</strong>";
	$html.= '</center>';
	$html.= '</td>';
	$html.= '</tr>';
	$contador=1;
	while ($dato=mysqli_fetch_row($resSql))
{	
	$html.= '<tr>';
	$html.= '<td WIDTH="5">';
	$html.= '<center>';
	$html.= $contador;
	$html.= '</center>';
	$html.= '</td>';
	$html.= '<td WIDTH="85">';
	$html.= utf8_decode($dato[0]." ".$dato[1]." ".$dato[2]);
	$html.= '</td>';
	$html.= '<td WIDTH="10">';
	$html.= '<center>';
	$html.= utf8_decode($dato[3]);
	$html.= '</center>';
	$html.= '</td>';
	$html.= '</tr>';
	$contador=$contador+1;
}

$html.= "<br>";

$html.= '</table>';

	//while ($dato1nombre=mysqli_fetch_row($resSql1nombre))
//{	

//$html.= $dato1nombre[0];
//}




 //$html.= '<img src="piep.JPG"/>';
 $html.='<img id="myimg" src="piep.JPG" alt="Smiley face" align="middle">';
 
$mipdf = new DOMPDF();
$mipdf ->set_paper("A4", "portrait");
$mipdf ->load_html(utf8_decode(utf8_encode($html)));
$mipdf ->render();
$mipdf ->stream('PERSONAL DEL CURSO '.$curso.'.pdf');
//$mipdf ->Image('sep.jpg',10,72,150);

 $pdf->Output();
 ?>