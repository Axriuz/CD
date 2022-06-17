<style>
body {
    font-family: "Lucida Sans", Verdana, sans-serif;
}

.imain img {
    width: 100%;
}

h1{
    font-size: 2.625em;
}

h2{
    font-size: 1.375em;
}
/* CSS para contenido de los div´s*/
.iheader {
    padding: 0.0121457489878542510121457489879%;
    background-color:#F0F0F0;/*background-color: #f1f1f1;*/
    border: 1px solid #e9e9e9;
}

.imenuitem {
  /*  margin: 4.310344827586206896551724137931%;*/
    margin-left: 0;
    margin-top: 0;
   /* padding: 4.310344827586206896551724137931%;*/
    border-bottom: 1px solid #e9e9e9;
    cursor: pointer;
}

.imain {
    padding-bottom: 5%;
    padding-top: 2%;

}
/*
.iright {
    padding: 4.310344827586206896551724137931%;
    background-color: #CDF0F6;
}
*/
.ifooter {
    padding: 1.0121457489878542510121457489879%;
    text-align: center;
    /*background-color: #f1f1f1;*/

    font-size: 0.625em;

    border: 1px solid blue;
    border-right:none;
    border-left:none;
    border-bottom:none;

}



/* grid system pra el responsive*/


.igridcontainer {
    width: 100%;
}

.igridwrapper {
    overflow: hidden;
}

.igridbox {
    margin-bottom: 0%;

    margin-right: 0%;
    float: left;
}



/* CSS para el gird system de los div´s internos */

.igridheader {
    width: 100%;
}

.igridmenu {
    width: 20%;


   /* margin-top: 10px;
    margin-top: 10px;
    */
    margin-bottom: 10px;

}

.igridmain {
    width: 60%;


    /*margin-top: 10px;*/
    /*margin-bottom: 10px;*/




}
/*
.igridright {
    width: 20%;

    margin-right: 0;
    margin-top: 10px;
    margin-top: 10px;
    margin-bottom: 10px;
}
*/
.igridfooter {
    width: 50%;
    margin-left: 27%;

    position: fixed;
    bottom:0px;


}

@media only screen and (max-height: 700px) {
.igridfooter {
    width: 50%;
    margin-left: 27%;
    position:relative;

}

}

@media only screen and (max-width: 1000px) {

    .logo{
        visibility: hidden;
    }


    .igridmenu {
        width: 100%;
    }

    .imenuitem {
        margin: 1.0121457489878542510121457489879%;
        padding: 1.0121457489878542510121457489879%;
    }

    .igridmain {
        width: 100%;
    }

    .imain {
        padding: 1.0121457489878542510121457489879%;
    }
/*
    .igridright {
        width: 100%;
    }
*/
    .iright {
        padding: 1.0121457489878542510121457489879%;
    }

    .igridbox {
        margin-right: 0;
        float: left;
    }

.logoTexto{
  position: absolute;
  left:-100px;
  right:0px;

}

</style>








<!-- css para contenedor de login -->
<style class="cp-pen-styles">




body {
    background-image: url("Resources/fondos/fondo7.png");
    background-color: #cccccc;
}
.center {
    background-image: url("Resources/fondos/fondo9.png");
    background-color: #cccccc;

}
.center{


    width:47%;
    margin-left: 25%;
    margin-top: 0px;
    border: 1px solid gray;
    padding-top:20px;
    padding-left:20px;
    padding-right:20px;
    padding-bottom:20px;

    border-radius:10px;

    /* STYLE PARA EL TEXTO
    color: white;
    text-shadow: 1px 1px 1px black, 0 0 25px blue, 0px 0px 1px darkblue;
*/

    /* SOMBRA DE EL DIV DONDE INRODUCE EL NUMERO DE CONTORL */
    -webkit-box-shadow: 10px 10px 44px 2px rgba(0,0,0,0.75);
    -moz-box-shadow: 10px 10px 44px 2px rgba(0,0,0,0.75);
    box-shadow: 10px 10px 44px 2px rgba(0,0,0,0.75);

}

/* css para el contenido de el contenedor de login*/

/*
Index de colores
#336633 --> color de fondo del encabezado
green   --> lineas de los imputs
#000066 --> color de fondo de los botones
#006633 --> color de fondo hover de los botones
*/



.titulo, input::-webkit-input-placeholder, button {
 font-family: 'roboto', sans-serif;
 -webkit-transition: all 0.3s ease-in-out;
 transition: all 0.3s ease-in-out;
 font-size: 16px;/*Added*/
color: #003399;/*Added*/

}

/*Encabezado*/
.titulo {
    height: 70px;
    width: 100%;
    font-size: 30px;
    background: #336633;
    color: gray;
    line-height: 100%;
    border-radius: 3px 3px 0 0;
    box-shadow: 0 2px 5px 1px rgba(0, 0, 0, 0.2);


}
/*
form {
  box-sizing: border-box;
  width: 260px;
  margin: 150px auto 0;
  box-shadow: 2px 2px 5px 1px rgba(0, 0, 0, 0.2);
  padding-bottom: 40px;
  border-radius: 3px;
}
*/
form h1 {
  box-sizing: border-box;
  padding: 20px;

}

input {
  margin: 30px 25px; /*margin: 40px 25px;*/
  width: 90%;/*width: 300px;*/
  display: block;
  border: none;
  padding: 10px 0;
  border-bottom: solid 1px blue; /*border-bottom: solid 1px #1abc9c;*/
  -webkit-transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
  transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
  background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 96%, green 4%);
  /*background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 96%, #1abc9c 4%);*/
  background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 96%, green 4%);
  /*background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 96%, #1abc9c 4%);*/
  background-position: -400px 0;/*background-position: -300px 0;*/
  background-size: 400px 100%;/*background-size: 300px 100%;*/
  background-repeat: no-repeat;
  color: #0e6252;
}
input:focus, input:valid {
 box-shadow: none;
 outline: none;
 background-position: 0 0;
 color: blue;/*Added*/
 font-size:20px;

}
input:focus::-webkit-input-placeholder, input:valid::-webkit-input-placeholder {
 color: green;/*color: #1abc9c;*/
 font-size: 15px;/*font-size: 11px;*/
 -webkit-transform: translateY(-20px); /*-webkit-transform: translateY(-20px);*/
 transform: translateY(-30px);/*transform: translateY(-20px);*/
 visibility: visible !important;

}

