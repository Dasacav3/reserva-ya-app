<!DOCTYPE html>
<html lang="es">

<head>
	<?php require "head.php"; ?>
	<title>Dashboard Reserva Ya</title>
	<link rel="stylesheet" href="<?= constant('URL') ?>lib/fullcalendar/main.css">
</head>
<body id="body">
	<?php require "contenido.php"; ?>
	<div class="main__title">
		<div class="main__greeting">
			<img src="<?= constant('URL') ?>public/img/assets/hello.svg" alt="" />
			<h1>¡Bienvenido!</h1>
			<p> Al sistema de reservaciones Reserva Ya</p>
		</div>
		<section>
			<div class="box">
				<div class="container-calendar">
					<div id="dycalendar"></div>
				</div>
			</div>
		</section>
	</div>
	<?php require "footer.php"; ?>
	<script src="<?= constant('URL') ?>public/js/app.js" type="module"></script>
	<script src="<?= constant('URL') ?>public/js/sidebarDashboard.js"></script>
	<script src="<?= constant('URL') ?>public/js/dycalendar.min.js"></script>
	<script>
		dycalendar.draw({
			target: "#dycalendar",
			type: "month",
			dayformat: "full",
			monthformat: "full",
			highlighttoday: true,
			prevnextbutton: "show",
		});
	</script>
</body>

</html>