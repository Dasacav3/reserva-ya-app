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
	<main>
		<div class="main__container">
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
				</div>
				<table class="datatable" id="datatable">
					<thead>
						<th>ESTADO</th>
						<th>ID RESERVA</th>
						<th>NOMBRES</th>
						<th>APELLIDOS</th>
						<th>FECHA</th>
						<th>HORA</th>
						<th>MESA</th>
						<th>ASIENTOS</th>
						<th>ACCIONES</th>
					</thead>
					<tbody id="table_elements">

					</tbody>
					<tfoot>
						<th>ESTADO</th>
						<th>ID RESERVA</th>
						<th>NOMBRES</th>
						<th>APELLIDOS</th>
						<th>FECHA</th>
						<th>HORA</th>
						<th>MESA</th>
						<th>ASIENTOS</th>
						<th>ACCIONES</th>
					</tfoot>
				</table>
			</div>


			<!-- Modal Añadir reservas -->
			<div id="pop-up-add" class="pop-up form-modal">
				<form id="pop_up_wrap_add" class="pop-up-wrap" method="POST">
					<a href="#" id="closePopup-add" class="closePopup"><i class="fas fa-times-circle"></i></a>
					<h4 class="form-title">Añadir reserva</h4>
					<div class="form-fields">
						<div>
							<label for="">Cliente</label> <br />
							<select name="cliente" id="cliente">
							</select> <br>
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



			<!-- Modal Editar reservas -->
			<div id="pop-up-edit" class="pop-up form-modal">
				<form id="pop_up_wrap_edit" class="pop-up-wrap" method="POST">
					<a href="#" id="closePopup-edit" class="closePopup"><i class="fas fa-times-circle"></i></a>
					<h4 class="form-title">Editar reserva</h4>
					<div class="form-fields">
						<div>
							<label for="">ID Reserva</label> <br />
							<input type="text" id="id_reserva" name="id_reserva" readonly> <br>
							<label for="">Cliente</label> <br />
							<input type="text" id="cliente1" name="cliente1" readonly> <br>
							<label for="">Estado</label> <br />
							<select name="estado" id="estado">
								<option value=""></option>
								<option value="Activa">Activa</option>
								<option value="Completada">Completada</option>
								<option value="Cancelada">Cancelada</option>
							</select> <br />
							<label for="">Fecha</label> <br />
							<input type="date" min="<?php echo $fecha_actual ?>" max="<?php echo date("Y-m-d", $mod_date); ?>" name="edit_fecha_reserva" id="edit_fecha_reserva" /> <br />
						</div>
						<div>
							<label for="">Hora</label> <br />
							<input type="time" min="12:00" max="22:00" name="edit_hora_reserva" id="edit_hora_reserva" /> <br />
							<label for="">Mesa</label> <br />
							<input type="text" id="edit_mesa" name="edit_mesa" readonly> <br />
							<label for="">Asientos</label> <br />
							<input type="number" min="1" name="edit_asientos" id="edit_asientos" /> <br />
						</div>
					</div>
					<input type="button" value="Guardar" id="edit" />
				</form>
			</div>
	</main>
	<?php require "footer.php"; ?>
	<script src="<?= constant('URL') ?>public/js/app.js" type="module"></script>
	<script src="<?= constant('URL') ?>public/js/sidebarDashboard.js"></script>
	<script src="<?= constant('URL') ?>public/js/reservas_admin.js" type="module"></script>
</body>

</html>