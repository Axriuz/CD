<?php 
//Variables correspondientes al host del servidor y usuario y password para accesar a el
$host= "sigacitcg.com.mx"; 
$user = "sigacitc"; 
$pass= "Itcg11012016_2"; 

//Asignamos a la variable con la conexión al servidor y que base de datos se seleccionara
$con=mysqli_connect("$host","$user","$pass","sigacitc_cursosdesacadCP");

//En caso arrojar algún error, lo imprime.
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit;
}
// de lo contrarío seecciona la base de datos sigacitc_cursosdesacadCP y convierte los datos en formato UTF8
$bd_seleccionada = mysqli_select_db($con,'sigacitc_cursosdesacadCP');
mysqli_query($con,"SET NAMES UTF8");
?>