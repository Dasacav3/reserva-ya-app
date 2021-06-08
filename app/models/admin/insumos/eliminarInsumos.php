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
        $query = $pdo->prepare("DELETE FROM insumo WHERE id_insumo = :id");
        $query->bindParam(":id",$data);
        $query->execute();
        $resultado = $query->fetch(PDO::FETCH_NUM);
        foreach($resultado as $dat){
            $tipo = $dat;
        }
    }catch (Exception $e) {
        echo "Conexion fallida " . $e->getMessage();
        die();
    }

   

    echo "ok";
    $pdo=null;

?>