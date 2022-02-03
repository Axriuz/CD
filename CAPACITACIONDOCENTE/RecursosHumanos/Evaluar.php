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
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];

require('con.php');
?>
<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43';>

<tr>
<td>
<center>
<h2> FORMATO DE CRITERIOS PARA SELECCIONAR INSTRUCTORES INTERNOS Y EXTERNOS </h2>

<form action="Evaluar1.php" method="post"> 
<br>
<br>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$fecha = date("Y");
$consulta_mysqli="select distinct * from 
PersonalRH m inner join cursoRH c on  m.Emp = c.Instructor 
where c.activo = 1 and c.ins_evaluado = 0 and m.nombre!=''
and c.validado = '1'
union
select distinct * from 
PersonalRH m inner join cursoRH c on  m.Emp = c.InsAux where 
c.activo = 1 and c.ins_evaluado = 0 and m.nombre!='' and c.validado = '1'";

$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
echo "<h2>Seleccione el/la Instructor(a) que desea evaluar:</h2>";
echo "<select name='Ins'>";
while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
	 echo " <option value='".utf8_decode(utf8_encode($fila[0]))."'>".utf8_decode(utf8_encode($fila[1].' '.$fila[17].' '.$fila[18]))."</option>";
}
echo "</select>";
echo "<br>";
$Fecha=date("d/m/Y"); 

echo " <input type ='text'  size= '40' readonly style='visibility:hidden;' name='Fecha' value='$Fecha'>";  
?>

<br>
<h3> Empresa o Institución </h3>
<input type=text  name='EmpIns' size ='30' required>
<br>
<br>
1.	FORMACIÓN PROFESIONAL RELACIONADA A LA CAPACITACIÓN A IMPARTIR
<br>
Malo<input type="radio" name="fp"  value="1" required> 

Regular<input type="radio" name="fp"  value="2"required>  
 
Bien<input type="radio" name="fp" value="3"required> 

Muy bien<input type="radio" name="fp"  value="4"required>  
 
Excelente<input type="radio" name="fp" value="5"required> 
<br>
<br>
<br>


2.	EXPERIENCIA EN CAPACITACIÓN Y EN LA TEMÁTICA A IMPARTIR
<br>
Malo<input type="radio" name="ec"  value="1" required> 

Regular<input type="radio" name="ec"  value="2" required>  
 
Bien<input type="radio" name="ec" value="3" required> 

Muy bien<input type="radio" name="ec"  value="4" required>  
 
Excelente<input type="radio" name="ec" value="5" required> 
<br>
<br>
<br>


3.	MATERIALES DIDÁCTICOS A UTILIZAR
<br>
Malo<input type="radio" name="md"  value="1" required> 

Regular<input type="radio" name="md"  value="2" required>  
 
Bien<input type="radio" name="md" value="3" required> 

Muy bien<input type="radio" name="md"  value="4" required>  
 
Excelente<input type="radio" name="md" value="5" required> 
<br>
<br>
<br>



4.	COSTOS POR HORA DE CAPACITACIÓN 
<br>
Malo<input type="radio" name="ch"  value="1" required> 

Regular<input type="radio" name="ch"  value="2" required>  
 
Bien<input type="radio" name="ch" value="3" required> 

Muy bien<input type="radio" name="ch"  value="4" required>  
 
Excelente<input type="radio" name="ch" value="5" required> 
<br>
<br>
<br>


5.	EMPRESAS DIFERENTES EN LAS QUE HA PARTICIPADO COMO INSTRUCTOR(A)
<br>
Malo<input type="radio" name="ed"  value="1" required> 

Regular<input type="radio" name="ed"  value="2" required>  
 
Bien<input type="radio" name="ed" value="3" required> 

Muy bien<input type="radio" name="ed"  value="4" required>  
 
Excelente<input type="radio" name="ed" value="5" required> 
<br>
<br>
<br>


6.	CERTIFICACIONES Y ACREDITACIONES RELACIONADAS AL ÀREA DE CAPACITACIÓN
<br>
Malo<input type="radio" name="ca"  value="1" required> 

Regular<input type="radio" name="ca"  value="2" required>  
 
Bien<input type="radio" name="ca" value="3" required> 

Muy bien<input type="radio" name="ca"  value="4" required>  
 
Excelente<input type="radio" name="ca" value="5" required> 
<br>
<br>
<br>

<input type="submit" value="GUARDAR"  style='BORDER::#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>

</form> 

</center>
</td>
</tr>
</table>
<br>

<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
	</body>
</html>