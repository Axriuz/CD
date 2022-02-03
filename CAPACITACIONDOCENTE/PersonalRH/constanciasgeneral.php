<html>
		
		
	<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	
	<body>
		<article>

<BR>
	<BR>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];

/*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query($con,"SET NAMES UTF8");
*/

require('con.php');
?>
<html>
<head>
</head>
<body>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli

echo "<br>";

echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";
echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/constancia.png' >";
echo "</td>";
echo "<td>";
echo "<CENTER>";
echo "<h2>";

echo "CONSULTA DE ESTATUS DE CONSTANCIAS";

echo "</h2>";
echo "<form method='post' action='pdfconstancia.php' >";

echo "<center>";
echo ' <input type="hidden" name="usuari" id="usuari" value="'.$usuario .'" readonly>';
echo "</center>";

//$consulta_mysqli="SELECT matriculas.curso,matriculas.constacia FROM matriculas inner join maestro on matriculas.Emp=maestro.Emp WHERE matriculas.Emp = '$usuario'";


$consulta_mysqli="SELECT matriculas.curso,Year(curso.CursoInicio),curso.periodo,matriculas.constacia FROM matriculas inner join
maestro on matriculas.Emp=maestro.Emp inner join curso on curso.Nombre=matriculas.Curso WHERE
matriculas.Emp = '$usuario' order by Year(curso.CursoInicio),matriculas.curso";

//echo "".$consulta_mysqli;
$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
  
echo "<table border='1' bordercolor='#497f43'>   <tr>
    		<th>Curso</th>
				<th>Año</th> 
					<th>Periodo</th> 
    		<th>Estado constancia</th> 
 
      </tr>
	  ";
while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
echo "
	  <tr>
    <td>".mb_strtoupper($fila[0], 'UTF-8')."</td>
	    <td>".mb_strtoupper($fila[1], 'UTF-8')."</td>
    <td>".mb_strtoupper($fila[2], 'UTF-8')."</td>
	 <td>".mb_strtoupper($fila[3], 'UTF-8')."</td>
  </tr>";
}

echo "</table>";

echo "<br>";
echo "<br>";
echo "<input type='submit' name='Submit'   value='Imprimir' style='BORDER: #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 
echo "</form>";
echo "</CENTER>";
echo "</td>";
echo "</tr>";
echo "</table>";

?>
<br>
<br>
	<a href="constancia1.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>



</body>
</html>