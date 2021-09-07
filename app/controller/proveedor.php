<?php

class Proveedor extends Controller
{

    private $idProveedor;
    private $nombreProveedor;
    private $direccionProveedor;
    private $empresaEncargada;
    private $telefonoProveedor;

    public function __construct()
    {
        parent::__construct();
    }

    public function listarProveedor()
    {
        $resultado = $this->model->getAll("Hello");

        if ($resultado) {
            echo json_encode($resultado);
        } else {
            echo "Hubo un problema";
        }
    }

    public function obtenerProveedor()
    {
        $resultado = $this->model->get(file_get_contents("php://input"));

        if ($resultado) {
            echo json_encode($resultado);
        } else {
            echo "Hubo un problema";
        }
    }
}
