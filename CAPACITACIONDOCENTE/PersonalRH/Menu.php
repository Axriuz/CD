<html>
<style type="text/css"> 
.table1 {
  border: #497f43 4px solid;
}
.table2 {
  border: #497f43 2px solid;
}
ul, li {
	list-style: none;
}

a:link
{
text-decoration:none;
}
</style> 

<link rel="stylesheet" href="css_da/menu_css.css" />
	<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNOLÓGICO DE CD. GUZMÁN
		<hr height: 10px; > 
		</center>
	</header>

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
/*
$host= "sigacitcg.com.mx"; 
$user = "sigacitc"; 
$pass= "Itcg11012016_2"; 
 
$con=mysqli_connect("$host","$user","$pass","sigacitc_cursosdesacadCP");
 if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
   exit;
 }
mysqli_query($con,"SET NAMES UTF8");
 */
 
 require ('con.php');
	$consulta_mysql="select * from  PersonalRH where `Emp` =  $usuario";
	$resultado_consulta_mysql=mysqli_query($con,$consulta_mysql);

		while($fila=mysqli_fetch_array($resultado_consulta_mysql)){
		
		if ($fila[10] == 1 &&  $fila[0] != $fila [8])
		{		}
		else 
		{  
	echo '<script language="javascript">alert(" Actualizar Datos Por Favor");</script>'; 
	//	//echo '<script language="javascript">alert("Para un mejor uso de la plataforma se recomienda actualizar sus datos y contraseña");</script>'; 
	}
		
		}
	

?>

 

	<body>
		
		
		
		
		<table class="table1" width="100%" border="0" cellpadding="5" bordercolor="#0037FF">
<tr>
<td><span style="COLOR: #000000; align="center">	
		<div id="menu">  
			<ul class="bandera1">   
				<li><a href="CambioNip.php" style="color:#ffffff;">MODIFICAR CONTRASEÑA</a></li>
				
				<li><a href="ModificarDatos.php" style="color:#ffffff;">MODIFICAR DATOS</a></li>
				
				<li>CURSOS 
					<ul>
						<li><a href="InscribirCurso.php" style="color:#ffffff;">PROPONER CURSO</a></li>
						<li><a href="ConsultarCursos.php" style="color:#ffffff;">CONSULTAR CURSOS</a></li>
					</ul></li>
					
					<li><a href="ReporteCursosMaestros.php" style="color:#ffffff;">REPORTE DE CURSOS</a></li>
				
				<li><a href="constancia1.php" style="color:#ffffff;">CONSULTAR CONSTANCIAS</a></li>

				<li><a href="encuesta1.php" style="color:#ffffff;">REALIZAR ENCUENTAS</a></li>	 

				<li><a href="../Logout.php" style="color:#ffffff;">CERRAR SESIÓN</a></li>
				<br>
				<br>
			</ul>
		</div>
		
	<?php	
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
	
	
	
	
	$consulta_mysql="select * from  PersonalRH where `Emp` =  $usuario";
	$resultado_consulta_mysql=mysqli_query($con,$consulta_mysql);

		while($fila=mysqli_fetch_array($resultado_consulta_mysql)){
		
		if ($fila[12] == 1)
		{echo "<a href='validar.php'><IMG SRC='../Img/valida.png' WIDTH=230 HEIGHT=45></a>	 ";
		echo "<br>";
		echo "<br>";
		
		}
		}
	
?>

		</span>	
</td>
<td>
<hr width="1" size="300">

</td>
<td>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
error_reporting(E_ALL ^ E_NOTICE);

$consulta_mysql="select *,(select ma.curso from PersonalRH m inner join matriculasRH ma on m.emp = ma.emp where m.Emp = '$usuario' limit 1) curso from PersonalRH where Emp = '$usuario' 
";
$resultado=mysqli_query($con,$consulta_mysql);


 mysqli_query($con,"SET NAMES 'utf8_encode'");
 echo "<table   border='1' align='center'   CELLPADDING=5 CELLSPACING=0 bordercolor='#ffffff'> \n"; 
$CADENA="";
 while ($row = mysqli_fetch_row($resultado))
{
echo "<tr><td  WIDTH=285 bgcolor='#497f43'><FONT COLOR='#fcfcfd'>NÚMERO DE EMPLEADO</td> <td  WIDTH=285 bgcolor=' #aeadb3'>$row[0]</td></tr><tr><td  WIDTH=285 bgcolor='#497f43'><FONT COLOR='#fcfcfd'>NOMBRE</td><td  WIDTH=285 bgcolor=' #aeadb3'>$row[1] $row[17] $row[18] </td></tr><tr><td  WIDTH=285 bgcolor='#497f43'><FONT COLOR='#fcfcfd'>SEXO</td><td  WIDTH=285 bgcolor=' #aeadb3'>  $row[2] </td></tr><tr><td  WIDTH=285 bgcolor='#497f43'><FONT COLOR='#fcfcfd'>RFC</td><td  WIDTH=285 bgcolor=' #aeadb3'>$row[3]</td></tr><tr><td  WIDTH=285 bgcolor='#497f43'><FONT COLOR='#fcfcfd'>ÁREA</td><td  WIDTH=285 bgcolor=' #aeadb3'>$row[4]</td></tr><tr><td  WIDTH=285 bgcolor='#497f43'><FONT COLOR='#fcfcfd'>PUESTO</td><td  WIDTH=285 bgcolor=' #aeadb3'>$row[5]</td></tr><tr><td  WIDTH=285 bgcolor='#497f43'><FONT COLOR='#fcfcfd'>CORREO ELECTRÓNICO</td><td  WIDTH=285 bgcolor=' #aeadb3'>$row[6]</td></tr><tr><td  WIDTH=285 bgcolor='#497f43'><FONT COLOR='#fcfcfd'>TELÉFONO</td><td  WIDTH=285 bgcolor=' #aeadb3'>$row[7]</td></tr><tr><td  WIDTH=285 bgcolor='#497f43'><FONT COLOR='#fcfcfd'>MATRICULADO(A) A:</td>

";
$consulta_mysql1="select Curso from matriculasRH inner join cursoRH on cursoRH.nombre=matriculasRH.Curso where (Emp =  $usuario and cursoRH.validado=1 and cursoRH.activo=1)";




$resultado1 = mysqli_query($con,$consulta_mysql1);
$UNO=0;
$DOS="";
 while ($row1 = mysqli_fetch_row($resultado1))
{
	//echo "".$UNO."-".$CADENA=$CADENA=$row1[$UNO]."<br>";
	//$UNO=$UNO+1;
	// echo "<td>$row1[0]"."\n"."$row1[1]</td> \n"; 
	 $DOS=$DOS."<br> $row1[0]"."<br> "."$row1[1] <br> ";

}
 echo "<td WIDTH=285 bgcolor=' #aeadb3'>".mb_strtoupper($DOS, "UTF-8")."</td>"; 

} 
// echo "<td>".$DOS."</td> \n"; 
//echo '<td  WIDTH=285 bgcolor="#0037FF"><FONT COLOR="#fcfcfd">MATRICULADO(A) A:</td><td  WIDTH=285 bgcolor=" #c6e4ff">'.$CADENA.'</td>'; 	

echo "</tr>\n</table> \n";



?>

<div id="capa"></div>

</td>
</tr>
</table>
			
	
					
<br>
<br>	

	</body>
</html>
