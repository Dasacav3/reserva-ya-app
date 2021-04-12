<?php

$data = file_get_contents("php://input");
require("../../../controller/database.php");


try {
    $query = $pdo->prepare("SELECT id_mesa,capacidad_mesa,estado_mesa FROM mesa WHERE estado_mesa = 'Disponible'");
    $query->execute();
}catch (Exception $e) {
    echo "Conexion fallida " . $e->getMessage();
    die();
}

echo "<option value=''></option>";
while ($mesa = $query->fetch(PDO::FETCH_ASSOC)){
    echo "<option value=".$mesa['id_mesa'].">".$mesa['id_mesa']." - ".$mesa['capacidad_mesa']." ".$mesa['estado_mesa']."</option>";
}

$pdo=null;

?>