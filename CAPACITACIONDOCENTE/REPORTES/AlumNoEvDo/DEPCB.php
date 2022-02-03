<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once ('pdf/dompdf_config.inc.php');
 require 'conexion.php';	
// Introducimos HTML de prueba
//$html = '<h1>Hola mundo!</h1>';
 


/*

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
					
//require_once 'pdf/dompdf_config.inc.php';
require_once ('pdf/dompdf_config.inc.php');
mysqli_query($mysqli,"SET NAMES 'utf8'");

echo '<img id="myimg1" src="arribatodo.JPG">';
echo '<div id="apDiv6"></div>';
*/
//$html = '<h1>DEPARTAMENTO DE CIENCIAS BÁSICAS</h1>';
mysqli_query($mysqli,"SET NAMES 'utf8'");
	 $html= '<meta http-equiv="content-type" content="text/html; charset=UTF-8">';

$html.='<h1>DEPARTAMENTO DE CIENCIAS BÁSICAS</h1>

<h1>DEPARTAMENTO DE CIENCIAS BÁSICAS</h1>

<br>
AÑO: '.date("Y").'
';

$result = $mysqli -> query ("SELECT idPersonal,apePersonal,nomPersonal FROM personal WHERE idDepartamento='1' order by apePersonal");	
if ($row=$result ->fetch_array(MYSQLI_ASSOC))
{
	
  do{	
$SQL="SELECT distinct  data_Alum.`alumCtrl`,data_Alum.`alumApp`,data_Alum.`alumApm`,data_Alum.`alumNom` from data_Alum INNER join lista_Alumnos on lista_Alumnos.alumCtrl=data_Alum.alumCtrl INNER join grupos ON grupos.idComp=lista_Alumnos.idComp INNER JOIN personal on personal.idPersonal=grupos.idPersonal where personal.idPersonal='".$row['idPersonal']."' and data_Alum.alumCod is null ORDER BY data_Alum.alumApp,data_Alum.alumApm";
$queryi = $mysqli -> query ($SQL);

    if($row1=$queryi ->fetch_array(MYSQLI_ASSOC))
    {	
	    $html.='<br><br><strong>DOCENTE: '.$row['apePersonal']." ".$row['nomPersonal'].'</strong>';
        $html.='</center><br><br>';	
		
		
	  //  $html.='<table border= "1" cellspacing="0" cellpadding="0" width="100%" height="100%">';
		
	   /* $html.='<tr>';
		
	    $html.='<td WIDTH="5">';
	    $html.='<center>';
		$html.='<strong>';*/
	//	$html.='<strong>NC.&nbsp;&nbsp;&nbsp;&nbsp;';
		/*
		$html.='</strong>';
		$html.='</center>';	
		$html.='</td>';*/
		/*
		
		$html.='<td WIDTH="70">';
		$html.='<center>';
		$html.='<strong>';*/
	//$html.='&nbsp;APELLIDO PATERNO&nbsp;';
	
	/*
		$html.='</strong>';
		$html.='</center>';	
		$html.='</td>';
		
		$html.='<td WIDTH="30">';
		$html.='<center>';
		$html.='<strong>';*/
		//$html.='&nbsp;APELLIDO MATERNO&nbsp;';
		/*
		$html.='</strong>';
		$html.='</center>';	
		$html.='</td>';
		
		$html.='<td WIDTH="50">';
		$html.='<center>';
		$html.='<strong>';*/
	//	$html.='&nbsp;NOMBRE</strong><br>';
		/*
		$html.='</strong>';
		$html.='</center>';	
		$html.='</td>';
		
		$html.='</tr>';
		*/
		
	
	while ($row1=$queryi->fetch_array(MYSQLI_ASSOC))
		{
			$html.=''.$row1['alumCtrl'].'&nbsp;'.$row1['alumApp'].'&nbsp;'.$row1['alumApm'].'&nbsp;'.$row1['alumNom'].'<br>';
			
			
			 
	/*
		    $html.='<tr>';
			$html.='<td WIDTH="5">';
   		    $html.='<center>';
			$html.= 'HOLA';
		//	$html.= $row1['alumCtrl'];
			$html.='</center>';
			$html.='</td>';
			$html.='<td WIDTH="70">';
  		   // $html.= $row1['alumApp'];
			$html.='</td>';
			$html.='<td WIDTH="30">';
  		  //  $html.= $row1['alumApm'];
			$html.='</td>';
   		    $html.='<td WIDTH="50">';
			//$html.=$row1['alumNom'];
			$html.='</td>';
			$html.='</tr>';*/
			
		}
		

		
    //	$html.='</table>';
		
		$html.=' <div style="page-break-after:always;"></div>';
		
	}
// $html.='<br><br>DOCENTEd: '.$SQL;
	
   }while($row=$result->fetch_array(MYSQLI_ASSOC));
}
  
  /*
        $html.='<br><br>DOCENTE: '.$row['apePersonal']." ".$row['nomPersonal'];
        $html.='</center><br><br>';	
	    $html.='<table border= "1" cellspacing="0" cellpadding="0" width="100%" height="100%">';
	    $html.='<tr>';
	    $html.='<td WIDTH="5">';
	    $html.='<center>';
		$html.='<strong>';
		$html.='NC.';
		$html.='</strong>';
		$html.='</center>';	
		$html.='</td>';
		$html.='<td WIDTH="70">';
		$html.='<center>';
		$html.='<strong>';
		$html.='APELLIDO PATERNO';
		$html.='</strong>';
		$html.='</center>';	
		$html.='</td>';
		$html.='<td WIDTH="30">';
		$html.='<center>';
		$html.='<strong>';
		$html.='APELLIDO MATERNO';
		$html.='</strong>';
		$html.='</center>';	
		$html.='</td>';
		$html.='<td WIDTH="50">';
		$html.='<center>';
		$html.='<strong>';
		$html.='NOMBRE';
		$html.='</strong>';
		$html.='</center>';	
		$html.='</td>';
		$html.='</tr>';*/
  

	/*	
    do{	
$queryi = $mysqli -> query ("SELECT distinct      data_Alum.`alumCtrl`,data_Alum.`alumApp`,data_Alum.`alumApm`,data_Alum.`alumNom` from data_Alum INNER join lista_Alumnos on lista_Alumnos.alumCtrl=data_Alum.alumCtrl INNER join grupos ON grupos.idComp=lista_Alumnos.idComp INNER JOIN personal on personal.idPersonal=grupos.idPersonal where personal.idPersonal='".$row['idPersonal']."' and data_Alum.alumCod is null ORDER BY data_Alum.alumApp,data_Alum.alumApm");	
	
	
	if ($row1=$queryi ->fetch_array(MYSQLI_ASSOC))
    {	*/
	/*
	    $html.='<br><br>DOCENTE: '.$row['apePersonal']." ".$row['nomPersonal'];
        $html.='</center><br><br>';	
	    $html.='<table border= "1" cellspacing="0" cellpadding="0" width="100%" height="100%">';
	    $html.='<tr>';
	    $html.='<td WIDTH="5">';
	    $html.='<center>';
		$html.='<strong>';
		$html.='NC.';
		$html.='</strong>';
		$html.='</center>';	
		$html.='</td>';
		$html.='<td WIDTH="70">';
		$html.='<center>';
		$html.='<strong>';
		$html.='APELLIDO PATERNO';
		$html.='</strong>';
		$html.='</center>';	
		$html.='</td>';
		$html.='<td WIDTH="30">';
		$html.='<center>';
		$html.='<strong>';
		$html.='APELLIDO MATERNO';
		$html.='</strong>';
		$html.='</center>';	
		$html.='</td>';
		$html.='<td WIDTH="50">';
		$html.='<center>';
		$html.='<strong>';
		$html.='NOMBRE';
		$html.='</strong>';
		$html.='</center>';	
		$html.='</td>';
		$html.='</tr>';
		/*
      do{	
	  
			$html.='<tr>';
			$html.='<td WIDTH="5">';
   			$html.='<center>';
			$html.= $row1['alumCtrl'];
			$html.='</center>';
			$html.='</td>';
			$html.='<td WIDTH="70">';
  		    $html.= $row1['alumApp'];
			$html.='</td>';
			$html.='<td WIDTH="30">';
  		    $html.= $row1['alumApm'];
			$html.='</td>';
   		    $html.='<td WIDTH="50">';
			$html.=$row1['alumNom'];
			$html.='</td>';
			$html.='</tr>';
    	}while($row1=$queryi->fetch_array(MYSQLI_ASSOC));
	}
$html.='</table>';
	}while($row=$result->fetch_array(MYSQLI_ASSOC));
}*/

//$html.='</body></html>';


//$html.='<br><h1>DEPARTAMENTO DE CIENCIAS BÁSICASas</h1>';

// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("A4", "portrait");
 
// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));
 
// Renderizamos el documento PDF.
$pdf->render();
 
// Enviamos el fichero PDF al navegador.
$pdf->stream('CIENCIAS BASICAS.pdf');

 ?>
