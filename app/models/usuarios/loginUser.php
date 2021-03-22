<html>
    <head>
        <!-- Sweer Alert -->
        <script src="../../../lib/sweetaler2/sweetalert2.all.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="../../../lib/sweetaler2/sweetalert2.min.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
            *{
                font-family: 'Poppins', sans-serif;
            }
            body{
                background: #7fd1b9ff;
            }
        </style>
    </head>
    <body>
        <?php
            include("../../controller/database.php");

            $nombre = $_POST['user_name'];
            $password = $_POST['password'];

            $registros = mysqli_query ($conn, "SELECT * FROM usuario WHERE nombre_usuario = '$nombre' AND clave_usuario = '$password'");
            if ($reg = mysqli_fetch_array($registros)){
        ?>
            <script>
                Swal.fire({
                    title: 'Ingreso exitoso',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                }).then(
                    function(){
                        window.location='http://localhost:8080/reservaya-mvc/app/views/dashboard.html';
                    }
                );
            </script>
        <?php
            }
            else{
        ?>
                <script>
                    Swal.fire({
                        title: 'Vuelve a intertarlo',
                        text: 'Usuario o contraseña incorrectos',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(
                        function(){
                            window.history.go(-1);
                        }
                    );
                </script>
        <?php
            } 
        ?>
    </body>
</html>