<?php
error_reporting(0);
$anio=$_POST['a'];
$periodo=$_POST['periodo'];
 $usuario =$_SESSION['usuario'];
/*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $con=mysqli_connect("$host","$user","$pass",'sigacitc_cursosdesacadCP');
$bd_seleccionada = mysqli_select_db($con,'sigacitc_cursosdesacadCP');
mysqli_query($con,"SET NAMES UTF8");
*/

require('con.php');

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


mysqli_query( $con,"SET lc_time_names = 'es_ES'" ); 
//Obtiene nombre del instructor y fechadel curso seleccionado
$sql="select maestro.ApellidoP,maestro.ApellidoM,maestro.nombre,  
DATE_FORMAT(curso.CursoInicio ,  '%d de %M ' ) AS modified_date,DATE_FORMAT(  curso.CursoFin ,  '%d de %M de %Y' )
AS modified_date,curso.nombre,curso.InsAux from maestro inner join curso on maestro.Emp=curso.Instructor 
where year(CursoInicio)='$anio' and periodo='$periodo' order by month(CursoInicio) "; 
$resSql=mysqli_query($con,$sql);


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
$html.='<br>';
$html.='<br>';
$html.='Periodo';
$html.='<br>';
$html.=$periodo.' '.$anio;

	$html.="</strong>";
$html.= '<br>';

//$html.= 'ACTIVADOS Y VALIDADOS';
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
	
	while ($dato=mysqli_fetch_row($resSql)){	
		
	$html.= '<tr>'; 
	          
	if($dato[6]=="")
	{
	$html.= '<td WIDTH="50">';
	//Nombre del instructor
	$html.=utf8_decode ($dato[0]." ".$dato[1]." ".$dato[2]);
	$html.= '</td>';
	}
	else
	{
	$CADENA="";
	$sqlinc="select maestro.ApellidoP,maestro.ApellidoM,maestro.nombre from maestro where Emp='$dato[6]'"; 
    $resSqlinc=mysqli_query($con,$sqlinc); 
        while ($dato1=mysqli_fetch_row($resSqlinc))
        {	
		//Nombre auxilar	
        $CADENA=$CADENA.'<br/>'.$dato1[0]." ".$dato1[1]." ".$dato1[2];
        }
        
	$html.= '<td WIDTH="50">';
	$html.=utf8_decode( $dato[0]." ".$dato[1]." ".$dato[2].'<br>'.$CADENA);
	$html.= '</td>';
	
	}
    $html.= '<td WIDTH="50">';
	$html.= utf8_decode($dato[5]);
	$html.= '</td>';
	$html.= '<td WIDTH="50">';
	$html.= 'Del '.$dato[3].' al '.$dato[4];
	$html.= '</td>';
	$html.= '</tr>';
	$contador=$contador+1;
}

$html.= "<br>";

$html.= "<br>";	//$resSql1=mysql_query($sql1); 

$resultado = mysqli_query($con,"SELECT maestro.nombre FROM maestro INNER JOIN curso ON maestro.Emp = curso.instructor WHERE ( curso.instructor=maestro.Emp and curso.nombre='$curso' )
");
if (!$resultado) {
    echo 'No se pudo ejecutar la consulta: ' . mysql_error();
    exit;
}
$html.= '<br>';
$fila = mysqli_fetch_row($resultado);
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




 $html.= '<img src="piep.JPG"/>';
 $html.='<img id="myimg" src="piep.JPG" alt="Smiley face" align="middle">';
 
$mipdf = new DOMPDF();
$mipdf ->set_paper("A4", "portrait");
$mipdf ->load_html(utf8_decode(utf8_encode($html)));
$mipdf ->render();
$mipdf ->stream('INSTRUCTORES.pdf');
//$mipdf ->Image('sep.jpg',10,72,150);

 $pdf->Output();
 ?>

