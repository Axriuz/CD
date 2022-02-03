<html>
		
	<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNOLÓGICO DE CD. GUZMÁN
		<hr height: 10px; > 
		</center>
	</header>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
header('Content-Type: text/html; charset=UTF-8');  

session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];

require('con.php');

?>
<html>
<head>
<title>Consulta de Cursos</title>
</head>
<body>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
  mysqli_query($con,"SET NAMES 'utf8'");

 	$consulta_mysqli="select * from  maestro where `Emp` =  $usuario";
	$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);

		while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
		
		if ($fila[10] == 1 &&  $fila[0] != $fila [8])
		{
			
		}
		else
		{	
			echo '<script language="javascript">alert("Para un mejor uso de la plataforma se recomienda actualizar sus datos y contraseña");</script>'; 
			header('Location: Menu.php'). $_SESSION['usuario'];	
		}
		}


echo "<br>";

echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";
echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/conscursos.png' >";
echo "</td>";
echo "<td>";
echo "<CENTER>";
echo "<h2>";

echo "CURSOS AUTORIZADOS";

echo "</h2>";

echo "<form method='post' action='mostrarcursos.php' >";
//$consulta_mysqli='select * from curso where activo = 1 and validado = 1 and ins_evaluado = 1 and Periodo = "Agosto - Diciembre"';
$consulta_mysqli='select distinct nombre from curso ';
$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
  
echo "<select name='curso'>";
while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
	
   // echo "<option value='".$fila['Nombre']."'>".$fila['Nombre']."</option>";
    echo utf8_decode("<option value='".$fila['nombre']."'>".$fila['nombre']."</option>");
}
echo "</select>";  


echo "<br>";
echo "<br>";
echo "<input type='submit' name='Submit'   value='Mostrar Contenido de Curso' style='BORDER: #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 

echo "</form>";
echo "</CENTER>";
echo "</td>";
echo "</tr>";
echo "</table>";

?>


<br>
<br>
	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>

</body>
</html>