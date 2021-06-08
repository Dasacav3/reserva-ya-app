<?php
    session_start();

    $sesion = [$_SESSION['datos']];

    require("../../../controller/database.php");
 
    if(isset($_POST)){

        //Obtiene los datos del formulario
        $nombre_insumo = $_POST['nombre'];
        $cantidad_insumo = $_POST['cantidad'];
        $fecha_compra_insumo = $_POST['fecha_compra'];
        $valor_insumo = $_POST['valor'];
        $id_proveedor = $_POST['proveedor'];
        $id_categoria_insumo = $_POST['categoria'];

        try {
            $queryReserva = $pdo->prepare("INSERT INTO insumo (nombre_insumo, cantidad_insumo, fecha_compra_insumo, valor_insumo, id_proveedor,id_categoria_insumo)
             VALUES (:id, :cantidad, :fecha, :valor, :proveedor, :categoria)");
            $queryReserva->bindParam(":id",$nombre_insumo);
            $queryReserva->bindParam(":cantidad",$cantidad_insumo);
            $queryReserva->bindParam(":fecha",$fecha_compra_insumo);
            $queryReserva->bindParam(":valor",$valor_insumo);
            $queryReserva->bindParam(":proveedor",$id_proveedor);
            $queryReserva->bindParam(":categoria",$id_categoria_insumo);
            $queryReserva->execute();
            $id_reserva = $pdo->lastInsertId();
        }catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }


        echo "ok";
    }
    $pdo=null;
    
?>