<?php

class Carta extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $this->view->render('carta');
    }
}
