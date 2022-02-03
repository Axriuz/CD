<html>
		<meta charset="UTF-8">
	<header>
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	<body>
<?php
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: /index.html'); 
  exit();
}
?>

<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#D149F6' ;>

<tr>
<td>
<center>
<h2>  QUEJAS , SUGERENCIAS  Y FELICITACIONES </h2>

<form action="EnviarQueja.php" method="post"> 
<br>
Queja<input type="radio" name="tipo"  value="queja" > 

Sugerencia<input type="radio" name="tipo"  value="sugerencia">  
 
Felicitaciones<input type="radio" name="tipo" value="felicitaciones"> 
<br>
<br>
Asunto:<input type="text" name="asunto" > 
 
  <br>
<br>
Descripcion del Asunto:
<br> 
 <textarea cols="50" rows="5" name="opinion"></textarea> 
<br> 
<br> 
Que opina de este sistema web
<br> 
<br> 
 <input type="radio" name="tipo2" value="gusto">Me ha gustado 
<br> 
<input type="radio" name="tipo2"  value="mal">No esta mal
<br> 
<input type="radio" name="tipo2" value="no ha gustado">No me ha gustado nada
<br> 
<br>
<br>

<input type="Reset" value="BORRAR INFORMACION "   style= 'BORDER: rgb(210,122,234) 2px solid; BACKGROUND-COLOR: #D149F6; COLOR: #FCFCFD;'> 
<br> 
<br>


<input type="submit" value="ENVIAR FORMULARIO"  style= 'BORDER: rgb(210,122,234) 2px solid; BACKGROUND-COLOR: #D149F6; COLOR: #FCFCFD;'> 


</form> 

</center>
</td>
</tr>
</table>
<br>

<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
	</body>
</html>


