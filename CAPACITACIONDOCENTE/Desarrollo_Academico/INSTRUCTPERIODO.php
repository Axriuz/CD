<?php
error_reporting(0);
$curso = $_POST["cursos"]; 
$anio= $_POST["a"]; 
$p= $_POST["periodo"]; 

 $usuario =$_SESSION['usuario'];

$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $conexion);
mysql_query("SET NAMES UTF8");


require_once '../pdf/dompdf_config.inc.php';



	 $html.= '';

header('Content-type: text/html; charset=UTF-8');
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
	background-image: url(arribatodo.JPG);
}';
$html.='</style>';
$html.= '<img id="myimg1" src="arribatodo.JPG">';

$html.='<div id="apDiv6"></div>';
mysql_query( "SET lc_time_names = 'es_ES'" );

$sql="select maestro.ApellidoP,maestro.ApellidoM,maestro.nombre, curso.Nombre, 
DATE_FORMAT(curso.CursoInicio ,  '%d de %M ' ) AS modified_date,DATE_FORMAT(  curso.CursoFin ,  '%d de %M de %Y' ) 
AS modified_date, curso.InsAux 
from maestro inner join curso on maestro.Emp=curso.Instructor  
where (`validado`=1 and `Activo`=1) and Year(CursoInicio)='$anio' and curso.Periodo='$p' order by month(CursoInicio) "; 
$resSql=mysql_query($sql); 
//$resSqlnombre=mysql_query($sqlnombre); 
 //$html.="".$sql;


$html.= '<center>';	
//$html.= '<h3>';

//$html.= '<br>';

//$html.= '</h3>';

//$html.= "<br>";
//$html.= "<br>";
//$html.= "<h3>";
//$html.= "$curso";
//$html.= "</h3>";
$html.= '';
//$html.= '<br>';

//$html.= '<br>';

	$html.="<strong>";
$html.= 'INSTRUCTORES Y CURSOS';

	$html.="</strong>";
$html.= '<br>';

$html.= 'ACTIVADOS Y VALIDADOS';
$html.= '<br>';


$html.= '</center>';	


$html.= "<br>";
$html.= "<br>";
		
	$html.= '<table border= "1" cellpadding="0" cellspacing="0"  width="100%" height="100%">';
	$html.= '<tr>';
	$html.= '<td WIDTH="5">';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'NOMBRE';
	$html.="</strong>";
	$html.= '</center>';	
	$html.= '</td>';
	$html.= '<td WIDTH="50">';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'CURSO';
	$html.="</strong>";
	$html.= '</center>';	
	$html.= '</td>';
	$html.= '<td WIDTH="50">';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'FECHA';
	$html.="</strong>";
	$html.= '</center>';	
	$html.= '</td>';
	
	$html.= '</tr>';
	$contador=1;
	while ($dato=mysql_fetch_row($resSql))
{	
	$html.= '<tr>';
	if($dato[6]=="")
	{
	$html.= '<td WIDTH="50">';
	$html.= $dato[0]." ".$dato[1]." ".$dato[2];
	$html.= '</td>';
	}
	else
	{
	$CADENA="";
	$sqlinc="select maestro.ApellidoP,maestro.ApellidoM,maestro.nombre from maestro where Emp='$dato[6]'"; 
    $resSqlinc=mysql_query($sqlinc); 
        while ($dato1=mysql_fetch_row($resSqlinc))
        {	
        $CADENA=$CADENA.'<br/>'.$dato1[0]." ".$dato1[1]." ".$dato1[2];
        }
        
	$html.= '<td WIDTH="50">';
	$html.= $dato[0]." ".$dato[1]." ".$dato[2].'<br>'.$CADENA;
	$html.= '</td>';
	
	}
	$html.= '<td WIDTH="50">';
	$html.= mb_strtoupper($dato[3], 'UTF-8');
	$html.= '</td>';
	$html.= '<td WIDTH="50">';
	$html.= 'Del '.$dato[4].' al '.$dato[5];
	$html.= '</td>';
	$html.= '</tr>';
	$contador=$contador+1;
}

$html.= "<br>";

$html.= "<br>";	//$resSql1=mysql_query($sql1); 

$resultado = mysql_query("SELECT maestro.nombre FROM maestro INNER JOIN curso ON maestro.Emp = curso.instructor WHERE ( curso.instructor=maestro.Emp)
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
$html.= ' ';
$html.= ' ';
$html.="</strong>";
$html.= '<br>';
	

$html.= '</table>';

	//while ($dato1nombre=mysql_fetch_row($resSql1nombre))
//{	

//$html.= $dato1nombre[0];
//}




 //$html.= '<img src="piep.JPG"/>';
 $html.='<img id="myimg" src="piep.JPG" alt="Smiley face" align="middle">';
 
$mipdf = new DOMPDF();
$mipdf ->set_paper("A4", "portrait");
$mipdf ->load_html(utf8_decode(utf8_encode($html)));
$mipdf ->render();
$mipdf ->stream('INSTRUCTORES '.$curso.'.pdf');
//$mipdf ->Image('sep.jpg',10,72,150);

 $pdf->Output();
 ?>
