<html>
		
		<!---->
		
		<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
    
    
    
    
<style>
table {
  text-align: center;
}


</style>

        <div class="igridbox igridheader">
            <div class="iheader">
<div class = borde></div>
<div class = bordeArriba></div>
 <div class = header>

    <CENTER>

 
    </CENTER>

 </div>
 </div>
  </div>



<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de 
require('con.php');


$curso=$_REQUEST['cursos'];

$consulta_mysqli="select * from cursoRH where Nombre='$curso';";

$resultado_consulta_mysqli=mysqli_query($con,$consulta_mysqli);
  echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";


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

				
			
		
		
		$consulta_mysqliD="select Area from PersonalRH where Emp='$fila[Instructor]';";
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
<br>
	<a href='MOD.php'><IMG SRC='../Img/menu.png' WIDTH=150 HEIGHT=45>	 </a>";

}
//else

//echo "No existe!"; 
//echo "<a href='Menu.php'>Regresar</a>";
//}

//}





?>
 
</html>