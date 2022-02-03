<html>
		
		
		<header><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	

<?php
//error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli

header('Content-Type: text/html; charset=UTF-8');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];

require('con.php');

echo'
<form id="CreateForm" action="listaasistenciamodifi.php" method="post style="margin-bottom: 100px;">
</form>

<button type="submit" form="CreateForm" style="BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;">Editar encabezado</button>
';

echo "<form action='pruebaunica.php' method='get'>";
//echo "<form action='popo.php' method='get'>";

//echo "<form action='unoPDF.php' method='get'>";

//echo "<form action='docentespdf2asistencia.php' method='get'>";
echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";




echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/icono_empleado.png' >";
echo "</td>";
echo "<td>";


echo "<center>";
echo "<h2>";
echo "SELECCIONE EL CURSO DEL QUE SE GENERARA LA LISTA";
echo "</h2>";

echo "<br>";
 



/*$consulta_mysqli='select Nombre from curso where Activo = 1 and validado=1';
$resultado_consulta_mysqli=mysqli_query($consulta_mysqli);
$fila=mysqli_fetch_array($resultado_consulta_mysqli);
*/
$consulta_mysqli='select Nombre from curso where Activo = 1 and validado=1';
$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
  
echo "<select name='cursos'>";
while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
  
    echo " <option value='".$fila['Nombre']."'>".$fila['Nombre']."</option>";
}
echo "</select>";

echo "</select>";
echo '<br>MEMBRETE DEL ENCARGADO<input type="text" name="MEM" required>';
echo 'NOMBRE<input type="text" name="nombre" required>';
echo "<br>";
echo "<br>";
echo '<input type ="submit" value= "Generar Lista"  style="BORDER: #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;" />';
echo "</form>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";

?>

<br>
<br>
	<a href="listas.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
	</body>
</html>