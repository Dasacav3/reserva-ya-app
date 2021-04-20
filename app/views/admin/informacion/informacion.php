<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../dist/img/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="../../dist/css/normalize.css">
  <link rel="stylesheet" href="../../dist/css/dashboard.css">
  <link rel="stylesheet" href="../../dist/css/modals.css">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="../../../../lib/fontawesome-5.15.2/css/all.min.css">
  <script src="../../../../lib/fontawesome-5.15.2/js/all.min.js"></script>
  <!-- Sweer Alert -->
  <script src="../../../../lib/sweetaler2/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="../../../../lib/sweetaler2/sweetalert2.min.css">
  <title>Información</title>
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
        <h2 class="title_table">Información</h2>
        <div class="reportes_container">

          <div class="reporte_card">
            <div class="icon_reporte"><i class="fas fa-scroll"></i></div>
            <h4>Insumos</h4>
            <button class="btn_generar" onclick="showPopup_add_insumo()">Generar reporte</button>
          </div>
          <div class="reporte_card">
            <div class="icon_reporte"><i class="fas fa-book"></i></div>
            <h4>Reservaciones</h4>
            <button class="btn_generar" onclick="showPopup_add_reserva()">Generar reporte</button>
          </div>
          <div class="reporte_card">
            <div class="icon_reporte"><i class="fas fa-user-alt"></i></div>
            <h4>Clientes</h4>
            <button class="btn_generar" onclick="showPopup_add_usuario()">Generar reporte</button>
          </div>

          <div id="reporte_insumo_container" class="pop-up form-modal">
            <form id="reporte_insumo" class="pop-up-wrap" method="POST">
              <a href="#" class="closePopup closePopup-add"><i class="fas fa-times-circle"></i></a>
              <h4 class="form-title">Rango de reporte insumos</h4>
              <div class="form-fields">
                <input type="hidden" value="insumos" name="insumos">
                <div>
                  <label for="">Fecha inicio</label> <br />
                  <input type="date" name="fecha_inicio" id="fecha_inicio_insumo"> <br>
                </div>
                <div>
                  <label for="">Fecha final</label> <br />
                  <input type="date" name="fecha_final" id="fecha_final_insumo">
                </div>
              </div>
              <input type="button" value="Generar" onclick="generarReporteInsumo()" />
            </form>
          </div>



          <div id="reporte_reserva_container" class="pop-up form-modal">
            <form id="reporte_reserva" class="pop-up-wrap" method="POST">
              <a href="#" class="closePopup closePopup-add"><i class="fas fa-times-circle"></i></a>
              <h4 class="form-title">Rango de reporte reservas</h4>
              <div class="form-fields">
                <input type="hidden" value="reservas" name="reservas">
                <div>
                  <label for="">Fecha inicio</label> <br />
                  <input type="date" name="fecha_inicio" id="fecha_inicio_reserva"> <br>
                </div>
                <div>
                  <label for="">Fecha final</label> <br />
                  <input type="date" name="fecha_final" id="fecha_final_reserva">
                </div>
              </div>
              <input type="button" value="Generar" onclick="generarReporteReserva()" />
            </form>
          </div>


          <div id="reporte_usuario_container" class="pop-up form-modal">
            <form id="reporte_usuario" class="pop-up-wrap" method="POST">
              <a href="#" class="closePopup closePopup-add"><i class="fas fa-times-circle"></i></a>
              <h4 class="form-title">Seleccione el cliente</h4>
              <div class="form-fields">
                <div>
                  <select name="cliente" id="cliente">
                    <option value=""></option>
                  </select> <br>
                </div>
              </div>
              <input type="button" value="Generar" onclick="generarReporteUsuario()" />
            </form>
          </div>



        </div>
      </div>
    </main>

    <div id="sidebar">
      <div class="sidebar__title">
        <div class="sidebar__img">
          <img src="../../dist/img/logo-reservaya.png" alt="logo" />
        </div>
        <i onclick="closeSidebar()" class="fa fa-times" id="sidebarIcon" aria-hidden="true"></i>
      </div>
      <div class="sidebar__menu sidebar__link sidebar__username">
        <a>¡Bienvenid<i class="fas fa-at"></i> <?php echo $_SESSION['datos'][3] . " " . $_SESSION['datos'][4]; ?>!</a>
        <hr>
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
        <div class="sidebar__link">
          <i class="fa fa-user"></i>
          <a href="../usuarios/usuarios.php">Usuarios</a>
        </div>
        <div class="sidebar__link active_menu_link">
          <i class="fa fa-address-book"></i>
          <a href="./informacion.php">información</a>
        </div>
        <div class="sidebar__link">
          <i class="fa fa-question-circle"></i>
          <a href="./soporte.php">Soporte</a>
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
  <script src="../../dist/js/informacion.js"></script>
</body>

</html>