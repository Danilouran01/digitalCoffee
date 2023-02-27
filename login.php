<?php

session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <link rel="" type="" href="estilos/estilos.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicial</title>
    
</head>
<body>


<section class="vh-100 bg-success">
  <div class="container py-5 h-100" >
    <div class="row d-flex justify-content-center align-items-center h-100"  >
      <div class="col col-xl-10" >
        <div class="card" style="border-radius: 1rem;" >
          <div class="row g-0" >
            <div class="col-md-6 col-lg-5 d-none d-md-block"  style="width: 50%;">
              <img src="images/img_log.jpg"
                alt="login form" class="img-fluid" style="height: 100% ;  width: 100%; border-radius: 1rem 0 0 1rem;object-fit: cover;" />
            </div>





            <div class="col-md-6 col-lg-7 d-flex align-items-center"  style="width: 50%;">
              <div class="card-body p-4 p-lg-5 text-black" >
                
              
                 <form  method="POST" action="login.php">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <img src="images/logo.jpg" alt="" style="height: 100px ;  width: 150px; border-radius: 1rem 0 0 1rem;">
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Iniciar sesión en su cuenta</h5>

                  <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example17">Usuario</label>
                    <input name="usuario" type="text" id="form2Example17" class="form-control form-control-lg" placeholder="Ingrese su cédula"/>
                    
                  </div>

                  <div class="form-outline mb-4" >
                  <label class="form-label" for="form2Example27">Contraseña</label>
                    <input name="contraseña"  type="password" id="form2Example27" class="form-control form-control-lg" placeholder="Ingrese su contraseña"/>
                    
                  </div>

                  <div class="pt-1 mb-4">
                    <button name="login" class="btn btn-dark btn-lg btn-block" type="submit" onclick="location.href='home.php'">Ingresar</button>
                  </div>
                  
                  <script type="text/javascript">
                   function validar(){

                    v1=prompt("ingrese su clave de seguridad");
                    
                      window.location.href = window.location.href + "?w1=" + v1;
                   }



                  </script>
                  
                  <?php
                   
// comprobar si tenemos los parametros w1 y w2 en la URL
if (isset($_GET["w1"]) ) {
    // asignar w1 y w2 a dos variables
    $phpVar1 = $_GET["w1"];
    require("conexion.php");
    $query="SELECT * FROM tbladministrador WHERE clave_confirmacion='$phpVar1'";
    $resultado=mysqli_query($conexion,$query);
    if ($resultado) {
      
      if (mysqli_num_rows($resultado)>0) {
      header("location:confirmar_clave.php");
    }}
 
 
    
    echo'<script type="text/javascript">
        alert("La clave es incorecta, intente nuevamente");
       
        </script>'; 
} else {
  // echo'<script type="text/javascript">
  // alert("La clave es incorecta, intente nuevamente");
 
  // </script>'; 
}
?>



                  <a class="small text-muted"  onclick="validar()" >¿Olvidó su contraseña?</a>
                
                </form>


                <?php 
if (isset($_REQUEST['login'])) {
  $usuario=$_REQUEST['usuario'];
  $contraseña=$_REQUEST['contraseña'];
  require('conexion.php');

  $query="SELECT * FROM tbladministrador WHERE idadministrador='$usuario'
  AND PASSWOR='$contraseña'";
  $resultado=mysqli_query($conexion,$query);

  if ($resultado) {
    //echo "<br> funciono la consuta";
    if (mysqli_num_rows($resultado)>0) {
      $row=mysqli_fetch_row($resultado);
      echo "<br>el usuario si existe";
      $_SESSION['usuario']=$usuario;
      $_SESSION['contrasena']=$contraseña;
      $_SESSION['nombre']=$row[2];
      header("location:home.php");
    }
    else{
       echo'<script type="text/javascript">
        alert("credenciales incorrectas, intente nuevamente");
       
        </script>'; 
    }
  }else{
     echo'<script type="text/javascript">
        alert("credenciales incorrectas, intente nuevamente");
       
        </script>';  echo'<script type="text/javascript">
        alert("credenciales incorrectas, intente nuevamente");
       
        </script>'; 
  }
}

?>








                
              </div>
            </div>
          </div>
        </div>
      </div>
 
    </div>
  </div>
  
</section>




<footer class="bg-dark text-center text-white">
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2022 Copyright:
  </div>
  <!-- Copyright -->
</footer>
</body>
</html>