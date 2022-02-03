<!DOCTYPE HTML>
<html>
<!--<meta charset="UTF-8">-->
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" /> 	
		<header>
		<center>Tecnológico Nacional de México
		<br>
		INSTITUTO TECNÓLOGICO DE CD. GUZMAN
		<hr height: 10px; > 
		</center>
	</header>
	
<title></title>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>

        <div class="maindiv">
            <div class="divA">
                <div class="title"><h2>Actualización de los encabezados</h2></div>
                
                     <p>Referencia de encabezado</p>
                 <table width="626" height="81" border="1">
                  <tr>
                    <td rowspan="3"><center><img src="ITCGLOGO.jpg" width="50" height="50" HSPACE="10" VSPACE="10"/></center></td>
                    <td rowspan="2">Nombre Documento</td>
                    <td>Codigo</td>
                  </tr>
                  <tr>
                  
                    <td>Revisión</td>
                  </tr>
                  <tr>
                    <td>Referencia ISO</td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                <div class="divB">
                    <div class="divD">
                    
                        <p>Selecciona el documento</p>

                        <?php              

$host= "sigacitcg.com.mx"; 
 $user = "sigacitc"; 
 $pass= "Itcg11012016_2"; 
 $conexion=mysql_connect($host,$user,$pass);
$bd_seleccionada = mysql_select_db('sigacitc_cursosdesacadCP', $conexion);
mysql_query("SET NAMES UTF8");

						
						if (isset($_GET['submit'])) {
						
	//NombreDoc	ISO	Codigo	Revision	Elaboro	Aprobo	Fecha	COD
                        $id = $_GET['COD'];
                        $Doc = $_GET['NombreDoc'];
                        $name = $_GET['ISO'];
                        $email = $_GET['Codigo'];
                        $mobile = $_GET['Revision'];
                        $address = $_GET['Elaboro'];
                        $aprov = $_GET['Aprobo'];
                        $Fecha = $_GET['Fecha'];
                        

$sql = "update `PlantillaMod` set
  NombreDoc='$Doc', 
  ISO='$name', 
  Codigo='$email', 
   Revision='$mobile', 
    Elaboro='$address',
    Aprobo='$aprov',
   Fecha='$Fecha' 
   where COD='$id';";

   $result = mysql_query($sql, $connection);
if(!$result) {  
 echo 'ERROR: ' . mysql_error() . "\n";
   }else {
   
   } 
   
                    }
						
						
						
                        $query = mysql_query("select * from PlantillaMod", $connection);
                        while ($row = mysql_fetch_array($query)) {
                            echo "<b><a href=\"updatephp.php?update={$row['COD']}\">{$row['NombreDoc']}</a></b>";
                            echo "<br />";
                        }
                        ?>
                    </div>
                    <?php
                    if (isset($_GET['update'])) {
                        $update = $_GET['update'];
                        $query1 = mysql_query("select * from PlantillaMod where COD=$update", $connection);
                        while ($row1 = mysql_fetch_array($query1)) {
                        
                            echo "<form class=\"form\" method=\"get\">";
							echo "<h2>Datos del encabezado</h2>";
							echo "<hr/>";
							
							
					//NombreDoc	ISO	Codigo	Revision	Elaboro	Aprobo	Fecha	COD
			    echo "<label>" . "Documento No.:" . "</label>" . "<br />";
                            echo"<input class=\"input\" type=\"text\" name=\"COD\" value=\"{$row1['COD']}\" readonly/>";
                            echo "<br />";			
		            echo "<label>" . "Nombre del documento:" . "</label>" . "<br />";			
                            echo"<input class=\"input\" type=\"text\" name=\"NombreDoc\" value=\"{$row1['NombreDoc']}\" />";
                            echo "<br />";
                            echo "<label>" . "ISO:" . "</label>" . "<br />";
                            echo"<input class=\"input\" type=\"text\" name=\"ISO\" value=\"{$row1['ISO']}\" />";
                            echo "<br />";
                            echo "<label>" . "Codigo:" . "</label>" . "<br />";
                            echo"<input class=\"input\" type=\"text\" name=\"Codigo\" value=\"{$row1['Codigo']}\" />";
                            echo "<br />";
                            echo "<label>" . "Revision No.:" . "</label>" . "<br />";
                            echo"<input class=\"input\" type=\"text\" name=\"Revision\" value=\"{$row1['Revision']}\" />";
                            echo "<br />";
                            echo "<label>" . "Elaboro:" . "</label>" . "<br />";
                            echo "<textarea rows=\"15\" cols=\"15\" name=\"Elaboro\">{$row1['Elaboro']}";
                            echo "</textarea>";
                              echo "<br />";
                               echo "<label>" . "Aprobo:" . "</label>" . "<br />";
                            echo "<textarea rows=\"15\" cols=\"15\" name=\"Aprobo\">{$row1['Aprobo']}";
                            
                            echo "</textarea>";
                              echo "<br />";
                              echo "<label>" . "Fecha:" . "</label>" . "<br />";
                            echo "<textarea rows=\"15\" cols=\"15\" name=\"Fecha\">{$row1['Fecha']}";
                            //type="date"
                            echo "</textarea>";
                              echo "<br />";
                            echo "<br />";
                            echo "<input class=\"submit\" type=\"submit\" name=\"submit\" value=\"Actualizar\" />";
                            echo "</form>";
                        }
                    }                    
                   if (isset($_GET['submit'])) {
                   
                        $id = $_GET['COD'];
                        $Doc = $_GET['NombreDoc'];
                        $name = $_GET['ISO'];
                        $email = $_GET['Codigo'];
                        $mobile = $_GET['Revision'];
                        $address = $_GET['Elaboro'];
                        $aprov = $_GET['Aprobo'];
                        $Fecha = $_GET['Fecha'];
                        
                        

   $sql = "update `PlantillaMod` set
  NombreDoc='$Doc', 
  ISO='$name', 
  Codigo='$email', 
   Revision='$mobile', 
    Elaboro='$address',
    Aprobo='$aprov',
   Fecha='$Fecha' 
   where COD='$id';";

   $result = mysql_query($sql, $connection);
if(!$result) {  
 echo 'ERROR: ' . mysql_error() . "\n";
   }else {
   
   } 
   
				   echo '<div class="form" id="form3"><br><br><br><br><br><br><Span>Información del encabezado actualizada</span></div>';
				   }
                    ?>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>        
        </div>
    </div>
</body>
</html>
<?php
mysql_close($connection);
?>