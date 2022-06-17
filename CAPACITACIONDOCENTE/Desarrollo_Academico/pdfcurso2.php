<?php
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
                    <b>Nombre del documento:  </b> Formato del curso <?php echo $Curso;?> .&nbsp; 
                    <br>
                    <b>Referencia de la norma: </b> ISO 9001:2015  7.2 &nbsp;
                </td>
                <td><b>Código: ITCG-AC-PO-003-02</b></td>
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
        <br><br><br><br><br><br><br>
        <div class="datos">
            <table width='100%' border='2' bordercolor='#000000' >
            <tr>
            <td>Nombre del curso</td>
            <td>Objetivo</td>
            <td>Periodo de realización</td>
            <td>Lugar</td>
            <td>Duración</td>
            <td>Instructor(a)</td>
            <td>Dirigido a</td>
            <td>Observaciones</td>
            </tr>
            <?php
            echo "<tr>";
            echo "<td>";
            echo $Curso;
            echo "</td>";
            $Cursod = mysqli_query($con, "SELECT * FROM `curso` WHERE Nombre = '$Curso'");
            while($consulta = mysqli_fetch_array($Cursod)){
              echo "<td>".$consulta['Objetivo']."</td>";
              echo "<td>"."De ".$consulta['CursoInicio']." a ".$consulta['CursoFin']."</td>";
              echo "<td>".$consulta['Sede']."</td>";
              echo "<td>".$consulta['Duracion']."</td>";
              $Emp = $consulta['Instructor'];
              $Empd = mysqli_query($con, "SELECT * FROM `maestro` WHERE Emp = '$Emp'");
              while($consulta2 = mysqli_fetch_array($Empd)){
                echo "<td>".$consulta2['Nombre']." ".$consulta2['ApellidoP']." ".$consulta2['ApellidoM']."</td>";
              }
              echo "<td>".$consulta['dirigido_a']."</td>";
              echo "<td>".$consulta['Resultados']."</td>";
            }
            echo "</tr>";
            ?>
            </table>
        </div>
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