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
    
    try{
        $pdo->beginTransaction();

        $querySelect = "SELECT reservacion.ID_RESERVACION, mesa.ID_MESA
        FROM reservacion_reserva_mesa
        INNER JOIN reservacion ON reservacion_reserva_mesa.ID_RESERVACION = reservacion.ID_RESERVACION
        INNER JOIN mesa ON reservacion_reserva_mesa.ID_MESA = mesa.ID_MESA
        INNER JOIN cliente ON reservacion.ID_CLIENTE = cliente.ID_CLIENTE
        WHERE reservacion_reserva_mesa.ID_RESERVACION_RESERVA_MESA = :id";
        $query = $pdo->prepare($querySelect);
        $query->bindValue(":id",$data);
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultado as $dat){
            $id_reserva = $dat['ID_RESERVACION'];
            $id_mesa = $dat['ID_MESA'];
        }
        
        $queryUpdateMesa = "UPDATE mesa SET estado_mesa = 'Disponible' WHERE id_mesa = :id_mesa";
        $query = $pdo->prepare($queryUpdateMesa);
        $query->bindValue(":id_mesa",$id_mesa);
        $query->execute();

        $queryUpdateReserva = "UPDATE reservacion SET estado_reservacion = 'Cancelada' WHERE id_reservacion = :id_reserva";
        $query = $pdo->prepare($queryUpdateReserva);
        $query->bindValue(":id_reserva",$id_reserva);
        $query->execute();

        $pdo->commit();

    }catch(Exception $e){
        $pdo->rollBack();
        echo "Conexion fallida " . $e->getMessage();
        die();
    }

    echo "ok";
    $pdo=null;

?>