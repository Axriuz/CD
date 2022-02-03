<html>
		<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
</head>
			
		<header>
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMÁN
		<hr height: 10px; > 
		</center>
	</header>
	

<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
$Emp=$_REQUEST['Emp'];
$cursos=$_REQUEST['cursos'];

session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
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
echo "BAJA DE MAESTRO DE CURSO EXITOSA ";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
	
	$consulta_mysql1='DELETE FROM `matriculas` WHERE Emp="'.$Emp.'" and Curso ="'.$cursos.'"';
	
	
	
	//echo "".$consulta_mysql1;
	
	$resultado_consulta_mysql1=mysql_query($consulta_mysql1);
	echo "<table width='100%' border='1' cellpadding=0 CELLSPACING=0  bordercolor='#497f43' >";

	/*while($fila1=mysql_fetch_array($resultado_consulta_mysql1))
	{
		
	}*/
  
   //echo " <option value='".$fila['Emp']."'>".$fila['Emp']."</option>";

echo "</table>";
echo "<br>";
echo "</center>";

?>



<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
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
