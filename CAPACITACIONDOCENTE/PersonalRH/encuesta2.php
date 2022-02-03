<html>
		
	<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	<body>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$idusuario = $_POST['ID'];
$curso = $_POST['curso'];

//echo 'HOLA '.$idusuario ;
echo "
<table width='100%' border='5' cellpadding=50 CELLSPACING=50  bordercolor='#497f43' ;>

<tr>
<td>
<center>
<h2>  FORMATO PARA PARTICIPANTES INSCRITOS </h2>

<form action='ENCUESTAFINAL.php' method='post'> 
<br>
<h2>  INSTRUCTOR </h2>

<strong>Expuso el objetivo y metario del curso.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
    <td>
  
Totalmente de acuerdo<input type='radio' name='tipo1'  value='Totalmente de acuerdo' required></td>
<td>
Parcialmente de acuerdo<input type='radio' name='tipo1'  value='Parcialmente de acuerdo'> </td>
 <td>
Parcialmente en desacuerdo<input type='radio' name='tipo1' value='Parcialmente en desacuerdo'> </td>
<td>
En desacuerdo<input type='radio' name='tipo1' value='En desacuerdo'> </td>
</tr>
</table>
<br>
<br>
<br>
<strong>Mostró dominio del contenido abordado.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo2'  value='Totalmente de acuerdo' required ></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo2'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo2' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo2' value='En desacuerdo'></td>
</tr>
</table>
<br><br>
<br>
<strong>Fomentó la participación del grupo.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo3'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo3'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo3' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo3' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br><br>
<strong>Aclaró las dudas que se presentaron.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo4'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo4'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo4' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo4' value='En desacuerdo'></td>
</tr>
</table>
<br><br>
<br>
<strong>Dio retroalimentación a los ejercicios realizados.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo5'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo5'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo5' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo5' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br><br>
<strong>Aplicó una evaluación final relacionada con los contenidos del curso.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo6'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo6'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo6' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo6' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br><br>
<strong>Inició y concluyó puntualmente las sesiones.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo7'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo7'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo7' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo7' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br>
<br>
<br>

<h2>  MATERIAL DIDÁCTICO </h2>

<strong>El material didáctico fue útil a lo largo del curso.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo8'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo8'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo8' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo8' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br>
<br>
<strong>La impresión del material didáctico fue legible.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo9'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo9'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo9' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo9' value='En desacuerdo'></td>
</tr>
</table>

<br>
<br>
<br>
<strong>La variedad del material didáctico fue suficiente para apoyar su aprendizaje.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo10'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo10'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo10' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo10' value='En desacuerdo'></td>
</tr>
</table>



<br>
<br>
<br>
<br>
<h2>  CURSO </h2>

<strong>La distribución del tiempo fue adecuada para cubrir el contenido.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo11'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo11'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo11' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo11' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br>
<br>
<strong>Los temas fueron suficientes para alcanzar el objetivo del curso.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo12'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo12'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo12' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo12' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br>
<br>
<strong>El curso compredió ejercicios de práctica relacionados con el contenido.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo13'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo13'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo13' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo13' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br>
<br>
<strong>El curso cubrió sus expectativas.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo14'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo14'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo14' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo14' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br>
<br>
<br>

<h2>  INFRAESTRUCTURA </h2>

<strong>La iluminación del aula fue adecuada.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo15'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo15'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo15' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo15' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br>
<br>
<strong>La ventilación del aula fue adecuada.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo16'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo16'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo16' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo16' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br>
<br>
<strong>El aseo del aula fue adecuado.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo17'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo17'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo17' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo17' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br>
<br>
<strong>El servicio de los sanitarios fue adecuado (limpieza, abasto de papel, toallas, jabon, etc.)</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo18'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo18'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo18' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo18' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br>
<br>
<strong>El servicio de café fue adecuado.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo19'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo19'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo19' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo19' value='En desacuerdo'></td>
</tr>
</table>
<br>
<br>
<br>
<strong>Recibió apoyo del personal que coordinó el curso.</strong>
<br>
<br>
<table width='100%' border='0'>
<tr>
 <td>Totalmente de acuerdo<input type='radio' name='tipo20'  value='Totalmente de acuerdo' required></td>

 <td>Parcialmente de acuerdo<input type='radio' name='tipo20'  value='Parcialmente de acuerdo'></td>
 
 <td>Parcialmente en desacuerdo<input type='radio' name='tipo20' value='Parcialmente en desacuerdo'></td>

 <td>En desacuerdo<input type='radio' name='tipo20' value='En desacuerdo'></td>
  <input type='hidden' name='ID' value='$idusuario'>
  
  <input type='hidden' name='curso' value='$curso'>
</tr>
</table>
<br>
<br>
<br>

COMENTARIO
<BR>
<BR>
<TEXTAREA COLS=50 ROWS=10 NAME='Texto'> 
</TEXTAREA> 
<BR>
<BR>
<BR>
<br>
Gracias por su participación
<br>
<br>
<input type='submit' value='REGISTRAR ENCUESTA'  style= 'BORDER:  #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'> 


</form> 

</center>
</td>
</tr>
</table>
<br>";

?>

<a href='Menu.php'><IMG SRC='../Img/menu.png' WIDTH=150 HEIGHT=45>	 </a>
	</body>
</html>


