<?php session_start();
if ($_SESSION['usuario']){
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Registro de trabajo con insumo</title>
</head>

<body>
<?php
    require("navar.php");
 ?>
   <!-- <a href="salir.php" class="btn btn-success" style="float: right;">Salir</a> -->

   <div class="container w-75 bg-amber mt-5 rounded shadow">
    <center><div class="row align-items-stretch" >

    <h2  class="fw-bold text-center py-5">REGISTRAR TRABAJO CON INSUMO</h2>
<form action="con_insumo.php" method="POST">
<div class="mb-3">
    <h5><label>Tipo de trabajo</label></h5>
    <select class="form-select" name="tipoTrabajo" aria-label="Default select example">
      <option >Seleccione</option>
        <?php
        include("conexion.php");
   
         $query = "SELECT * FROM tbltipotrabajo  WHERE Requiere_insumo='1'";
    
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
     <input type="date" class="form-control" name="fecha">

</div>

     <!-- </select> -->
     <div class="mb-3">
    <h5><label>Lote</label></h5>
    <select class="form-select" name="lote" aria-label="Default select example">
      <option >Seleccione</option>
        <?php
        include("conexion.php");
   
        $queryjornada = "SELECT * FROM tbllote";
    
        $resultadojornada=$conexion->query($queryjornada);
       
        while($fila = $resultadojornada -> fetch_assoc()){
        
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
  <option >Seleccione</option>
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
     <h5><label>Insumo</label></h5>
     <select class="form-select" name="insumo" aria-label="Default select example">
  <option >Seleccione</option>
      <?php
       include("conexion.php");
   
       $queryjornada = "SELECT * FROM tblinsumo";
    
       $resultadojornada=$conexion->query($queryjornada);
       
       while($fila = $resultadojornada -> fetch_assoc()){
        
      ?>
     <option value="<?php echo $fila['idinsumo'];?>"> <?php echo $fila['nombre'];?></option>
   
    <?php

    }
    ?>
     </select>
     </div>
     <div class="mb-3">
     <h5><label class="form-label">Cantidad</label></h5>
    <input class="form-control" type="number" name="cantidad">
     </div>
     <div class="mb-3"> 
    <h5><label class="form-label">Medida</label></h5>
    <select class="form-select" name="medida" aria-label="Default select example">
    <option >Seleccione</option>
     <option value="mg">Miligramos </option>
     <option value="cm">Centimetros </option>
     <option value="L">Litros </option>
     <option value="gr">Gramo </option>
     <option value="kl">Kilogramos </option>
     <option value="ml">Mililitros </option>
    </select>

     </div>
     <div class="mb-3">
    <h5><label>Trabajador</label></h5>
    <select class="form-select" name="trabajador" aria-label="Default select example">
    <option >Seleccione</option>
      <?php
      include("conexion.php");
   
      $queryjornada = "SELECT * FROM tbltrabajador";
    
      $resultadojornada=$conexion->query($queryjornada);
       
      while($fila = $resultadojornada -> fetch_assoc()){
        
      ?>
     <option value="<?php echo $fila['idtrabajador'];?>"> <?php echo $fila['nombre'];?></option>
   
    <?php

    }
    ?>
   </select>
   </div>
   <div class="mb-3">
  <button type="submit" class="btn btn-primary" name="envia" style="background:green ;">Registrar</button>

   </div>
   
</form>
<?php
  if(isset($_REQUEST['envia'])){

    $trabajador=$_REQUEST['trabajador'];
    $insumo=$_REQUEST['insumo'];
    $medida=$_REQUEST['medida'];
    $lote=$_REQUEST['lote'];
    $tipoTrabajo=$_REQUEST['tipoTrabajo'];
    $cantidad=$_REQUEST['cantidad'];
    $fecha=$_REQUEST['fecha'];
    $jornada=$_REQUEST['jornada'];


    // $queryprecio="SELECT * FROM tblprecio WHERE id_tipotrabajo='$tipoTrabajo' AND fecha_fin='0000/00/00';";
    // $consultaprecio=mysqli_query($conexion,$queryprecio);
    // if ($consultaprecio) {
    //   $row =$consultaprecio->fetch_array();
    //   $codprecio=$row[0];
      
    // }

    require("conexion.php");
    $query=$conexion->prepare("INSERT INTO tblaplicacion(idaplicacion, cantidad, unidad_de_medida, idinsumo) VALUES ('','$cantidad','$medida','$insumo')");
    $query->execute();
    $idaplicacion=mysqli_insert_id($conexion);

         if($query){

           //echo $idaplicacion;
           //echo"funciono la insersion apliacacion <br>";
           $query2=$conexion->prepare("INSERT INTO tbltrabajo(idtrabajo,fecha,cantidad_kilos,idlote,idtipotrabajo,idjornada) VALUES ('','$fecha','','$lote','$tipoTrabajo','$jornada')");
            $query2->execute();
            $idtrabajo=mysqli_insert_id($conexion);
            
               if($query2){
                  //echo"funciono la insersion trabajo<br>";
                  echo $idtrabajo;
                  $query3=$conexion->prepare("INSERT INTO tbltrabajo_aplicacion(idaplicacion, idtrabajo) VALUES ('$idaplicacion','$idtrabajo')");
                  $query3->execute();
                  $query4=$conexion->prepare("INSERT INTO tbltrabajadorxtrabajo(idtrabajadorxtrabajo, idtrabajo, idtrabajador) VALUES ('','$idtrabajo','$trabajador')");
                  $query4->execute();

                   if($query3 && $query4){
                    //echo"funciono la insersion trabajo trabajador<br>";
                    //echo"funciono la insersion trabajo Aplicacion<br>";

                   }else{
                    //echo"no funciono la consulta".mysqli_error($conexion);
                    }


                  
                }else{
                //echo"no funciono la consulta".mysqli_error($conexion);
                }
               
     }else{
       //echo"no funciono la consulta".mysqli_error($conexion);

    }
  }else {
    //echo"no funciono la consulta".mysqli_error($conexion);
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

