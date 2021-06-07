<?php

$data = file_get_contents("php://input");
require("../../../controller/database.php");

try {
    $query = $pdo->prepare("SELECT * FROM mesa");
    $query->execute();

    if ($data != "") {
        $query = $pdo->prepare("SELECT * FROM mesa WHERE id_mesa LIKE '%$data%' OR capacidad_mesa LIKE '%$data%' OR estado_mesa LIKE '%$data%'");
        $query->execute();
    }

    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Conexion fallida " . $e->getMessage();
    die();
}

echo json_encode($resultado);

$pdo=null;

