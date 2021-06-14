<?php

class Cliente extends Controller
{

    private $idCliente;
    private $nombreCliente;
    private $apellidoCliente;
    private $fechaNacimientoCliente;
    private $emailCliente;
    private $celularCliente;
    private $idUsuario;
    private $session;

    public function __construct()
    {
        parent::__construct();
        $this->session = new Session();
    }

    public function render()
    {
        $this->view->render('cliente/dashboard');
    }

    public function updateInfo()
    {
        $this->view->render('cliente/updateInfo');
    }

    public function reservas()
    {
        $this->view->render('cliente/reserva');
    }

    public function soporte()
    {
        $this->view->render('cliente/soporte');
    }

    public function cambioPassword()
    {
        $this->idAdmin = $this->session->get('user')['id_usuario'];

        $pass_old = $_POST['pass_old'];
        $pass_new2 = $_POST['pass_new2'];
        $pass_new = $_POST['pass_new'];
        $pass_hash = password_hash($pass_new, PASSWORD_BCRYPT);

        $resultado = $this->model->changePassword(['pass_old' => $pass_old, 'pass_new' => $pass_new, 'pass_new2' => $pass_new2, 'pass_hash' => $pass_hash, 'id' => $this->idAdmin]);

        if ($resultado) {
            echo "ok";
        } else {
            echo "Hubo un problema";
        }
    }

    public function editarInformacion()
    {
        $this->idUsuario = $this->session->get('user')['id_usuario'];
        $this->fechaNacimientoCliente = $_POST['fecha'];
        $this->nombreCliente = $_POST['nombre'];
        $this->apellidoCliente = $_POST['apellido'];
        $this->emailCliente = $_POST['email'];
        $this->celularCliente = $_POST['cel'];

        if ($this->model->update(['nombre' => $this->nombreCliente, 'fecha' => $this->fechaNacimientoCliente, 'id' => $this->idUsuario, 'apellido' => $this->apellidoCliente, 'cel' => $this->celularCliente, 'email' => $this->emailCliente])) {
            echo "ok";
        } else {
            echo "Hubo un problema";
        }
    }

    public function listarInformacion()
    {
        $this->idUsuario = $this->session->get('user')['id_usuario'];

        $resultado = $this->model->get($this->idUsuario);

        if ($resultado) {
            echo $resultado;
        } else {
            echo "Hubo un problema";
        }
    }

    public function editarFotoPerfil()
    {
        $this->idUsuario = $this->session->get('user')['id_usuario'];
        $this->fotoPerfil = $_FILES['photo_user'];

        $resultado = $this->model->changePhoto(['id' => $this->idUsuario, 'photo_user' => $this->fotoPerfil]);

        if ($resultado) {
            echo "ok";
        } else {
            echo "Hubo un problema";
        }
    }
}
