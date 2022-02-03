<?php
include('class.php');


// Create connection
$conn = mysqli_connect("localhost", "root", "", "bd_ed");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//conexion para que procese a todos los maestros.
$enlace =  mysql_connect('localhost', 'root', '');
if (!$enlace) {
    die('No pudo conectarse: ' . mysql_error());
}
if (!mysql_select_db('bd_ed', $enlace)) {
    echo 'No pudo seleccionar la base de datos';
    exit;
}


//tambien seleccionar el id del departamento al que pertenece.
$query = "select percve, id_dep, carcve from personal";
$resultt = mysql_query($query); 
while ($registro = mysql_fetch_array($resultt)){

	$clave = $registro['percve'];

	$calculadora = new calcular();
	$promedio = $calculadora->processReport(true, $clave);


	if(@$promedio[0][32] != null)
	{
require_once("../dompdf/dompdf_config.inc.php");
		echo"<br>SEP  RESULTADOS  DE LA EVALUACION DE LOS PROFESORES  SES-DGEST
	    <br>
	    Anio 2014, APLICACION DE NOVIEMBRE <br>
	    ITCG  <br>
	    NOMBRE DEL PROFESOR:&nbsp;&nbsp;&nbsp;"; 
	    echo $promedio[0][32];
	    echo $promedio[0][33];
	 	
		echo "<br>";    
		echo " NOMBRE DEL DEPARTAMENTO:&nbsp;&nbsp;&nbsp;";
		echo $promedio[0][34];

		echo "<br><br><br><br>";
	 	for ($x = 37; $x < (37 + $promedio[0][36]); $x++) 
	    {  

	    	$sql = "select matnom from materia where matcve = '". $promedio[1][$x] ."' ";
			$result = mysqli_query($conn, $sql);
		    $row = mysqli_fetch_assoc($result);
		    
	    	echo "Clave de la materia: &nbsp;&nbsp;";
	    	echo $promedio[1][$x];

	    	echo "nombreMateria: &nbsp;&nbsp;";
	    	echo $row["matnom"];

	    	echo "&nbsp;&nbsp;&nbsp;Promedio de la materia: &nbsp;&nbsp;";
	    	echo $promedio[0][$x];
	    	echo "<br>";
		}
		//echo "el numero de las materias es: "; echo $promedio[0][36];


		echo "<br>";

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

		echo "<br>";echo "<br>"; echo "los promedios generales de cada categoria son: ";echo "<br>";
		$indice = 0;
		for ($x = 10; $x <= 19; $x++) 
		{
		 	echo $letras[$indice]; echo $promedio[0][$x]; echo "&nbsp;&nbsp;&nbsp;<br>"; 
		 	$indice = $indice + 1;
		} 



		echo "<br>";echo "<br>";echo "el promedio general de el maestro es:";echo "<br>";
		echo $promedio[0][20]; 

		echo "<br>";echo "<br>";echo "el total de alumnos que evaluaron son:";echo "<br>";
		echo $promedio[0][35]; 


		$sql = "INSERT INTO promedios (percve, depcve, carcve, promedio_global)
		VALUES ('".$registro['percve']."', '".$registro['id_dep']."', '".$registro['carcve']."','".$promedio[0][20]."')";
		
		if (mysqli_query($conn, $sql)) {
		    //echo "New record created successfully";
		} else {
		    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
			
	}//cierre del if en caso de que promedio regrese null


}//cierre del while
	mysqli_close($conn);
	mysqli_close($enlace);


$dompdf = new DOMPDF();
$dompdf->load_html($html); 
$dompdf->render();
$dompdf->stream("sample.pdf");


?>