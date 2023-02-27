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

    <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">
    <!--Todo lo de boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <style>
      .fakeimg {
        height: 200px;
        background: #aaa;
      }
    </style>
    <title>Modificar Usuario </title>
    <!--Fin boostrap -->
  </head>

  <body>
    <?php

    require("navar.php");

    ?>
    <div class="container w-75 bg-amber mt-5 rounded shadow">
      <div class="container mt-5">
        <div class="row">

          <center>
            <div class="col-sm-8">
              <!-- Contenido -->
              <center>
                <h2 class="text">Modificar Usuario</h2>
              </center>
              <?php
              include("conexion.php");
              $cedula = $_REQUEST['cedula'];
              $query = "SELECT * FROM tbltrabajador WHERE idtrabajador='$cedula'";
              $resultado = $conexion->query($query);
              $row = $resultado->fetch_assoc();

              ?>
              <form action="proceso_modificar_trabajador.php" method="POST">

                <div class="mb-3">
                  <label for="documento" class="form-label">Documento</label>
                  <input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo $row['idtrabajador'] ?>" readonly>
                </div>



                <div class="mb-3">
                  <label for="documento" class="form-label">Nombres</label>
                  <input type="text" class="form-control" id="" name="nombre" value="<?php echo $row['nombre'] ?>">
                </div>

                <div class="mb-3">
                  <label for="documento" class="form-label">Teléfono</label>
                  <input type="text" class="form-control" id="" name="telefono" value="<?php echo $row['telefono'] ?>">
                </div>
                
                <center><button type="submit" name="enviar" class="btn btn-success">Enviar</button></center>
              </form>
            </div>
          </center>
        </div>
      </div>
    </div><br><br><br><br><br><br><br><br>

    <div class="mt-3 p-2  text-white text-center" style="background:green
 ;">
  <p>   © 2022 Copyright:</p>
</div> 
  </body>

  </html>
<?php
} else {
  header("Location:index.php");
}
?>