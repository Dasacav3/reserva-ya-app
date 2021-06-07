<?php

require("../../../controller/database.php");
$data = file_get_contents("php://input");

try {
    $query = $pdo->prepare("SELECT * FROM mesa WHERE id_mesa = :id");
    $query->execute(['id' => $data]);
    $resultado = $query->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Conexion fallida " . $e->getMessage();
    die();
}

echo '
<a href="#" id="closePopup-edit" class="closePopup"><i class="fas fa-times-circle"></i></a>
<h4 class="form-title">Editar mesa</h4>
<div class="form-fields">
<div>
    <label>ID Mesa</label> <br />
    <input type="number" value="'.$resultado['ID_MESA'].'" name="idMesa" id="idMesa" readonly> <br />
    <label>Capacidad Mesa</label> <br />
    <input type="number" value="'.$resultado['CAPACIDAD_MESA'].'" name="capacidadMesaUpdate" id="capacidadMesaUpdate"> <br />
    <label>Estado Mesa</label> <br />
    <select name="estadoMesa" id="estadoMesa"> <br /> 
        <option value="'.$resultado['ESTADO_MESA'].'">'.$resultado['ESTADO_MESA'].' - Actual</option>
        <option value="Disponible">Disponible</option>
        <option value="Ocupada">Ocupada</option>
    </select>
</div>
</div>
<input type="button" value="Guardar" id="edit" />
';

$pdo=null;
