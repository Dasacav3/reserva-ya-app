<!DOCTYPE html>
<html lang="es">

<head>
	<?php require "head.php"; ?>
	<title>Dashboard Reserva Ya</title>
</head>

<body id="body">
	<?php require "contenido.php"; ?>
	<main>
		<div class="main__container">
			<!-- MAIN TITLE STARTS HERE -->

			<div class="main__title">
				<img src="<?= constant('URL') ?>public/img/assets/hello.svg" alt="" />
				<div class="main__greeting">
					<h1>¡Bienvenido!</h1>
					<p>Este es tu dashboard Reserva Ya</p>
				</div>
			</div>
		</div>
	</main>
	<?php require "footer.php"; ?>
	<script src="<?= constant('URL') ?>public/js/app.js" type="module"></script>
	<script src="<?= constant('URL') ?>public/js/sidebarDashboard.js"></script>
</body>

</html>