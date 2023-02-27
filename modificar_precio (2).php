<?php session_start();
if ($_SESSION['usuario']) {

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
     <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">
    <title>Modificar precio</title>



  <body>
    <?php require("navar.php");
    ?>




    <center>
      <div class="row align-items-stretch  rounded shadow" style="width:300px ;">
        <center>
          <h4>Nuevo precio</h4>
        </center>
        <form action="" method="get">

          <label for="">Seleccione el trabajo </label>
          <select class="form-select" name="trabajo" aria-label="Default select example">

            <?php
            include("conexion.php");

            $queyprecio = "SELECT idtipotrabajo,descripcion FROM `tbltipotrabajo` ORDER BY descripcion ASC ;";
            $resultado1 = $conexion->query($queyprecio);

            while ($fila = $resultado1->fetch_assoc()) {

            ?>
              <option value="<?php echo $fila['idtipotrabajo']; ?>"> <?php echo $fila['descripcion']; ?></option>

            <?php

            }
            ?>

          </select><br>
          <label for="">Nuevo precio</label><br>
          <input type="text" name="precio" placeholder="ingrese el nuevo precio"><br><br>
          <input class="btn btn-success" type="submit" name="enviar" value="Enviar">

        </form>
      </div>
    </center>


    <!------------------------------------------------------------>

    <?php
    if (isset($_REQUEST['enviar'])) {
      $trabajo = $_REQUEST['trabajo'];
      $precio = $_REQUEST['precio'];

      require("conexion.php");
      $query = "SELECT `cod_precio` FROM `tblprecio` WHERE tblprecio.id_tipotrabajo='$trabajo' ORDER BY cod_precio DESC LIMIT 1;";
      $consulta = mysqli_query($conexion, $query);
      $rowcount = mysqli_num_rows($consulta);
      if ($rowcount > 0) {
        $row = $consulta->fetch_array();
        //echo $row[0] . "<br>";
        $fecha = date('Y-m-d ');
        //echo $fecha;

        $query2 = "UPDATE `tblprecio` SET `fecha_fin`='$fecha' WHERE tblprecio.cod_precio= $row[0];";
        $consulta2 = mysqli_query($conexion, $query2);
        if ($consulta2) {
          //echo "funciono la consulta";
          $query4 = "INSERT INTO `tblprecio`(`cod_precio`, `precio`, `fecha`, `id_tipotrabajo`, `fecha_fin`) VALUES ('','$precio','$fecha','$trabajo','');";
          $consulta4 = mysqli_query($conexion, $query4);
          $ul = mysqli_insert_id($conexion);
           if ($consulta4) {
            echo '<script type="text/javascript">
            alert("Se actualizo el precio correctamente");
            window.location.href="modificar_precio.php";
            </script>';
          }else {
             echo '<script type="text/javascript">
             alert("No se ha actualizo el precio, intente nuevamente");
             window.location.href="modificar_precio.php";
             </script>';
          }


        } else {
         // echo "No funciono la consulta";
        }

      } else {
        $fecha = date('Y-m-d ');
       // echo $fecha;
        $query4 = "INSERT INTO `tblprecio`(`cod_precio`, `precio`, `fecha`, `id_tipotrabajo`, `fecha_fin`) VALUES ('','$precio','$fecha','$trabajo','');";
        $consulta4 = mysqli_query($conexion, $query4);
        $ul = mysqli_insert_id($conexion);
        if ($consulta4) {
          echo '<script type="text/javascript">
        alert("Se actualizo el precio correctamente");
        window.location.href="modificar_precio.php";
        </script>';
        } else {
          echo '<script type="text/javascript">
        alert("No se ha actualizo el precio, intente nuevamente");
        window.location.href="modificar_precio.php";
        </script>';
        }
      }
    }

    ?>






    <?php

    require("conexion.php");
    $query3 = "SELECT * FROM `tblprecio` ;";
    // ORDER BY tblprecio.id_tipotrabajo DESC
    $consulta3 = mysqli_query($conexion, $query3); ?>
    <br>
    <table class="table table-bordered ">
      <thead>
        <tr>
          <th scope="col">Código</th>
          <th scope="col">Precio</th>
          <th scope="col">Fecha inicio</th>
          <th scope="col">Fecha fin</th>
          <th scope="col">Trabajo</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row3 = $consulta3->fetch_assoc()) { ?>
          <tr>

            <td><?php echo $row3['cod_precio']; ?></td>
            <td><?php echo $row3['precio']; ?></td>
            <td><?php echo $row3['fecha']; ?></td>
            <td><?php echo $row3['fecha_fin']; ?></td>
            <td><?php echo $row3['id_tipotrabajo']; ?></td>
          </tr> <?php
              }

                ?>

      </tbody>
    </table>



    <div class="mt-3 p-2  text-white text-center" style="background:green
 ;">
  <p>   © 2022 Copyright:</p>
</div> 
  </body>

  </html>

<?php
} else {
  header("location:index.php");
} ?>