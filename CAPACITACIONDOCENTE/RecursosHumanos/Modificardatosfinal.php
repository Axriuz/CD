<html>
		
	<header><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNOLÓGICO DE CD. GUZMÁN
		<hr height: 10px; > 
		</center>
	</header>


<?php
require('con.php');

//$consulta_mysql="select * from maestro where Emp = '$emp'";
//$resultado=mysql_query($consulta_mysql);


$aluctr=$_REQUEST['Emp'];
$alupas=$_REQUEST['Contrasena'];
$area=$_REQUEST['area'];
$nombre=$_REQUEST['alunom'];
$nombrep=$_REQUEST['alunomp'];
$nombrem=$_REQUEST['alunomm'];
$sexo=$_REQUEST['sexo'];

$queryi="update PersonalRH set Contrasena='$alupas',Area='$area',Nombre='$nombre',ApellidoP='$nombrep',ApellidoM='$nombrem',Sexo='$sexo' where Emp='$aluctr'";//consulta sql

$val=mysqli_query($con,$queryi);//ejecutando consulta

//echo "".$queryi;

if(!$val){
echo "No se ha podido Modificar";
}
else {
echo "<center><h1>Datos Modificados Correctamente<br><br>";
}



?>
<br>
<br>
	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
	</body>
</html>
