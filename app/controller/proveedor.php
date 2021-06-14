<?php

class Proveedor extends Controller{

    private $idProveedor;
    private $nombreProveedor;
    private $direccionProveedor;
    private $empresaEncargada;
    private $telefonoProveedor;

    public function __construct() {
        parent::__construct();
    }
}