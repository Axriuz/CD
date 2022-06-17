<?php

    error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
    session_start();
    
    if(!isset($_SESSION['usuario'])) 
    {
      header('Location: ../index.html'); 
      exit();
    }
    $usuario =$_SESSION['usuario'];

    ob_start();
    $Curso = $_POST["curso"];
    require('_con.php');
    error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<title>Pdf del curso</title>
    <style type="text/css"> 
		body{	
			align-items: center;
            text-align: center;
            font-family: Arial; font-size: 11pt; font-style: normal;
		}
        td{
            font-family: Arial; font-size: 11pt; font-style: normal;
            align-items: center;
            text-align: center;
        }
        header {
                position: fixed;
                top: -0.5cm;
                left: 1.5cm;
                right: 1.5cm;
                height: 1cm;
                font-family: Arial; font-size: 11pt; font-style: normal;
                text-align: center;
                line-height: 0.5cm;
            }

        footer {
            position: fixed; 
            bottom: 0cm; 
            left: 0cm; 
            right: 0cm;
            height: 1cm; 
            font-family: Arial; font-size: 11pt; font-style: normal;
            text-align: center;
            line-height: 1.5cm;
        }
        .pagenum:before {
            content: counter(page);
        }
        .datos{
            position: fixed;
            left: 1.5cm;
            right: 1.5cm;
            font-family: Arial; font-size: 11pt; font-style: normal;
        }
	</style> 
</head>	
<body>
    <header>
        <table width='100%' border='2' bordercolor='#000000'>
            <tr>
                <td colspan="3">
                    <b>T E C N O L Ó G I C O &nbsp; N A C I O N A L  &nbsp;   D E   &nbsp;  M É X I C O</b>
                    <br>
                    I N S T I T U T O  &nbsp;  T E C N O L Ó G I C O  &nbsp;  DE  &nbsp;  C D. G U Z M Á N
                </td>
            </tr>
            <tr>
                <td rowspan="3" width = '15%'>
                    <img class="" src="../Img/itcg.png" width="50" height="65"/>
                </td>
                <td rowspan="3" width = '60%'>
                    <b>Nombre del documento:  </b> Lista de asistencia del curso <?php echo $Curso; ?>.&nbsp; 
                    <br>
                    <b>Referencia de la norma: </b>ISO 9001:2015  7.2 &nbsp;
                </td>
                <td><b>Código: ITCG-AC-PO-003-04 </b></td>
            </tr>
            <tr>
                <td><b>Revisión: 1</b></td>
            </tr>
            <tr>
                <td>Pág. <span class="pagenum"></span></td>
            </tr>
        </table>
    </header>
    <footer>
        Toda copia en PAPEL es un <b>"Documento No Controlado"</b> a excepción del original.
    </footer>	
    <main>
        <br><br><br><br><br>
        Subdirección Académica <br>
        Departamento de Desarrollo Académico<br>
        LISTA DE ASISTENCIA PARA CURSO PRESENCIAL<br>
        <?php
            echo "Nombre del curso: "."&nbsp;&nbsp;"."<b><u>".$Curso."</u></b>";
            echo "<br>";
            $Cursod = mysqli_query($con, "SELECT * FROM `curso` WHERE Nombre = '$Curso'");
            while($consulta = mysqli_fetch_array($Cursod)){
                $Emp = $consulta['Instructor'];
                $Empd = mysqli_query($con, "SELECT * FROM `maestro` WHERE Emp = '$Emp'");
                while($consulta2 = mysqli_fetch_array($Empd)){
                    echo "NOMBRE DEL/DE LA INSTRUCTOR(A): "."&nbsp;&nbsp;&nbsp;&nbsp;";
                    echo "<b><u>".$consulta2['Nombre']." ".$consulta2['ApellidoP']." ".$consulta2['ApellidoM']."</u></b>";
                }
                echo "<br>";
                echo "PERIODO: "."&nbsp;&nbsp;&nbsp;&nbsp;"."<b><u>".$consulta['Periodo']."</u></b>";
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                echo "DURACIÓN: "."&nbsp;&nbsp;&nbsp;&nbsp;"."<b><u>".$consulta['Duracion']."</u></b>";
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                echo "HORARIO: "."&nbsp;&nbsp;&nbsp;&nbsp;"."<b><u>".$consulta['Horario']."  - ".$consulta['Horario1']."</u></b>";
                echo "<br>";
                echo "SEDE: "."&nbsp;&nbsp;&nbsp;&nbsp;"."<b><u>".$consulta['Sede']."</u></b>";
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                echo "PLANTEL: "."&nbsp;&nbsp;&nbsp;&nbsp;"."<b><u>".$consulta['Tec']."</u></b>";
            } 
        ?>
        <br><br>
        <div class="datos" style = "page-break-after: always;">
            <table width='100%' border='2' bordercolor='#000000' >
            <tr>
            <td rowspan="2">No</td>
            <td rowspan="2" colspan="3">NOMBRE DEL PARTICIPANTE</td>
            <td rowspan="2">RFC</td>
            <td rowspan="2">PUESTO Y ÁREA DE ADSCRIPCIÓN </td>
            <!--<td colspan="2">NIVEL DEL PUESTO</td> -->
            <td colspan="5">ASISTENCIA</td>
            </tr>
            <tr>
                <!--<td>P</td>
                <td>F</td>-->
                <td>L</td>
                <td>M</td>
                <td>M</td>
                <td>J</td>
                <td>V</td>
            </tr>
            <?php
            
            $cont = 1;
            $cont2 = 1;
            $sql="select m.ApellidoP,m.ApellidoM,m.Nombre,m.Rfc,m.Puesto,m.Area,ALU,AMA,AMI,AJU,AVI,Asistencia from maestro m inner join matriculas a on m.Emp = a.Emp where a.curso = '$Curso' order by m.ApellidoP";
            $resultado = mysqli_query($con,$sql);
            while ($row = mysqli_fetch_row($resultado)){
                if($cont2 == 13){
                    $cont2 = 1;
                    echo "</table>";
                    echo "</div>";
                    echo "
                    <br><br><br><br><br><br><br>
                    <div class='datos' style = 'page-break-after: always;'>
                    <table width='100%' border='2' bordercolor='#000000' >
                    ";

                }
                    echo "<tr>";
                    echo "<td>"."$cont"."</td>";
                    echo "<td>"."$row[0]"."</td>";
                    echo "<td>"."$row[1]"."</td>";
                    echo "<td>"."$row[2]"."</td>";
                    echo "<td>"."$row[3]"."</td>";
                    echo "<td>"."$row[4]"." en "."$row[5]"."</td>";
                    echo "<td>"."$row[6]"."</td>";
                    echo "<td>"."$row[7]"."</td>";
                    echo "<td>"."$row[8]"."</td>";
                    echo "<td>"."$row[9]"."</td>";
                    echo "<td>"."$row[10]"."</td>";
                    echo "</tr>";
                    $cont = $cont + 1;
                    $cont2 = $cont2 + 1;
            } 
            
            ?>

    </main>
</body>
</html>
<?php
$html = ob_get_clean();
//echo $html;
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled'=>true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('letter','landscape');
$dompdf->render();
$dompdf->stream("pdfcurso.pdf",array("Attachment"=>false));
?>