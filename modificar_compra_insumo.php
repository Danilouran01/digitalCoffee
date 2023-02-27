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
    <title>Modificar compra de insumo </title>
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
                <h2 >Modificar compra de insumo</h2>
              </center>
              <?php
              include("conexion.php");
              $cedula = $_REQUEST['cedula'];
              $query = "SELECT tblcompra_de_insumo.idcompra,tblcompra_de_insumo.precio,tblcompra_de_insumo.cantidad,tblcompra_de_insumo.fecha,tblinsumo.nombre,tbladministrador.nombre AS admin 
              FROM tblcompra_de_insumo INNER JOIN tblinsumo ON tblinsumo.idinsumo=tblcompra_de_insumo.idinsumo INNER JOIN tbladministrador ON tbladministrador.idadministrador=tblcompra_de_insumo.idadministrador WHERE idcompra='$cedula';";
              $resultado = $conexion->query($query);
              $row = $resultado->fetch_assoc();

              ?>
              <form action="proceso_modificar_compra_insumo.php" method="POST">

                <div class="mb-3">
                  <label for="documento" class="form-label">Número de compra</label>
                  <input type="text" class="form-control" id="cedula" name="idcompra" value="<?php echo $row['idcompra'] ?>" readonly>
                </div>

                <div class="mb-3">
                <label>Nombre del insumo</label>
    <select class="form-select" name="insumo" aria-label="Default select example">
    <option value="0">seleccione</option>
        <?php
      include("conexion.php");
   
      $query1 = "SELECT * FROM tblinsumo";
    
    
       $resultado1=$conexion->query($query1);
       
       while($row1 = $resultado1 -> fetch_assoc()){
        
    ?>
   <option value="<?php echo $row1['idinsumo'];?>"> <?php echo $row1['nombre'];?></option>
   
    <?php

    }
    ?>
    
    </select>
                                                                    
</div>



                <div class="mb-3">
                  <label for="documento" class="form-label">Cantidad comprada</label>
                  <input type="number" class="form-control"  name="cantidad" value="<?php echo $row['cantidad'] ?>">
                </div>

                <div class="mb-3">
                  <label for="documento" class="form-label">Precio de la compra</label>
                  <input type="number" class="form-control"  name="precio" value="<?php echo $row['precio'] ?>">
                </div>

                <div class="mb-3">
                  <label for="documento" class="form-label">Fecha</label>
                  <input type="date" class="form-control"  name="fecha" value="<?php echo $row['fecha'] ?>">
                </div>



                
                <center><button type="submit" name="enviar" class="btn btn-success">Enviar</button></center>
              </form>
            </div>
          </center>
        </div>
      </div>
    </div><br><br><br><br><br><br>

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