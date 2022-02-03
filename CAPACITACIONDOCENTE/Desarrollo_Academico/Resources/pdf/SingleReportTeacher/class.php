<?php

/*
definición del arreglo 

0 - 9   --> contiene el valor de cada categoria por cada una de las materias
10 - 19 --> El promedio general de cada una de las categorias
20      --> El promedio global del profesor.
21 - 30 --> contiene el rugro de cada una de las categorias correspondientemente como "suf" "insu" etc.

31      --> calve de la materia --conselada.
32      --> pernom
33      --> perape
34      --> depnom
35      --> totalAlumnos.

36      --> numero de materias
37      --> son el resto de las materias y en el indice 
            [0]promedio                 listo.
            [1]clave                    listo.
            [2]nombre de la materia
*/

class calcular{


    public function __construct()
    {}

    public function processReport( $tipoReporte, $clave)
    {

        //CONEXION CON LA BD
        $enlace =  mysql_connect('localhost', 'root', '');
        if (!$enlace) {
            die('No pudo conectarse: ' . mysql_error());
        }
        if (!mysql_select_db('bd_ed', $enlace)) {
            echo 'No pudo seleccionar la base de datos';
            exit;
        }

        //OBTIENE EL NUMERO DE MATERIAS DE UN PROFESOR ESPECIFICO
        $consult = "select DISTINCT grupo.matcve from grupo inner join personal on grupo.percve = personal.percve where personal.percve = $clave";
        $result = mysql_query($consult); 

        //DEFINICION DEL ARREGLO
         $promedio[0][0] = 0;
         //DEFINICIÓN DE LA VARIABLE "Y" QUE CONTROLA EL NUMERO DE MATERIAS EN EL ARREGLO.
         $y = 0;
         //DEFINICIÓN DE UNA VARIABLE PARA CONTAR LAS MATERIAS
         $contMaterias = 0;
         //VARIABLE PARA GUARDAR EL PROMEDIO GLOBAL DEL MAESTRO.
         $global = 0;
        //cicla hasta encontrar todas las materias del profesor especificado.
        while ($registro = mysql_fetch_array($result, MYSQLI_ASSOC))
        {
           
            $materia = $registro['matcve'];

            //guarda la clave de la materia en arreglo
            $promedio[1][37 + $y] = $materia;

            //consulta e if que se utiliza para verificar que existan repuestas de los alumnos
            $sql="select sum(valor)/(count(valor) * 5) * 5 as existe from respuesta_alum inner join grupo on respuesta_alum.matcve = grupo.matcve inner join encuesta_alumno on respuesta_alum.idpreguntaa = encuesta_alumno.idpreguntaa where respuesta_alum.matcve = '$materia' and grupo.percve ='$clave' and encuesta_alumno.idcategoria = 1 ";
            $query=mysql_query($sql,$enlace);
            $row=mysql_fetch_assoc($query);

            if($row['existe'] != NULL)
            {

                /*
                    se obtienen datos del profesor para encabezar el archivo.
                */
                $sql="SELECT pernom, perape FROM personal WHERE percve =".$clave;
                $query=mysql_query($sql,$enlace);
                $row=mysql_fetch_assoc($query);

                
                $promedio[0][32] = $row['pernom'];
                $promedio[0][33] =  $row['perape'];



            $sql="SELECT personal.percve, personal.depcve, departamentos.id_dep, departamentos.nombre_dep FROM personal INNER JOIN departamentos ON personal.id_dep = departamentos.id_dep and personal.percve = '$clave'";
                $query=mysql_query($sql,$enlace);
                $row=mysql_fetch_assoc($query);

                $promedio[0][34]= $row['nombre_dep'];
                //fin del lencabezamiento.


                for ($x = 0; $x < 10; $x++) 
                {

                    //CONSULTAS POR C/U de las categorias.
                    //CATEGORIA X
                    $sql="select sum(valor)/(count(valor) * 5) * 5 as categoria from respuesta_alum inner join grupo on respuesta_alum.matcve = grupo.matcve inner join encuesta_alumno on respuesta_alum.idpreguntaa = encuesta_alumno.idpreguntaa where respuesta_alum.matcve = '$materia' and grupo.percve ='$clave' and encuesta_alumno.idcategoria = $x + 1 ";
                    $query=mysql_query($sql,$enlace);
                    $row=mysql_fetch_assoc($query);
                    $promedio[$y][$x] = $row['categoria'];
                    
                }
                //CUANDO TERMINA DE PROCESAR LOS REUSLTADOS DE LA MATERIA SE INCREMENTA "Y" PARA 
                //CONTINUAR CON LA SIGUIENTE  EN EL ARREGLO.
                $y = $y + 1;


                


                //se incrementa el contador de las materias
                $contMaterias = $contMaterias + 1;

            }//cierre del fi

        }//cierre del while



        if($contMaterias != 0)
        {

            //Con el promedio de cada categoria obtenemos el rubro que le corresponde 
            //en cada categoria de todas sus materias.  
            $resultado = 0;
            $categoria[0] = 0;
            
         
            //ciclo para obtener el resultado general por cada categoria.
            for ($v = 0; $v < 10; $v++) 
            { 
                $resultado = 0;
                for ($z = 0; $z < $contMaterias; $z++) 
                {  
                    $resultado = $resultado + $promedio[$z][$v];
                }
                //y a qui ya se puede guardar el promedio por categoria en un arreglo aparte

                $categoria[$v] = $resultado / $contMaterias;
            }
            
            $indice = 0;
            //pasa los resultados de la categoria al arreglo.
            for ($x = 10; $x <= 19; $x++) 
            {   
                $promedio[0][$x] =  $categoria[$indice];
                $indice += 1;
            }
/*
            //obtener el promedio general del maestro.
            for ($x = 0; $x < 10; $x++) 
            {   
                $global = $global + $categoria[$x];
            }


            //guardar el promedio general del maestro.
            $promedio[0][20] = $global / 10;
*/

            //guardar el rubro de cada categoria.
            $indice = 0;
            for ($x = 21; $x <= 30; $x++) 
            {   

                if( $categoria[$indice] >= 1 and  $categoria[$indice]  <= 3.2499){
                    $promedio[0][$x]  = "INSUF";
                }
                if($categoria[$indice]  >= 3.2500 and $categoria[$indice]  <= 3.7499){
                    $promedio[0][$x] = "SUFIC";
                }
                if($categoria[$indice]  >= 3.7500 and $categoria[$indice]  <= 4.2499){
                    $promedio[0][$x] = "BUENO";
                }
                if($categoria[$indice]  >= 4.2500 and $categoria[$indice] <= 4.7499){
                    $promedio[0][$x] = "NOTBL";
                }
                if($categoria[$indice]  >= 4.7500 and $categoria[$indice]  <= 5){
                    $promedio[0][$x] = "EXCLT";
                }

                $indice += 1;
            }

        }//cierre del if que se utiliza para hacer los calculos.


        //guarda el numero de materias en el arreglo posicion 36
        $promedio[0][36] = $contMaterias;

        //OBTENER LOS RESULTADOS POR MATERIA.
        for ($z = 0; $z < $contMaterias; $z++) 
        { 
            $resultado = 0;
            for ($v = 0; $v < 10; $v++)     
            {  
                $resultado = $resultado + $promedio[$z][$v];
            }
            $categoria[$z] = $resultado / 10;
        }
        
        $indice = 0;
       
        //pasa los resultados de las materias al arreglo que es lo ultimo que tendra el arreglo.
        for ($x = 37; $x <= 37 + $contMaterias; $x++) 
        {   
            $promedio[0][$x] =  $categoria[$indice];
            $indice += 1;
        }
      


        //obtener el promedio general del maestro.
        for ($x = 0;     $x < $contMaterias; $x++) 
        {   
            $global = $global + $categoria[$x];
        }
        //guardar el promedio general del maestro.
        $promedio[0][20] = $global / $contMaterias;


        //Total de alumnos que evaluaron
        $sql="select count(valor)/48 as totalAlum from respuesta_alum inner join grupo on respuesta_alum.gpocve = grupo.gpocve and respuesta_alum.matcve = grupo.matcve where respuesta_alum.gpocve = grupo.gpocve and respuesta_alum.matcve = grupo.matcve and grupo.percve = $clave";
        $query=mysql_query($sql,$enlace);
        $row=mysql_fetch_assoc($query);
        $promedio[0][35] = $row['totalAlum'];

        return  $promedio;

    }//cierre del metodo
}//cierre de la clase

?>