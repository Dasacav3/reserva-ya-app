<!DOCTYPE html>
<html lang="es">

<head>
	<?php require "head.php"; ?>
	<title>Gestión de Reservaciones</title>
</head>
<?php

// Estableciendo fechas para validacion de formulario
$fecha_actual = date("Y-m-d");

$fecha_actual = date("Y-m-d");

$mod_date = strtotime($fecha_actual . "+ 30 days");

?>

<body id="body">
	<?php require "contenido.php"; ?>
	<main class="main__container">
		<div>
			<h2 class="title_table">Modulo de Gestión de Reservaciones</h2>
		</div>
		<form id="reserva-add" method="POST">
			<div class="reserva-add">
				<div class="reserva-add-card">
					<p class="reserva-add-card-title">Elige</p>
					<hr>
					</hr>
					<p>Numero de personas</p>
					<div>
						<input type="number" min="1" name="asientos" id="add_asientos" /> <br />
					</div>
					<p>Si necesitas un evento</p>
					<span>Comunícate con nosotros</span>
				</div>
				<div class="reserva-add-card">
					<p class="reserva-add-card-title">Mesa</p>
					<hr>
					</hr>
					<p>Elige una mesa disponible</p>
					<div>
						<select name="mesa" id="mesa">
						</select> <br>
					</div>
				</div>
				<div class="reserva-add-card">
					<p class="reserva-add-card-title">Fecha</p>
					<hr>
					</hr>
					<p>Selecciona las fechas disponibles</p>
					<div>
						<input type="date" min="<?php echo $fecha_actual ?>" max="<?php echo date("Y-m-d", $mod_date); ?>" name="fecha_reserva" id="add_fecha_reserva" /> <br />
					</div>
				</div>
				<div class="reserva-add-card">
					<p class="reserva-add-card-title">Hora</p>
					<hr>
					</hr>
					<p>Selecciona una hora disponible</p>
					<div>
						<input type="time" min="12:00" max="22:00" name="hora_reserva" id="add_hora_reserva" /> <br />
					</div>
				</div>
			</div>
			<div class="btn-register-reserva-container">
				<input type="button" value="Registrar" id="registrar" />
			</div>
		</form>
		<div>
			<hr class="reserva-divider">
		</div>
		<div>
			<h2 class="title_table">Mis Reservaciones</h2>
			<div class="reserva-container" id="reserva-container">

			</div>
			<div class="btn-historial">
				<button id="btn-historial" class="cancelar">Historial</button>
			</div>
		</div>
		<!-- <div class="datatable-container">
			
		</div> -->

		<!-- Modal historial -->
		<div id="pop-up-edit" class="pop-up form-modal">
			<div id="datatable-container" class="pop-up-wrap datatable-container">
				<a href="#" id="btn-close-historial" class="closePopup"><i class="fas fa-times-circle"></i></a>
				<h3>Historial de reservas</h3>
				<table class="datatable">
					<thead>
						<tr>
							<th>ESTADO</th>
							<th>ID RESERVA</th>
							<th>FECHA</th>
							<th>HORA</th>
							<th>MESA</th>
							<th>ASIENTOS</th>
						</tr>
					</thead>
					<tbody id="table_elements">

					</tbody>
				</table>
			</div>
		</div>

	</main>
	<?php require "footer.php"; ?>
	<script src="<?= constant('URL') ?>public/js/app.js" type="module"></script>
	<script src="<?= constant('URL') ?>public/js/sidebarDashboard.js"></script>
	<script src="<?= constant('URL') ?>public/js/reservas_cli.js" type="module"></script>
</body>

</html>