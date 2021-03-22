<html>

<head>
    <script src="../../../lib/sweetaler2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../../../lib/sweetaler2/sweetalert2.all.min.css">
</head>

<body>


    <?php

    include("../../../config/database.php");

    if (isset($_POST['fecha-reserva'])) {
        $fecha_reserva = $_POST['fecha-reserva'];
        $hora_reserva = $_POST['hora_reserva'];
        $numero_mesa = $_POST['numero_mesa'];

        $query = "INSERT INTO reservacion(id_cliente,fecha_reservacion,hora_reservacion,estado_reservacion) VALUES(1,'$fecha_reserva','$hora_reserva','A')";

        $result = mysqli_query($conn, $query);

        if (!$result) {
            die('Query Failed.');
        }
?>
        <script>
            if(true){
                Swal.fire({
                    title: 'Reserva añadida satisfactoriamente',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                })
            }else{
                console.log("Error");
            }
        </script>
<?php
    } else {
?>
        <script>
            if(true){
                Swal.fire({
                    title: 'Vuelve a intertarlo',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000
                });
            }else{
                console.log("Error");
            }
        </script>
<?php
    }
?>

</body>
</html>