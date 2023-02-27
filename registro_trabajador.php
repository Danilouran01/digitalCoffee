<?php session_start();
if ($_SESSION['usuario']){
   
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar trabajador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">
  
  </head>
  <body>


  <?php
    require("navar.php");
   
    ?>
   <div class="container w-75 bg-amber mt-5 rounded shadow">

     <center><div class="row align-items-stretch" >
     


             <h2  class="fw-bold text-center py-5">REGISTRAR TRABAJADOR</h2>
             <form method="POST" action="registro_trabajador.php">

            

                <div class="mb-4">
                <center><h5><label for="email" class="form-label"> Identificación</label></h5></center>
                    <input type="text" class="form-control" name="documento">
                </div>
                <div class="mb-4">
                <center><h5><label for="contrasena" class="form-label">Nombre</label></h5></center>
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="mb-4">
                   <center> <h5><label  class="form-label">Teléfono</label></h5></center>
                    <input type="tex" class="form-control" name="telefono" >
                </div>


                <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="enviar" style="background:green ;">Registrar</button><br>
                </div>
                
            </form>
          
            <?php
            if(isset($_REQUEST['enviar']))
                        {
                            $documento = $_REQUEST['documento'];
                            $nombre = $_REQUEST['nombre'];
                           $telefono = $_REQUEST['telefono'];
                            

                            require("conexion.php");

                            $query = "INSERT INTO tbltrabajador(idtrabajador,nombre,telefono)
                             VALUES ('$documento ','$nombre','$telefono')";
                            $consulta = mysqli_query($conexion,$query);
                            if ($consulta) 
                            {
                                echo "<center>Usuario registrado con éxito!</center>";
                                
                            }
                            else
                            {
                               // echo "Error en la consulta".mysqli_error($conexion);
                            }
                        }?>
        </div></center>
   </div>


   <div class="mt-3 p-2  text-white text-center" style="background:green
 ;">
  <p>   © 2022 Copyright:</p>
</div> 
  
  </body>
</html>

<?php
}
else{
    header("location:index.php");
}?>
