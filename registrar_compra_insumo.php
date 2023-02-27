<?php session_start();
if ($_SESSION['usuario']){
   
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
     
             <h2  class="fw-bold text-center py-5">Ingrese los datos del insumo comprado</h2>
             <form method="POST" action="registrar_compra_insumo.php">

            

             <div class="mb-3">

             <center><h5><label>Nombre del insumo</label></h5></center>
    <select class="form-select" name="insumo" aria-label="Default select example">
    <option value="0">seleccione</option>
        <?php
      include("conexion.php");
   
      $query = "SELECT * FROM tblinsumo";
    
    
       $resultado=$conexion->query($query);
       
       while($row = $resultado -> fetch_assoc()){
        
    ?>
   <option value="<?php echo $row['idinsumo'];?>"> <?php echo $row['nombre'];?></option>
   
    <?php

    }
    ?>
    
    </select>
                                                                    
</div>







                <div class="mb-4">
                <center><h5><label for="contrasena" class="form-label">Cantidad comprada</label></h5></center>
                    <input type="text" class="form-control" name="cantidad">
                </div>
                <div class="mb-4">
                   <center> <h5><label  class="form-label">Precio total</label></h5></center>
                    <input type="number" class="form-control" name="precio" >
                </div>

                <div class="mb-4">
                   <center> <h5><label  class="form-label">Fecha en la que se realizó la compra</label></h5></center>
                    <input type="date" class="form-control" name="fecha" >
                </div>

                <div class="mb-4">
                <center><h5><label>Persona encargada</label></h5></center>
    <select class="form-select" name="administrador" aria-label="Default select example">
    <option value="0">seleccione</option>
        <?php
      include("conexion.php");
   
      $idadministrador = "SELECT idadministrador,nombre FROM tbladministrador";
      $resultado1=$conexion->query($idadministrador );
    
       while($fila = $resultado1 -> fetch_assoc()){
        
    ?>
   <option value="<?php echo $fila['idadministrador'];?>"> <?php echo $fila['nombre'];?></option>
   
    <?php

    }
    ?>
    
    </select>

</div>


  <div class="mt-3 " >
  <center><button type="submit" class="btn btn-outline-dark" id="enviar" name="enviar" style="background:green ;">Registrar</button></center> 
                </div>
            </form>
            <?php
            if(isset($_REQUEST['enviar']))
                        {
                            $precio = $_REQUEST['precio'];
                            $cantidad = $_REQUEST['cantidad'];
                            $codigo=$_REQUEST['insumo'];
                           $fecha= $_REQUEST['fecha'];
                           $idadministrador=$_REQUEST['administrador'];
                            

                            require("conexion.php");

                            $query1 = "INSERT INTO tblcompra_de_insumo(precio,cantidad,fecha,idinsumo,idadministrador)
                             VALUES ('$precio','$cantidad','$fecha','$codigo','$idadministrador')";
                            $consulta = mysqli_query($conexion,$query1);
                            if ($consulta) 
                            {
                               // echo "Funcionó la consulta";
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