<?php
include("conexion.php");
$cedula=$_REQUEST['cedula'];

$query="DELETE FROM tbltrabajador WHERE idtrabajador='$cedula'";
$resultado= $conexion -> query($query);
if($resultado){
    echo"eliminado con exito";
    header("location: ver_trabajador.php");
}
else{
    echo("El Registro no se elimino");
}


?>