<?php
//NOS CONECAMOS A LA BASE DE DATOS
//REMPLAZEN SUS VALOS POR LOS MIOS

/*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query($con,"SET NAMES UTF8");



mysqli_connect('sigacitcg.com.mx','sigacitc','Itcg11012016_2') or die("No se pudo conectar a la base de datos");
//mysqli_connect('localhost','root','') or die("No se pudo conectar a la base de datos");

//SELECCIONAMOS LA BASE DE DATOS CON LA CUAL VAMOS A TRABAJAR CAMBIEN EL VALOR POR LA SUYA
mysqli_select_db('sigacitc_cursosdesacadCP');
*/

require('con.php');
//CONSTRUIMOS LA CONSULTA PARA OBTENER EL DOCUMENTO
$qry="Select * from tbl_documentos where id_documento=3";
$res=mysqli_query($con,$qry) or die(mysqli_error()." qry::$qry");
$obj=mysqli_fetch_object($res);		

//OBTENEMOS EL TIPO MIME DEL ARCHIVO ASI EL NAVEGADOR SABRA DE QUE SE TRATA
header("Content-type: {$obj->tipo}");

//OBTENEMOS EL NOMBRE DEL ARCHIVO POR SI LO QUE SE REQUIERE ES DESCARGARLO
header('Content-Disposition: attachment; filename="'.$obj->nombre_archivo.'"');

//Y PO ULTIMO SIMPLEMENTE IMPRIMIMOS EL CONTENIDO DEL ARCHIVO
print $obj->contenido;

//CERRAMOS LA CONEXION
mysqli_close();
?>