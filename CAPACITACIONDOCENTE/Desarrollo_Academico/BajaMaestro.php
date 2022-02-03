<html>

<body> 
 
 
 	
		<header><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMÁN
		<hr height: 10px; > 
		</center>
	</header>
	
  <br>

<?php 
session_start();
if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$Emp = $_POST["numero"];
$Emp1 = $_POST["numero1"];
/* 
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $con=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db($con,'sigacitc_cursosdesacadCP');
mysql_query($con,"SET NAMES UTF8");
*/

require ('con.php');

/*
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $con);
mysql_query("SET NAMES UTF8");
*/
echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";
echo "<tr>";
echo "<td>";
if(stristr($Emp,$Emp1))
{
	



$sql1="SELECT Emp,Nombre,ApellidoP,ApellidoM from `maestro` WHERE Emp = $Emp";

$resultado=mysqli_query($con,$sql1);


$cont=0;

if($row = mysqli_fetch_row($resultado)) {
$cont=3;
echo "<Center>CONFIRMAR";
echo "<br>";
echo "<br>";
       echo "NOMBRE: ".$row[1]." ".$row[2]." ".$row[3]." </CENTER>";
	   echo '<input type="text" name="n" value="'.$row[1].'" hidden="true">'; 
	   echo '<input type="text" name="ap" value="'.$row[1].'" hidden="true">'; 
	   echo '<input type="text" name="am" value="'.$row[1].'" hidden="true">'; 

}
else
{
$cont=0;
}

//$sql1 = "SELECT Emp from `maestro` WHERE Emp = $Emp ";
//$result1 = mysql_query($sql, $con);




  if($cont==3)
  {
   /*
  $sql = "DELETE FROM `maestro` WHERE Emp = $Emp ";
   $result = mysql_query($sql, $con);
   /*
if(!$result) {  


 
   }else {
      header('Location: BorrarMaestro.php'). $_SESSION['usuario'];} 
*/
/*
   	if($result == false) 
   	{
	echo '<p>Error al eliminar los campos en la tabla '.$Emp.'.</p>';
        }
        else{
	echo '<p>Los datos se han eliminado correctamente '.$Emp.'.</p>';
	}
	*/
	echo "<center>";
	
	echo '<form action="BajaMaestro1.php" method="post" name= "f1" id = "f1" >';
echo 'Clave  <input type=text name="numero1" value='.$Emp.' maxlength="4"readonly >';
echo "<br>";


 echo '<input type="text" name="n" value="'.$row[1].'" hidden="true">'; 
	   echo '<input type="text" name="ap" value="'.$row[1].'" hidden="true">'; 
	   echo '<input type="text" name="am" value="'.$row[1].'" hidden="true">'; 

	echo "<br><br>";
echo "<input type='submit' name='Submit'   value='CONFIRMAR' style='BORDER: #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>&nbsp;"; 
echo "<input type='button' value='CANCELAR' onclick='history.back(-1)' style='BORDER: #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'/>";

echo "</center>";
  }
  
  
  
  else
  {
  	echo "<center>";
  	echo '<p>No existe '.$Emp.'.</p>';
echo "<input type='button' value='REGRESAR' onclick='history.back(-1)' style='BORDER: #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'/>";
	echo "<center>";
  }
  
  
  }
  else
  {
  echo "<center>";
  echo "Claves distintas";
  echo "<br>";echo "<br>";
  echo "<input type='button' value='REGRESAR' onclick='history.back(-1)' style='BORDER: #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'/>";

  echo "</center>";
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







