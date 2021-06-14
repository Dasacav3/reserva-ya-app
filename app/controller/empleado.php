<?php

class Empleado extends Controller
{

    private $idEmpleado;
    private $docEmpleado;
    private $nombreEmpleado;
    private $apellidoEmpleado;
    private $emailEmpleado;
    private $celularEmpleado;
    private $idUsuario;
    private $session;

    public function __construct()
    {
        parent::__construct();
        $this->session = new Session();
    }

    public function render()
    {
        $this->view->render('empleado/dashboard');
    }

    public function updateInfo()
    {
        $this->view->render('empleado/updateInfo');
    }

    public function reservas()
    {
        $this->view->render('empleado/reserva');
    }

    public function productos()
    {
        $this->view->render('empleado/productos');
    }

    public function soporte()
    {
        $this->view->render('empleado/soporte');
    }

    public function cambioPassword() {
        $this->idAdmin = $this->session->get('user')['id_usuario'];

        $pass_old = $_POST['pass_old'];
        $pass_new2 = $_POST['pass_new2'];
        $pass_new = $_POST['pass_new'];
        $pass_hash = password_hash($pass_new,PASSWORD_BCRYPT);

        $resultado = $this->model->changePassword(['pass_old' => $pass_old, 'pass_new' => $pass_new, 'pass_new2' => $pass_new2, 'pass_hash' => $pass_hash, 'id' => $this->idAdmin]);

        if($resultado){
            echo "ok";
        }else{
            echo "Hubo un problema";
        }

    }

    public function editarInformacion() {
        $this->idUsuario = $this->session->get('user')['id_usuario'];
        $this->docEmpleado = $_POST['doc'];
        $this->nombreEmpleado = $_POST['nombre'];
        $this->apellidoEmpleado = $_POST['apellido'];
        $this->emailEmpleado = $_POST['email'];
        $this->celularEmpleado = $_POST['cel'];

        if($this->model->update(['nombre' => $this->nombreEmpleado, 'doc' => $this->docEmpleado, 'id' => $this->idUsuario, 'apellido' => $this->apellidoEmpleado, 'cel' => $this->celularEmpleado, 'email' => $this->emailEmpleado])){
            echo "ok";
        }else{
            echo "Hubo un problema";
        }
    }

    public function listarInformacion() {
        $this->idUsuario = $this->session->get('user')['id_usuario'];

        $resultado = $this->model->get($this->idUsuario);

        if($resultado){
            echo $resultado;
        }else{
            echo "Hubo un problema";
        }
    }

    public function editarFotoPerfil(){
        $this->idUsuario = $this->session->get('user')['id_usuario'];
        $this->fotoPerfil = $_FILES['photo_user'];

        $resultado = $this->model->changePhoto(['id' => $this->idUsuario, 'photo_user' => $this->fotoPerfil]);

        if($resultado){
            echo "ok";
        }else{
            echo "Hubo un problema";
        }
    }
}
