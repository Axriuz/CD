<html>

<body> 

<?php 
session_start();
if(!isset($_SESSION['usuario'])) 
{
  header('Location: /index.html'); 
  exit();
}
$id = $_POST["id"];

require('con.php');

echo "<div style=text-align:center;>";
echo "<table width='100%' border='5' cellpadding=30 CELLSPACING=30  bordercolor='#497f43' ;>";
echo "<tr>";
echo "<td>";

$res=mysqli_query($con,"SELECT emp,nombre,apellidoP,apellidoM from PersonalRH where emp='".$id."'"); 

if(!$res) {
    echo'<script languaje="javascript">alert("Usuario no existente");history.back();</script>';
}
else{
    $result =mysqli_query($con,"DELETE FROM `PersonalRH` where emp='".$id."'");
    if(!$res) {
    }else{
    echo'<script languaje="javascript">alert("Eliminado con exito");history.back();</script>';
}
}
  
    echo "</td>";
  echo "</tr>";
 echo "</table>";
echo "</div>";
 
?> 

</body>
</html>







