<?php

$data = file_get_contents("php://input");
require("../../../controller/database.php");


$consulta = mysqli_query($conn, "SELECT id_cliente,nombre_cliente,apellido_cliente FROM cliente");

echo "<option value=''></option>";
while ($cliente = mysqli_fetch_array($consulta)){
    echo "<option value=".$cliente['id_cliente'].">".$cliente['id_cliente']." - ".$cliente['nombre_cliente']." ".$cliente['apellido_cliente']."</option>";
}

?>