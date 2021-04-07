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
    $doc = $_POST['doc'];
    $email = $_POST['email'];
    $cel = $_POST['cel'];

    $query = "UPDATE empleado SET nombre_empleado = '$nombre',apellido_empleado = '$apellido',doc_empleado = '$doc',email_empleado = '$email',celular_empleado = '$cel' WHERE id_usuario = '$id'";

    $result = mysqli_query($conn,$query);

    if(!$result) {
        die('Query Failed '. mysqli_error($conn));
    }else{
        echo "ok";
    }


?>