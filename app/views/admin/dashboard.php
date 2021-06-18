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
			<img src="<?= constant('URL') ?>public/img/assets/hello.svg" type="image/svg+xml" />
			<h1>¡Bienvenido!</h1>
			<p> Al sistema de reservaciones Reserva Ya</p>
		</div>
		<div class="boxes-container">
			<div class="small-box">
				<div class="text-box">
					<h3><?= $this->getCantReservas() ?></h3>
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
			<div class="small-box">
				<div class="text-box">
					<h3><?= $this->getCantInsumos() ?></h3>
					<p>Insumos</p>
				</div>
				<div class="icon-box">
					<i class="fas fa-utensils"></i>
				</div>
				<a href="#" class="small-box-link">Más información <i class="fas fa-arrow-circle-right"></i></a>
			</div>
			<div class="small-box">
				<div class="text-box">
					<h3><?= $this->getCantProveedores() ?></h3>
					<p>Proveedores</p>
				</div>
				<div class="icon-box">
					<i class="fas fa-truck-moving"></i>
				</div>
				<a href="#" class="small-box-link">Más información <i class="fas fa-arrow-circle-right"></i></a>
			</div>
			<div class="small-box">
				<div class="text-box">
					<h3><?= $this->getCantMesas() ?></h3>
					<p>Mesas</p>
				</div>
				<div class="icon-box">
					<i class="fas fa-table"></i>
				</div>
				<a href="#" class="small-box-link">Más información <i class="fas fa-arrow-circle-right"></i></a>
			</div>
			<div class="small-box">
				<div class="text-box">
					<h3><?= $this->getCantEmpleados() ?></h3>
					<p>Empleados</p>
				</div>
				<div class="icon-box">
					<i class="fas fa-user-cog"></i>
				</div>
				<a href="#" class="small-box-link">Más información <i class="fas fa-arrow-circle-right"></i></a>
			</div>
			<div class="small-box">
				<div class="text-box">
					<h3><?= $this->getCantClientes() ?></h3>
					<p>Clientes</p>
				</div>
				<div class="icon-box">
					<i class="fas fa-user-alt"></i>
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