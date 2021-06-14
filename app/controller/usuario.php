<?php

class Usuario extends Controller
{

    private $idUsuario;
    private $nombreUsuario;
    private $claveUsuario;
    private $tipoUsuario;
    private $estadoUsuario;
    private $fotoPerfil;
    private $documentoEmpleado;
    private $celularEmpleado;
    private $nombreEmpleado;
    private $emailEmpleado;
    private $apellidoEmpleado;
    private $nombreCliente;
    private $apellidoCliente;
    private $fechaCliente;
    private $celularCliente;
    private $emailCliente;


    public function __construct()
    {
        parent::__construct();
    }

    public function añadirEmpleado()
    {
        $this->documentoEmpleado = $_POST['doc_emp'];
        $this->nombreEmpleado = $_POST['name_emp'];
        $this->apellidoEmpleado = $_POST['last_emp'];
        $this->emailEmpleado = $_POST['email'];
        $this->celularEmpleado = $_POST['cel_emp'];
        $this->claveUsuario = $_POST['pass_emp'];
        $this->tipoUsuario = 'Empleado';
        $this->estadoUsuario = 1;
        $this->fotoPerfil = 'http://localhost/reservaya-mvc/public/profile_photo/user_default_reservaya.png';

        if ($this->model->save(['doc' => $this->documentoEmpleado, 'nombre' => $this->nombreEmpleado, 'apellido' => $this->apellidoEmpleado, 'email' => $this->emailEmpleado, 'cel' => $this->celularEmpleado, 'clave' => $this->claveUsuario, 'tipo' => $this->tipoUsuario, 'estado' => $this->estadoUsuario, 'foto' => $this->fotoPerfil])) {
            echo "ok";
        } else {
            echo "Hubo un problema";
        }
    }

    public function listarUsuarios()
    {
        $resultado = $this->model->getAll(file_get_contents("php://input"));
        if (!empty($resultado)) {
            echo $resultado;
        } else {
            echo "Hubo un problema";
        }
    }

    public function editarCliente()
    {
        $this->nombreCliente = $_POST['name_cliente_1'];
        $this->apellidoCliente = $_POST['last_cliente_1'];
        $this->fechaCliente = $_POST['fecha_cliente_1'];
        $this->estadoUsuario = $_POST['estado_usuario'];
        $this->emailCliente = $_POST['email_cliente_1'];
        $this->celularCliente = $_POST['cel_cliente_1'];
        $this->idUsuario = $_POST['id_cliente'];
        $this->tipoUsuario = $_POST['tipo_usuario'];

        if($this->model->update(['nombre' => $this->nombreCliente, 'apellido' => $this->apellidoCliente, 'fecha' => $this->fechaCliente, 'email' => $this->emailCliente, 'cel' => $this->celularCliente, 'id' => $this->idUsuario, 'estado' => $this->estadoUsuario, 'tipo' => $this->tipoUsuario])){
            echo "ok";
        }
    }

    public function editarEmpleado()
    {
        $this->idUsuario = $_POST['id_empleado'];
        $this->documentoEmpleado = $_POST['doc_emp_1'];
        $this->nombreEmpleado = $_POST['name_emp_1'];
        $this->apellidoEmpleado = $_POST['last_emp_1'];
        $this->estadoUsuario = $_POST['estado_usuario'];
        $this->emailEmpleado = $_POST['email_emp_1'];
        $this->celularEmpleado = $_POST['cel_emp_1'];
        $this->tipoUsuario = $_POST['tipo_usuario'];

        if($this->model->update(['doc' => $this->documentoEmpleado, 'nombre' => $this->nombreEmpleado, 'apellido' => $this->apellidoEmpleado, 'email' => $this->emailEmpleado, 'cel' => $this->celularEmpleado, 'id' => $this->idUsuario, 'tipo' => $this->tipoUsuario, 'estado' => $this->estadoUsuario])){
            echo "ok";
        }
    }

    public function listarDatosUsuario()
    {
        $resultado = $this->model->get(file_get_contents("php://input"));
        if (!empty($resultado)) {
            echo $resultado;
        }
    }

    public function eliminarUsuarios()
    {
        $resultado = $this->model->delete(file_get_contents("php://input"));
        if ($resultado) {
            echo "ok";
        } else {
            echo "Hubo un problema";
        }
    }
}
