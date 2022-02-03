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



echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#D149F6' ;>";


echo "<form action='BajaMaestro.php' method='post' name= 'f1' id = 'f1' >";
echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/eliminar_maestro2.PNG' >";
echo "</td>";
echo "<td>";
echo "<center>";
echo "BAJA DE MAESTROS";
echo "<br>";
echo "<br>";

echo "Ingrese los 4 digitos corresondientes al número de SIE del maestro a registrar:";
echo "<br>";
echo "<input type=password name='numero1'  maxlength='4' >";
echo "<br>";
echo "<br>";
echo "Confirmar número de SIE del maestro a registrar:";
echo "<br>";
echo "<input type=password name='numero'   maxlength='4'>";
echo "<br>";
echo "</center>";

?>

<SCRIPT LANGUAGE=JavaScript>


 function compara() 
{ 
$clave=document.f1.numero.value ;



if (document.f1.numero.value != document.f1.numero1.value) {
alert('Las contraseña no son identicas, por favor reintente.');
return false; } 

 if($clave.length < 4){
      alert('La clave debe contener 4 caracteres');
      return false;
   }
   
 
return true 


}

</SCRIPT>

<?php
echo "<br>";
echo "<br>";
echo "<br>";
echo "<center>";
echo "<input type='submit' name='Submit' onClick='return compara()'  value='ELIMINAR MAESTRO' style='BORDER: rgb(210,122,234) 2px solid; BACKGROUND-COLOR: #D149F6; COLOR: #FCFCFD;'>"; 
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
