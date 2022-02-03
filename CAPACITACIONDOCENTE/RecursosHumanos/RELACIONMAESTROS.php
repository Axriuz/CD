<?php
error_reporting(0);
$a= $_POST["a"]; 
$periodo=$_REQUEST['periodo'];

if($periodo=="Todo el año")
{
	$periodo="";
	$sql="
select DISTINCT PersonalRH.ApellidoP,PersonalRH.ApellidoM,PersonalRH.nombre,PersonalRH.Sexo 
from PersonalRH inner join matriculasRH on PersonalRH.Emp=matriculasRH.Emp 
inner join cursoRH on matriculasRH.Curso=cursoRH.Nombre where Year(CursoInicio)='$a'  ORDER BY PersonalRH.ApellidoP,PersonalRH.ApellidoM,PersonalRH.nombre"; 
}
else
{
$sql="
select DISTINCT PersonalRH.ApellidoP,PersonalRH.ApellidoM,PersonalRH.nombre,PersonalRH.Sexo 
from PersonalRH inner join matriculasRH on PersonalRH.Emp=matriculasRH.Emp 
inner join cursoRH on matriculasRH.Curso=cursoRH.Nombre where Year(CursoInicio)='$a' and cursoRH.Periodo='$periodo'
ORDER BY PersonalRH.ApellidoP,PersonalRH.ApellidoM,PersonalRH.nombre"; 
}

$curso = $_POST["cursos"]; 
$usuario =$_SESSION['usuario'];

require('con.php');
require_once '../pdf/dompdf_config.inc.php';
        $html.= '  ';
header("Content-Type: text/html;charset=utf-8");

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
$html.='</style>';

$html.= '<img id="myimg1" src="arribatodo.JPG">';

$html.='<div id="apDiv6"></div>';

$resSql=mysqli_query($con,$sql); 

if(mysqli_fetch_row($resSql)==null)
{
	 ?>
	<html>
		
		
		<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	

<?php
error_reporting(0);
//header('Content-Type: text/html; charset=UTF-8');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: /index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];



echo "<form action='#' method='post'>";
echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30   bordercolor='#497f43'  ;>";
echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/icono_empleado.png' >";
echo "</td>";
echo "<td>";
echo "<center>";
echo "<h2>";
echo "NO SE TIENEN REGISTROS DEL AÑO ".$a;
echo "<br>".$periodo."<br>";
echo "<br>".$sql."<br>";
echo "</h2>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "</form>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";

?>

<br>
<br>
	<a href="listas.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
	</body>
</html>
<?php
}
else
{

    //codigo agregado
$sqlcontador = "select * from PersonalRH";
$sqlresultadocontador = mysqli_query($con,$sqlcontador);
while ($datocontador=mysqli_fetch_row($sqlresultadocontador))
{
   $cont = $cont + 1;
}

$auxiliar = $cont;

$html.= '<center>';	
$html.= '';
$html.= '<br>';
$html.= '<br>';
	$html.="<strong>";
$html.= utf8_decode('RELACIÓN DE personal QUE PARTICIPARON EN CURSOS INTERSEMESTRALES');
	$html.="</strong>";
$html.= '<br>';


if($periodo=="Todo el año")
{
$html.= 'ENERO-DICIEMBRE AÑO '.$a;
}
else
{
    
 $html.=utf8_decode(strtoupper($periodo.' AÑO '.$a));   
}




$html.= '<br>';
$html.= '</center>';	
$html.= "<br>";
$html.= "<br>";
	$html.= '<table border= "1" >';
	$html.= '<tr>';
	$html.= '<td WIDTH="1">';
	$html.="<strong>";
	$html.= 'NO.';
	$html.="</strong>";
	$html.= '</td>';
	$html.= '<td WIDTH="100%">';
	$html.= '<center>';
	$html.="<strong>";
	$html.= 'NOMBRE';
	$html.="</strong>";
	$html.= '</center>';	
	$html.= '</td>';
	$html.= '</tr>';
	$contador=1;
	$contadorM=0;
	$contadorH=0;

	      // echo 'hola'; 
	while ($dato=mysqli_fetch_row($resSql))
{	
echo 'hola'; 
	$html.= '<tr>';
	$html.= '<td WIDTH="1">';
	$html.= $contador;
	$html.= '</td>';
	$html.= '<td WIDTH="100%">';
	$html.=utf8_decode($dato[0]." ".$dato[1]." ".$dato[2]);
    
	if ('Femenino' == $dato[3]) 
	 {
	 $contadorM=$contadorM+1;
	 }
	else if ('Masculino' == $dato[3]) 
	 {
 $contadorH=$contadorH+1;
	 }
	
	$html.= '</td>';
	$html.= '</tr>';
	$contador=$contador+1;
}

$resPor = bcdiv(($contador-1)*100, $auxiliar, 2);
$html.= '<br>';
$html.= '<br>';
$html.= '<br>';
$html.= $resPor. '% PORSENTAJE DE PROFESORES QUE PARTICIPARON EN CURSOS';
$html.= '<br>';
$html.= $auxiliar. ' TOTAL DE PROFESORES';
$html.= '<br>';
$html.= $contadorH. ' HOMBRES PORCENTAJE: '.round((($contadorH*100)/($contador-1)),2)."%";
$html.= '<br>';
$html.= $contadorM. ' MUJERES PORCENTAJE: '.round((($contadorM*100)/($contador-1)),2)."%";
$html.= '<br>';
$html.= ($contador-1). ' PROFESORES QUE PARTICIPARON EN CURSOS';
$html.= '<br>';
$html.= "<br>";
$html.= "<br>";	
$resultado = mysqli_query($con,"SELECT PersonalRH.nombre FROM PersonalRH INNER JOIN cursoRH ON PersonalRH.Emp = cursoRH.instructor WHERE ( cursoRH.instructor=PersonalRH.Emp and cursoRH.nombre='$curso' )
");
if (!$resultado) {
    echo 'No se pudo ejecutar la consulta: ' . mysqli_error();
    exit;
}
$html.= '<br>';
$fila = mysqli_fetch_row($resultado);
$html.= "<br>";
$html.= ' ';
$html.="<strong>";
$html.= ' ';
$html.= ' ';
$html.="</strong>";
$html.= '<br>';
$html.= '</table>';

$mipdf = new DOMPDF();
$mipdf ->set_paper("A4", "portrait");
$mipdf ->load_html(utf8_decode(utf8_encode($html)));
$mipdf ->render();
$mipdf ->stream(strtoupper('RELACION DE PersonalRHS '.$a.' '.$periodo.'.pdf'));
 $pdf->Output();

}
 
 ?>
