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

/*
$host= "sigacitcg.com.mx"; 
$user = "sigacitc"; 
$pass= "Itcg11012016_2"; 
$conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query("SET NAMES UTF8");
*/

require('_con.php');

require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
	 $html.= '';
$html.= '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
$html.= '<link type="text/css" rel="stylesheet" href="CSSAREA.css" />';
$html.= '</head>';
header('Content-Type: text/html; charset=UTF-8');  
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
	//background-image: url(arribatodo.JPG);
}';
$html.='</style>';
$html.='<div id="apDiv6"></div>';
$sql="select distinct maestro.nombre from maestro, matriculas where matriculas.Curso = '$curso' and matriculas.Emp = maestro.emp order by maestro.nombre asc"; 

$sql1="SELECT maestro.nombre FROM maestro INNER JOIN curso ON maestro.Emp = curso.instructor WHERE ( curso.instructor=maestro.Emp and curso.nombre='$curso' )";

mysqli_query($con,"SET lc_time_names = 'es_ES'" ); 

$query_getArchives = "SELECT DATE_FORMAT(  `CursoInicio` ,  '%d de %M ' ) AS modified_date
FROM curso where Nombre='$curso'";

mysqli_query($con,"SET lc_time_names = 'es_ES'" ); 

$query_getArchives1 = "SELECT DATE_FORMAT(  `CursoFin` ,  '%d de %M de %Y' ) AS modified_date
FROM curso where Nombre='$curso'";

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
 $html.='   <td>SUBDIRECCI&Oacute;N ACAD&Eacute;MICA DEPARTAMENTO DE DESARROLLO ACAD&Eacute;MICO</td>';
 $html.= ' </tr>';
$html.= '</table>';
$html.= '<center>';	
$html.= '<h3>';

$html.= '<br>Porcentaje de cumplimiento de Actualización Profesional y Formación Docente';

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

//CIENCIAS BASICAS
$sqlCB=mysqli_query($con,"SELECT COUNT( * ) AS total FROM maestro WHERE  `Area` =  'Ciencias Basicas'");
//$dataCB=mysqli_fetch_assoc($sqlCB);
//echo $dataCB['total'];
$TOTAL = mysqli_fetch_row($sqlCB); 

