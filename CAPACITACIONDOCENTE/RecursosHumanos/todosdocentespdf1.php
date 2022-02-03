<?php
error_reporting(0);
//$curso = $_POST["cursos"]; 

$consulta=$_REQUEST['consulta'];
$anio=$_REQUEST['anio'];
$periodo=$_REQUEST['periodo'];
 $usuario =$_SESSION['usuario'];

require('con.php');

require_once '../pdf/dompdf_config.inc.php';

 

$html.= '';

header('Content-type: text/html; charset=UTF-8');
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: /index.html'); 
  exit();
}


$consulta_mysqliN='select distinct * from curso where Activo = 1 and YEAR(CursoInicio)='.$anio.' and Periodo="'.$periodo.'"';
$resultado_consulta_fiN=mysqli_query($con,$consulta_mysqliN);
$filaN=mysqli_fetch_array($resultado_consulta_mysqliN);

while($filaN=mysqli_fetch_array($resultado_consulta_fiN))
{	
 
$curs=$filaN['Nombre'];


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
//CADA PDF
//$html.= '<img id="myimg1" src="arribatodo.JPG">';
$html.='<div id="apDiv6"></div>';

$sql="select distinct maestro.ApellidoP,maestro.ApellidoM,maestro.nombre from maestro, matriculas
where matriculas.Curso = '$curs'  and matriculas.Emp = maestro.emp 
and matriculas.Eval = '1'  and matriculas.Asistencia >= '4'
order by maestro.ApellidoP,maestro.ApellidoM,maestro.Nombre"; 

$sql1="SELECT maestro.ApellidoP,maestro.ApellidoM,maestro.nombre FROM maestro 
INNER JOIN curso ON maestro.Emp = curso.instructor 
WHERE ( curso.instructor=maestro.Emp and curso.nombre='$curs' )";

mysqli_query($con,"SET lc_time_names = 'es_ES'" ); 
$query_getArchives = "SELECT DATE_FORMAT(  `CursoInicio` ,  '%d de %M ' ) AS modified_date
FROM curso where Nombre='$curs'";

mysqli_query($con, "SET lc_time_names = 'es_ES'" ); 
$query_getArchives1 = "SELECT DATE_FORMAT(  `CursoFin` ,  '%d de %M de %Y' ) AS modified_date
FROM curso where Nombre='$curs'";

$resSql=mysqli_query($con,$sql); 

$resSql1=mysqli_query($con,$sql1); 
$html.= '<br><br><br><br>';	

$html.= '<center>';	
$html.= "<h3>";
//$html.= mb_strtoupper($curs, 'UTF-8');
$html.= mb_strtoupper($curs, 'UTF-8');
$html.= "</h3>";
$html.= '';
$html.= '<br>';
$NOMBRESINSTRUCTORES="";
while ($dato1=mysqli_fetch_row($resSql1))
{	

$INSTRUCTORES="";
$INSTRUCTORES1="";
$AUX="select InsAux from curso where Nombre='$curs' "; 
$resAUX=mysqli_query($con,$AUX);
   while ($datoAUX=mysqli_fetch_row($resAUX))
     {	
	 if($datoAUX[0]=="")
	     {
			 $INSTRUCTORES1="Instructor(a): "; 
		 }
	  else 
	     {$NOMAUX="select ApellidoP,ApellidoM,Nombre from maestro where Emp='$datoAUX[0]' "; 
          $resAUXN=mysqli_query($con,$NOMAUX);
 				while ($datoAUXN=mysqli_fetch_row( $resAUXN))
    			 {	
				 $INSTRUCTORES=$datoAUXN[0]." ".$datoAUXN[1]." ".$datoAUXN[2];
				 $INSTRUCTORES1="Instructores(as): ";
				 }
			 
			 
		}
     }

$NOMBRESINSTRUCTORES= $INSTRUCTORES1."". $INSTRUCTORES."<br>".$dato1[0]." ".$dato1[1]." ".$dato1[2];
$html.= $NOMBRESINSTRUCTORES;
	
}
$html.= '<br>';

$result = mysqli_query($con,$query_getArchives);  

$resultf = mysqli_query($con,$query_getArchives1);  

while ($dato12=mysqli_fetch_row($result))
{	

	$html.="Fecha: ".$dato12[0];
	
}
$html.= ' al ';
while ($dato121=mysqli_fetch_row($resultf  ))
{	

	$html.= $dato121[0];
	
}
$sqlhorario="select Horario,Horario1 from curso where Nombre='$curs'";
$resSqlhorario=mysqli_query($con,$sqlhorario); 
while ($datohorario=mysqli_fetch_row($resSqlhorario))
{
	
	$html.=" Horario: de ".$datohorario[0]." hrs a".$datohorario[1]." hrs";
	
}
$html.= '<br>';
$html.= 'DOCENTES QUE RECIBEN CONSTANCIA';


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
	$html.= '<td WIDTH="50">';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'NOMBRE';
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
	$html.= '<td WIDTH="50">';
	$html.= $dato[0]." ".$dato[1]." ".$dato[2];
	$html.= '</td>';
	$html.= '</td>';
	$html.= '</tr>';
	$contador=$contador+1;
}

$html.= "<br>";
while ($dato1=mysqli_fetch_row($resSql1))
{	
	
	$html.= $dato1[0];
	
}
$html.= "<br>";	

$resultado = mysqli_query($con,"SELECT maestro.ApellidoP,maestro.ApellidoM,maestro.nombre FROM maestro INNER JOIN curso ON maestro.Emp = curso.instructor WHERE ( curso.instructor=maestro.Emp and curso.nombre='$curs' )
");
if (!$resultado) {
    echo 'No se pudo ejecutar la consulta: ' . mysqli_error();
    exit;
}
$html.= '<br>';
$fila = mysqli_fetch_row($resultado);
$html.= "<br>";
$html.= ' ';
$html.="<strong>";
$html.= '';
	$html.= $NOMBRESINSTRUCTORES;
$html.="</strong>";
$html.= '<br>';

$html.= '</table>';
 $html.='<img id="myimg" src="piep.JPG" alt="Smiley face" align="middle">
 
 <div style="page-break-after:always;"></div>';
  
 //CREACION DEL PDF

}
$mipdf = new DOMPDF();
$mipdf ->set_paper("A4", "portrait");
$mipdf ->load_html(utf8_decode(utf8_encode($html)));
$mipdf ->render();
$mipdf ->stream(mb_strtoupper('CURSOS PERIODO '.$periodo.' ANIO '.$anio.'.pdf', 'UTF-8'));
$pdf->Output();
 
 ?>
