<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css_da/menu_css.css" />
	<style type="text/css"> 
		body{
			font: 1em "Cambria", Georgia, bold, serif;		
		}
	</style> 
</head>	
	<!--Header -->
	<nav class="navbar navbar-expand-sm bg-light navbar-light">
	<div class="container-fluid">
		<a class="navbar-brand" href="#">
		<img src="../Img/educacion.png" alt="Avatar Logo" style="width:600px;" class="rounded-pill"> 
		</a>
	</div>
	<div class="container-fluid">
		<a class="navbar-brand" href="#">
		<img src="../Img/itcg.png" alt="Avatar Logo" style="width:105px; height:129px;" class="rounded-pill"> 
		</a>
	</div>
	</nav> 
	<!--Fin header -->	
<body>

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
$host= "localhost"; 
$user = "root"; 
$pass= ""; 
 
 $con=mysqli_connect("$host","$user","$pass","sigacitc_cursosdesacadCP");

$bd_seleccionada = mysqli_select_db($con,'sigacitc_cursosdesacadCP');
mysqli_query($con,"SET NAMES UTF8");
*/
require('_con.php');
?>
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
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
                MAESTROS
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="NOMAESTROS.php">NÚMERO DE DOCENTES</a>
                <a class="dropdown-item" href="InscribirMaestro.php">REGISTRAR MAESTROS</a>
                <a class="dropdown-item" href="BorrarMaestro.php">ELIMINAR MAESTRO</a>
				<a class="dropdown-item" href="Principal.php">MODIFICAR CONTRASEÑA DE USUARIOS</a>
              </div>
            </li>
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
                EXTERNOS
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<a class="dropdown-item" href="AgregarExt.php">REGISTRAR PERSONAL EXTERNO</a>
				<a class="dropdown-item" href="BorrarExt.php">ELIMINAR PERSONAL EXTERNO</a>
				<a class="dropdown-item" href="AddCursoExt.php">PROPONER CURSO EXTERNO</a>
				<a class="dropdown-item" href="DeleteCursoExt.php">ELIMINAR CURSO EXTERNO</a> 
              </div>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="CambioJefe.php" style="color:#ffffff;">JEFES DE DEPARTAMENTO</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="actcontancias.php" style="color:#ffffff;">ACTUALIZAR CONSTANCIAS</a>
            </li>
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
                REPORTES
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			  	<a class="dropdown-item" href="encuestaCurso.php">GENERAR ENCUESTAS DE CURSOS</a>
				<a class="dropdown-item" href="instructorSelect.php">GENERAR ENCUESTAS DE EVALUACIÓN DE INSTRUCTORES</a>
				<a class="dropdown-item" href="listas.php">GENERAR REPORTES</a>
				<a class="dropdown-item" href="PieyEncabe.php">MODIFICAR PIE Y ENCABEZADO DE REPORTES</a>
              </div>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="Evaluar.php" style="color:#ffffff;">EVALUACIÓN DE INSTRUCTORES</a>
            </li>
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
                CURSO
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			  	<a class="dropdown-item" href="asistencia1.php">LISTAS DE ASISTENCIA</a>
				<a class="dropdown-item" href="seleccionar_anio_curso.php">ACTIVAR CURSO</a>
				<a class="dropdown-item" href="desactivar.php">DESACTIVAR CURSO</a>
				<a class="dropdown-item" href="MOD.php">MODIFICAR CURSO</a>
				<a class="dropdown-item" href="consulcur.php">CONSULTAR DATOS DEL CURSO</a>
				<a class="dropdown-item" href="BorrarMaestroCurso.php">ELIMINAR MAESTRO DEL CURSO</a>
				<a class="dropdown-item" href="GETCV.php">DESCARGAR INFORMACIÓN DE CURSO</a>
              </div>
            </li>
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
                DIPLOMADOS
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			 	<a class="dropdown-item" href="InscrDiplo.php">INSCRIPCION A DIPLOMADOS</a>
				<a class="dropdown-item" href="ConsulDiplo.php">CONSULTA DE DIPLOMADOS</a>
				<a class="dropdown-item" href="asisdiplo.php">ASISTENCIA DIPLOMADOS</a>
              </div>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="respaldos.php" style="color:#ffffff;">BACKUP</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="../Logout.php" style="color:#ffffff;">CERRAR SESIÓN</a>
            </li>
          </ul>
        </div>
      </nav>

	  <!--Fin Menu desarrollo docente-->
	  <br>
	  <article>


<center><h2>INFORMACIÓN DEL CURSO</h2></center>
<BR>
<table width='100%' border='7' cellpadding=30 CELLSPACING=30  bordercolor='#245c4f' ;>

<tr>
<td>
<?php

if ($_POST){
//Incrementamos el valor
$conta = $_POST["conta"] + 1;
}
else{
//Valor inicial
$conta = 0;
}

