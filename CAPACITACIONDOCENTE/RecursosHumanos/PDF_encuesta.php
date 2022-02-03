<?php
error_reporting(0);
$cursoq = $_POST["curso"]; 

 
 require('con.php');

$sqli = "select P.Nombre, P.ApellidoP,P.ApellidoM from PersonalRH as P INNER JOIN cursoRH as C on P.Emp = C.Instructor where C.Nombre = '$cursoq' ";
$resInstructor=mysqli_query($con,$sqli);

$array =  array();
$sqlC = "select * from Comentario where CURSO = '$cursoq'";
$resComen=mysqli_query($con,$sqlC);
$countArray = 0;
while($datoC=mysqli_fetch_array($resComen)){
    $array[] = $datoC[2]; 
}

mysqli_query($con,"SET NAMES 'utf-8'");  
  
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


    
$pdf->SetFont('Arial','B',9);
$pdf->Cell(190,15,utf8_decode('Encuesta de Opinión'),0,1,'C');
$pdf->Cell(190,-24,utf8_decode('Cursos de Capacitación Presencial'),0,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(190,45,utf8_decode('Nombre del curso:  '.$cursoq),0,1,'L');
$pdf->Cell(190,-35,utf8_decode('Fecha:  '.date("j-n-Y")),0,1,'L');
while($dato=mysqli_fetch_row($resInstructor)){
$instructor = utf8_decode($dato[1].' '.$dato[2].' '.$dato[0]);}
$pdf->Cell(190,45,utf8_decode('Nombre del/de la instructor(a): '.$instructor),0,1,'L'); 

$pdf->SetFont('Arial','B',9);
$pdf->Cell(190,-35,utf8_decode('INSTRUCCIÓN: Solicitamos exprese su opinión sobre los siguientes aspectos escribiendo el número correspondiente'),0,1,'C');
$pdf->SetXY(10, 72);
$pdf->Cell(5,5,utf8_decode(4),1,1,'C');
$pdf->SetXY(31, 67);
$pdf->Cell(5,15,utf8_decode('Totalmente de acuerdo'),0,1,'C');
$pdf->SetXY(55, 72);
$pdf->Cell(5,5,utf8_decode(3),1,1,'C');
$pdf->SetXY(78, 67);
$pdf->Cell(5,15,utf8_decode('Parcialmente de acuerdo'),0,1,'C');
$pdf->SetXY(103, 72);
$pdf->Cell(5,5,utf8_decode(2),1,1,'C');
$pdf->SetXY(128, 67);
$pdf->Cell(5,15,utf8_decode('Parcialmente en desacuerdo'),0,1,'C');
$pdf->SetXY(154, 72);
$pdf->Cell(5,5,utf8_decode(1),1,1,'C');
$pdf->SetXY(169, 67);
$pdf->Cell(5,15,utf8_decode('En desacuerdo'),0,1,'C');

$sqlen = "select * from Evaluacion where CURSO = ' PlanificaciÃ³n para la implementaciÃ³n de Sistemas de GestiÃ³n de la EnergÃ­a ISO 50001:2011'";
$resEncuesta=mysqli_query($con,$sqlen);
$count=1;
$countAsis = 0;
$countA = 0;

$sqlen2 = "select * from Evaluacion where CURSO = '$cursoq'";
$resEncuesta2=mysqli_query($con,$sqlen2);
$contador1 = 0;
$contador2 = 0;
while($datoAux=mysqli_fetch_array($resEncuesta2)){
 
    $contador1 = $contador1 +1;
}
$contador1 = $contador1/20;

while($dato=mysqli_fetch_array($resEncuesta)){
    
//pregunta 1
if((strcmp($dato[0], 'tipo1') == 0) and $count=1){    
$pdf->SetXY(10, 80);
$pdf->Cell(85,6,utf8_decode('INSTRUCTOR'),1,0,'C');

$pdf->SetFont('Arial','B',8);
$pdf->SetXY(10, 87);
$pdf->Cell(85,6,utf8_decode('1-Expuso el objetivo y temario del curso'),0,1,'L');

//1
if(strcmp($dato[1], 'Totalmente de acuerdo') == 0)
{
    $pdf->SetXY(90, 87);
$pdf->Cell(5,5,utf8_decode(4),1,1,'C');
}
//2
if(strcmp($dato[1], 'Parcialmente de acuerdo') == 0)
{
    $pdf->SetXY(90, 87);
$pdf->Cell(5,5,utf8_decode(3),1,1,'C');
}
//3
if(strcmp($dato[1], 'Parcialmente en desacuerdo') == 0)
{
    $pdf->SetXY(90, 87);
$pdf->Cell(5,5,utf8_decode(2),1,1,'C');
}
//4
if(strcmp($dato[1], 'En desacuerdo') == 0)
{
    $pdf->SetXY(90, 87);
$pdf->Cell(5,5,utf8_decode(1),1,1,'C');
}
}

//pregunta 2
if((strcmp($dato[0], 'tipo2') == 0) and $count=2){    
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(10, 92);
$pdf->Cell(80,6,utf8_decode('2-Mostró dominio del contenido abordado'),0,1,'L');
$pdf->SetXY(90, 92);
//1
if(strcmp($dato[1], 'Totalmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(4),1,1,'C');
}
//2
if(strcmp($dato[1], 'Parcialmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(3),1,1,'C');
}
//3
if(strcmp($dato[1], 'Parcialmente en desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(2),1,1,'C');
}
//4
if(strcmp($dato[1], 'En desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(1),1,1,'C');
}
}

//pregunta 3
if((strcmp($dato[0], 'tipo3') == 0) and $count=3){    
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(10, 97);
$pdf->Cell(80,6,utf8_decode('3-Fomentó la participación del grupo'),0,1,'L');
$pdf->SetXY(90, 97);

//1
if(strcmp($dato[1], 'Totalmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(4),1,1,'C');
}
//2
if(strcmp($dato[1], 'Parcialmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(3),1,1,'C');
}
//3
if(strcmp($dato[1], 'Parcialmente en desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(2),1,1,'C');
}
//4
if(strcmp($dato[1], 'En desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(1),1,1,'C');
}
}

//pregunta 4
if((strcmp($dato[0], 'tipo4') == 0) and $count=4){    
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(10, 102);
$pdf->Cell(80,6,utf8_decode('4-Aclaró las dudas que se presentaron'),0,1,'L');
$pdf->SetXY(90, 102);

//1
if(strcmp($dato[1], 'Totalmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(4),1,1,'C');
}
//2
if(strcmp($dato[1], 'Parcialmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(3),1,1,'C');
}
//3
if(strcmp($dato[1], 'Parcialmente en desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(2),1,1,'C');
}
//4
if(strcmp($dato[1], 'En desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(1),1,1,'C');
}
}

//pregunta 5
if((strcmp($dato[0], 'tipo5') == 0) and $count=5){    
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(10, 107);
$pdf->Cell(80,6,utf8_decode('5-Dio retroalimentación a los ejercicios realizados'),0,1,'L');
$pdf->SetXY(90, 107);

//1
if(strcmp($dato[1], 'Totalmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(4),1,1,'C');
}
//2
if(strcmp($dato[1], 'Parcialmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(3),1,1,'C');
}
//3
if(strcmp($dato[1], 'Parcialmente en desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(2),1,1,'C');
}
//4
if(strcmp($dato[1], 'En desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(1),1,1,'C');
}
}

//pregunta 6
if((strcmp($dato[0], 'tipo6') == 0) and $count=6){    
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(10, 112);
$pdf->Cell(80,6,utf8_decode('6-Aplicó una evaluación final'),0,1,'L');
$pdf->SetXY(90, 112);

//1
if(strcmp($dato[1], 'Totalmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(4),1,1,'C');
}
//2
if(strcmp($dato[1], 'Parcialmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(3),1,1,'C');
}
//3
if(strcmp($dato[1], 'Parcialmente en desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(2),1,1,'C');
}
//4
if(strcmp($dato[1], 'En desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(1),1,1,'C');
}
}

//pregunta 7
if((strcmp($dato[0], 'tipo7') == 0) and $count=7){    
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(10, 117);
$pdf->Cell(80,6,utf8_decode('7-Inició y concluyó puntualmente las sesiones'),0,1,'L');
$pdf->SetXY(90, 117);

//1
if(strcmp($dato[1], 'Totalmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(4),1,1,'C');
}
//2
if(strcmp($dato[1], 'Parcialmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(3),1,1,'C');
}
//3
if(strcmp($dato[1], 'Parcialmente en desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(2),1,1,'C');
}
//4
if(strcmp($dato[1], 'En desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(1),1,1,'C');
}
}

//pregunta 8
if((strcmp($dato[0], 'tipo8') == 0) and $count=8){  
$pdf->SetXY(10, 140);
$pdf->Cell(86,6,utf8_decode('MATERIAL DIDÁCTICO'),1,0,'C');
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(10, 148);
$pdf->Cell(80,6,utf8_decode('8-El maeterial didáctico fue útil a lo largo del curso'),0,1,'L');
$pdf->SetXY(91, 148);

//1
if(strcmp($dato[1], 'Totalmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(4),1,1,'C');
}
//2
if(strcmp($dato[1], 'Parcialmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(3),1,1,'C');
}
//3
if(strcmp($dato[1], 'Parcialmente en desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(2),1,1,'C');
}
//4
if(strcmp($dato[1], 'En desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(1),1,1,'C');
}
}

//pregunta 9
if((strcmp($dato[0], 'tipo9') == 0) and $count=9){  
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(10, 153);
$pdf->Cell(80,6,utf8_decode('9-La impresión dem material didáctico fue legible'),0,1,'L');
$pdf->SetXY(91, 153);

//1
if(strcmp($dato[1], 'Totalmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(4),1,1,'C');
}
//2
if(strcmp($dato[1], 'Parcialmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(3),1,1,'C');
}
//3
if(strcmp($dato[1], 'Parcialmente en desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(2),1,1,'C');
}
//4
if(strcmp($dato[1], 'En desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(1),1,1,'C');
}
}

//pregunta 10
if((strcmp($dato[0], 'tipo10') == 0) and $count=10){  
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(10, 158);
$pdf->Cell(80,6,utf8_decode('10-La variedad del material didáctico fue suficiente'),0,1,'L');
$pdf->SetXY(91, 158);

//1
if(strcmp($dato[1], 'Totalmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(4),1,1,'C');
}
//2
if(strcmp($dato[1], 'Parcialmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(3),1,1,'C');
}
//3
if(strcmp($dato[1], 'Parcialmente en desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(2),1,1,'C');
}
//4
if(strcmp($dato[1], 'En desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(1),1,1,'C');
}
}

//pregunta 11
if((strcmp($dato[0], 'tipo11') == 0) and $count=11){  
$pdf->SetXY(100, 80);
$pdf->Cell(80,6,utf8_decode('CURSO'),1,0,'C');

$pdf->SetFont('Arial','B',8);
$pdf->SetXY(100, 87);
$pdf->Cell(80,6,utf8_decode('11-La distribucion del tiempo fue adecuada'),0,1,'L');

//1
if(strcmp($dato[1], 'Totalmente de acuerdo') == 0)
{
    $pdf->SetXY(175, 87);
$pdf->Cell(5,5,utf8_decode(4),1,1,'C');
}
//2
if(strcmp($dato[1], 'Parcialmente de acuerdo') == 0)
{
    $pdf->SetXY(175, 87);
$pdf->Cell(5,5,utf8_decode(3),1,1,'C');
}
//3
if(strcmp($dato[1], 'Parcialmente en desacuerdo') == 0)
{
    $pdf->SetXY(175, 87);
$pdf->Cell(5,5,utf8_decode(2),1,1,'C');
}
//4
if(strcmp($dato[1], 'En desacuerdo') == 0)
{
    $pdf->SetXY(175, 87);
$pdf->Cell(5,5,utf8_decode(1),1,1,'C');
}
}

//pregunta 12
if((strcmp($dato[0], 'tipo12') == 0) and $count=12){  
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(100, 92);
$pdf->Cell(80,6,utf8_decode('12-Los temas fueron suficientes paara alcanzar el'),0,1,'L');
$pdf->SetXY(175, 92);
//1
if(strcmp($dato[1], 'Totalmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(4),1,1,'C');
}
//2
if(strcmp($dato[1], 'Parcialmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(3),1,1,'C');
}
//3
if(strcmp($dato[1], 'Parcialmente en desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(2),1,1,'C');
}
//4
if(strcmp($dato[1], 'En desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(1),1,1,'C');
}    
}

//pregunta 13
if((strcmp($dato[0], 'tipo13') == 0) and $count=13){  
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(100, 97);
$pdf->Cell(80,6,utf8_decode('13-El curso comprendio ejercicios de práctica'),0,1,'L');
$pdf->SetXY(175, 97);
//1
if(strcmp($dato[1], 'Totalmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(4),1,1,'C');
}
//2
if(strcmp($dato[1], 'Parcialmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(3),1,1,'C');
}
//3
if(strcmp($dato[1], 'Parcialmente en desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(2),1,1,'C');
}
//4
if(strcmp($dato[1], 'En desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(1),1,1,'C');
} 
}

//pregunta 14
if((strcmp($dato[0], 'tipo14') == 0) and $count=14){  
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(100, 102);
$pdf->Cell(80,6,utf8_decode('14-El curso cubrió sus espectativas'),0,1,'L');
$pdf->SetXY(175, 102);
//1
if(strcmp($dato[1], 'Totalmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(4),1,1,'C');
}
//2
if(strcmp($dato[1], 'Parcialmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(3),1,1,'C');
}
//3
if(strcmp($dato[1], 'Parcialmente en desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(2),1,1,'C');
}
//4
if(strcmp($dato[1], 'En desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(1),1,1,'C');
} 
}

//pregunta 15
if((strcmp($dato[0], 'tipo15') == 0) and $count=15){  
$pdf->SetXY(100, 130);
$pdf->Cell(80,6,utf8_decode('INFRAESTRUCTURA'),1,0,'C');

$pdf->SetFont('Arial','B',8);
$pdf->SetXY(100, 137);
$pdf->Cell(80,6,utf8_decode('15-La iuminación del aula fue adecuada'),0,1,'L');

//1
if(strcmp($dato[1], 'Totalmente de acuerdo') == 0)
{
    $pdf->SetXY(175, 137);
$pdf->Cell(5,5,utf8_decode(4),1,1,'C');
}
//2
if(strcmp($dato[1], 'Parcialmente de acuerdo') == 0)
{
    $pdf->SetXY(175, 137);
$pdf->Cell(5,5,utf8_decode(3),1,1,'C');
}
//3
if(strcmp($dato[1], 'Parcialmente en desacuerdo') == 0)
{
    $pdf->SetXY(175, 137);
$pdf->Cell(5,5,utf8_decode(2),1,1,'C');
}
//4
if(strcmp($dato[1], 'En desacuerdo') == 0)
{
    $pdf->SetXY(175, 137);
$pdf->Cell(5,5,utf8_decode(1),1,1,'C');
} 
}

//pregunta 16
if((strcmp($dato[0], 'tipo16') == 0) and $count=16){  
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(100, 142);
$pdf->Cell(80,6,utf8_decode('16-La ventilación del aula fue adecuada'),0,1,'L');
$pdf->SetXY(175, 142);
//1
if(strcmp($dato[1], 'Totalmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(4),1,1,'C');
}
//2
if(strcmp($dato[1], 'Parcialmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(3),1,1,'C');
}
//3
if(strcmp($dato[1], 'Parcialmente en desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(2),1,1,'C');
}
//4
if(strcmp($dato[1], 'En desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(1),1,1,'C');
}  
}

//pregunta 17
if((strcmp($dato[0], 'tipo17') == 0) and $count=17){  
 $pdf->SetFont('Arial','B',8);
$pdf->SetXY(100, 147);
$pdf->Cell(80,6,utf8_decode('17-El aseo del aula fue adecuado'),0,1,'L');
$pdf->SetXY(175, 147);
//1
if(strcmp($dato[1], 'Totalmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(4),1,1,'C');
}
//2
if(strcmp($dato[1], 'Parcialmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(3),1,1,'C');
}
//3
if(strcmp($dato[1], 'Parcialmente en desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(2),1,1,'C');
}
//4
if(strcmp($dato[1], 'En desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(1),1,1,'C');
}    
}

//pregunta 18
if((strcmp($dato[0], 'tipo18') == 0) and $count=18){  
 $pdf->SetFont('Arial','B',8);
$pdf->SetXY(100, 152);
$pdf->Cell(80,6,utf8_decode('18-El servicio de los sanitarios fue adecuado'),0,1,'L');
$pdf->SetXY(175, 152);
//1
if(strcmp($dato[1], 'Totalmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(4),1,1,'C');
}
//2
if(strcmp($dato[1], 'Parcialmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(3),1,1,'C');
}
//3
if(strcmp($dato[1], 'Parcialmente en desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(2),1,1,'C');
}
//4
if(strcmp($dato[1], 'En desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(1),1,1,'C');
}       
}

//pregunta 19
if((strcmp($dato[0], 'tipo19') == 0) and $count=19){  
 $pdf->SetFont('Arial','B',8);
$pdf->SetXY(100, 157);
$pdf->Cell(80,6,utf8_decode('19-El servicio de café fue adecuado'),0,1,'L');
$pdf->SetXY(175, 157);
//1
if(strcmp($dato[1], 'Totalmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(4),1,1,'C');
}
//2
if(strcmp($dato[1], 'Parcialmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(3),1,1,'C');
}
//3
if(strcmp($dato[1], 'Parcialmente en desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(2),1,1,'C');
}
//4
if(strcmp($dato[1], 'En desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(1),1,1,'C');
}       
}


if((strcmp($dato[0], 'tipo20') == 0) and $count=20){
$countAsis = $countAsis + 1;
$contador2 = $contador2 +1;
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(100, 162);
$pdf->Cell(80,6,utf8_decode('20-Recibió apoyo del personal que coordinó'),0,1,'L');
$pdf->SetXY(175, 162);
//1
if(strcmp($dato[1], 'Totalmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(4),1,1,'C');
}
//2
if(strcmp($dato[1], 'Parcialmente de acuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(3),1,1,'C');
}
//3
if(strcmp($dato[1], 'Parcialmente en desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(2),1,1,'C');
}
//4
if(strcmp($dato[1], 'En desacuerdo') == 0)
{
$pdf->Cell(5,5,utf8_decode(1),1,1,'C');
}    

$pdf->SetXY(10, 190);
$pdf->Cell(190,6,utf8_decode('COMENTARIOS'),1,1,'C');
$pdf->SetXY(10, 196);
$pdf->Cell(190,35,utf8_decode(''),1,1,'L');
$pdf->SetXY(10, 196);
$pdf->MultiCell(190,6,utf8_decode($array[$countA]),0,L,0);
$countA = $countA +1;
    
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(60, 262);
$pdf->Cell(80,6,utf8_decode('Gracias por su participación asistente '.$countAsis),0,1,'C');


if($contador2<$contador1) {  
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);
$pdf->Cell(190,15,utf8_decode('Encuesta de Opinión'),0,1,'C');
$pdf->Cell(190,-24,utf8_decode('Cursos de Capacitación Presencial'),0,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(190,45,utf8_decode('Nombre del curso:  '.$cursoq),0,1,'L');
$pdf->Cell(190,-35,utf8_decode('Fecha:  '.date("j-n-Y")),0,1,'L');
$dato=mysqli_fetch_row($resInstructor);
$pdf->Cell(190,45,utf8_decode('Nombre del/de la instructor(a): '.$instructor),0,1,'L'); 

$pdf->SetFont('Arial','B',9);
$pdf->Cell(190,-35,utf8_decode('INSTRUCCIÓN: Solicitamos exprese su opinión sobre los siguientes aspectos escribiendo el número correspondiente'),0,1,'C');
$pdf->SetXY(10, 72);
$pdf->Cell(5,5,utf8_decode(4),1,1,'C');
$pdf->SetXY(31, 67);
$pdf->Cell(5,15,utf8_decode('Totalmente de acuerdo'),0,1,'C');
$pdf->SetXY(55, 72);
$pdf->Cell(5,5,utf8_decode(3),1,1,'C');
$pdf->SetXY(78, 67);
$pdf->Cell(5,15,utf8_decode('Parcialmente de acuerdo'),0,1,'C');
$pdf->SetXY(103, 72);
$pdf->Cell(5,5,utf8_decode(2),1,1,'C');
$pdf->SetXY(128, 67);
$pdf->Cell(5,15,utf8_decode('Parcialmente en desacuerdo'),0,1,'C');
$pdf->SetXY(154, 72);
$pdf->Cell(5,5,utf8_decode(1),1,1,'C');
$pdf->SetXY(169, 67);
$pdf->Cell(5,15,utf8_decode('En desacuerdo'),0,1,'C');
}

$count = 1;
}

$count = $count + 1;

}

$contador=1;
	while ($dato=mysqli_fetch_row($resSql)){
		$pdf->Cell(20,6,utf8_decode($contador),1,0,'C');
		$pdf->Cell(170,6,utf8_decode($dato[1].' '.$dato[2].' '.$dato[0]),1,1,'L');
		$contador=$contador+1;	}
$pdf->Output('Encuestas del curso '.$curso.'.pdf','D');
//$pdf->Output();
 ?>