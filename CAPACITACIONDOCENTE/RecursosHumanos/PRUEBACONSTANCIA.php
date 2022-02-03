<html>
		 <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<header>
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNOLÓGICO DE CD. GUZMÁN
		<hr height: 10px; > 
		</center>
	</header>
<?php

session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: /index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];
 $curso = $_POST['curso']; 
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $conexion);
mysql_query("SET NAMES UTF8");


?>
<html>
<head>
<title>Actualizaci�n de Asistencia</title>
<script type="text/javascript"> 
function contarSeleccionados()
{
  var cant=0;
  if (document.getElementById('LU').checked)
  {
    cant++;
  }
  if (document.getElementById('MA').checked)
  {
    cant++;
  }
  if (document.getElementById('MI').checked)
  {
    cant++;
  }
  if (document.getElementById('JU').checked)
  {
    cant++;
  }
  alert('Conoce ' + cant + ' lenguajes');
}
</script>
</head>
<body>

<?php

echo "<br>";

echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#D149F6' ;>";
echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/conscursos.png' >";
echo "</td>";
echo "<td>";
echo "<CENTER>";
echo "<h2>";
echo "Docentes matriculados en el curso '$curso'";
echo "</h2>";

echo "<form method='post' action='regasistencia.php' >";

echo " <input type ='text'  size= '40'   style='visibility:hidden'  name='c1' value='$curso'>";
$sql       = "select m.nombre from maestro m inner join matriculas a on m.emp = a.emp where a.curso = '$curso'";
$resultado = mysql_query($sql, $conexion);
 	
	

while ($row = mysql_fetch_row($resultado)){ 
echo "<br>";
echo"$row[0]";
echo " <input type ='text'  size= '40'   style='visibility:hidden'  name='d1' value='$row[0]'>";
echo" &nbsp;";
	  //echo" &nbsp;";
	  //echo" &nbsp;";
	  //echo" &nbsp;";
	  
echo"Lunes<input type='checkbox' name='LU'  value='1' style='BORDER: rgb(210,122,234) 2px solid; BACKGROUND-COLOR: #D149F6; COLOR: #FCFCFD;'>";
echo" &nbsp;";
echo"Martes<input type='checkbox' name='MA'  value='1' style='BORDER: rgb(210,122,234) 2px solid; BACKGROUND-COLOR: #D149F6; COLOR: #FCFCFD;'>";
echo" &nbsp;";
echo"Miercoles<input type='checkbox' name='MI'  value='1' style='BORDER: rgb(210,122,234) 2px solid; BACKGROUND-COLOR: #D149F6; COLOR: #FCFCFD;'>";
echo" &nbsp;";
echo"Jueves<input type='checkbox' name='JU'  value='1' style='BORDER: rgb(210,122,234) 2px solid; BACKGROUND-COLOR: #D149F6; COLOR: #FCFCFD;'>";
echo" &nbsp;";
echo"Viernes<input type='checkbox' name='VI'  value='1' style='BORDER: rgb(210,122,234) 2px solid; BACKGROUND-COLOR: #D149F6; COLOR: #FCFCFD;'>";




   
    
    



 

	   
	   } 



echo "<br>";
echo "<br>";
echo "<input type='submit' name='Submit'   value='Actualizar' style='BORDER: rgb(210,122,234) 2px solid; BACKGROUND-COLOR: #D149F6; COLOR: #FCFCFD;'>"; 

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