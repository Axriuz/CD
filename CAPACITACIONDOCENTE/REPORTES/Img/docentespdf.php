<?php

$curso = $_POST["cursos"]; 
require_once '../pdf/dompdf_config.inc.php';



	 $html.= '<meta http-equiv="content-type" content="text/html; charset=UTF-8">';

header('Content-Type: text/html; charset=UTF-8');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: /index.html'); 
  exit();
}
 $usuario =$_SESSION['usuario'];

 $host='mysql.webcindario.com';
 $user='cursosdesacad';
 $pass='jmrs1905';
 $conexion=mysql_connect($host,$user,$pass);
 mysql_query("SET NAMES 'utf8'");
$bd_seleccionada = mysql_select_db('cursosdesacad', $conexion);

 $sql="select distinct maestro.nombre from maestro, matriculas where matriculas.Curso = '$curso' and matriculas.Emp = maestro.emp"; 
		$resSql=mysql_query($sql); 
$html.= '<IMG SRC="../Img/sep.jpg">';
$html.= '<center>';	
$html.= '<h3>';
$html.= 'Tecnológico Nacional de México';
$html.= '<br>';
$html.= 'INSTITUTO TECNOLÓGICO DE CD. GUZMÁN';
$html.= '</h3>';

$html.= "<br>";
$html.= "<br>";
$html.= "<br>";
$html.= "<h3>";
$html.= "'$curso'";
$html.= "</h3>";

$html.= 'DOCENTES QUE PARTICIPAN EN EL CURSO Y RECIBEN CONSTANCIA';

$html.= '</center>';	


$html.= "<br>";
$html.= "<br>";
		
	$html.= '<table border= "1" width="100%" height="100%">';
	$html.= '<tr>';
	$html.= '<td WIDTH="50">';
	$html.= '<center>';
	$html.= 'Maestro';
	$html.= '</center>';	
	$html.= '</td>';
	$html.= '<td WIDTH="50">';
	$html.= '<center>';
	$html.= 'Firma de Conformidad';
	$html.= '</center>';
	$html.= '</td>';
	$html.= '</tr>';
	
	while ($dato=mysql_fetch_row($resSql))
{	
	$html.= '<tr>';
	$html.= '<td WIDTH="50">';
	$html.= $dato[0];
	$html.= '</td>';
	$html.= '<td WIDTH="50">';
	$html.= '</td>';
	$html.= '</tr>';
}

$html.= '</table>';


 
 
$mipdf = new DOMPDF();
$mipdf ->set_paper("A4", "portrait");
$mipdf ->load_html(utf8_decode($html));
$mipdf ->render();
$mipdf ->stream('Docentes.pdf');
$mipdf ->Image('../Img/sep.jpg',10,72,150);

 $pdf->Output();
 ?>
