<html>
		<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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

/*$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $conexion);
mysql_query("SET NAMES UTF8");
*/


echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";

//echo "<form action='BajaMaestro.php' method='post' name= 'f1' id = 'f1' >";
echo '<form action="BajaMaestro.php" method="post" name= "f1" id = "f1" >';

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

echo "Ingrese los 4 digitos corresondientes al número de SIE del maestro a eliminar:";
echo "<br>";
echo '<input type=password name="numero1" onkeypress="return valida(event)" maxlength="4" >';
echo "<br>";
echo "<br>";
echo "Confirmar número de SIE del maestro a eliminar:";
echo "<br>";
echo '<input type=password name="numero" onkeypress="return valida(event)"  maxlength="4">';
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

//}
</SCRIPT>
<script>
function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
echo "<br>";
echo "<br>";
echo "<br>";
echo "<center>";
echo "<input type='submit' name='Submit' onClick='return compara()' value='ELIMINAR MAESTRO' style='BORDER:#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 
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
