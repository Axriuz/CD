<?php
require_once 'Classes/PHPExcel.php';

require('con.php');

//Consultas SQL
//Obtiene nombre de los maestros a los cuales no se las elaborado constancia
$sql="SELECT maestro.ApellidoP,maestro.ApellidoM,maestro.nombre
FROM maestro INNER JOIN matriculas ON maestro.Emp = matriculas.Emp 
INNER JOIN curso ON curso.nombre = matriculas.curso 
WHERE ( matriculas.curso =  '$curso' AND Constacia =  'Elaborada'   ) 
order by maestro.ApellidoP,maestro.ApellidoM,maestro.Nombre";
$result = mysqli_query ($con,$sql) or die (mysqli_error ());
//Nombre del instuctor
$Instructor="SELECT maestro.ApellidoP,maestro.ApellidoM,maestro.nombre 
FROM maestro 
INNER JOIN curso ON maestro.Emp = curso.instructor
WHERE ( curso.instructor=maestro.Emp and curso.nombre='$curso' )";
$RIns=mysqli_query($con,$Instructor); 
//Obtiene las fechas de incio y fin del curso y el horarios en el que se va a impartir
mysqli_query($con, "SET lc_time_names = 'es_ES'" ); 
$fechaInicio = "SELECT DATE_FORMAT(  `CursoInicio` ,  '%d de %M ' ) AS modified_date
FROM curso where Nombre='$curso'";
$RFI = mysqli_query($con,$fechaInicio);  
mysqli_query($con, "SET lc_time_names = 'es_ES'" ); 
$fechaFin = "SELECT DATE_FORMAT(  `CursoFin` ,  '%d de %M de %Y' ) AS modified_date
FROM curso where Nombre='$curso'";
$RFF = mysqli_query($con,$fechaFin); 


//Creacion del objeto tipo PHPExcel
$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0);


//Nombre del curso 
$objPHPExcel->getActiveSheet()->SetCellValue('F1',$curso);

//Nombre del instructor(a) y del auxiliar en caso de que lo haya. 
$NOMBRESINSTRUCTORES="";
$INSTRUCTORES="";
$INSTRUCTORES1="";
while ($dato1=mysqli_fetch_row($RIns))
{	

$AUX="select InsAux from curso where Nombre='$curso' "; 
$resAUX=mysqli_query($con,$AUX);
   while ($datoAUX=mysqli_fetch_row($resAUX))
     {	
	 if($datoAUX[0]=="")
	     {
			 $INSTRUCTORES1="Instructor(a): "; 
		 }
	  else 
	     {$NOMAUX="select ApellidoP,ApellidoM,Nombre from maestro where Emp='$datoAUX[0]' "; 
          $resAUXN=mysqli_query($con,$NOMAUX);
 				while ($datoAUXN=mysqli_fetch_row( $resAUXN))
    			 {	
				 $INSTRUCTORES=$datoAUXN[0]." ".$datoAUXN[1]." ".$datoAUXN[2];
				 $INSTRUCTORES1="Instructores(as): ";
				 }
			 
			 
		}
     }

//$NOMBRESINSTRUCTORES= $INSTRUCTORES1."". $INSTRUCTORES."<br>".$dato1[0]." ".$dato1[1]." ".$dato1[2];
$objPHPExcel->getActiveSheet()->SetCellValue('H3',$INSTRUCTORES1); 
$objPHPExcel->getActiveSheet()->SetCellValue('G4',$dato1[0]." ".$dato1[1]." ".$dato1[2]);
$NOMBRESINSTRUCTORES= $dato1[0]." ".$dato1[1]." ".$dato1[2];	
}
//Contador para las filas en las que se mostraran los nombres de los docentes
$rowCount = 9;
$numDocente = 1;
$nombre= null;
//Nombres de los docentes

    while($row = mysqli_fetch_array($result)){ 
        $nombre=$row[0];
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $numDocente);
        //$objPHPExcel->getActiveSheet()->getStyle('F'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row[0].$row[1].$row[2]); 
        $border_style= array('borders' => array('allborders' => array('style' => 
        PHPExcel_Style_Border::BORDER_THIN,)));
        $sheet = $objPHPExcel->getActiveSheet();
        $sheet->getStyle("F".($rowCount-1).":J".$rowCount)->applyFromArray($border_style);
        $objPHPExcel->setActiveSheetIndex(0)->mergeCells("G".$rowCount.":J".$rowCount);
        $rowCount++; 
        $numDocente++;
    }
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.($rowCount+1),$INSTRUCTORES1); 
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.($rowCount+2),$NOMBRESINSTRUCTORES);
//Fecha
while ($dato12=mysqli_fetch_row($RFI))
{	

	$objPHPExcel->getActiveSheet()->SetCellValue('D5',"Fecha: ".$dato12[0]);
	
}
while ($dato121=mysqli_fetch_row($RFF))
{	

	$objPHPExcel->getActiveSheet()->SetCellValue('F5',"al ".$dato121[0]);
	
}
//Horario
$sqlhorario="select Horario,Horario1 from curso where Nombre='$curso'";
$resSqlhorario=mysqli_query($con,$sqlhorario); 
while ($datohorario=mysqli_fetch_row($resSqlhorario))
{
	
  $objPHPExcel->getActiveSheet()->SetCellValue('I5'," Horario: de ".$datohorario[0]." hrs a".$datohorario[1]." hrs");
	
}

$objPHPExcel->getActiveSheet()->SetCellValue('G6',"LISTA DE DOCENTES CON CONSTANCIAS ELABORADAS");

$objPHPExcel->getActiveSheet()->SetCellValue('F8',"No.");

$objPHPExcel->getActiveSheet()->SetCellValue('G8',"Nombre");

$objPHPExcel->setActiveSheetIndex(0)->mergeCells("G8:J8");
$objPHPExcel->getActiveSheet()->getStyle('G8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
 
if($nombre != null){
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="DOCENTES DEL CURSO '.$curso.'.xls"');
    header('Cache-Control: max-age=0');

    ob_clean();
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    exit;
}

else{
    echo'<script type="text/javascript">
    alert("No hay datos para mostrar"'.$nombre.');
    window.location.href="periodolistas3.php";
    </script>';
}
  ?>