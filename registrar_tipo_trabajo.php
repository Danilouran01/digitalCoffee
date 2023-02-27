<?php
session_start();
if ($_SESSION['usuario']){
    
    ?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
  <title>Registrar lote</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>


    <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">

  <style>
    .fakeimg {
      height: 200px;
      background: #aaa;
    }
  </style>
</head>
    <body>

    <?php
     require("navar.php");
    ?>
      
      <div class="container w-75 bg-amber mt-5 rounded shadow"
     <center><div class="row align-items-stretch" >
                    <!-- Contenido -->
                   <center> <h2>Registar tipo de trabajo</h2><br><br>
                    <form method="POST" action="registrar_tipo_trabajo.php">
                    <div class="mb-3">
                        <h5><label for="Codigo" class="form-label">Nombre del trabajo</label></h5>
                        <input type="int" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="mb-3">
                    <h5><label  class="form-label">Precio trabajo</label></h5>
                        <input type="number" class="form-control"  name="precio">
                    </div>
                    <div class="mb-3">
                    <h5><label  class="form-label">Selecione si requiere insumo</label></h5>
                    <select class="form-select" name="requiere">
                    <option value="0">NO requiere insumo</option>
                    <option value="1">SI requiere insumo</option>
                    <option value="2">Recolecion</option>
                    </select>
                    </div>
                    <div class="mb-3">
                    <button type="submit" name="enviar" class="btn btn-primary" style="background:green">Enviar</button></center></div>
                    </form>
                    <?php
                        if(isset($_REQUEST['enviar']))
                        {
                            $nombre =$_POST['nombre'];
                            $requiere =$_POST['requiere'];
                            $precio =$_POST['precio'];
                           
                            require("conexion.php");

                            $query = "INSERT INTO tbltipotrabajo (idtipotrabajo,descripcion,Requiere_insumo)
                             VALUES ('','$nombre','$requiere')";
                            $consulta = mysqli_query($conexion,$query);

                            $idtrabajo=mysqli_insert_id($conexion);
                            $fecha= date('y,m,d');
                            if ($consulta) 
                            {
                                //echo "Funcionó la consulta en tipo de trabajo".$idtrabajo;
                                $query2="INSERT INTO tblprecio(cod_precio,precio,fecha,id_tipotrabajo,fecha_fin) VALUES (
                                  '','$precio','$fecha',$idtrabajo,''
                                )";

                                $consulta2 = mysqli_query($conexion,$query2);

                                if ($consulta2) {
                                 //echo "funciono la consulta";
                                }else{
                                  //echo "Error en la consulta2".mysqli_error($conexion);
                                }
                               
                            }
                            else
                            {
                                //echo "Error en la consulta".mysqli_error($conexion);
                            }
                        }

                    ?>

                </div>
             </div>
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
             <?php
require("footer.php");
?> 
    </body>
</html>

<?php
    }else{
      header("location:index.php");
  }?>