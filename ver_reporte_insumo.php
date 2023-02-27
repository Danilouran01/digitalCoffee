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


    <title>Reporte de insumo</title>
  </head>

  <body>
    <?php require("navar.php"); ?>

    <form action="ver_reporte_insumo.php" method="get">

    <div class="container w-80 bg-amber mt-5 rounded shadow">
<br>
    

<div class="container w-100 bg-amber mt-5 rounded shadow"><br>
<center><h3 class="text-center">Buscar reporte de insumos en especifico</h3></center>

<div style="width:150px ;">

      
        <select class="form-control form-control-sm" name="busqueda">
          <?php
          require("conexion.php");
          $query2 = "SELECT idinsumo,nombre FROM tblinsumo;";
          $consulta = mysqli_query($conexion, $query2);
          while ($fila = $consulta->fetch_assoc()) {
          ?>
            <option value="<?php echo $fila['idinsumo'] ?>"> <?php echo $fila['nombre'] ?></option>

          <?php
          }
          ?>
        </select>
      </div>
      <input type="submit" name="buscar" value="Buscar"><br><br>
    </form>
    <br>

    <?php


    if (isset($_GET['buscar'])) {
      $buscar = $_GET['busqueda'];

      require("conexion.php");
      $query = "SELECT tblcompra_de_insumo.idcompra,tblcompra_de_insumo.precio,tblcompra_de_insumo.cantidad,tblcompra_de_insumo.fecha,tblinsumo.nombre,tbladministrador.nombre AS admin 
      FROM tblcompra_de_insumo INNER JOIN tblinsumo ON tblinsumo.idinsumo=tblcompra_de_insumo.idinsumo INNER JOIN tbladministrador ON tbladministrador.idadministrador=tblcompra_de_insumo.idadministrador 
       WHERE tblinsumo.idinsumo='$buscar';";
      $resultado = mysqli_query($conexion, $query);

      if ($resultado) {
        $rowcount = mysqli_num_rows($resultado);
        // echo "The total number of rows are: " . $rowcount;
        if ($rowcount >= 1) {


    ?>

          <table class="table table-striped table-dark   table-bordered border-white  table-hover table-sm">

            <thead>
              <tr>
                <th scope="col">Id compra</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Fecha</th>
                <th scope="col">Nombre insumo</th>
                <th scope="col">Responsable Compra</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>

              <?php

              while ($row = $resultado->fetch_assoc()) {
              ?>

                <tr>
                  <td><?php echo $row['idcompra'] ?></td>
                  <td><?php echo $row['precio'] ?></td>
                  <td><?php echo $row['cantidad'] ?></td>
                  <td><?php echo $row['fecha'] ?></td>
                  <td><?php echo $row['nombre'] ?></td>
                  <td><?php echo $row['admin'] ?></td>
                  <td><a class="btn btn-success" href="ver_reporte_insumo.php">Limpiar</a>
                 
                    <a class="btn btn-success " href="modificar_compra_insumo.php?cedula=<?php echo $row['idtrabajador']; ?>" onclick="return confirmacionModificar()">Editar</a>
                  </td>
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
                  <th scope="col">Total compras</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $buscar = $buscar;
                require("conexion.php");
                $query = "SELECT SUM(tblcompra_de_insumo.precio)AS total FROM tblcompra_de_insumo INNER JOIN tblinsumo ON tblinsumo.idinsumo=tblcompra_de_insumo.idinsumo INNER JOIN tbladministrador ON tbladministrador.idadministrador=tblcompra_de_insumo.idadministrador WHERE tblinsumo.idinsumo='$buscar';";
                $consulta = mysqli_query($conexion, $query);
                while ($row = $consulta->fetch_assoc()) { ?>
                  <tr>
                    <td class="bg-success" style="color:white ;"><?php echo number_format($row['total'])   ?></td>
                    </td>
                  </tr>
                <?php
                }
                // SUM(tblcompra_de_insumo.precio)AS total
                ?>

              </tbody>
            </table>
          </div>


    <?php

        }
      }
    } else
      //  echo"<br>Datos incorrectos";


    ?></div>


<div class="container w-80 bg-amber mt-5 rounded shadow">

<h3 class="text-center">Reporte de insumos</h3>

<div class="container w-100 bg-amber mt-5 rounded shadow">

   
    <table class="table  table-bordered
    border-black   table-hover table-sm">
      <thead>
        <tr>
          <th scope="col">Id compra</th>
          <th scope="col">Precio</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Fecha</th>
          <th scope="col">Nombre insumo</th>
          <th scope="col">Responsable Compra</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
      require("conexion.php");
      $query = "SELECT tblcompra_de_insumo.idcompra,tblcompra_de_insumo.precio,tblcompra_de_insumo.cantidad,tblcompra_de_insumo.fecha,tblinsumo.nombre,tbladministrador.nombre AS admin 
          FROM tblcompra_de_insumo INNER JOIN tblinsumo ON tblinsumo.idinsumo=tblcompra_de_insumo.idinsumo INNER JOIN tbladministrador ON tbladministrador.idadministrador=tblcompra_de_insumo.idadministrador;";
      $consulta = mysqli_query($conexion, $query);
      while ($row = $consulta->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row['idcompra'] ?></td>
            <td><?php echo $row['precio'] ?></td>
            <td><?php echo $row['cantidad'] ?></td>
            <td><?php echo $row['fecha'] ?></td>
            <td><?php echo $row['nombre'] ?></td>
            <td><?php echo $row['admin'] ?></td>
            <td>
            <a class="btn btn-success " href="modificar_compra_insumo.php?cedula=<?php echo $row['idcompra']; ?>" onclick="return confirmacionModificar()">Modificar</a>
                  </td>
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
            <th scope="col">Total compras</th>

          </tr>
        </thead>
        <tbody>
          <?php
          require("conexion.php");
          $query = "SELECT SUM(tblcompra_de_insumo.precio)AS total FROM tblcompra_de_insumo INNER JOIN tblinsumo ON tblinsumo.idinsumo=tblcompra_de_insumo.idinsumo INNER JOIN tbladministrador ON tbladministrador.idadministrador=tblcompra_de_insumo.idadministrador;";
          $consulta = mysqli_query($conexion, $query);
          while ($row = $consulta->fetch_assoc()) { ?>
            <tr>
              <td class="bg-success" style="color:white ;"><?php echo number_format($row['total'])  ?></td>
              </td>
            </tr>
          <?php
          }
          // SUM(tblcompra_de_insumo.precio)AS total
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


            <?php   
          } elseif ($resultado == 0) { ?>
              <td class="bg-warning" style="color:white ;"><?php echo number_format($resultado); ?></td>


            <?php   
          } else { ?>
              <td class="bg-danger" style="color:white ;"><?php echo number_format($resultado); ?></td>

            <?php 
          }
            ?>
            </tr>

        </tbody>
      </table>
    </div><br></div><br><br></div></div>
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