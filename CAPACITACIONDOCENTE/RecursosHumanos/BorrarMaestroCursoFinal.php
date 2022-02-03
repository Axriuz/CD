
<html>
		<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
		
		<header>
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMÁN
		<hr height: 10px; >
		</center>
	</header>


<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
$Emp=$_REQUEST['Emp'];
$cursos=$_REQUEST['cursos'];

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
mysqli_query($con,("SET NAMES UTF8");
*/
require('con.php');


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
echo "¿Confirmar?";
echo "<br>";
echo "<br>";

	$consulta_mysqli1='select Emp,ApellidoP,ApellidoM,Nombre from PersonalRH where Emp="'.$Emp.'" order by ApellidoP,ApellidoM';
	//echo "".$consulta_mysqli1;
	$resultado_consulta_mysqli1=mysqli_query($con,$consulta_mysqli1);
	echo "<table width='100%' border='1' cellpadding=0 CELLSPACING=0  bordercolor='#497f43' >";

	while($fila1=mysqli_fetch_array($resultado_consulta_mysqli1))
	{

  echo
  "
  <form  method='post' name= 'f1' id = 'f1' >

  <tr>
    <td>".$fila1['Emp']."</td>
    <td>".$fila1['ApellidoP']." ".$fila1['ApellidoM']." ".$fila1['Nombre']."</td>
	<td><center><input type='image' src='conf.png' width='25' height='25' name='Emp' value='".$fila1['Emp']."' formaction='EliminarFinal.php'/></center></td>
<td><center><input type='image' src='cancel.png' width='25' height='25' name='CANCELAR' formaction='Menu.php' /></center></td>

		<td><input type='hidden' name='cursos' value='".$cursos."'></td>
		 <td><input type='hidden' name='Emp' value='".$fila1['Emp']."'></td>

  </tr>
   </form>

  ";


	}

   // echo " <option value='".$fila['Emp']."'>".$fila['Emp']."</option>";

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

	<a href="BorrarMaestroCurso.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>




	</body>
</html>
