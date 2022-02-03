<html>
		<meta charset="UTF-8">
	<header>
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNOLÓGICO DE CD. GUZMÁNh
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
	
<table width="100%" border="0" cellpadding="5">
<tr>
<td><span style="COLOR: #000000; align="center">		
		
		<a href="CambioNip.php"><IMG SRC="../Img/ModNip.png" WIDTH=230 HEIGHT=45></a>	
		<br>
		<br>
		<a href="InscribirMaestro.php"><IMG SRC="../Img/RegMae.png" WIDTH=230 HEIGHT=45></a>
		<br>
		<br>
		<a href="BorrarMaestro.php"><IMG SRC="../Img/EliMae.png" WIDTH=230 HEIGHT=45></a>
		<br>
		<br>
		<a href="CambioJefe.php"><IMG SRC="../Img/JefeDpto.png" WIDTH=230 HEIGHT=45></a>
		<br>
		<br>
		
		<a href="actcontancias.php"><IMG SRC="../Img/actconstancias.png" WIDTH=230 HEIGHT=45></a>
		<br>
		<br>
		<a href="listas.php"><IMG SRC="../Img/glistas.png" WIDTH=230 HEIGHT=45></a>
		<br>
		<br>
		<a href="asistencia1.php"><IMG SRC="../Img/asistencia.png" WIDTH=230 HEIGHT=45></a>	
		<br>
		<br>
		<!--
		<a href="noti.php"><IMG SRC="../Img/not.png" WIDTH=230 HEIGHT=45></a>	
		<br>
		<br>
		<a href="CambioJefe.php"><IMG SRC="../Img/greportes.png" WIDTH=230 HEIGHT=45></a>
		<br>
		<br>
		<a href="Formatos.php"><IMG SRC="../Img/formatos.png" WIDTH=230 HEIGHT=45></a>
		<br>
		<br>
		-->
		<a href="Evaluar.php"><IMG SRC="../Img/evaluar.png" WIDTH=230 HEIGHT=45></a>
		<br>
		<br>

		<a href="NUEVOEMPLEADO.php"><IMG SRC="../Img/aprobacion.png" WIDTH=230 HEIGHT=45></a>
		<br>
		<br>
		
		<a href="Principal.html"><IMG SRC="../Img/ModNip2.png" WIDTH=230 HEIGHT=45></a>
		<br>
		<br>
		
		<a href="GETCV.php"><IMG SRC="../Img/CV.png" WIDTH=230 HEIGHT=45></a>
		<br>
		<br>
		

		<!--
		<a href="Quejas.php"><IMG SRC="../Img/Quejas.png" WIDTH=230 HEIGHT=45></a>	
		<br>
		<br>
		<a href="tutoriales.html"><IMG SRC="../Img/tutoriales.png" WIDTH=230 HEIGHT=45></a>
		<br>
		<br>
		-->
		<a href="../Logout.php"><IMG SRC="../Img/CerrarSesion.png" WIDTH=230 HEIGHT=45></a>	


</td>
<td>
<hr width="1" size="400">

</td>
<td>
		
<table width="100%" border="0" cellpadding="5">
<tr>
<td><span style="COLOR: #000000; align="center">		
<center>
<IMG SRC="../Img/itcg.jpg" WIDTH=1084 HEIGHT=370 >
<center>
</td>
</tr>
</table>
		


</td>
</tr>
</table>
			
		
		</span>				


	</body>
</html>
