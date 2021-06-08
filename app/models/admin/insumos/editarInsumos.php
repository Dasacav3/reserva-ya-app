<?php

$data = file_get_contents("php://input");

include("../../../controller/database.php");

session_start();

$sesion = $_SESSION['datos'];

if ($sesion == null || $sesion = '') {
    echo 'Usted no tiene autorización';
    header("location: ../../views/login.php");
    die();
}

$id = $_POST['id_insumo'];
$nombre_insumo = $_POST['nombreEditar'];
$cantidad_insumo = $_POST['cantidadEditar'];
$fecha_compra_insumo = $_POST['fecha_compra'];
$valor_insumo = $_POST['valorEditar'];
$id_proveedor = $_POST['proveedorEditar'];
$id_categoria_insumo = $_POST['categoriaEditar'];


try {
    $queryInsumo = $pdo->prepare("UPDATE insumo SET nombre_insumo = :nombre_insumo, cantidad_insumo = :cantidad_insumo, fecha_compra_insumo = :fecha_compra_insumo, valor_insumo = :valor_insumo, id_proveedor = :id_proveedor, id_categoria_insumo = :id_categoria_insumo WHERE id_insumo = :id");
    $queryInsumo->bindParam(":nombre_insumo",$nombre_insumo);
    $queryInsumo->bindParam(":cantidad_insumo",$cantidad_insumo);
    $queryInsumo->bindParam(":fecha_compra_insumo",$fecha_compra_insumo);
    $queryInsumo->bindParam(":valor_insumo",$valor_insumo);
    $queryInsumo->bindParam(":id_proveedor",$id_proveedor);
    $queryInsumo->bindParam(":id_categoria_insumo",$id_categoria_insumo);
    $queryInsumo->bindParam(":id",$id);
    $queryInsumo->execute();
} catch (Exception $e) {
    echo "Conexion fallida " . $e->getMessage();
    die();
}


echo "ok";


$pdo = null;
