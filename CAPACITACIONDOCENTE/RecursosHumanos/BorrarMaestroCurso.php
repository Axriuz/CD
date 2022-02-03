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
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}

$usuario =$_SESSION['usuario'];

require('con.php');


echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";

//echo "<form action='BajaMaestro.php' method='post' name= 'f1' id = 'f1' >";
echo '<form action="BorrarMaestroCursoSelect.php" method="post" name= "f1" id = "f1" >';

echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/eliminar_maestro2.PNG' >";
echo "</td>";
echo "<td>";
echo "<center>";
echo "BAJA DE MAESTROS DE CURSO:";
echo "<br>";
echo "<br>";

echo "<br>";
echo "<br>";

echo "<br>";

//$consulta_mysqli='select distinct * from curso where Activo=1 and validado=0';
$consulta_mysqli='select * from cursoRH';
//$consulta_mysqli='select distinct * from curso where Activo = 1';
$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
  
echo "<select name='cursos'>";
while($fila=mysqli_fetch_array($resultado_consulta_mysqli)){
  
    echo " <option value='".$fila['Nombre']."'>".$fila['Nombre']."</option>";
}
echo "</select>";
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
echo "<br>";
echo "<br>";
echo "<br>";
echo "<center>";
echo "<input type='submit' name='Submit' onClick='return compara()' value='SELECCIONAR CURSO' style='BORDER:#a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 
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
