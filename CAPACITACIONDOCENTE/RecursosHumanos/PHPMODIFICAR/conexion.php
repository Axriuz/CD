<?php
//haremos uso de esta función cada ves que deseamos conectarnos a la base de datos.
function conectar(){
$user="itcgencuestas";//usuario de base de datos
$pass="Itcg_Bd387";//contraseña de acceso a base de datos
$server="201.167.122.93"; // Nombre del servidor
$db="bd_ed"; // Nombre de la Base de datos
//$dbh=mysqli_connect("201.167.122.93", "itcgencuestas", "Itcg_Bd387", "bd_ed")

$con=mysql_connect($server,$user,$pass) or die ('Ha fallado la conexión: '.mysql_error());
mysql_select_db($db,$con) or die ('No se pudo conectar a la base de datos: '.mysql_error());
return $con;
}
?>