<?php
error_reporting(0);
$anio = $_POST["a"]; 
$p= $_POST["periodo"]; 
if($periodo=="Todo el año"){
    
}

 $usuario =$_SESSION['usuario'];

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

//Consulta que retorna la cantidad de curso en el periodo y año especificado.
$result= mysqli_query($con,"SELECT COUNT(*) total FROM cursoRH  where  Periodo='$p' and year(CursoInicio)='$anio'");
$total = mysqli_fetch_row($result);

$totalhoras=$total[0]*30;

//INSTRUCTORES MUJERES
$result2= mysqli_query($con,"SELECT COUNT(*) from PersonalRH inner join cursoRH on PersonalRH.Emp=cursoRH.Instructor and cursoRH.Periodo='$p' and year(CursoInicio)='$anio' and PersonalRH.sexo='Femenino'");
$total2 = mysqli_fetch_row($result2);
//ECHO $total2[0];

//INSTRUCTORES HOMBRES
$result3= mysqli_query($con,"SELECT COUNT(*) from PersonalRH inner join cursoRH on PersonalRH.Emp=cursoRH.Instructor and cursoRH.Periodo='$p' and year(CursoInicio)='$anio' and PersonalRH.sexo='Masculino'");
$total3 = mysqli_fetch_row($result3);
//ECHO $total3[0]; 

//Consulta que retorna la cantidad de mujeres que tomaron cursos en el periodo seleccionado 
$sqlsexF=mysqli_query($con,"SELECT COUNT(DISTINCT PersonalRH.Nombre,PersonalRH.ApellidoP) FROM PersonalRH inner join matriculasRH on PersonalRH.Emp=matriculasRH.Emp inner join cursoRH on matriculasRH.curso=cursoRH.nombre where cursoRH.Periodo='$p' and Year(cursoRH.CursoInicio)='$anio' and PersonalRH.sexo='Femenino'");
$totalF = mysqli_fetch_row($sqlsexF);
//echo $totalF[0];

//Consulta que retorna la cantidad de hombres que tomaron cursos en el periodo seleccionado 
$sqlsexM=mysqli_query($con,"SELECT COUNT(DISTINCT PersonalRH.Nombre,PersonalRH.ApellidoP) FROM PersonalRH inner join matriculasRH on PersonalRH.Emp=matriculasRH.Emp inner join cursoRH on matriculasRH.curso=cursoRH.nombre where cursoRH.Periodo='$p' and Year(cursoRH.CursoInicio)='$anio' and PersonalRH.sexo='Masculino'");
$totalM = mysqli_fetch_row($sqlsexM);
//echo $totalM[0];
   
  
$result4=mysqli_query($con,"SELECT COUNT(DISTINCT(emp)) from matriculasRH inner join cursoRH on matriculasRH.Curso=cursoRH.nombre and cursoRH.Periodo='$p' and year(CursoInicio)='$anio'");
$total4=mysqli_fetch_row($result4);
echo $total4[0];
$hcapacitacion=$total4[0]*30;

//Parte superio pdf
$html.= '<center>';	
$html.= "<h3>";
$html.= 'REPORTE GENERAL';
$html.= "</h3>";
$html.= '<br>';
$html.= utf8_decode(mb_strtoupper('AÑO: '.$anio." PERIODO: ".$p, "UTF-8"));
$html.= '</center>';	
$html.= "<br>";
$html.= "<br>";
//-------
$html.=utf8_decode( '

<table border= "1"  cellspacing="0" cellpadding="0" width="100%" height="100%">

  <tr>
    <td width="90%"></td>
	<td width="90%"><center>TOTAL</center></td>
  </tr> 

  <tr>
  	 <td width="90%">  CURSOS  </td>
	 <td WIDTH="90%"><center>'.$total[0].'</center></td>
   </tr>

   <tr>
	<td width="90%">  INSTRUCTORES MUJERES </td>
 	<td WIDTH="90%"><center>'.$total2[0].'</center></td>
   </tr>

   <tr>
   <td width="90%">  INSTRUCTORES HOMBRES </td>
    <td WIDTH="90%"><center>'.$total3[0].'</center></td>
    </tr>

   <tr>
	<td width="90%">  PARTICIPANTES MUJERES </td>
 	<td WIDTH="90%"><center>'.$totalF[0].'</center></td>
   </tr>

   <tr>
	<td width="90%">  PARTICIPANTES HOMBRES </td>
 	<td WIDTH="90%"><center>'.$totalM[0].'</center></td>
   </tr>

   <tr>
   <td width="90%">  HORAS </td>
    <td WIDTH="90%"><center>'.$totalhoras.'</center></td>
    </tr>
  
    <tr>
    <td width="90%">  HORAS TOTALES DE CAPACITACIÓN </td>
     <td WIDTH="90%"><center>'.$hcapacitacion.'</center></td>
     </tr>


  ');
 
 

	$html.= '</table>';


//parte inferior pdf
$html.='<img id="myimg" src="piep.JPG" alt="Smiley face" align="middle">';

$mipdf = new DOMPDF();
$mipdf ->set_paper("A4", "portrait");
$mipdf ->load_html(utf8_decode(utf8_encode($html)));
$mipdf ->render();
$mipdf ->stream('REPORTE GENERAL'.$anio.' PERIODO '.$p.'.pdf');
//$mipdf ->Image('sep.jpg',10,72,150);
 $pdf->Output();

?>



