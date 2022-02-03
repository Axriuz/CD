<?php
error_reporting(0);
$periodo=$_REQUEST['periodo'];
$a=$_REQUEST['a'];

if($periodo=="Todo el año")
{
	$periodo="";
}
else
{
	$periodo="and curso.Periodo='".$periodo."'";
}

$curso = $_POST["cursos"]; 
$usuario =$_SESSION['usuario'];

require('con.php');

require_once '../pdf/dompdf_config.inc.php';
	 $html.= '';
$html.= '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
$html.= '<link type="text/css" rel="stylesheet" href="CSSAREA.css" />';
$html.= '</head>';
header('Content-Type: text/html; charset=UTF-8');  
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
	//background-image: url(arribatodo.JPG);
}';
$html.='</style>';
$html.='<div id="apDiv6"></div>';
$sql="select distinct PersonalRH.nombre from PersonalRH, matriculasRH where matriculasRH.Curso = '$curso' and matriculasRH.Emp = PersonalRH.emp order by PersonalRH.nombre asc"; 

$sql1="SELECT PersonalRH.nombre FROM PersonalRH INNER JOIN cursoRH ON PersonalRH.Emp = cursoRH.instructor WHERE ( cursoRH.instructor=PersonalRH.Emp and cursoRH.nombre='$curso' )";

mysqli_query($con,"SET lc_time_names = 'es_ES'" ); 

$query_getArchives = "SELECT DATE_FORMAT(  `CursoInicio` ,  '%d de %M ' ) AS modified_date
FROM cursoRH where Nombre='$curso'";

mysqli_query($con,"SET lc_time_names = 'es_ES'" ); 

$query_getArchives1 = "SELECT DATE_FORMAT(  `CursoFin` ,  '%d de %M de %Y' ) AS modified_date
FROM cursoRH where Nombre='$curso'";

$resSql=mysqli_query($con,$sql); 
$resSql1=mysqli_query($con,$sql1); 
$html.= '<br>';
$html.= '';
$html.= '<br>';
$html.= '<br/>';
$html.= "<h3>";
$html.= "</h3>";
$html.= '<table width="530" height="85" border="1" CELLPADDING=5 CELLSPACING=0 align="center">';
 $html.= ' <tr>';
 $html.= '   <td rowspan="2"><center><img src="ITCGLOGO.jpg" width="50" height="50" HSPACE="10" VSPACE="10"/></center></td>
                <td>INSTITUTO TECNOL&Oacute;GICO DE CD. GUZM&Aacute;N</td>';
 $html.= '   <td rowspan="2">Codigo:ITCG-DP-PO-038-02</td>';
 $html.= ' </tr>';
 $html.= ' <tr>';
 $html.='   <td>SUBDIRECCI&Oacute;N ACAD&Eacute;MICA DEPARTAMENTO DE RECURSOS HUMANOS</td>';
 $html.= ' </tr>';
$html.= '</table>';
$html.= '<center>';	
$html.= '<h3>';


$html.= '</h3>';

$html.= "<br>";
$html.= "<br>";
$html.= "<h3>";
$html.= "</h3>";
$html.= '';
$html.= '<br>';
while ($dato1=mysqli_fetch_row($resSql1))
{	

	$html.= $dato1[0];
	
}
$html.= '<br>';

$result = mysqli_query($con,$query_getArchives);  

$resultf = mysqli_query($con,$query_getArchives1);  

while ($dato12=mysqli_fetch_row($result))
{	

	$html.= $dato12[0];
	
}
while ($dato121=mysqli_fetch_row($resultf  ))
{	

	$html.= $dato121[0];
	
}

//DIRECCIÓN
$sqlCB=mysqli_query($con,"SELECT COUNT( * ) AS total FROM PersonalRH WHERE  `Area` =  'Dirección'");
//$dataCB=mysqli_fetch_assoc($sqlCB);
//echo $dataCB['total'];
$TOTAL = mysqli_fetch_row($sqlCB); 

$sqlCBAP=mysqli_query($con,"SELECT count(distinct PersonalRH.nombre) FROM PersonalRH INNER JOIN matriculasRH ON PersonalRH.Emp = matriculasRH.Emp INNER JOIN cursoRH ON cursoRH.nombre = matriculasRH.curso WHERE PersonalRH.area ='Dirección' and YEAR(cursoRH.CursoInicio)=".$a." ".$periodo."");
$count = mysqli_fetch_row($sqlCBAP); 
$CBAP= (($count[0]*100)/$TOTAL[0]);



//Subdirección administrativa
$UNO=mysqli_query($con,"SELECT COUNT( * ) AS total FROM PersonalRH WHERE  `Area` =  'Subdirección administrativa'");
$DOS = mysqli_fetch_row($UNO); 
$TRES=mysqli_query($con,"SELECT count(distinct PersonalRH.nombre)  FROM PersonalRH INNER JOIN matriculasRH ON PersonalRH.Emp = matriculasRH.Emp INNER JOIN cursoRH ON cursoRH.nombre = matriculasRH.curso WHERE maestro.area ='Subdirección administrativa'and YEAR(cursoRH.CursoInicio)=".$a." ".$periodo."");
$CUATRO = mysqli_fetch_row($TRES); 
$CINCO= (($CUATRO[0]*100)/$DOS[0]);


