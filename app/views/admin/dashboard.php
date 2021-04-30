<!DOCTYPE html>
<html lang="es">

<head>
	<?php require "head.php";?>
	<title>Dashboard Reserva Ya</title>
</head>
<?php



session_start();

error_reporting(0);

$sesion = $_SESSION['datos'];

if ($sesion == null || $sesion = '' || $_SESSION['datos'][2] != 'Administrador') {
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
$result = str_replace("../../../../", "../../../", $img);

?>

<body id="body" onmousemove="mouseMovement(event)">
	<?php require "contenido.php";?>
	<script src="<?= constant('URL') ?>app/views/dist/js/app.js"></script>
	<script>
		countdown.start();
		function mouseMovement(event) {
			var x = event.clientX;
			var y = event.clientY;
			// console.log(x);
			countdown.update();
		}
	</script>
	<script src="<?= constant('URL') ?>app/views/dist/js/sidebarDashboard.js"></script>
</body>

</html>