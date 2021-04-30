<?php

class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $this->view->render('login');
    }


    public function saludo()
    {
        echo "<p>Ejecutaste el metodo saludo</p>";
    }
}