button {
  border: none;
  background: #000066; /*background: #1abc9c;*/
  cursor: pointer;
  border-radius: 3px;
  padding: 6px;
  width: 130px;/*width: 200px;**/
  color: white;
  margin-left: 8%;/*margin-left: 25px;*/
  box-shadow: 0 3px 6px 0 rgba(0, 0, 0, 0.2);
}

button:hover {
  -webkit-transform: translateY(-3px);
  -ms-transform: translateY(-3px);
  transform: translateY(-1px);
  box-shadow: 0 10px 10px 0 #000033;/*box-shadow: 0 10px 10px 0 rgba(0, 0, 0, 0.2);*/
  background-color: #006633;
}



/* fin css para el contenido de el contenedor de login*/



</style>

<!--Fin css para contenedor de login -->



<!-- css para el elncabezado y pie de pagina -->
<style>
.borde{
  width:90%;
  margin-left: 5%;

  height:5px;
    background-color:green;
    border-radius: 0px 0px 200px 200px;
    -moz-border-radius: 0px 0px 200px 200px;
    -webkit-border-radius: 0px 0px 200px 200px;
    border: 0px solid #000000;
}



.bordeArriba{

    width:80%;

    margin-left:10%;

    border-top: 5px solid #330099;
    border-left:none;
    border-right:none;
    /*border-bottom: 2px solid blue;*/
    border-bottom: none;

    border-radius: 0px 0px 200px 200px;
    -moz-border-radius: 0px 0px 200px 200px;
    -webkit-border-radius: 0px 0px 200px 200px;
}


.header{
    width:80%;
    margin-left:10%;
}
/*Esta es la linea despues del encabezado*/

.lineDownHeader{

    border: 1px solid blue;
    height:100px;
    width:80%;
    margin-left:10%;

    border-left:none;
    border-right:none;
    border-top:none;
    border-bottom: none;

}




/*  Contenedor Cabecera
 * ******************************/

.logo {
  float:left;
  margin:10px 50px;

}

.logoright {
   position:absolute;
  margin-left: 60%;
}
.logoTexto{/*
  float:left;
  margin-left:30px;*/

  position: absolute;;
  margin-left: 30%;

}


</style>
<div class="igridcontainer">
    <div class="igridwrapper">
        <div class="igridbox igridheader">
            <div class="iheader">
<div class = borde></div>
<div class = bordeArriba></div>
 <div class = header>

    <CENTER>

         <!-- <div id= contenedor_cabecera>  -->
         <div class = "logoleft">
            <div class=logo>
               <!-- <img src=http://www.itcg.edu.mx/imagenes/sep.png title=DGEST height=80px width=250px> -->
                <img src=Resources/img/sep.png height=80px width=250px>
            </div>
          </div>
<!--
            <div id=cabecera_texto>

                <h1>Tecnológico Nacional de México      </h1>
                <h3>Instituto Tecnológico de Ciudad Guzmán  </h3>

              <img src=Resources/img/header.png height=80px width=350px>
            </div>
-->
            <div class=logoTexto>

                <img src=Resources/img/header.png height=80px width=350px>
            </div>

            <div class = "logoright">

              <div class=logo><img src=Resources/img/itcg_logo.png title=ITCG height=64px width=58px></div>
            </div>
        <!-- </div>  -->

    </CENTER>

 </div>
 </div>
  </div>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);//para trabajar con la version actual de mysqli



require('con.php');
//$con=Conectar();//variable que almacena la conexión ala base de datos

if(isset($_REQUEST['DESACTIVAR'])){
mysqli_query($con,"SET NAMES UTF8");

$curso=$_POST['cursos'];


$query="update curso set validado=0 where Nombre='$curso'";//consulta sql

$val=mysqli_query($con,$query);//ejecutando consulta

if(!$val){
echo "No se ha podido Modificar";
}
else {
echo '<center><h1>CURSO '.utf8_decode($curso).' DESACTIVADO E INVALIDADO<br><br>';
echo "<a href='desactivar.php'>Regresar</a></center></h1><br><br>";
}


}
?>
 <div class="igridbox igridfooter">
            <div class="ifooter">


<img src="Resources/img/foot.png" title=ITCG height=99px width=314px>




            </div>
        </div>