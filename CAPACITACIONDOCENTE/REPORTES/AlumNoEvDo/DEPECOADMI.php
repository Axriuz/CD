
 <?php

require_once ('pdf/dompdf_config.inc.php');
require 'conexion.php';	

mysqli_query($mysqli,"SET NAMES 'utf8'");
	// $html= '<meta http-equiv="content-type" content="text/html; charset=UTF-8">';
	//<BODY onload="window.print()">
	
	echo '<meta http-equiv="content-type" content="text/html; charset=UTF-8">';
	
echo '<BODY onload="window.print()">';
	
	//echo '<input type="button" name="imprimir" value="Imprimir" onclick="window.print();"><br><br>';


echo 'DEPARTAMENTO DE CIENCIAS ECONÓMICO-ADMINISTRATIVAS



<br>
AÑO: '.date("Y").'
';

$result = $mysqli -> query ("SELECT idPersonal,apePersonal,nomPersonal FROM personal WHERE idDepartamento='3' order by apePersonal");	
if ($row=$result ->fetch_array(MYSQLI_ASSOC))
{
	
  do{	
$SQL="SELECT distinct  data_Alum.`alumCtrl`,data_Alum.`alumApp`,data_Alum.`alumApm`,data_Alum.`alumNom` from data_Alum INNER join lista_Alumnos on lista_Alumnos.alumCtrl=data_Alum.alumCtrl INNER join grupos ON grupos.idComp=lista_Alumnos.idComp INNER JOIN personal on personal.idPersonal=grupos.idPersonal where personal.idPersonal='".$row['idPersonal']."' and data_Alum.alumCod is null ORDER BY data_Alum.alumApp,data_Alum.alumApm ";
$queryi = $mysqli -> query ($SQL);

    if($row1=$queryi ->fetch_array(MYSQLI_ASSOC))
    {	
	    echo '<br><br><strong>DOCENTE: '.$row['apePersonal']." ".$row['nomPersonal'].'</strong>';
        echo '</center><br><br>';	
		
	
	
	while ($row1=$queryi->fetch_array(MYSQLI_ASSOC))
		{
			echo ''.$row1['alumCtrl'].'&nbsp;'.$row1['alumApp'].'&nbsp;'.$row1['alumApm'].'&nbsp;'.$row1['alumNom'].'<br>';
			
			
		}
		

		
		
		echo ' <div style="page-break-after:always;"></div>';
		
	}
	
   }while($row=$result->fetch_array(MYSQLI_ASSOC));
}



/*
// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("A4", "portrait");
 
// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));
 
// Renderizamos el documento PDF.
$pdf->render();
 
// Enviamos el fichero PDF al navegador.
$pdf->stream('CIENCIAS DE LA TIERRA.pdf');
*/

 ?>


