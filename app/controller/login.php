<?php

class Login extends Controller
{

    private $username;
    private $password;
    private $session;

    public function __construct()
    {
        parent::__construct();
        $this->session = new Session();
    }

    public function render()
    {
        $this->view->render('login');
    }


    public function loginUser()
    {
        $this->username = $_POST['user_name'];
        $this->password = $_POST['password'];
        $data = $this->model->get(['user' => $this->username, 'clave' => $this->password]);

        if ($data['tipo_usuario'] == 'Administrador') {
            echo "administrador";
        } else if ($data['tipo_usuario'] == 'Cliente') {
            echo "cliente";
        } else if ($data['tipo_usuario'] == 'Empleado') {
            echo "empleado";
        } else {
            echo "usuario o contraseña incorrecto";
        }


        // Iniciar sesión
        $this->session->add('user', $data);
        // var_dump($this->session->get('user'));
    }
}
