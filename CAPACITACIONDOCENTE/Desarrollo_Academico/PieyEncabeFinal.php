<?php  
$encabezado = $_FILES['encabezado']['name'];
$pie = $_FILES['pie']['name'];

$ruta_Serv=$_SERVER['DOCUMENT_ROOT']. '/CAPACITACIONDOCENTE/Desarrollo_Academico/';

//$rename=rename($encabezado, "arribatodo.JPG");

//SUBIR ENCABEZADO
if (file_exists('arribatodo.JPG')) {
    
    $success = unlink('arribatodo.JPG');
    
    if (!$success) {
         throw new Exception("Cannot delete");
    }
}

move_uploaded_file($_FILES['encabezado']['tmp_name'],$ruta_Serv.'arribatodo.JPG');


//SUBIR PIE
if (file_exists('piep.JPG')) {
    
    $success = unlink('piep.JPG');
    
    if (!$success) {
         throw new Exception("Cannot delete");
    }
}
move_uploaded_file($_FILES['pie']['tmp_name'],$ruta_Serv.'piep.JPG');

echo'<script type="text/javascript">
        alert("Subida exitosa!");
        window.location.href="PieyEncabe.php";
        </script>';
?>