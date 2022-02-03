<html>
		
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<header>
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	
	<body>
		<article>


<?php
header('Content-Type: text/html; charset=UTF-8');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: /index.html'); 
  exit();
}



$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $conexion);
mysql_query("SET NAMES UTF8");


$usuario =$_SESSION['usuario'];
 $curso = $_POST["curso"]; 
 

echo "<CENTER>";  
echo "<h2>CEDULA DE INSCRIPCION  AL CURSO '". $curso ."'</h2>"; 
echo "</CENTER>";

echo "<form method='post' action='registroMatricula.php'>";


echo "<BR>";



echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#D149F6' ;>";


echo "<tr>";

echo "<td>";


echo "NOMBRE    :"; 
echo "<BR>"; 
echo "<input type ='text'  name='curso' value='". $curso ."'/>";
echo "<BR>";

?>	





			
<BR>
UNIDAD RESPONSABLE:
<BR>
<input type="text" name="unidadres" size="30" >
<BR>			
<BR>
AREA:
<BR>
<input type="text" name="area" size="30" >	
<BR>
<BR>
PLAZA ACTUAL:
<BR>
<input type="text" name="plaza" size="30" >	
<BR>
<BR>
NOMBRE DEL/DE LA JEFE(A) INMEDIATO:
<BR>
<input type="text" name="jefe" size="15" >	
<BR>
<BR>
DOMICILIO OFICIAL:
<BR>
<input type="text" name="domofi" size="15" >	
<BR>
<BR>
TELEFONO OFICIAL:
<BR>
<input type="text" name="tel" size="20" >
<br>

<BR>

EXT:
<BR>
<input type="text"   name="ext" size="15" >	
<BR>
<BR>
HORARIO DE TRABAJO:
<BR>
<input type="text" name="horario" size="15" >	
<BR>
<BR>
FECHA:
<BR>
<input type="text" name="fecha" size="15" >	
<BR>
<BR>

<input type="Submit" name="enviar" value="REGISTRAR" style='BORDER: rgb(210,122,234) 2px solid; BACKGROUND-COLOR: #D149F6; COLOR: #FCFCFD;'>
   </form> 
   
   </td>
</tr>
</table>
<br> 
<br> 
	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
			</article>				
				
				
	</body>
</html>
