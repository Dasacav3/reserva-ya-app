<html>
    <head>
        <title></title>
        <!-- Sweer Alert -->
        <script src="../../lib/sweetaler2/sweetalert2.all.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="../../lib/sweetaler2/sweetalert2.min.css">
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
            include("../controller/database.php");

            $queryInsertUsuario = "INSERT INTO usuario (nombre_usuario,clave_usuario,tipo_usuario,estado_usuario) VALUES ('$_REQUEST[email]','$_REQUEST[password]','1','1')";

            $result2 = $conn->query($queryInsertUsuario);

            if(!$result2) die ("Falla al acceder a la BD (USUARIO)");


            $consulta_id_usuario = "SELECT id_usuario as id_usuario FROM usuario WHERE nombre_usuario='$_REQUEST[email]'";
            $result3 = mysqli_query($conn,$consulta_id_usuario);
            $row = mysqli_fetch_assoc($result3);

            $id_usuario = $row['id_usuario'];

            $queryInsertCliente = "INSERT INTO cliente (nombre_cliente,apellido_cliente,fecha_nacimiento_cliente,celular_cliente,email_cliente,id_usuario) VALUES ('$_REQUEST[nombre]','$_REQUEST[apellido]','$_REQUEST[nacimiento]','$_REQUEST[cel]','$_REQUEST[email]',$id_usuario)";

            $result = $conn->query($queryInsertCliente);

            if(!$result) die ("Falla al acceder a la BD (CLIENTE)");

            echo "<script>
            Swal.fire({
                title: 'Registro exitoso',
                icon: 'success'
              }).then(
                function(){
                    window.location='http://localhost/reservaya-mvc/app/views/login.php';
                }
              );
            
            </script>";


            $conn->close();

        ?>
    </body>
</html>