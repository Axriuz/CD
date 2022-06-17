<?php
error_reporting(0);
$curso = $_POST["cursos"]; 
require('_con.php');
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
ob_start();
?>
<img src="arribatodo.JPG" alt="Smiley face" align="middle">';
<style>
#myimg{
    position:absolute;
    bottom:40px;
}
#apDiv6 {
	position: absolute;
	width: 704px;
	height: 91px;
	z-index: 6;
	left: 0px;
	top: 1px;
	background-image: url(arribatodo.JPG);
}
</style>
<img id="myimg1" src="arribatodo.JPG">



<div id="apDiv6"></div>
<?php 
$sql="select Emp,ApellidoP,ApellidoM,Nombre,Contrasena from maestro order by ApellidoP,ApellidoM,Nombre"; 
 mysqli_query($con,"SET NAMES 'utf8'");

$resSql=mysqli_query($con,$sql); 
?>
<center>
<h3>
<br>
</h3>
<br>
<br>
<h3>
<?php $curso ?>
</h3>
CLAVES Y PASWORDS DE DOCENTES
</center>
<br>
<br>
	<table border= "1" cellspacing="0" cellpadding="0" width="100%" height="100%">
	<tr>
	<td WIDTH="5">
	<center>
	<strong>
	No.
	</strong>
	</center>
	</td>
	<td WIDTH="70">
	<center>
	<strong>
	NOMBRE
	</strong>
	</center>
	</td>
	<td WIDTH="30">
	<center>
	<strong>
	CLAVE
	</strong>
	</center>
	</td>
	<td WIDTH="50">
	<center>
	<strong>
	PASSWORD
	</strong>
	</center>
	</td>
	</tr>
	<?php
	$contador=1;
	while ($dato=mysqli_fetch_row($resSql))
	{	
	echo '<tr>';
	echo  '<td WIDTH="5">';
	echo '<center>';
	echo $contador;
	echo '</center>';
	echo '</td>';
	echo '<td WIDTH="70">';
	echo utf8_decode($dato[1])." ".utf8_decode($dato[2])." ".utf8_decode($dato[3]);

	echo '</td>';
	echo'<td WIDTH="30">';
	echo utf8_decode($dato[0]);

	echo '</td>';
	echo '<td WIDTH="50">';
	echo utf8_decode($dato[4]);
	echo '</td>';
	
	echo '</tr>';
	$contador=$contador+1;
	
}
?>
<br>

<br>


<br>
<br>

<strong>
</strong>
<br>
	

</table>


<img id="myimg" src="piep.JPG" alt="Smiley face" align="middle">';
<?php
$html = ob_get_clean();
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled'=>true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4", "portrait');
$dompdf->render();
$dompdf->stream("RELACIÓN DE DOCENTES-CLAVES.pdf",array("Attachment"=>false));

 ?>
