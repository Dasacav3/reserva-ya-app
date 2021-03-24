<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../dist/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../dist/css/normalize.css">
    <link rel="stylesheet" href="../dist/css/main.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="../../../lib/fontawesome-5.15.2/css/fontawesome.min.css">
    <script src="../../../lib/fontawesome-5.15.2/js/all.min.js"></script>
    <!-- Sweer Alert -->
    <script src="../../../lib/sweetaler2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../../../lib/sweetaler2/sweetalert2.min.css">
    <title>Registro</title>
</head>
<body class="body-login">
    <div class="register-container">
        <div class="return">
            <a href="./../login.php"><i class="fas fa-arrow-circle-left return-icon"></i></a>
        </div>
        <div class="register-logo">
            <img src="../dist/img/ReservaYa.gif" alt="">
        </div>
        <div class="register-title">
            <h2>Formulario de Registro</h2>
        </div>
        <div class="form-register">
            <form id="form" action="../../models/usuarios/signupUser.php" method="POST">
                <label for="">Nombres</label> <br>
                <input type="text" name="nombre" id="nombre"> <br>
                <label for="">Apellidos</label> <br>
                <input type="text" name="apellido" id="apellido"> <br>
                <label for="">Fecha de nacimiento</label> <br>
                <input type="date" min="1860-01-01" name="nacimiento" id="nacimiento"> <br>
                <label for="">Celular</label> <br>
                <input type="tel" name="cel" id="cel"> <br>
                <label for="">Correo electronico</label> <br>
                <input type="email" name="email" id="email"> <br>
                <label for="">Contraseña</label> <br>
                <input type="password" name="password" id="password"> <br>
                <label for="">Repetir contraseña</label> <br>
                <input type="password" name="password2" id="password2"> <br>
                <input type="checkbox" name="terminos" id="terminos"> Acepto los términos y condiciones <br>
                <input type="submit" value="Enviar">  
                <div class="warnings" id="warnings"></div>           
            </form>
        </div>
    </div>
    <script src="../dist/js/regularExpression.js"></script>
    <script src="../dist/js/formValidation.js"></script>
</body>
</html>