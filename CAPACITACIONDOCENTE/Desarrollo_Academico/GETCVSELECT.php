<html>
		
		
		<!-- 	-->
		<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	

<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
//header('Content-Type: text/html; charset=UTF-8');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];
$c=$_POST['c'];
/*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 
 $conexion=mysqli_connect($host,$user,$pass);


$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query($con,("SET NAMES UTF8");
*/
require('con.php');
echo "<form action='get.php' method='post'>";
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
echo "SELECCIONE EL ARCHIVO PARA DESCARGAR DEL CURSO ";
echo "</h2>";
echo "".$c;
echo "<br>";
echo ' <input type="hidden" name="curso" value="'.$c.'">';
echo "<br>";
$a = array();

$consulta_mysqli='select * from tbl_documentos where titulo="'.$c.'" and contenido!=""';
$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
   $a[0]= "INFORMACIÓN COMPLETA";
}
$consulta_mysqli='select * from tbl_documentos2 where titulo="'.$c.'" and contenido!=""';
$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
$a[1] = "CURRICULUM INSTRUCTOR";
}
$consulta_mysqli='select * from tbl_documentos3 where titulo="'.$c.'" and contenido!=""';
$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
  $a[2] = "CURRICULUM SEGUNDO INSTRUCTOR";
}
if(empty($a)) {
echo "ESTÁ VACIÓ, NO SE TIENEN REGISTROS";
}
else{
echo "<select name='opcion'>";
$op=0;
?> 
<?php foreach($a as $f):
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
?>                
    <option value="<?php echo $op ?>"><?php echo $f ?></option>
    
<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
$op=$op+1;
endforeach; ?>
<?php 
echo "</select>";
echo "<br>";

echo "<br>";

echo "<input type ='submit' value= 'Descargar'  style='BORDER: #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;' />";
}

echo "</form>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";

?>

<br>
<br>
	<a href="GETCV.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
	</body>
</html>