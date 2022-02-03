<?php

$curso = $_POST["cursos"]; 

 $usuario =$_SESSION['usuario'];

$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $conexion);
mysql_query("SET NAMES UTF8");


require_once '../pdf/dompdf_config.inc.php';



	 $html.= '<meta http-equiv="content-type" content="text/html; charset=UTF-8">';

header('Content-type: text/html; charset=UTF-8');
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: /index.html'); 
  exit();
}
//$html.='<img src="arribatodo.JPG" alt="Smiley face" align="middle">';
// $html.= '<img src="piep.JPG"/>';

//$html.= utf8_decode("Tecnol�gico Nacional de M�xico");
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

	$consulta_mysql="SELECT Nombre from maestro where Area='$curso'";
$resultado_consulta_mysql=mysql_query($consulta_mysql);

while($fila=mysql_fetch_array($resultado_consulta_mysql)){
  
    $html.= " <option value='".$fila['Nombre']."'>".$fila['Nombre']."</option>";
}
	
	
	

	//while ($dato1nombre=mysql_fetch_row($resSql1nombre))
//{	

//$html.= $dato1nombre[0];
//}




 //$html.= '<img src="piep.JPG"/>';
 //$html.='<img id="myimg" src="piep.JPG" alt="Smiley face" align="middle">';
 
 // $html.='<img id="myimg" src="piep.JPG" alt="Smiley face" align="middle">';
$mipdf = new DOMPDF();
//$mipdf ->set_paper("A4", "portrait");
$mipdf->set_paper("a4", "landscape");
$mipdf ->load_html(utf8_decode($html));
$mipdf ->render();
$mipdf ->stream('DOCENTES DEL CURSO '.$curso.'.pdf');
/*
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->set_paper('a4', 'landscape');
$dompdf->render();
*/
//$mipdf ->Image('sep.jpg',10,72,150);

 $pdf->Output();
 ?>
