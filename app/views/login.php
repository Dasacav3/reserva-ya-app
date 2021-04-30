<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<link rel="shortcut icon" href="<?= constant('URL') ?>app/views/dist/img/favicon.png" type="image/x-icon" />
	<link rel="stylesheet" href="<?= constant('URL') ?>app/views/dist/css/normalize.css" />
	<link rel="stylesheet" href="<?= constant('URL') ?>app/views/dist/css/main.css" />
	<link rel="stylesheet" href="<?= constant('URL') ?>lib/fontawesome-5.15.2/css/all.min.css" />
	<script src="<?= constant('URL') ?>lib/fontawesome-5.15.2/js/all.min.js"></script>
	<script src="<?= constant('URL') ?>lib/sweetaler2/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="<?= constant('URL') ?>lib/sweetaler2/sweetalert2.min.css">
	<title>Inicio de Sesión</title>
</head>

<body class="body-login">
	<div class="login-container">
		<div class="return">
			<a href="<?= constant('URL') ?>"><i class="fas fa-arrow-circle-left return-icon"></i></a>
		</div>
		<div class="login">
			<div class="login-img">
				<img src="<?= constant('URL') ?>app/views/dist/img/favicon.png" alt="" class="login-img__img" />
			</div>
			<form class="form-login" id="form" method="POST">
				<label for="user_name">Nombre de usuario</label> <br />
				<input type="email" id="user_name" name="user_name" required placeholder="example@domain.com" />
				<label for="password">Contraseña</label> <br />
				<input type="password" id="password" name="password" required maxlength="30" />
				<input type="button" value="Iniciar sesión" id="submit" onclick="loginUser()" />
			</form>
		</div>
		<div class="register">
			<p>
				<a href="<?= constant('URL') ?>registro">¿No tienes cuenta? Crea tu cuenta</a>
			</p>
		</div>
	</div>
	<script src="<?= constant('URL') ?>app/views/dist/js/app.js"></script>
</body>

</html>