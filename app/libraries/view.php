<?php

class View
{

    private $session;

    public function __construct()
    {
        $this->mensaje = "";
        $this->session = new Session();
    }

    public function render($nombre)
    {
        $path = 'app/views/' . $nombre . '.php';
        if (file_exists($path)) {
            require $path;
        } else {
            $path = new Error_Manage();
        }
    }
}
