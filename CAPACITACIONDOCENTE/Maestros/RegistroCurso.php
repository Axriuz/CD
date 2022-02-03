<html>
<body> 
 
 
  <br>

<?php 
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
header('Content-Type: text/html; charset=UTF-8');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];
//Esta bandera sirve al momento de verificar si el curso ya existe, si ya esxiste se cambia a 1
$BAN=0;
/*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 

 $con=mysqli_connect("$host","$user","$pass","sigacitc_cursosdesacadCP");

$bd_seleccionada = mysqli_select_db($con,'sigacitc_cursosdesacadCP');
mysqli_query($con,"SET NAMES UTF8");
*/

require('con.php');
//Variables donde se guardo la información del formulario.
$tec = $_POST["tec"];  
$curso = $_POST["curso"]; 
$periodo = $_POST["periodo"]; 
$inicurso = $_POST["INICURSO"]; 
$fincurso = $_POST["FINCURSO"]; 
$duracion = $_POST["duracion"]; 
$horario = $_POST["horario"]; 
$horario1 = $_POST["horario1"]; 
$sede = $_POST["sede"];
$cvp = $_FILES["cvp"]['type'];


$introduccion = $_POST["introduccion"];  
$objetivo = $_POST["objetivo"];
$justificacion = $_POST["justificacion"]; 
$descripcion = $_POST["descripcion"]; 
$resultados = $_POST["resultados"]; 
$fuentes = $_POST["fuentes"]; 
//estano$material = $_POST["material"];
$infcompleta = $_FILES["infcompleta"]['type'];

$sieadc = $_POST["sieadc"];
$cvadc = $_FILES["cvadc"]['type'];
$TipoCurso=$_POST["TipoCurso"];
$dir=$_POST['dir'];

//Verificamos que la fechad e inico sea menor que la de fin 
if($inicurso > $fincurso){
	$BAN=1;
	echo '<script language="javascript">alert("LA FEHCA DE INCIO DEBE SER MENOR A LA FINAL");</script>';
	$cvadc = '';	
}

//Comprobamos si el curso no existe ya en el mismo periodo y hora
$sql2="SELECT Nombre,Periodo FROM curso WHERE Nombre='$curso' and Periodo='$periodo' and Horario='$horario'";
$resSql2=mysqli_query($con,$sql2); 
$dato2=mysqli_fetch_row($resSql2);

if ($dato2!=""){
	$BAN=1;
	echo '<script language="javascript">alert("CURSO YA EXISTENTE");</script>';
	
}


