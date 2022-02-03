<?php
echo '<img src="piep.JPG"/>';
echo '<style>
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
echo '</style>';
require 'conexion.php';						
//require_once 'pdf/dompdf_config.inc.php';
require_once ('pdf/dompdf_config.inc.php');
mysqli_query($mysqli,"SET NAMES 'utf8'");

echo '<img id="myimg1" src="arribatodo.JPG">';
echo '<div id="apDiv6"></div>';

echo '
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Ejemplo de Documento en PDF.</title>
</head>
<body>
';
$result = $mysqli -> query ("SELECT idPersonal,apePersonal,nomPersonal FROM personal WHERE idDepartamento='5' order by apePersonal");	

if ($row=$result ->fetch_array(MYSQLI_ASSOC))
{	
    do{	
	        $queryi = $mysqli -> query ("SELECT distinct      data_Alum.`alumCtrl`,data_Alum.`alumApp`,data_Alum.`alumApm`,data_Alum.`alumNom` from data_Alum INNER join lista_Alumnos on lista_Alumnos.alumCtrl=data_Alum.alumCtrl INNER join grupos ON grupos.idComp=lista_Alumnos.idComp INNER JOIN personal on personal.idPersonal=grupos.idPersonal where personal.idPersonal='".$row['idPersonal']."' and data_Alum.alumCod is null ORDER BY data_Alum.alumApp");	
	
	
	if ($row1=$queryi ->fetch_array(MYSQLI_ASSOC))
    {	
	echo "<br><br>DOCENTE: ".$row['apePersonal']." ".$row['nomPersonal'];
    echo '</center><br><br>';	
	echo '<table border= "1" cellspacing="0" cellpadding="0" width="100%" height="100%">';
	echo '<tr>';
	echo '<td WIDTH="5">';
	echo '<center>';
	echo "<strong>";
	echo 'NC.';
	echo "</strong>";
	echo '</center>';	
	echo '</td>';
	echo '<td WIDTH="70">';
	echo '<center>';
	echo "<strong>";
	echo 'APELLIDO PATERNO';
	echo "</strong>";
	echo '</center>';	
	echo '</td>';
	echo '<td WIDTH="30">';
	echo '<center>';
	echo "<strong>";
	echo 'APELLIDO MATERNO';
	echo "</strong>";
	echo '</center>';	
	echo '</td>';
	echo '<td WIDTH="50">';
	echo '<center>';
	echo "<strong>";
	echo 'NOMBRE';
	echo "</strong>";
	echo '</center>';	
	echo '</td>';
	echo '</tr>';
	$contador=1;
      do{	
	echo '<tr>';
	echo '<td WIDTH="5">';
	echo '<center>';
	echo $row1['alumCtrl'];
	echo '</center>';
	echo '</td>';
	echo '<td WIDTH="70">';
    echo $row1['alumApp'];
	echo '</td>';
	echo '<td WIDTH="30">';
    echo $row1['alumApm'];
	echo  '</td>';
    echo  '<td WIDTH="50">';
	echo  $row1['alumNom'];
	echo  '</td>';
	echo  '</tr>';
	$contador=$contador+1;
    	}while($row1=$queryi->fetch_array(MYSQLI_ASSOC));

}
//echo "<br>";
//echo "<br>";	//$resSql1=mysql_query($sql1); 
//echo  '<br>';
//echo  "<br>";
//echo  ' ';
//echo "<strong>";
//echo "</strong>";
//echo  '<br>';
echo   '</table>';
	}while($row=$result->fetch_array(MYSQLI_ASSOC));
}
echo  '
</body>
</html>';
 ?>
