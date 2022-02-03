<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
function fechaesp($date) {
    $dia = explode("-", $date, 3);
    $year = $dia[0];
    $month = (string)(int)$dia[1];
    $day = (string)(int)$dia[2]-1;
    
    $dias = array("domingo","lunes","martes","mi&eacute;rcoles" ,"jueves","viernes","s&aacute;bado");
    $tomadia = $dias[intval((date("w",mktime(0,0,0,$month,$day,$year))))];
 
    $meses = array("", "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
    
    return $tomadia.", ".$day." de ".$meses[$month]." de ".$year;
}


// $usuario =$_SESSION['usuario'];
 $usuari = $_POST["usuari"]; 
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $conexion);
mysql_query("SET NAMES UTF8");

require_once '../pdf/dompdf_config.inc.php';
//header("Content-Type: text/html; charset=UTF-8");

	//$html.= '';
        $html= '';

header("Content-Type: text/html;charset=utf-8");
//header('Content-Type: text/html; charset=iso-8859-1');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: /index.html'); 
  exit();
}
//$html.='<img src="arribatodo.JPG" alt="Smiley face" align="middle">';
// $html.= '<img src="piep.JPG"/>';
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
$html.= "<br>";
$html.= '<center>';	
$html.= "<h2>";
$html.= 'HISTORIAL DE CONSTANCIAS ';
$html.= "</h2>";
$html.= "<P align='right'>Fecha de impresión: ".fechaesp(date("Y- n- j"))."</p>";
$consulta_mysql1="SELECT Nombre from maestro where Emp = '".$usuari."'";
$resultado_consulta_mysql1=mysql_query($consulta_mysql1);
while($fila1=mysql_fetch_array($resultado_consulta_mysql1)){
$html.= mb_strtoupper("DOCENTE: ". $fila1[0], "UTF-8");
}
$html.= '</center>';	
$html.= "<br>";
$consulta_mysql="SELECT matriculas.curso,Year(curso.CursoInicio),curso.periodo,matriculas.constacia FROM matriculas inner join
maestro on matriculas.Emp=maestro.Emp inner join curso on curso.Nombre=matriculas.Curso WHERE
matriculas.Emp = '".$usuari."' order by Year(curso.CursoInicio),matriculas.curso";

//$html.="".$consulta_mysql;
$resultado_consulta_mysql=mysql_query($consulta_mysql);
  
$html.= "<table border='1' bordercolor='#0037FF'>   <tr>
    		<th>Curso</th>
				<th>Año</th> 
					<th>Periodo</th> 
    		<th>Estado constancia</th> 
      </tr>
	  ";
while($fila=mysql_fetch_array($resultado_consulta_mysql)){
$html.= "
	 <tr>
    <td>".mb_strtoupper($fila[0], 'UTF-8')."</td>
	    <td>".mb_strtoupper($fila[1], 'UTF-8')."</td>
    <td>".mb_strtoupper($fila[2], 'UTF-8')."</td>
	 <td>".mb_strtoupper($fila[3], 'UTF-8')."</td>
  </tr>";
}

$html.= "</table>";

 $html.='<img id="myimg" src="piep.JPG" alt="Smiley face" align="middle">';
 


$html.= '</table>';

 $html.='<img id="myimg" src="piep.JPG" alt="Smiley face" align="middle">';
 
$mipdf = new DOMPDF();
$mipdf ->set_paper("A4", "portrait");
$mipdf ->load_html(utf8_decode(utf8_encode($html)));
$mipdf ->render();
$mipdf ->stream('HISTORIAL CONSTANCIAS '.$usuari.'.pdf');
//$mipdf ->Image('sep.jpg',10,72,150);
 $pdf->Output();
 ?>

