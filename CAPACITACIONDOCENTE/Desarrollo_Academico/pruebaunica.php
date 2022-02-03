<?php
//linea para evitar errores por version de mysqli
error_reporting(E_ALL ^ E_DEPRECATED);


 require('con.php');

require_once '../pdf/dompdf_config.inc.php';

$curso = $_REQUEST["cursos"]; 
$JEFE = $_REQUEST["nombre"]; 
$MEM = $_REQUEST["MEM"]; 


$html= '';

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
}


footer {
  background-color: withe;
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 40px;
  color: black;
}

';
$html.='</style>';


$usuario =$_SESSION['usuario'];

/*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysqli_connect($host,$user,$pass,'UTF8');
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query("SET NAMES UTF8");
mysqli_set_charset(connection,charset);

*/

$prueba="select UPPER(Nombre) from curso where Nombre='$curso'"; 
$prueba1=mysqli_query($con,$prueba); 
$dato122=mysqli_fetch_row($prueba1);

//se agregó el campo sexo
$sql="select maestro.ApellidoP,maestro.ApellidoM,maestro.nombre, maestro.sexo from maestro, matriculas where (matriculas.Emp = maestro.emp and matriculas.Curso ='$dato122[0]') order by maestro.ApellidoP,maestro.ApellidoM";


$sql1="SELECT maestro.ApellidoP,maestro.ApellidoM,maestro.nombre FROM maestro INNER JOIN curso ON maestro.Emp = curso.instructor WHERE ( curso.instructor=maestro.Emp and curso.nombre='$dato122[0]')";

$sql1nombre="SELECT maestro.nombre FROM maestro INNER JOIN curso ON maestro.Emp = curso.instructor WHERE ( curso.instructor=maestro.Emp and curso.nombre='$curso' )";



mysqli_query($con ,"SET lc_time_names = 'es_ES'" ); 
$query_getArchives = "SELECT DATE_FORMAT(  `CursoInicio` ,  '%d de %M ' ) AS modified_date
FROM curso where Nombre='$curso'";

mysqli_query($con, "SET lc_time_names = 'es_ES'" ); 
$query_getArchives1 = "SELECT DATE_FORMAT(  `CursoFin` ,  '%d de %M de %Y' ) AS modified_date
FROM curso where Nombre='$curso'";

$resSql=mysqli_query($con,$sql); //NOMBRE DE DOCENTES
$resSqlnombre=mysqli_query($con,$sql1nombre); 

$resSql1=mysqli_query($con,$sql1); 

//$html.= '<center>';	
//$html.= '<h3>';

 //BIEN TABLE
	$html.= '<font size="-2" color="black">';
