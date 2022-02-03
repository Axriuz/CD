<?php
error_reporting(0);

$anio = $_POST["anio"]; 
$p= $_POST["periodo"]; 

/*
 $usuario =$_SESSION['usuario'];
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query($con,"SET NAMES UTF8");
*/

require('con.php');

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

$sql1="select count(T1.Id_matricula) from matriculas T1 inner join curso T2 ON T2.Nombre=T1.Curso WHERE T2.Periodo='".$p."' and year(CursoInicio)=".$anio." and TipoCurso='Formacion Docente'";
 
 $sql1F="select count(T1.Id_matricula) from matriculas T1 inner join curso T2 ON T2.Nombre=T1.Curso inner join maestro T3 on T3.Emp=T1.Emp WHERE T2.Periodo='".$p."' and year(CursoInicio)=".$anio." and TipoCurso='Formacion Docente' and Sexo='Femenino'";    
 $sql1M="select count(T1.Id_matricula) from matriculas T1 inner join curso T2 ON T2.Nombre=T1.Curso inner join maestro T3 on T3.Emp=T1.Emp WHERE T2.Periodo='".$p."' and year(CursoInicio)=".$anio." and TipoCurso='Formacion Docente' and Sexo='Masculino'";
     
     
         
     
     
     //  select count(T1.Id_matricula) from matriculas T1 inner join curso T2 ON T2.Nombre=T1.Curso WHERE T2.Periodo='Enero - Mayo' and year(CursoInicio)=2017 and TipoCurso='Formacion Docente'
$sql2="select count(T1.Id_matricula) from matriculas T1 inner join curso T2 ON T2.Nombre=T1.Curso WHERE T2.Periodo='".$p."' and year(CursoInicio)=".$anio." and TipoCurso='Actualizacion Profesional'";
$sql2F="select count(T1.Id_matricula) from matriculas T1 inner join curso T2 ON T2.Nombre=T1.Curso inner join maestro T3 on T3.Emp=T1.Emp WHERE T2.Periodo='".$p."' and year(CursoInicio)=".$anio." and TipoCurso='Actualizacion Profesional' and Sexo='Femenino'";
$sql2M="select count(T1.Id_matricula) from matriculas T1 inner join curso T2 ON T2.Nombre=T1.Curso inner join maestro T3 on T3.Emp=T1.Emp WHERE T2.Periodo='".$p."' and year(CursoInicio)=".$anio." and TipoCurso='Actualizacion Profesional' and Sexo='Masculino'";

$html.= "<br>";

$resSql1=mysqli_query($con,$sql1); 
$resSql1F=mysqli_query($con,$sql1F); 
$resSql1M=mysqli_query($con,$sql1M);

$resSql2=mysqli_query($con,$sql2); 
$resSql2F=mysqli_query($con,$sql2F); 
$resSql2M=mysqli_query($con,$sql2M); 
mysqli_query($con,"SET NAMES 'utf-8'");

//$html.= "<br>";
//$html.= "<br>";
$html.= '<center>';	
$html.= "<h3>";
$html.= utf8_decode('ESTADÍSTICO ');
$html.= "</h3>";
$html.= '<br>';
$html.= utf8_decode(mb_strtoupper('AÑO: '.$anio." PERIODO: ".$p, "UTF-8"));
$html.= '</center>';	
$html.= "<br>";
		
		/**/
$html.= '	<table border= "1"  cellspacing="0" cellpadding="0" width="100%" height="100%">
  <tr>
    <td colspan="2"><center><strong>Actualizacion Profesional</strong></center></td>
  </tr>
  <tr>
    <td width="90%">Mujeres</td>
    <td width="90%">
   ';
      	while ($dato2F=mysqli_fetch_row($resSql2F))
{
    $html.= '<center>'.$dato2F[0].'</center>';
}
   
    $html.= ' </td>
  </tr>
  <tr>
    <td width="90%">Hombres</td>
    <td width="90%">';
    
    	while ($dato2M=mysqli_fetch_row($resSql2M))
{
    $html.='<center>'.$dato2M[0].'</center>';
}
   $html.= ' </td>
  </tr>
  <tr>
   <td width="90%"><strong>TOTAL: </strong>
    
    
    
   </td>
    <td width="90%">';
    
      	while ($dato2=mysqli_fetch_row($resSql2))
{
    $html.= '<center>'.$dato2[0].'</center>';
}
   
   $html.='  </td>
  </tr>
</table>';			

$html.= "<br>";
$html.= "<br>";

$html.= '	<table border= "1"  cellspacing="0" cellpadding="0" width="100%" height="100%">
  <tr>
    <td colspan="2"><center><strong>Formación Docente</strong></center></td>
  </tr>
  <tr>
    <td width="90%">Mujeres</td>
    <td width="90%">';
      	while ($dato1F=mysqli_fetch_row($resSql1F))
{
    $html.= '<center>'.$dato1F[0].'</center>';
}
    
    $html.= ' </td>
  </tr>
  <tr>
    <td width="90%">Hombres</td>
    <td width="90%">';
       	while ($dato1F=mysqli_fetch_row($resSql1M))
{
    $html.= '<center>'.$dato1F[0].'</center>';
}
    
     $html.= '</td>
  </tr>
  <tr>
    <td width="90%"><strong>TOTAL:</strong> ';
    
    
    
  $html.= '  </td>
    <td width="90%">';
    	while ($dato1=mysqli_fetch_row($resSql1))
{
    $html.= '<center>'.$dato1[0].'</center>';
}
    
    
    $html.= '  </td>
  </tr>
</table>';
		
		/**/
		
		

 $html.='<img id="myimg" src="piep.JPG" alt="Smiley face" align="middle">';
 
$mipdf = new DOMPDF();
$mipdf ->set_paper("A4", "portrait");
$mipdf ->load_html(utf8_decode(utf8_encode($html)));
$mipdf ->render();
$mipdf ->stream('ESTADÍSTICO  AÑO '.$anio.' PERIODO '.$p.'.pdf');
//$mipdf ->Image('sep.jpg',10,72,150);
 $pdf->Output();
 ?>
