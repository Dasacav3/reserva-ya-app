<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="../dist/img/favicon.png" type="image/x-icon" />
	<!-- FontAwesome -->
	<link rel="stylesheet" href="../../../lib/fontawesome-5.15.2/css/all.min.css" />
	<script src="../../../lib/fontawesome-5.15.2/js/all.min.js"></script>
	<!-- Styles CSS -->
	<link rel="stylesheet" href="../dist/css/normalize.css" />
	<link rel="stylesheet" href="../dist/css/dashboard.css" />
	<link rel="stylesheet" href="../dist/css/whatsapp_comp.css" />
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
				<a href="./informacion/soporte.php">
					<i class="fa fa-question-circle" aria-hidden="true"></i>
				</a>
				<a href="../../models/logout.php">
					<i class="fa fa-power-off" aria-hidden="true"></i>
				</a>
				<a href="./usuarios/updateInfo.php">
					<img class="foto_perfil" src="<?php echo $result; ?>" />
				</a>
			</div>
		</nav>

		<main>
			<div class="main__container">
				<!-- MAIN TITLE STARTS HERE -->

				<div class="main__title">
					<img src="../dist/img/assets/hello.svg" alt="" />
					<div class="main__greeting">
						<h1>¡Bienvenido!</h1>
						<p>Este es tu dashboard Reserva Ya</p>
					</div>
				</div>
			</div>
		</main>
		<div id="sidebar">
			<div class="sidebar__title">
				<div class="sidebar__img">
					<img src="../dist/img/logo-reservaya.png" alt="logo" />
				</div>
				<i onclick="closeSidebar()" class="fa fa-times" id="sidebarIcon" aria-hidden="true"></i>
			</div>
			<div class="sidebar__menu sidebar__link sidebar__username">
				<a>¡Bienvenid<i class="fas fa-at"></i> <?php echo $_SESSION['datos'][3] . " " . $_SESSION['datos'][4]; ?>!</a>
				<hr>
			</div>
			<div class="sidebar__menu">
				<div class="sidebar__link active_menu_link">
					<i class="fa fa-home"></i>
					<a href="./dashboard.php">Inicio</a>
				</div>
				<div class="sidebar__link">
					<i class="fa fa-id-card" aria-hidden="true"></i>
					<a href="./usuarios/updateInfo.php">Actualizar información</a>
				</div>
				<div class="sidebar__link">
					<i class="fas fa-book"></i>
					<a href="./reservas/reserva.php">Reservaciones</a>
				</div>
				<div class="sidebar__link">
					<i class="fa fa-archive"></i>
					<a href="./mesas/mesas.php">Mesas</a>
				</div>
				<div class="sidebar__link">
					<i class="fa fa-utensils"></i>
					<a href="./productos/productos.php">Productos</a>
				</div>
				<div class="sidebar__link">
					<i class="fa fa-check-circle"></i>
					<a href="./insumos/insumos.php">Insumos</a>
				</div>
				<div class="sidebar__link">
					<i class="fa fa-truck"></i>
					<a href="./proveedores/proveedores.php">Proveedores</a>
				</div>
				<div class="sidebar__link">
					<i class="fa fa-user"></i>
					<a href="./usuarios/usuarios.php">Usuarios</a>
				</div>
				<div class="sidebar__link">
					<i class="fa fa-address-book"></i>
					<a href="./informacion/informacion.php">Información</a>
				</div>
				<div class="sidebar__link">
					<i class="fa fa-question-circle"></i>
					<a href="./informacion/soporte.php">Soporte</a>
				</div>

				<div class="sidebar__divider">
					<hr />
				</div>

				<div class="sidebar__link">
					<p class="sidebar__role">Rol administrador</p>
				</div>
			</div>
		</div>
		<a href="https://api.whatsapp.com/send?phone=+573228306094&text=Hola!%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20las%20reservaciones%20" class="float" target="_blank">
			<i class="fab fa-whatsapp my-float"></i>
		</a>
	</div>
	<script src="../dist/js/sidebarDashboard.js"></script>
</body>

</html>