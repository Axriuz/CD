<!DOCTYPE html>
<html >

<head>
  <title>Inicio de sesi&oacuten</title>
</head>
		<meta charset="UTF-8">
        
      <link rel="stylesheet" href="css/style.css">
		
	<header>
	
		<center>Tecnol&oacutegico Nacional de M&eacutexico
		<br>
		INSTITUTO TECN&OacuteLOGICO DE CD. GUZM&AacuteN
		<hr height: 10px; > 
		</center>
	</header>
<body>
  <br><br><br><br>
<br><br>

  <script language="javascript">

function ValidaSoloNumeros() {
 if ((event.keyCode < 48) || (event.keyCode > 57)) 
  event.returnValue = false;
}
function txNombres() {
 if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
  event.returnValue = false;
}

</script> 
<div class="container">
	<section id="content">
		<form action="checklogin.php" method="post" class="login"> 
			<h1>INTRODUZCA SUS DATOS PARA ENTRAR</h1>
			<div>
				<input type="text" name="usuario"    onkeypress="ValidaSoloNumeros()"  maxlength="4" required type="text" id="usuario" placeholder="No. Empleado" />
			</div>
			<div>
				<input type="password"  name="password" required type="password" id="password"  maxlength="10" placeholder="Password" />
			</div>
			<div>
				<input type="submit" value="ENTRAR" />
                
<a href="contraseña.php">Olvidé mi contraseña</a>				
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
</body>
  
    <script src="js/index.js"></script>

</body>
</html>
