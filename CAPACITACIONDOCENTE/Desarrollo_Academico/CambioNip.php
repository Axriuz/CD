<html>
		
	<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNOLÓGICO DE CD. GUZMÁN
		<hr height: 10px; > 
		</center>
	</header>


<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];
/*$host= "sigacitcg.com.mx";     
	$user = "sigacitc"; 	  			
	$pass= "Itcg11012016_2";
 $conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query($con,"SET NAMES UTF8");
*/

require('con.php');

$consulta_mysqli="select * from maestro where Emp = '$usuario'";
$resultado=mysqli_query($con,$consulta_mysqli);





if($row = mysqli_fetch_row($resultado)) {

echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";

echo "<form action='RegistroDeCambioNip.php' method='post' name= 'f1' id = 'f1'>";
echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/Admin.png' >";
echo "</td>";
echo "<td>";
echo "Constraseña Actual: <input type ='text'  disabled='disabled' name='Contrasena2'  size ='10' value='".$row[8]."'/>";
echo "<br>";
echo "<br>";
echo "<b>";
echo "La contraseña deberá cumplir con las siguientes caracteristicas:";
echo "</b>";
echo "<br>";
echo "-Debe contener al menos 6 caracteres";
echo "<br>";
echo "-Debe contener como máximo 10 caracteres";
echo "<br>";
echo "-Debe contener al menos 1 letra minúscula";
echo "<br>";
echo "-Debe contener al menos 1 letra mayúscula";
echo "<br>";
echo "-Debe contener al menos un carácter numérico";
echo "<br>";
echo "<br>";

echo "Ingrese su nueva contraseña:";
echo "<input type=password name='Contrasena1' >";
echo "<br>";
echo "<br>";
echo "Confirmar nueva contraseña:";
echo "<input type=password name='Contrasena' >";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<center>";
?>

<SCRIPT LANGUAGE=JavaScript>
 
 function compara() 
{ 
$clave=document.f1.Contrasena.value ;
if (document.f1.Contrasena1.value != document.f1.Contrasena.value) {
alert('Las contraseña no son identicas, por favor reintente.');
return false; } 
 if($clave.length < 6){
      alert('La clave debe tener al menos 6 caracteres');
      return false;
   }
    if($clave.length > 10){
      alert('La clave no puede tener mas de 10 caracteres');
      return false;
   }
  
  
	var nMay = 0, nMin = 0, nNum = 0
	var t1 = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ"
	var t2 = "abcdefghijklmnñopqrstuvwxyz"
	var t3 = "0123456789"
	for (i=0;i<$clave.length;i++) {
		if ( t1.indexOf($clave.charAt(i)) != -1 ) {nMay++}
		if ( t2.indexOf($clave.charAt(i)) != -1 ) {nMin++}
		if ( t3.indexOf($clave.charAt(i)) != -1 ) {nNum++}
	}
	
	if ( nMay>0 && nMin>0 && nNum>0 ) {
return true }
else { 
 alert('La clave debe contener al menos una letra minuscula, una letra mayuscula y un numero');
 return false; }
 
 
	
}

</SCRIPT>

<?php
 
error_reporting(E_ALL ^ E_DEPRECATED);
  
  

echo "<input type='submit' name='Submit' onClick='return compara()'  value='ACTUALIZAR CONTRASEÑA' style='BORDER: rgb(165, 39, 63) 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 
echo "</center>";
echo "</form>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
}
?>

<br>
<br>
	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
	</body>
</html>
