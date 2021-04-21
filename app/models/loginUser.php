<?php

session_start();


include("../controller/database.php");

$nombre = $_POST['user_name'];
$password = $_POST['password'];


try {
    $query = $pdo->prepare("SELECT id_usuario,tipo_usuario,clave_usuario,estado_usuario,nombre_usuario FROM usuario WHERE nombre_usuario = :nombre");
    $query->bindParam(":nombre", $nombre);
    $query->execute();
    $data = $query->fetch(PDO::FETCH_NUM);
} catch (Exception $e) {
    echo "Conexion fallida " . $e->getMessage();
}

if ($data) {
    if ($data[1] == 'Administrador' and password_verify($password, $data[2]) and $data[3] == 'Activo') {
        try {
            $query = $pdo->prepare("SELECT usuario.id_usuario, usuario.nombre_usuario, usuario.tipo_usuario, administrador.nombre_admin, administrador.apellido_admin, administrador.id_admin, usuario.foto_perfil FROM administrador INNER JOIN usuario ON administrador.id_usuario = usuario.id_usuario WHERE nombre_usuario = :nombre");
            $query->bindParam(":nombre", $nombre);
            $query->execute();
            $user_data = $query->fetch(PDO::FETCH_NUM);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
        }
        $_SESSION['datos'] = $user_data;
        echo "administrador";
    } else if ($data[1] == "Empleado" and password_verify($password, $data[2]) and $data[3] == 'Activo') {
        try {
            $query = $pdo->prepare("SELECT usuario.id_usuario, usuario.nombre_usuario, usuario.tipo_usuario, empleado.nombre_empleado, empleado.apellido_empleado, empleado.id_empleado, usuario.foto_perfil FROM empleado INNER JOIN usuario ON empleado.id_usuario = usuario.id_usuario WHERE nombre_usuario = :nombre");
            $query->bindParam(":nombre", $nombre);
            $query->execute();
            $user_data = $query->fetch(PDO::FETCH_NUM);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
        }
        $_SESSION['datos'] = $user_data;
        echo "empleado";
    } else if ($data[1] == "Cliente" and password_verify($password, $data[2]) and $data[3] == 'Activo') {
        try {
            $query = $pdo->prepare("SELECT usuario.id_usuario, usuario.nombre_usuario, usuario.tipo_usuario, cliente.nombre_cliente, cliente.apellido_cliente, cliente.id_cliente, usuario.foto_perfil FROM cliente INNER JOIN usuario ON cliente.id_usuario = usuario.id_usuario WHERE nombre_usuario = :nombre");
            $query->bindParam(":nombre", $nombre);
            $query->execute();
            $user_data = $query->fetch(PDO::FETCH_NUM);
        } catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
        }
        $_SESSION['datos'] = $user_data;
        echo "cliente";
    } else if ($data[4] != $nombre || $data[2] != $password) {
        echo "usuario o contraseña incorrecto";
    } else {
        echo "el usuario no esta activo en el sistema";
    }
} else {
    echo "este usuario no existe";
}

$pdo = null;
