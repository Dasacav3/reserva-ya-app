<?php
    session_start();

    $sesion = [$_SESSION['datos']];

    require("../../../controller/database.php");
 
    if(isset($_POST)){

        //Obtiene los datos del formulario
        $ID_CATEGORIA_INSUMO = $_POST['idCategoriaInsumo'];
        $NOMBRE_CATEGORIA_INSUMO = $_POST['nombre'];


        try {
            $query = $pdo->prepare("UPDATE categoria_insumo SET nombre_categoria_insumo = :nombre WHERE id_categoria_insumo = :id");
            $query->execute(['nombre' => $NOMBRE_CATEGORIA_INSUMO, 'id' => $ID_CATEGORIA_INSUMO]);
        }catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }


        echo "ok";
    }
    $pdo=null;
