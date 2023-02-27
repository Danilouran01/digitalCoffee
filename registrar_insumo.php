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
    <title>Registrar compra de insumo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


    <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">
   
 
  </head>
  <body>

    <?php
    require("navar.php");
   
    ?>
  
                
   <div class="container w-75 bg-amber mt-5 rounded shadow"
     <center><div class="row align-items-stretch" >
     
             <h2  class="fw-bold text-center py-5">Registrar insumo</h2>
             <form method="POST" action="registrar_insumo.php">




             <div class="mb-4">
                <center><h5><label class="form-label">Ingrese el nombre del insumo</label></h5></center>
                    <input type="text" class="form-control" name="nombre">
                </div>



            
                  

                

                
                <div class="mt-5">
                    <center><button type="submit" class="btn btn-outline-dark"
                    style="background:green ;" id="enviar" name="enviar">Registrar insumo</button></center><br>
                </div>
            </form>
            
        </div></center>
   </div>
   
    <?php
    if (isset($_REQUEST['enviar'])) {

      $nombre=$_REQUEST['nombre'];
      require("conexion.php");

      $query="INSERT INTO tblinsumo(idinsumo,nombre) VALUES ('','$nombre')" ;

      $consulta=mysqli_query($conexion,$query);

      if ($consulta) {
       //echo "funciono la consulta";
      }else{
        //echo "no funciono";
      }
      
    }


    ?><br><br><br><br><br>

<?php
require("footer.php");
?>  
  </body>
</html>


<?php
    }else{
      header("location:index.php");
  }?>