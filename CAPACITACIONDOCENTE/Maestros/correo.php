<html>
 <?php
$mail = "Prueba de mensaje";
//Titulo
$titulo = "PRUEBA DE TITULO";
//cabecera

//Enviamos el mensaje a tu_dirección_email 
$bool = mail('jrodriguez@duxstar.com.mx',$titulo,$mail);
if($bool){
    echo "Mensaje enviado";
}else{
    echo "Mensaje no enviado";
}
@mail("jrodriguez@duxstar.com.mx","titulo","mail");

?>

 </html>