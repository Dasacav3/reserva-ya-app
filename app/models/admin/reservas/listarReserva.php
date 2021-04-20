<?php

    $data = file_get_contents("php://input");
    require("../../../controller/database.php");

    try {
        $query = $pdo->prepare("SELECT reservacion.ESTADO_RESERVACION, reservacion.ID_RESERVACION, cliente.NOMBRE_CLIENTE, cliente.APELLIDO_CLIENTE, 
        reservacion.FECHA_RESERVACION, reservacion.HORA_RESERVACION, mesa.ID_MESA, reservacion.ASIENTO, reservacion_reserva_mesa.ID_RESERVACION_RESERVA_MESA
        FROM reservacion_reserva_mesa
        INNER JOIN reservacion ON reservacion_reserva_mesa.ID_RESERVACION = reservacion.ID_RESERVACION
        INNER JOIN mesa ON reservacion_reserva_mesa.ID_MESA = mesa.ID_MESA
        INNER JOIN cliente ON reservacion.ID_CLIENTE = cliente.ID_CLIENTE
        WHERE reservacion.ESTADO_RESERVACION = 'Activa'
        ORDER BY reservacion.FECHA_RESERVACION ASC");
        $query->execute();

        if($data != ""){
            $query = $pdo->prepare("SELECT reservacion.ESTADO_RESERVACION, reservacion.ID_RESERVACION, cliente.NOMBRE_CLIENTE, cliente.APELLIDO_CLIENTE, 
            reservacion.FECHA_RESERVACION, reservacion.HORA_RESERVACION, mesa.ID_MESA, reservacion.ASIENTO,reservacion_reserva_mesa.ID_RESERVACION_RESERVA_MESA
            FROM reservacion_reserva_mesa
            INNER JOIN reservacion ON reservacion_reserva_mesa.ID_RESERVACION = reservacion.ID_RESERVACION
            INNER JOIN mesa ON reservacion_reserva_mesa.ID_MESA = mesa.ID_MESA
            INNER JOIN cliente ON reservacion.ID_CLIENTE = cliente.ID_CLIENTE
            WHERE reservacion.ESTADO_RESERVACION = 'Activa' AND (reservacion.ESTADO_RESERVACION LIKE '%".$data."%' OR reservacion.ID_RESERVACION LIKE '%".$data."%' OR cliente.NOMBRE_CLIENTE LIKE '%".$data."%' OR cliente.APELLIDO_CLIENTE LIKE '%".$data."%' OR reservacion.FECHA_RESERVACION LIKE '%".$data."%' OR reservacion.HORA_RESERVACION LIKE '%".$data."%' OR mesa.ID_MESA LIKE '%".$data."%' OR reservacion.ASIENTO LIKE '%".$data."%')");
            $query->execute();
        }
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    }catch (Exception $e) {
        echo "Conexion fallida " . $e->getMessage();
        die();
    }

   echo json_encode($resultado);

    $pdo=null;

?>