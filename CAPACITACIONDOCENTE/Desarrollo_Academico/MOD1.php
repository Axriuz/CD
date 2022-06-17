<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="css_da/menu_css.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<style type="text/css"> 
		body{
			font: 1em "Cambria", Georgia, bold, serif;
			
		}
		table {
			text-align: center;
		}
	</style> 
</head>	
<body>
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
<div class="igridbox igridheader">
<div class="iheader">
<div class = borde></div>
<div class = bordeArriba></div>
 <div class = header>

    <CENTER>

         <!-- <div id= contenedor_cabecera>  -->
          <!-- <div class = "logoleft">
            <div class=logo>
               <!-- <img src=http://www.itcg.edu.mx/imagenes/sep.png title=DGEST height=80px width=150px> -->
            <!--      <img src=Resources/img/sep.png height=80px width=150px>
            </div>
          </div>
<!--
            <div id=cabecera_texto>

                <h1>Tecnológico Nacional de México      </h1>
                <h3>Instituto Tecnológico de Ciudad Guzmán  </h3>

              <img src=Resources/img/header.png height=80px width=350px>
            </div>
-->
            <!--  <div class=logoTexto>

                <img src=Resources/img/header.png height=80px width=350px>
            </div>

            <div class = "logoright">

              <div class=logo><img src=Resources/img/itcg_logo.png title=ITCG height=64px width=58px></div>
            </div>
        <!-- </div>  -->
 
    </CENTER>

 </div>
 </div>
  </div>



