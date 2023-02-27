<?php
session_start();
if ($_SESSION['usuario']) {

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

        <title>Lista de usuarios recoleccion</title>
    </head>

    <body>
        <?php
        require("navar.php");

        ?>


        <form action="ver_trabajador_dia.php" method="post">
            <center>
                <input type="text" name="busqueda" placeholder="Ingrese la cédula ">
                <input type="submit" name="buscar" value="Buscar">
            </center>
            <br>

        </form>

        <?php


        if (isset($_REQUEST['buscar'])) {
            $buscar = $_REQUEST['busqueda'];

            require("conexion.php");
            $query = "SELECT tbltrabajador.idtrabajador,tbltrabajador.nombre  AS NOMBRE, tbltrabajador.telefono,tbltrabajo.fecha, tblprecio.fecha AS fechai,tblprecio.fecha_fin,tbllote.nombre,tbltipotrabajo.descripcion,tblprecio.precio FROM tbltrabajador INNER JOIN tbltrabajadorxtrabajo ON tbltrabajador.idtrabajador=tbltrabajadorxtrabajo.idtrabajador
            INNER JOIN tbltrabajo ON tbltrabajadorxtrabajo.idtrabajo=tbltrabajo.idtrabajo 
            INNER JOIN tbltipotrabajo ON tbltrabajo.idtipotrabajo=tbltipotrabajo.idtipotrabajo 
            INNER JOIN tbllote on tbltrabajo.idlote=tbllote.idlote INNER JOIN tblprecio ON tbltipotrabajo.idtipotrabajo=tblprecio.id_tipotrabajo
            WHERE tbltipotrabajo.Requiere_insumo!='2' AND tbltrabajo.fecha >= tblprecio.fecha AND IF(tblprecio.fecha_fin!='0000-00-00',tbltrabajo.fecha<tblprecio.fecha_fin,TRUE)  AND tbltrabajador.idtrabajador=$buscar;";
            $resultado = mysqli_query($conexion, $query);
 
            if ($resultado) {
                $rowcount = mysqli_num_rows($resultado);
                //echo "The total number of rows are: ".$rowcount; 
                if ($rowcount >= 1) {


        ?>
                    <div class="container w-80 bg-amber mt-5 rounded shadow">

                        <h2 class="text-center" style="color:black;">Listado de usuarios buscado</h2>

                        <div class="container w-100 bg-amber mt-5 rounded shadow">

                            <table class="table table-bordered border-white table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">Número cédula</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Telefono</th>
                                        <th class="text-center">Fecha en la que se realizó el trabajo </th>
                                        <th class="text-center">Nombre del lote en el que se realizó el trabajo</th>
                                        <th class="text-center">Trabajo realizado</th>
                                        <th class="text-center">Precio de labor por día</th>
                                        <th class="text-center">Acciones</th>


                                    </tr>

                                </thead>
                                <tbody>

                                    <?php

                                    while ($row = $resultado->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $row['idtrabajador']; ?></td>
                                            <td class="text-center"><?php echo $row['NOMBRE']; ?></td>
                                            <td class="text-center"><?php echo $row['telefono']; ?></td>
                                            <td class="text-center"><?php echo $row['fecha']; ?></td>
                                            <td class="text-center"><?php echo $row['nombre']; ?></td>
                                            <td class="text-center"><?php echo $row['descripcion']; ?></td>
                                            <td class="text-center"><?php echo $row['precio']; ?></td>


                                            <td class="text-center">
                                                <a class="btn btn-success" href="ver_trabajador_dia.php">Limpiar</a>
                                            </td>
                                        </tr>

                        <?php
                                    }
                                }
                            }
                        } else
                            //  echo"<br>Datos incorrectos";


                        ?>

                                </tbody>
                            </table>




                            <!-- <div class="container w-80 bg-amber mt-5 rounded shadow"> -->

                            <center>
                                <h2 class="text-center" style="color:black;">Listado de usuarios </h2>
                            </center>

                            <!-- <div class="container w-100 bg-amber mt-5 rounded shadow"> -->
                            <?php

                        require("conexion.php");
                        $query = "SELECT tbltrabajador.idtrabajador,tbltrabajador.nombre  AS NOMBRE, tbltrabajador.telefono,tbltrabajo.fecha, tblprecio.fecha AS fechai,tblprecio.fecha_fin,tbllote.nombre,tbltipotrabajo.descripcion,tblprecio.precio FROM tbltrabajador INNER JOIN tbltrabajadorxtrabajo ON tbltrabajador.idtrabajador=tbltrabajadorxtrabajo.idtrabajador
    INNER JOIN tbltrabajo ON tbltrabajadorxtrabajo.idtrabajo=tbltrabajo.idtrabajo 
    INNER JOIN tbltipotrabajo ON tbltrabajo.idtipotrabajo=tbltipotrabajo.idtipotrabajo 
    INNER JOIN tbllote on tbltrabajo.idlote=tbllote.idlote INNER JOIN tblprecio ON tbltipotrabajo.idtipotrabajo=tblprecio.id_tipotrabajo
    WHERE tbltipotrabajo.Requiere_insumo!='2' AND tbltrabajo.fecha >= tblprecio.fecha AND IF(tblprecio.fecha_fin!='0000-00-00',tbltrabajo.fecha<tblprecio.fecha_fin,TRUE);";
                        $resultado = mysqli_query($conexion, $query);




                            ?>

                            <table class="table table-bordered border-white table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">Número cédula</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Teléfono</th>
                                        <th class="text-center"> Fecha en la que se realizó el trabajo </th>
                                        <th class="text-center"> Fecha inicio precio </th>
                                        <th class="text-center"> Fecha fin precio </th>
                                        <th class="text-center"> Nombre del lote en el que se realizó el trabajo</th>
                                        <th class="text-center"> Trabajo realizado</th>
                                        <th class="text-center"> Precio de labor por dia</th>



                                    </tr>

                                </thead>
                                <tbody>
                                    <?php

                                    while ($row = $resultado->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $row['idtrabajador']; ?></td>
                                            <td class="text-center"><?php echo $row['NOMBRE']; ?></td>
                                            <td class="text-center"><?php echo $row['telefono']; ?></td>
                                            <td class="text-center"><?php echo $row['fecha']; ?></td>
                                            <td class="text-center"><?php echo $row['fechai']; ?></td>
                                            <td class="text-center"><?php echo $row['fecha_fin']; ?></td>
                                            <td class="text-center"><?php echo $row['nombre']; ?></td>
                                            <td class="text-center"><?php echo $row['descripcion']; ?></td>
                                            <td class="text-center"><?php echo $row['precio']; ?></td>



                                        </tr>

                                    <?php
                                    }




                                    ?>

                                </tbody>
                            </table>
                        </div><br><br>
                    </div>
                    </div>
                    </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <?php
                    require("footer.php");

                    ?> 

    </body>

    </html>
<?php
} else {
    header("location:index.php");
} ?>