$sqlCBAP=mysqli_query($con,"SELECT count(distinct maestro.nombre) FROM maestro INNER JOIN matriculas ON maestro.Emp = matriculas.Emp INNER JOIN curso ON curso.nombre = matriculas.curso WHERE ( curso.TipoCurso = 'Actualizacion Profesional' AND maestro.area ='Ciencias Basicas') and YEAR(curso.CursoInicio)=".$a." ".$periodo."");
$count = mysqli_fetch_row($sqlCBAP); 
//$sqlPAD=mysqli_query("SELECT COUNT( * )  FROM matriculas INNER JOIN maestro ON maestro.Emp = matriculas.Emp INNER JOIN curso ON curso.nombre = matriculas.curso WHERE curso.TipoCurso =  'Actualizacion Profesional'");
//$count1 = mysqli_fetch_row($sqlPAD); 
$CBAP= (($count[0]*100)/$TOTAL[0]);
//+++++++++++++++++++++++
$sqlCBFD=mysqli_query($con,"SELECT count(distinct maestro.nombre) AS total FROM maestro INNER JOIN matriculas ON maestro.Emp = matriculas.Emp INNER JOIN curso ON curso.nombre = matriculas.curso WHERE ( curso.TipoCurso =  'Formacion Docente' AND maestro.area = 'Ciencias Basicas' )");
$count2 = mysqli_fetch_row($sqlCBFD); 
//$sqlPFD=mysqli_query("SELECT COUNT( * ) AS total FROM matriculas INNER JOIN maestro ON maestro.Emp = matriculas.Emp INNER JOIN curso ON curso.nombre = matriculas.curso WHERE curso.TipoCurso =  'Formacion Docente'");
//$count3 = mysqli_fetch_row($sqlPFD); 
$CBFD= (($count2[0]*100)/$TOTAL[0]);
//+++++++++++++++++++++++
//Ciencias de la tierra+++++++++++++++++++++++++++++++++++++++++++
$UNO=mysqli_query($con,"SELECT COUNT( * ) AS total FROM maestro WHERE  `Area` =  'Ciencias de la Tierra'");
$DOS = mysqli_fetch_row($UNO); 
$TRES=mysqli_query($con,"SELECT count(distinct maestro.nombre)  FROM maestro INNER JOIN matriculas ON maestro.Emp = matriculas.Emp INNER JOIN curso ON curso.nombre = matriculas.curso WHERE ( curso.TipoCurso =  'Actualizacion Profesional' AND maestro.area ='Ciencias de la Tierra')and YEAR(curso.CursoInicio)=".$a." ".$periodo."");
$CUATRO = mysqli_fetch_row($TRES); 
$CINCO= (($CUATRO[0]*100)/$DOS[0]);
$SEIS=mysqli_query($con,"SELECT count(distinct maestro.nombre) AS total FROM maestro INNER JOIN matriculas ON maestro.Emp = matriculas.Emp INNER JOIN curso ON curso.nombre = matriculas.curso WHERE ( curso.TipoCurso =  'Formacion Docente' AND maestro.area = 'Ciencias de la Tierra' )");
$SIETE= mysqli_fetch_row($SEIS); 
$OCHO= (($SIETE[0]*100)/$DOS[0]);
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//Ciencias Eco-Adminis+++++++++++++++++++++++++++++++++++++++++++
$NUEVE=mysqli_query($con,"SELECT COUNT( * ) AS total FROM maestro WHERE  `Area` =  'Ciencias Eco-Adminis'");
$DIEZ = mysqli_fetch_row($NUEVE); 
$ONCE=mysqli_query($con,"SELECT count(distinct maestro.nombre)  FROM maestro INNER JOIN matriculas ON maestro.Emp = matriculas.Emp INNER JOIN curso ON curso.nombre = matriculas.curso WHERE ( curso.TipoCurso =  'Actualizacion Profesional' AND maestro.area ='Ciencias Eco-Adminis')and YEAR(curso.CursoInicio)=".$a." ".$periodo."");
$DOCE = mysqli_fetch_row($ONCE); 
$TRECE= (($DOCE[0]*100)/$DIEZ[0]);
$CATORCE=mysqli_query($con,"SELECT count(distinct maestro.nombre) AS total FROM maestro INNER JOIN matriculas ON maestro.Emp = matriculas.Emp INNER JOIN curso ON curso.nombre = matriculas.curso WHERE ( curso.TipoCurso =  'Formacion Docente' AND maestro.area = 'Ciencias Eco-Adminis' )");
$QUINCE= mysqli_fetch_row($CATORCE); 
$DIEZSEIS= (($QUINCE[0]*100)/$DIEZ[0]);
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//Ciencias Eco-Administrativas+++++++++++++++++++++++++++++++++++++++++++
$N1=mysqli_query($con,"SELECT COUNT( * ) AS total FROM maestro WHERE  `Area` =  'Ciencias Eco-Administrativas'");
$N2 = mysqli_fetch_row($N1); 
$N3=mysqli_query($con,"SELECT count(distinct maestro.nombre)  FROM maestro INNER JOIN matriculas ON maestro.Emp = matriculas.Emp INNER JOIN curso ON curso.nombre = matriculas.curso WHERE ( curso.TipoCurso =  'Actualizacion Profesional' AND maestro.area ='Ciencias Eco-Administrativas')and YEAR(curso.CursoInicio)=".$a." ".$periodo."");
$N4 = mysqli_fetch_row($N3); 
$N5= (($N4[0]*100)/$N2[0]);
$N6=mysqli_query($con,"SELECT count(distinct maestro.nombre) AS total FROM maestro INNER JOIN matriculas ON maestro.Emp = matriculas.Emp INNER JOIN curso ON curso.nombre = matriculas.curso WHERE ( curso.TipoCurso =  'Formacion Docente' AND maestro.area = 'Ciencias Eco-Administrativas' )");
$N7= mysqli_fetch_row($N6); 
$N8= (($N7[0]*100)/$N2[0]);
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//Eléctrica y Electrónica
$N11=mysqli_query($con,"SELECT COUNT( * ) AS total FROM maestro WHERE  `Area` =  'Electrica y Electronica'");
$N21 = mysqli_fetch_row($N11); 
$N31=mysqli_query($con,"SELECT count(distinct maestro.nombre)  FROM maestro INNER JOIN matriculas ON maestro.Emp = matriculas.Emp INNER JOIN curso ON curso.nombre = matriculas.curso WHERE ( curso.TipoCurso =  'Actualizacion Profesional' AND maestro.area ='Electrica y Electronica')and YEAR(curso.CursoInicio)=".$a." ".$periodo."");
$N41 = mysqli_fetch_row($N31); 
$N51= (($N41[0]*100)/$N21[0]);
$N61=mysqli_query($con,"SELECT count(distinct maestro.nombre) AS total FROM maestro INNER JOIN matriculas ON maestro.Emp = matriculas.Emp INNER JOIN curso ON curso.nombre = matriculas.curso WHERE ( curso.TipoCurso =  'Formacion Docente' AND maestro.area = 'Electrica y Electronica' )");
$N71= mysqli_fetch_row($N61); 
$N81= (($N71[0]*100)/$N21[0]);
//Industrial
$N111=mysqli_query($con,"SELECT COUNT( * ) AS total FROM maestro WHERE  `Area` =  'Industrial'");
$N211 = mysqli_fetch_row($N111); 
$N311=mysqli_query($con,"SELECT count(distinct maestro.nombre)  FROM maestro INNER JOIN matriculas ON maestro.Emp = matriculas.Emp INNER JOIN curso ON curso.nombre = matriculas.curso WHERE ( curso.TipoCurso =  'Actualizacion Profesional' AND maestro.area ='Industrial')and YEAR(curso.CursoInicio)=".$a." ".$periodo."");
$N411 = mysqli_fetch_row($N311); 
$N511= (($N411[0]*100)/$N211[0]);
$N611=mysqli_query($con,"SELECT count(distinct maestro.nombre) AS total FROM maestro INNER JOIN matriculas ON maestro.Emp = matriculas.Emp INNER JOIN curso ON curso.nombre = matriculas.curso WHERE ( curso.TipoCurso =  'Formacion Docente' AND maestro.area = 'Industrial' )");
$N711= mysqli_fetch_row($N611); 
$N811= (($N711[0]*100)/$N211[0]);
//Metal-Mecanica
$N1111=mysqli_query($con,"SELECT COUNT( * ) AS total FROM maestro WHERE  `Area` =  'Metal-Mecanica'");
$N2111 = mysqli_fetch_row($N1111); 
$N3111=mysqli_query($con,"SELECT count(distinct maestro.nombre)  FROM maestro INNER JOIN matriculas ON maestro.Emp = matriculas.Emp INNER JOIN curso ON curso.nombre = matriculas.curso WHERE ( curso.TipoCurso =  'Actualizacion Profesional' AND maestro.area ='Metal-Mecanica')and YEAR(curso.CursoInicio)=".$a." ".$periodo."");
$N4111 = mysqli_fetch_row($N3111); 
$N5111= (($N4111[0]*100)/$N2111[0]);
$N6111=mysqli_query($con,"SELECT count(distinct maestro.nombre) AS total FROM maestro INNER JOIN matriculas ON maestro.Emp = matriculas.Emp INNER JOIN curso ON curso.nombre = matriculas.curso WHERE ( curso.TipoCurso =  'Formacion Docente' AND maestro.area = 'Metal-Mecanica' )");
$N7111= mysqli_fetch_row($N6111); 
$N8111= (($N7111[0]*100)/$N2111[0]);
//Sistemas y Computación
$N11111=mysqli_query($con,"SELECT COUNT( * ) AS total FROM maestro WHERE  `Area` =  'Sistemas y Computacion'");
$N21111 = mysqli_fetch_row($N11111); 
$N31111=mysqli_query($con,"SELECT count(distinct maestro.nombre)  FROM maestro INNER JOIN matriculas ON maestro.Emp = matriculas.Emp INNER JOIN curso ON curso.nombre = matriculas.curso WHERE ( curso.TipoCurso =  'Actualizacion Profesional' AND maestro.area ='Sistemas y Computación')and YEAR(curso.CursoInicio)=".$a." ".$periodo."");
$N41111 = mysqli_fetch_row($N31111); 
$N51111= (($N41111[0]*100)/$N21111[0]);
$N61111=mysqli_query($con,"SELECT count(distinct maestro.nombre) AS total FROM maestro INNER JOIN matriculas ON maestro.Emp = matriculas.Emp INNER JOIN curso ON curso.nombre = matriculas.curso WHERE ( curso.TipoCurso =  'Formacion Docente' AND maestro.area = 'Sistemas y Computación' )");
$N71111= mysqli_fetch_row($N61111); 
$N81111= (($N71111[0]*100)/$N21111[0]);


