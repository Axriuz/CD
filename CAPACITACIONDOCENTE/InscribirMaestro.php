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
<center>


<?php

session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: /index.html'); 
  exit();
}

echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#D149F6' ;>";

echo "<form action='RegistroMaestro.php' method='post' >";
echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/agregarMaestro2.PNG' >";
echo "</td>";
echo "<td>";

echo "<br>";

echo "Ingrese los 4 digitos corresondientes al número de SIE del maestro a registrar:";
echo "<input type=password name='nombre1' >";
echo "<br>";
echo "<br>";
echo "Confirmar número de SIE del maestro a registrar:";
echo "<input type=password name='nombre' >";
echo "<br>";

echo "<center>";
?>

<SCRIPT LANGUAGE=JavaScript>
 
 function compara() 
{ 


if (document.f1.nombre1.value != document.f1.nombre.value) {
alert('El numero de SIE no es identico, por favor reintente.');
return false; } 

else
{return true;}
   
}
</SCRIPT>

<?php
echo "<br>";
echo "<br>";
echo "<br>";
echo "<input type='submit' name='Submit' onClick='return compara()'  value='REGISTRAR MAESTRO' style='BORDER: rgb(210,122,234) 2px solid; BACKGROUND-COLOR: #D149F6; COLOR: #FCFCFD;'>"; 
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
