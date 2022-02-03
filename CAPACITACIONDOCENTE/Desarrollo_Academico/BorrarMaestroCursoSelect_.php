<html>
		<head>
</head>
		<meta charset="UTF-8">
		<header>
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMÁN
		<hr height: 10px; >
		</center>
	</header>


<?php
$cursos=$_REQUEST['cursos'];

session_start();

if(!isset($_SESSION['usuario']))
{
  header('Location: /index.html');
  exit();
}

$usuario =$_SESSION['usuario'];

$host= "sigacitcg.com.mx";
 $user = "sigacitc";
 $pass= "Itcg11012016_2";

 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $conexion);
mysql_query("SET NAMES UTF8");



echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";

//echo "<form action='BajaMaestro.php' method='post' name= 'f1' id = 'f1' >";

echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/eliminar_maestro2.PNG' >";
echo "</td>";
echo "<td>";
echo "<center>";
echo "BAJA DE MAESTROS DE CURSO: ";
echo "<br>";
echo "<br>".$cursos;
echo "<br>";
echo "<br>";

$consulta_mysql='select Emp from matriculas where Curso="'.$cursos.'"';

//echo "".$consulta_mysql;
//$consulta_mysql='select distinct * from curso where Activo = 1';
$resultado_consulta_mysql=mysql_query($consulta_mysql);

echo "<table width='100%' border='1' cellpadding=0 CELLSPACING=0  bordercolor='#497f43' >";
while($fila=mysql_fetch_array($resultado_consulta_mysql)){

	$consulta_mysql1='select Emp,ApellidoP,ApellidoM,Nombre from maestro where Emp="'.$fila['Emp'].'" order by ApellidoP,ApellidoM';
	//echo "".$consulta_mysql1;
	$resultado_consulta_mysql1=mysql_query($consulta_mysql1);
	while($fila1=mysql_fetch_array($resultado_consulta_mysql1))
	{

  echo
  "
  <form action='BorrarMaestroCursoFinal.php' method='post' name= 'f1' id = 'f1' >

  <tr>
    <td>".$fila1['Emp']."</td>
    <td>".$fila1['ApellidoP']." ".$fila1['ApellidoM']." ".$fila1['Nombre']."</td>
	<td><center><input type='image' src='delete.png' width='25' height='25' name='Emp' value='".$fila1['Emp']."' /></center></td>
		  <td><input type='hidden' name='cursos' value='".$cursos."'></td>
		  <td><input type='hidden' name='Emp' value='".$fila1['Emp']."'></td>

  </tr>
   </form>

  ";


	}

   // echo " <option value='".$fila['Emp']."'>".$fila['Emp']."</option>";
}
echo "</table>";
echo "<br>";
echo "</center>";

?>



<?php
echo "<br>";
echo "<br>";
echo "<br>";
echo "<center>";
//echo "<input type='submit' name='Submit' onClick='return compara()' value='SELECCIONAR CURSO' style='BORDER:rgb(0,43,200) 2px solid; BACKGROUND-COLOR: #0037FF; COLOR: #FCFCFD;'>";
echo "</center>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";

?>

<br>
<br>

	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>




	</body>
</html>
