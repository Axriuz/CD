<html>
		 
		 
		<header><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNOLÓGICO DE CD.GUZMÁN
		<hr height: 10px; > 
		</center>
		</header>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];
$curso=$_POST['curso'];

require('con.php');

?>
<html>
<head>
<title>Consulta Actuales</title>
</head>
<body>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
echo "<br>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43'  ;>";
echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/conscursos.png' >";
echo "</td>";
echo "<td>";
echo "<CENTER>";
echo "<h2>";

echo "DATOS";

echo "</h2>";

echo "<form method='post' action='DOS.php' >";


$consulta_mysqli="select PersonalRH.Emp from PersonalRH inner join matriculasRH on PersonalRH.Emp=matriculasRH.Emp inner join cursoRH on matriculasRH.Curso=cursoRH.nombre where (matriculasRH.Curso='$curso')";
$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
echo "<select name='Emp'>";
while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
	
    echo "<option value='".$fila['Emp']."'>".$fila['Emp']."</option>";
         
        ///
        
        ///
    
}
echo "</select>";  


$consulta_mysqli="select distinct OPCION from OPCIONESCONSTANCIAS";
$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
echo "<select name='OPCIONESCONSTANCIA'>";

 //echo "<option value='".$fila['OPCION']."'>".$fila['OPCION']."</option>";

while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
	
    echo "<option value='".$fila['OPCION']."'>".$fila['OPCION']."</option>";
         
        ///
        
        ///
    
}
echo "</select>";  
///

//$consulta_mysqli='Select Nombre from curso';

//$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
echo "<select name='cursoA'>";

//while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
	
    echo "<option value='".$curso."'>".$curso."</option>";
         
        ///
        
        ///
    
//}
echo "</select>";  
       








echo "<br>";
echo "<br>";
echo "<input type='submit' name='Submit'   value='Actualizar' style='BORDER::#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 

echo "</form>";
echo "</CENTER>";
echo "</td>";
echo "</tr>";
echo "</table>";

?>


<br>
<br>
	<a href="actcontancias.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>

</body>
</html>