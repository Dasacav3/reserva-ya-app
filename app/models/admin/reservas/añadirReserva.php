<?php


    require("../../controller/database.php");
    
    if(isset($_POST)){

    //Obtiene los datos del formulario
    $fecha = $_REQUEST['fecha_reserva'];
    $hora = $_REQUEST['hora_reserva'];
    $mesa = $_REQUEST['numero_mesa'];

        $queryInsertReserva = "INSERT INTO reservacion (id_cliente, fecha_reservacion, hora_reservacion, estado_reservacion) VALUES ('1', $fecha, $hora, 'Activa')";
        $resultado1 = $conn->query($queryInsertReserva);
        if(!$resultado1) die ("Falla al acceder a la BD (RESERVA) " . $conn);


        $consulta_id_reserva = "SELECT id_reservacion FROM reservacion WHERE fecha_reservacion = $fecha AND hora_reservacion = $hora";
        $resultado2 = mysqli_query($conn,$consulta_id_reserva);
        $row1 = mysqli_fetch_assoc($resultado2);
        $id_reserva = $row1['ID_RESERVACION'];


        $consulta_id_mesa = "SELECT id_mesa FROM mesa WHERE id_mesa = $mesa";
        $resultado3 = mysqli_query($conn,$consulta_id_mesa);
        $row2 = mysqli_fetch_array($resultado3);
        $id_mesa = $row2['ID_MESA'];


        $queryInsertReserva2 = "INSERT INTO reservacion_reserva_mesa (id_reservacion,id_mesa) VALUES ($id_reserva,$id_mesa)";
        $resultado4 = $conn->query($queryInsertReserva2);
        if(!$resultado4) die ("Falla al acceder a la BD (RESERVA2) " . $conn);

        echo "ok";
        $conn->close();
    }
    

    // require("../../controller/databasePDO.php");
    // if(isset($_POST)){
    //     //Obtiene los datos del formulario
    //     $fecha = $_POST['fecha-reserva'];
    //     $hora = $_POST['hora-reserva'];
    //     $mesa = $_POST['numero-mesa'];

    //     //Realiza la insercion de datos en la tabla reservación a la base de datos
    //     $query = $pdo->prepare("INSERT INTO reservacion (id_cliente, fecha_reservacion, hora_reservacion, estado_reservacion) VALUES (1, :fecha, :hora, 'Activa')");
    //     $query->bindParam(":fecha", $fecha);
    //     $query->bindParam(":hora", $hora);
    //     $query->execute();

    //     //Realiza una busqueda en la tabla reservaciones
    //     $query4 = $pdo->prepare("SELECT id_reservacion FROM reservacion WHERE fecha_reservacion = :fecha AND hora_reservacion = :hora");
    //     $query4->execute([":fecha" => $fecha, ":hora" => $hora]);

    //     $id_reserva = $query4->fetchAll();

    //     //Realiza una busqueda en la tabla mesas
    //     $query2 = $pdo->prepare("SELECT id_mesa FROM mesa WHERE id_mesa = :mesa");
    //     $query2->execute([":mesa" => $mesa]);

    //     $id_mesa = $query2->fetchAll();

    //     $query3 = $pdo->prepare("INSERT INTO reservacion_reserva_mesa (id_reservacion, id_mesa) VALUES (:id1, :id2)");
    //     $query3->bindParam(":id1",$id_reserva);
    //     $query3->bindParam(":id2",$id_mesa);
    //     $query3->execute();

    //     $pdo = null;
    //     echo "ok";
    // }


?>