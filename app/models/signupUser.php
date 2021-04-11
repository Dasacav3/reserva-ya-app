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

    // $queryInsertUsuario = "INSERT INTO usuario (nombre_usuario,clave_usuario,tipo_usuario,estado_usuario,foto_perfil) VALUES ('$_POST[email]','$pass_hash','1','1','$img_default')";

    // $result2 = $conn->query($queryInsertUsuario);

    // if (!$result2) die("Falla al acceder a la BD (USUARIO)");

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
    }

    $pdo = null;
    echo "ok";



    // $consulta_id_usuario = "SELECT id_usuario as id_usuario FROM usuario WHERE nombre_usuario='$_POST[email]'";
    // $result3 = mysqli_query($conn, $consulta_id_usuario);
    // $row = mysqli_fetch_assoc($result3);

    // $id_usuario = $row['id_usuario'];

    // $queryInsertCliente = "INSERT INTO cliente (nombre_cliente,apellido_cliente,fecha_nacimiento_cliente,celular_cliente,email_cliente,id_usuario) VALUES ('$_POST[nombre]','$_POST[apellido]','$_POST[nacimiento]','$_POST[cel]','$_POST[email]',$id_usuario)";

    // $result = $conn->query($queryInsertCliente);

    // if (!$result) {
    //     die("Falla al acceder a la BD (CLIENTE)");
    // } else {
    //     echo "ok";
    // }

  


    // $conn->close();
