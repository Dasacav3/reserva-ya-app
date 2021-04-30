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

    public function saludo()
    {
        echo "<p>Ejecutaste el metodo saludo</p>";
    }
}
