<?php

class Admin extends Controller
{
    public function __construct()
    {
        parent::__construct();
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

    public function insumos()
    {
        $this->view->render('admin/insumos');
    }

    public function proveedores()
    {
        $this->view->render('admin/proveedores');
    }

    public function usuarios()
    {
        $this->view->render('admin/usuarios');
    }
    
    public function informacion()
    {
        $this->view->render('admin/informacion');
    }

    public function soporte()
    {
        $this->view->render('admin/soporte');
    }
}
