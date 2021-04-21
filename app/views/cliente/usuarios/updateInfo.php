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
  <link rel="stylesheet" href="../../dist/css/drag_and_drop.css">
  <link rel="stylesheet" href="../../dist/css/checkbox_comp.css" />
  <!-- FontAwesome -->
  <link rel="stylesheet" href="../../../../lib/fontawesome-5.15.2/css/all.min.css">
  <script src="../../../../lib/fontawesome-5.15.2/js/all.min.js"></script>
  <!-- Sweer Alert -->
  <script src="../../../../lib/sweetaler2/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="../../../../lib/sweetaler2/sweetalert2.min.css">
  <title>Actualización de información</title>
</head>
<?php
session_start();

error_reporting(0);

$sesion = $_SESSION['datos'];

if ($sesion == null || $sesion = '' || $_SESSION['datos'][2] != 'Cliente') {
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
      <button class="switch" id="switch">
          <span><i class="fas fa-sun"></i></span>
          <span><i class="fas fa-moon"></i></span>
        </button>
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
        <h2 class="title_table">Actualización de información</h2>
      </div>
      <div class="updateinfo_container">
        <div class="form_info">
          <h4 class="fom_update__h4">Datos básicos</h4>
          <form method="POST" id="form_update_info">
            <label for="">Nombres</label> <br>
            <input type="text" name="nombre" id="nombre"> <br>
            <label for="">Apellidos</label> <br>
            <input type="text" name="apellido" id="apellido"> <br>
            <label for="">Fecha de nacimiento</label> <br>
            <input type="date" name="fecha" id="fecha"> <br>
            <label for="">Correo electronico</label> <br>
            <input type="email" name="email" id="email"> <br>
            <label for="">Celular</label> <br>
            <input type="tel" name="cel" id="cel"> <br>
            <input type="button" value="Actualizar" onclick="editarInfo()">
          </form>
          <div>
            <button class="change_pass" onclick="changePassword()">Cambiar contraseña</button>
          </div>
        </div>
        <div class="updatedata_container">
          <div class="drag-area">
            <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
            <div class="img"></div>
            <header>Arrastra y suelta tu imagen</header>
            <span>OR</span>
            <button>Examinar</button>
            <input type="file" name="photo_user" id="photo_user" hidden />
          </div>
          <div>
            <input id="enviar" type="button" value="Subir" />
            <input id="limpiar" type="reset" value="Cancelar" />
          </div>
        </div>
      </div>



      <div id="pop-up-edit" class="pop-up form-modal">
        <form id="pop_up_wrap_edit" class="pop-up-wrap" method="POST">
          <a href="#" id="closePopup-edit" class="closePopup"><i class="fas fa-times-circle"></i></a>
          <h4 class="form-title">Actualizar contraseña</h4>
          <label for="">Contraseña Actual</label> <br />
          <input type="password" id="pass_old" name="pass_old"> <br>
          <label for="">Contraseña Nueva</label> <br />
          <input type="password" id="pass_new" name="pass_new"> <br>
          <label for="">Repetir Contraseña Nueva</label> <br />
          <input type="password" id="pass_new2" name="pass_new2"> <br>
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
      <div class="sidebar__menu sidebar__link sidebar__username">
        <a>¡Bienvenid<i class="fas fa-at"></i> <?php echo $_SESSION['datos'][3] . " " . $_SESSION['datos'][4]; ?>!</a>
        <hr>
      </div>
      <div class="sidebar__menu">
        <div class="sidebar__link">
          <i class="fa fa-home"></i>
          <a href="../dashboard.php">Inicio</a>
        </div>
        <div class="sidebar__link active_menu_link">
          <i class="fa fa-id-card" aria-hidden="true"></i>
          <a href="./updateInfo.php">Actualizar información</a>
        </div>
        <div class="sidebar__link">
          <i class="fas fa-book"></i>
          <a href="../reservas/reserva.php">Reservaciones</a>
        </div>
        <div class="sidebar__link">
          <i class="fa fa-question-circle"></i>
          <a href="../informacion/soporte.php">Soporte</a>
        </div>


        <div class="sidebar__divider">
          <hr>
        </div>

        <div class="sidebar__link">
          <p class="sidebar__role">Rol cliente</p>
        </div>

      </div>
    </div>
  </div>
  <script src="../../dist/js/app.js"></script>
  <script src="../../dist/js/sidebarDashboard.js"></script>
  <script src="../../dist/js/drag_and_drop.js"></script>
  <script src="../../dist/js/updateinfo_cli.js"></script>
</body>

</html>