<?php

    $data = file_get_contents("php://input");
    require "../../../controller/database.php";

    session_start();

    $sesion = $_SESSION['datos'];

    if($sesion == null || $sesion = ''){
        echo 'Usted no tiene autorización';
        header("location: http://localhost/reservaya-mvc/login");
        die();
    }

    $id_user = $_SESSION['datos'][0];

    // Usar una variable para tratar de simplificar
    $file = $_FILES['photo_user'];
    // Si la propiedad "error" es cero, el archivo se subió correctamente
    if($file['error'] == 0) {
        // "name" contiene el nombre real del archivo
        $foto = $file['name'];
        // Mover el archivo a su ubicación final
        // Revisa que exista la carpeta y tiene permisos de escritura
        if(move_uploaded_file($file['tmp_name'], $url = "../../../../public/profile_photo/$foto")) {
            // Ahora sí puedes insertar en base de datos
            $url = "http://localhost/reservaya-mvc/public/profile_photo/$foto";
        } else {
            echo 'El archivo se subió, pero no se pudo mover a ubicación final';
        }
    } else {
        echo 'No se pudo subir el archivo';
    }

    try{
        $query = $pdo->prepare("UPDATE usuario SET foto_perfil = :link WHERE id_usuario = :id");
        $query->bindParam(":link",$url);
        $query->bindParam(":id",$id_user);
        $query->execute();
    }catch(Exception $e){
        echo "Conexión fallida " . $e->getMessage();
        die();
    }

    echo "ok";
    $pdo=null;
