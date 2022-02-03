<html>
		 
	<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<center>Tecnológico Nacional de Máxico
		<br>
		INSTITUTO TECNOLÓGICO DE CD. GUZMÁN
		<hr height: 10px; > 
		</center>
	</header>
<body>

<?
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
function fechaesp($date) {
    $dia = explode("-", $date, 3);
    $year = $dia[0];
    $month = (string)(int)$dia[1];
    $day = (string)(int)$dia[2];
    
    $dias = array("domingo","lunes","martes","mi&eacute;rcoles" ,"jueves","viernes","s&aacute;bado");
    $tomadia = $dias[intval((date("w",mktime(0,0,0,$month,$day,$year))))];
 
    $meses = array("", "enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
    
    return $tomadia.", ".$day." de ".$meses[$month]." de ".$year;
}


header('Content-Type: text/html; charset=UTF-8');  

session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}

$usuario =$_SESSION['usuario'];
$curso = $_POST['curso']; 

//echo "uno ".$usuario;

//echo "dos ".$curso;

/*
$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysqli_connect($host,$user,$pass);
$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
mysqli_query($con,"SET NAMES UTF8");
*/

require('con.php');

$consultaprimero="select Emp from matriculas where Emp='$usuario' and Curso='$curso'";
$prueba1=mysqli_query($con,$consultaprimero); 
$dato122=mysqli_fetch_row($prueba1);

if($dato122[0]!="") 
{echo "<center>";
echo "<h3>";
echo "<font size=4>";
echo "<br><br><br><br><br>";
	echo "YA TE MATRICULASTE AL CURSO ";
	echo "<br><br><br>";
	echo "".$curso;
	echo "<br><br><br>";
	 echo "ANTERIORMENTE";	
	echo "</font></h3>";
echo "</center>";
}
else
{


$hora="select CursoInicio,cast(curso.Horario as TIME),cast(curso.Horario1 as TIME) from curso where Nombre='$curso'";
//echo "1-".$hora;
$hora1=mysqli_query($con,$hora); 
$hora2=mysqli_fetch_row($hora1);
$horaq="select * from matriculas 
inner join curso on curso.Nombre=matriculas.Curso
inner join maestro on maestro.Emp=matriculas.Emp
where curso.Nombre!='Elaboración de Protocolos de investigación Educativa' AND
CursoInicio='$hora2[0]' and 
cast(curso.Horario as TIME) BETWEEN '$hora2[1]' and '$hora2[2]'
AND matriculas.Emp='$usuario'";
//echo "2-".$horaq;
$hora1q=mysqli_query($con,$horaq); 
$hora2q=mysqli_fetch_row($hora1q);

if($hora2q[0]!="" && $hora2q[1]!="") 
{
		 echo "No es posible registrarte en el curso dado a que se cruza con otro curso al que estás registrado";

	/*$r="select Id_matricula from matriculas where Emp='$usuario' and Curso='$hora2q[2]'";
    echo "2-".$r;
    $r1=mysqli_query($con,$r); 
    $r2=mysqli_fetch_row($r1);
	if($r2[0]!="") 
       {
 echo "No es posible registrarte en el curso dado a que se cruza con otro curso al que estás registrado";
	   }
	   else
	   {
 echo "so es posible registrarte en el curso dado a que se cruza con otro curso al que estás registrado";
	   }*/
}
else

{
$consulta_mysqli="select * from curso c inner join maestro m on c.instructor = m.emp where c.Nombre = '$curso'";
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
$resultado=mysqli_query($con,$consulta_mysqli);

if($row = mysqli_fetch_row($resultado)) {

	echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";


echo "<tr>";
echo "<td>";
echo "<center>";
echo "<h3>";
echo "DATOS DEL CURSO";
echo "</h3>";
echo "</center>";

echo "<form method='post' action='matricularse.php'>";
echo "<center>";
echo " <input type ='text'  size= '40'   style='visibility:hidden'  name='c1' value='$curso'>";
echo "<br>";
echo "CURSO : <input type ='text' disabled='disabled' size= '45' name='curso' value='".$row[0]."'/>";
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo "INSTRUCTOR : <input type ='text' disabled='disabled' size= '45' name='Emp' value='".$row[29]." ".$row[45]." ".$row[46]."'/>";
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo "SEDE:  <input type ='text' disabled='disabled'  size= '35' name='Nombre' value='". $row[7] ."'/>";
echo "<br>";
echo "<br>";
echo "PERIODO:  <input type ='text' disabled='disabled'  size= '25' name='Nombre' value='". $row[1] ."'/>";
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";
echo "HORARIO:  <input type ='text' disabled='disabled'  size= '25' name='Nombre' value='".$row[5]. ' -a- ' .$row[6]."'/>";
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";

//$consulta_mysqli1="SELECT DATE_FORMAT(`CursoInicio`,'%d-%m-%Y') FROM `curso` where Nombre='$curso'";

//$resultado1=mysqli_query($con,$consulta_mysqli1);

//if($row1 = mysqli_fetch_row($resultado1)) {
echo "FECHA: del <input type ='text' disabled='disabled' size= '30'  value='".fechaesp($row[3])." '/>

al
 <input type ='text' disabled='disabled' size= '30' value='".fechaesp($row[4])."'/>";

//echo "";
$date = "2010-04-02";
//echo fechaesp($date);

echo "</center>";
//}

echo "<br>";
echo "<br>";
echo "<CENTER>";
echo "OBJETIVO:  <input type ='text' style='visibility:hidden' disabled='disabled'  size= '1'  value='". $row[8] ."'/>";
echo "<br>";
echo"<textarea name='message' disabled='disabled' cols='115' rows='7'>". $row[8] ."</textarea>";
echo "<br>";
echo "<br>";
echo "INTRODUCCIÓN:  <input type ='text' style='visibility:hidden' disabled='disabled'  size= '1'  value='". $row[14] ."'/>";
echo "<br>";
echo"<textarea name='message' disabled='disabled' cols='115' rows='7'>". $row[14] ."</textarea>";
echo "<br>";
echo "<br>";
echo "JUSTIFICACIÓN:  <input type ='text' style='visibility:hidden' disabled='disabled' size= '1'  value='". $row[15] ."'/>";
echo "<br>";
echo"<textarea name='message' disabled='disabled' cols='115' rows='7'>". $row[15] ."</textarea>";
echo "<br>";
echo "<br>";
echo "DESCRIPCIÓN:  <input type ='text' style='visibility:hidden' disabled='disabled' size= '1'  value='". $row[16] ."'/>";
echo "<br>";
echo"<textarea name='message' disabled='disabled' cols='115' rows='7'>". $row[16] ."</textarea>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<input type='Submit' name='enviar' value='MATRICULARSE' style='BORDER: #a5273f 2px solid; BACKGROUND-COLOR: #a5273f; COLOR: #FCFCFD;'>";
echo "</center>";
}

}





 echo "</form> ";
   
  echo " </td>";
echo "</tr>";
echo "</table>";
}
?>

<br>
	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>	
	</body>
</html>




