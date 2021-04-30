<!DOCTYPE html>
<html lang="es">

<head>
  <?php require "head.php"; ?>
  <title>Información</title>
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

?>

<body id="body" onmousemove="mouseMovement(event)">
  <?php require "contenido.php"; ?>

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
  <script src="<?= constant('URL') ?>public/js/informacion.js"></script>
</body>

</html>