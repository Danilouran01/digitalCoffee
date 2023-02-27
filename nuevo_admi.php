<?php session_start();
if ($_SESSION['usuario']){
   
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
<script src="js/funciones.js"></script>
<link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">
    <title>Nuevo administrador</title>
</head>
<body>
    <?php
    require("navar.php");
    ?>
    <div class="container w-75 bg-amber mt-5 rounded shadow">
     <center><div class="row align-items-stretch" >
     
             <h2  class="fw-bold text-center py-5">Ingrese los datos del nuevo administrador</h2>
             <form method="POST" action="nuevo_admi.php">




             <div class="mb-4">
                <center><h5><label for="documento" class="form-label">Número de documento</label></h5></center>
                    <input type="number" class="form-control" name="documento">
                </div>



            
                  <div class="mb-4">
                   <center> <h5><label  class="form-label"> Nombre</label></h5></center>
                    <input type="text" class="form-control" name="nombre" >
                </div>

                <div class="mb-4">
                   <center> <h5><label  class="form-label">Teléfono</label></h5></center>
                    <input type="text" class="form-control" name="telefono" >
                </div>


                <div class="mb-4">
                   <center> <h5><label  class="form-label">Contraseña</label></h5></center>
                    <input type="text" class="form-control" name="contrasena" >
                </div>



                <div class="mb-4">
                   <center> <h5><label  class="form-label">Clave de confirmación</label></h5></center>
                    <input type="text" class="form-control" name="clave" >
                </div>

                
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary" id="enviar" name="enviar" onclick="return confirmacion()" style="background:green">Registrar administrador</button><br>
                </div>
            </form>
          
        </div></center>
       
   </div>
   
 <?php
if (isset($_REQUEST['enviar'])) {
    $documento=$_REQUEST['documento'];
    $nombre=$_REQUEST['nombre'];
    $telefono=$_REQUEST['telefono'];
    $contrasena=$_REQUEST['contrasena'];
    $clave=$_REQUEST['clave'];
    require("conexion.php");
    $query="INSERT INTO tbladministrador (idadministrador,PASSWOR,nombre,telefono,clave_confirmacion) VALUES ('$documento','$contrasena','$nombre','$telefono','$clave')";
    $resultado=mysqli_query($conexion,$query);

    if ($resultado) {
        //echo "se hizo la insercion";
    }else {
       // echo "no se hizo la insercion";
    }
}
 ?>
 <div class="mt-3 p-2  text-white text-center" style="background:green
 ;">
  <p>   © 2022 Copyright:</p>
</div> 
</body>

</html>
<?php
}else{

    header("location:index.php");
}