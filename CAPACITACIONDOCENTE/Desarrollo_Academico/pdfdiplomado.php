<?php
    ob_start();
    $Emp = $_POST["Nombre"];
    require('_con.php');
    error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diplomados por docente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<style type="text/css"> 
		body{	
			align-items: center;
            text-align: center;
            font-family: Arial; font-size: 11pt; font-style: normal;
		}
        td,th{
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
                    <b>Nombre del documento:  </b> Diplomados tomados por el maestro .&nbsp; 
                    <br>
                    <b>Referencia de la norma: </b> ISO 9001:2015  7.2 &nbsp;
                </td>
                <td><b>Código: </b></td>
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
        <br><br><br><br><br><br>

        <div class="datos">
        <table width='100%' border='2' bordercolor='#000000'>
          <tr>
            <td>
            <?php 
              $Empd = mysqli_query($con, "SELECT * FROM `maestro` WHERE Emp = '$Emp'"); 
              $numero_filas = mysqli_num_rows($Empd);
              if($numero_filas == 0){
                  echo "<h1>No existe el docente</h1>";
              }   
              while($consulta = mysqli_fetch_array($Empd)){#Imprime los datos del docente
                
                echo "CLAVE DEL DOCENTE: "."&nbsp;"."<b><u>".$Emp."</u></b><br>";
                echo "NOMBRE DEL DOCENTE: "."&nbsp;"."<b><u>".$consulta['Nombre']." ".$consulta['ApellidoP']." ".$consulta['ApellidoM']."</u></b><br>";
                echo "DEPARTAMENTO: "."&nbsp;"."<b><u>".$consulta['Area']."</u></b><br>";
                echo "RFC: "."&nbsp;"."<b><u>".$consulta['Rfc']."</u></b><br>";
                echo "PUESTO: "."&nbsp;"."<b><u>".$consulta['Puesto']."</u></b><br>";
              }
            ?>
            </td>
          </tr>
        </table>
        </div>
        <br><br><br><br><br><br>
        <?php
        $Empd = mysqli_query($con, "SELECT * FROM `diplomados` INNER JOIN maestro ON diplomados.Emp=maestro.Emp WHERE diplomados.Emp = '$Emp'");
        while($consulta = mysqli_fetch_array($Empd)){#Imprime los datos del docente
            echo "<div class='datos'>";
            echo "<table width='100%' border='2' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";
            echo "<tr>";
            echo "<th>";
            echo "<b>Diplomado</b>";
            echo "</th>";
            echo "<th>";
            echo "<b>Fecha de terminación</b>";
            echo "</th>";
            echo "</tr>";
            echo "<tr>";
            echo "<td style='text-align:center'>Diplomado para la Formación y Desarrollo de Competencias Docentes</td>";
            $dcd = $consulta['DiplomadoCompetenciasDocentes'];
            echo "<td style='text-align:center'>$dcd</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td style='text-align:center'>Diplomado para la Formación de Tutores</td>";
            $dt = $consulta['DiplomadoTutores'];
            echo "<td style='text-align:center'>$dt</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td style='text-align:center'>Diplomado en Recursos Educativos en Ambientes Virtuales de Aprendizaje</td>";
            $dva =$consulta['DiplomadoVirtualesAprendizaje'];
            echo "<td style='text-align:center'>$dva</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td style='text-align:center'>Diplomado en Educación Inclusiva</td>";
            $dei = $consulta['DiplomadoEducacionInclusiva'];
            echo "<td style='text-align:center'>$dei</td>";
            echo "</tr>";
            echo "</center>";
            echo "</table>";
        }
        echo "<br>";
        echo "<br>";
        echo "</form>";
        echo "</div>";
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