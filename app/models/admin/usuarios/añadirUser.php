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

        $pass_hash = password_hash($password,PASSWORD_BCRYPT);

        $queryInsertUser = "INSERT INTO usuario (nombre_usuario,clave_usuario,tipo_usuario,estado_usuario) VALUES ('$email', '$pass_hash', '$tipo', $estado)";
        $resultado1 = mysqli_query($conn,$queryInsertUser);

        if (!$resultado1 ) {
            die ("Conexión fallida: 1 "  . mysqli_error($conn));  
        }

        $id_usuario = $conn->insert_id;


        $queryInsertEmpleado= "INSERT INTO empleado (doc_empleado, nombre_empleado, apellido_empleado, email_empleado, celular_empleado, id_usuario) VALUES ('$doc','$nombre','$apellido','$email','$cel',$id_usuario)";
        $resultado2 = $conn->query($queryInsertEmpleado);

        if (!$resultado2 ) {
            die ("Conexión fallida: 2 "  . mysqli_error($conn));  
        }

        echo "ok";
        $conn->close();
    }
    
?>