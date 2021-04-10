<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="../../dist/img/favicon.png" type="image/x-icon" />
	<link rel="stylesheet" href="../../dist/css/normalize.css" />
	<link rel="stylesheet" href="../../dist/css/dashboard.css" />
	<link rel="stylesheet" href="../../dist/css/datatable.css" />
	<link rel="stylesheet" href="../../dist/css/modals.css" />
	<!-- FontAwesome -->
	<link rel="stylesheet" href="../../../../lib/fontawesome-5.15.2/css/all.min.css" />
	<script src="../../../../lib/fontawesome-5.15.2/js/all.min.js"></script>
	<!-- Sweer Alert -->
	<script src="../../../../lib/sweetaler2/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="../../../../lib/sweetaler2/sweetalert2.min.css" />
	<title>Gestión de Reservaciones</title>
</head>
<?php
session_start();

$sesion = $_SESSION['datos'];

if ($sesion == null || $sesion = '') {
?>
	<script>
		function Regresar() {
			alert('El acceso esta prohibido');
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
	<div class="container">
		<nav class="navbar">
			<div class="nav_icon" onclick="toggleSidebar()">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</div>
			<div class="navbar__left">
				<h4>¡Bienvenid<i class="fas fa-at"></i> <?php echo $_SESSION['datos'][3] . " " . $_SESSION['datos'][4]; ?>!</h4>
			</div>
			<div class="navbar__right">
				<a href="../informacion/soporte.php">
					<i class="fa fa-question-circle" aria-hidden="true"></i>
				</a>
				<a href="../../../models/logout.php">
					<i class="fa fa-power-off" aria-hidden="true"></i>
				</a>
				<a href="../usuarios/updateInfo.php">
					<img class="foto_perfil" src="<?php echo $img; ?>" />
				</a>
			</div>
		</nav>
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
							<th>NOMBRES</th>
							<th>APELLIDOS</th>
							<th>FECHA</th>
							<th>HORA</th>
							<th>MESA</th>
							<th>ASIENTOS</th>
							<th>ACCIONES</th>
						</tr>
					</thead>
					<tbody id="reservas">

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
							<li><span class="active">1</span></li>
							<li><button>2</button></li>
							<li><button>3</button></li>
							<li><button>4</button></li>
							<li><button>...</button></li>
							<li><button>9</button></li>
							<li><button>10</button></li>
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
							<label for="">Cliente</label> <br />
							<select name="cliente" id="cliente">
							</select> <br>
							<label for="">Fecha</label> <br />
							<input type="date" min="<?php echo date("Y-m-d"); ?>" name="fecha_reserva" id="add_fecha_reserva" /> <br />
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
							</select>  <br />
							<label for="">Fecha</label> <br />
							<input type="date" min="<?php echo date("Y-m-d"); ?>" name="edit_fecha_reserva" id="edit_fecha_reserva" /> <br />
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

		<div id="sidebar">
			<div class="sidebar__title">
				<div class="sidebar__img">
					<img src="../../dist/img/logo-reservaya.png" alt="logo" />
				</div>
				<i onclick="closeSidebar()" class="fa fa-times" id="sidebarIcon" aria-hidden="true"></i>
			</div>

			<div class="sidebar__menu">
				<div class="sidebar__link">
					<i class="fa fa-home"></i>
					<a href="../dashboard.php">Inicio</a>
				</div>
				<div class="sidebar__link">
					<i class="fa fa-id-card" aria-hidden="true"></i>
					<a href="../usuarios/updateInfo.php">Actualizar información</a>
				</div>
				<div class="sidebar__link active_menu_link">
					<i class="fas fa-book"></i>
					<a href="../reservas/reserva.php">Reservaciones</a>
				</div>
				<div class="sidebar__link">
					<i class="fa fa-archive"></i>
					<a href="../mesas/mesas.php">Mesas</a>
				</div>
				<div class="sidebar__link">
					<i class="fa fa-utensils"></i>
					<a href="../productos/productos.php">Productos</a>
				</div>
				<div class="sidebar__link">
					<i class="fa fa-check-circle"></i>
					<a href="../insumos/insumos.php">Insumos</a>
				</div>
				<div class="sidebar__link">
					<i class="fa fa-truck"></i>
					<a href="../proveedores/proveedores.php">Proveedores</a>
				</div>
				<div class="sidebar__link">
					<i class="fa fa-user"></i>
					<a href="../usuarios/usuarios.php">Usuarios</a>
				</div>
				<div class="sidebar__link">
					<i class="fa fa-address-book"></i>
					<a href="../informacion/informacion.php">información</a>
				</div>
				<div class="sidebar__link">
					<i class="fa fa-question-circle"></i>
					<a href="../informacion/soporte.php">Soporte</a>
				</div>

				<div class="sidebar__divider">
					<hr />
				</div>

				<div class="sidebar__link">
					<p class="sidebar__role">Rol administrador</p>
				</div>
			</div>
		</div>
	</div>
	<script src="../../dist/js/sidebarDashboard.js"></script>
	<script src="../../dist/js/reservas_admin.js"></script>
</body>

</html>