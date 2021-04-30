<!DOCTYPE html>
<html lang="es">

<head>
	<?php require "head.php"; ?>
  <title>Soporte ReservaYa</title>
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
        <h2 class="title_table">Soporte ReservaYa</h2>
        <div style="display:flex; justify-content: space-between">
          <div>
            <p>01 Actualizar información</p>
            <video src="http://localhost/reservaya-mvc/public/video_soporte/video_soporte.mp4" width="400" controls></video>
          </div>
          <div>
            <p>02 Reservaciones</p>
            <video src="http://localhost/reservaya-mvc/public/video_soporte/video_soporte.mp4" width="400" controls></video>
          </div>
          <div>
            <p>03 Tips de seguridad</p>
            <video src="http://localhost/reservaya-mvc/public/video_soporte/video_soporte.mp4" width="400" controls></video>
          </div>
        </div>
        <div style="display:flex; justify-content: center; margin-top: 2em;">
          <button style="padding: 1em 2em; border-radius: 10px; border: none; background: #ccc; color: black;"><i class="fas fa-download"></i> Manual usuario</button>
        </div>
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
</body>

</html>