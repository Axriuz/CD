<?php
error_reporting(0);

$a= $_POST["a"]; 
//$anio= $_POST["Fecha"]; 

/*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2";  
 $conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query($con,"SET NAMES 'utf-8'"); 
*/

require('_con.php');

require('FPDF/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('ITCG.png',23,13,20);
	//$this->Ln(30);
}

function Footer()
{
  //$this->Image('piep.JPG',10,275,190); 
}
}
$sqlJefe = "select * from maestro where JefeDpto = '1'";
$resJefe=mysqli_query($con,$sqlJefe);
$jefe;
while($dato1=mysqli_fetch_array($resJefe)){
    $jefe = $dato1[1].' '.$dato1[17].' '.$dato1[18];
}

$sqlSub = "select * from maestro where JefeDpto = '2'";
$resSub=mysqli_query($con,$sqlSub);
$sub;
while($dato2=mysqli_fetch_array($resSub)){
    $sub = $dato2[1].' '.$dato2[17].' '.$dato2[18];
}

$sqli = "select * from EncEvaIns where Instructor like '%$a%'";
$resEncuesta=mysqli_query($con,$sqli);


//instructor auxiiar
$sqliq = "select * from EncEvaIns where Instructor like '%$a%'";
$resEncuestaq=mysqli_query($con,$sqliq);
while($datoq=mysqli_fetch_array($resEncuestaq)){
    $ay = $datoq[0];
}

$sqliw = "select * from maestro where Nombre like '%$ay%' and ApellidoP like '%$ay%' and ApellidoM like '%$ay%'";
$resEncuestaw=mysqli_query($con,$sqliw);
while($datow=mysqli_fetch_array($resEncuestaw)){
    $ayy = $datow[0];
}


$pdf = new PDF();
$pdf->AliasNbPages();

while($dato=mysqli_fetch_array($resEncuesta)){
    $pdf->AddPage();
//cuadro grande del encabezado
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,30,utf8_decode(),1,1,'C');

//imagen
$pdf->SetXY(10, 10);
$pdf->Cell(40,30,utf8_decode(),1,1,'C');


