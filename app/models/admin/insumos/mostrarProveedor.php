<?php

$data = file_get_contents("php://input");
require("../../../controller/database.php");


try {
    $query = $pdo->prepare("SELECT id_proveedor,nombre_proveedor FROM proveedor");
    $query->execute();
}catch (Exception $e) {
    echo "Conexion fallida " . $e->getMessage();
    die();
}

echo "<option value=''></option>";
while ($proveedor = $query->fetch(PDO::FETCH_ASSOC)){
    echo "<option value=".$proveedor['id_proveedor'].">".$proveedor['id_proveedor']." - ".$proveedor['nombre_proveedor']."</option>";
}

$pdo=null;

?>