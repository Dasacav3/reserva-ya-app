<?php
    include("../controller/database.php");

    $password = $_POST['password'];

    $pass_hash = password_hash($password, PASSWORD_BCRYPT);
    $tipo = '1';
    $estado = '1';
    $email = $_POST['email'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha = $_POST['nacimiento'];
    $cel = $_POST['cel'];

    $img_default = "../../../../public/profile_photo/user_default_reservaya.png";

    try{
        $pdo->beginTransaction();

        $queryInsertUsuario = "INSERT INTO usuario (nombre_usuario,clave_usuario,tipo_usuario,estado_usuario,foto_perfil) VALUES (:nombre,:clave,:tipo,:estado,:foto)";
        $query = $pdo->prepare($queryInsertUsuario);
        $query->bindValue(":nombre",$email);
        $query->bindParam(":clave",$pass_hash);
        $query->bindParam(":tipo",$tipo);
        $query->bindParam(":estado",$estado);
        $query->bindParam(":foto",$img_default);
        $query->execute();

        $last_insert_id = $pdo->lastInsertId();

        $queryInsertCliente = "INSERT INTO cliente (nombre_cliente,apellido_cliente,fecha_nacimiento_cliente,celular_cliente,email_cliente,id_usuario) VALUES (:nombre,:apellido,:fecha,:cel,:email,:id)";
        $query = $pdo->prepare($queryInsertCliente);
        $query->bindValue(":nombre",$nombre);
        $query->bindParam(":apellido",$apellido);
        $query->bindParam(":fecha",$fecha);
        $query->bindParam(":cel",$cel);
        $query->bindParam(":email",$email);
        $query->bindParam(":id",$last_insert_id);
        $query->execute();

        $pdo->commit();

    }catch(Exception $e){
        $pdo->rollBack();
        echo "Conexion fallida " . $e->getMessage();
        die();
    }

    $pdo = null;
    echo "ok";