$html.= utf8_decode('

<TABLE width="743" height="50" border="1" CELLPADDING=2 CELLSPACING=0 align="center">
<tr>

<td colspan="3">




<CENTER><div style="letter-spacing: 5px;"><strong>TECNOL&Oacute;GICO NACIONAL DE M&Eacute;XICO</strong></div></CENTER>
<CENTER><div style="letter-spacing: 5px;">INSTITUTO TECNOL&Oacute;GICO DE CD. GUZM&Aacute;N</div></CENTER>
</td>
</tr>
<tr>
<td rowspan="3"><center><img src="ITCGLOGO.jpg" width="50" height="50" HSPACE="10" VSPACE="10"/></center></td>
<td rowspan="2"><CENTER><strong>Nombre del documento:</strong> LISTA DE ASISTENCIA</CENTER></td>
<td>C&oacute;digo:ITCG-AC-PO-003-04</td>
</tr>
<tr>
  <td rowspan="2">Revisi'.'&oacute;'.'n: 3</td>
</tr>
<tr>
<td><CENTER><strong>Referencia de la norma:</strong> ISO 9001:2015 7.2</CENTER></td>
</tr>
</TABLE>
');

//$html.= '<br>';
//$html.= '<br>';
//$html.= '<br>';

//$html.= '</h3>';


$html.= "<br>";
//$html.= "<h3>";

//utf8_decode(utf8_encode

//$html.=utf8_decode( "<center>Subdirecci&oacute;n Acad&eacute;mica <br>
//Departamento de Desarrollo Acad&eacute;mico <br>
//LISTA DE ASISTENCIA PARA CURSO PRESENCIAL</center>");

$html.=utf8_decode( "

<table width='100%' border='0'>
  <tr>
    <td align='center'><strong>Subdirecci&oacute;n Acad&eacute;mica</strong></td>
  </tr>
  <tr>
    <td align='center'><strong>Departamento de Desarrollo Acad&eacute;mico</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align='center'><strong>LISTA DE ASISTENCIA PARA CURSO PRESENCIAL</strong></td>
  </tr>
</table>

NOMBRE DEL CURSO-TALLER: <u> $dato122[0]</u>");
$html.="<u>";
//$html.= ''.$curso;
$html.="</u>";
//$html.= "</h3>";
$html.= '';
$html.= '<br>';



while ($dato1=mysqli_fetch_row($resSql1))
{	

$sql11="SELECT InsAux FROM curso WHERE curso.nombre='$dato122[0]'";
$resSql1=mysqli_query($con,$sql11); 
$dato11=mysqli_fetch_row($resSql1);


$sqlhorario="SELECT horario FROM curso WHERE curso.nombre='$dato122[0]'";
$resSqlhorario=mysqli_query($con,$sqlhorario); 
$datohorario=mysqli_fetch_row($resSqlhorario);

$sqlhorario1="SELECT horario1 FROM curso WHERE curso.nombre='$dato122[0]'";
$resSqlhorario1=mysqli_query($con,$sqlhorario1); 
$datohorario1=mysqli_fetch_row($resSqlhorario1);


	
if($dato11[0]!="")
{
$MA="SELECT ApellidoP,ApellidoM,Nombre FROM maestro WHERE Emp='$dato11[0]'";
$MAE=mysqli_query($con,$MA); 
$MAESTR=mysqli_fetch_row($MAE);
	
	$html.= "NOMBRE DEL/DE LOS INSTRUCTORES(RAS); ";
    $html.="<u>";
	$html.= utf8_decode($dato1[0])." ".utf8_decode($dato1[1])." ".utf8_decode($dato1[2])." - ".utf8_decode($MAESTR[0])." ".utf8_decode($MAESTR[1])." ".utf8_decode($MAESTR[2]);
	$html.="</u>";
	
}

else
{
//$html.= ' ';
$html.= "NOMBRE DEL/DE LA INSTRUCTOR(A): ";
$html.="<u>";
	$html.= utf8_decode($dato1[0])." ".utf8_decode($dato1[1])." ".utf8_decode($dato1[2]);
	$html.="</u>";
}
}
//$html.= '<br>';

$result = mysqli_query($con,$query_getArchives);  

$resultf = mysqli_query($con,$query_getArchives1);  

while ($dato12=mysqli_fetch_row($result))
{	
$html.= ' ';
$html.= "PERIODO: ";
$html.="<u>";
	$html.= " ".$dato12[0];
	
}
$html.= ' al ';
while ($dato121=mysqli_fetch_row($resultf  ))
{	

	$html.= $dato121[0];
	$html.="</u>";
	
}
$html.=' HORARIO:   <u>  '.$datohorario[0]."hrs. a ".$datohorario1[0]."hrs.</u>";

$html.= '<br>';
//$html.= 'LISTA DE ASISTENCIA';


$html.= '</center>';	


$html.= "<br>";
$html.= '<font>';
	$html.= '<font size="-5" color="black">';
	//	$html.= '<font size="-2" color="black">';

	//$html.= '<tablie border= "1" width="70%" height="70%">';

	$html.= '<TABLE width="700" BORDER=1 CELLPADDING=1 CELLSPACING=0>';
	$html.= '<TR>';
	$html.= '	<TD ROWSPAN=2>No.</TD>';
	$html.= '	<TD ROWSPAN=2>NOMBRE DEL PARTICIPANTE</TD>';
	$html.= '	<TD ROWSPAN=2>SEXO</TD>';
	$html.= '	<TD ROWSPAN=2>R.F.C.</TD>';//+++++activar despues de acomodar RFC
	$html.= '	<TD ROWSPAN=2>PUESTO Y AREA DE ADSCRIPCION</TD>';
	
	$html.= '	<TD COLSPAN=2>NIVEL DEL PUESTO</TD>';
        $html.= '	<TD COLSPAN=5>ASISTENCIA</TD>';
	$html.= '</TR>';
	$html.= '<TR>';
	
	$html.= '	<TD>P</TD> <TD>F</TD>';
	$html.= '	<TD>L</TD> <TD>M</TD> <TD>M</TD>';
	$html.= '	<TD>J</TD> <TD>V</TD>';

	$html.= '</TR>';
	$bol=TRUE;
	$contador=1;
	while ($dato=mysqli_fetch_row($resSql))
{	
$html.= '<tr>';
	$html.= '<td WIDTH="1">';
	$html.= '<center>';
	$html.= $contador;
	$html.= '</center>';
	$html.= '</td>';
	
	$html.= '<td WIDTH="1">';
	$html.= utf8_decode($dato[0])." ".utf8_decode($dato[1])." ".utf8_decode($dato[2]);
	$html.= '</td>';
	
	/*Agregado del campo sexo */
	if ($dato[3]=="Femenino")
		$genero="Mujer";
	else
		$genero="Hombre";
	$html.= '<td WIDTH="1">';
	$html.= utf8_decode($genero);
	$html.= '</td>';
	/* */
	$html.= '<td WIDTH="1">';
	$sqlRFC="SELECT UPPER(Rfc) FROM maestro WHERE ApellidoP='$dato[0]' and ApellidoM='$dato[1]' and Nombre='$dato[2]'";
    $resSqlRFC=mysqli_query($con,$sqlRFC); 
	$RFC=mysqli_fetch_row($resSqlRFC);
	$html.=$RFC[0];
	$html.= '</td>';
	
	
	//$html.= '</td>';
	$html.= '<td WIDTH="1">';
	$sqlPuesto="SELECT UPPER(Puesto) FROM maestro WHERE ApellidoP='$dato[0]' and ApellidoM='$dato[1]' and Nombre='$dato[2]'";
    $resSqlPuesto=mysqli_query($con,$sqlPuesto); 
          while ($datoPuesto=mysqli_fetch_row( $resSqlPuesto))
          {	
         $html.= $datoPuesto[0];
          }
	$html.= '</td>';
	
       $arrojado="SELECT Tipo_p_d FROM maestro WHERE ApellidoP='$dato[0]' and ApellidoM='$dato[1]' and Nombre='$dato[2]'";
       $resSqlPuestoFD=mysqli_query($con,$arrojado); 
        while ($datoFD = mysqli_fetch_array($resSqlPuestoFD))
          {
       			if ($datoFD[0]=='Docente' ) 
        			 { 
				$html.= '<td WIDTH="1">';
        		$html.= 'X';
				$html.= '</td>';
				$html.= '</td>';
				$html.= '<td WIDTH="1">';
				$html.= '</td>';
				$html.= '</td>';
         			} 
        		else if ($datoFD[0]=='Funcionario' ) 
        			{ 		
				$html.= '<td WIDTH="1">';
				$html.= '</td>';
				$html.= '</td>';
				$html.= '<td WIDTH="1">';
				$html.= 'X';
				$html.= '</td>';
				$html.= '</td>';
        			 }
			   else
			     {$html.= '<td WIDTH="1">';
				$html.= '</td>';
				$html.= '</td>';
				$html.= '<td WIDTH="1">';
				$html.= '</td>';
				$html.= '</td>';
					 
					 }
   
          }

	$html.= '<td WIDTH="1">';
	$html.= '</td>';
	$html.= '</td>';
	$html.= '<td WIDTH="1">';
	$html.= '</td>';
	
	$html.= '</td>';
	$html.= '<td WIDTH="1">';
	$html.= '</td>';
	
	$html.= '</td>';
	$html.= '<td WIDTH="1">';
	$html.= '</td>';
	
	$html.= '</td>';
	$html.= '<td WIDTH="1">';
	$html.= '</td>';
	$html.= '</tr>';
	$contador=$contador+1;
    }
$html.= '</TABLE>';	


$html.= "<br>";

$html.= "<br>";	

$resultado = mysqli_query($con,"SELECT maestro.ApellidoP,maestro.ApellidoM,maestro.nombre FROM maestro INNER JOIN curso ON maestro.Emp = curso.instructor WHERE ( curso.instructor=maestro.Emp and curso.nombre='$curso' )
");
if (!$resultado) {
    echo 'No se pudo ejecutar la consulta: ' . mysqli_error();
    exit;
}
//$html.= '<br>';
$fila = mysqli_fetch_row($resultado);
//$html.= "<br>";
$html.= ' ';

$sql11="SELECT InsAux FROM curso WHERE curso.nombre='$dato122[0]'";
$resSql1=mysqli_query($con,$sql11); 
$dato11=mysqli_fetch_row($resSql1);

	
if($dato11[0]!="")
{
	$MA="SELECT Nombre,ApellidoP,ApellidoM FROM maestro WHERE Emp='$dato11[0]'";
$MAE=mysqli_query($con,$MA); 
$MAESTR=mysqli_fetch_row($MAE);

$html.="<strong>";
$html.= '
<CENTER>
<TABLE style="text-align:center;"  CELLPADDING=0 CELLSPACING=0 width="743" height="59" border="0">
  <tr>
    <td>___________________________</td>
    <td>___________________________</td>
    <td>___________________________</td>
  </tr>
 
  <tr>
    <td>'.utf8_decode($fila[2]).' '.utf8_decode($fila[0]).' '.utf8_decode($fila[1]).'</td>
    <td>'.utf8_decode($MAESTR[0]).' '.utf8_decode($MAESTR[1]).' '.utf8_decode($MAESTR[2]).'</td>
        <td> '.$JEFE.'</td>
  </tr>
   <tr>
     <td>Nombre y firma del instructor(a) </td>
     <td>Nombre y firma del instructor(a) </td>
    <td>'.$MEM.'</td>
  </tr>
</TABLE></CENTER>';
$html.="</strong>";
$html.= '<br>';
	
}


else
{

$html.="<strong>";
//$html.= 'INSTRUCTOR ';
//$html.= $fila[0];
//$html.=' <div style="text-align:right;"> JEFE DE OFICINA: '.$JEFE.'</div>';

$html.= '
<div>
<CENTER>
<TABLE style="text-align:center;" width="743"  border="0"  CELLPADDING=1 CELLSPACING=0>
  <tr>
    <td >___________________________</td>
    <td></td>
    <td>___________________________</td>
  </tr>
 
  <tr>
    <td>'.utf8_decode($fila[2]).' '.utf8_decode($fila[0]).' ' .utf8_decode($fila[1]).'</td>
    <td></td>
    <td>'.$JEFE.'</td>
  </tr>
   <tr>
    <td>INSTRUCTOR(A)</td>
    <td></td>
    <td>'.$MEM.'</td>
  </tr>
</TABLE></CENTER></div>';
$html.="</strong>";
}
	$html.= '</font>';
	//$html.="JEFE DE OFICINA: ".$JEFE;



	//while ($dato1nombre=mysqli_fetch_row($resSql1nombre))
//{	

//$html.= $dato1nombre[0];
//}


$html.= '
<footer>
<TABLE width="743" height="50" border="0" CELLPADDING=2 CELLSPACING=0 align="center">
<tr>
<td align="center">
Toda copia en papel es un <strong>"Documento No Controlado"</strong> a excepci&oacute;n del original
</td>
 

</tr>




</TABLE>
</footer>

';

 //$html.= '<img src="piep.JPG"/>';
 //$html.='<img id="myimg" src="piep.JPG" alt="Smiley face" align="middle">';
 
 // $html.='<img id="myimg" src="piep.JPG" alt="Smiley face" align="middle">';
$mipdf = new DOMPDF();
//$mipdf ->set_paper("A4", "portrait");
$mipdf->set_paper("a4", "landscape");
$mipdf ->load_html(utf8_decode(utf8_encode($html)));
$mipdf ->render();
$mipdf ->stream('DOCENTES DEL CURSO '.$curso.'.pdf');



 $pdf->Output();
 ?>
