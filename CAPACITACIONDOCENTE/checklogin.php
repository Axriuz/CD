<?php
 session_start(); 
 ?> 
<!DOCTYPE html> 
 <html lang="en"> 
 <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
  <title>Login</title> 
   
</head> 
<body> 

 <?php 
 
 
$host= "sigacitcg.com.mx"; 
$user = "sigacitc"; 
$pass= "Itcg11012016_2"; 

$con=mysqli_connect("$host","$user","$pass","sigacitc_cursosdesacadCP");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit;
}
$bd_seleccionada = mysqli_select_db($con,'sigacitc_cursosdesacadCP');
mysqli_query($con,"SET NAMES UTF8");

$username = $_POST['usuario']; 
$password = $_POST['password']; 

$sqlRH= "SELECT * FROM PersonalRH WHERE Emp = '$username' and Contrasena = '$password'"; 
$resultRH=mysqli_query($con,$sqlRH); 
$countRH = mysqli_num_rows($resultRH);

$sql1RH= "SELECT Tipo_Usuario FROM PersonalRH WHERE Emp = '$username'"; 
$resRH = mysqli_query($con,$sql1RH);
$resultadoRH = mysqli_fetch_row($resRH);

$sql= "SELECT * FROM maestro WHERE Emp = '$username' and Contrasena = '$password'"; 
$result=mysqli_query($con,$sql); 
$count = mysqli_num_rows($result); 


$sql1= "SELECT Tipo_Usuario FROM maestro WHERE Emp = '$username'"; 
//$sql1= "SELECT Tipo_Usuario FROM maestro WHERE Emp = '$username' and Tipo_Usuario IS NULL"; 
$res=mysqli_query($con,$sql1);
$resultado = mysqli_fetch_row($res);
//print_r ($resultado[0]);
//$count1 = mysqli_num_rows($resultado); 
echo $countRH;
echo $count;
print_r ($resultadoRH[0]);
print_r ($resultado[0]);

if($count == 1){ 
 $_SESSION['loggedin'] = true; 
 $_SESSION['usuario'] = $username; 
 $_SESSION['start'] = time(); 
 $_SESSION['expire'] = $_SESSION['start'] + (9999999 * 99999999) ; 



	
		if($resultado[0] == null) 
			{header('Location: Maestros/Menu.php'). $_SESSION['usuario'];
			}
		else if($resultado[0] == 1)
			{
				header('Location: Desarrollo_Academico/Menu.php'). $_SESSION['usuario'];
			}
	}
	
else if($countRH == 1){
    $_SESSION['loggedin'] = true; 
    $_SESSION['usuario'] = $username; 
    $_SESSION['start'] = time(); 
    $_SESSION['expire'] = $_SESSION['start'] + (9999999 * 99999999) ; 

		if($resultadoRH[0] == 1) 
			{header('Location: RecursosHumanos/Menu.php'). $_SESSION['usuario'];
			}
			else if($resultadoRH[0] == null)
			{
				header('Location: PersonalRH/Menu.php'). $_SESSION['usuario'];
			}
    
}
else { 
	header('Location: index.html');
 		}
?> 


</body> 
</html> 
