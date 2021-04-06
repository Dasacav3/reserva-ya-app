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


        $query = "UPDATE empleado SET doc_empleado = '$doc', nombre_empleado = '$nombre', apellido_empleado = '$apellido', email_empleado = '$email', celular_empleado = '$cel' WHERE id_usuario = $id";
        $result = mysqli_query($conn,$query);

        if(!$result) {
            die('Query Failed 1 '. mysqli_error($conn));
        }else{
            // echo "ok";
        }

        $query2 = "UPDATE usuario SET estado_usuario = '$estado' WHERE id_usuario = $id";
        $result2 = mysqli_query($conn,$query2);

        if(!$result2) {
            die('Query Failed 2 '. mysqli_error($conn));
        }else{
            echo "ok";
        }

    }else if($tipo == 'Cliente'){
        $id = $_POST['id_cliente'];
        $nombre = $_POST['name_cliente_1'];
        $apellido = $_POST['last_cliente_1'];
        $fecha = $_POST['fecha_cliente_1'];
        $estado = $_POST['estado_usuario'];
        $email = $_POST['email_cliente_1'];
        $cel = $_POST['cel_cliente_1'];


        $query = "UPDATE cliente SET nombre_cliente = '$nombre', apellido_cliente = '$apellido', fecha_nacimiento_cliente = '$fecha', email_cliente = '$email', celular_cliente = '$cel' WHERE id_usuario = $id";
        $result = mysqli_query($conn,$query);

        if(!$result) {
            die('Query Failed 2 '. mysqli_error($conn));
        }else{
            // echo "ok";
        }

        $query2 = "UPDATE usuario SET estado_usuario = '$estado' WHERE id_usuario = $id";
        $result2 = mysqli_query($conn,$query2);

        if(!$result2) {
            die('Query Failed 2 '. mysqli_error($conn));
        }else{
            echo "ok";
        }
        
    }

?>