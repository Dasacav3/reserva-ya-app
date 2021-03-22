<?php

    include("../../controller/database.php");

    $query = "SELECT reservacion.ESTADO_RESERVACION, reservacion.ID_RESERVACION, cliente.NOMBRE_CLIENTE, cliente.APELLIDO_CLIENTE, 
    reservacion.FECHA_RESERVACION, reservacion.HORA_RESERVACION, mesa.ID_MESA
    FROM reservacion_reserva_mesa
    INNER JOIN reservacion ON reservacion_reserva_mesa.ID_RESERVACION = reservacion.ID_RESERVACION
    INNER JOIN mesa ON reservacion_reserva_mesa.ID_MESA = mesa.ID_MESA
    INNER JOIN cliente ON reservacion.ID_CLIENTE = cliente.ID_CLIENTE";
    
    $result = mysqli_query($conn, $query);
    if(!$result) {
      die('Query Failed'. mysqli_error($conn));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'estado_reservacion' => $row['ESTADO_RESERVACION'],
            'id_reservacion' => $row['ID_RESERVACION'],
            'nombre_cliente' => $row['NOMBRE_CLIENTE'],
            'apellido_cliente' => $row['APELLIDO_CLIENTE'],
            'fecha_reservacion' => $row['FECHA_RESERVACION'],
            'hora_reservacion' => $row['HORA_RESERVACION'],
            'numero_mesa' => $row['ID_MESA']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;

?>