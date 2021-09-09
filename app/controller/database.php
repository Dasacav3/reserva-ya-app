<?php
// Configuracion de la BD

    $servidor = "mysql:dbname=".$_ENV['DB'].";host=".$_ENV['HOST'];
    $user = $_ENV['USER'];
    $pass = $_ENV['PASSWORD'];
    try {
        $pdo = new PDO($servidor, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    } catch (PDOException $e) {
        echo "Conexion fallida " . $e->getMessage();
    }
