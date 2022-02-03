<html>

<body> 
 
 
  <br>
  <header><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMÁN
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
$Emp = $_POST["numero1"];
$n=$_POST["n"];
$ap= $_POST["ap"];
$am= $_POST["am"];

/*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query($con,"SET NAMES UTF8");
*/

require('con.php');

echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";
echo "<tr>";
echo "<td>";

$sql1="SELECT Emp from `maestro` WHERE Emp = $Emp";
$resultado=mysqli_query($con,$sql1);


$cont=0;

if($row = mysqli_fetch_row($resultado)) {
$cont=3;
}
else
{
$cont=0;
}

//$sql1 = "SELECT Emp from `maestro` WHERE Emp = $Emp ";
//$result1 = mysqli_query($con,$sql, $conexion);




  if($cont==3)
  {
   
  $sql = "DELETE FROM `maestro` WHERE Emp = $Emp ";
   $result = mysqli_query($con,$sql, $conexion);
   /*
if(!$result) {  


 
   }else {
      header('Location: BorrarMaestro.php'). $_SESSION['usuario'];} 
*/

   	if($result == false) 
   	{
	echo '<p>Error al eliminar los campos en la tabla '.$Emp.'.</p>';
        }
        else{
          echo "<center>";
	echo '<p>Los datos se han eliminado correctamente '.$Emp.'.</p>
	<br>
	Nombre: '.$n.' '.$ap.' '.$am.'
	<br><br>
	';
	  echo '<A HREF="Menu.php" >REGRESAR</A>';
	    echo "</center>";
	}
  }
  
  
  
  else
  {
  
  	echo '<p>No existe '.$Emp.'.</p>';
  }
  
  
    echo "</td>";
  echo "</tr>";
 echo "</table>";
echo "</div>";
 
?> 
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
</body>
</html>







