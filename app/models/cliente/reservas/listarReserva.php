<?php

$data = file_get_contents("php://input");
require("../../../controller/database.php");

session_start();

$sesion = [$_SESSION['datos']];

$id = $_SESSION['datos'][0];

try {
    $query = $pdo->prepare("SELECT reservacion.ESTADO_RESERVACION, reservacion.ID_RESERVACION, 
    reservacion.FECHA_RESERVACION, reservacion.HORA_RESERVACION, mesa.ID_MESA, reservacion.ASIENTO, reservacion_reserva_mesa.ID_RESERVACION_RESERVA_MESA
    FROM reservacion_reserva_mesa
    INNER JOIN reservacion ON reservacion_reserva_mesa.ID_RESERVACION = reservacion.ID_RESERVACION
    INNER JOIN mesa ON reservacion_reserva_mesa.ID_MESA = mesa.ID_MESA
    INNER JOIN cliente ON reservacion.ID_CLIENTE = cliente.ID_CLIENTE
    WHERE cliente.ID_USUARIO = :id
    ORDER BY reservacion.FECHA_RESERVACION ASC");
    $query->bindParam(":id",$id);
    $query->execute();

    if($data != ""){
        $query = $pdo->prepare("SELECT reservacion.ESTADO_RESERVACION, reservacion.ID_RESERVACION, reservacion.FECHA_RESERVACION, reservacion.HORA_RESERVACION, mesa.ID_MESA, reservacion.ASIENTO,reservacion_reserva_mesa.ID_RESERVACION_RESERVA_MESA
        FROM reservacion_reserva_mesa
        INNER JOIN reservacion ON reservacion_reserva_mesa.ID_RESERVACION = reservacion.ID_RESERVACION
        INNER JOIN mesa ON reservacion_reserva_mesa.ID_MESA = mesa.ID_MESA
        INNER JOIN cliente ON reservacion.ID_CLIENTE = cliente.ID_CLIENTE
        WHERE cliente.ID_USUARIO = '$id'
        WHERE reservacion.ESTADO_RESERVACION LIKE '%" . $data . "%' OR reservacion.ID_RESERVACION LIKE '%" . $data . "%' OR reservacion.FECHA_RESERVACION LIKE '%" . $data . "%' OR reservacion.HORA_RESERVACION LIKE '%" . $data . "%' OR mesa.ID_MESA LIKE '%" . $data . "%' OR reservacion.ASIENTO LIKE '%" . $data . "%'");
        $query->execute();
    }
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
}catch (Exception $e) {
    echo "Conexion fallida " . $e->getMessage();
    die();
}

foreach ($resultado as $dat) {
    echo "<tr>
                <td>" . $dat['ESTADO_RESERVACION'] . "</td>
                <td>" . $dat['ID_RESERVACION'] . "</td>
                <td>" . $dat['FECHA_RESERVACION'] . "</td>
                <td>" . $dat['HORA_RESERVACION'] . "</td>
                <td>" . $dat['ID_MESA'] . "</td>
                <td>" . $dat['ASIENTO'] . "</td> 
                <td>
                    <button class='abrirPopup-edit btn-edit' type='button' onclick=Editar('" . $dat['ID_RESERVACION_RESERVA_MESA'] . "');abrir()>Editar</button>
                    <button class='btn-delete' type='button' onclick=eliminarReserva('" . $dat['ID_RESERVACION_RESERVA_MESA'] . "')>Eliminar</button>
                </td>   
            </tr>";
}

$pdo=null;
