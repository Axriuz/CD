<?php
error_reporting(0);

$curso = $_POST["curso"]; 
$anio = $_POST["a"]; 
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


$sql="select distinct PersonalRH.ApellidoP,PersonalRH.ApellidoM,PersonalRH.Nombre,PersonalRH.Emp from PersonalRH inner join matriculasRH on PersonalRH.Emp=matriculasRH.Emp inner join cursoRH on matriculasRH.curso=cursoRH.nombre where Area='$curso' and Year(cursoRH.CursoInicio)='$anio' order by PersonalRH.ApellidoP";


$resSql=mysqli_query($con,$sql); 
mysqli_query("SET NAMES 'utf-8'");
$html.= "<br>";

$html.= '<center>';	
$html.= "<h3>";
$html.= utf8_decode('CURSOS ÁREA DE '.mb_strtoupper($curso, "UTF-8"));
$html.= "</h3>";
$html.= '<br>';
$html.=utf8_decode(mb_strtoupper('AÑO: '.$anio." PERIODO: ENERO - DICIEMBRE", "UTF-8"));
$html.= '</center>';	
$html.= "<br>";
	$contador=1;
	$CURSOS= array();
	$pos=0;
while ($dato=mysqli_fetch_row($resSql))
{	
	$sql1="SELECT curso from matriculasRH where Emp=$dato[3]"; 
	$resSql1=mysqli_query($con,$sql1); 
$cadena="";
		while ($dato1=mysqli_fetch_row($resSql1))
		{	 
		$sql11="SELECT Nombre from cursoRH where (Nombre='$dato1[0]')"; 
			$resSql11=mysqli_query($con,$sql11); 
			
			while ($dato11=mysqli_fetch_row($resSql11))
			{	
			//$html.= mb_strtoupper((utf8_decode(utf8_encode($dato11[0]))),'UTF-8')."<br>";
			$CURSO[$pos]=mb_strtoupper((utf8_decode(utf8_encode($dato11[0]))),'UTF-8');
			$pos=$pos+1;
			}

		}
	$contador=$contador+1;
}
	$html.= '<table border= "1" cellspacing="0" cellpadding="0" width="100%" height="100%">';
	$html.= '<tr>';
	$html.= '<td WIDTH="5">';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'No.';
	$html.="</strong>";
	$html.= '</center>';	
	$html.= '</td>';
	$html.= '<td WIDTH="85">';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'NOMBRE';
	$html.="</strong>";
	$html.= '</center>';	
	$html.= '</td>';
	$html.= '<td WIDTH="10">';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'FECHAS';
	$html.="</strong>";
	$html.= '</center>';
	$html.= '</td>';
	$html.= '</tr>';
 $listaSimple = array_unique($CURSO);
 $listaSimpleFinal = array_values($listaSimple);
$long=count($listaSimpleFinal);
	sort($listaSimpleFinal);
	for ($POSIC = 0; $POSIC <= sizeof($listaSimple)-1; $POSIC++)
	{
	$html.= '<tr>';
	$html.= '<td WIDTH="5">';
	$html.= '<center>';
	$html.= $POSIC+1;
	$html.= '</center>';
	$html.= '</td>';
	$html.= '<td WIDTH="10">';
	$html.=utf8_decode( $listaSimpleFinal[$POSIC]);
	$html.= '</td>';
	
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

$sql="select cursoRH.Nombre,Date_format(CursoInicio,'%w'),DAY(CursoInicio),MONTH(CursoInicio),YEAR(CursoInicio),Date_format(CursoFin,'%w'),DAY(CursoFin),MONTH(CursoFin),YEAR(CursoFin) from cursoRH where Nombre='".$listaSimpleFinal[$POSIC]."'";
	     $resSql=mysqli_query($con,$sql); 
			while ($dato=mysqli_fetch_row($resSql))
			{	
	         $html.= '<td WIDTH="85">';
	         
             setlocale(LC_ALL,"es_ES");
$html.=utf8_decode( $dias[$dato[1]]." ".$dato[2]." de ".$meses[$dato[3]-1]." al ".$dias[$dato[5]]." ".$dato[6]." de ".$meses[$dato[7]-1]." de ".$dato[8]);
	         $html.= '</td>';
			} 
	$html.= '</tr>';
	}


$html.= "<br>";
$html.= '</table>';
$html.='<img id="myimg" src="piep.JPG" alt="Smiley face" align="middle">'; 
$mipdf = new DOMPDF();
$mipdf ->set_paper("A4", "portrait");
$mipdf ->load_html(utf8_decode(utf8_encode($html)));
$mipdf ->render();
$mipdf ->stream('CURSOS POR FECHAS DE '.mb_strtoupper((utf8_decode(utf8_encode($curso))),'UTF-8').' AÑO: '.$anio.'.pdf');
//$mipdf ->Image('sep.jpg',10,72,150);
 $pdf->Output();
 ?>

