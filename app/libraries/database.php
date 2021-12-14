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
        $this->host = constant('DB_HOST');
        $this->db = constant('DB_NAME');
        $this->user = constant('DB_USER');
        $this->password = constant('DB_PASSWORD');
        $this->charset = constant('DB_CHARSET');
        $this->port = constant('DB_PORT');
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
