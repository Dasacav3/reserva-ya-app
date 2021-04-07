<?php
    include("../controller/database.php");

    $password = $_POST['password'];

    $pass_hash = password_hash($password, PASSWORD_BCRYPT);

    $queryInsertUsuario = "INSERT INTO usuario (nombre_usuario,clave_usuario,tipo_usuario,estado_usuario) VALUES ('$_POST[email]','$pass_hash','1','1')";

    $result2 = $conn->query($queryInsertUsuario);

    if (!$result2) die("Falla al acceder a la BD (USUARIO)");


    $consulta_id_usuario = "SELECT id_usuario as id_usuario FROM usuario WHERE nombre_usuario='$_POST[email]'";
    $result3 = mysqli_query($conn, $consulta_id_usuario);
    $row = mysqli_fetch_assoc($result3);

    $id_usuario = $row['id_usuario'];

    $queryInsertCliente = "INSERT INTO cliente (nombre_cliente,apellido_cliente,fecha_nacimiento_cliente,celular_cliente,email_cliente,id_usuario) VALUES ('$_POST[nombre]','$_POST[apellido]','$_POST[nacimiento]','$_POST[cel]','$_POST[email]',$id_usuario)";

    $result = $conn->query($queryInsertCliente);

    if (!$result) {
        die("Falla al acceder a la BD (CLIENTE)");
    } else {
        echo "ok";
    }

    $conn->close();
