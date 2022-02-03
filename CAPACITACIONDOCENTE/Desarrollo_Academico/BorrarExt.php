<html>
		<head>
<script type="text/javascript">
function PromptDemo() 
{
$clave=document.f1.numero.value ;


confirmar=confirm("Seguro que deseas eliminar el registro1  "+$clave); 

if (confirmar) 
{

window.location.href="BajaMaestro.php?numero="+$clave
}

else 
{
alert('Cancelado Regresando a Menú');
window.history.back();
} 



}
</script>
</head>
		<meta charset="UTF-8">	
		<header>
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMÁN
		<hr height: 10px; > 
		</center>
	</header>
	

<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}

$usuario =$_SESSION['usuario'];


echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";

echo '<form action="BajaExt.php" method="post" name= "f1" id = "f1" >';

echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/eliminar_maestro2.PNG' >";
echo "</td>";
echo "<td>";
echo "<center>";
echo "CONSULTAR EXTERNOS
      <br>
      <br>
     <input type='submit' name='Submit' value='CONSULTAR' formaction='ConsultaExt.php' style='BORDER:#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>
     <br>"; 
echo "<br>";
echo "BAJA DE PERSONAL EXTERNO";
echo "<br>";
echo "<br>";
echo "ID de Externo:";
echo "<br>";
echo '<input  name="id" style=width:10% >';
echo "</center>";

?>


<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
echo "<br>";
echo "<center>";
echo "<input type='submit' name='Submit' value='ELIMINAR EXTERNO' style='BORDER:#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 
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
