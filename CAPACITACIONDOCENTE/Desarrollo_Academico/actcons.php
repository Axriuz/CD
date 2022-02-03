<?php
$curso = $_POST["cursos"]; 

 $usuario =$_SESSION['usuario'];

$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $conexion);
mysql_query("SET NAMES UTF8");


echo "<form action='actcons.php' method='post'>";
$sql1 =  "UPDATE matriculas SET Constacia  ='En Proceso de Realización' WHERE Curso = '".$C."'";
   $result = mysql_query($sql1, $conexion);
   echo " <input type ='text'  size= '40'   style='visibility:hidden'  name='cursos' value='$c'>";
   echo "</form>";
  header('Location: docentespdf.php'). $_SESSION['usuario'];
 
 ?>