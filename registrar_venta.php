<?php
session_start();

if ($_SESSION['usuario']) {
 $idadmistrador=$_SESSION['usuario'];
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


    <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">

   <style>
     /* body{
        background: linear-gradient(to right, #0dcaf0,#6f42c1);
     }
     .row {    background-color:#d63384;
        width:75%;
        } */
  </style> 
 
  </head>
  <body>

    <?php
    require("navar.php");
   
    ?>
  
                
   <div class="container w-75 bg-amber mt-5 rounded shadow">
     <center><div class="row align-items-stretch" >
     
             <h2  class="fw-bold text-center py-5">Ingrese los datos de la venta realizada</h2>
             <form method="POST" action="registrar_venta.php">




             <div class="mb-4">
                <center><h5><label for="contrasena" class="form-label">Ingrese la cantidad de kilos totales que fueron vendidos</label></h5></center>
                    <input type="number" class="form-control" name="cantidad_kilos">
                </div>



            
                  <div class="mb-4">
                   <center> <h5><label  class="form-label"> Indique el precio total</label></h5></center>
                    <input type="number" class="form-control" name="precio" >
                </div>

                <div class="mb-4">
                   <center> <h5><label  class="form-label">Fecha en la que se realizó la venta</label></h5></center>
                    <input type="date" class="form-control" name="fecha" >
                </div>

                
                <div class="mt-3">
                    <button type="submit" class="btn btn-outline-dark" id="enviar" name="enviar" style="background:green ;">Registrar venta</button><br>
                </div>
            </form>
            
        </div></center>
   </div>
   
    <?php
    if (isset($_REQUEST['enviar'])) {

      $cantidad_kilos=$_REQUEST['cantidad_kilos'];
      $precio=$_REQUEST['precio'];

      $fecha=$_REQUEST['fecha'];
      require("conexion.php");

      $query="INSERT INTO tblventa(num_venta,cantidad_kilos,precio,fecha,idadministrador) VALUES ('','$cantidad_kilos','$precio','$fecha','$idadmistrador')" ;

      $consulta=mysqli_query($conexion,$query);

      if ($consulta) {
       //echo "funciono la consulta";
      }else{
       // echo "no funciono";
      }
      
    }


    ?>

<?php
require("footer.php");
?> 
  </body>
</html>
<?php
    }else{
      header("location:index.php");
  }?>