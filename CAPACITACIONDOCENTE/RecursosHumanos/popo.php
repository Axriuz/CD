
<?php
$curso = $_REQUEST["cursos"]; 
$JEFE = $_REQUEST["nombre"]; 
$MEM = $_REQUEST["MEM"]; 
require_once '../pdf/dompdf_config.inc.php';
$usuario =$_SESSION['usuario'];
$usuario =$_SESSION['usuario'];
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysql_connect($host,$user,$pass,'UTF8');
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $conexion);
mysql_query("SET NAMES UTF8");




$prueba="select UPPER(Nombre) from curso where Nombre='$curso'"; 
$prueba1=mysql_query($prueba); 
$dato122=mysql_fetch_row($prueba1);
$html.=$dato122[0];


$sql=("select maestro.nombre from maestro, matriculas where (matriculas.Emp = maestro.emp and matriculas.Curso ='$dato122[0]') order by maestro.nombre");
//$sql="select maestro.nombre from maestro, matriculas where (matriculas.Emp = maestro.emp and matriculas.Curso ='ELABORACIÓN MATERIAL PROPEDÉUTICO')";
//$sql="select maestro.Nombre from maestro INNER JOIN matriculas on maestro.Emp=matriculas.Emp where (matriculas.Curso='$curso')"; 





$sql1="SELECT maestro.nombre FROM maestro INNER JOIN curso ON maestro.Emp = curso.instructor WHERE ( curso.instructor=maestro.Emp and curso.nombre='$dato122[0]')";

$sql1nombre="SELECT maestro.nombre FROM maestro INNER JOIN curso ON maestro.Emp = curso.instructor WHERE ( curso.instructor=maestro.Emp and curso.nombre='$curso' )";

mysql_query( "SET lc_time_names = 'es_ES'" ); 
$query_getArchives = "SELECT DATE_FORMAT(  `CursoInicio` ,  '%d de %M ' ) AS modified_date
FROM curso where Nombre='$curso'";

mysql_query( "SET lc_time_names = 'es_ES'" ); 
$query_getArchives1 = "SELECT DATE_FORMAT(  `CursoFin` ,  '%d de %M de %Y' ) AS modified_date
FROM curso where Nombre='$curso'";

$resSql=mysql_query($sql); 
$resSqlnombre=mysql_query($sqlnombre); 

$resSql1=mysql_query($sql1); 

$html.= '<font size="3" color="black">';
	//	$html.= '<font size="-2" color="black">';

	//$html.= '<tablie border= "1" width="70%" height="70%">';
	$html.= '<TABLE BORDER=1 CELLPADDING=1 CELLSPACING=0 align="center">';
	$html.= '<TR>';
	$html.= '	<TD ROWSPAN=2>No.</TD>';
	$html.= '	<TD ROWSPAN=2>NOMBRE DEL PARTICIPANTE</TD>';
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
	$html.= utf8_decode($dato[0]);
	$html.= '</td>';
	//$contado=$contado+1;
	///EL RFC FALLA EN ALGUNOS CASOS+++++++++++++++++++++++++++++++++++
	$html.= '<td WIDTH="1">';
	$sqlRFC="SELECT UPPER(Rfc) FROM maestro WHERE Nombre='$dato[0]'";
    $resSqlRFC=mysql_query($sqlRFC); 
	$RFC=mysql_fetch_row($resSqlRFC);
	$html.=$RFC[0];
	$html.= '</td>';
	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	$html.= '</td>';
	$html.= '<td WIDTH="1">';
	$sqlPuesto="SELECT UPPER(Puesto) FROM maestro WHERE Nombre='$dato[0]'";
    $resSqlPuesto=mysql_query($sqlPuesto); 
          while ($datoPuesto=mysql_fetch_row( $resSqlPuesto))
          {	
         $html.= $datoPuesto[0];
          }
	$html.= '</td>';
	
	//$html.= '</td>';
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
        else
   {$html.= '<td WIDTH="1">';
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
$html.= '</font>';

$html.= "<br>";



$mipdf = new DOMPDF();
//$mipdf ->set_paper("A4", "portrait");
$mipdf->set_paper("a4", "landscape");
$mipdf ->load_html(utf8_decode($html));
$mipdf ->render();
$mipdf ->stream('DOCENTES DEL CURSO.pdf');
?>

