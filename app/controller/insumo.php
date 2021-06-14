<?php

class Insumo extends Controller
{

    private $idInsumo;
    private $nombreInsumo;
    private $cantidadInsumo;
    private $fechaCompraInsumo;
    private $valorInsumo;
    private $idProveedor;
    private $idCategoriaInsumo;
    private $nombreCategoriaInsumo;

    public function __construct()
    {
        parent::__construct();
    }

    public function añadirCategoriaInsumo()
    {
        $this->nombreCategoriaInsumo = $_POST['nombre'];

        if($this->model->saveCategory($this->nombreCategoriaInsumo)){
            echo "ok";
        }else{
            echo "Hubo un problema";  
        }
    }

    public function editarCategoriaInsumo()
    {
        $this->idCategoriaInsumo = $_POST['idCategoriaInsumo'];
        $this->nombreCategoriaInsumo = $_POST['nombre'];

        if($this->model->updateCategory(['nombre' => $this->nombreCategoriaInsumo, 'id' => $this->idCategoriaInsumo])){
            echo "ok";
        }else{
            echo "Hubo un problema";
        }
    }

    public function añadirInsumo()
    {
        $this->nombreInsumo = $_POST['nombre'];
        $this->cantidadInsumo = $_POST['cantidad'];
        $this->fechaCompraInsumo = $_POST['fecha_compra'];
        $this->valorInsumo = $_POST['valor'];
        $this->idProveedor = $_POST['proveedor'];
        $this->idCategoriaInsumo = $_POST['categoria'];

        if($this->model->save(['nombre' => $this->nombreInsumo, 'cantidad' => $this->cantidadInsumo, 'fecha' => $this->fechaCompraInsumo, 'valor' => $this->valorInsumo, 'proveedor' => $this->idProveedor, 'categoria' => $this->idCategoriaInsumo])){
            echo "ok";
        }else{
            echo "Hubo un problema";  
        }
    }

    public function listarInsumos()
    {
        $resultado = $this->model->getAll(file_get_contents("php://input"));

        if(!empty($resultado)){
            echo $resultado;
        }
    }

    public function listarCategoria(){
        $resultado = $this->model->getCategory();

        if(!empty($resultado)){
            echo $resultado;
        }
    }

    public function listarProveedor(){
        $resultado = $this->model->getProveedor();

        if(!empty($resultado)){
            echo $resultado;
        }
    }

    public function listarDatosInsumo()
    {
        $resultado = $this->model->get(file_get_contents("php://input"));

        if(!empty($resultado)){
            echo $resultado;
        }
    }

    public function editarInsumos()
    {
        $this->idInsumo = $_POST['id_insumo'];
        $this->nombreInsumo = $_POST['nombreEditar'];
        $this->cantidadInsumo = $_POST['cantidadEditar'];
        $this->fechaCompraInsumo = $_POST['fecha_compra'];
        $this->valorInsumo = $_POST['valorEditar'];
        $this->idProveedor = $_POST['proveedorEditar'];
        $this->idCategoriaInsumo = $_POST['categoriaEditar'];

        $resultado = $this->model->update(['nombre_insumo' => $this->nombreInsumo, 'cantidad_insumo' => $this->cantidadInsumo, 'fecha_compra_insumo' => $this->fechaCompraInsumo, 'valor_insumo' => $this->valorInsumo, 'id_proveedor' => $this->idProveedor, 'id_categoria_insumo' => $this->idCategoriaInsumo, 'id' => $this->idInsumo]);

        if($resultado){
            echo "ok";
        }else{
            echo "Hubo un problema";
        }
    }

    public function eliminarInsumos()
    {
        if($this->model->delete(file_get_contents("php://input"))){
            echo "ok";
        }else{
            echo "Hubo un problema";  
        }
    }
}
