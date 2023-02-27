<?php
include("conexion.php");

$idcompra = $_REQUEST['idcompra'];
/*aca se pone despues del posrt como esta en el name del form */
$precio = $_POST['precio'];
$cantidad=$_POST['cantidad'];
$fecha = $_POST['fecha'];
$insumo=$_POST['insumo'];

$query = "UPDATE tblcompra_de_insumo SET precio='$precio',cantidad='$cantidad', fecha='$fecha',idinsumo='$insumo' WHERE idcompra='$idcompra' ";

$resultado = $conexion->query($query);

if($resultado){
header("location: ver_reporte_insumo.php");
}
else{

//echo"No se realizo la actualizacion";


}


?>