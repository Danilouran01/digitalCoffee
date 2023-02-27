<?php
include("conexion.php");

$cedula = $_REQUEST['cedula'];
/*aca se pone despues del posrt como esta en el name del form */
$nombre = $_POST['nombre'];
$telefono=$_POST['telefono'];


$query = "UPDATE tbltrabajador SET nombre='$nombre',telefono='$telefono' WHERE idtrabajador='$cedula' ";

$resultado = $conexion->query($query);

if($resultado){
header("location: ver_trabajador.php");
}
else{

//echo"No se realizo la actualizacion";


}


?>