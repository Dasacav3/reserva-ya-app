<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validando...</title>
    <!-- Sweer Alert -->
    <script src="../../lib/sweetaler2/sweetalert2.all.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../../lib/sweetaler2/sweetalert2.min.css">
    <link rel="shortcut icon" href="../views/dist/img/favicon.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #4E937A;
        }
    </style>
</head>

<body>
    <?php

    session_start();

    include("../controller/database.php");

    $nombre = $_POST['user_name'];
    $password = $_POST['password'];


    try {
        $query = $pdo->prepare("SELECT id_usuario,tipo_usuario,clave_usuario,estado_usuario,nombre_usuario FROM usuario WHERE nombre_usuario = :nombre");
        $query->bindParam(":nombre", $nombre);
        $query->execute();
        $data = $query->fetch(PDO::FETCH_NUM);
    } catch (Exception $e) {
        echo "Conexion fallida " . $e->getMessage();
    }

    if ($data) {
        if ($data[1] == 'Administrador' and password_verify($password, $data[2]) and $data[3] == 'Activo') {
            try {
                $query = $pdo->prepare("SELECT usuario.id_usuario, usuario.nombre_usuario, usuario.tipo_usuario, administrador.nombre_admin, administrador.apellido_admin, administrador.id_admin, usuario.foto_perfil FROM administrador INNER JOIN usuario ON administrador.id_usuario = usuario.id_usuario WHERE nombre_usuario = :nombre");
                $query->bindParam(":nombre", $nombre);
                $query->execute();
                $user_data = $query->fetch(PDO::FETCH_NUM);
            } catch (Exception $e) {
                echo "Conexion fallida " . $e->getMessage();
            }
            $_SESSION['datos'] = $user_data;
            echo "<script>
                Swal.fire({
                    title: 'Ingreso exitoso',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                }).then(
                    function() {
                        window.location = 'http://localhost/reservaya-mvc/app/views/admin/dashboard.php';
                    }         
                );
                </script>";
        } else if ($data[1] == "Empleado" and password_verify($password, $data[2]) and $data[3] == 'Activo') {
            try {
                $query = $pdo->prepare("SELECT usuario.id_usuario, usuario.nombre_usuario, usuario.tipo_usuario, empleado.nombre_empleado, empleado.apellido_empleado, empleado.id_empleado, usuario.foto_perfil FROM empleado INNER JOIN usuario ON empleado.id_usuario = usuario.id_usuario WHERE nombre_usuario = :nombre");
                $query->bindParam(":nombre", $nombre);
                $query->execute();
                $user_data = $query->fetch(PDO::FETCH_NUM);
            } catch (Exception $e) {
                echo "Conexion fallida " . $e->getMessage();
            }
            $_SESSION['datos'] = $user_data;
            echo "<script>
                Swal.fire({
                    title: 'Ingreso exitoso',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                }).then(
                    function() {
                        window.location = 'http://localhost/reservaya-mvc/app/views/empleado/dashboard.php';
                    }         
                );
                </script>";
        } else if ($data[1] == "Cliente" and password_verify($password, $data[2]) and $data[3] == 'Activo') {
            try {
                $query = $pdo->prepare("SELECT usuario.id_usuario, usuario.nombre_usuario, usuario.tipo_usuario, cliente.nombre_cliente, cliente.apellido_cliente, cliente.id_cliente, usuario.foto_perfil FROM cliente INNER JOIN usuario ON cliente.id_usuario = usuario.id_usuario WHERE nombre_usuario = :nombre");
                $query->bindParam(":nombre", $nombre);
                $query->execute();
                $user_data = $query->fetch(PDO::FETCH_NUM);
            } catch (Exception $e) {
                echo "Conexion fallida " . $e->getMessage();
            }
            $_SESSION['datos'] = $user_data;
            echo "<script>
                Swal.fire({
                    title: 'Ingreso exitoso',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                }).then(
                    function() {
                        window.location = 'http://localhost/reservaya-mvc/app/views/cliente/dashboard.php';
                    }         
                );
                </script>";
        } else if ($data[4] != $nombre || $data[2] != $password) {
            echo "<script>
                        Swal.fire({
                            title: 'Vuelve a intentarlo',
                            text: 'Usuario o contraseña incorrectos',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(
                            function() {
                                window.history.go(-1);
                            }
                        );
                    </script>";
        } else {
            echo "<script>
                        Swal.fire({
                            title: 'Su usuario no esta activo en el sistema',
                            text: 'Comunicate con el administrador, si consideras que es un error',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(
                            function() {
                                window.history.go(-1);
                            }
                        );
                    </script>";
        }
    } else {
        echo "<script>
        Swal.fire({
            title: 'Este usuario no existe',
            text: 'Comunicate con el administrador, para obtener mas información',
            icon: 'error',
            showConfirmButton: false,
            timer: 2000
        }).then(
            function() {
                window.history.go(-1);
            }
        );
        </script>";
    }

    $pdo=null;

    ?>
</body>

</html>