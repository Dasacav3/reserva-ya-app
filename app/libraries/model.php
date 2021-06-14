<?php

include_once 'app/libraries/imodel.php';
class Model extends Database
{

    protected $session;
    protected $db;

    function __construct()
    {
        $this->db = new Database();
        $this->session = new Session();
        $this->session->init();
    }

    function query($query)
    {
        return $this->db->connect()->query($query);
    }

    function prepare($query)
    {
        return $this->db->connect()->prepare($query);
    }

    public function close()
    {
        return $this->db = null;
    }

    public function beginTransaction(){
        return $this->db->connect()->beginTransaction();
    }

    public function commit(){
        return $this->db->connect()->commit();
    }

    public function rollBack(){
        return $this->db->connect()->rollBack();
    }

    public function lastInsertId(){
        return $this->db->connect()->lastInsertId();
    }
}
