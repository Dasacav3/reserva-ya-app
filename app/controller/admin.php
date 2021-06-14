<?php

class Admin extends Controller
{

    private $idAdmin;
    private $nombreAdmin;
    private $apellidoAdmin;
    private $emailAdmin;
    private $celularAdmin;
    private $fotoPerfil;
    private $session;


    public function __construct()
    {
        parent::__construct();
        $this->session = new Session();
    }

    public function render()
    {
        $this->view->render('admin/dashboard');
    }

    public function updateInfo()
    {
        $this->view->render('admin/updateInfo');
    }

    public function reservas()
    {
        $this->view->render('admin/reserva');
    }

    public function mesas()
    {
        $this->view->render('admin/mesas');
    }

    public function productos()
    {
        $this->view->render('admin/productos');
    }

    public function agregar_producto()
    {
        $this->view->render('admin/agregar_producto');
    }
    public function verificar_eliminar()
    {
        $this->view->render('admin/verificar_eliminar');
    }

    public function actualizar_producto()
    {
        $this->view->render('admin/actualizar_producto');
    }

    public function insumos()
    {
        $this->view->render('admin/insumos');
    }

    public function proveedores()
    {
        $this->view->render('admin/proveedores');
    }

    public function agregarprov()
    {
        $this->view->render('admin/agregarprov');
    }

    public function eliminaprov()
    {
        $this->view->render('admin/eliminaprov');
    }

    public function actualizaprov()
    {
        $this->view->render('admin/actualizaprov');
    }

    public function usuarios()
    {
        $this->view->render('admin/usuarios');
    }

    public function reportes()
    {
        $this->view->render('admin/reportes');
    }

    public function soporte()
    {
        $this->view->render('admin/soporte');
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
        $this->idAdmin = $this->session->get('user')['id_usuario'];

        $this->nombreAdmin = $_POST['nombre'];
        $this->apellidoAdmin = $_POST['apellido'];
        $this->emailAdmin = $_POST['email'];
        $this->celularAdmin = $_POST['cel'];

        if($this->model->update(['nombre' => $this->nombreAdmin, 'id' => $this->idAdmin, 'apellido' => $this->apellidoAdmin, 'cel' => $this->celularAdmin, 'email' => $this->emailAdmin])){
            echo "ok";
        }else{
            echo "Hubo un problema";
        }
    }

    public function listarInformacion() {
        $this->idAdmin = $this->session->get('user')['id_usuario'];

        $resultado = $this->model->get($this->idAdmin);

        if($resultado){
            echo $resultado;
        }else{
            echo "Hubo un problema";
        }
    }

    public function editarFotoPerfil(){
        $this->idAdmin = $this->session->get('user')['id_usuario'];
        $this->fotoPerfil = $_FILES['photo_user'];

        $resultado = $this->model->changePhoto(['id' => $this->idAdmin, 'photo_user' => $this->fotoPerfil]);

        if($resultado){
            echo "ok";
        }else{
            echo "Hubo un problema";
        }
    }
}