//Se valida que el usuario tenga sus datos actualizados y completos de lo contrario manda un alert para que lo haga 
//y no permite que registre un curso, regresa el menu principal. 
 	$consulta_mysql="select * from  maestro where `Emp` =  $usuario";
	$resultado_consulta_mysql=mysqli_query($con,$consulta_mysql);

		while($fila=mysqli_fetch_array($resultado_consulta_mysql)){
		if ($fila[10] == 1 &&  $fila[0] != $fila [8])
		{
			
		}
		else
		{	
			echo '<script language="javascript">alert("Para un mejor uso de la plataforma se recomienda actualizar sus datos y contraseña");</script>'; 
			header('Location: Menu.php'). $_SESSION['usuario'];	
		}
		}

?>	
	
<!--Formulario Registro de Curso-->
<form id="test_upload" name="test_upload" action="RegistroCursoExt.php" enctype="multipart/form-data" method="post">
		<CENTER>
			<br>
		INSTITUTO TECNOLÓGICO O CENTRO ESPECIALIZADO QUE PROPONE 
		<br>
		<input type="text" name="tec" size="63" required>

		<BR>			
		<BR>
		NOMBRE DEL CURSO
		<br>
		<input type="text" name="curso" size="80" required >
		<!--
		<form name="f1" action="<?=$_SERVER["PHP_SELF"]?>" method="post">
		<input type="hidden" name="conta" value="<?=$conta?>">
		<input type="submit" value="Incrementar">
		</form>
		-->
		<BR>			
		<BR>
		PERIODO    
		<select name='periodo'  required>
		<option value='Enero - Mayo'    >Enero - Mayo</option>
		<option value='Junio - Agosto'  >Junio - Agosto</option>
		<option value='Septiembre - Diciembre' >Septiembre - Diciembre</option>
		</select>
		<br>
		<br>
		FECHAS CURSO  
		<input type="DATE" name="INICURSO" size="15" required >  A 
		<input type="DATE" name="FINCURSO" size="15" required >	
		HORARIO
		<input type="time" name="horario" size="15" required >   A  
		<input type="time" name="horario1" size="15" required >	
		<BR>
		<BR>
		DURACIÓN  
		<select name='duracion'  required>
		<option value='1 Semana'    >1 Semana</option>
		<option value='2 Semanas'  >2 Semanas</option>
		<option value='Durante el semestre'  >Durante el semestre</option>
		</select>
		<BR>			
		<BR>
		TIPO DE CURSO
		<select name='TipoCurso' required>
		<option value='Actualizacion Profesional' selected>Actualizacion Profesional</option>
		<option value='Formacion Docente'  >Formacion Docente</option>
		</select>
		<BR>			
		<BR>
		¿A QUIÉN VA DIRIGIDO?
		<BR>
		<input type="text" name="dir" size="75" >	
		<BR>			
		<BR>
		SEDE
		<input type="text" name="sede" size="75" required >	
		<BR>			
		<BR>
		</CENTER>
		<BR>
		<BR>
		</center>
		<BR>
		<center>
		<H3>DETALLES DEL CURSO</H3>
		Introducción
		<BR>
		<textarea cols="115" rows="7" name="introduccion" required ></textarea> 
		<BR>
		<BR>
		<BR>
		Objetivo General
		<BR>
		<textarea maxlength="200" cols="115" rows="7" name="objetivo" required ></textarea> 
		<BR>
		<BR>
		<BR>
		Justificación
		<BR>
		<textarea maxlength="200" cols="115" rows="7" name="justificacion" required ></textarea> 
		<BR>
		<BR>
		<BR>
		Descripción del Curso
		<BR>
		<textarea cols="115" rows="7" name="descripcion" required ></textarea> 
		<BR>
		<BR>
		<BR>
		Resultados
		<BR>
		<textarea cols="115" rows="7" name="resultados" required ></textarea> 
		<BR>
		<BR>
		<BR>
		Fuentes de Información
		<BR>
		<textarea cols="115" rows="7" name="fuentes" required ></textarea> 
		<BR>
		<BR>
		<BR>
		</CENTER>
		<!-- 


		MATERIAL DID�CTICO QUE SE USARA EN EL CURSO


		<input type="file" name="material" id="material" size="17"  >	
		<BR>
		<BR>
		-->

		<?php
		$consulta_inst='select emp,nombre from maestro where Tipo_Usuario= 2';
		$resultado_consulta_inst=mysqli_query($con,$consulta_inst);
		echo "<center>";
		echo 'Intructor externo ';
		echo "<select name='instructor'>";
		while($fila=mysqli_fetch_array($resultado_consulta_inst)){
		
			echo " <option value='".$fila['emp']."'>".$fila['nombre']."</option>";

		}
		echo "</select>";

		?>



		<script language="javascript">


		function ValidaSoloNumeros() {
		if ((event.keyCode < 48) || (event.keyCode > 57)) 
		event.returnValue = false;
		}


		function txNombres() {
		if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
		event.returnValue = false;
		}
		//Valida que el maestro no este ya inscrito enun curso en el mismo periodo
		</script> 
		<BR>			
		<BR>
		<BR>			
		<BR>
		<CENTER>
		<input type="submit" name="enviar" value="REGISTRAR CURSO" > 

		<FORM>

		<!--<input name="button2" type="button" 
		onclick='alert("CURSO CARGADO SATISFACTORIAMENTE.")' value="Click Aqu� para ver el ALERTA" />
		</FORM>
		-->
		</CENTER>
		</td>
		</tr>
		</table>
   </form> 
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
