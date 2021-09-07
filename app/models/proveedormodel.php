<?php

class ProveedorModel extends Model implements IModel
{

    public function __construct()
    {
        parent::__construct();
    }

    public function save($array)
    {
    }

    public function get($id)
    {
        try {
            $query = $this->prepare("SELECT * FROM proveedor WHERE id_proveedor = :id");
            $query->execute(['id' => $id]);
            $data = $query->fetch(PDO::FETCH_BOTH);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
        return $data;
        $this->close();
    }

    public function getAll($search)
    {
        try {
            $query = $this->prepare("SELECT * FROM proveedor");
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_BOTH);
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
        return $data;
        $this->close();
    }

    public function update($array)
    {
    }

    public function delete($id)
    {
    }
}
