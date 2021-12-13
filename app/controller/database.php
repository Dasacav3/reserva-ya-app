<?php
// Configuracion de la BD

include __DIR__ . '/../config/config.php';

$servidor = "mysql:host=".constant('HOST').";dbname=".constant('DB').";port=".constant('PORT');
$user = constant('USER');
$pass = constant('PASSWORD');
try {
    $pdo = new PDO($servidor, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (PDOException $e) {
    echo "Conexion fallida " . $e->getMessage();
}
return $pdo;
