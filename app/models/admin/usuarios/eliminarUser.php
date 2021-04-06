<?php

    $data = file_get_contents("php://input");
    require "../../../controller/database.php";


    session_start();

    $sesion = $_SESSION['datos'];

    if($sesion == null || $sesion = ''){
        echo 'Usted no tiene autorización';
        header("location: ../../views/login.php");
        die();
    }

    $query1 = "SELECT * FROM usuario WHERE id_usuario = $data";
    $result1 = mysqli_query($conn, $query1);

    if(!$result1){
        die('Seleccion fallida: ' . mysqli_error($conn));
    }

    $resultado = $result1->fetch_all(MYSQLI_ASSOC);

    foreach($resultado as $dat){
        $tipo = $dat['TIPO_USUARIO'];
    }

    if($tipo == 'Empleado'){
        $query = "DELETE FROM empleado WHERE id_usuario = $data";
        $result2 = mysqli_query($conn, $query);
        $query2 = "DELETE FROM usuario WHERE id_usuario = $data";
        $result3 = mysqli_query($conn, $query2);
    }else if($tipo == 'Cliente'){
        $query = "DELETE FROM cliente WHERE id_usuario = $data";
        $result2 = mysqli_query($conn, $query);
        $query2 = "DELETE FROM usuario WHERE id_usuario = $data";
        $result3 = mysqli_query($conn, $query2);
    }


    if(!$result3){
        die('Eliminación fallida: 1 ' . mysqli_error($conn));
    }else{
        echo "ok";
    }

?>