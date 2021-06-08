<?php

$data = file_get_contents("php://input");
require("../../../controller/database.php");


try {
    $query = $pdo->prepare("SELECT id_categoria_insumo,nombre_categoria_insumo FROM categoria_insumo");
    $query->execute();
}catch (Exception $e) {
    echo "Conexion fallida " . $e->getMessage();
    die();
}

echo "<option value=''></option>";
while ($mesa = $query->fetch(PDO::FETCH_ASSOC)){
    echo "<option value=".$mesa['id_categoria_insumo'].">".$mesa['id_categoria_insumo']." - ".$mesa['nombre_categoria_insumo']."</option>";
}

$pdo=null;

?>