<!DOCTYPE html>
<html lang="es">

<head>
	<?php require "head.php"; ?>
	<title>Dashboard Reserva Ya</title>
	<link rel="stylesheet" type="text/css" href="<?= constant('URL') ?>lib/fullcalendar/main.css">
</head>

<body id="body">
	<?php require "contenido.php"; ?>
	<div class="main__title">
		<div class="main__greeting">
			<img src="<?= constant('URL') ?>public/img/assets/hello.svg" alt="" />
			<h1>¡Bienvenido!</h1>
			<p>Este es tu dashboard Reserva Ya</p>
		</div>
		<div class="boxes-container">
			<div class="small-box">
				<div class="text-box">
					<h3><?= $this->getCantReservasCli() ?></h3>
					<p>Reservaciones</p>
				</div>
				<div class="icon-box">
					<i class="fas fa-book"></i>
				</div>
				<a href="#" class="small-box-link">Más información <i class="fas fa-arrow-circle-right"></i></a>
			</div>
			<div class="small-box">
				<div class="text-box">
					<h3><?= $this->getCantProductos() ?></h3>
					<p>Productos</p>
				</div>
				<div class="icon-box">
					<i class="fas fa-hamburger"></i>
				</div>
				<a href="#" class="small-box-link">Más información <i class="fas fa-arrow-circle-right"></i></a>
			</div>
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
	<script src="<?= constant('URL') ?>public/js/sidebarDashboard.js" type="module"></script>
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