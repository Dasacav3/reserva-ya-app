<?php
// Configuracion de la BD

    $servidor = "mysql:dbname=reservaya;host=localhost";
    $user = "root";
    $pass = "mariadb";
    try {
        $pdo = new PDO($servidor, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    } catch (PDOException $e) {
        echo "Conexion fallida " . $e->getMessage();
    }


?>