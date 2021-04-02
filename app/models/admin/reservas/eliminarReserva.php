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
    
    $query = "SELECT reservacion.ID_RESERVACION
     FROM reservacion_reserva_mesa
     INNER JOIN reservacion ON reservacion_reserva_mesa.ID_RESERVACION = reservacion.ID_RESERVACION
     INNER JOIN mesa ON reservacion_reserva_mesa.ID_MESA = mesa.ID_MESA
     INNER JOIN cliente ON reservacion.ID_CLIENTE = cliente.ID_CLIENTE
     WHERE reservacion_reserva_mesa.ID_RESERVACION_RESERVA_MESA = '$data'";

    $result = mysqli_query($conn, $query);

    if(!$result) {
        die('Query Failed '. mysqli_error($conn));
    }
  
    $resultado = $result->fetch_all(MYSQLI_ASSOC);

    foreach($resultado as $dat){
        $id_reserva = $dat['ID_RESERVACION'];
    }

    $query2 = "DELETE FROM reservacion_reserva_mesa WHERE id_reservacion_reserva_mesa = $data";

    $result2 = mysqli_query($conn, $query2);

    if(!$result2) {
        die('Query Failed 2 '. mysqli_error($conn));
    }else{
        echo "ok";
    }

    $query3 = "DELETE FROM reservacion WHERE id_reservacion = $id_reserva";

    $result3 = mysqli_query($conn, $query3);

    if(!$result3) {
        die('Query Failed 3 '. mysqli_error($conn));
    }else{
        echo "ok";
    }

?>