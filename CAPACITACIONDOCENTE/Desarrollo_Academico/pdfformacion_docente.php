<?php
error_reporting(0);

$anio = $_POST["a"]; 
$p= $_POST["periodo"]; 

/*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2";  
 $conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
*/

require('_con.php');
 
//$sql="select Nombre,ApellidoP,ApellidoM from maestro";
$sql="select DISTINCT maestro.Nombre, maestro.ApellidoP,maestro.ApellidoM from maestro INNER JOIN CedulaIns on maestro.Emp = CedulaIns.Emp INNER JOIN curso on CedulaIns.Curso = curso.Nombre WHERE CedulaIns.PlazaActual like '%E3817%' and curso.TipoCurso = 'Formacion Docente' and curso.Periodo = '$p' and curso.CursoInicio like '%$anio%' and (maestro.Estudios like '%maestr%' or maestro.Estudios like '%doctora%') ORDER BY maestro.ApellidoP ASC";
$resSql=mysqli_query($con,$sql); 
mysqli_query($con,"SET NAMES UTF8");  
  
require('FPDF/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('arribatodo.JPG',10,15,180);
	$this->Ln(30);
}

function Footer()
{
  $this->Image('piep.JPG',10,275,190); 
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial','B',14);
$pdf->Cell(190,45,utf8_decode('QUE PARTICIPARON EN FORMACIÓN DOCENTE'),0,1,'C');
$pdf->Cell(190,-60,utf8_decode('MAESTROS CON POSTGRADO TIEMPO COMPLETO'),0,1,'C');
$pdf->SetFont('Arial','',13);
$pdf->Cell(190,100,utf8_decode('AÑO: '.$anio." PERIODO: ".$p),0,1,'C');

$pdf->SetXY(10, 80);
$pdf->Cell(20,6,utf8_decode('No.'),1,0,'C');
$pdf->Cell(170,6,utf8_decode('Nombre'),1,1,'C');

$contador=1;
	while ($dato=mysqli_fetch_row($resSql)){
		$pdf->Cell(20,6,utf8_decode($contador),1,0,'C');
		$pdf->Cell(170,6,utf8_decode($dato[1].' '.$dato[2].' '.$dato[0]),1,1,'L');
		$contador=$contador+1;
	}
$pdf->Output('Maestros_Tiempo_Completo_Maestria_'.$anio.'_PERIODO: '.$p.'.pdf','D');
//$pdf->Output();
 ?>