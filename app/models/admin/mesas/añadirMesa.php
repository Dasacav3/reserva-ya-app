<?php
require("../../../controller/database.php");

$capacidad = $_POST['capacidadMesa'];
$estado = 'Disponible';

try{
    $query = $pdo->prepare("INSERT INTO mesa (capacidad_mesa,estado_mesa) VALUES (:capacidad,:estado)");
    $query->execute(['capacidad' => $capacidad, 'estado' => $estado]);
}catch(PDOException $e){
    echo "Conexión fallida " . $e->getMessage();
}

echo "ok";

$pdo = null;