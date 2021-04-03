<?php

$data = file_get_contents("php://input");
require("../../../controller/database.php");


$consulta = mysqli_query($conn, "SELECT id_mesa,capacidad_mesa,estado_mesa FROM mesa WHERE estado_mesa = 'Disponible'");

echo "<option value=''></option>";
while ($mesa = mysqli_fetch_array($consulta)){
    echo "<option value=".$mesa['id_mesa'].">".$mesa['id_mesa']." - ".$mesa['capacidad_mesa']." ".$mesa['estado_mesa']."</option>";
}

?>