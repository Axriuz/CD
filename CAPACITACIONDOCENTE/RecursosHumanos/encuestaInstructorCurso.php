<html>
		
		
		<header><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
//header('Content-Type: text/html; charset=UTF-8');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];


require('con.php');

echo "<form action='PDF_Instructores_2.php' method='post'>";
echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30   bordercolor='#497f43'  ;>";




echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/icono_empleado.png' >";
echo "</td>";
echo "<td>";

echo "<center>";
echo "<h2>";
echo "REPORTE DE EVALUACIÓN DE INSTRUCTORES POR CURSOS ACTIVOS";
echo "</h2>";
echo "<br>";
$year=date("Y");  

$consulta_mysqli="select distinct * from 
PersonalRH m inner join cursoRH c on  m.Emp = c.Instructor 
where c.activo = 1 and c.ins_evaluado = 1 and m.nombre!=''
union
select distinct * from 
PersonalRH m inner join cursoRH c on  m.Emp = c.InsAux where 
c.activo = 1 and c.ins_evaluado = 1 and m.nombre!='' and c.validado = '1'";
$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
echo "<select name='a'>";
while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
	 echo " <option value='".utf8_decode(utf8_encode($fila[1].' '.$fila[17].' '.$fila[18]))."'>".utf8_decode(utf8_encode($fila[1].' '.$fila[17].' '.$fila[18]))."</option>";
}
echo "</select>";
echo "<br>";
$Fecha=date("Y"); 

echo " <input type ='text'  size= '40' readonly style='visibility:hidden;' name='Fecha' value='$Fecha'>";  

echo "<br>";
echo "<br>";
echo "<input type ='submit' value= 'Generar Encuesta'  style='BORDER::#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 
echo "</form>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";

?>

<br>
<br>
	<a href="instructorSelect.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
	</body>
</html>