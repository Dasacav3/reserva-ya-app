<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../dist/img/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="../../dist/css/normalize.css">
  <link rel="stylesheet" href="../../dist/css/dashboard.css">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="../../../../lib/fontawesome-5.15.2/css/all.min.css">
  <script src="../../../../lib/fontawesome-5.15.2/js/all.min.js"></script>
  <!-- Sweer Alert -->
  <script src="../../../../lib/sweetaler2/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="../../../../lib/sweetaler2/sweetalert2.min.css">
  <title>Gestión de Productos</title>
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
        <h2 class="title_table">Modulo de Gestión de Productos</h2>

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
        <div class="sidebar__link">
          <i class="fas fa-book"></i>
          <a href="../reservas/reserva.php">Reservaciones</a>
        </div>
        <div class="sidebar__link active_menu_link">
          <i class="fa fa-utensils"></i>
          <a href="../productos/productos.php">Productos</a>
        </div>
        <div class="sidebar__link">
          <i class="fa fa-question-circle"></i>
          <a href="../informacion/soporte.php">Soporte</a>
        </div>


        <div class="sidebar__divider">
          <hr>
        </div>

        <div class="sidebar__link">
          <p class="sidebar__role">Rol empleado</p>
        </div>

      </div>
    </div>
  </div>
  <script src="../../dist/js/sidebarDashboard.js"></script>
</body>

</html>