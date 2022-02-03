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
		<form action="contraseñafinal.php" method="post" class="login"> 
			<h1>INTRODUZCA SU NÚMERO DE SIE</h1>
			<div>
				<input type="text" name="usuario"    onkeypress="ValidaSoloNumeros()"  maxlength="4" required type="text" id="usuario" placeholder="No. Empleado" />
			</div>
			
			<div>
				<input type="submit" value="BUSCAR" />
                
<a href="login.php">Regresar</a>				
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
</body>
  
    <script src="js/index.js"></script>

</body>
</html>
