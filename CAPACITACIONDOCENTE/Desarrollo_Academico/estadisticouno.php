<?php
    ob_start();
    $anio = $_POST["anio"]; 
    $p= $_POST["periodo"];
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
                    <b>Nombre del documento:  </b> Formato del curso 
                    <b>
                    <?php 
                      echo "Año: "."&nbsp;".$anio."&nbsp;&nbsp;&nbsp;"."Periodo:"."&nbsp;&nbsp;&nbsp;".$p;  
                    ?> 
                    </b>.&nbsp; 
                    <br>
                    <b>Referencia de la norma: </b> ISO 9001:2015  7.2 &nbsp;
                </td>
                <td><b>Código:</b></td>
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
        <?php 
            $sql1="select count(T1.Id_matricula) from matriculas T1 inner join curso T2 ON T2.Nombre=T1.Curso WHERE T2.Periodo='".$p."' and year(CursoInicio)=".$anio." and TipoCurso='Formacion Docente'";

            $sql1F="select count(T1.Id_matricula) from matriculas T1 inner join curso T2 ON T2.Nombre=T1.Curso inner join maestro T3 on T3.Emp=T1.Emp WHERE T2.Periodo='".$p."' and year(CursoInicio)=".$anio." and TipoCurso='Formacion Docente' and Sexo='Femenino'";    
            $sql1M="select count(T1.Id_matricula) from matriculas T1 inner join curso T2 ON T2.Nombre=T1.Curso inner join maestro T3 on T3.Emp=T1.Emp WHERE T2.Periodo='".$p."' and year(CursoInicio)=".$anio." and TipoCurso='Formacion Docente' and Sexo='Masculino'";
                
                //  select count(T1.Id_matricula) from matriculas T1 inner join curso T2 ON T2.Nombre=T1.Curso WHERE T2.Periodo='Enero - Mayo' and year(CursoInicio)=2017 and TipoCurso='Formacion Docente'
            $sql2="select count(T1.Id_matricula) from matriculas T1 inner join curso T2 ON T2.Nombre=T1.Curso WHERE T2.Periodo='".$p."' and year(CursoInicio)=".$anio." and TipoCurso='Actualizacion Profesional'";
            $sql2F="select count(T1.Id_matricula) from matriculas T1 inner join curso T2 ON T2.Nombre=T1.Curso inner join maestro T3 on T3.Emp=T1.Emp WHERE T2.Periodo='".$p."' and year(CursoInicio)=".$anio." and TipoCurso='Actualizacion Profesional' and Sexo='Femenino'";
            $sql2M="select count(T1.Id_matricula) from matriculas T1 inner join curso T2 ON T2.Nombre=T1.Curso inner join maestro T3 on T3.Emp=T1.Emp WHERE T2.Periodo='".$p."' and year(CursoInicio)=".$anio." and TipoCurso='Actualizacion Profesional' and Sexo='Masculino'";
            
            $resSql1=mysqli_query($con,$sql1); 
            $resSql1F=mysqli_query($con,$sql1F); 
            $resSql1M=mysqli_query($con,$sql1M);
            
            $resSql2=mysqli_query($con,$sql2); 
            $resSql2F=mysqli_query($con,$sql2F); 
            $resSql2M=mysqli_query($con,$sql2M);
        ?>

        <div class="datos">
            <table width='100%' border='2' bordercolor='#000000' >
            <tr>
              <td colspan="2"><center><strong>Formación y Actualizacion Profesional</strong></center></td>
            </tr>
            <tr>
              <td width="90%">Mujeres</td>
              <td width="90%">
                <?php 
                  while ($dato2F=mysqli_fetch_row($resSql2F)){
                    echo'<center>'.'ACTUALIZACIÓN: '.'</center>';
                        echo'<center>'.$dato2F[0].'</center>';
                  }
                  while ($dato1F=mysqli_fetch_row($resSql1F)){
                    echo'<center>'.'FORMACION: '.'</center>';
                        echo'<center>'.$dato1F[0].'</center>';
                  }
                ?>
                </td>
                </tr>
                <tr>
                  <td width="90%">Hombres</td>
                  <td width="90%">
                    <?php 
                      while ($dato2M=mysqli_fetch_row($resSql2M)){
                        echo'<center>'.'ACTUALIZACIÓN: '.'</center>';
                        echo '<center>'.$dato2M[0].'</center>';
                      }
                      while ($dato1M=mysqli_fetch_row($resSql1M)){
                        echo'<center>'.'FORMACION: '.'</center>';
                        echo '<center>'.$dato1M[0].'</center>';
                      }
                    ?>
                    </td>
                    </tr>
                    <tr>
                    <td width="90%"><strong>TOTAL: </strong>
                    </td>
                    <td width="90%">
                    <?php 
                      while ($dato2=mysqli_fetch_row($resSql2)){
                        echo'<center>'.'ACTUALIZACIÓN: '.'</center>';
                          echo '<center>'.$dato2[0].'</center>';
                      }
                      while ($dato1=mysqli_fetch_row($resSql1)){
                        echo'<center>'.'FORMACION: '.'</center>';
                        echo '<center>'.$dato1[0].'</center>';
                    }
                                
                    ?>
                    </td>
                  </tr>
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