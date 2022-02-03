<?php
//NOS CONECAMOS A LA BASE DE DATOS
//REMPLAZEN SUS VALOS POR LOS MIOS

$host= "sigacitcg.com.mx"; 
$user = "sigacitc"; 
$pass= "Itcg11012016_2"; 
 
mysql_connect('sigacitcg.com.mx','sigacitc','Itcg11012016_2') or die("No se pudo conectar a la base de datos");
//mysql_connect('localhost','root','') or die("No se pudo conectar a la base de datos");
//SELECCIONAMOS LA BASE DE DATOS CON LA CUAL VAMOS A TRABAJAR CAMBIEN EL VALOR POR LA SUYA
mysql_select_db('sigacitc_cursosdesacadCP');
mysql_query("SET NAMES UTF8");
$CURSO=$_POST['c'];


$qry="Select * from tbl_documentos3 where titulo='$CURSO' and contenido!=''";

//$qry="Select * from tbl_documentos where titulo='$CURSO'";


$res=mysql_query($qry) or die(mysql_error()." qry::$qry");
$obj=mysql_fetch_object($res);
if($obj=="")
{
	?>
    
    <html>
		
		<meta charset="UTF-8">
		<!--<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" /> 	-->
		<header>
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	

<?php
echo "<form action='get.php' method='post'>";
echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#0037FF' ;>";
echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/icono_empleado.png' >";
echo "</td>";
echo "<td>";
echo "<center>";
echo "<h2>";
echo "NO SE ENCUENTRA EL ARCHIVO";
echo "</h2>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "</form>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
?>

<br>
<br>
	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
	</body>
</html>

<?php

	
	}
	else
	{
		
//OBTENEMOS EL TIPO MIME DEL ARCHIVO ASI EL NAVEGADOR SABRA DE QUE SE TRATA

header("Content-type: {$obj->tipo}");
//OBTENEMOS EL NOMBRE DEL ARCHIVO POR SI LO QUE SE REQUIERE ES DESCARGARLO

header('Content-Disposition: attachment; filename="'.$obj->nombre_archivo.'"');

 

//Y PO ULTIMO SIMPLEMENTE IMPRIMIMOS EL CONTENIDO DEL ARCHIVO

print $obj->contenido;

 
}
//CERRAMOS LA CONEXION
mysql_close();
?>