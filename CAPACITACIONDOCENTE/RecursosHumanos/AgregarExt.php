<html>
		
		
	<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	
	<body>
	<article>
<center>


<?php

session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: /index.html'); 
  exit();
}

require('con.php');

//Sacamos la cantidad de usuarios resgistrados tipo 2 (esternos) para tomar este número como Emp 
 $sqlfilas="Select nombre from PersonalRH where Tipo_Usuario='3'";
 $res=mysqli_query($con,$sqlfilas);
 $total=mysqli_num_rows($res); 


echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";

echo "<form action='AddExt.php' method='post' >";
echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/agregarMaestro2.PNG' >";
echo "</td>";
echo "<td>";
echo "<br>";
echo "Nombre: ";
echo "<input  name='nombreExt'  style=width:28%;> ";
echo"<div style='text-align:center;'>
	Sexo
	<select name='Sexo'>
		<option value=''>Seleccionar</option>
		<option value='Masculino'>Hombre</option>
		<option value='Femenino'>Mujer</option>
	</select>
	 </div>";
	
   
echo "<br>";
echo "<br>";
echo "Apellido paterno: ";
echo "<input  name='APExt'  style=width:20%;>";
echo"<div style='text-align:center;'>
	ID
    <input  name='id' value='".$total."' style=width:10%;>
  </div>";
echo "<br>";
echo "<br>";
echo "Apellido materno: ";
echo "<input  name='AMExt'  style=width:20%;>";
echo "<br>";
echo "<br>";

echo "<br>";
echo "<br>";
echo "<br>";
echo "<center>";
echo "<input type='submit' name='Submit' value='REGISTRAR PERSONAL' style='BORDER: COLOR: #FCFCFD 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 
echo "</center>";
echo "</form>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";

?>

<br>
<br>
	</CENTER>
	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
		
	</article>				
				
								
	</body>
</html>
