<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css_da/menu_css.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
function PromptDemo() 
{
$clave=document.f1.numero.value ;


confirmar=confirm("Seguro que deseas eliminar el registro1  "+$clave); 

  if (confirmar) 
  {

  window.location.href="BajaMaestro.php?numero="+$clave
  }

  else 
  {
  alert('Cancelado Regresando a Menú');
  window.history.back();
  } 
}
</script>
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
	

<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}

$usuario =$_SESSION['usuario'];

/*$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $conexion);
mysql_query("SET NAMES UTF8");
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
<?php
echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";

//echo "<form action='BajaMaestro.php' method='post' name= 'f1' id = 'f1' >";
echo '<form action="BajaMaestro.php" method="post" name= "f1" id = "f1" >';

echo "<tr>";
echo "<td>";
echo "<P ALIGN=center STYLE=MARGIN-LEFT: 0.07in>";
echo"<IMG SRC='../Img/eliminar_maestro2.PNG' >";
echo "</td>";
echo "<td>";
echo "<center>";
echo "<br><h3>BAJA DE MAESTROS</h3>";
echo "<br>";
echo "<br>";

echo "Ingrese los 4 digitos corresondientes al número de SIE del maestro a eliminar:";
echo "<br>";
echo '<input type=password name="numero1" onkeypress="return valida(event)" maxlength="4" >';
echo "<br>";
echo "<br>";
echo "Confirmar número de SIE del maestro a eliminar:";
echo "<br>";
echo '<input type=password name="numero" onkeypress="return valida(event)"  maxlength="4">';
echo "<br>";
echo "</center>";

?>

<SCRIPT LANGUAGE=JavaScript>
 function compara() 
{ 
$clave=document.f1.numero.value ;



if (document.f1.numero.value != document.f1.numero1.value) {
alert('Las contraseña no son identicas, por favor reintente.');
return false; } 

 if($clave.length < 4){
      alert('La clave debe contener 4 caracteres');
      return false;
   }
   
 
return true 

}

//}
</SCRIPT>
<script>
function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>

<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
echo "<br>";
echo "<br>";
echo "<center>";
echo "<input type='submit' name='Submit' onClick='return compara()' value='ELIMINAR MAESTRO' >"; 
echo "</center>";
echo "</form>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";

?>

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
