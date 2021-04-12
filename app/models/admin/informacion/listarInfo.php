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

    try {
        $query = $pdo->prepare("SELECT nombre_admin,apellido_admin,email_admin,celular_admin FROM administrador WHERE id_usuario = :id");
        $query->bindParam(":id",$id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
    }catch (Exception $e) {
        echo "Conexion fallida " . $e->getMessage();
        die();
    }

    echo json_encode($result);

?>