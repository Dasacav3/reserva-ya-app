<!DOCTYPE html>
<html lang="es">

<head>
  <?php require "head.php"; ?>
  <title>Soporte Reserva Ya</title>
</head>

<body id="body">
  <?php require "contenido.php"; ?>
  <main class="main__container">
    <div class="main__title">
      <div>
        <div>
          <h2 class="title_table">Area de soporte</h2>
        </div>
        <div>
          <h3>01 Actualizar información</h3>
          <video preload="none" src="http://localhost/reservaya-mvc/public/video_soporte/empleado/ActualizarInfoEmpleado.mp4" width="400" controls></video>
        </div>
        <div>
          <h3>02 Reservaciones</h3>
          <video preload="none" src="http://localhost/reservaya-mvc/public/video_soporte/empleado/ReservaEmpleado.mp4" width="400" controls></video>
        </div>
        <div>
          <h3>03 Productos</h3>
          <video preload="none" src="http://localhost/reservaya-mvc/public/video_soporte/empleado/ProductoEmpleado.mp4" width="400" controls></video>
        </div>
        <div style="display:flex; justify-content: center; margin-top: 2em;">
          <a href="<?= constant('URL') ?>docs/Manual%20de%20usuario.pdf" style="padding: 1em 2em; border-radius: 10px; border: none; background: #ccc; color: black;"><i class="fas fa-download"></i> Manual usuario</a>
        </div>
      </div>
    </div>
  </main>

  <?php require "footer.php"; ?>
  <script src="<?= constant('URL') ?>public/js/app.js" type="module"></script>
  <script src="<?= constant('URL') ?>public/js/sidebarDashboard.js" type="module"></script>
</body>

</html>