//Subdirección académica
$NUEVE=mysqli_query($con,"SELECT COUNT( * ) AS total FROM PersonalRH WHERE  `Area` = 'Subdirección académica'");
$DIEZ = mysqli_fetch_row($NUEVE); 
$ONCE=mysqli_query($con,"SELECT count(distinct PersonalRH.nombre)  FROM PersonalRH INNER JOIN matriculasRH ON PersonalRH.Emp = matriculasRH.Emp INNER JOIN cursoRH ON cursoRH.nombre = matriculasRH.curso WHERE PersonalRH.area ='Subdirección académica'and YEAR(cursoRH.CursoInicio)=".$a." ".$periodo."");
$DOCE = mysqli_fetch_row($ONCE); 
$TRECE= (($DOCE[0]*100)/$DIEZ[0]);

//SUBDIRECCIÓN DE PLANEACIÓN
$N1=mysqli_query($con,"SELECT COUNT( * ) AS total FROM PersonalRH WHERE  `Area` =  'Subdirección de planeación'");
$N2 = mysqli_fetch_row($N1); 
$N3=mysqli_query($con,"SELECT count(distinct PersonalRH.nombre)  FROM PersonalRH INNER JOIN matriculasRH ON PersonalRH.Emp = matriculasRH.Emp INNER JOIN cursoRH ON cursoRH.nombre = matriculasRH.curso WHERE PersonalRH.area ='Subdirección de planeación'and YEAR(cursoRH.CursoInicio)=".$a." ".$periodo."");
$N4 = mysqli_fetch_row($N3); 
$N5= (($N4[0]*100)/$N2[0]);


//Recursos Humanos
$N11=mysqli_query($con,"SELECT COUNT( * ) AS total FROM PersonalRH WHERE  `Area` =  'Recursos Humanos'");
$N21 = mysqli_fetch_row($N11); 
$N31=mysqli_query($con,"SELECT count(distinct PersonalRH.nombre)  FROM PersonalRH INNER JOIN matriculasRH ON PersonalRH.Emp = matriculasRH.Emp INNER JOIN cursoRH ON cursoRH.nombre = matriculasRH.curso WHERE PersonalRH.area ='Recursos Humanos' and YEAR(cursoRH.CursoInicio)=".$a." ".$periodo."");
$N41 = mysqli_fetch_row($N31); 
$N51= (($N41[0]*100)/$N21[0]);


$html.= '</center>';	
		
$html.= '<table width="100" height="55" border="1" CELLPADDING=5 CELLSPACING=0 align="center" HSPACE="10" VSPACE="10">';
 $html.= ' <tr>';
   $html.= ' <td colspan="2"><p><strong align="center">&Aacute;REA </strong></p></td>';
   $html.= ' <td width="16" valign="top"><p ><strong>Total de empleados en el &aacute;rea</strong></p></td>';
   $html.= ' <td width="50" valign="top"><p > <strong>% de personal con cursos </strong></p></td>';
 $html.= ' </tr>';
 $html.= ' <tr>';
    $html.= '<td width="16"><p>1</p></td>';
    $html.= '<td width="150">DIRECCIÓN</td>';
    $html.= ' <td width="50" valign="top"><p>'.$TOTAL[0].'</p></td>';
    $html.= ' <td width="50" valign="top"><p>'.round($CBAP,2).' %</p></td>';
 $html.= ' </tr>';
 $html.= ' <tr>';
  $html.= ' <td width="16"><p>2</p></td>';
   $html.= ' <td width="150">SUBDIRECCIÓN ADMINISTRATIVA</td>';
   $html.= ' <td width="50" valign="top"><p>'.$DOS[0].'</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.round($CINCO,2).' %</p></td>';
  $html.= '</tr>';
  $html.= '<tr>';
   $html.= ' <td width="16"><p>3</p></td>';
   $html.= ' <td width="150">SUBDIRECCIÓN ACADÉMICA</td>';
   $html.= ' <td width="50" valign="top"><p>'.$DIEZ[0].'</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.round($TRECE,2).' %</p></td>';
 $html.= ' </tr>';
 $html.= ' <tr>';
    $html.= '<td width="16"><p>4</p></td>';
   $html.= ' <td width="150">SUBDIRECCIÓN DE PLANEACIÓN</td>';
    $html.= ' <td width="50" valign="top"><p>'.$N2[0].'</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.round($N5,2).' %</p></td>';
 $html.= ' </tr>';
  $html.= '<tr>';
  $html.= '  <td width="16"><p>5</p></td>';
  $html.= '  <td width="150">RECURSOS HUMANOS</td>';
  $html.= ' <td width="50" valign="top"><p>'.$N21[0].'</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.round($N51,2).' %</p></td>';
  $html.= '</tr>';
$html.= ' <tr>';
$TOTALUNO=$TOTAL[0]+$DOS[0]+$DIEZ[0]+$N2[0]+$N21[0];
$TOTALDOS=$count[0]+$CUATRO[0]+$DOCE[0]+$N4[0]+$N41[0];
$PORCENTAJEUNO=($TOTALDOS*100)/$TOTALUNO;

$html.= '<td width="16"><p>&nbsp;</p></td>';
$html.= '<td width="50"><p><strong align="right">Total</strong></p></td>';
$html.= '<td width="50" valign="top"><p><strong align="right">'.$TOTALUNO.'</strong></p></td>';
$html.= ' <td width="50" valign="top"><p><strong align="right">'.round($PORCENTAJEUNO,2).' %</strong></p></td>';
$html.= ' </tr>';
$html.= '</table>';

 
$mipdf = new DOMPDF();
$mipdf ->set_paper("A4", "portrait");
$mipdf ->load_html(utf8_decode(utf8_encode($html)));
$mipdf ->render();
$mipdf ->stream('CURSOS.pdf');
//$mipdf ->Image('sep.jpg',10,72,150);

 $pdf->Output();
 ?>
