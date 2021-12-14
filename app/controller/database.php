<?php
// Configuracion de la BD

include __DIR__ . '/../config/config.php';

$servidor = "mysql:host=".constant('DB_HOST').";dbname=".constant('DB_NAME').";port=".constant('DB_PORT');
$user = constant('DB_USER');
$pass = constant('DB_PASSWORD');
try {
    $pdo = new PDO($servidor, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (PDOException $e) {
    echo "Conexion fallida " . $e->getMessage();
}
return $pdo;
