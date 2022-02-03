<?php
error_reporting(0);
session_start();
$p= $_POST["periodo"]; 
$anio=$_POST["a"];

 $usuario =$_SESSION['usuario'];

/*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
$db_name="sigacitc_cursosdesacadCP";
 
$con=mysqli_connect("$host","$user","$pass","$db_name");
//Vereificación de conexión a BD.
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit;
}
$bd_seleccionada = mysqli_select_db($con,'sigacitc_cursosdesacadCP');
mysqli_query("SET NAMES UTF8");
*/

require('con.php');
//Configuración PDF
require_once '../pdf/dompdf_config.inc.php';

$html.= '';

header("Content-Type: text/html;charset=utf-8");
  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: /index.html'); 
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


$result= mysqli_query($con,"SELECT curso FROM matriculas M INNER JOIN maestro MA on M.emp=Ma.emp inner join curso C on C.Nombre=M.Curso where Ma.emp=$usuario and C.Periodo='$p' and year(CursoInicio)=$anio");
$result1= mysqli_query($con,"SELECT CursoInicio FROM matriculas M INNER JOIN maestro MA on M.emp=Ma.emp inner join curso C on C.Nombre=M.Curso where Ma.emp=$usuario and C.Periodo='$p' and year(CursoInicio)=$anio");
$result2= mysqli_query($con,"SELECT CursoFin FROM matriculas M INNER JOIN maestro MA on M.emp=Ma.emp inner join curso C on C.Nombre=M.Curso where Ma.emp=$usuario and C.Periodo='$p' and year(CursoInicio)=$anio");
//$total = mysqli_fetch_row($result);

//Parte superio pdf
$html.= '<center>';	
$html.= "<h3>";
$html.= 'REPORTE CURSOS';
$html.= "</h3>";
$html.= '<br>';
$html.= mb_strtoupper('AÑO: '.$anio." PERIODO: ".$p, "UTF-8");
$html.= '</center>';	
$html.= "<br>";
$html.= "<br>";
//-------
while ($total = mysqli_fetch_row($result))
  {	
    $cadena= $cadena." ".mb_strtoupper((utf8_decode(utf8_encode($total[0]))),'UTF-8')."<br>";
   
  }

  while ($total1 = mysqli_fetch_row($result1))
  {	
    $cadena1= $cadena1." ".mb_strtoupper((utf8_decode(utf8_encode($total1[0]))),'UTF-8')."<br>";
   
  }

  while ($total2 = mysqli_fetch_row($result2))
  {	
    $cadena2= $cadena2." ".mb_strtoupper((utf8_decode(utf8_encode($total2[0]))),'UTF-8')."<br>";
   
  }

$html.= '

<table border= "1"  cellspacing="0" cellpadding="0" width="100%" height="100%">

  <tr>
     <td width="90%"> <center> NOMBRE DEL CURSO</center></td>
     <td width="90%"> <center> FECHA DE INICIO</center></td>
     <td width="90%"> <center> FECHA DE FIN </center></td>
   </tr>

   <tr>
   <td WIDTH="90%">'.$cadena.'</td>
  <td WIDTH="90%">'.$cadena1.'</td>
  <td WIDTH="90%">'.$cadena2.'</td>
  </tr>

  ';
  
 	$html.= '</table>';


//parte inferior pdf
$html.='<img id="myimg" src="piep.JPG" alt="Smiley face" align="middle">';
$mipdf = new DOMPDF();
$mipdf ->set_paper("A4", "portrait");
$mipdf ->load_html(utf8_decode(utf8_encode($html)));
$mipdf ->render();
$mipdf ->stream('REPORTE CURSOS'.$anio.' PERIODO '.$p.'.pdf');
//$mipdf ->Image('sep.jpg',10,72,150);
 $pdf->Output();

?>



