<?php

    $data = file_get_contents("php://input");
    require("../../../controller/database.php");

    try{
        $query = $pdo->prepare("SELECT * FROM usuario WHERE tipo_usuario = 'Empleado' OR tipo_usuario = 'Cliente' ORDER BY id_usuario DESC");
        $query->execute();

        if($data != ""){
            $query = $pdo->prepare("SELECT * FROM usuario WHERE (tipo_usuario = 'Empleado' OR tipo_usuario = 'Cliente') AND (id_usuario LIKE '%".$data."%' OR nombre_usuario LIKE  '%".$data."%' OR  tipo_usuario LIKE '%".$data."%' OR estado_usuario LIKE '%".$data."%')");
            $query->execute();
        }

        $resultado = $query->fetchAll(PDO::FETCH_ASSOC); 

    }catch(Exception $e){
        echo "Conexion fallida " . $e->getMessage();
        die();
    }

    echo json_encode($resultado);


    $pdo=null;
