<?php
//haremos uso de esta función cada ves que deseamos conectarnos a la base de datos.
function conectar(){
$user = "sigacitc"; //usuario de base de datos
$pass= "Itcg11012016_2"; //contraseña de acceso a base de datos
$server="sigacitcg.com.mx";  // Nombre del servidor
$db="sigacitc_cursosdesacadCP"; // Nombre de la Base de datos
//$dbh=mysqli_connect("201.167.122.93", "itcgencuestas", "Itcg_Bd387", "bd_ed")
/*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $conexion);
mysql_query("SET NAMES UTF8");
$host='mysql.webcindario.com';
 $user='cursosdesacad';
 $pass='jmrs1905';
 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('cursosdesacad', $conexion);

*/

$con=mysql_connect($server,$user,$pass) or die ('Ha fallado la conexión: '.mysql_error());
mysql_select_db($db,$con) or die ('No se pudo conectar a la base de datos: '.mysql_error());
return $con;
}
?>