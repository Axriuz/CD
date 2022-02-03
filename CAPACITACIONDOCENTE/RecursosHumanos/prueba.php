<?php

$curso = $_POST["cursos"]; 

 $usuario =$_SESSION['usuario'];

 $host='mysql.webcindario.com';
 $user='cursosdesacad';
 $pass='jmrs1905';
 $conexion=mysql_connect($host,$user,$pass);
 mysql_query("SET NAMES 'utf8'");
$bd_seleccionada = mysql_select_db('cursosdesacad', $conexion);


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

//$html.= utf8_decode("Tecnológico Nacional de México");
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
//$html.= '<img id="myimg1" src="arribatodo.JPG" alt="Smiley face" align="top">';
//$html.= '<img id="myimg1" src="arribatodo.JPG">';


//$html.= '<img src="sep.jpg"/>';
//$html.= '<img src="arribatodo.JPG"/>';
//$html.='<div id="apDiv6"></div>';
$sql="select distinct maestro.nombre from maestro, matriculas where matriculas.Curso = '$curso' and matriculas.Emp = maestro.emp order by maestro.nombre asc"; 
$sql1="SELECT maestro.nombre FROM maestro INNER JOIN curso ON maestro.Emp = curso.instructor WHERE ( curso.instructor=maestro.Emp and curso.nombre='$curso' )";
//$sql1nombre="SELECT maestro.nombre FROM maestro INNER JOIN curso ON maestro.Emp = curso.instructor WHERE ( curso.instructor=maestro.Emp and curso.nombre='$curso' )";

mysql_query( "SET lc_time_names = 'es_ES'" ); 
$query_getArchives = "SELECT DATE_FORMAT(  `CursoInicio` ,  '%d de %M ' ) AS modified_date
FROM curso where Nombre='$curso'";

mysql_query( "SET lc_time_names = 'es_ES'" ); 
$query_getArchives1 = "SELECT DATE_FORMAT(  `CursoFin` ,  '%d de %M de %Y' ) AS modified_date
FROM curso where Nombre='$curso'";

$resSql=mysql_query($sql); 
//$resSqlnombre=mysql_query($sqlnombre); 

$resSql1=mysql_query($sql1); 

//$html.= '<center>';	
//$html.= '<h3>';
$html.= '<table width="743" height="85" border="1" CELLPADDING=5 CELLSPACING=0 align="center">';
 $html.= ' <tr>';
 $html.= '   <td rowspan="2"><center><img src="ITCGLOGO.jpg" width="50" height="50" HSPACE="10" VSPACE="10"/></center></td>';

 $html.= '   <td>Nombre del documento. Lista de asistencia</td>';
 $html.= '   <td rowspan="2">Codigo:ITCG-DP-PO-038-02</td>';
 $html.= ' </tr>';
 $html.= ' <tr>';
 $html.= '   <td>Referencia a la Norma ISO 9001:2008 6.2.1,6.2.2,6.4,7.4.1</td>';
 $html.= ' </tr>';
$html.= '</table>';
$html.= '<br>';
$html.= '<br>';
$html.= '<br>';

//$html.= '</h3>';

$html.= "<br>";
$html.= "<br>";
//$html.= "<h3>";
$html.= "NOMBRE DEL CURSO-TALLER: ";
$html.="<u>";
$html.= "$curso";
$html.="</u>";
//$html.= "</h3>";
$html.= '';
$html.= '<br>';



while ($dato1=mysql_fetch_row($resSql1))
{	
//$html.= ' ';
$html.= "NOMBRE DEL/DE LA INSTRUCTOR(A); ";
$html.="<u>";
	$html.= $dato1[0];
	$html.="</u>";
	
}
$html.= '<br>';

$result = mysql_query($query_getArchives);  

$resultf = mysql_query($query_getArchives1);  

while ($dato12=mysql_fetch_row($result))
{	
$html.= ' ';
$html.= "PERIODO ";
$html.="<u>";
	$html.= $dato12[0];
	
}
$html.= ' al ';
while ($dato121=mysql_fetch_row($resultf  ))
{	

	$html.= $dato121[0];
	$html.="</u>";
	
}

$html.= '<br>';
$html.= 'LISTA DE ASISTENCIA';


$html.= '</center>';	


