<?php session_start();
if ($_SESSION['usuario']) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="js/funciones.js"></script>
        <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">


        <title>reporte venta</title>
    </head>

    <body>
        <?php include("navar.php")
        ?>
    <div class="container w-80 bg-amber mt-5 rounded shadow"><br>

    

<div class="container w-100 bg-amber mt-5 rounded shadow">
        <table class="table table-bordered   table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">número venta</th>
                    <th scope="col">Cant. Kilos</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Id admin</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    
                    include("conexion.php");
                    $query = "SELECT tblventa.num_venta,tblventa.cantidad_kilos,tblventa.precio,tblventa.fecha,tbladministrador.nombre  FROM tbladministrador INNER JOIN tblventa ON tbladministrador.idadministrador=tblventa.idadministrador;";
                    $consulta = mysqli_query($conexion, $query);
                    while ($row = $consulta->fetch_assoc()) { ?>

                        <td><?php echo $row['num_venta']; ?></td>
                        <td><?php echo $row['cantidad_kilos']; ?></td>
                        <td><?php echo $row['precio']; ?></td>
                        <td><?php echo $row['fecha']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td class="text-center">
                    <a class="btn bg-success " href="modificar_venta.php?cedula=<?php echo $row['num_venta']; ?>" onclick="return confirmacionModificar()">Modificar</a></td>
                </tr>
            <?php
                    }
            ?>
            </tbody>
        </table>



        <div style="width:100px ;">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Total ventas</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    require("conexion.php");
                    $query = "SELECT SUM(tblventa.precio) AS total FROM tbladministrador INNER JOIN tblventa ON tbladministrador.idadministrador=tblventa.idadministrador;";
                    $consulta = mysqli_query($conexion, $query);
                    while ($row = $consulta->fetch_assoc()) { ?>
                        <tr>
                            <td class="bg-success" style="color:white ;"><?php echo number_format($row['total']) ?></td>
                            </td>
                        </tr>
                    <?php
                    }

                    ?>

                </tbody>
            </table>
        </div>


        <?php
        include("conexion.php");
        $query = "SELECT SUM(tblventa.precio) FROM tblventa;";
        $query2 = "SELECT SUM(tblcompra_de_insumo.precio) FROM tblcompra_de_insumo;";

        $consulta = mysqli_query($conexion, $query);
        $consulta2 = mysqli_query($conexion, $query2);
        $row = $consulta->fetch_array();
        $row2 = $consulta2->fetch_array();

        $resultado = $row[0] - $row2[0]; ?>

        <div style="width:100px ;">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Reporte general</th>

                    </tr>
                </thead>
                <tbody>
                    <?php if ($resultado > 0) { ?>

                        <tr>
                            <td class="bg-success" style="color:white ;"><?php echo number_format($resultado); ?></td>


                        <?php   # code...
                    } elseif ($resultado == 0) { ?>
                            <td class="bg-warning" style="color:white ;"><?php echo number_format($resultado); ?></td>


                        <?php   # code...
                    } else { ?>
                            <td class="bg-danger" style="color:white ;"><?php echo number_format($resultado); ?></td>

                        <?php # code...
                    }
                        ?>
                        </tr>

                </tbody>
            </table>
        </div></div><br></div>

        <div class="mt-3 p-2  text-white text-center" style="background:green
 ;">
            <p> © 2022 Copyright:</p>
        </div>
    </body>

    </html>
<?php
} else {
    header("location:index.php");
} ?>