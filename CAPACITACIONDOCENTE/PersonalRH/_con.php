<?php
$host= "localhost"; 
$user = "root"; 
$pass= "";   

$con=mysqli_connect("$host","$user","$pass","sigacitc_cursosdesacadcp");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit;
}
$bd_seleccionada = mysqli_select_db($con,'sigacitc_cursosdesacadcp');
mysqli_query($con,"SET NAMES UTF8");
?>