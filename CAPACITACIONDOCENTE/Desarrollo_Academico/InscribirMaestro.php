<html>
		
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<header>
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMÁN
		<hr height: 10px; > 
		</center>
	</header>
	
	<body>
	<article>
<center>
<script type="text/javascript">
function upperCase()
{
var x=document.getElementById("fname").value
document.getElementById("fname").value=x.toUpperCase()
var x=document.getElementById("fname1").value
document.getElementById("fname1").value=x.toUpperCase()
var x=document.getElementById("fname2").value
document.getElementById("fname2").value=x.toUpperCase()
}

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



session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}

echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";

echo "<form action='RegistroMaestro.php' method='post'   name= 'f1' id = 'f1'>";
echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/agregarMaestro2.PNG' >";
echo "</td>";
echo "<td>";
echo "<center>";
echo "ALTA DE MAESTROS";
echo "<br>";
echo "<br>";
echo "<br>";
echo "Ingrese el número de SIE del maestro a registrar:";
echo "<br>";
echo "<input type=text  name='Nombre'  onkeypress='return valida(event)' maxlength='4' size ='10' required>";
echo "<br>";
echo "<br>";
echo "Ingrese el nombre del maestro (MAYUSCULAS):";
echo "<br>";

echo "<input type=text name='Nombre2'  id='fname' onblur='upperCase()'  size ='25' required>";
echo "<br>";
echo "Apellido paterno";
echo "<br>";
echo "<input type=text name='Nombre3'   id='fname1' onblur='upperCase()'   size ='25' required>";
echo "<br>";
echo "Apellido materno";
echo "<br>";
echo "<input type=text name='Nombre4'   id='fname2' onblur='upperCase()'   size ='25' required>";
echo "<br>";
?>

<SCRIPT LANGUAGE=JavaScript>


 function compara() 
{ 
$clave=document.f1.Nombre.value ;




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

echo "<input type='submit' name='Submit' onClick='return compara()'   value='REGISTRAR MAESTRO' style='BORDER: #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>"; 
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
