<?php
// Configuracion de la BD
    // $host = "localhost";
    // $username = "root";
    // $passwd = "";
    // $dbname = "reservaya";

    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','reservaya');

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn ->connect_error){
        die ("Conexión fallida: "  . $conn->connect_error);
    }

    // echo "Conexión exitosa...";

?>