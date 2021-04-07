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

    $img = $_SESSION['datos'][0];

    $foto = addslashes(file_get_contents($_FILES['photo_user']['tmp_name']));

    $query = "UPDATE usuario SET foto_perfil = '$foto' WHERE id_usuario = '$img'";

    $result = $conn->query($query);

    if(!$result){
        die("Query Failed: " . mysqli_error($conn));
    }else{
        echo "ok";
    }

?>