<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
/*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
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
	  <br>
<?php
//include('conexion.php');//incluye el archivo php que contiene la conexion
//$con=Conectar();//variable que almacena la conexión ala base de datos

$curso=$_REQUEST['cursos'];

//$query($con,="select * from curso where Nombre='$curso';";
//echo "".$query($con,;
//$cierto=mysqli_query($con,($query($con,,$con);//ejecutando consulta
//mysqli_query($con,("SET NAMES UTF8");

//if(!$cierto){ 
//echo "No existe!"; 
//echo "<form action='Menu.php' method='get'><!---->
        	
//   <button  id='btn-login' type='submit' name='Regresar' value='Buscar'>Regresar</button>
   //         </form>";

//}
//else 
//{
$consulta_mysqli="select * from curso where Nombre='$curso';";
//echo "".$consulta_mysqli;
//$consulta_mysqli='select distinct * from curso where Activo = 1';
$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
  echo "<table width='100%' border='7' cellpadding=30 CELLSPACING=30  bordercolor='#245c4f' ;>";

//<input type='text' name='CursoInicio' value='$fila[CursoInicio]'>
//<input type='text' name='CursoFin' value='$fila[CursoFin]'>
//<input type='text' name='Horario1' value='$fila[Horario1]'>
//<input type='text' name='Horario' value='$fila[Horario]'>
//<input type='text' name='Periodo' value='$fila[Periodo]'>
//			<input type='text' name='Duracion'  value='$fila[Duracion]'>


while($fila=mysqli_fetch_array($resultado_consulta_mysqli))
{
echo "
		    <form action='MOD2.php' method='post'>
	  <tr>
         <td>
		  <input type='hidden' name='Numero' value='$fila[Numero]'>
		  <input type='hidden' name='cursoU' value='$curso'>
				NOMBRE
			<input type='text' size=".(50)." name='Nombre' value='$fila[Nombre]'>
				PERIODO
			
			";
			
			
			if($fila[1]=='Enero - Mayo')
			{
				echo "	<select name='periodo'required>
<option value='Enero - Mayo'   selected >Enero - Mayo</option>
<option value='Junio - Agosto'  >Junio - Agosto</option>
<option value='Septiembre - Diciembre' >Septiembre - Diciembre</option>
</select>";
				}
			if($fila[1]=='Junio - Agosto')
			{echo "	<select name='periodo'  required>
<option value='Enero - Mayo'    >Enero - Mayo</option>
<option value='Junio - Agosto' selected>Junio - Agosto</option>
<option value='Septiembre - Diciembre' >Septiembre - Diciembre</option>
</select>";
				}
			if($fila[1]=='Septiembre - Diciembre')
			{echo "	<select name='periodo' required>
<option value='Enero - Mayo'    >Enero - Mayo</option>
<option value='Junio - Agosto'  >Junio - Agosto</option>
<option value='Septiembre - Diciembre' selected>Septiembre - Diciembre</option>
</select>";
				}
			
		

echo "
				DURACIÓN
			
			";
			if($fila[2]=='1 Semana')
			{
				echo "
			<select name='Duracion'  value='$fila[Duracion]'  required>
<option value='1 Semana'    selected>1 Semana</option>
<option value='2 Semanas'  >2 Semanas</option>
<option value='Durante el semestre'  >Durante el semestre</option>
</select>";
			}
			if($fila[2]=='2 Semanas')
			{
					echo "
			<select name='Duracion'  value='$fila[Duracion]'  required>
<option value='1 Semana'    >1 Semana</option>
<option value='2 Semanas'  selected>2 Semanas</option>
<option value='Durante el semestre'  >Durante el semestre</option>
</select>";
			}
			if($fila[2]=='Durante el semestre')
			{
					echo "
			<select name='Duracion'  value='$fila[Duracion]'  required>
<option value='1 Semana'    >1 Semana</option>
<option value='2 Semanas'  >2 Semanas</option>
<option value='Durante el semestre'  selected>Durante el semestre</option>
</select>";
			}
			
			
			echo "<br><br>TIPO CURSO ";
			if($fila['TipoCurso']=='Actualizacion Profesional')
			{
					echo "
					
			<select name='TipoCurso' value='$fila[TipoCurso]' required>
<option value='Actualizacion Profesional' selected>Actualizacion Profesional</option>
<option value='Formacion Docente'  >Formacion Docente</option>
</select>";
			}
			if($fila['TipoCurso']=='Formacion Docente')
			{
					echo "
					
			<select name='TipoCurso'  value='$fila[TipoCurso]' required>
<option value='Actualizacion Profesional'    >Actualizacion Profesional</option>
<option value='Formacion Docente'  selected>Formacion Docente</option>
</select>";
			}
			if($fila['TipoCurso']=='')
			{
					echo "
					<br>
					<br>No se tiene registro del tipo del curso por favor agregar<br>
					<hr>
			<select name='TipoCurso' value='$fila[TipoCurso]'  required>
<option value='Actualizacion Profesional'>Actualizacion Profesional</option>
<option value='Formacion Docente'>Formacion Docente</option>
</select>";
			}

				
			
		
		
		$consulta_mysqliD="select Area from maestro where Emp='$fila[Instructor]';";
$resultado_consulta_mysqliD=mysqli_query($con,$consulta_mysqliD);
$dir="";
while($filaD=mysqli_fetch_array($resultado_consulta_mysqliD))
{
	$dir=$filaD[0];
}
if($dir!="")
{
	echo "	<br><br>
					<input type='text' name='dirigido' value='".$dir."' size='15' > 
		";
	}
else
{
	echo "	<br><br>
					<input type='text' name='dirigido' value='$fila[dirigido_a]' size='15' > 
		";
	}
		
		
		
		
		echo"
		 </td>
      </tr>
	  
	  
	<tr>
		<td>
			CURSO INICIO
			
			
			<input type='DATE' name='CursoInicio' value='$fila[CursoInicio]' size='15' required > 
			
			CURSO FINAL
				<input type='DATE' name='CursoFin'  value='$fila[CursoFin]' size='15' required > 
		</td>
	</tr>
	
	
	<tr>
		<td>
			HORARIO INICIO
				
				<input type='time' name='horario' value='$fila[Horario]' size='15' required > 
			HORARIO FINAL
				
				<input type='time' name='horario1' value='$fila[Horario1]' size='15' required > 
			SEDE
			<input type='text' size=".(50)." name='Sede' value='$fila[Sede]'>
		</td>
  	</tr>
	
	
	<tr>
		<td>
			OBJETIVO<br>
<br>
<br>
			<textarea rows=".(2)." cols=".(150)." name='Objetivo' '>$fila[Objetivo]</textarea> <br>
<br>
<br>
			INSTRUCTOR COD. SIE
			<input type='text' name='Instructor' value='$fila[Instructor]'>
			LUGAR
			<input type='text' size=".(50)." name='Tec' value='$fila[Tec]'>
		</td>
	</tr>
	
	<tr>
	<td>
INTRODUCCIÓN
<br>
<br>
<br>
<textarea rows=".(10)." cols=".(150)." name='Introduccion'>$fila[Introduccion]</textarea> 

<br>
<br>
<br>
JUSTIFICACIÓN
<br>
<br>
<br>
<textarea rows=".(10)." cols=".(150)." name='Justificacion'>$fila[Justificacion]</textarea> 
<br>
<br>
<br>
DESCRIPCIÓN
<br>
<br>
<br>
<textarea rows=".(10)." cols=".(150)." name='Descripcion'>$fila[Descripcion]</textarea>
<br>
<br>
<br> 
RESULTADOS
<br>
<br>
<br>
<textarea rows=".(10)." cols=".(150)." name='Resultados' >$fila[Resultados]</textarea> 
<br>
<br>
<br>
FUENTES
<br>
<br>
<br>
<textarea rows=".(10)." cols=".(150)." name='Fuentes' >$fila[Fuentes]</textarea> 
<br>
<br>
<br>
INSTRUCTOR 2 
<br>
<br>
<br>
<textarea rows=".(1)." cols=".(15)." name='InsAux' >$fila[InsAux]</textarea> 
";

/*
if($fila[27]=="Actualizacion Profesional")
{
echo "
A
			<select name='Duracion'   required>
<option value='1 Semana'    selected>1 Semana</option>
<option value='2 Semanas'  >2 Semanas</option>
<option value='Durante el semestre'  >Durante el semestre</option>
</select>";
	}
if($fila[27]=="Formacion Docente")
{
	echo "
	F
			<select name='Duracion'   required>
<option value='1 Semana'    selected>1 Semana</option>
<option value='2 Semanas'  >2 Semanas</option>
<option value='Durante el semestre'  >Durante el semestre</option>
</select>";
	}
	else
{
	echo "
	N
			<select name='Duracion'   required>
<option value='1 Semana'    selected>1 Semana</option>
<option value='2 Semanas'  >2 Semanas</option>
<option value='Durante el semestre'  >Durante el semestre</option>
<option value='Durante el semestre'  >Durante el semestre</option>

</select>";
	}
	*/
	
//<textarea rows=".(1)." cols=".(150)." name='TipoCurso' >$fila[TipoCurso]</textarea> 

echo "
</td>
</tr>
<tr>
<td>
<center>

 
 <input type ='submit' name='Modificar' value= 'Modificar'  style='BORDER: #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;' />
 
 
   </center>
   </td>
   </tr>
</form>";
echo "</table>";

echo "
<br>
<br>";

}
//else

//echo "No existe!"; 
//echo "<a href='Menu.php'>Regresar</a>";
//}

//}





?>
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