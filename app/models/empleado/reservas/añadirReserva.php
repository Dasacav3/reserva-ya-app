<?php
    session_start();

    $sesion = [$_SESSION['datos']];

    require("../../../controller/database.php");
 
    if(isset($_POST)){

        //Obtiene los datos del formulario
        $id_cliente = $_POST['cliente'];
        $fecha = $_POST['fecha_reserva'];
        $hora = $_POST['hora_reserva'];
        $mesa = $_POST['mesa'];
        $asiento = $_POST['asientos'];
        $estado = 1;

        try {
            $queryReserva = $pdo->prepare("INSERT INTO reservacion (id_cliente, fecha_reservacion, hora_reservacion, estado_reservacion, asiento) VALUES (:id, :fecha, :hora, :estado, :asiento)");
            $queryReserva->bindParam(":id",$id_cliente);
            $queryReserva->bindParam(":fecha",$fecha);
            $queryReserva->bindParam(":hora",$hora);
            $queryReserva->bindParam(":estado",$estado);
            $queryReserva->bindParam(":asiento",$asiento);
            $queryReserva->execute();
            $id_reserva = $pdo->lastInsertId();
        }catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        try {
            $queryReservaMesa = $pdo->prepare("INSERT INTO reservacion_reserva_mesa (id_reservacion,id_mesa) VALUES (:id_reserva, :id_mesa)");
            $queryReservaMesa->bindParam(":id_reserva",$id_reserva);
            $queryReservaMesa->bindParam(":id_mesa",$mesa);
            $queryReservaMesa->execute();
        }catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        try {
            $queryMesa2 = $pdo->prepare("UPDATE mesa SET estado_mesa = 'Ocupada' WHERE id_mesa = :mesa");
            $queryMesa2->bindParam(":mesa",$mesa);
            $queryMesa2->execute();
        }catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        echo "ok";
    }
    $pdo=null;
    
?>