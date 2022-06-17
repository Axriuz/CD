<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Asistencia</title>
    <link rel="stylesheet" href="css_da/menu_css.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
</head>
<body>
    <!--Header -->
		<nav class="navbar navbar-expand-sm bg-light navbar-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">
			<img src="../Img/educacion.png" alt="Avatar Logo" style="width:600px;" > 
			</a>
		</div>
		<div class="container-fluid">
			<a class="navbar-brand" href="#">
			<img src="../Img/itcg.png" alt="Avatar Logo" style="width:105px; height:129px;"> 
			</a>
		</div>
		</nav> 
		<!--Fin header -->
		<!--Menu desarrollo docente-->
		<nav class="navbar navbar-expand-lg navbar-light bg-#1b396a" style="background-color: #1b396a;">
				<a class="navbar-brand" href="Menu.php" style="color: #ffffff;"><i class="bi bi-house-fill"></i></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #fff;">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item">
					<a class="nav-link" href="CambioNip.php"style="color: #ffffff;">MODIFICAR CONTRASEÑA</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="ModificarDatos.php" style="color:#ffffff;">MODIFICAR DATOS</a>
					</li>
					<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;">
						CURSOS
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="InscribirCurso.php">INSCRIBIR CURSO</a>
						<a class="dropdown-item" href="ConsultarCursos.php">CONSULTAR CURSOS</a>
						<a class="dropdown-item" href="asistenciacurso.php">ASISTENCIA CURSOS</a>
						<a class="dropdown-item" href="calificacioncurso.php">CALIFICACIÓN CURSOS</a>
					</div>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="ReporteCursosMaestros.php" style="color:#ffffff;">REPORTE DE CURSOS</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="constancia1.php" style="color:#ffffff;">CONSULTAR CONSTANCIAS</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="encuesta1.php" style="color:#ffffff;">REALIZAR ENCUESTAS</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="../Logout.php" style="color:#ffffff;">CERRAR SESIÓN</a>
					</li>
				</ul>
			</div>
		</nav>
		<!--Fin Menu desarrollo docente-->
	<br>
	<?php 
		error_reporting(0);
		header("Content-Type: text/html;charset=utf-8");
		session_start();
		if(!isset($_SESSION['usuario'])) 
		{
		header('Location: ../index.html'); 
		exit();
		}
		/*
		$host= "sigacitcg.com.mx"; 
		$user = "sigacitc"; 
		$pass= "Itcg11012016_2"; 
		$conexion=mysqli_connect($host,$user,$pass);
		$bd_seleccionada = mysqli_select_db('sigacitc_cursosdesacadCP', $conexion);
		mysqli_query($con,("SET NAMES UTF8");
		*/
		require('_con.php');

		$usuario =$_SESSION['usuario'];
		$curso = $_POST['nom']; 
		$num=$_POST["num"];


		//echo "".$curso;
		$UNO=0;

		echo "<table>";
		foreach ($_POST as $key => $value) 
		{
			$UNO=1;
			$a[]=$key;
			echo "<tr>";
			echo "<td>";
		//  echo $key;
			echo "</td>";
			echo "<td>";
		// echo $value;
			$b[]=$value;
			echo "</td>";
			echo "</tr>";
			//}
			
		}
			$LUNES=3;
			$MARTES=4;
			$MIERCOLES=5;
			$JUEVES=6;
			$VIERNES=7;
			
			$NOMBRE=2;
			$ban=TRUE;
			for($num=0;$num<$b[0];$num ++)
			{
					
				$nombres = explode(" ",$b[$NOMBRE]);
				
				//echo $nombres[0]; 
				//echo $nombres[1]; 
				//echo $nombres[2]; 
				$Emp="SELECT EMP from maestro where ApellidoP like '".$nombres[0]."%' and ApellidoM like'".$nombres[1]."%' and Nombre like'".$nombres[2]."%'";	

				//echo "".$Emp."<br>";
					
				$resultado = mysqli_query($con,$Emp);
				//$resultado = mysqli_query($con,( "SELECT EMP from maestro where Nombre='".$b[$NOMBRE]."'");

				$fila = mysqli_fetch_row($resultado);

						
				$query="UPDATE matriculas SET Asistencia=".($b[$LUNES]+$b[$MARTES]+$b[$MIERCOLES]+$b[$JUEVES]+$b[$VIERNES]).
				", ALU =".$b[$LUNES].", AMA = ".$b[$MARTES].", AMI = ".$b[$MIERCOLES].", AJU = ".$b[$JUEVES].", AVI = ".$b[$VIERNES]
				." WHERE Emp = '".$fila[0]."' and Curso ='".$curso."'";
				$val=mysqli_query($con,$query);//ejecutando consulta






				//echo "".$query($con,i."<br>";
				if(!$val){
				//echo "No se ha podido Modificar";

				}
				else {
					$BAN=FALSE;
				//echo "<center><h1>Datos Modificados Correctamente<br><br>";
				//echo "<a href='Principal.html'>Regresar</a></center></h1><br><br>";
				}


				/*
				$query($con,i="update maestro set Contrasena='$alupas' where Emp='$aluctr'";//consulta sql

				$val=mysqli_query($con,($query($con,i,$con);//ejecutando consulta

				if(!$val){
				echo "No se ha podido Modificar";
				}
				else {
				echo "<center><h1>Datos Modificados Correctamente<br><br>";
				echo "<a href='Menu.php'>Regresar</a></center></h1><br><br>";
				}
				*/


				$LUNES=$LUNES+6;
				$MARTES=$MARTES+6;
				$MIERCOLES=$MIERCOLES+6;
				$JUEVES=$JUEVES+6;
				$VIERNES=$VIERNES+6;
				$NOMBRE=$NOMBRE+6;
			}
			
		IF($BAN==FALSE)
		{
		echo "<center><h1>Datos Modificados Correctamente<br><br>";
		echo "<a href='Menu.php'>Regresar</a></center></h1><br><br>";
			}	
			
			
			//var_dump($b);
		echo "</table>";
		//$curso = $_POST['c1']; 
		//$docente = $_POST['d1']; 
		//$AntD = $_POST["anteriorA"]; 
		//$LU = $_POST["LU"]; 
		//$MA = $_POST["MA"]; 
		//$MI = $_POST["MI"]; 
		//$JU = $_POST["JU"]; 
		//$VI = $_POST["VI"]; 

		//header('Location: Menu.php'). $_SESSION['usuario'];
		/*
		$R = $LU+$MA+$MI+$JU+$VI;
		$sql1 =  "SELECT EMP from maestro where Nombre='$docente'";
		$result1 = mysqli_query($con,($sql1);
		$re= mysqli_result($result1, 0); 
		$sql =  "UPDATE matriculas SET Asistencia=$R, ALU ='$LU', AMA = '$MA', AMI = '$MI', AJU = '$JU', AVI = '$VI' WHERE Emp = '$re' and Curso = '$curso'";
		$result = mysqli_query($con,($sql, $conexion);

		*/





		//header('Location: Menu.php'). $_SESSION['usuario'];
	?> 
 </body>
</html>


