<html>
		<meta charset="UTF-8">
		
	<header>
	
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
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


$host='mysql.webcindario.com';
 $user='cursosdesacad';
 $pass='jmrs1905';
 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('cursosdesacad', $conexion);


?>
	<body>
		<br>
		<br>
<span style="COLOR: #000000; align="center">		
		
		<a href="CambioNip.php"><IMG SRC="../Img/ModNip.png" WIDTH=230 HEIGHT=40></a>	
		<br>
		<br>	
		<a href="InscribirMaestro.php"><IMG SRC="../Img/RegMae.png" WIDTH=230 HEIGHT=40></a>
		<br>
		<br>
		<a href="BorrarMaestro.php"><IMG SRC="../Img/EliMae.png" WIDTH=230 HEIGHT=40></a>
		<br>
		<br>
		<a href="CambioJefe.php"><IMG SRC="../Img/JefeDpto.png" WIDTH=230 HEIGHT=40></a>
		<br>
		<br>
		<a href="CambioJefe.php"><IMG SRC="../Img/actconstancias.png" WIDTH=230 HEIGHT=40></a>
		<br>
		<br>
		<a href="CambioJefe.php"><IMG SRC="../Img/glistas.png" WIDTH=230 HEIGHT=40></a>
		<br>
		<br>
		<a href="CambioJefe.php"><IMG SRC="../Img/greportes.png" WIDTH=230 HEIGHT=40></a>
		<br>
		<br>
		<a href="CambioJefe.php"><IMG SRC="../Img/tutoriales.png" WIDTH=230 HEIGHT=40></a>
		<br>
		<br>
		<a href="prueba.php"><IMG SRC="../Img/not.png" WIDTH=230 HEIGHT=45></a>	
		<br>
		<br>
		<a href="prueba.php"><IMG SRC="../Img/Quejas.png" WIDTH=230 HEIGHT=45></a>	
		<br>
		<br>
		<a href="../Logout.php"><IMG SRC="../Img/CerrarSesion.png" WIDTH=230 HEIGHT=40></a>	
			
		</span>				
<br>
<br>	

 <!--

	<a href="Generacion.html"><IMG SRC="../Img/Lista.png" WIDTH=230 HEIGHT=40></a>
		<br>
		<br>
		<a href="Notificacion.html"><IMG SRC="../Img/Notificaciones.png" WIDTH=230 HEIGHT=40></a>		
		<br>
		<br>
		<a href="Videos.html"><IMG SRC="../Img/VideosTutoriales.png" WIDTH=230 HEIGHT=40></a>		
		<br>
		<br>
		<a href="formulario.html"><IMG SRC="../Img/Quejas.png" WIDTH=230 HEIGHT=40></a>
		<br>
		<br>
-->	
	</body>
</html>
