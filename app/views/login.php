<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="shortcut icon" href="./dist/img/favicon.png" type="image/x-icon" />
		<link rel="stylesheet" href="./dist/css/normalize.css" />
		<link rel="stylesheet" href="./dist/css/main.css" />
		<link rel="stylesheet" href="../../lib/fontawesome-5.15.2/css/all.css" />
		<script src="../../lib/fontawesome-5.15.2/js/all.js"></script>
		<script src="../../lib/sweetaler2/sweetalert2.all.min.js"></script>
		<link rel="stylesheet" href="../../lib/sweetaler2/sweetalert2.min.css">
		<title>Inicio de Sesión</title>
	</head>
	<body class="body-login">
		<div class="login-container">
			<div class="return">
				<a href="../../index.html"><i class="fas fa-arrow-circle-left return-icon"></i></a>
			</div>
			<div class="login">
				<div class="login-img">
					<img src="./dist/img/favicon.png" alt="" class="login-img__img" />
				</div>
				<form class="form-login" id="form" method="POST" action="../models/loginUser.php">
					<label for="user_name">Nombre de usuario</label> <br />
					<input type="email"	id="user_name" name="user_name"	required placeholder="example@domain.com"/>
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
					<label for="password">Contraseña</label> <br />
					<input type="password" id="password" name="password" required maxlength="30" />
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
					<input type="checkbox" name="" id="remember" /> Recordar <br />
					<input type="submit" value="Iniciar sesión" id="submit"/>
				</form>
			</div>
			<div class="btn-other-sesion">
				<button class="btn">
					<a href=""><i class="fab fa-google"></i> Continuar con Google</a>
				</button>
			</div>
			<div class="register">
				<p>
					<a href="./registro.php">¿No tienes cuenta? Crea tu cuenta</a>
				</p>
			</div>
		</div>
	</body>
</html>
