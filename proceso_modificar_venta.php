<?php
include("conexion.php");

$num_venta = $_REQUEST['num_venta'];
/*aca se pone despues del posrt como esta en el name del form */
$kilos = $_POST['kilos'];
$precio=$_POST['precio'];
$fecha = $_POST['fecha'];

$query = "UPDATE tblventa SET cantidad_kilos='$kilos',precio='$precio', fecha='$fecha' WHERE num_venta='$num_venta' ";

$resultado = $conexion->query($query);

if($resultado){
header("location: ver_reporte_venta.php");
}
else{

//echo"No se realizo la actualizacion";


}


?>