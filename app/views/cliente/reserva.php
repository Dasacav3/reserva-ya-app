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
		<div class="datatable-container">
			<div class="header-tools">
				<div class="tools">
					<ul>
						<li>
							<button id="abrirPopup-add" class="add"><i class="fas fa-plus-circle"></i> Añadir</button>
						</li>
					</ul>
				</div>
				<div class="search">
					<input type="text" class="search-input" id="search_input" placeholder="Busqueda" />
				</div>
			</div>
			<table class="datatable">
				<thead>
					<tr>
						<th>ESTADO</th>
						<th>ID RESERVA</th>
						<th>FECHA</th>
						<th>HORA</th>
						<th>MESA</th>
						<th>ASIENTOS</th>
						<th>ACCIONES</th>
					</tr>
				</thead>
				<tbody id="table_elements">

				</tbody>
			</table>
			<div class="footer-tools">
				<div class="list-items">
					Mostrar
					<select name="n-entries" id="n-entries" class="n-entries">
						<option value="5">5</option>
						<option value="10">10</option>
						<option value="15">15</option>
					</select>
					entradas
				</div>
				<div class="pages">
					<ul>
						<div class="pagenumbers" id="pagination"></div>
					</ul>
				</div>
			</div>
		</div>



		<!-- Modal Añadir reservas -->
		<div id="pop-up-add" class="pop-up form-modal">
			<form id="pop_up_wrap_add" class="pop-up-wrap" method="POST">
				<a href="#" id="closePopup-add" class="closePopup"><i class="fas fa-times-circle"></i></a>
				<h4 class="form-title">Añadir reserva</h4>
				<div class="form-fields">
					<div>
						<label for="">Fecha</label> <br />
						<input type="date" min="<?php echo $fecha_actual ?>" max="<?php echo date("Y-m-d", $mod_date); ?>" name="fecha_reserva" id="add_fecha_reserva" /> <br />
						<label for="">Hora</label> <br />
						<input type="time" min="12:00" max="22:00" name="hora_reserva" id="add_hora_reserva" /> <br />
					</div>
					<div>
						<label for="">Mesa</label> <br />
						<select name="mesa" id="mesa">
						</select> <br>
						<label for="">Asientos</label> <br />
						<input type="number" min="1" name="asientos" id="add_asientos" /> <br />
					</div>
				</div>
				<input type="button" value="Registrar" id="registrar" />
			</form>
		</div>

	</main>
	<?php require "footer.php"; ?>
	<script src="<?= constant('URL') ?>public/js/app.js" type="module"></script>
	<script src="<?= constant('URL') ?>public/js/sidebarDashboard.js"></script>
	<script src="<?= constant('URL') ?>public/js/reservas_cli.js" type="module"></script>
</body>

</html>