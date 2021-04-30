<?php

class Empleado extends Controller
{
    public function __construct()
    {
        parent::__construct();
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
}
