<?php

class Registro extends Controller
{

    protected $usuario;
    protected $cliente;
    protected $empleado;

    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $this->view->render('registro');
    }


    public function añadirCliente()
    {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fecha = $_POST['nacimiento'];
        $celular = $_POST['cel'];
        $correo = $_POST['email'];
        $password = $_POST['password'];
        $estado = 'Activo';
        $tipo = 'Cliente';
        $foto = "public/profile_photo/user_default_reservaya.png";

    
        if($this->model->registrarCliente(['username' => $correo, 'clave' => $password, 'estado' => $estado, 'tipo' => $tipo, 'foto' => $foto, 'nombre' => $nombre, 'apellido' => $apellido, 'fecha' => $fecha, 'celular' => $celular, 'correo' => $correo])){
            echo "ok";
        }else{
            echo "Hubo un problema";
        }
        
    }

    public function añadirEmpleado() 
    {

    }
}
