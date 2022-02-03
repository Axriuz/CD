<?php

$curso = $_POST["curso"]; 
$anio =$_POST['anio'];
$periodo=$_POST['periodo'];

 $usuario =$_SESSION['usuario'];
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $conexion);
mysql_query("SET NAMES UTF8");

require_once '../pdf/dompdf_config.inc.php';
//header("Content-Type: text/html; charset=UTF-8");

	//$html.= '';
        $html.= '';

header("Content-Type: text/html;charset=utf-8");
//header('Content-Type: text/html; charset=iso-8859-1');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
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
$sql="SELECT m.nombre, count(ma.emp) FROM matriculas ma INNER JOIN maestro m ON ma.emp = m.emp INNER JOIN curso on curso.Nombre=ma.Curso WHERE year(curso.CursoInicio)='$anio' and m.area = 'Sistemas y computacion' GROUP BY ma.emp HAVING count( ma.emp ) >=0 ORDER BY m.nombre ASC "; 

$resSql=mysql_query($sql); 

mysql_query("SET NAMES 'utf-8'");
$html.= "<br>";
$html.= "<br>";
$html.= "<br>";
$html.= "<br>";
$html.= '<center>';	
$html.= "<h3>";
$html.= "$curso";
$html.= "</h3>";
$html.= '<br>';
$html.= 'NUMERO DE CURSOS POR DOCENTES';
$html.= '</center>';	


$html.= "<br>";
$html.= "<br>";
		
	$html.= '<table border= "1" width="100%" height="100%">';
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
	while ($dato=mysql_fetch_row($resSql))
{	
	$html.= '<tr>';
	$html.= '<td WIDTH="5">';
	$html.= '<center>';
	$html.= $contador;
	$html.= '</center>';
	$html.= '</td>';
	$html.= '<td WIDTH="85">';
	$html.= utf8_decode(utf8_encode($dato[0]));
	$html.= '</td>';
	$html.= '<td WIDTH="10">';
	$html.= '<center>';
	$html.= utf8_decode(utf8_encode($dato[1]));
	$html.= '</center>';
	$html.= '</td>';
	$html.= '</tr>';
	$contador=$contador+1;
}

$html.= "<br>";

$html.= '</table>';

	//while ($dato1nombre=mysql_fetch_row($resSql1nombre))
//{	

//$html.= $dato1nombre[0];
//}




 //$html.= '<img src="piep.JPG"/>';
 $html.='<img id="myimg" src="piep.JPG" alt="Smiley face" align="middle">';
 
$mipdf = new DOMPDF();
$mipdf ->set_paper("A4", "portrait");
$mipdf ->load_html(utf8_decode(utf8_encode($html)));
$mipdf ->render();
$mipdf ->stream('DOCENTES DEL CURSO '.$curso.'.pdf');
//$mipdf ->Image('sep.jpg',10,72,150);

 $pdf->Output();
 ?>