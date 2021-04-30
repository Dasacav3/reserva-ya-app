<?php
    session_start();

    $sesion = [$_SESSION['datos']];

    require("../../../controller/database.php");
 
    if(isset($_POST)){

        //Obtiene los datos del formulario
        $doc = $_POST['doc_emp'];
        $nombre = $_POST['name_emp'];
        $apellido = $_POST['last_emp'];
        $email = $_POST['email'];
        $cel = $_POST['cel_emp'];
        $password = $_POST['pass_emp'];
        $tipo = 'Empleado';
        $estado = 1;
        $foto = 'http://localhost/reservaya-mvc/public/profile_photo/user_default_reservaya.png';

        $pass_hash = password_hash($password,PASSWORD_BCRYPT);

        try {
            $queryUser = $pdo->prepare("INSERT INTO usuario (nombre_usuario,clave_usuario,tipo_usuario,estado_usuario,foto_perfil) VALUES (:email, :pass_hash, :tipo, :estado, :foto)");
            $queryUser->bindParam(":email",$email);
            $queryUser->bindParam(":pass_hash",$pass_hash);
            $queryUser->bindParam(":tipo",$tipo);
            $queryUser->bindParam(":estado",$estado);
            $queryUser->bindParam(":foto",$foto);
            $queryUser->execute();
            $id_User = $pdo->lastInsertId();
        }catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        try {
            $queryEmpleado = $pdo->prepare("INSERT INTO empleado (doc_empleado, nombre_empleado, apellido_empleado, email_empleado, celular_empleado, id_usuario) VALUES (:doc,:nombre,:apellido,:email,:cel,:id)");
            $queryEmpleado->bindParam(":doc",$doc);
            $queryEmpleado->bindParam(":nombre",$nombre);
            $queryEmpleado->bindParam(":apellido",$apellido);
            $queryEmpleado->bindParam(":email",$email);
            $queryEmpleado->bindParam(":cel",$cel);
            $queryEmpleado->bindParam(":id",$id_User);
            $queryEmpleado->execute();
        }catch (Exception $e) {
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

        echo "ok";
    }

    $pdo=null;
    
?>