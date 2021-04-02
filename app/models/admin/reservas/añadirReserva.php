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



        $queryInsertReserva = "INSERT INTO reservacion (id_cliente, fecha_reservacion, hora_reservacion, estado_reservacion, asiento) VALUES ($id_cliente, '$fecha', '$hora', $estado, $asiento)";
        $resultado1 = mysqli_query($conn,$queryInsertReserva);

        if (!$resultado1 ) {
            die ("Conexión fallida: "  . mysqli_error($conn));  
        }

        $id_reserva = $conn->insert_id;

        $consulta_id_mesa = "SELECT id_mesa FROM mesa WHERE id_mesa = $mesa";
        $resultado3 = mysqli_query($conn,$consulta_id_mesa);
        $row2 = mysqli_fetch_assoc($resultado3);
        $id_mesa = $row2['id_mesa'];


        $queryInsertReserva2 = "INSERT INTO reservacion_reserva_mesa (id_reservacion,id_mesa) VALUES ($id_reserva,$id_mesa)";
        $resultado4 = $conn->query($queryInsertReserva2);

        echo "ok";
        $conn->close();
    }
    
?>