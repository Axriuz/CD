<html>
		
		
	<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMÁN
		<hr height: 10px; > 
		</center>
	</header>
	
	<body>
		<article>
		<BR>
<BR>
<center><h2>INFORMACIÓN DEL CURSO</h2></center>
<BR>
<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>

<tr>
<td>
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

$bd_seleccionada = mysqli_select_db($con,'sigacitc_cursosdesacadCP');
mysqli_query($con,"SET NAMES UTF8");
*/
require('con.php');
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
<form id="test_upload" name="test_upload" action="RegistroCurso.php" enctype="multipart/form-data" method="post">
<CENTER>
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


FICHA TÉCNICA

<input type="file" name="infcompleta" size="17"  required >			

<BR>
<BR>



<?php

if ($conta =! 0)
{
echo "INCLUIR CURRICULUM VITAE PERSONAL";
echo "&nbsp";
echo "&nbsp";
echo "&nbsp";
echo "&nbsp";
echo "&nbsp";
echo "&nbsp";
echo "&nbsp";
echo "&nbsp";
echo "&nbsp";
echo "&nbsp";
echo "&nbsp";
echo "&nbsp";
echo "&nbsp";
echo "&nbsp";
		echo "&nbsp";
echo "&nbsp";
echo "&nbsp";
echo "&nbsp";
echo "&nbsp";
echo "&nbsp";
echo "&nbsp";
echo "&nbsp";
echo "&nbsp";
echo "&nbsp";
echo "&nbsp";
echo "&nbsp";
echo "<input type='file' name='cvp' size='17' required >";
echo "<br>";
		echo "<br>";
}
ELSE
{}

?>

<BR>
<BR>
<BR>
<CENTER>
<H3>DOCENTE INSTRUCTOR ADICIONAL</H3>
<BR>
</CENTER>

SIE INSTRUCTOR ADICIONAL 
<input type="text" name="sieadc" size="10"  onkeypress="ValidaSoloNumeros()"  maxlength="4"> 
 INCLUIR CV DE INSTRUCTOR ADICIONAL 


<input type="file" name="cvadc" size="17"   >	


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
<input type="submit" name="enviar" value="REGISTRAR CURSO"  style= 'BORDER:  #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'> 

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
	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
			</article>				
				
				
	</body>
</html>