$html.= "<br>";
$html.= "<br>";
	$html.= '<font size="3" color="black">';
	//$html.= '<table border= "1" width="70%" height="70%">';
	$html.= '<TABLE BORDER=1 CELLPADDING=5 CELLSPACING=0 align="center">>';
	$html.= '<TR>';
	$html.= '	<TD ROWSPAN=2>No.</TD>';
	$html.= '	<TD ROWSPAN=2>NOMBRE DEL PARTICIPANTE</TD>';
	$html.= '	<TD ROWSPAN=2>R.F.C.</TD>';
	$html.= '	<TD ROWSPAN=2>PUESTO Y AREA DE ADSCRIPCION</TD>';
	
	$html.= '	<TD COLSPAN=2>NIVEL DEL PUESTO</TD>';
        $html.= '	<TD COLSPAN=5>ASISTENCIA</TD>';
	$html.= '</TR>';
	$html.= '<TR>';
	
	$html.= '	<TD>P</TD> <TD>F</TD>';
	$html.= '	<TD>L</TD> <TD>M</TD> <TD>M</TD>';
	$html.= '	<TD>J</TD> <TD>V</TD>';

	$html.= '</TR>';

	
	
	$contador=1;
	while ($dato=mysql_fetch_row($resSql))
{	
	$html.= '<tr>';
	$html.= '<td WIDTH="1">';
	$html.= '<center>';
	$html.= $contador;
	$html.= '</center>';
	$html.= '</td>';
	$html.= '<td WIDTH="1">';
	$html.= $dato[0];
	$html.= '</td>';
	//
	$html.= '<td WIDTH="1">';
	$sqlRFC="SELECT UPPER(Rfc) FROM maestro WHERE Nombre='$dato[0]'";
        $resSqlRFC=mysql_query($sqlRFC); 
while ($datoRFC=mysql_fetch_row( $resSqlRFC))
{	
$html.= $datoRFC[0];
}
	
	$html.= '</td>';
	

	$html.= '</td>';
	$html.= '<td WIDTH="1">';

	$sqlPuesto="SELECT UPPER(Puesto) FROM maestro WHERE Nombre='$dato[0]'";
        $resSqlPuesto=mysql_query($sqlPuesto); 
while ($datoPuesto=mysql_fetch_row( $resSqlPuesto))
{	
$html.= $datoPuesto[0];
}
	$html.= '</td>';
	
	$html.= '</td>';
	//
$arrojado="SELECT Tipo_p_d FROM maestro WHERE Nombre='$dato[0]'";
 $resSqlPuestoFD=mysql_query($arrojado); 
while ($datoFD = mysql_fetch_array($resSqlPuestoFD))
{
//$html.= $datoFD[0];

if ('Docente' == $datoFD[0]) 
{ 
$html.= '<td WIDTH="1">';
        $html.= 'X';
	$html.= '</td>';
	
	$html.= '</td>';
	//
	$html.= '<td WIDTH="1">';
	$html.= '</td>';
	
	$html.= '</td>';
} 
else if ('Funcionario' == $datoFD[0]) 
{ 		
$html.= '<td WIDTH="1">';
	//$html.= 'D';
	$html.= '</td>';
	
	$html.= '</td>';
	//
	$html.= '<td WIDTH="1">';
	$html.= 'X';
	$html.= '</td>';
	
	$html.= '</td>';
} 
}
	//
	//$arrojado="SELECT Tipo_p_d FROM maestro WHERE Nombre='$dato[0]'";
	//$consulta = mysql_fetch_assoc($arrojado); // Ahora puedes manipular con este dato a través de un array referencial que es "$consulta['aleatoria']". 
 //$resSqlTIPO=mysql_query($arrojado); 
//luego haces tu comparación normal: 
//$html.= $resSqlTIPO;



	//$arrojado="SELECT Tipo_p_d FROM maestro WHERE Nombre='$dato[0]'";
       //$resultado = mysql_fetch_array($arrojado); 
       
       //$variable= 'Docente';
       //$valor = $resultado['Tipo_p_d']; //LE ASIGNAMOS UNA VARIABLE AL RESULTADO DE LA CONSULTA 
        /*
$arrojado=mysql_query("select aleatoria from datos where id='1'",$conexion) or die("Problemas en el select:".mysql_error()); 

$resultado = mysql_fetch_array($arrojado); 

$variable= loquesea; //ESTE ES TU VARIABLE 

$valor = $resultado['aleatoria']; //LE ASIGNAMOS UNA VARIABLE AL RESULTADO DE LA CONSULTA 

//COMPARAMOS CON UNA CONDICIONAL 

if($valor == $variable){ 
echo "son iguales"; 
} else { 
echo "son diferentes"; 
} 

        */
        /*
        if($valor == $variable){ 
        $html.= '<td WIDTH="1">';
        $html.= 'X';
	$html.= '</td>';
	
	$html.= '</td>';
	//
	$html.= '<td WIDTH="1">';
	$html.= '</td>';
	
	$html.= '</td>';
        } else 
        { 
        $html.= '<td WIDTH="1">';
	//$html.= 'D';
	$html.= '</td>';
	
	$html.= '</td>';
	//
	$html.= '<td WIDTH="1">';
	$html.= 'X';
	$html.= '</td>';
	
	$html.= '</td>';
        }*/
        
//while ($datoPuesto=mysql_fetch_row( $resSqlTipo_p_d))
//{	// $DF=$datoPuesto;
//if($datoTipo_p_d[0]=="Funcionario")
//if($datoTipo_p_d[0]=="Docente")
//{
	//++++++
	//$html.= '<td WIDTH="1">';
	//$html.= 'X';
	//$html.= '</td>';
	
	//$html.= '</td>';
	//
	//$html.= '<td WIDTH="1">';
	//$html.= '</td>';
	
	//$html.= '</td>';
	//++++++++
	//}
	//else if($datoTipo_p_d[0]=="Funcionario")
	//{
	//++++++
	/*
	$html.= '<td WIDTH="1">';
	//$html.= 'D';
	$html.= '</td>';
	
	$html.= '</td>';
	//
	$html.= '<td WIDTH="1">';
	$html.= 'X';
	$html.= '</td>';
	
	$html.= '</td>';
	*/
	//++++++++
	//}
//}

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
$html.= '</font>';	
$html.= "<br>";
while ($dato1=mysql_fetch_row($resSql1))
{	
	
	$html.= $dato1[0];
	
}
$html.= "<br>";	//$resSql1=mysql_query($sql1); 

$resultado = mysql_query("SELECT maestro.nombre FROM maestro INNER JOIN curso ON maestro.Emp = curso.instructor WHERE ( curso.instructor=maestro.Emp and curso.nombre='$curso' )
");
if (!$resultado) {
    echo 'No se pudo ejecutar la consulta: ' . mysql_error();
    exit;
}
$html.= '<br>';
$fila = mysql_fetch_row($resultado);
$html.= "<br>";
$html.= ' ';
$html.="<strong>";
$html.= 'INSTRUCTOR ';
$html.= $fila[0];
$html.="</strong>";
$html.= '<br>';
	

$html.= '</table>';

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
