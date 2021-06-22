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
          <video preload="none" src="http://localhost/reservaya-mvc/public/video_soporte/admin/ActualizarInfoAdmin.mp4" width="400" controls></video>
        </div>
        <div>
          <h3>02 Reservaciones</h3>
          <video preload="none" src="http://localhost/reservaya-mvc/public/video_soporte/admin/ReservacionesAdmin.mp4" width="400" controls></video>
        </div>
        <div>
          <h3> Mesas</h3>
          <video preload="none" src="http://localhost/reservaya-mvc/public/video_soporte/admin/MesasAdmin.mp4" width="400" controls></video>
        </div>
        <div>
          <h3>04 Insumos</h3>
          <video preload="none" src="http://localhost/reservaya-mvc/public/video_soporte/admin/InsumosAdmin.mp4" width="400" controls></video>
        </div>
        <div>
          <h3>05 Productos</h3>
          <video preload="none" src="http://localhost/reservaya-mvc/public/video_soporte/admin/ProductosAdmin.mp4" width="400" controls></video>
        </div>
        <div>
          <h3>06 Proveedores</h3>
          <video preload="none" src="http://localhost/reservaya-mvc/public/video_soporte/admin/ProveedoresAdmin.mp4" width="400" controls></video>
        </div>
        <div style="display:flex; justify-content: center; margin-top: 2em;">
          <button style="padding: 1em 2em; border-radius: 10px; border: none; background: #ccc; color: black;"><i class="fas fa-download"></i> Manual usuario</button>
        </div>
      </div>
    </div>
  </main>

  <?php require "footer.php"; ?>
  <script src="<?= constant('URL') ?>public/js/app.js" type="module"></script>
  <script src="<?= constant('URL') ?>public/js/sidebarDashboard.js"></script>
</body>

</html>