if($BAN==0){
	 $BAN=0;
$sql = "INSERT INTO `curso`(`Nombre`, `Periodo`, `Duracion`, `CursoInicio`,`CursoFin`, `Horario`,`Horario1`, `Sede`, `Objetivo`, `Temario`, `Instructor` , `Numero`, `Tec` , `Cv` , `Introduccion` , `Justificacion` , `Descripcion` , `Resultados` , `Fuentes` , `Material`, `InfComp` , `InsAux` , `cvinsaux` , `validado` , `Ins_evaluado`  ,`TipoCurso`,`dirigido_a`) VALUES  ('$curso', '$periodo', '$duracion', '$inicurso','$fincurso','$horario','$horario1', '$sede', '$objetivo', '', '$usuario', ' ', '$tec', '$cvp' ,'$introduccion','$justificacion','$descripcion','$resultados','$fuentes','$material','$infcomp','$sieadc','$cvadc','0','0','$TipoCurso','$dir')";

   $result = mysqli_query($con,$sql);
if(!$result) 
{  
 echo 'ERROR: ' . mysql_error() . "\n";
 }
 
 else {	   
   echo '<script language="javascript">alert("CURSO REGISTRADO");</script>';
   } 
 

$consulta_maestros=mysqli_query($con,"Select Emp from maestros where Emp ='$usuario");
$datoma=mysqli_fetch_row($consulta_maestros);  
//echo $datoma;
   //
   function filesize_format($bytes, $format = '', $force = ''){
	$bytes=(float)$bytes;
	if ($bytes <1024){
		$numero=number_format($bytes, 0, '.', ',');
		return array($numero,"B");
	}
	if ($bytes <1048576){
		$numero=number_format($bytes/1024, 2, '.', ',');
		return array($numero,"KBs");
	}
	if ($bytes>= 1048576){
		$numero=number_format($bytes/1048576, 2, '.', ',');
		return array($numero,"MB");
	}
}
//VERIFICAMOS QUE SE SELECCIONO ALGUN ARCHIVO
if(sizeof($_FILES)==0){
	echo "No se puede subir el archivo";
	exit();
}
// EN ESTA VARIABLE ALMACENAMOS EL NOMBRE TEMPORAL QU SE LE ASIGNO ESTE NOMBRE ES GENERADO POR EL SERVIDOR
// ASI QUE SI NUESTRO ARCHIVO SE LLAMA foto.jpg el tmp_name no sera foto.jpg sino un nombre como SI12349712983.tmp por decir un ejemplo
$archivo = $_FILES["infcompleta"]["tmp_name"];
//Definimos un array para almacenar el tama�o del archivo
$tamanio=array();
//OBTENEMOS EL TAMA�O DEL ARCHIVO
$tamanio = $_FILES["infcompleta"]["size"];
//OBTENEMOS EL TIPO MIME DEL ARCHIVO
$tipo = $_FILES["infcompleta"]["type"];
//OBTENEMOS EL NOMBRE REAL DEL ARCHIVO AQUI SI SERIA foto.jpg
$nombre_archivo = $_FILES["infcompleta"]["name"];
//PARA HACERNOS LA VIDA MAS FACIL EXTRAEMOS LOS DATOS DEL REQUEST
extract($_REQUEST);
//VERIFICAMOS DE NUEVO QUE SE SELECCIONO ALGUN ARCHIVO
if ( $archivo != "none" ){
	//ABRIMOS EL ARCHIVO EN MODO SOLO LECTURA
	// VERIFICAMOS EL TA�ANO DEL ARCHIVO
	$fp = fopen($archivo, "rb");
	//LEEMOS EL CONTENIDO DEL ARCHIVO
	$contenido = fread($fp, $tamanio);
	//CON LA FUNCION addslashes AGREGAMOS UN \ A CADA COMILLA SIMPLE ' PORQUE DE OTRA MANERA
	//NOS MARCARIA ERROR A LA HORA DE REALIZAR EL INSERT EN NUESTRA TABLA
	$contenido = addslashes($contenido);
	//CERRAMOS EL ARCHIVO
	fclose($fp);
	// VERIFICAMOS EL TA�ANO DEL ARCHIVO
	if ($tamanio <1048576){
		//HACEMOS LA CONVERSION PARA PODER GUARDAR SI EL TAMA�O ESTA EN b � MB
		$tamanio=filesize_format($tamanio);
	}
	
	//CREAMOS NUESTRO INSERT
	$qry = "INSERT INTO tbl_documentos ( titulo,nombre_archivo, descripcion, contenido, tamanio,tamanio_unidad, tipo ) VALUES
	('$curso','$nombre_archivo', '$descripcion','$contenido','{$tamanio[0]}','{$tamanio[1]}', '$tipo')";
	
	//NOS CONECAMOS A LA BASE DE DATOS
	//REMPLAZEN SUS VALOS POR LOS MIOS
 
	//mysql_connect('sigacitcg.com.mx','sigacitc','Itcg11012016_2') or die("No se pudo conectar a la base de datos");
		//mysqli_connect('localhost','root','','sigacitc_cursosdesacadCP') or die("No se pudo conectar a la base de datos");

	//SELECCIONAMOS LA BASE DE DATOS CON LA CUAL VAMOS A TRABAJAR CAMBIEN EL VALOR POR LA SUYA
	mysqli_select_db($con,'sigacitc_cursosdesacadCP');
	
	//EJECUTAMOS LA CONSULTA
	mysqli_query($con,$qry) or die("Query: $qry <br />Error: ".mysql_error());
	
	//CERRAMOS LA CONEXION
	mysqli_close($con);
	//NOTIFICAMOS AL USUARIO QUE EL ARCHVO SE HA ENVIADO O REDIRIGIMOS A OTRO LADO ETC.
	echo "Archivo Agregado Correctamente<br>";
	echo '<a href="form.html">Subir Otro Archivo</a><br > ';
}else{
	echo "No fue posible subir el archivo";
	echo '<a href="form.html">Subir Otro Archivo</a><br > ';
}
   
   
   //
    //
   function filesize_format1($bytes, $format = '', $force = ''){
	$bytes=(float)$bytes;
	if ($bytes <1024){
		$numero=number_format($bytes, 0, '.', ',');
		return array($numero,"B");
	}
	if ($bytes <1048576){
		$numero=number_format($bytes/1024, 2, '.', ',');
		return array($numero,"KBs");
	}
	if ($bytes>= 1048576){
		$numero=number_format($bytes/1048576, 2, '.', ',');
		return array($numero,"MB");
	}
}
//VERIFICAMOS QUE SE SELECCIONO ALGUN ARCHIVO
if(sizeof($_FILES)==0){
	echo "No se puede subir el archivo";
	exit();
}
// EN ESTA VARIABLE ALMACENAMOS EL NOMBRE TEMPORAL QU SE LE ASIGNO ESTE NOMBRE ES GENERADO POR EL SERVIDOR
// ASI QUE SI NUESTRO ARCHIVO SE LLAMA foto.jpg el tmp_name no sera foto.jpg sino un nombre como SI12349712983.tmp por decir un ejemplo
$archivo = $_FILES["cvp"]["tmp_name"];
//Definimos un array para almacenar el tama�o del archivo
$tamanio=array();
//OBTENEMOS EL TAMA�O DEL ARCHIVO
$tamanio = $_FILES["cvp"]["size"];
//OBTENEMOS EL TIPO MIME DEL ARCHIVO
$tipo = $_FILES["cvp"]["type"];
//OBTENEMOS EL NOMBRE REAL DEL ARCHIVO AQUI SI SERIA foto.jpg
$nombre_archivo = $_FILES["cvp"]["name"];
//PARA HACERNOS LA VIDA MAS FACIL EXTRAEMOS LOS DATOS DEL REQUEST
extract($_REQUEST);
//VERIFICAMOS DE NUEVO QUE SE SELECCIONO ALGUN ARCHIVO
if ( $archivo != "none" ){
	//ABRIMOS EL ARCHIVO EN MODO SOLO LECTURA
	// VERIFICAMOS EL TA�ANO DEL ARCHIVO
	$fp = fopen($archivo, "rb");
	//LEEMOS EL CONTENIDO DEL ARCHIVO
	$contenido = fread($fp, $tamanio);
	//CON LA FUNCION addslashes AGREGAMOS UN \ A CADA COMILLA SIMPLE ' PORQUE DE OTRA MANERA
	//NOS MARCARIA ERROR A LA HORA DE REALIZAR EL INSERT EN NUESTRA TABLA
	$contenido = addslashes($contenido);
	//CERRAMOS EL ARCHIVO
	fclose($fp);
	// VERIFICAMOS EL TAÑANO DEL ARCHIVO
	if ($tamanio <1048576){
		//HACEMOS LA CONVERSION PARA PODER GUARDAR SI EL TAMA�O ESTA EN b � MB
		$tamanio=filesize_format1($tamanio);
	}
	
	//CREAMOS NUESTRO INSERT
	$qry = "INSERT INTO tbl_documentos2 ( titulo,nombre_archivo, descripcion, contenido, tamanio,tamanio_unidad, tipo ) VALUES
	('$curso','$nombre_archivo', '$descripcion','$contenido','{$tamanio[0]}','{$tamanio[1]}', '$tipo')";
	
	//NOS CONECAMOS A LA BASE DE DATOS
	//REMPLAZEN SUS VALOS POR LOS MIOS

 

	//mysql_connect('sigacitcg.com.mx','sigacitc','Itcg11012016_2') or die("No se pudo conectar a la base de datos");
		$con=mysqli_connect('localhost','root','','sigacitc_cursosdesacadCP') or die("No se pudo conectar a la base de datos");

	//SELECCIONAMOS LA BASE DE DATOS CON LA CUAL VAMOS
	
	//EJECUTAMOS LA CONSULTA
	mysqli_query($con,$qry) or die("Query: $qry <br />Error: ".mysql_error());
	
	//CERRAMOS LA CONEXION
	mysqli_close($con);
	//NOTIFICAMOS AL USUARIO QUE EL ARCHVO SE HA ENVIADO O REDIRIGIMOS A OTRO LADO ETC.
	echo "Archivo Agregado Correctamente<br>";
	echo '<a href="form.html">Subir Otro Archivo</a><br > ';
}else{
	echo "No fue posible subir el archivo";
	echo '<a href="form.html">Subir Otro Archivo</a><br > ';
}
   
   
   //
    //
   function filesize_format2($bytes, $format = '', $force = ''){
	$bytes=(float)$bytes;
	if ($bytes <1024){
		$numero=number_format($bytes, 0, '.', ',');
		return array($numero,"B");
	}
	if ($bytes <1048576){
		$numero=number_format($bytes/1024, 2, '.', ',');
		return array($numero,"KBs");
	}
	if ($bytes>= 1048576){
		$numero=number_format($bytes/1048576, 2, '.', ',');
		return array($numero,"MB");
	}
}
//VERIFICAMOS QUE SE SELECCIONO ALGUN ARCHIVO
if(sizeof($_FILES)==0){
	echo "No se puede subir el archivo";
	exit();
}
// EN ESTA VARIABLE ALMACENAMOS EL NOMBRE TEMPORAL QU SE LE ASIGNO ESTE NOMBRE ES GENERADO POR EL SERVIDOR
// ASI QUE SI NUESTRO ARCHIVO SE LLAMA foto.jpg el tmp_name no sera foto.jpg sino un nombre como SI12349712983.tmp por decir un ejemplo
$archivo = $_FILES["cvadc"]["tmp_name"];
//Definimos un array para almacenar el tama�o del archivo
$tamanio=array();
//OBTENEMOS EL TAMA�O DEL ARCHIVO
$tamanio = $_FILES["cvadc"]["size"];
//OBTENEMOS EL TIPO MIME DEL ARCHIVO
$tipo = $_FILES["cvadc"]["type"];
//OBTENEMOS EL NOMBRE REAL DEL ARCHIVO AQUI SI SERIA foto.jpg
$nombre_archivo = $_FILES["cvadc"]["name"];
//PARA HACERNOS LA VIDA MAS FACIL EXTRAEMOS LOS DATOS DEL REQUEST
extract($_REQUEST);
//VERIFICAMOS DE NUEVO QUE SE SELECCIONO ALGUN ARCHIVO
if ( $archivo != "none" ){
	//ABRIMOS EL ARCHIVO EN MODO SOLO LECTURA
	// VERIFICAMOS EL TA�ANO DEL ARCHIVO
	$fp = fopen($archivo, "rb");
	//LEEMOS EL CONTENIDO DEL ARCHIVO
	$contenido = fread($fp, $tamanio);
	//CON LA FUNCION addslashes AGREGAMOS UN \ A CADA COMILLA SIMPLE ' PORQUE DE OTRA MANERA
	//NOS MARCARIA ERROR A LA HORA DE REALIZAR EL INSERT EN NUESTRA TABLA
	$contenido = addslashes($contenido);
	//CERRAMOS EL ARCHIVO
	fclose($fp);
	// VERIFICAMOS EL TA�ANO DEL ARCHIVO
	if ($tamanio <1048576){
		//HACEMOS LA CONVERSION PARA PODER GUARDAR SI EL TAMA�O ESTA EN b � MB
		$tamanio=filesize_format2($tamanio);
	}
	
	//CREAMOS NUESTRO INSERT
	$qry = "INSERT INTO tbl_documentos3 ( titulo,nombre_archivo, descripcion, contenido, tamanio,tamanio_unidad, tipo ) VALUES
	('$curso','$nombre_archivo', '$descripcion','$contenido','{$tamanio[0]}','{$tamanio[1]}', '$tipo')";
	
	//NOS CONECAMOS A LA BASE DE DATOS
	//REMPLAZEN SUS VALOS POR LOS MIOS

 
	//mysql_connect('sigacitcg.com.mx','sigacitc','Itcg11012016_2') or die("No se pudo conectar a la base de datos");
		$con=mysqli_connect('localhost','root','','sigacitc_cursosdesacadCP') or die("No se pudo conectar a la base de datos");


	//SELECCIONAMOS LA BASE DE DATOS CON LA CUAL VAMOS
	//EJECUTAMOS LA CONSULTA
	mysqli_query($con,$qry) or die("Query: $qry <br />Error: ".mysql_error());
	
	//CERRAMOS LA CONEXION
	mysqli_close($con);
	//NOTIFICAMOS AL USUARIO QUE EL ARCHVO SE HA ENVIADO O REDIRIGIMOS A OTRO LADO ETC.
	echo "Archivo Agregado Correctamente<br>";
	echo '<a href="form.html">Subir Otro Archivo</a><br > ';
}else{
	echo "No fue posible subir el archivo";
	echo '<a href="form.html">Subir Otro Archivo</a><br > ';
}
   //
}
?> 

</body>

<?php 
if($BAN==0){
  header('Location: concluido.php'). $_SESSION['usuario'];
}	
?> 
</html>








