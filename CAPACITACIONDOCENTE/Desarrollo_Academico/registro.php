<html>
<body>
<?php

//NombreDoc	ISO	Codigo	Revision	Elaboro	Aprobo	Fecha	//PlantillaMod


//$resultado=mysql_query('SELECT * FROM PlantillaMod', $db_connection);
//UPDATE table_name SET column1 = value1, column2 = value2, WHERE condition;
//if (mysql_num_rows($resultado)>0)
//{

//header('Location: Fail.html');

//} else {
	
//$insert_value = 'UPDATE  PlantillaMod.table SET NombreDoc = '.$subs_NombreDoc.'and ISO = '.$subs_ISO.', Codigo = '.$subs_Codigo.', Revision = '.$subs_Revision.', Elaboro = '.$subs_Elaboro.', Aprobo = '.$subs_Aprobo.', Fecha = '.$subs_Fecha.' where COD=0;';
//$insert_value = 'UPDATE  PlantillaMod.table SET NombreDoc =" '.$subs_NombreDoc.'" where COD=0;';
//UPDATE `PlantillaMod` SET NombreDoc="PRUEBA2"  WHERE COD='1';
//INSERT INTO "nombre_tabla" ("columna1", "columna2", ...)
//VALUES ("valor1", "valor2", ...);
//$insert_value = 'insert into  PlantillaMod (NombreDoc, ISO) values("HOLA","HOLA");';


$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $conexion);
mysql_query("SET NAMES UTF8");

/*
$nombre = $_POST["nombre"]; 
$email = $_POST["email"]; 
$telefono = $_POST["telefono"]; 
$empresa = $_POST["empresa"]; 
$comentario = $_POST["comentario"]; 
*/

$nombre = $_POST['nombre']; 
echo $nombre."<br>";

$subs_NombreDoc = strip_tags($_POST['nombre']);
$subs_ISO = strip_tags($_POST["referencia"]);
$subs_Codigo = utf8_decode($_POST["codigo"]);
$subs_Revision = utf8_decode($_POST['revision']);
$subs_Elaboro = utf8_decode($_POST['elaboro']);
$subs_Aprobo = strip_tags($_POST['aprobo']);
$subs_Fecha = utf8_decode($_POST['fecha']);
//$sql = "UPDATE `maestro` SET Contrasena='$Contrasena' WHERE Emp = '$usuario' ";
 
$sql = "UPDATE `PlantillaMod` SET NombreDoc = '$nombre', ISO = '$subs_ISO', Codigo = '$subs_Codigo', Revision = '$subs_Revision', Elaboro = '$subs_Elaboro', Aprobo = '$subs_Aprobo', Fecha = '$subs_Fecha' where COD=0;";

   $result = mysql_query($sql, $conexion);
if(!$result) {  
 echo 'ERROR: ' . mysql_error() . "\n";
   }else {
   //header('Location: CambioNip.php'). $_SESSION['usuario'];
   } 
		
?>
<br><br>
<a href="http://www.aprenderphp.byethost11.com/Alumnosform.php">DEVOLVER A EL FORMULARIO </a>
<body/>
<html/>