
<?php
    //-----------------------------------------------------------------------------------
    //    Ejemplo básico de utilización de fPDF
    //-----------------------------------------------------------------------------------
    require('FPDF/fpdf.php');


$curso = $_REQUEST["cursos"]; 
$JEFE = $_REQUEST["nombre"]; 
$MEM = $_REQUEST["MEM"]; 
//$curso ="TALLER MARCO DE REFERENCIA 2018 DEL CACEI. REACREDITACION";
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
$html.='<style>';
//$html.= '<img id="myimg1" src="arribatodo.JPG" alt="Smiley face" align="top">';
//$html.= '<img id="myimg1" src="arribatodo.JPG">';


//$html.= '<img src="sep.jpg"/>';
//$html.= '<img src="arribatodo.JPG"/>';
//$html.='<div id="apDiv6"></div>';
//$sql='select maestro.nombre from maestro, matriculas where matriculas.Curso ="$curso" and matriculas.Emp = maestro.emp order by maestro.nombre'; 
$usuario =$_SESSION['usuario'];
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysql_connect($host,$user,$pass,'UTF8');
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $conexion);
mysql_query("SET NAMES UTF8");




$prueba="select UPPER(Nombre) from curso where Nombre='$curso'"; 
$prueba1=mysql_query($prueba); 
$dato122=mysql_fetch_row($prueba1);
$html.=$dato122[0];


$sql=("select maestro.nombre from maestro, matriculas where (matriculas.Emp = maestro.emp and matriculas.Curso ='$dato122[0]') order by maestro.nombre");
//$sql="select maestro.nombre from maestro, matriculas where (matriculas.Emp = maestro.emp and matriculas.Curso ='ELABORACIÓN MATERIAL PROPEDÉUTICO')";
//$sql="select maestro.Nombre from maestro INNER JOIN matriculas on maestro.Emp=matriculas.Emp where (matriculas.Curso='$curso')"; 





$sql1="SELECT maestro.nombre FROM maestro INNER JOIN curso ON maestro.Emp = curso.instructor WHERE ( curso.instructor=maestro.Emp and curso.nombre='$dato122[0]')";

$sql1nombre="SELECT maestro.nombre FROM maestro INNER JOIN curso ON maestro.Emp = curso.instructor WHERE ( curso.instructor=maestro.Emp and curso.nombre='$curso' )";

mysql_query( "SET lc_time_names = 'es_ES'" ); 
$query_getArchives = "SELECT DATE_FORMAT(  `CursoInicio` ,  '%d de %M ' ) AS modified_date
FROM curso where Nombre='$curso'";

mysql_query( "SET lc_time_names = 'es_ES'" ); 
$query_getArchives1 = "SELECT DATE_FORMAT(  `CursoFin` ,  '%d de %M de %Y' ) AS modified_date
FROM curso where Nombre='$curso'";

$resSql=mysql_query($sql); 
$resSqlnombre=mysql_query($sqlnombre); 

$resSql1=mysql_query($sql1); 

$pdf=new FPDF('L','mm','A4');
    $pdf->AddPage();
	
    $pdf->SetFont('Arial','B',16);
   // $pdf->Cell(40,10,'Hola Mundo!');
   
   
   
   
   
   
   
   
   
    $pdf->Output();
 ?>