$html.= '</center>';	
		
$html.= '<table width="100" height="55" border="1" CELLPADDING=5 CELLSPACING=0 align="center" HSPACE="10" VSPACE="10">';
 $html.= ' <tr>';
   $html.= ' <td colspan="2"><p><strong align="center">&Aacute;REA </strong></p></td>';
   $html.= ' <td width="16" valign="top"><p ><strong>Total de docentes en el &aacute;rea</strong></p></td>';
   $html.= ' <td width="50" valign="top"><p ><strong>Actualizaci&oacute;n Profesional</strong></p></td>';
   $html.= ' <td width="50" valign="top"><p > <strong>% de docentes con cursos de AP</strong></p></td>';
   $html.= ' <td width="50" valign="top"><p ><strong>Formaci&oacute;n Docente</strong><strong> </strong></p></td>';
   $html.= ' <td width="50" valign="top"><p ><strong>% de docentes con cursos de FD</strong></p></td>';
 $html.= ' </tr>';
 $html.= ' <tr>';
    $html.= '<td width="16"><p>1</p></td>';
    $html.= '<td width="150">Cs. B&aacute;sicas</td>';
    $html.= ' <td width="50" valign="top"><p>'.$TOTAL[0].'</p></td>';
    $html.= ' <td width="50" valign="top"><p>'.$count[0].'</p></td>';
    $html.= ' <td width="50" valign="top"><p>'.round($CBAP,2).' %</p></td>';
    $html.= ' <td width="50" valign="top"><p>'.$count2[0].'</p></td>';
    $html.= ' <td width="50" valign="top"><p>'.round($CBFD,2).' %</p></td>';
 $html.= ' </tr>';
 $html.= ' <tr>';
  $html.= ' <td width="16"><p>2</p></td>';
   $html.= ' <td width="150">Cs de la Tierra</td>';
   $html.= ' <td width="50" valign="top"><p>'.$DOS[0].'</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.$CUATRO[0].'</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.round($CINCO,2).' %</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.$SIETE[0].'</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.round($OCHO,2).' %</p></td>';
  $html.= '</tr>';
  $html.= '<tr>';
   $html.= ' <td width="16"><p>3</p></td>';
   $html.= ' <td width="150">Cs Eco-Administrativas</td>';
   $html.= ' <td width="50" valign="top"><p>'.$N2[0].'</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.$N4[0].'</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.round($N5,2).' %</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.$N7[0].'</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.round($N8,2).' %</p></td>';
 $html.= ' </tr>';
 $html.= ' <tr>';
    $html.= '<td width="16"><p>4</p></td>';
   $html.= ' <td width="150">Eléctrica y Electrónica</td>';
    $html.= ' <td width="50" valign="top"><p>'.$N21[0].'</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.$N41[0].'</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.round($N51,2).' %</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.$N71[0].'</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.round($N81,2).' %</p></td>';
 $html.= ' </tr>';
  $html.= '<tr>';
  $html.= '  <td width="16"><p>5</p></td>';
  $html.= '  <td width="150">Industrial</td>';
  $html.= ' <td width="50" valign="top"><p>'.$N211[0].'</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.$N411[0].'</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.round($N511,2).' %</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.$N711[0].'</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.round($N811,2).' %</p></td>';
  $html.= '</tr>';
  $html.= '<tr>';
    $html.= '<td width="16"><p>6</p></td>';
    $html.= '<td width="150">Metal-Mecánica</td>';
  $html.= ' <td width="50" valign="top"><p>'.$N2111[0].'</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.$N4111[0].'</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.round($N5111,2).' %</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.$N7111[0].'</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.round($N8111,2).' %</p></td>';
  $html.= '</tr>';
 $html.= ' <tr>';
   $html.= ' <td width="16"><p>7</p></td>';
   $html.= ' <td width="150" >Sistemas y Computación</td>';
   $html.= ' <td width="50" valign="top"><p>'.$N21111[0].'</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.$N41111[0].'</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.round($N51111,2).' %</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.$N71111[0].'</p></td>';
   $html.= ' <td width="50" valign="top"><p>'.round($N81111,2).' %</p></td>';
 $html.= ' </tr>';
