<?php

$data = file_get_contents("php://input");
require("../../../controller/database.php");

try {
    $query = $pdo->prepare("SELECT * FROM insumo ORDER BY id_insumo ASC");
    $query->execute();

    if ($data != "") {
        $query = $pdo->prepare("SELECT * FROM insumo WHERE id_insumo LIKE '%" . $data . "%' OR nombre_insumo LIKE  '%" . $data . "%' OR  cantidad_insumo LIKE '%" . $data . "%' OR fecha_compra_insumo LIKE '%" . $data . "%'OR valor_insumo LIKE '%" . $data . "%' OR id_proveedor LIKE '%" . $data . "%' OR id_categoria_insumo LIKE '%" . $data . "%'");
        $query->execute();
    }

    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Conexion fallida " . $e->getMessage();
    die();
}
echo json_encode($resultado);


$pdo = null;
