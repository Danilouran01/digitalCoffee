<?php
session_start();
if ($_SESSION['usuario']){
    
    ?>
    
    
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Todo lo de boostrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="js/funciones.js"></script>


        <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">


        <style>
            .fakeimg {
                height: 200px;
                background: #aaa;
            }

            .table-bordered {
                --bs-table-bg: #495057;
                --bs-table-striped-bg: #2c3034;
                --bs-table-striped-color: #fff;
                --bs-table-active-bg: #373b3e;
                --bs-table-active-color: #fff;
                --bs-table-hover-bg: #323539;
                --bs-table-hover-color: #fff;
                color: #fff;
                border-color: #373b3e;



            }

            .text-info {

                color: #2c3034;
            }
        </style>

        <title>Reporte de trabajadores</title>
    </head>

    <body>
        <?php
        require("navar.php");

        ?>
      

        <form action="ver_reporte_trabajo_entre_fechas.php" method="POST">
        <center>    
        <input type="text" name="busqueda" placeholder="Ingrese la cédula ">
            <input type="date" name="fechainicial" placeholder="ingre el dato1">
            <input type="date" name="fechafinal" placeholder="ingre el dato2">
           
            <input type="submit" name="buscar" value="Buscar">
            </center>
        </form>

        <?php


        if (isset($_REQUEST['buscar'])) {
            $buscar = $_REQUEST['busqueda'];
             $fecha1 = $_REQUEST['fechainicial'];
             $fecha2 = $_REQUEST['fechafinal'];
            require("conexion.php");
            $query = "SELECT tbltrabajador.idtrabajador,
            tbltrabajador.nombre,tbltrabajador.telefono,tbltipotrabajo.descripcion,tblprecio.precio, 
            sum(tbltrabajo.cantidad_kilos) AS kilos,
            sum(tbljornada.tipojornada) AS jornada,
            SUM((tbljornada.tipojornada*tblprecio.precio )+(tblprecio.precio*tbltrabajo.cantidad_kilos)) AS 'total' 
            FROM tbltrabajador INNER JOIN tbltrabajadorxtrabajo 
            ON tbltrabajador.idtrabajador=tbltrabajadorxtrabajo.idtrabajador 
            INNER JOIN tbltrabajo ON tbltrabajadorxtrabajo.idtrabajo=tbltrabajo.idtrabajo 
            INNER JOIN tbltipotrabajo ON tbltrabajo.idtipotrabajo=tbltipotrabajo.idtipotrabajo 
            INNER JOIN tbljornada ON tbltrabajo.idjornada=tbljornada.idjornada 
            INNER JOIN tblprecio ON tbltipotrabajo.idtipotrabajo=tblprecio.id_tipotrabajo    WHERE  tbltrabajo.fecha >= tblprecio.fecha AND IF(tblprecio.fecha_fin!='0000-00-00',tbltrabajo.fecha<tblprecio.fecha_fin,TRUE) AND  tbltrabajador.idtrabajador='$buscar' AND tbltrabajo.fecha BETWEEN '$fecha1' AND '$fecha2' 
            
            GROUP BY tbltrabajador.idtrabajador;";
            
            
            
            
              $resultado = mysqli_query($conexion, $query);
            
            if ($resultado) {
                $rowcount = mysqli_num_rows($resultado);
               // echo "The total number of rows are: " . $rowcount;
                if ($rowcount >= 1) {


        ?>

                    <table class="table table-bordered border-white">
                        <thead>
                            <tr>
                                <th class="text-center">Número de cédula</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Teléfono</th>
                                <th class="text-center"> Kilos recolectados</th>
                                <th class="text-center"> Jornadas trabajadas</th>
                                <th class="text-center">Total a pagar</th>
                                <th class="text-center">Acciones</th>


                            </tr>

                        </thead>
                        <tbody>
                            <center>
                                <h2 class="text">Listado de usuario buscado</h2>
                            </center>
                            <?php
                            //var_dump($row = $resultado->fetch_assoc());
                            while ($row = $resultado->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $row['idtrabajador']; ?></td>
                                    <td class="text-center"><?php echo $row['nombre']; ?></td>
                                    <td class="text-center"><?php echo $row['telefono']; ?></td>
                                    <td class="text-center"><?php echo $row['kilos']; ?></td>
                                    <td class="text-center"><?php echo $row['jornada']; ?></td>
                                    <td class="text-center"><?php echo $row['total']; ?></td>


                                    <td class="text-center">
                                        <a class="btn btn-success" href="ver_reporte_trabajo_entre_fechas.php">Limpiar</a>
                                    </td>
                                </tr>

                <?php
                            }
                        }
                    }
                } else
                //    echo "<br>Datos incorrectos";


                ?>

                        </tbody>
                    </table>




                    <center>
                        <h2 class="text">Listado de usuarios</h2>
                    </center>
                    <?php

                    require("conexion.php");
$query = "SELECT tbltrabajador.idtrabajador,
tbltrabajador.nombre,tbltrabajador.telefono,tbltipotrabajo.descripcion,tblprecio.precio, 
sum(tbltrabajo.cantidad_kilos) AS kilos,
sum(tbljornada.tipojornada) AS jornada,
SUM((tbljornada.tipojornada*tblprecio.precio )+(tblprecio.precio*tbltrabajo.cantidad_kilos)) AS 'total' 
FROM tbltrabajador INNER JOIN tbltrabajadorxtrabajo 
ON tbltrabajador.idtrabajador=tbltrabajadorxtrabajo.idtrabajador 
INNER JOIN tbltrabajo ON tbltrabajadorxtrabajo.idtrabajo=tbltrabajo.idtrabajo 
INNER JOIN tbltipotrabajo ON tbltrabajo.idtipotrabajo=tbltipotrabajo.idtipotrabajo 
INNER JOIN tbljornada ON tbltrabajo.idjornada=tbljornada.idjornada 
INNER JOIN tblprecio ON tbltipotrabajo.idtipotrabajo=tblprecio.id_tipotrabajo    WHERE  tbltrabajo.fecha >= tblprecio.fecha AND IF(tblprecio.fecha_fin!='0000-00-00',tbltrabajo.fecha<tblprecio.fecha_fin,TRUE)

GROUP BY tbltrabajador.idtrabajador; ";
                    $resultado = mysqli_query($conexion, $query);




                    ?>

                    <table class="table table-bordered border-white">
                        <thead>
                            <tr>
                                <th class="text-center">Número de cédula</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Teléfono</th>
                                <th class="text-center"> Kilos recolectados</th>
                                <th class="text-center"> Jornadas trabajadas</th>
                                <th class="text-center">Total a pagar</th>



                            </tr>

                        </thead>
                        <tbody>
                            <?php

                  while ($row = $resultado->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $row['idtrabajador']; ?></td>
                                    <td class="text-center"><?php echo $row['nombre']; ?></td>
                                    <td class="text-center"><?php echo $row['telefono']; ?></td>
                                    <td class="text-center"><?php echo $row['kilos']; ?></td>
                                    <td class="text-center"><?php echo $row['jornada']; ?></td>
                                    <td class="text-center"><?php echo $row['total']; ?></td>





                                </tr>

                            <?php
                            }




                            ?>

                        </tbody>
                    </table><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <?php
require("footer.php");
?> 

    </body>

    </html>


    <?php
    }else{
      header("location:index.php");
  }?>