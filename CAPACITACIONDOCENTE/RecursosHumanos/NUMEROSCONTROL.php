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


<?php


//$host='mysql.webcindario.com';
 //$user='cursosdesacad';
 //$pass='jmrs1905';
 //$conexion=mysql_connect($host,$user,$pass);
//$bd_seleccionada = mysql_select_db('cursosdesacad', $conexion);
$servername = "sigacitcg.com.mx"; 
$username = "sigacitc";
$password = "Itcg11012016_2"; 
$dbname = 'sigacitc_cursosdesacadCP';





// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysql_query("SET NAMES UTF8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT nombre, periodo, duracion FROM curso";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["nombre"]. " - Name: " . $row["periodo"]. " " . $row["duracion"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
  



?>

<?php
 

  
  


?>

<br>
<br>
	<a href="Menu.php"><IMG SRC="../Img/menu.png" WIDTH=150 HEIGHT=45>	 </a>
	</body>
</html>
