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

    try {
        $query = $pdo->prepare("SELECT *
        FROM insumo WHERE ID_INSUMO=:id " );

        $query->bindParam(":id",$data);
        $query->execute();
        $resultado = $query->fetch(PDO::FETCH_ASSOC);
    }catch (Exception $e) {
        echo "holi fallida " . $e->getMessage();
        die();
    }

    echo json_encode($resultado);

    $pdo=null;