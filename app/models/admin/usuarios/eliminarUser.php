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
        $query = $pdo->prepare("SELECT tipo_usuario FROM usuario WHERE id_usuario = :id");
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

    if($tipo == 'Empleado'){
        try{
            $pdo->beginTransaction();

            $queryDeleteEmpleado = "DELETE FROM empleado WHERE id_usuario = :id";
            $query = $pdo->prepare($queryDeleteEmpleado);
            $query->bindValue(":id",$data);
            $query->execute();

            $queryDeleteUser = "DELETE FROM usuario WHERE id_usuario = :id";
            $query = $pdo->prepare($queryDeleteUser);
            $query->bindValue(":id",$data);
            $query->execute();

            $pdo->commit();

        }catch(Exception $e){
            $pdo->rollBack();
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

    }else if($tipo == 'Cliente'){
        try{
            $pdo->beginTransaction();

            $queryDeleteCliente = "DELETE FROM cliente WHERE id_usuario = :id";
            $query = $pdo->prepare($queryDeleteCliente);
            $query->bindValue(":id",$data);
            $query->execute();

            $queryDeleteUser = "DELETE FROM usuario WHERE id_usuario = :id";
            $query = $pdo->prepare($queryDeleteUser);
            $query->bindValue(":id",$data);
            $query->execute();

            $pdo->commit();

        }catch(Exception $e){
            $pdo->rollBack();
            echo "Conexion fallida " . $e->getMessage();
            die();
        }
    }


    echo "ok";
    $pdo=null;

?>