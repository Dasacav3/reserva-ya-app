<!DOCTYPE html>
<html lang="es">

<head>
  <?php require "head.php"; ?>
  <title>Gestión de Reservaciones</title>
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


<body id="body" onmousemove="mouseMovement(event)">
  <?php require "contenido.php"; ?>
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

  <?php require "footer.php"; ?>
  <script src="<?= constant('URL') ?>public/js/app.js"></script>
  <script>
    countdown.start();

    function mouseMovement(event) {
      var x = event.clientX;
      var y = event.clientY;
      // console.log(x);
      countdown.update();
    }
  </script>
  <script src="<?= constant('URL') ?>public/js/sidebarDashboard.js"></script>
  <script src="<?= constant('URL') ?>public/js/drag_and_drop.js"></script>
  <script src="<?= constant('URL') ?>public/js/updateInfo_cli.js"></script>
</body>

</html>