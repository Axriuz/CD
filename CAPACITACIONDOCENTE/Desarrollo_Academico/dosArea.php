<?php
error_reporting(0);
$curso = $_POST["cursos"]; 

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

$sql="select distinct maestro.Nombre,maestro.Emp from maestro inner join matriculas on maestro.Emp=matriculas.Emp inner join curso on matriculas.curso=curso.nombre where Area='$curso' and curso.Periodo='Enero - Mayo' order by maestro.nombre";
/*
SELECT column_name(s)
FROM table1
INNER JOIN table2 ON table1.column_name = table2.column_name;
*/
$resSql=mysql_query($sql); 
mysql_query("SET NAMES 'utf-8'");
$html.= "<br>";
//$html.= "<br>";
//$html.= "<br>";
//$html.= "<br>";
$html.= '<center>';	
$html.= "<h3>";
$html.= $curso;
$html.= "</h3>";
$html.= '<br>';

$html.= 'CURSOS POR DOCENTES DEL ÁREA DE '.mb_strtoupper($curso, "UTF-8");
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
	$html.= 'CURSOS';
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
	$html.= $dato[0];
	$html.= '</td>';
	$html.= '<td WIDTH="10">';
	$html.= '<center>';
	
	$sql1="SELECT curso from matriculas where Emp=$dato[1]"; 
	$resSql1=mysql_query($sql1); 
$cadena="";
while ($dato1=mysql_fetch_row($resSql1))
{	
 // $html.= $dato1[0];
 
$sql11="SELECT Nombre from curso where (Nombre='$dato1[0]' and Periodo='Enero - Mayo')"; 
	$resSql11=mysql_query($sql11); 
while ($dato11=mysql_fetch_row($resSql11))
{	
$cadena= $cadena." ".$dato11[0]."<br>";
}



}
	//$cadena= $cadena." ".$dato1[0];
	


    $html.= $cadena;
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
$mipdf ->stream('DOCENTES DEL CURSO '.$curso.'.pdf');
//$mipdf ->Image('sep.jpg',10,72,150);
 $pdf->Output();
 ?>