<?php

    $data = file_get_contents("php://input");

    include("../../../controller/database.php");

    session_start();

    $sesion = $_SESSION['datos'];

    if($sesion == null || $sesion = ''){
        echo 'Usted no tiene autorización';
        header("location: ../../views/login.php");
        die();
    }

    $tipo = $_POST['tipo_usuario'];

    if($tipo == 'Empleado'){
        $id = $_POST['id_empleado'];
        $doc = $_POST['doc_emp_1'];
        $nombre = $_POST['name_emp_1'];
        $apellido = $_POST['last_emp_1'];
        $estado = $_POST['estado_usuario'];
        $email = $_POST['email_emp_1'];
        $cel = $_POST['cel_emp_1'];


        try {
            $queryEmpleado = $pdo->prepare("UPDATE empleado SET doc_empleado = :doc, nombre_empleado = :nombre, apellido_empleado = :apellido, email_empleado = :email, celular_empleado = :cel WHERE id_usuario = :id");
            $queryEmpleado->bindParam(":doc",$doc);
            $queryEmpleado->bindParam(":nombre",$nombre);
            $queryEmpleado->bindParam(":apellido",$apellido);
            $queryEmpleado->bindParam(":email",$email);
            $queryEmpleado->bindParam(":cel",$cel);
            $queryEmpleado->bindParam(":id",$id);
            $queryEmpleado->execute();
        }catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        try {
            $queryUser = $pdo->prepare("UPDATE usuario SET estado_usuario = :estado WHERE id_usuario = :id");
            $queryUser->bindParam(":estado",$estado);
            $queryUser->bindParam(":id",$id);
            $queryUser->execute();
        }catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        echo "ok";

    }else if($tipo == 'Cliente'){
        $id = $_POST['id_cliente'];
        $nombre = $_POST['name_cliente_1'];
        $apellido = $_POST['last_cliente_1'];
        $fecha = $_POST['fecha_cliente_1'];
        $estado = $_POST['estado_usuario'];
        $email = $_POST['email_cliente_1'];
        $cel = $_POST['cel_cliente_1'];

        try {
            $queryCliente = $pdo->prepare("UPDATE cliente SET nombre_cliente = :nombre, apellido_cliente = :apellido, fecha_nacimiento_cliente = :fecha, email_cliente = :email, celular_cliente = :cel WHERE id_usuario = :id");
            $queryCliente->bindParam(":nombre",$nombre);
            $queryCliente->bindParam(":apellido",$apellido);
            $queryCliente->bindParam(":fecha",$fecha);
            $queryCliente->bindParam(":email",$email);
            $queryCliente->bindParam(":cel",$cel);
            $queryCliente->bindParam(":id",$id);
            $queryCliente->execute();
        }catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        try {
            $queryUser = $pdo->prepare("UPDATE usuario SET estado_usuario = :estado WHERE id_usuario = :id");
            $queryUser->bindParam(":estado",$estado);
            $queryUser->bindParam(":id",$id);
            $queryUser->execute();
        }catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        echo "ok";
        
    }

    $pdo=null;

?>