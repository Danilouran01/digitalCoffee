<?php session_start();
if ($_SESSION['usuario']){
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">
    <style>
    .fakeimg {
      height: 200px;
      background: #aaa;
    }
  </style>

    <title>Document</title>
</head>
<body>
<?php
require("navar.php");
?>

 <div class="container w-75 bg-amber mt-5 rounded shadow">
    <center><div class="row align-items-stretch" >
    <h2  class="fw-bold text-center py-5">REGISTRAR TRABAJO SIN INSUMO</h2>
<form action="sin_insumo.php" method="POST">
<center>
<div class="mb-3">

    <h5><label>Tipo de trabajo</label></h5>
    <select class="form-select" name="tipoTrabajo" aria-label="Default select example">
     <option >Seleccione</option>
     <?php
      include("conexion.php");
   
      $query = "SELECT * FROM tbltipotrabajo  WHERE Requiere_insumo='0'";
    
      $resultado=$conexion->query($query);
       
      while($row = $resultado -> fetch_assoc()){
        
     ?>
     <option value="<?php echo $row['idtipotrabajo'];?>"> <?php echo $row['descripcion'];?></option>
   
    <?php

    }
    ?>
    </select>
  </div>
  <div class="mb-3">
    <h5><label>Fecha realización</label></h5>
    <input class="form-control" type="date" name="fecha">
  </div>
  <div class="mb-3">
    <h5><label>Lote</label></h5>
    <select class="form-select" name="lote" aria-label="Default select example">
     <option >Seleccione</option>
     <?php
      include("conexion.php");
   
      $querylote = "SELECT * FROM tbllote";
    
      $resultadolote=$conexion->query($querylote);
       
      while($fila = $resultadolote -> fetch_assoc()){
        
     ?>
     <option value="<?php echo $fila['idlote'];?>"> <?php echo $fila['nombre'];?></option>
   
    <?php

    }
    ?>
    </select>
  </div>
  <div class="mb-3">
    <h5><label>Jornada</label></h5>
    <select class="form-select" name="jornada" aria-label="Default select example">
     <?php
      include("conexion.php");
   
      $queryjornada = "SELECT * FROM tbljornada";
    
      $resultadojornada=$conexion->query($queryjornada);
       
      while($fila = $resultadojornada -> fetch_assoc()){
        
     ?>
     <option value="<?php echo $fila['idjornada'];?>"> <?php echo $fila['Descripcion'];?></option>
   
     <?php

     }
     ?>
    </select>
  </div>
  <div class="mb-3">
    <h5><label>Trabajador</label></h5>
    <select class="form-select" name="trabajador" aria-label="Default select example">
     <option >Seleccione</option>
       <?php
       include("conexion.php");
   
       $querytrabajador = "SELECT * FROM tbltrabajador";
    
       $resultadotrabajador=$conexion->query($querytrabajador);
       
       while($fila = $resultadotrabajador -> fetch_assoc()){
        
      ?>
     <option value="<?php echo $fila['idtrabajador'];?>"> <?php echo $fila['nombre'];?></option>
   
      <?php
 
      }
      ?>
    </select>
  </div>
  <div class="mb-3">
     
    <button type="submit" class="btn btn-primary" name="enviado" style="background:green ;">Registrar</button>
    </div></center>
</form>
    
   <?php
   
        if(isset($_REQUEST['enviado'])){
           $trabajador=$_REQUEST['trabajador'];
           $lote=$_REQUEST['lote'];
           $tipoTrabajo=$_REQUEST['tipoTrabajo'];
           $fecha=$_REQUEST['fecha'];
           $jornada=$_REQUEST['jornada'];

        
            require("conexion.php");

            $query3="INSERT INTO tbltrabajo(idtrabajo,fecha,cantidad_kilos,idlote,idtipotrabajo,idjornada) VALUES ('','$fecha','','$lote','$tipoTrabajo','$jornada')";
            $resultado3=mysqli_query($conexion,$query3);
            $ultimo_id=mysqli_insert_id($conexion);

              if($resultado3){
                //echo $ultimo_id ."cedula ".$trabajador;
                require("conexion.php");
                $query2="INSERT INTO tbltrabajadorxtrabajo(idtrabajadorxtrabajo, idtrabajo, idtrabajador) VALUES ('','$ultimo_id','$trabajador')";
                $resultado2=mysqli_query($conexion,$query2);

                 if ($resultado2) {
                   // echo"consulta intermedia realizada";
                 }     
                }else{
               // echo"No se ingreso el registro";
             }
        }
    
       









?>
</div></center></div>
<div class="mt-3 p-2  text-white text-center" style="background:green
 ;">
  <p>   © 2022 Copyright:</p>
</div> 
</body>
</html>
<?php
    }else{
      header("location:index.php");
  }?>

