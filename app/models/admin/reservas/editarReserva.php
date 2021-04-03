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
    $mesa = $_POST['edit_mesa'];

    if($estado == 'Cancelada' || $estado == 'Completada'){
        $query = "UPDATE reservacion SET fecha_reservacion = '$fecha', hora_reservacion = '$hora', estado_reservacion = '$estado', asiento = '$asientos' WHERE id_reservacion = $id";

        $result = mysqli_query($conn,$query);

        if(!$result) {
            die('Query Failed '. mysqli_error($conn));
        }else{
            echo "ok";
        }

        $queryUpdateMesa = "UPDATE mesa SET estado_mesa = 'Disponible' WHERE id_mesa = $mesa";
        $resultado5 = $conn->query($queryUpdateMesa);


    }else{
        $query = "UPDATE reservacion SET fecha_reservacion = '$fecha', hora_reservacion = '$hora', estado_reservacion = '$estado', asiento = '$asientos' WHERE id_reservacion = $id";

        $result = mysqli_query($conn,$query);
    
        if(!$result) {
            die('Query Failed '. mysqli_error($conn));
        }else{
            echo "ok";
        }
    }

    // $query = "UPDATE reservacion SET fecha_reservacion = '$fecha', hora_reservacion = '$hora', estado_reservacion = '$estado', asiento = '$asientos' WHERE id_reservacion = $id";

    // $result = mysqli_query($conn,$query);

    // if(!$result) {
    //     die('Query Failed '. mysqli_error($conn));
    // }else{
    //     echo "ok";
    // }
    
?>