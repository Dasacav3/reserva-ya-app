<?php

require("../../../controller/database.php");
$data = file_get_contents("php://input");

try{
    $query = $pdo->prepare("DELETE FROM mesa WHERE id_mesa = :id");
    $query->execute(['id' => $data]);
}catch(PDOException $e){
    echo "Conexión fallida " . $e->getMessage();
}

echo "ok";

$pdo = null;