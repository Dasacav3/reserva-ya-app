<?php

$data = file_get_contents("php://input");
require("../../../controller/database.php");


try {
    $query = $pdo->prepare("SELECT id_cliente,nombre_cliente,apellido_cliente FROM cliente");
    $query->execute();
}catch (Exception $e) {
    echo "Conexion fallida " . $e->getMessage();
    die();
}

echo "<option value=''></option>";
while ($cliente = $query->fetch(PDO::FETCH_ASSOC)){
    echo "<option value=".$cliente['id_cliente'].">".$cliente['id_cliente']." - ".$cliente['nombre_cliente']." ".$cliente['apellido_cliente']."</option>";
}

$pdo=null;

?>