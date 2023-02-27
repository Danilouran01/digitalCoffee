<?php session_start();
if ($_SESSION['usuario']){
    
    ?>
    
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Todo lo de boostrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
        <script src="js/funciones.js"></script>


        <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">


        <style>
        .fakeimg {
        height: 200px;
        background: #aaa;
        }

        .table-bordered {
        --bs-table-bg: #495057;
        --bs-table-striped-bg: #2c3034;
        --bs-table-striped-color: #fff;
        --bs-table-active-bg: #373b3e;
        --bs-table-active-color: #fff;
        --bs-table-hover-bg: #323539;
        --bs-table-hover-color: #fff;
        color: #fff;
        border-color: #373b3e;


        
        }

    .text-info{

        color: #2c3034;
    }
    </style>
    
        <title>Lista de usuarios recolección</title>
    </head>

    <body>
    <?php
    require("navar.php");

    ?>
    

    <form action="ver_trabajador_recoleccion.php" method="get">
    <center>
    <input type="text" name="busqueda" placeholder="Ingrese la cédula ">
    <input type="submit" name="buscar" value="Buscar">
    </center>
    </form>

    <?php


    if(isset($_REQUEST['buscar'])){
    $buscar=$_GET['busqueda'];

    require("conexion.php");
    $query="SELECT tbltrabajador.idtrabajador,tbltrabajador.nombre,tbltrabajador.telefono,tbltrabajo.fecha,tblprecio.precio,tbltrabajo.cantidad_kilos,tbllote.nombre AS NOMBRE ,(tbltrabajo.cantidad_kilos*tblprecio.precio) AS total FROM tbltrabajador INNER JOIN tbltrabajadorxtrabajo ON tbltrabajador.idtrabajador=tbltrabajadorxtrabajo.idtrabajador
    INNER JOIN tbltrabajo ON tbltrabajadorxtrabajo.idtrabajo=tbltrabajo.idtrabajo
    INNER JOIN tbltipotrabajo ON tbltrabajo.idtipotrabajo=tbltipotrabajo.idtipotrabajo
    INNER JOIN tbllote ON tbllote.idlote=tbltrabajo.idlote
    INNER JOIN tblprecio ON
    tblprecio.id_tipotrabajo=tbltipotrabajo.idtipotrabajo 
   WHERE tbltipotrabajo.Requiere_insumo='2' AND tbltrabajador.idtrabajador='$buscar' AND tbltrabajo.fecha >= tblprecio.fecha AND IF(tblprecio.fecha_fin!='0000-00-00',tbltrabajo.fecha<tblprecio.fecha_fin,TRUE);";
    $resultado=mysqli_query($conexion,$query);
    
    if ($resultado) {
        $rowcount=mysqli_num_rows($resultado);
        //echo "The total number of rows are: ".$rowcount; 
        if ($rowcount>=1) {
        

    ?>
   <div class="container w-80 bg-amber mt-5 rounded shadow">

<center>  <h2 class="text-center" style="color:black;">Listado de usuarios </h2></center>

<div class="container w-100 bg-amber mt-5 rounded shadow">
    
<table  class="table table-bordered border-white  table-hover table-sm" > 
        <thead >
        <tr>
        <th  class="text-center">Número cédula</th>
        <th class="text-center">Nombre</th>
        <th class="text-center" >Teléfono</th>
        <th class="text-center"> Fecha de la recolección</th>
        <th class="text-center"> Kilos recolectados</th>
        <th class="text-center"> Precio por kilo</th>
        <th class="text-center"> valor a pagar</th>
        <th class="text-center"> acciones</th>
    
    
        </tr>

    </thead> 
    <tbody >
    
    <?php

    while($row = $resultado->fetch_assoc()){
    ?>
    <tr>
        <td class="text-center"><?php echo $row['idtrabajador'];?></td>
        <td     class="text-center"><?php echo $row['nombre'];?></td>
        <td    class="text-center"><?php echo $row['telefono'];?></td>
        <td    class="text-center"><?php echo $row['fecha'];?></td>
        <td    class="text-center"><?php echo $row['cantidad_kilos'];?></td>
        <td    class="text-center"><?php echo $row['precio'];?></td>
        <td    class="text-center"><?php echo $row['total'];?></td>


        <td class="text-center">
            <a class="btn btn-info" 
            href="ver_trabajador_recoleccion.php">Limpiar</a>
        </td>
    </tr>

    <?php
        }
        }
    }else {
        //echo "no funciono";
    }

}else
      //echo"<br>Datos incorrectos";


    ?>
    
    </tbody>
    </table>


    <div class="container w-80 bg-amber mt-5 rounded shadow">

    <center>  <h2 class="text-center" style="color:black;">Listado de usuarios </h2></center>

    <div class="container w-100 bg-amber mt-5 rounded shadow">
    <?php

    require("conexion.php");
    $query="SELECT tbltrabajador.idtrabajador,tbltrabajador.nombre,tbltrabajador.telefono,tbltrabajo.fecha,tblprecio.precio,tbltrabajo.cantidad_kilos,tbllote.nombre AS NOMBRE ,(tbltrabajo.cantidad_kilos*tblprecio.precio) AS total FROM tbltrabajador INNER JOIN tbltrabajadorxtrabajo ON tbltrabajador.idtrabajador=tbltrabajadorxtrabajo.idtrabajador
    INNER JOIN tbltrabajo ON tbltrabajadorxtrabajo.idtrabajo=tbltrabajo.idtrabajo
    INNER JOIN tbltipotrabajo ON tbltrabajo.idtipotrabajo=tbltipotrabajo.idtipotrabajo
    INNER JOIN tbllote ON tbllote.idlote=tbltrabajo.idlote
    INNER JOIN tblprecio ON
    tblprecio.id_tipotrabajo=tbltipotrabajo.idtipotrabajo 
   WHERE tbltipotrabajo.Requiere_insumo='2' AND tbltrabajo.fecha >= tblprecio.fecha AND IF(tblprecio.fecha_fin!='0000-00-00',tbltrabajo.fecha<tblprecio.fecha_fin,TRUE);";
   
   
    
    $resultado=mysqli_query($conexion,$query);
    
   
        

    ?>
    
    <table  class="table table-bordered border-white  table-hover table-sm" > 
        <thead >
        <tr>
        <th  class="text-center">Número cédula</th>
        <th class="text-center">Nombre</th>
        <th class="text-center" >Teléfono</th>
        <th class="text-center"> Fecha de la recolección</th>
        <th class="text-center"> Kilos recolectados</th>
        <th class="text-center"> Lote en el que se recolecto</th>
        <th class="text-center"> Precio por kilo</th>
        <th class="text-center"> Valor a pagar</th>
       
    
    
        </tr>

    </thead> 
    <tbody >
    <?php

    while($row = $resultado->fetch_assoc()){
    ?>
    <tr>
        <td class="text-center"><?php echo $row['idtrabajador'];?></td>
        <td     class="text-center"><?php echo $row['nombre'];?></td>
        <td    class="text-center"><?php echo $row['telefono'];?></td>
        <td    class="text-center"><?php echo $row['fecha'];?></td>
        <td    class="text-center"><?php echo $row['cantidad_kilos'];?></td>
        <td    class="text-center"><?php echo $row['NOMBRE'];?></td>
        <td    class="text-center"><?php echo $row['precio'];?></td>
        <td    class="text-center"><?php echo $row['total'];?></td>


        
            
    </tr>

    <?php
    }
        
   


    ?>
    
    </tbody>
    </table>
    </div><br><br>
          </div></div></div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    
    </body> <div class="mt-3 p-2  text-white text-center" style="background:green
 ;">
  <p>   © 2022 Copyright:</p>
</div>
    </html>

    <?php
    }else{
      header("location:index.php");
  }?>