$html.= ' <tr>';
$TOTALUNO=$TOTAL[0]+$DOS[0]+$DIEZ[0]+$N2[0]+$N21[0]+$N211[0]+$N2111[0]+$N21111[0];
$TOTALDOS=$count[0]+$CUATRO[0]+$DOCE[0]+$N4[0]+$N41[0]+$N411[0]+$N4111[0]+$N41111[0];
$PORCENTAJEUNO=($TOTALDOS*100)/$TOTALUNO;
$TOTALTRES=$count2[0]+$SIETE[0]+$QUINCE[0]+$N7[0]+$N71[0]+$N711[0]+$N7111[0]+$N71111[0];
$PORCENTAJEDOS=($TOTALTRES*100)/$TOTALUNO;
$html.= '<td width="16"><p>&nbsp;</p></td>';
$html.= '<td width="50"><p><strong align="right">Total</strong></p></td>';
$html.= '<td width="50" valign="top"><p><strong align="right">'.$TOTALUNO.'</strong></p></td>';
$html.= '<td width="50" valign="top"><p><strong align="right">'.$TOTALDOS.'</strong></p></td>';
$html.= ' <td width="50" valign="top"><p><strong align="right">'.round($PORCENTAJEUNO,2).' %</strong></p></td>';
$html.= ' <td width="50" valign="top"><p><strong align="right">'.$TOTALTRES.'</strong></p></td>';
$html.= ' <td width="50" valign="top"><p><strong align="right"></strong>'.round($PORCENTAJEDOS,2).'%</p></td>';
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
