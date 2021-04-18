<?php

require_once "../database.php";

$fecha_actual = date("Y-m-d");

$hora_actual = date("H:i:s");

$hora_restada = date("H:i:s",strtotime($hora_actual."- 1 hour"));

try {
    $pdo->beginTransaction();

    $query2 = $pdo->prepare("UPDATE reservacion_reserva_mesa AS RM
    INNER JOIN reservacion AS R ON RM.ID_RESERVACION = R.ID_RESERVACION
    INNER JOIN mesa AS M ON RM.ID_MESA = M.ID_MESA
    SET R.ESTADO_RESERVACION = 'Completada', M.ESTADO_MESA = 'Disponible'
    WHERE FECHA_RESERVACION <= '$fecha_actual' AND HORA_RESERVACION < '$hora_restada'");
    if($query2->execute()){
        echo "ok";
    }

    $pdo->commit();

} catch (Exception $e) {
    echo "Conexión fallida " . $e->getMessage();
}

$pdo = null;
