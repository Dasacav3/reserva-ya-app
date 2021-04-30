<?php

class Cliente extends Controller
{
    public function __construct()
    {
        parent::__construct();
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
}
