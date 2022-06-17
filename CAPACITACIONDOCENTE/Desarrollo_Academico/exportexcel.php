<?php 
    $conexion = mysqli_connect ("localhost", "root", "");
    mysqli_select_db ($conexion, "sigacitc_cursosdesacadcp");
    $curso = $_POST["curso"];
    $sql = "SELECT * from curso c inner join matriculas a  on a.Curso = c.Nombre inner join maestro m   on m.Emp = a.Emp
    where a.curso = '$curso' and a.Calificacion>=70 order by m.ApellidoP; ";

    $resultado = mysqli_query ($conexion, $sql);
    $libros = array();
    while( $rows = mysqli_fetch_assoc($resultado) ) {
    $libros[] = $rows;
    }
    $sql2="select CursoFin from curso where Nombre = '$curso'";
    $resultado2 = mysqli_query($conexion,$sql2);
    mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <table id="" border="1" class="table table-striped table-bordered">
            <tr>
                <th>Nombre</th>
                <th>Curso</th>
                <th>Fecha</th>
            </tr>
            <tbody>
                <?php foreach($libros as $libro) { ?>
                <tr>
                    <td><?php echo $libro ['Nombre']." ".$libro ['ApellidoP']." ".$libro ['ApellidoM']; ?></td>
                    <td><?php echo $curso; ?></td>
                    <td><?php echo $libro ['CursoFin'];?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>
<?php
    if(!empty($libros)) {
        $filename = "$curso".".xls";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);
        $mostrar_columnas = false;
        foreach($libros as $libro) {
            if(!$mostrar_columnas) {
                echo implode("\t", array_keys($libro)) . "\n";
                $mostrar_columnas = true;
                }
            echo implode("\t", array_values($libro)) . "\n";
            }
        }
        else{
            echo'<script languaje="javascript">alert("No hay ningún docente aprobado");history.back();</script>';
        }
    exit;
?>