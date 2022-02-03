<html>
		<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<style type="text/css"> 
ul, li {
	list-style: none;
	color:#a5273f;
}

a:link
{
text-decoration:none;
color:#a5273f;
}

</style> 
</head> 
		
		<header>
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	

<?php

error_reporting(E_ALL ^ E_DEPRECATED); //linea para evitar lista de errores
//header('Content-Type: text/html; charset=UTF-8');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];



?>
<center>
<table width='100%' border='5' cellpadding=10 CELLSPACING=10   bordercolor='#497f43';>


<tr>
  <td width="18%" rowspan="15"><P ALIGN=center STYLE=MARGIN-LEFT: 0.07in><IMG SRC='../Img/conscursos.png' ></td>
  <td width="82%"><strong><strong>
  <li>RELACIÓN
		<ul>
			<li><a href="areadocentes.php">RELACIÓN PERSONAL Y CURSOS POR DEPARTAMENTO (AÑO O PERIODO) </a></li>
			<li><a href="porcentajesDocentes.php">PORCENTAJE DE CUMPLIMIENTO DE CAPACITACIÓN POR DEPARTAMENTO </a></li>
      <li><a href="relacioncursosxperiodoxareas.php">RELACIÓN DE CURSOS Y FECHAS POR DEPARTAMENTO (AÑO O PERIODO)</a></li> 
      <br>
			<li><a href="anioselect.php">RELACIÓN DE DOCENTES QUE LLEVARON CURSOS INTERSEMESTRALES (AÑO O PERIODO)</a></li>
			<li><a href="claves.php">RELACIÓN DOCENTES Y CLAVES</a></li>
  </ul></li> 
  </strong></strong></td>
</tr>
 
<tr>
  <td><strong>
  <li>REPORTES
		<ul>
			<li><a href="docentesxarea.php">REPORTE DE CURSOS POR DOCENTES DE CADA AREA (AÑO O PERIODO)</a></li>
			<li><a href="cursosselec.php">REPORTE CONCENTRADO DE CURSOS</a> </li>
      <li><a href="ReporteGral.php">REPORTE GENERAL DE CURSOS POR PERIODO</a> </li>
  </ul></li>
  </strong></td> 
</tr>
 
<tr>
   <td><strong>
   <li>LISTAS
   <ul>
			<li><a href="periodolistas1.php">LISTAS DE DOCENTES QUE RECIBIRAN CONSTANCIA</a></li>
			<li><a href="periodolistas2.php">LISTAS DE DOCENTES CON CONSTANCIAS SIN ELABORAR</a></li>
			<li><a href="periodolistas3.php">LISTAS DE DOCENTES CON CONSTANCIAS ELABORADAS</a></li>
			<li><a href="periodolistas4.php">LISTAS DE DOCENTES CON CONSTANCIAS ENTREGADAS</a></li>
			<li><a href="periodolistas5.php">LISTAS DE DOCENTES DE RECIBIDO (FIRMAS)</a></li>
			<li><a href="listadocentesasistencia.php">LISTAS DE ASISTENCIAS</a></li>
			<li><a href="selectinstruc.php">LISTAS DE INSTRUCTORES</a></li>
    </ul></li> 
   </strong></td>
</tr>

<tr>
   <td><strong>
   <li><a href="evalaniooperi.php">ESTADO DE MAESTROS POR CURSO (EVALUACIÓN DEL CURSO)</a> 
   </li>
   </strong></td>
</tr>

<tr>
   <td><strong>
   <li><a href="estadistica.php">ESTADISTICAS MUJERES Y HOMBRES EN ACTUALIZACIÓN PROFESIONAL Y FORMACIÓN DOCENTE</a> 
   </li>
   </strong></td>
</tr>

<tr>
   <td><strong>
   <li>LISTAS MAESTROS TIEMPO COMPLETO
   <ul>
			<li><a href="actualizacion_profesional.php">PARTICIPARON EN ACTUALIZACIÓN PROFESIONAL</a></li>
			<li><a href="formacion_docente.php">PARTICIPARON EN FORMACION DOCENTE CON POSTGRADO</a></li>
    </ul></li> 
   </strong></td>
</tr>
            </table>
            
            </center>    

<br>
<br>
	<strong><a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a> </strong></body>
</html>