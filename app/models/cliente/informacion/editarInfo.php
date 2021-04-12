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


    try {
        $query = $pdo->prepare("UPDATE cliente SET nombre_cliente = :nom,apellido_cliente = :ape,fecha_nacimiento_cliente = :fecha,email_cliente = :mail,celular_cliente = :cel WHERE id_usuario = :id");
        $query->bindParam(":nom",$nombre);
        $query->bindParam(":ape",$apellido);
        $query->bindParam(":fecha",$fecha);
        $query->bindParam(":mail",$email);
        $query->bindParam(":cel",$cel);
        $query->bindParam(":id",$id);
        $query->execute();
    }catch (Exception $e) {
        echo "Conexion fallida " . $e->getMessage();
        die();
    }

    echo "ok";

    $pdo=null;


?>