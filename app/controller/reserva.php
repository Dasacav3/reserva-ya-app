<?php

class Reserva extends Controller
{

    private $idReserva;
    private $idCliente;
    private $idMesa;
    private $fechaReserva;
    private $horaReserva;
    private $estadoReserva;
    private $asientos;
    private $session;

    public function __construct()
    {
        parent::__construct();
        $this->session = new Session();

    }

    public function añadirReserva()
    {
        $this->fechaReserva = $_POST['fecha_reserva'];
        $this->horaReserva = $_POST['hora_reserva'];
        $this->idMesa = $_POST['mesa'];
        $this->asientos = $_POST['asientos'];
        $this->estadoReserva = 'Activa';
        $this->idCliente = $_POST['cliente'];

        if ($this->model->save(['id' => $this->idCliente, 'fecha' => $this->fechaReserva, 'hora' => $this->horaReserva, 'estado' => $this->estadoReserva, 'asiento' => $this->asientos, 'mesa' => $this->idMesa])) {
            echo "ok";
        } else {
            echo "Hubo un problema";
        }
    }

    public function añadirReservaCli(){
        $this->idCliente = $this->session->get('user')['id_cliente'];

        $this->fechaReserva = $_POST['fecha_reserva'];
        $this->horaReserva = $_POST['hora_reserva'];
        $this->idMesa = $_POST['mesa'];
        $this->asientos = $_POST['asientos'];
        $this->estadoReserva = 'Activa';

        if ($this->model->saveCli(['id' => $this->idCliente, 'fecha' => $this->fechaReserva, 'hora' => $this->horaReserva, 'estado' => $this->estadoReserva, 'asiento' => $this->asientos, 'mesa' => $this->idMesa])) {
            echo "ok";
        } else {
            echo "Hubo un problema";
        }
    }

    public function listarReserva()
    {
        $resultado = $this->model->getAll(file_get_contents("php://input"));

        if (!empty($resultado)) {
            echo $resultado;
        }
    }

    public function listarMesa()
    {
        $resultado = $this->model->getMesa();

        if (!empty($resultado)) {
            echo $resultado;
        }
    }

    public function listarCliente()
    {
        $resultado = $this->model->getCliente();

        if (!empty($resultado)) {
            echo $resultado;
        }
    }

    public function listarDatosReserva()
    {
        $resultado = $this->model->get(file_get_contents("php://input"));

        if (!empty($resultado)) {
            echo $resultado;
        }
    }

    public function editarReserva()
    {
        $this->idReserva = $_POST['id_reserva'];
        $this->fechaReserva = $_POST['edit_fecha_reserva'];
        $this->horaReserva = $_POST['edit_hora_reserva'];
        $this->asientos = $_POST['edit_asientos'];
        $this->estadoReserva = $_POST['estado'];
        $this->idMesa = $_POST['edit_mesa'];

        if ($this->model->update(['id' => $this->idReserva, 'fecha' => $this->fechaReserva, 'hora' => $this->horaReserva, 'estado' => $this->estadoReserva, 'asientos' => $this->asientos, 'mesa' => $this->idMesa])) {
            echo "ok";
        } else {
            echo "Hubo un problema";
        }
    }

    public function cancelarReserva() {
        if ($this->model->delete(file_get_contents("php://input"))) {
            echo "ok";
        } else {
            echo "Hubo un problema";
        }
    }
}