$pdf->SetXY(50, 10);
$pdf->Cell(75,30,utf8_decode(),1,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->SetXY(50, 10);
$pdf->Cell(75,10,utf8_decode('Nombre del documento: Formato de'),0,1,'L');
$pdf->SetXY(50, 10);
$pdf->Cell(75,20,utf8_decode('Criterios      para      Seleccionar'),0,1,'L');
$pdf->SetXY(50, 10);
$pdf->Cell(75,30,utf8_decode('Instructores Internos y Externos'),0,1,'L');

$pdf->SetXY(50, 10);
$pdf->Cell(75,20,utf8_decode(),1,1,'C');
$pdf->SetXY(50, 10);
$pdf->Cell(75,45,utf8_decode('Referencia a la Norma ISO'),0,1,'L');
$pdf->SetXY(50, 10);
$pdf->Cell(75,55,utf8_decode('9001-2008 7.4.1'),0,1,'L');


$pdf->SetXY(125, 10);
$pdf->Cell(75,20,utf8_decode(),1,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->SetXY(125, 10);
$pdf->Cell(75,15,utf8_decode('Código: ITCG-AD-PO-008-07'),0,1,'L');


$pdf->SetXY(125, 23);
$pdf->Cell(75,7,utf8_decode(),1,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->SetXY(125, 23);
$pdf->Cell(75,7,utf8_decode('Revísión : 3'),0,1,'L');

$pdf->SetFont('Arial','',12);
$pdf->SetXY(125, 32);
$pdf->Cell(75,7,utf8_decode('Página: 1 de 1'),0,1,'L');


$pdf->SetFont('Arial','B',12);
//$pdf->Cell(190,15,utf8_decode('Encuesta de Opinión'),0,1,'C');
$pdf->SetFont('Arial','',10);
$pdf->SetXY(10, 48);
$pdf->Cell(190,45,utf8_decode('NOMBRE DEL/DE LA INSTRUCTOR(A):  '.$dato[0]),0,1,'L');
$pdf->SetXY(76, 51);
$pdf->Cell(190,45,utf8_decode(''),0,1,'L');
//$pdf->Cell(190,-35,utf8_decode('EMPRESA O INSTITUCIÓN:  '.utf8_decode($dato[1])),0,1,'L');
$pdf->Cell(190,-34,utf8_decode('EMPRESA O INSTITUCIÓN:  Instituto Tecnológico de Ciudad Guzmán'),0,1,'L');
$pdf->SetXY(160, 56);
$pdf->Cell(190,45,utf8_decode('FECHA:  '.date("j-n-Y")),0,1,'L');


//encabezado del TecNM
$pdf->SetFont('Arial','',11);
$pdf->SetXY(60, 45);
$pdf->Cell(90,5,utf8_decode('TECNÓLOGICO NACIONAL DE MÉXICO'),0,1,'C');
$pdf->SetXY(60, 50);
$pdf->Cell(90,5,utf8_decode('Instituto Tecnólogico de Cd. Guzmán'),0,1,'C');
$pdf->SetXY(60, 55);
$pdf->Cell(90,5,utf8_decode('Subdirección Académica'),0,1,'C');
$pdf->SetXY(60, 60);
$pdf->Cell(90,5,utf8_decode('Departamento de Desarrollo Académico'),0,1,'C');

//pie de pagina
$pdf->SetXY(10, 270);
$pdf->Cell(90,5,utf8_decode('ITCG-AD-PO-008-07'),0,1,'L');

$pdf->SetXY(10, 103);
$pdf->SetFont('Arial','',11);
$pdf->Cell(190,-35,utf8_decode('Nota: Evaluar considerando la siguiente escala'),0,1,'L');

$pdf->SetXY(10, 89);
$pdf->Cell(34,5,utf8_decode('1 Malo'),1,1,'C');
$pdf->SetXY(49, 89);
$pdf->Cell(34,5,utf8_decode('2 Regular'),1,1,'C');
$pdf->SetXY(89, 89);
$pdf->Cell(34,5,utf8_decode('3 Bien'),1,1,'C');
$pdf->SetXY(129, 89);
$pdf->Cell(34,5,utf8_decode('4 Muy bien'),1,1,'C');
$pdf->SetXY(169, 89);
$pdf->Cell(34,5,utf8_decode('5 Exelente'),1,1,'C');

$pdf->SetXY(10, 100);
$pdf->Cell(90,10,utf8_decode('CRITERIO'),1,1,'C');
$pdf->SetXY(100, 100);
$pdf->Cell(15,10,utf8_decode(1),1,1,'C');
$pdf->SetXY(115, 100);
$pdf->Cell(15,10,utf8_decode(2),1,1,'C');
$pdf->SetXY(130, 100);
$pdf->Cell(15,10,utf8_decode(3),1,1,'C');
$pdf->SetXY(145, 100);
$pdf->Cell(15,10,utf8_decode(4),1,1,'C');
$pdf->SetXY(160, 100);
$pdf->Cell(15,10,utf8_decode(5),1,1,'C');
$pdf->SetXY(175, 100);
$pdf->Cell(25,10,utf8_decode('Total'),1,1,'C');

//pregunta 1
$pdf->SetFont('Arial','',7);
$pdf->SetXY(10, 110);
$pdf->Cell(90,10,utf8_decode(''),1,1,'C');
$pdf->SetXY(10, 110);
$pdf->Cell(90,5,utf8_decode('1. FORMACIÓN PROFESIONAL RELACIONADA A'),0,1,'C');
$pdf->SetXY(10, 115);
$pdf->Cell(90,5,utf8_decode('LA CAPACITACION A IMPARTIR'),0,1,'C');
$pdf->SetXY(100, 110);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(115, 110);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(130, 110);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(145, 110);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(160, 110);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(175, 110);
$pdf->SetFont('Arial','',11);
$pdf->Cell(25,10,utf8_decode($dato[3]),1,1,'C');

if($dato[3] == 1){
$pdf->SetXY(100, 110);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[3] == 2){
$pdf->SetXY(115, 110);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[3] == 3){
$pdf->SetXY(130, 110);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[3] == 4){
$pdf->SetXY(145, 110);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[3] == 5){
$pdf->SetXY(160, 110);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}

//pregunta 2
$pdf->SetFont('Arial','',7);
$pdf->SetXY(10, 120);
$pdf->Cell(90,10,utf8_decode(''),1,1,'C');
$pdf->SetXY(10, 120);
$pdf->Cell(90,5,utf8_decode('2. EXPERIENCIA EN CAPACITACIÓN Y EN LA'),0,1,'C');
$pdf->SetXY(10, 125);
$pdf->Cell(90,5,utf8_decode('TEMÁTICA A IMPARTIR'),0,1,'C');
$pdf->SetXY(100, 120);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(115, 120);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(130, 120);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(145, 120);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(160, 120);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(175, 120);
$pdf->SetFont('Arial','',11);
$pdf->Cell(25,10,utf8_decode($dato[4]),1,1,'C');

if($dato[4] == 1){
$pdf->SetXY(100, 120);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[4] == 2){
$pdf->SetXY(115, 120);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[4] == 3){
$pdf->SetXY(130, 120);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[4] == 4){
$pdf->SetXY(145, 120);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[4] == 5){
$pdf->SetXY(160, 120);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}

//pregunta 3
$pdf->SetFont('Arial','',7);
$pdf->SetXY(10, 130);
$pdf->Cell(90,10,utf8_decode('3. MATERIALES DIDÁCTICOS A UTILIZAR'),1,1,'C');
$pdf->SetXY(100, 130);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(115, 130);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(130, 130);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(145, 130);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(160, 130);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(175, 130);
$pdf->SetFont('Arial','',11);
$pdf->Cell(25,10,utf8_decode($dato[5]),1,1,'C');

if($dato[5] == 1){
$pdf->SetXY(100, 130);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[5] == 2){
$pdf->SetXY(115, 130);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[5] == 3){
$pdf->SetXY(130, 130);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[5] == 4){
$pdf->SetXY(145, 130);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[5] == 5){
$pdf->SetXY(160, 130);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}

//pregunta 4
$pdf->SetFont('Arial','',7);
$pdf->SetXY(10, 140);
$pdf->Cell(90,10,utf8_decode('4. COSTOS POR HORA DE CAPACITACIÓN'),1,1,'C');
$pdf->SetXY(100, 140);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(115, 140);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(130, 140);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(145, 140);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(160, 140);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(175, 140);
$pdf->SetFont('Arial','',11);
$pdf->Cell(25,10,utf8_decode($dato[6]),1,1,'C');

if($dato[6] == 1){
$pdf->SetXY(100, 140);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[6] == 2){
$pdf->SetXY(115, 140);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[6] == 3){
$pdf->SetXY(130, 140);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[6] == 4){
$pdf->SetXY(145, 140);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[6] == 5){
$pdf->SetXY(160, 140);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}

//pregunta 5
$pdf->SetFont('Arial','',7);
$pdf->SetXY(10, 150);
$pdf->Cell(90,10,utf8_decode(''),1,1,'C');
$pdf->SetXY(10, 150);
$pdf->Cell(90,5,utf8_decode('5. EMPRESAS DIFERENTES EN LAS QUE HA'),0,1,'C');
$pdf->SetXY(10, 155);
$pdf->Cell(90,5,utf8_decode('PARTICIPADO COMO INTRUCTOR(A)'),0,1,'C');
$pdf->SetXY(100, 150);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(115, 150);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(130, 150);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(145, 150);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(160, 150);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(175, 150);
$pdf->SetFont('Arial','',11);
$pdf->Cell(25,10,utf8_decode($dato[7]),1,1,'C');

if($dato[7] == 1){
$pdf->SetXY(100, 150);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[7] == 2){
$pdf->SetXY(115, 150);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[7] == 3){
$pdf->SetXY(130, 150);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[7] == 4){
$pdf->SetXY(145, 150);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[7] == 5){
$pdf->SetXY(160, 150);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}

//pregunta 6
$pdf->SetFont('Arial','',7);
$pdf->SetXY(10, 160);
$pdf->Cell(90,10,utf8_decode(''),1,1,'C');
$pdf->SetXY(10, 160);
$pdf->Cell(90,5,utf8_decode('6. CERTIFICACIONES Y ACREDITACIONES RELACIONADAS'),0,1,'C');
$pdf->SetXY(10, 165);
$pdf->Cell(90,5,utf8_decode('AL ÁREA DE CAPACITACIÓN'),0,1,'C');
$pdf->SetXY(100, 160);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(115, 160);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(130, 160);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(145, 160);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(160, 160);
$pdf->Cell(15,10,utf8_decode(),1,1,'C');
$pdf->SetXY(175, 160);
$pdf->SetFont('Arial','',11);
$pdf->Cell(25,10,utf8_decode($dato[8]),1,1,'C');

if($dato[8] == 1){
$pdf->SetXY(100, 160);
$pdf->Cell(15,10,utf8_decode(x),0,1,'C');}
if($dato[8] == 2){
$pdf->SetXY(115, 160);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[8] == 3){
$pdf->SetXY(130, 160);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[8] == 4){
$pdf->SetXY(145, 160);
$pdf->Cell(15,10,utf8_decode(x),1,1,'C');}
if($dato[8] == 5){
$pdf->SetXY(160, 160);
$pdf->Cell(15,10,utf8_decode(x),0,1,'C');}

//final
$pdf->SetFont('Arial','',11);
$pdf->SetXY(10, 170);
$pdf->Cell(165,10,utf8_decode('TOTAL DE PUNTAJE'),1,1,'L');
$suma = $dato[3] + $dato[4] + $dato[5] + $dato[6] + $dato[7] + $dato[8];
$pdf->SetXY(175, 170);
$pdf->Cell(25,10,utf8_decode($suma),1,1,'C');

//firmas
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(135, 190);
if($suma>20){
$pdf->Cell(165,10,utf8_decode('Aceptado: SI_X_  NO___'),0,1,'L');}
else{
  $pdf->Cell(165,10,utf8_decode('Aceptado: SI___  NO_X_'),0,1,'L');  
}

$pdf->SetFont('Arial','',10);
$pdf->SetXY(30, 220);
$pdf->Cell(70,5,utf8_decode('Evaluó'),0,1,'C');
$pdf->SetXY(30, 225);
$pdf->Cell(70,5,utf8_decode(''),0,1,'C');
$pdf->SetXY(30, 230);
$pdf->Cell(70,5,utf8_decode(''),0,1,'C');
$pdf->SetXY(30, 235);
$pdf->Cell(70,5,utf8_decode(''),0,1,'C');
$pdf->SetXY(30, 240);
$pdf->Cell(70,5,utf8_decode('____________________________________'),0,1,'C');
$pdf->SetXY(30, 245);
$pdf->Cell(70,5,utf8_decode($jefe),0,1,'C');
$pdf->SetXY(30, 250);
$pdf->Cell(70,5,utf8_decode('Jefe del Departamento de Desarrollo Académico'),0,1,'C');
$pdf->SetXY(30, 255);
$pdf->Cell(70,5,utf8_decode('Nombre, puesto y firma'),0,1,'C');

$pdf->SetFont('Arial','',10);
$pdf->SetXY(120, 220);
$pdf->Cell(70,5,utf8_decode('Autorizó'),0,1,'C');
$pdf->SetXY(120, 225);
$pdf->Cell(70,5,utf8_decode(''),0,1,'C');
$pdf->SetXY(120, 230);
$pdf->Cell(70,5,utf8_decode(''),0,1,'C');
$pdf->SetXY(120, 235);
$pdf->Cell(70,5,utf8_decode(''),0,1,'C');
$pdf->SetXY(120, 240);
$pdf->Cell(70,5,utf8_decode('____________________________________'),0,1,'C');
$pdf->SetXY(120, 245);
$pdf->Cell(70,5,utf8_decode($sub),0,1,'C');
$pdf->SetXY(120, 250);
$pdf->Cell(70,5,utf8_decode('Subdirector Académico'),0,1,'C');
$pdf->SetXY(120, 255);
$pdf->Cell(70,5,utf8_decode('Nombre, puesto y firma'),0,1,'C');



}

$nombre = utf8_decode('Encuestas del instructor(a) ');
$pdf->Output($nombre.$a.'.pdf','D');
//$pdf->Output();
 ?>