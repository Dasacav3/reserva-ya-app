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
    $email = $_POST['email'];
    $cel = $_POST['cel'];

    $query = "UPDATE administrador SET nombre_admin = '$nombre',apellido_admin = '$apellido',email_admin = '$email',celular_admin = '$cel' WHERE id_usuario = '$id'";

    $result = mysqli_query($conn,$query);

    if(!$result) {
        die('Query Failed '. mysqli_error($conn));
    }else{
        echo "ok";
    }


?>