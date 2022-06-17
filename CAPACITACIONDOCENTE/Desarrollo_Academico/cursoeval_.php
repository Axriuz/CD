<?php
//header('Content-Type: text/html; charset=UTF-8');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: /index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];

require('_con.php');


?>
<html>
		
		<!--<meta charset="UTF-8">-->
		<meta charset="UTF-8">
		<header>
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMÁN
		<hr height: 10px; > 
		</center>
	</header>
	

<?php

echo "<form action='cursoevalpdf.php' method='post'>";
echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30 bordercolor='#497f43'  ;>";

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
  



$consulta_mysql='select distinct * from curso where Activo = 1';
$resultado_consulta_mysql=mysqli_query($con,$consulta_mysql);
  
echo "<select name='cursos'>";
while($fila=mysqli_fetch_array($resultado_consulta_mysql)){
  
    echo " <option value='".$fila['Nombre']."'>".$fila['Nombre']."</option>";
}
echo "</select>";

echo "<br>";
echo "<br>";
echo "<input type ='submit' value= 'Generar Lista'  style='BORDER::#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 
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