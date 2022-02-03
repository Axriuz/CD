<html>
		
	<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNOLÓGICO DE CD. GUZMÁN
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
$usuario =$_SESSION['usuario'];



$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysqli_connect($host,$user,$pass,'sigacitc_cursosdesacadCP');
$bd_seleccionada = mysqli_select_db($conexion,'sigacitc_cursosdesacadCP');
mysqli_query($conexion,"SET NAMES UTF8");

$emp=$_POST['Emp'];
//echo "".$emp;
$consulta_mysql="select * from maestro where Emp = '$emp'";
$resultado=mysqli_query($conexion,$consulta_mysql);


if($row = mysqli_fetch_row($resultado)) {

echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";

echo "<form action='Modificardatosfinal.php' method='post' name= 'f1' id = 'f1'>";
echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/Admin.png' >";
echo "</td>";
echo "<td>";

echo "

<table style='width:100%'>

<tr>
    <td>CLAVE</td>
    <td><input type='text' name='Emp' value='$row[0]' readonly><br><br>
</td>
  </tr>
  <tr>
  
    <td>NOMBRE
</td>
 <td><input type='text' name='alunom' value='$row[1]'><br><br>
</td>
 </tr>
 
   <td>APELLIDO PATERNO
</td>
 <td><input type='text' name='alunomp' value='$row[17]'><br><br>
</td>
 </tr>
 
   <td>APELLIDO MATERNO
</td>
 <td><input type='text' name='alunomm' value='$row[18]'><br><br>

</td>
 </tr>
 
  <td>ÁREA
</td>
 <td><input type='text' name='area' value='$row[4]'><br><br>
</td>
 </tr>
 
 <td>CONTRASEÑA
</td>
 <td><input type='text' name='Contrasena' value='$row[8]'><br><br>
</td>
 </tr>
 

 <td>SEXO</td>




";
if($row[2]=='Femenino')
{
	
	echo' <td>
	<select name ="sexo">
  <option value="Masculino">Masculino</option>
  <option value="Femenino" selected>Femenino</option>
</select>
 </td>
	';
	}
else if($row[2]=='Masculino')
{
	echo'<td>
	<select name ="sexo">
  <option value="Masculino" selected>Masculino</option>
  <option value="Femenino" >Femenino</option>
</select>
 </td>
	';
	
	}
else if($row[2]=='')
{
	echo'<td>
	<select name ="sexo">
  <option value="Masculino">Masculino</option>
  <option value="Femenino">Femenino</option>
</select>

 </td>
	';
	}




echo " </tr><td><br><br><input type='submit' name='Submit' onClick='return compara()'  value='Modificar' style='BORDER: #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'></td>"; 
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
