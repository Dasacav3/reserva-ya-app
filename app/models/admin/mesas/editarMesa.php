<?php

require("../../../controller/database.php");

$id = $_POST['idMesa'];
$capacidad = $_POST['capacidadMesaUpdate'];
$estado = $_POST['estadoMesa'];

try{
    $query = $pdo->prepare("UPDATE mesa SET capacidad_mesa = :capacidad, estado_mesa = :estado WHERE id_mesa = :id");
    $query->execute(['capacidad' => $capacidad, 'estado' => $estado, 'id' => $id]);
}catch(PDOException $e){
    echo "Conexión fallida " . $e->getMessage();
}

echo "ok";

$pdo = null;