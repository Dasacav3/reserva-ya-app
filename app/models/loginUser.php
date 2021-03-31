<html>

<head>
    <!-- Sweer Alert -->
    <script src="../../lib/sweetaler2/sweetalert2.all.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../../lib/sweetaler2/sweetalert2.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #7fd1b9ff;
        }
    </style>
</head>

<body>
    <?php

    session_start();

    include("../controller/database.php");

    $nombre = $_POST['user_name'];
    $password = $_POST['password'];

    $consulta = mysqli_query($conn, "SELECT id_usuario,tipo_usuario FROM usuario WHERE nombre_usuario = '$nombre'");

    $data = mysqli_fetch_array($consulta);


    $_SESSION['datos'] = $data;

    echo $data[1];

    $registros = mysqli_query($conn, "SELECT * FROM usuario WHERE nombre_usuario = '$nombre' AND clave_usuario = '$password'");
    if ($reg = mysqli_fetch_array($registros)) {
            if($data[1] == 'Administrador'){
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
            }else if($data[1] == "Empleado"){
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
            }else{
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
            }
    } else {
        echo "<script>
        Swal.fire({
            title: 'Vuelve a intertarlo',
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
    }
    ?>
</body>

</html>