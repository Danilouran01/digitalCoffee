<?php
session_start();
if ($_SESSION['usuario']) {


?>



  
    <!--Inicio menu-->
    <nav class="navbar navbar-expand-lg navbar-light bg-success " style="color:blanchedalmond">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Gestionar reportes
                </a>
                <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink" style="background-color:#DAF7A6;">
                  <li><a class="dropdown-item" href="ver_trabajador_recoleccion.php">consultar reporte de kilos</a></li>
                  <li><a class="dropdown-item" href="ver_trabajador_dia.php">consultar reporte de trabajos al dia</a></li>
                  <li><a class="dropdown-item" href="ver_reporte_trabajo_entre_fechas.php">Reporte general</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="registrar_venta.php">Registrar venta</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Gestionar trabajo
                </a>
                <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink" style="background-color:#DAF7A6;">
                  <li><a class="dropdown-item" href="recoleccion.php">Registrar Recoleccion</a></li>
                  <li><a class="dropdown-item" href="sin_insumo.php">Registar trabajo sin insumo</a></li>
                  <li><a class="dropdown-item" href="con_insumo.php">Regsitar trabajo con insumo</a></li>
                </ul>
              </li>



              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Gestionar trabajador
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="registro_trabajador.php">Registrar trabajador</a></li>
                  <li><a class="dropdown-item" href="ver_trabajador.php">Listar Trabajadores</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!--fin menu-->
      <?php
}else{
header("Location:index.php");

}?>
