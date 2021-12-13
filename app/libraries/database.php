<?php

class Database
{

    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    private $port;

    public function __construct()
    {
        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset = constant('CHARSET');
        $this->port = constant('PORT');
    }

    protected function connect()
    {
        try {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";port=" . $this->port .  ";charset=" . $this->charset;
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false];
            $pdo = new PDO($connection, $this->user, $this->password, $options);

            return $pdo;
        } catch (PDOException $e) {
            echo "Conexión fallida: " . $e->getMessage();
        }
    }
}
