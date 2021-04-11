<?php
// Configuracion de la BD
    // $host = "localhost";
    // $username = "root";
    // $passwd = "";
    // $dbname = "reservaya";

    // define('DB_HOST','localhost');
    // define('DB_USER','root');
    // define('DB_PASS','');
    // define('DB_NAME','reservaya2');

    // $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // if ($conn ->connect_error){
    //     die ("Conexión fallida: "  . $conn->connect_error);
    // }

    $servidor = "mysql:dbname=reservaya2;host=localhost";
    $user = "root";
    $pass = "";
    try {
        $pdo = new PDO($servidor, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    } catch (PDOException $e) {
        echo "Conexion fallida " . $e->getMessage();
    }


?>