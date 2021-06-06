<!DOCTYPE html>
<html lang="es">

<head>
	<?php require "head.php"; ?>
	<title>Dashboard Reserva Ya</title>
</head>
<?php
session_start();

error_reporting(0);

$sesion = $_SESSION['datos'];

if ($sesion == null || $sesion = '' || $_SESSION['datos'][2] != 'Cliente') {
?>
	<script>
		function Regresar() {
			window.history.go(-1);
		}
		Regresar();
	</script>
<?php
	die();
}

$img = $_SESSION['datos'][6];

?>

<body id="body">
	<?php require "contenido.php"; ?>
	<div class="main__title">
		<img src="<?= constant('URL') ?>public/img/assets/hello.svg" alt="" />
		<div class="main__greeting">
			<h1>¡Bienvenido!</h1>
			<p>Este es tu dashboard Reserva Ya</p>
		</div>
	</div>
	<?php require "footer.php"; ?>
	<script src="<?= constant('URL') ?>public/js/app.js" type="module"></script>
	<script src="<?= constant('URL') ?>public/js/sidebarDashboard.js"></script>
</body>

</html>