<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


   
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-light" style="color:blanchedalmond">
        
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
               <li class="nav-item">
                <a class="nav-link" href="home.php">Inicio</a>
              </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Gestionar reportes 
                </a>
                <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink" style="background-color:#DAF7A6;">
                  <li><a class="dropdown-item" href="ver_trabajador_recoleccion.php">Consultar reporte de kilos</a></li>
                  <li><a class="dropdown-item" href="ver_trabajador_dia.php">Consultar reporte de trabajos al día</a></li>
                  
                  <li><a class="dropdown-item" href="ver_reporte_insumo.php">Reporte de insumos</a></li>
                  <li><a class="dropdown-item" href="ver_reporte_trabajo_entre_fechas.php">Listar reporte entre fechas</a></li>
                </ul>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" >Registrar venta</a>
              </li> -->

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Gestionar Compra y venta
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="registrar_venta.php">Registrar venta</a></li>
                  <li><a class="dropdown-item" href="registrar_compra_insumo.php">Registrar Compra</a></li>
                  <li><a class="dropdown-item" href="ver_reporte_insumo.php">Listar Reporte Insumo</a></li>
                  </li>
                  <li><a class="dropdown-item" href="ver_reporte_venta.php">Listar Reporte Venta</a></li>

                  <li><a class="dropdown-item" href="ver_reporte_trabajo_entre_fechas.php">Listar reporte entre fechas</a></li>
                 
                  
                </ul>
              </li>
              

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Gestionar trabajo
                </a>


                <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink" style="background-color:#DAF7A6;">
                  <li><a class="dropdown-item" href="recoleccion.php">Registrar Recolección</a></li>
                  <li><a class="dropdown-item" href="sin_insumo.php">Registar trabajo sin insumo</a></li>
                  <li><a class="dropdown-item" href="con_insumo.php">Registrar trabajo con insumo</a></li>
                  <li><a class="dropdown-item" href="modificar_precio.php">Modificar precio</a></li>
                </ul>
              </li>



              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Gestionar trabajador
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="registro_trabajador.php">Registrar trabajador</a></li>
                  <li><a class="dropdown-item" href="ver_trabajador.php">Listar Trabajadores</a></li>
                 
                </ul>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="nuevo_admi.php" onclick="return confirmaradmin()">Crear un nuevo administrador</a>
              </li> -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Gestionar registro
                </a>


                <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink" style="background-color:#DAF7A6;">
                  <li><a class="dropdown-item" href="registrar_lote.php">Registrar lote</a></li>
                  <li><a class="dropdown-item" href="registrar_insumo.php">Registar  insumo</a></li>
                  <li><a class="dropdown-item" href="registrar_tipo_trabajo.php">Registar  tipo de trabajo</a></li>
                  
                </ul>
              </li>




              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Gestionar administrador
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="nuevo_admi.php" >Crear un nuevo administrador</a></li>
                  <li><a class="dropdown-item" href="cambio_contrasena.php">Cambiar contraseña</a></li>
                 
                </ul>
            </ul>

           
          </div>
        </div>
 

                <h5 class="mb-2 "><strong style="color:black;font-size:20px;"><?php echo $_SESSION['nombre'] . "  "; ?></strong></h5>

                <img src="images/avatar.jpg" class="rounded-circle mb-3" style="width: 60px;" alt="Avatar" />

                <br>
                <h5 class="mb-2 "><strong style="color:black;font-size:20px;"><?php echo " Administrador" ; ?></strong></h5>
                <!-- <span class="badge bg-primary" style="color:black;font-size:15px;"><?php

                                                echo " Administrador";

                                                ?></span> -->
                                                <span class="badge ">

<a href="salir.php" class="btn btn-success" style="float: right;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
  <path d="M7.5 1v7h1V1h-1z"/>
  <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
</svg></a>

</span></p>

            </div>
        </div>
    </nav>