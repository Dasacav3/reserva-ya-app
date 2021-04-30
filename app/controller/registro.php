<?php

class Registro extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $this->view->render('registro');
    }


    public function saludo()
    {
        echo "<p>Ejecutaste el metodo saludo</p>";
    }
}
