<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
error_reporting(0);
header('Content-Type: text/html; charset=UTF-8');  
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];
require ('_con.php');
$consulta_mysql="select * from  maestro where `Emp` =  $usuario";
$resultado_consulta_mysql=mysqli_query($con,$consulta_mysql);

	while($fila=mysqli_fetch_array($resultado_consulta_mysql)){
	
	if ($fila[10] == 1 &&  $fila[0] != $fila [8]){		}
	else {  
		echo '<script language="javascript">alert(" Actualizar Datos Por Favor");</script>'; 
	}
	
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<link rel="stylesheet" href="css_da/menu_css.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css_da/menu_css.css" />
</head>
	<body>	
		<!--Header -->
		<nav class="navbar navbar-expand-sm bg-light navbar-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">
			<img src="../Img/educacion.png" alt="Avatar Logo" style="width:600px;" > 
			</a>
		</div>
		<div class="container-fluid">
			<a class="navbar-brand" href="#">
			<img src="../Img/itcg.png" alt="Avatar Logo" style="width:105px; height:129px;"> 
			</a>
		</div>
		</nav> 
		<!--Fin header -->
		<!--Menu desarrollo docente-->
		<nav class="navbar navbar-expand-lg navbar-light bg-#1b396a" style="background-color: #1b396a;">
				<a class="navbar-brand" href="Menu.php" style="color: #ffffff;"><i class="bi bi-house-fill"></i></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #fff;">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item">
					<a class="nav-link" href="CambioNip.php"style="color: #ffffff;">MODIFICAR CONTRASEÑA</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="ModificarDatos.php" style="color:#ffffff;">MODIFICAR DATOS</a>
					</li>
					<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
						CURSOS
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="InscribirCurso.php">INSCRIBIR CURSO</a>
						<a class="dropdown-item" href="ConsultarCursos.php">CONSULTAR CURSOS</a>
						<a class="dropdown-item" href="asistenciacurso.php">ASISTENCIA CURSOS</a>
						<a class="dropdown-item" href="calificacioncurso.php">CALIFICACIÓN CURSOS</a>
						<!--<a class="dropdown-item" href="conscurso.php">GENERAR CONSTANCIA</a>-->
					</div>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="ReporteCursosMaestros.php" style="color:#ffffff;">REPORTE DE CURSOS</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="constancia1.php" style="color:#ffffff;">CONSULTAR CONSTANCIAS</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="encuesta1.php" style="color:#ffffff;">REALIZAR ENCUESTAS</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="../Logout.php" style="color:#ffffff;">CERRAR SESIÓN</a>
					</li>
				</ul>
			</div>
		</nav>
		<!--Fin Menu desarrollo docente-->
		<br>
		<div class="datos">
			<table class="table1" width="100%" border="3"  bordercolor='#245c4f' >
				<tr>
					<td>
						<?php
							$consulta_mysql="select *,(select ma.curso from maestro m inner join matriculas ma on m.emp = ma.emp where m.Emp = '$usuario' limit 1) curso from maestro where Emp = '$usuario' 
							";
							$resultado=mysqli_query($con,$consulta_mysql);
							mysqli_query($con,"SET NAMES UTF8");
							echo "<table width='100%' border='1' bordercolor='#000000'> \n"; 
							$CADENA="";
							while ($row = mysqli_fetch_row($resultado))
							{
							echo "<tr><td  WIDTH=285 HEIGHT= 30 bgcolor='#1b396a'><h5><FONT COLOR='#ffffff'>NÚMERO DE EMPLEADO</td> 
							<td  WIDTH=285 HEIGHT= 30 bgcolor=' #666666'><h5><FONT COLOR='#ffffff'>$row[0]</td></tr><tr>
							<td  WIDTH=285 HEIGHT= 30 bgcolor='#1b396a'><h5><FONT COLOR='#ffffff'>NOMBRE</td>
							<td  WIDTH=285 HEIGHT= 30 bgcolor=' #666666'><h5><FONT COLOR='#ffffff'>$row[1] $row[17] $row[18] </td></tr><tr>
							<td  WIDTH=285 HEIGHT= 30 bgcolor='#1b396a'><h5><FONT COLOR='#fcfcfd'>SEXO</td>
							<td  WIDTH=285 HEIGHT= 30 bgcolor=' #666666'><h5><FONT COLOR='#ffffff'>$row[2] </td></tr><tr>
							<td  WIDTH=285 HEIGHT= 30 bgcolor='#1b396a'><h5><FONT COLOR='#fcfcfd'>RFC</td>
							<td  WIDTH=285 HEIGHT= 30 bgcolor=' #666666'><h5><FONT COLOR='#ffffff'>$row[3]</td></tr><tr>
							<td  WIDTH=285 HEIGHT= 30 bgcolor='#1b396a'><h5><FONT COLOR='#fcfcfd'>ÁREA</td>
							<td  WIDTH=285 HEIGHT= 30 bgcolor=' #666666'><h5><FONT COLOR='#ffffff'>$row[4]</td></tr><tr>
							<td  WIDTH=285 HEIGHT= 30 bgcolor='#1b396a'><h5><FONT COLOR='#fcfcfd'>PUESTO</td>
							<td  WIDTH=285 HEIGHT= 30 bgcolor=' #666666'><h5><FONT COLOR='#ffffff'>$row[5]</td></tr><tr>
							<td  WIDTH=285 HEIGHT= 30 bgcolor='#1b396a'><h5><FONT COLOR='#fcfcfd'>CORREO ELECTRÓNICO</td>
							<td  WIDTH=285 HEIGHT= 30 bgcolor=' #666666'><h5><FONT COLOR='#ffffff'>$row[6]</td></tr><tr>
							<td  WIDTH=285 HEIGHT= 30 bgcolor='#1b396a'><h5><FONT COLOR='#fcfcfd'>TELÉFONO</td>
							<td  WIDTH=285 HEIGHT= 30 bgcolor=' #666666'><h5><FONT COLOR='#ffffff'>$row[7]</td></tr><tr>
							<td  WIDTH=285 HEIGHT= 30 bgcolor='#1b396a'><h5><FONT COLOR='#fcfcfd'>MATRICULADO(A) A:</td>
							";
							$consulta_mysql1="select Curso from matriculas inner join curso on curso.nombre=matriculas.Curso where (Emp =  $usuario and curso.validado=1 and curso.activo=1)";
							$resultado1 = mysqli_query($con,$consulta_mysql1);
							$UNO=0;
							$DOS="";
							while ($row1 = mysqli_fetch_row($resultado1)){
								//echo "".$UNO."-".$CADENA=$CADENA=$row1[$UNO]."<br>";
								//$UNO=$UNO+1;
								// echo "<td>$row1[0]"."\n"."$row1[1]</td> \n"; 
								$DOS=$DOS."<br> $row1[0]"."<br> "."$row1[1] <br> ";
							}
							echo "<td WIDTH=285 bgcolor=' #666666'><FONT COLOR='#ffffff'>".mb_strtoupper($DOS, "UTF-8")."</td>"; 
							} 
							// echo "<td>".$DOS."</td> \n"; 
							//echo '<td  WIDTH=285 bgcolor="#0037FF"><FONT COLOR="#fcfcfd">MATRICULADO(A) A:</td><td  WIDTH=285 bgcolor=" #c6e4ff">'.$CADENA.'</td>'; 	
							echo "</tr>\n</table> \n";
							?>
					</td>
				</tr>
			</table>
		</div>
<br>
<br>	
<!-- Footer -->
<footer class="mt-auto" style="background-color:#1b396a; color:white;">
  <div class="footer-copyright text-center py-3">
		Avenida Tecnológico #100. Ciudad Guzmán, Mpio. de Zapotlán el Grande, Jalisco, México.
		<br>
		Teléfono: 01 (341) 575 20 50
		<br>
		Fax: 01 (341) 575 20 74
  </div>
</footer>
<!-- Footer -->	
</body>
</html>
