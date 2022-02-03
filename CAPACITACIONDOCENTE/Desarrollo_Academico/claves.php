<?php
error_reporting(0);
$curso = $_POST["cursos"]; 

/*
 $usuario =$_SESSION['usuario'];
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query("SET NAMES UTF8");
*/

require('con.php');

require_once '../pdf/dompdf_config.inc.php';



	 $html.= '';

header('Content-type: text/html; charset=UTF-8');
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
//$html.='<img src="arribatodo.JPG" alt="Smiley face" align="middle">';
// $html.= '<img src="piep.JPG"/>';

//$html.= utf8_decode("Tecnol�gico Nacional de M�xico");
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
 mysqli_query($con,"SET NAMES 'utf8'");

$sql="select Emp,ApellidoP,ApellidoM,Nombre,Contrasena from maestro order by ApellidoP,ApellidoM,Nombre"; 
 mysqli_query($con,"SET NAMES 'utf8'");

$resSql=mysqli_query($con,$sql); 

$html.= '<center>';	
$html.= '<h3>';
//$html.= '<br>';
$html.= '</h3>';
//$html.= "<br>";
//$html.= "<br>";
$html.= "<h3>";
$html.= "$curso";
$html.= "</h3>";
$html.= '';

$html.= 'CLAVES Y PASWORDS DE DOCENTES';
$html.= '</center>';	
$html.= "<br>";
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
	$html.= '<td WIDTH="70">';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'NOMBRE';
	$html.="</strong>";
	$html.= '</center>';	
	$html.= '</td>';
	$html.= '<td WIDTH="30">';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'CLAVE';
	$html.="</strong>";
	$html.= '</center>';	
	$html.= '</td>';
	$html.= '<td WIDTH="50">';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'PASSWORD';
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
	$html.= '<td WIDTH="70">';
		$html.= utf8_decode($dato[1])." ".utf8_decode($dato[2])." ".utf8_decode($dato[3]);

	$html.= '</td>';
	$html.= '<td WIDTH="30">';
		$html.= utf8_decode($dato[0]);

	$html.= '</td>';
	$html.= '<td WIDTH="50">';
	$html.=utf8_decode($dato[4]);
	$html.= '</td>';
	
	$html.= '</tr>';
	$contador=$contador+1;
	
}

$html.= "<br>";

$html.= "<br>";	//$resSql1=mysqli_query($sql1); 


$html.= '<br>';
$html.= "<br>";
$html.= ' ';
$html.="<strong>";
$html.="</strong>";
$html.= '<br>';
	

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
$mipdf ->stream('RALACIÓN DE DOCENTES-CLAVES.pdf');
//$mipdf ->Image('sep.jpg',10,72,150);

 $pdf->Output();
 ?>
