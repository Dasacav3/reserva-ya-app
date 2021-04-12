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

    try {
        $query = $pdo->prepare("SELECT id_usuario,clave_usuario FROM usuario WHERE id_usuario = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $data = $query->fetch(PDO::FETCH_NUM);
    } catch (Exception $e) {
        echo "Conexion fallida " . $e->getMessage();
    }

    if(password_verify($pass_old,$data[1]) && $pass_new == $pass_new2){
        try {
            $queryupdate = $pdo->prepare("UPDATE usuario SET clave_usuario = '$pass_hash' WHERE id_usuario= :id");
            $query->bindParam(":id", $id);
            $query->execute();
        }catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }
        echo "ok";

    }else{
        echo "Las verificación de contraseña fallo";
    }

    $pdo=null;

?>