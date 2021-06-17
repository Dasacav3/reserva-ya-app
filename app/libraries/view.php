<?php

error_reporting(0);

class View
{
    private $session;

    public function __construct()
    {
        $this->mensaje = "";
        $this->session = new Session();
        $this->model = new Model();
    }

    public function render($nombre)
    {
        $path = 'app/views/' . $nombre . '.php';
        if (file_exists($path)) {
            require $path;
        } else {
            $path = new Error_Manage();
        }
    }

    public function getCantReservas()
    {
        try {
            $query = $this->model->prepare("SELECT COUNT(*) FROM reservacion");
            $query->execute();
            $resultado = $query->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $resultado[0];
        $this->model->close();
    }

    public function getCantReservasCli(){
        $id = $this->session->get('user')['id_cliente'];
        try {
            $query = $this->model->prepare("SELECT COUNT(*) FROM reservacion WHERE id_cliente = :id");
            $query->execute(['id' => $id]);
            $resultado = $query->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $resultado[0];
        $this->model->close();
    }

    public function getCantInsumos(){
        try {
            $query = $this->model->prepare("SELECT COUNT(*) FROM insumo");
            $query->execute();
            $resultado = $query->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $resultado[0];
        $this->model->close();
    }

    public function getCantProductos(){
        try {
            $query = $this->model->prepare("SELECT COUNT(*) FROM producto");
            $query->execute();
            $resultado = $query->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $resultado[0];
        $this->model->close();
    }

    public function getCantProveedores(){
        try {
            $query = $this->model->prepare("SELECT COUNT(*) FROM proveedor");
            $query->execute();
            $resultado = $query->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $resultado[0];
        $this->model->close();
    }

    public function getCantClientes(){
        try {
            $query = $this->model->prepare("SELECT COUNT(*) FROM cliente");
            $query->execute();
            $resultado = $query->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $resultado[0];
        $this->model->close();
    }

    public function getCantEmpleados(){
        try {
            $query = $this->model->prepare("SELECT COUNT(*) FROM empleado");
            $query->execute();
            $resultado = $query->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $resultado[0];
        $this->model->close();
    }

    public function getCantMesas(){
        try {
            $query = $this->model->prepare("SELECT COUNT(*) FROM mesa");
            $query->execute();
            $resultado = $query->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $resultado[0];
        $this->model->close();
    }
}
