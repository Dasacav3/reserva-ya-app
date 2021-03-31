<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../dist/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../../dist/css/normalize.css">
    <link rel="stylesheet" href="../../dist/css/dashboard.css">
    <link rel="stylesheet" href="../../dist/css/datatable.css" />
    <link rel="stylesheet" href="../../dist/css/modals.css" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="../../../../lib/fontawesome-5.15.2/css/fontawesome.min.css">
    <script src="../../../../lib/fontawesome-5.15.2/js/all.min.js"></script>
    <!-- Sweer Alert -->
    <script src="../../../../lib/sweetaler2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../../../../lib/sweetaler2/sweetalert2.min.css">
    <title>Gestión de Usuarios</title>
  </head>
  <body id="body">
    <div class="container">
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <h4>¡Bienvenido!</h4>
        </div>
        <div class="navbar__right">
          <a href="./informacion/soporte.php">
            <i class="fa fa-question-circle" aria-hidden="true"></i>
          </a>
          <a href="../../../models/logout.php">
            <i class="fa fa-power-off" aria-hidden="true"></i>
          </a>
          <a href="../usuarios/updateInfo.php">
            <img width="30" src="../../dist/img/assets/avatar.svg" alt="" />
          </a>
        </div>
      </nav>

      <main class="main__container">
        <div>
            <h2 class="title_table">Modulo de Gestión de Usuarios</h2>
        </div>
        <div class="datatable-container">
					<div class="header-tools">
						<div class="tools">
							<ul>
								<li>
									<span><input type="checkbox" name="" id="" /></span>
								</li>
								<li>
									<button id="abrirPopup-add" class="add"><i class="fas fa-plus-circle"></i></button>
								</li>
								<li>
									<button id="abrirPopup-edit" class="edit"><i class="fas fa-edit"></i></button>
								</li>
								<li>
									<button class="delete"><i class="fas fa-trash"></i></button>
								</li>
							</ul>
						</div>
						<div class="search">
							<input type="text" class="search-input" id="search-input" />
						</div>
					</div>
					<table class="datatable">
						<thead>
							<tr>
								<th></th>
								<th>ID USUARIO</th>
								<th>NOMBRE DE USUARIO</th>
								<th>TIPO USUARIO</th>
								<th>ESTADO USUARIO</th>
							</tr>
						</thead>
						<tbody id="usuarios">
							
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
      </main>

      <div id="sidebar">
        <div class="sidebar__title">
          <div class="sidebar__img">
            <img src="../../dist/img/logo-reservaya.png" alt="logo" />
          </div>
          <i
            onclick="closeSidebar()"
            class="fa fa-times"
            id="sidebarIcon"
            aria-hidden="true"
          ></i>
        </div>

        <div class="sidebar__menu">
          <div class="sidebar__link">
            <i class="fa fa-home"></i>
            <a href="../dashboard.php">Inicio</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-id-card" aria-hidden="true"></i>
            <a href="./updateInfo.php">Actualizar información</a>
          </div>
          <div class="sidebar__link">
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
          <div class="sidebar__link active_menu_link">
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
            <hr>
          </div>      

          <div class="sidebar__link">
            <p class="sidebar__role">Rol administrador</p>
          </div>

        </div>
      </div>
    </div>
    <script src="../../dist/js/sidebarDashboard.js"></script>
    <script src="../../dist/js/usuarios.js"></script>
  </body>
</html>
