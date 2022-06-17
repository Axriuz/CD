<?php
error_reporting(0);
$usuario =$_SESSION['usuario'];
/*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 

$con=mysqli_connect("$host","$user","$pass","sigacitc_cursosdesacadCP");
//Vereificación de conexión a BD.
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit;
}

$bd_seleccionada = mysqli_select_db($con,'sigacitc_cursosdesacadCP');
mysqli_query($con,"SET NAMES UTF8");
*/
require('_con.php');

$res=mysqli_query($con,"SELECT emp,nombre,apellidoP,apellidoM from maestro where Tipo_Usuario=2"); 
if(!$res) { 
    echo '<script language="javascript">alert("Error");</script>';
    }
    require_once 'dompdf/autoload.inc.php';
	use Dompdf\Dompdf;
    $html.= '';
    
    header("Content-Type: text/html;charset=utf-8");

    session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
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

$html.= "<br>";
$html.= '<center>';	
$html.= "<h3>";
$html.= 'PERSONAL EXTERNO ';
$html.= "</h3>";
$html.= '<br>';
$html.= '</center>';	
$html.= "<br>";

$html.= '<table border= "1" cellspacing="0" cellpadding="0" width="100%" height="100%">';
	$html.= '<tr>';
	$html.= '<td WIDTH="3">';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'ID.';
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
    $html.= '</tr>';
    while ($dato=mysqli_fetch_row($res))
    {	
    $html.= '<tr>';
	$html.= '<td WIDTH="5">';
	$html.= '<center>';
	$html.= $dato[0];
	$html.= '</center>';
	$html.= '</td>';
    $html.= '<td WIDTH="85">';
    $html.= '<center>';
    $html.= $dato[1]."  ".$dato[2]."  ".$dato[3];
    $html.='</center>';
    $html.= '</td>';
    $html.='</tr>';
    }
    $html.= "<br>";

$html.= '</table>';

$html.='<img id="myimg" src="piep.JPG" alt="Smiley face" align="middle">';
 
$mipdf = new DOMPDF();
$mipdf ->set_paper("A4", "portrait");
$mipdf ->load_html(utf8_decode(utf8_encode($html)));
$mipdf ->render();
$mipdf ->stream('PERSONAL EXTERNO.pdf');
//$mipdf ->Image('sep.jpg',10,72,150);
 $pdf->Output();
 ?>
    

