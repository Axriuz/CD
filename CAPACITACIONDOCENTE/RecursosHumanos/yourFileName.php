<?php
/*
function display()
{
    echo "hello ".$_POST["studentname"];
}
if(isset($_POST['submit']))
{
   display();
} 

*/
function PromptDemo() 
{
$clave=$_POST["numero"];

confirmar=confirm("Seguro que deseas eliminar el registro12  "); 

if (confirmar) 
{
window.location.href="BajaMaestro.php?numero="+$clave
}
else 
{
alert('Cancelado');
} 



}
?>

