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



	 $html.= '<meta http-equiv="content-type" content="text/html; charset=UTF-8">';

header('Content-type: text/html; charset=UTF-8');
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
//$html.= '<img id="myimg1" src="arribatodo.JPG" alt="Smiley face" align="top">';
$html.= '<img id="myimg1" src="arribatodo.JPG">';


//$html.= '<img src="sep.jpg"/>';
//$html.= '<img src="arribatodo.JPG"/>';
$html.='<div id="apDiv6"></div>';

$sql="select distinct maestro.ApellidoP,maestro.ApellidoM,maestro.nombre,matriculas.Eval from maestro, matriculas where matriculas.Curso = '$curso' and matriculas.Emp = maestro.emp order by maestro.ApellidoP"; 


$sql1="SELECT maestro.ApellidoP,maestro.ApellidoM,maestro.nombre FROM maestro INNER JOIN curso ON maestro.Emp = curso.instructor WHERE ( curso.instructor=maestro.Emp and curso.nombre='$curso')";

//$sql1nombre="SELECT maestro.nombre FROM maestro INNER JOIN curso ON maestro.Emp = curso.instructor WHERE ( curso.instructor=maestro.Emp and curso.nombre='$curso' )";

mysql_query( "SET lc_time_names = 'es_ES'" ); 
$query_getArchives = "SELECT DATE_FORMAT(  `CursoInicio` ,  '%d de %M ' ) AS modified_date
FROM curso where Nombre='$curso'";

mysql_query( "SET lc_time_names = 'es_ES'" ); 
$query_getArchives1 = "SELECT DATE_FORMAT(  `CursoFin` ,  '%d de %M de %Y' ) AS modified_date
FROM curso where Nombre='$curso'";

$resSql=mysql_query($sql); 

$resSql1=mysql_query($sql1); 
$html.= '<center>';	
$html.= "<h3>";
$html.= "$curso";
$html.= "</h3>";
$html.= '';
$html.= '<br>';
while ($dato1=mysql_fetch_row($resSql1))
{	

	$html.= $dato1[0]." ".$dato1[1]." ".$dato1[2];
	
}
$html.= '<br>';

$result = mysql_query($query_getArchives);  

$resultf = mysql_query($query_getArchives1);  

while ($dato12=mysql_fetch_row($result))
{	

	$html.= $dato12[0];
	
}
$html.= ' al ';
while ($dato121=mysql_fetch_row($resultf))
{	

	$html.= $dato121[0];
	
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
	$html.= '<td WIDTH="350">';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'NOMBRE';
	$html.="</strong>";
	$html.= '</center>';	
	$html.= '</td>';
	$html.= '<td >';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'EVALUACI??N';
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
	$html.= '<td WIDTH="350">';
	$html.= $dato[0]." ".$dato[1]." ".$dato[2];
	$html.= '</td>';
	$html.= '<td>';
	if($dato[3]==1)
	{
			$html.= "EVALU??";
	}
	if($dato[3]==0)
	{
			$html.= "NO HA EVALUADO";
	}

	$html.= '</td>';
	$html.= '</tr>';
	$contador=$contador+1;
}

$html.= "<br>";
while ($dato1=mysql_fetch_row($resSql1))
{	
	
	$html.= $dato1[0];
	
}
$html.= "<br>";	//$resSql1=mysql_query($sql1); 

$resultado = mysql_query("SELECT maestro.ApellidoP,maestro.ApellidoM,maestro.nombre FROM maestro INNER JOIN curso ON maestro.Emp = curso.instructor WHERE ( curso.instructor=maestro.Emp and curso.nombre='$curso' )
");
if (!$resultado) {
    echo 'No se pudo ejecutar la consulta: ' . mysql_error();
    exit;
}
$html.= '<br>';
$fila = mysql_fetch_row($resultado);
$html.= "<br>";
$html.= ' ';
$html.="<strong>";
$html.= 'INSTRUCTOR ';
$html.= $fila[0]." ".$fila[1]." ".$fila[2];
$html.="</strong>";
$html.= '<br>';
$html.= '</table>';
$html.='<img id="myimg" src="piep.JPG" alt="Smiley face" align="middle">';
$mipdf = new DOMPDF();
$mipdf ->set_paper("A4", "portrait");
$mipdf ->load_html(utf8_decode(utf8_encode($html)));
$mipdf ->render();
$mipdf ->stream('DOCENTES DEL CURSO '.$curso.'.pdf');
$pdf->Output();
 ?>
