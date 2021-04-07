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

    $id = $_SESSION['datos'][0];

    $query = "SELECT nombre_cliente,apellido_cliente,fecha_nacimiento_cliente,email_cliente,celular_cliente FROM cliente WHERE id_usuario = '$id'";

    $result = mysqli_query($conn,$query);

    if(!$result) {
        die('Query Failed '. mysqli_error($conn));
    }
    
    $resultado = $result->fetch_assoc();


    echo json_encode($resultado);

?>