<?php
error_reporting(0);
function fechaesp($date) {
    $dia = explode("-", $date, 3);
    $year = $dia[0];
    $month = (string)(int)$dia[1];
    $day = (string)(int)$dia[2];
    
    $dias = array("domingo","lunes","martes","miércoles" ,"jueves","viernes","sábado");
    $tomadia = $dias[intval((date("w",mktime(0,0,0,$month,$day,$year))))];
 
    $meses = array("", "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
    
    return $tomadia.", ".$day." de ".$meses[$month]." de ".$year;
}
function fechaesp1($date) {
    $dia = explode("-", $date, 3);
    $year = $dia[0];
    $month = (string)(int)$dia[1];
    $day = (string)(int)$dia[2];
    
    $dias = array("domingo","lunes","martes","miércoles" ,"jueves","viernes","sábado");
    $tomadia = $dias[intval((date("w",mktime(0,0,0,$month,$day,$year))))];
 
    $meses = array("", "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
    
    return $tomadia.", ".$day." de ".$meses[$month];
}

$curso = $_POST["curso"]; 
$a=$_POST["a"];
$elaboro=$_POST['elaboro'];
$aprobo=$_POST['aprobo'];
$elaborof=$_POST['elaborof'];
$aprobof=$_POST['aprobof'];
$nombredcto=$_POST['nombredcto'];
$normas=$_POST['normas'];
$cod=$_POST['cod'];
$rev=$_POST['rev'];


require('con.php');

require_once '../pdf/dompdf_config.inc.php';
//header("Content-Type: text/html; charset=UTF-8");

	//$html.= '';
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
}
.p {
  font:  status-bar;
}';
$html.='</style>';
//$html.= '<img id="myimg1" src="arribatodo.JPG">';



//

$html = '
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 
  <style>
    @page {  
	  margin: 120px 50px auto;
	   margin-bottom: 1.5cm;  

	 }
    #header { position: fixed; left: 0px; top: -95px; right: 0px; height: 5px;  text-align: right; }
    #header .page:after { 
	content:"Página " counter(page,decimal) ; 
	}
	#footer{ position: fixed; center: 0px; top: 600px; right: 0px; height: 5px;  text-align: center; }
	#footer .page:after { 
	content1:"Páginasss " counter(page,decimal) ; 



  </style>
  
<body>
';


$html.='

  <div id="header">
  <p class="page">
<font size="-2" color="black">
<TABLE width="743" height="50" border="1" CELLPADDING=2 CELLSPACING=0 align="center">
<tr>
<td rowspan="3"><center><img src="ITCGLOGO.jpg" width="25" height="25" HSPACE="10" VSPACE="10"/></center></td>
<td rowspan="2">Nombre del documento:' .$nombredcto.' </td>
<td>Codigo: '.$cod.'</td>
</tr>
<tr>
  <td rowspan="2">Revición: '.$rev.' </td>
</tr>
<tr>
<td>Referencia a las Normas '.$normas.'</td>
</tr>
</TABLE>
</p>
  </div>
  
  
  <div id="footer">
  <p class="page">
<font size="-2" color="black">


<TABLE width="743" height="50" border="0" CELLPADDING=2 CELLSPACING=0 align="center">
<tr>
<td>
ITCG-AD-PO-009-02
</td>
 <td align="right" > 
Rev. 7
</td>
</tr>




</TABLE>


</p>
  </div>
 

  <div id="content">
   


';

$sql="SELECT Nombre,Objetivo,CursoInicio,CursoFin,Tec,Instructor,InsAux from cursoRH where Year(CursoInicio)='$a' order by Nombre";

/*
SELECT column_name(s)
FROM table1
INNER JOIN table2 ON table1.column_name = table2.column_name;
*/
$resSql=mysqli_query($con,$sql); 
mysqli_query($con,"SET NAMES 'utf-8'");

