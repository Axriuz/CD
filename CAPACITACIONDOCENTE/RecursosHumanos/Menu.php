<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
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
<!--Menu principal Desarrollo Academico -->
</head> 
		
		<link rel="stylesheet" href="css_da/menu_css.css" />
	<header class="hd">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNOLÓGICO DE CD. GUZMÁN
		<hr height: 10px; > 
		</center>
	</header>


<?php

session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
    
}
$usuario =$_SESSION['usuario'];

/*$host_db = "sigacitcg.com.mx"; 
$user_db = "sigacitc";
$pass_db = "Itcg11012016_2";

 
$conexion=mysqli_connect($host_db,$user_db,$pass_db,'sigacitc_cursosdesacadCP');
$bd_seleccionada = mysqli_select_db($conexion,'sigacitc_cursosdesacadCP');
mysqli_query($conexion,"SET NAMES UTF8");
*/
?>
	<body>
<table class="table1" width="100%" border="0" cellpadding="2" CELLSPACING=10  bordercolor='#0037FF' >
<tr>

<td><span style="COLOR: #000000; align="center">		
		

 <div id="menu">        
		<ul class="bandera1">    
				<li><a href="CambioNip.php" style="color:#ffffff;">MODIFICAR CONTRASEÑA</a></li> 
				<li>PERSONAL RH
					<ul>
						<li><a href="NOMAESTROS.php" style="color:#ffffff;">NÚMERO DE PERSONAL</a></li> 
						<li><a href="InscribirMaestro.php" style="color:#ffffff;">REGISTRAR PERSONAL</a></li> 
						<li><a href="BorrarMaestro.php" style="color:#ffffff;">ELIMINAR PERSONAL</a></li> 
						<li><a href="Principal.php" style="color:#ffffff;">MODIFICAR CONTRASEÑA DE USUARIOS</a></li> 
						<li><a href="RegistroRHCurso.php" style="color:#ffffff;">MATRICULAR PERSONAL EN CURSO</a></li> 
					</ul></li>
					<li>EXTERNOS 
					<ul>
						<li><a href="AgregarExt.php" style="color:#ffffff;">REGISTRAR PERSONAL EXTERNO</a></li> 
						<li><a href="BorrarExt.php" style="color:#ffffff;">ELIMINAR PERSONAL EXTERNO</a></li> 
					</ul></li>
				<li><a href="CambioJefe.php" style="color:#ffffff;">JEFES DE DEPARTAMENTO</a></li> 
				<li><a href="actcontancias.php" style="color:#ffffff;">ACTUALIZAR CONSTANCIAS</a></li>
				
				<li>REPORTES 
					<ul>
					    <li><a href="encuestaCurso.php" style="color:#ffffff;">GENERAR ENCUESTAS DE CURSOS</a></li> 
					    <li><a href="instructorSelect.php" style="color:#ffffff;">GENERAR ENCUESTAS DE EVALUACIÓN DE INSTRUCTORES</a></li>
						<li><a href="listas.php" style="color:#ffffff;">GENERAR REPORTES</a></li> 
						<li><a href="PieyEncabe.php" style="color:#ffffff;">MODIFICAR PIE Y ENCABEZADO DE REPORTES</a></li> 
					</ul></li>
				<li><a href="Evaluar.php" style="color:#ffffff;">EVALUACIÓN DE INSTRUCTORES</a></li>                   
				<li>CURSO
					<ul class="bandera2">
						<li><a href="asistencia1.php" style="color:#ffffff;">LISTAS DE ASISTENCIA</a></li>
						<li><a href="seleccionar_anio_curso.php" style="color:#ffffff;">REGISTRAR CURSO</a></li> 
						<li><a href="desactivar.php" style="color:#ffffff;">DESACTIVAR CURSO</a></li> 
						<li><a href="MOD.php" style="color:#ffffff;">MODIFICAR CURSO</a></li> 
						<li><a href="BorrarMaestroCurso.php" style="color:#ffffff;">ELIMINAR MAESTRO DEL CURSO</a></li> 
					</ul></li>
				<li><a href="respaldos.php" style="color:#ffffff;">BACKUP</a></li>                 
				<li><a href="../Logout.php" style="color:#ffffff;">CERRAR SESIÓN</a></li>             
		</ul>
        
  </div>

</td>
<td>
<hr width="1" size="850">

</td>
<td>
		
<table class="table2" width="100%" border="0" cellpadding="0">
<tr>
<td><span style="COLOR: #000000; align="center">		
<center>
<IMG SRC="../Img/itcg.jpg" WIDTH=700 HEIGHT=370 >
<center>
</td>
</tr>
</table>
		


</td>
</tr>
</table>
		
		</span>				


	</body>
</html>
