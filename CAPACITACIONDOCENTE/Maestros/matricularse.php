<html>
		
		
	
	<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnologico Nacional de Mexico
		<br>
		INSTITUTO TECNOLOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	
	<body>
		<article>


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
 $cursos = $_POST['c1']; 

/*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query($con,"SET NAMES UTF8");
*/

require('con.php');
 
 $consulta_mysqli="select curso from  matriculas where `Emp` =  $usuario";
	$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);

		while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
		
		if ($fila[0] <> $cursos)
		{	

	
	}
		else 
		{  

  header('Location: Menu.php'). $_SESSION['usuario'];
	
	
	}
		
		}
 
 
 
 

echo "<CENTER>";  
echo "<h2>CEDULA DE INSCRIPCION</h2>"; 
echo "</CENTER>";

echo "<form method='post' action='registroMatricula.php'>";
echo "<BR>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";
echo "<tr>";
echo "<td>";

$fecha_actual = localtime(time(), 1);
$anyo_actual  = $fecha_actual["tm_year"] + 1900;
$mes_actual   = $fecha_actual["tm_mon"] + 1;
$dia_actual   = $fecha_actual["tm_mday"]-1;
print "<p>FECHA: $dia_actual/$mes_actual/$anyo_actual</p>";

echo " <input type ='text'  size= '40'   style='visibility:hidden'  name='fecha' value='$dia_actual/$mes_actual/$anyo_actual'>";
echo " <input type ='text'  size= '40'   style='visibility:hidden'  name='c1' value='$cursos'>";
?>	
<BR>
<BR>
<CENTER>
UNIDAD RESPONSABLE:
<input type="text" name="unidadres" size="30" required >
&nbsp;
&nbsp;
&nbsp;

AREA:
<input type="text" name="area" size="30" required>	
&nbsp;
&nbsp;
&nbsp;
PLAZA ACTUAL:
<select name="plaza">
<option value="E3817">E3817 Profesor de carrera Titular "C"</option>
<option value="E3815">E3815 Profesor de carrera Titular "B"</option>
<option value="E3813">E3813 Profesor de carrera Titular "A"</option>
<option value="E3811">E3811 Profesor de carrera Asociado "C"</option>
<option value="E3809">E3809 Profesor de carrera Asociado "B"</option>
<option value="E3807">E3807 Profesor de carrera Asociado "A"</option>
<option value="E3717">E3717 Profesor de carrera Titular "C"</option>
<option value="E3715">E3715 Profesor de carrera Titular "B"</option>
<option value="E3713">E3713 Profesor de carrera Titular "A"</option>
<option value="E3711">E3711 Profesor de carrera Asociado "C"</option>
<option value="E3709">E3709 Profesor de carrera Asociado "B"</option>
<option value="E3707">E3707 Profesor de carrera Asociado "A"</option>
<option value="E3617">E3617 Profesor de carrera Titular "C"</option>
<option value="E3615">E3615 Profesor de carrera Titular "B"</option>
<option value="E3613">E3613 Profesor de carrera Titular "A"</option>
<option value="E3611">E3611 Profesor de carrera Asociado "C"</option>
<option value="E3609">E3609 Profesor de carrera Asociado "B"</option>
<option value="E3607">E3607 Profesor de carrera Asociado "A"</option>
<option value="E3841">E3841 Tecnico docente  Asociado "C"</option>
<option value="E3839">E3839 Tecnico docente  Asociado "B"</option>
<option value="E3837">E3837 Tecnico docente  Asociado "A"</option>
<option value="E3641">E3641 Tecnico docente  Asociado "C"</option>
<option value="E3639">E3639 Tecnico docente  Asociado "B"</option>
<option value="E3637">E3637 Tecnico docente  Asociado "A"</option>
<option value="E3525">E3525 Profesor de Asignatura "C"</option>
<option value="E3521">E3521 Profesor de Asignatura "B"</option>
<option value="E3519">E3519 Profesor de Asignatura "A"</option>
<option value="E3509">E3509 Tecnico docente  Asignatura "C"</option>
<option value="E3507">E3507 Tecnico docente  Asignatura "B"</option>
<option value="E3505">E3505 Tecnico docente  Asignatura "A"</option>
</select>

<BR>
<BR>
HORARIO DE TRABAJO:
<input type="text" name="horario" size="15" required>	
&nbsp;
&nbsp;
&nbsp;
NOMBRE DEL/DE LA JEFE(A) INMEDIATO:
<input type="text" name="jefe" size="15" required>	
<BR>
<BR>

DOMICILIO OFICIAL:
<input type="text" name="domofi" size="15" required>	
&nbsp;
&nbsp;
&nbsp;
TELEFONO OFICIAL:
<input type="text" name="tel" size="20" required>
&nbsp;
&nbsp;
&nbsp;
EXT:
<input type="text"   name="ext" size="15" required>	
<BR>
<BR>



<input type="Submit" name="enviar" value="REGISTRARSE" style='BORDER:#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'  onclick='alert("TE MATRICULASTE SATISFACTORIAMENTE.")'>
</CENTER>
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
