<?php

class Main extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $this->view->render('index');
    }


    public function saludo()
    {
        echo "<p>Ejecutaste el metodo saludo</p>";
    }
}
