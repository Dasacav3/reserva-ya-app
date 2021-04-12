<?php

    $data = file_get_contents("php://input");
    require "../../../controller/database.php";

    session_start();

    $sesion = $_SESSION['datos'];

    if($sesion == null || $sesion = ''){
        echo 'Usted no tiene autorización';
        header("location: ../../views/login.php");
        die();
    }

    $query = "SELECT reservacion.ID_RESERVACION, cliente.ID_CLIENTE, reservacion.ESTADO_RESERVACION, reservacion.FECHA_RESERVACION, 
    reservacion.HORA_RESERVACION, mesa.ID_MESA, reservacion.ASIENTO
    FROM reservacion_reserva_mesa
    INNER JOIN reservacion ON reservacion_reserva_mesa.ID_RESERVACION = reservacion.ID_RESERVACION
    INNER JOIN mesa ON reservacion_reserva_mesa.ID_MESA = mesa.ID_MESA
    INNER JOIN cliente ON reservacion.ID_CLIENTE = cliente.ID_CLIENTE
    WHERE reservacion_reserva_mesa.ID_RESERVACION_RESERVA_MESA = $data";

    try {
        $query = $pdo->prepare("SELECT reservacion.ID_RESERVACION, cliente.ID_CLIENTE, reservacion.ESTADO_RESERVACION, reservacion.FECHA_RESERVACION, 
        reservacion.HORA_RESERVACION, mesa.ID_MESA, reservacion.ASIENTO
        FROM reservacion_reserva_mesa
        INNER JOIN reservacion ON reservacion_reserva_mesa.ID_RESERVACION = reservacion.ID_RESERVACION
        INNER JOIN mesa ON reservacion_reserva_mesa.ID_MESA = mesa.ID_MESA
        INNER JOIN cliente ON reservacion.ID_CLIENTE = cliente.ID_CLIENTE
        WHERE reservacion_reserva_mesa.ID_RESERVACION_RESERVA_MESA = :id");
        $query->bindParam(":id",$data);
        $query->execute();
        $resultado = $query->fetch(PDO::FETCH_ASSOC);
    }catch (Exception $e) {
        echo "Conexion fallida " . $e->getMessage();
        die();
    }

    echo json_encode($resultado);

    $pdo=null;