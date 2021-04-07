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

    $id = $_SESSION['datos'][0];

    $pass_old = $_POST['pass_old'];
    $pass_new2 = $_POST['pass_new2'];
    $pass_new = $_POST['pass_new'];
    $pass_hash = password_hash($pass_new,PASSWORD_BCRYPT);

    $consulta = mysqli_query($conn, "SELECT id_usuario,clave_usuario FROM usuario WHERE id_usuario = '$id'");
    $data = mysqli_fetch_array($consulta);

    if(password_verify($pass_old,$data[1]) && $pass_new == $pass_new2){
        $query = "UPDATE usuario SET clave_usuario = '$pass_hash' WHERE id_usuario= '$id'";

        $result = $conn->query($query);

        if(!$result){
            die("Query Failed: " . mysqli_error($conn));
        }else{
            echo "ok";
        }
    }else{
        echo "Las verificación de contraseña fallo";
    }

?>