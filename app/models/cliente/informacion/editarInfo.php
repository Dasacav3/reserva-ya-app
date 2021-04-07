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

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha = $_POST['fecha'];
    $email = $_POST['email'];
    $cel = $_POST['cel'];

    $query = "UPDATE cliente SET nombre_cliente = '$nombre',apellido_cliente = '$apellido',fecha_nacimiento_cliente = '$fecha',email_cliente = '$email',celular_cliente = '$cel' WHERE id_usuario = '$id'";

    $result = mysqli_query($conn,$query);

    if(!$result) {
        die('Query Failed '. mysqli_error($conn));
    }else{
        echo "ok";
    }


?>