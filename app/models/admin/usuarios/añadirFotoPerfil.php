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
        } else {
            echo 'El archivo se subió, pero no se pudo mover a ubicación final';
        }
    } else {
        echo 'No se pudo subir el archivo';
    }

    $query = "UPDATE usuario SET foto_perfil = '$url' WHERE id_usuario = '$id_user'";

    $result = $conn->query($query);

    if(!$result){
        die("Query Failed: " . mysqli_error($conn));
    }else{
        echo "ok";
    }
