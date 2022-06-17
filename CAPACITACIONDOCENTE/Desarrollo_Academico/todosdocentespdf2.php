<?php
error_reporting(0);
//$curso = $_POST["cursos"]; 

$consulta=$_REQUEST['consulta'];
$anio=$_REQUEST['anio'];
$periodo=$_REQUEST['periodo'];
 $usuario =$_SESSION['usuario'];
/*$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query($con,"SET NAMES UTF8");

*/

require('_con.php');
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;



	 $html.= '';

header('Content-type: text/html; charset=UTF-8');
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$consulta_mysqliN='select distinct * from curso where Activo = 1 and YEAR(CursoInicio)='.$anio.' and Periodo="'.$periodo.'"';
$resultado_consulta_mysqliN=mysqli_query($con,$consulta_mysqliN);
while($filaN=mysqli_fetch_array($resultado_consulta_mysqliN))
{	
$curso=$filaN['Nombre'];
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
$sql="SELECT maestro.ApellidoP,maestro.ApellidoM,maestro.nombre FROM maestro INNER JOIN matriculas ON maestro.Emp = matriculas.Emp INNER JOIN curso ON curso.nombre = matriculas.curso WHERE ( matriculas.curso =  '$curso' AND Constacia =  'Pendiente (Sin Elaborar)' ) order by maestro.ApellidoP,maestro.ApellidoM,maestro.Nombre"; 

$sql1="SELECT maestro.ApellidoP,maestro.ApellidoM,maestro.nombre FROM maestro INNER JOIN curso ON maestro.Emp = curso.instructor WHERE ( curso.instructor=maestro.Emp and curso.nombre='$curso' )";
//$sql1nombre="SELECT maestro.nombre FROM maestro INNER JOIN curso ON maestro.Emp = curso.instructor WHERE ( curso.instructor=maestro.Emp and curso.nombre='$curso' )";

mysqli_query($con, "SET lc_time_names = 'es_ES'" ); 
$query_getArchives = "SELECT DATE_FORMAT(  `CursoInicio` ,  '%d de %M ' ) AS modified_date
FROM curso where Nombre='$curso'";

mysqli_query($con, "SET lc_time_names = 'es_ES'" ); 
$query_getArchives1 = "SELECT DATE_FORMAT(  `CursoFin` ,  '%d de %M de %Y' ) AS modified_date
FROM curso where Nombre='$curso'";

$resSql=mysqli_query($con,$sql); 
//$resSqlnombre=mysqli_query($con,$sqlnombre); 

$resSql1=mysqli_query($con,$sql1); 
$html.= '<br><br><br><br>';	

$html.= '<center>';	


$html.= "<h3>";
$html.=$curso;
$html.= "</h3>";
$html.= '';
$html.= '<br>';
$NOMBRESINSTRUCTORES="";
while ($dato1=mysqli_fetch_row($resSql1))
{	
$INSTRUCTORES="";
$INSTRUCTORES1="";
$AUX="select InsAux from curso where Nombre='$curso' "; 
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

	$html.= "Fecha: ".$dato12[0];
	
}
$html.= ' al ';
while ($dato121=mysqli_fetch_row($resultf  ))
{	

	$html.= $dato121[0];
	
}

$sqlhorario="select Horario,Horario1 from curso where Nombre='$curso'";
$resSqlhorario=mysqli_query($con,$sqlhorario); 
while ($datohorario=mysqli_fetch_row($resSqlhorario))
{
	
	$html.=" Horario: de ".$datohorario[0]." hrs a".$datohorario[1]." hrs";
	
}


$html.= '<br>';
$html.= 'LISTA DE DOCENTES CON CONSTANCIAS PENDIENTES (SIN ELABORAR)';


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
	//$html.= '<td WIDTH="50">';
	$html.= '</td>';
	$html.= '</tr>';
	$contador=$contador+1;
}

$html.= "<br>";
while ($dato1=mysqli_fetch_row($resSql1))
{	
	
	$html.= $dato1[0];
	
}
$html.= "<br>";	//$resSql1=mysqli_query($con,$sql1); 

$resultado = mysqli_query($con,"SELECT maestro.ApellidoP,maestro.ApellidoM,maestro.nombre FROM maestro INNER JOIN curso ON maestro.Emp = curso.instructor WHERE ( curso.instructor=maestro.Emp and curso.nombre='$curso' )
");
if (!$resultado) {
    echo 'No se pudo ejecutar la consulta: ' ;
    exit;
}
$html.= '<br>';
$fila = mysqli_fetch_row($resultado);
$html.= "<br>";
$html.= ' ';
$html.="<strong>";
$html.= '';
	$html.= utf8_decode($NOMBRESINSTRUCTORES);
$html.="</strong>";
$html.= '<br>';
	

$html.= '</table>';

	//while ($dato1nombre=mysqli_fetch_row($resSql1nombre))
//{	

//$html.= $dato1nombre[0];
//}




 //$html.= '<img src="piep.JPG"/>';
$html.='<img id="myimg" src="piep.JPG" alt="Smiley face" align="middle">
 
 <div style="page-break-after:always;"></div>';
  
 //CREACION DEL PDF

}
$mipdf = new DOMPDF();
$mipdf ->set_paper("A4", "portrait");
$mipdf ->load_html(utf8_decode(utf8_encode($html)));
$mipdf ->render();
$mipdf ->stream(mb_strtoupper('CURSOS PERIODO '.$periodo.' AÑO '.$anio.'.pdf', 'UTF-8'));
$pdf->Output();
 
 ?>