$html.= '<center>';	
$html.= "<h3>";
$html.= mb_strtoupper('PROGRAMA INSTITUCIONAL DE FORMACIÓN Y ACTUALIZACIÓN DOCENTE Y PROFESIONAL <br>', "UTF-8");
$html.= mb_strtoupper('INSTITUTO TECNOLÓGICO DE <u>   CD. GUZMÁN   </u><br>', "UTF-8");
$html.= mb_strtoupper('PERIODO <u>   Enero - DICIEMBRE </u> AÑO: <u>'.$a.'   </u><br>', "UTF-8");
$html.= "</h3>";
$html.= '</center>';	
		
	$html.= '<table border= "1" width="100%" height="100%" class="p" style="font-size:10px"CELLPADDING=0 CELLSPACING=0 > ';
	$html.= '<tr>';
	$html.= '<td >';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'No.';
	$html.="</strong>";
	$html.= '</center>';	
	$html.= '</td>';
	$html.= '<td >';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'NOMBRE DEL CURSO';
	$html.="</strong>";
	$html.= '</center>';	
	$html.= '</td>';
	$html.= '<td >';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'OBJETIVO';
	$html.="</strong>";
	$html.= '</center>';
	$html.= '</td>';
	$html.= '<td >';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'PREIODO DE REALIZACIÓN';
	$html.="</strong>";
	$html.= '</center>';
	$html.= '</td>';
	$html.= '<td >';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'LUGAR';
	$html.="</strong>";
	$html.= '</center>';
	$html.= '</td>';
	$html.= '<td >';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'NO: DE HORAS/CURSO';
	$html.="</strong>";
	$html.= '</center>';
	$html.= '</td>';
	$html.= '<td >';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'INSTRUCTOR(A)';
	$html.="</strong>";
	$html.= '</center>';
	$html.= '</td>';
	$html.= '<td >';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'DIRIGIDO A:';
	$html.="</strong>";
	$html.= '</center>';
	$html.= '</td>';
	$html.= '<td >';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'OBSERVACIONES';
	$html.="</strong>";
	$html.= '</center>';
	$html.= '</td>';
	$html.= '</tr>';
	$contador=1;
	while ($dato=mysqli_fetch_row($resSql))
{	
	$html.= '<tr>';
	$html.= '<td >';
	$html.= '<center>';
	$html.= $contador;
	$html.= '</center>';
	$html.= '</td>';
	
	$html.= '<td >';
	$html.=  mb_strtoupper($dato[0], "UTF-8");
	$html.= '</td>';
	
	$html.= '<td>';
	$html.= '<center>';
$html.=  mb_strtoupper($dato[1], "UTF-8");
    $html.= '</center>';
	$html.= '</td>';
	
	$html.= '<td>';
	$html.= '<center>';
	$html.=  mb_strtoupper(fechaesp1($dato[2])." al ".fechaesp($dato[3]), "UTF-8");
    $html.= '</center>';
	$html.= '</td>';
	
	$html.= '<td>';
	$html.= '<center>';
	$html.=  mb_strtoupper("I.T.C.G", "UTF-8");
    $html.= '</center>';
	$html.= '</td>';
	
	$html.= '<td>';
	$html.= '<center>';
	$html.= '30';
    $html.= '</center>';
	$html.= '</td>';
	
	//INSTRUCTORES
	$cadena="";
$sql1="SELECT ApellidoP,ApellidoN,Nombre,Area from PersonalRH where Emp=$dato[5]"; 
$resSql1=mysqli_query($con,$sql1); 
while ($dato1=mysqli_fetch_row($resSql1))
{	
	$cadena=$dato1[3];
	if($dato[6]=="")
	{
	$html.= '<td>';
	$html.= '<center>';
		$html.=  mb_strtoupper($dato1[0]." ".$dato1[1]." ".$dato1[2]." ", "UTF-8");
    $html.= '</center>';
	$html.= '</td>';
	}
		else
		{
			$sql2="SELECT ApellidoP,ApellidoM,Nombre from PersonalRH where Emp=$dato[6]"; 
			$resSql2=mysqli_query($con,$sql2); 
			while ($dato2=mysqli_fetch_row($resSql2))
				{	
				    $html.= '<td>';
					$html.= '<center>';
					$html.=  mb_strtoupper($dato1[0]." ".$dato1[1]." ".$dato1[2]."<br><br>".$dato2[0]." ".$dato2[1]." ".$dato2[2]."", "UTF-8");
   					$html.= '</center>';
					$html.= '</td>';
				}	
		}
	

	}
	$html.= '<td>';
	$html.= '<center>';
	
	$sqlD="SELECT dirigido_a from cursoRH where Nombre='$dato[0]'"; 

$resSqlD=mysqli_query($con,$sqlD); 
while ($datoD=mysqli_fetch_row($resSqlD))
{	
$diri=$datoD[0];
}
if($diri!="")
{
	 $html.= $diri;
}
else
{
	 $html.= $cadena;
}
   
    $html.= '</center>';
	$html.= '</td>';
	$html.= '<td>';
	$html.= '<center>';
	//$html.= $cadena;
    $html.= '</center>';
	$html.= '</td>';
	
	$html.= '</tr>';
	$contador=$contador+1;
	
	}
$html.= "  </div><br>";

$html.= '</table>';
$fecha_actual = localtime(time(), 1);
$anyo_actual  = $fecha_actual["tm_year"] + 1900;
$mes_actual   = $fecha_actual["tm_mon"] + 1;
$dia_actual   = $fecha_actual["tm_mday"]-1;
$html.= '
<center>
<div style="text-align:center;">
<table width="645" height="123" border="1" style="font-size:10px"CELLPADDING=0 CELLSPACING=0  align="center">
  <tr>
    <td width="315"><center>ELABORÓ</center></td>
    <td width="314"><center>APROBÓ</center></td>
  </tr>
  <tr>
    <td><br><br><br><center>'.$elaboro.'</center></td>
    <td><br><br><br><center>'.$aprobo.'</center></td>
  </tr>
  <tr>
    <td><center>Nombre y firma</center></td>
    <td><center>Nombre y firma</center></td>
  </tr>
  <tr>
          <td>Fecha:		'.fechaesp($aprobof).'</td>
    <td>Fecha:		'.fechaesp($elaborof).'</td>
  </tr>
</table>
</div>
</center>
  
  
  
  
</body></html>';
// $html.='<img id="myimg" src="piep.JPG" alt="Smiley face" align="middle">';
 

$mipdf = new DOMPDF();
$mipdf->set_paper("A4", "landscape");
$mipdf ->load_html(utf8_decode(utf8_encode($html)));
$mipdf ->render();
$mipdf ->stream('INFO DE CURSOS AÑO'.$a.' PERIODO ENERO - DICIEMBRE.pdf');
//$mipdf ->Image('sep.jpg',10,72,150);

 $pdf->Output();
 ?>


