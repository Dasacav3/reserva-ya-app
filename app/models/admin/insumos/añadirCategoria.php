<?php
    session_start();

    $sesion = [$_SESSION['datos']];

    require("../../../controller/database.php");
 
    if(isset($_POST)){

        //Obtiene los datos del formulario
        $NOMBRE_CATEGORIA_INSUMO = $_POST['nombre'];


        try {
            $query = $pdo->prepare("INSERT INTO categoria_insumo (nombre_categoria_insumo)
             VALUES (:nombre)");
            $query->bindParam(":nombre",$NOMBRE_CATEGORIA_INSUMO);
            $query->execute();
        }catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }


        echo "ok";
    }
    $pdo=null;
    
?>