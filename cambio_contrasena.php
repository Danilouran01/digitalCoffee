<?php session_start();
if ($_SESSION['usuario']){
   $idadmin=$_SESSION['usuario'];
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
<script src="js/funciones.js"></script>

    <title>Cambiar contraseña</title>
</head>
<body>
    <?php
    require("navar.php");
    ?>
    <div class="container w-75 bg-amber mt-5 rounded shadow">
     <center><div class="row align-items-stretch" >
     
             <h2  class="fw-bold text-center py-5">Restablecer contraseña</h2>
             <form method="POST" action="cambio_contrasena.php">



                <div class="mb-4">
                   <center> <h5><label  class="form-label">Ingrese su nueva contraseña</label></h5></center>
                    <input type="password" class="form-control" name="contrasena" >
                </div>



                <div class="mb-4">
                   <center> <h5><label  class="form-label">Repita su contraseña</label></h5></center>
                    <input type="password" class="form-control" name="contrasena1" >
                </div>

                
                <div class="mt-3">
                    <button 
                    style="background: green;" type="submit" class="btn btn-primary" id="enviar" name="enviar" onclick="return confirmacion1()">Cambiar contraseña</button><br>
                </div>
            </form>
            
        </div></center>
   </div>

 <?php
if (isset($_REQUEST['enviar'])) {
    
    $contrasena=$_REQUEST['contrasena'];
    $contrasena1=$_REQUEST['contrasena1'];
    if ($contrasena==$contrasena1) {
     require("conexion.php");
        $query="UPDATE tbladministrador SET PASSWOR='$contrasena' WHERE idadministrador='$idadmin'";


         $resultado=mysqli_query($conexion,$query);
         if($resultado){
        echo'<script type="text/javascript">
        alert("Se actualizó la contraseña correctamente");
        window.location.href="salir.php";
        </script>';}
        else{
             echo'<script type="text/javascript">
         alert("no actualizo la contraseña correctamente, por favor vuelva a intentarlo");
         window.location.href="cambio_contrasena.php";
             </script>';
         //echo "no funcionó".mysqli_error($conexion);
        }
        }
    else{  echo'<script type="text/javascript">
        alert("los datos de los campos no coinciden, por favor verifique de nuevo");
       
        </script>';}
   
}

 ?><br><br><br><br>
<?php
require("footer.php");
?> 
</body>
</html>
<?php
}else{

    header("location:index.php");
}