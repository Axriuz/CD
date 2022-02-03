<html>
		 
	<header><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
		<center>Tecnologico Nacional de Mexico
		<br>
		INSTITUTO TECNOLOGICO DE CD.GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
<?php

session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];
$curso=$_POST['curso'];

$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $conexion);
mysql_query("SET NAMES 'utf8'");
?>
<html>
<head>
<title>Consulta Actuales</title>
</head>
<body>

<?php
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


$consulta_mysql="select maestro.Emp from maestro inner join matriculas on maestro.Emp=matriculas.Emp inner join curso on matriculas.Curso=curso.nombre where (matriculas.Curso='$curso')";
$resultado_consulta_mysql=mysql_query($consulta_mysql);
echo "<select name='Emp'>";
while($fila=mysql_fetch_array($resultado_consulta_mysql)){
	
    echo "<option value='".$fila['Emp']."'>".$fila['Emp']."</option>";
         
        ///
        
        ///
    
}
echo "</select>";  


$consulta_mysql="select distinct OPCION from OPCIONESCONSTANCIAS";
$resultado_consulta_mysql=mysql_query($consulta_mysql);
echo "<select name='OPCIONESCONSTANCIA'>";

 //echo "<option value='".$fila['OPCION']."'>".$fila['OPCION']."</option>";

while($fila=mysql_fetch_array($resultado_consulta_mysql)){
	
    echo "<option value='".$fila['OPCION']."'>".$fila['OPCION']."</option>";
         
        ///
        
        ///
    
}
echo "</select>";  
///

//$consulta_mysql='Select Nombre from curso';

//$resultado_consulta_mysql=mysql_query($consulta_mysql);
echo "<select name='cursoA'>";

//while($fila=mysql_fetch_array($resultado_consulta_mysql)){
	
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
	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>

</body>
</html>