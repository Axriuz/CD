<?php
require_once("dompdf/dompdf_config.inc.php");
/*
$mysqli = new mysqli("localhost", "root", "", "bd_ed");
if ($mysqli->connect_errno) {
echo "Fallo al conectar con la base de datos MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


$result=$mysqli->query("SELECT aluctr FROM dalumn WHERE alucod <> ''");

while ($arr_result = $result->fetch_array())
{
	$nombre[]=$arr_result["aluctr"];

}
*/


//good
/*

for ($i=0; $i < 10 ; $i++) { 
	$html .= "dsfdfgfsg ".$nombre[$i]."      ";
}
*/


//$html= $nombre;


$html .= "<img src='pie.jpg'> ";
$html .= "<img src='pie.jpg'> ";
$html .= "<center> <div class = 'img'> <img src='arribatodo.jpg'> </div> </center>";

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("sample.pdf");

?>