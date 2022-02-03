<html>
		<meta charset="UTF-8">
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
  header('Location: ../index.html'); 
  exit();
}
echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";

echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/Admin.png' >";
echo "</td>";
echo "<td>";

echo "



";


echo '
<form method="post" action="Modificardatos.php">

 <center> <h1 class = "titulo">Ingrese clave del  docente </h1></center>
  <center> 
<input type="text" name="Emp" required placeholder="CLAVE"><br>
 </center> 
 <br>
<br>
<center>
 ';
 
 echo "<input type='submit' name='Submit' value='ACTUALIZAR CONTRASEÑA' style='BORDER: #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 
 
 echo '
 


</form>
 </form>
   <br><br><br> 
   </center>
   ';

echo "</center>";
echo "</form>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";

?>

<br>
<br>
	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
	</body>
</html>
