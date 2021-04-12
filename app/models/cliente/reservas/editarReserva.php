<?php

    $data = file_get_contents("php://input");

    include("../../../controller/database.php");

    session_start();

    $sesion = $_SESSION['datos'];

    if($sesion == null || $sesion = ''){
        echo 'Usted no tiene autorización';
        header("location: ../../views/login.php");
        die();
    }

    
    $id = $_POST['id_reserva'];
    $fecha = $_POST['edit_fecha_reserva'];
    $hora = $_POST['edit_hora_reserva'];
    $asientos = $_POST['edit_asientos'];
    $estado = $_POST['estado'];


    try {
        $query = $pdo->prepare("UPDATE reservacion SET fecha_reservacion = :fecha, hora_reservacion = :hora, estado_reservacion = :estado, asiento = :asientos WHERE id_reservacion = :id");
        $query->bindParam(":fecha",$fecha);
        $query->bindParam(":hora",$hora);
        $query->bindParam(":estado",$estado);
        $query->bindParam(":asientos",$asientos);
        $query->bindParam(":id",$id);
        $query->execute();
    }catch (Exception $e) {
        echo "Conexion fallida " . $e->getMessage();
        die();
    }

    echo "ok";
    $pdo=null;
    
?>