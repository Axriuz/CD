<?php


require('../fpdf.php');
 $pdf=new FPDF();
 $pdf->AddPage();
 $pdf->SetFont('Arial','B',16);
 $pdf->Cell(40,10,'Este es un ejemplo de creación de un documento PDF con PHP');
 

 
 
 
 
 
 
header('Content-Type: text/html; charset=UTF-8');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: /index.html'); 
  exit();
}
 $usuario =$_SESSION['usuario'];


$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $conexion);
mysql_query("SET NAMES UTF8");


	$pdf->(<TABLE>);
		$pdf->(<TR>);
			$pdf->(<TD>);
 $sql="select distinct maestro.nombre from maestro, curso where curso.instructor = maestro.emp and curso.activo = 1 and curso.validado = 1"; 
         mysql_query("SET NAMES 'utf8'");
		$resSql=mysql_query($sql); 

		
	
			while ($dato=mysql_fetch_row($resSql))
{


	$pdf->(<TD>)
	$pdf->Cell(40,20,$dato[0],'UTF-8');
$pdf->	(</TD>);


	}
$pdf->	(</TR>);
	$pdf->(</TABLE>);

 $pdf->Output();
 ?>
