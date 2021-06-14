<?php

class Producto extends Controller{

    private $idProducto;
    private $idCategoriaProducto;
    private $nombreProducto;
    private $descripcionProducto;
    private $cantidadProducto;
    private $valorProducto;
    private $imagenProducto;
    private $nombreCategoriaProducto;

    public function __construct() {
        parent::__construct();
    }
}