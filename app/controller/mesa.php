<?php

class Mesa extends Controller
{
    private $idMesa;
    private $capacidadMesa;
    private $estadoMesa;

    public function __construct()
    {
        parent::__construct();
    }

    public function añadir()
    {
        $this->capacidadMesa = $_POST['capacidadMesa'];
        $this->estadoMesa = 'Disponible';

        $resultado = $this->model->save(['capacidad' => $this->capacidadMesa, 'estado' => $this->estadoMesa]);

        if ($resultado) {
            echo "ok";
        } else {
            echo "Hubo un problema";
        }
    }

    public function obtenerTodo()
    {
        $resultado = $this->model->getAll(file_get_contents("php://input"));

        if (!empty($resultado)) {
            echo json_encode($resultado);
        } else {
            echo "Hubo un problema";
        }
    }

    public function obtener()
    {
        $this->idMesa = file_get_contents("php://input");

        $this->model->get($this->idMesa);
    }

    public function actualizar()
    {
        $this->idMesa = $_POST['idMesa'];
        $this->capacidadMesa = $_POST['capacidadMesaUpdate'];
        $this->estadoMesa = $_POST['estadoMesa'];

        if ($this->model->update(['id' => $this->idMesa, 'capacidad' => $this->capacidadMesa, 'estado' => $this->estadoMesa])) {
            echo "ok";
        } else {
            echo "Hubo un problema";
        }
    }

    public function eliminar()
    {
        $this->idMesa = file_get_contents("php://input");

        if ($this->model->delete($this->idMesa)) {
            echo "ok";
        } else {
            echo "Hubo un problema";
        }
    }
}
