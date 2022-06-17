<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli
session_start();

if(!isset($_SESSION['usuario'])) 
{
  header('Location: ../index.html'); 
  exit();
}
$usuario =$_SESSION['usuario'];

require('_con.php');
$diplo = $_POST['diplomado'];
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia Diplomados</title>
    <link rel="stylesheet" href="css_da/menu_css.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
      table,tr,th,td{
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
                    <b>Nombre del documento:  </b> Asistencia del diplomado 
                    <?php 
                      if($diplo == "DiplomadoCompetenciasDocentes")
                        echo "Diplomado para la Formación y Desarrollo de Competencias Docentes"; 
                      else if($diplo == "DiplomadoTutores")
                        echo "Diplomado para la Formación de Tutores";
                      else if($diplo == "DiplomadoVirtualesAprendizaje")
                        echo "Diplomado en Recursos Educativos en Ambientes Virtuales de Aprendizaje";
                      else
                        echo "Diplomado en Educación Inclusiva";
                    ?> 
                    .&nbsp; 
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
    <br><br><br><br><br>
    <div class="datos" style = "page-break-after: always;">
      <center>
      
      <br>
      <table width='100%' border='2'  bordercolor='#245c4f'>
        <th>No.</th>
        <th>Participante</th>
        <th>Puesto</th>
        <?php 
          $cont = 1;
          $cont2 = 1;
          $cons = mysqli_query($con, "SELECT * FROM diplomados d INNER JOIN maestro m ON d.Emp=m.Emp WHERE $diplo != '0000-00-00  '");
          while($consulta = mysqli_fetch_array($cons)){
            if($cont2 == 13){
              $cont2 = 1;
              echo "</table>";
              echo "</div>";
              echo "
              <br><br><br><br><br>
              <div class='datos' style = 'page-break-after: always;'>
              <table width='100%' border='2' bordercolor='#000000' >
              ";
          }
            echo "<tr>";
            echo "<td>$cont</td>";
            echo "<td>".$consulta['Nombre']." ".$consulta['ApellidoP']." ".$consulta['ApellidoM']."</td>";
            echo "<td>".$consulta['Puesto']."</td>";
            echo "</tr>";
            $cont = $cont + 1;
            $cont2 = $cont2 + 1;
          }
        ?>
      </center>
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