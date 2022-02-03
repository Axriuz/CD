<?php 
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$idusuario = $_POST['idusuario'];
$token = $_POST['token'];

if( $password1 != "" && $password2 != "" && $idusuario != "" && $token != "" ){
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta name="author" content="denker">
    <title> Restablecer contraseña </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>
    <div class="container" role="main">
      <div class="col-md-2"></div>
      <div class="col-md-8">
<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
	
	$conexion = new mysqli('sigacitcg.com.mx', 'sigacitc', 'Itcg11012016_2', 'sigacitc_cursosdesacadCP');
mysql_query("SET NAMES UTF8");	$sql = " SELECT * FROM tblreseteopass WHERE token = '$token' ";

	$resultado = $conexion->query($consulta);
	if( $resultado->num_rows > 0 ){
		$usuario = $resultado->fetch_assoc();
		if( sha1( $usuario['idusuario'] === $idusuario ) ){
			if( $password1 === $password2 ){
				$sql = "UPDATE maestro SET Contrasena = '".sha1($password1)."' WHERE Emp = ".$usuario['idusuario'];
				$resultado = $conexion->query($sql);
				if($resultado){
					$sql = "DELETE FROM tblreseteopass WHERE token = '$token';";
					$resultado = $conexion->query( $sql );
				?>
					<p> La contraseña se actualizó con exito. </p>
				<?php
				error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
				}
				else{
				?>
					<p> Ocurrió un error al actualizar la contraseña, intentalo más tarde </p>
				<?php
				error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
				}
			}
			else{
			?>
			<p> Las contraseñas no coinciden </p>
			<?php
			error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
			}

		}
		else{
?>
<p> El token no es válido </p>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
		}	
	}
	else{
?>
<p> El token no es válido </p>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
	}
	?>
	</div>
<div class="col-md-2"></div>
	</div> <!-- /container -->
<script src="js/jquery-1.11.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysql
}
else{
	header('Location:login.php');
}
?>