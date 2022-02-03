<?php

session_start();
include('class.php');


$calculadora = new calcular();
$usuario = 3;/*$usuario = $_SESSION['clave'];*/

$promedio = $calculadora->processReport(true, $usuario);


// Create connection
$conn = mysqli_connect("localhost", "root", "", "bd_ed");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


require_once("dompdf/dompdf_config.inc.php");

   $html .= "
<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8'>
<title>Title of the document</title>


<style>



.contenedor{
	height:100%;
	border: 0px solid red;
	border-top:none;
	padding-top:5px;
	padding-left:20px;
	padding-right:20px;

}
.footer{
/*
  position: fixed;
    bottom:100px;
*/

}
.title{

}
.subtitle{

}




.tableContainer{
	margin-left:10px;
}
table, td, th {
   

    /*
    width: 150px;
    position:absolute;
    */
}
.col1{
	width:20px;
	position:absolute;

}
.col2{
	width:300px;
	position:absolute;
}
.col3{
	width:50px;
	position:absolute;
}
.col4{
	width:50px;
	position:absolute;
}
table {
    width: 100%;
}

th {
    height: 50px;
}


</style>
</head>

<body >



    ";



$html .= "
<div class = 'contenedor'>
<center> <div class = 'img'> <img src='arribatodo.jpg'> </div> </center>";



   $html .= " <h3><center><h4>SEP  RESULTADOS  DE LA EVALUACION DE LOS PROFESORES  SES-DGEST</h4></center></h3> ";

   $html .= " <h4><center>AÑO 2014, APLICACION DE MAYO</center></h4> ";

    $html .= " <center>ITCG</center> <br><br>";


    $html .= " NOMBRE DEL PROFESOR: ".@$promedio[0][32]."  ".@$promedio[0][33]."   <br><br>";

 $html .= " NOMBRE DEL DEPARTAMENTO:  ".@$promedio[0][34]."   <br><br>";


	$letras[0] = 'A'; 
	$letras[1] = 'B';
	$letras[2] = 'C';
	$letras[3] = 'D';
	$letras[4] = 'E';
	$letras[5] = 'F';
	$letras[6] = 'G';
	$letras[7] = 'H';
	$letras[8] = 'I';
	$letras[9] = 'J';

	$html .= " LOS PROMEDIOS GENERALES DE CADA CATEGORIA SON :   <br><br> <br><br>";

	$indice = 0;
	$indice2 = 1;



	for ($x = 10; $x <= 19; $x++) {
			$sqlcatnom = "select * from categorias_alumno where idcategoria = $indice2";
		$resultcatnom = mysqli_query($conn, $sqlcatnom);
	 	$rowcatnom = mysqli_fetch_assoc($resultcatnom);

	 	if($promedio[0][$x] >= 1 and $promedio[0][$x] <= 3.2499){
			$rubro = "INSUFICIENTE  ";
		}
		if($promedio[0][$x] >= 3.2500 and $promedio[0][$x] <= 3.7499){
			$rubro = "SUFICIENTE  ";
		}
		if($promedio[0][$x]>= 3.7500 and $promedio[0][$x] <= 4.2499){
			$rubro = "BUENO";
		}
		if($promedio[0][$x] >= 4.2500 and $promedio[0][$x] <= 4.7499){
			$rubro = "NOTABLE";
		}
		if($promedio[0][$x] >= 4.7500 and $promedio[0][$x] <= 5){
			$rubro = "EXCELENTE";
		}


	 $html .= "  
	 <div class = 'tableContainer'>
<table>

  <tr>

    <td class ='col1'>".@$letras[$indice]." </td>
    <td class ='col2'>".@$rowcatnom['nom_categoria']." </td>
    <td class ='col3'>".round($promedio[0][$x],2)."</td>
    <td class ='col4'>".@$rubro."</td>
</tr>


</table>
</div>

	 <br>";









	$indice = $indice + 1;
	$indice2 = $indice2 + 1;
} 

	 	if($promedio[0][20] >= 1 and $promedio[0][20] <= 3.2499){
			$rubro = "INSUFICIENTE  ";
		}
		if($promedio[0][20] >= 3.2500 and $promedio[0][20] <= 3.7499){
			$rubro = "SUFICIENTE  ";
		}
		if($promedio[0][20]>= 3.7500 and $promedio[0][20] <= 4.2499){
			$rubro = "BUENO";
		}
		if($promedio[0][20] >= 4.2500 and $promedio[0][20] <= 4.7499){
			$rubro = "NOTABLE";
		}
		if($promedio[0][20] >= 4.7500 and $promedio[0][20] <= 5){
			$rubro = "EXCELENTE";
		}
 
	 $html .= " <br><br><br><br>EL PROMEDIO GENERAL DEL PROFESOR ES:  ".round(@$promedio[0][20],2)."   ".@$rubro." <br>";
	 $html .= " <br>EL TOTAL DE ALUMNOS QUE EVALUARON ES:   ".round(@$promedio[0][35],0)."  <br> <br><br><br>";
	  
	echo round(@$promedio[0][35],0);

	mysqli_close($conn);



//$html .= " <center><img src='cap.jpg'> </center>";

$html .= " <br><br><center><div class ='footer'><img src='piep.jpg'> </div></center>";

$html .= "

</div><!--cierre del contenedor gral. -->
</body>
</html>

    ";

//$html = utf8_decode($html);
$dompdf = new DOMPDF();

//$dompdf->set_paper(DEFAULT_PDF_PAPER_SIZE, 'portrait');
/*$dompdf->set_paper("A4", "portrait");*/
/*$dompdf->load_html(utf8_decode($html));*/
$dompdf->load_html($html); 
$dompdf->render();
$dompdf->stream("sample.pdf");



?>