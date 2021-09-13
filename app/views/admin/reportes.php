<!DOCTYPE html>
<html lang="es">

<head>
  <?php require "head.php"; ?>
  <title>Reportes</title>
</head>
<body id="body">
  <?php require "contenido.php"; ?>

  <main class="main__container">
    <div>
      <h2 class="title_table">Reportes</h2>
      <div class="reportes_container">

        <div class="reporte_card">
          <div class="icon_reporte"><i class="fas fa-scroll"></i></div>
          <h4>Insumos</h4>
          <button class="btn_generar" id="reporteInsumo">Generar reporte</button>
        </div>
        <div class="reporte_card">
          <div class="icon_reporte"><i class="fas fa-book"></i></div>
          <h4>Reservaciones</h4>
          <button class="btn_generar" id="reporteReserva">Generar reporte</button>
        </div>
        <div class="reporte_card">
          <div class="icon_reporte"><i class="fas fa-user-alt"></i></div>
          <h4>Clientes</h4>
          <button class="btn_generar" id="reporteCliente">Generar reporte</button>
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
            <input type="button" value="Generar" id="generarReporteInsumo" />
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
            <input type="button" value="Generar" id="generarReporteReserva" />
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
            <input type="button" value="Generar" id="generarReporteUsuario" />
          </form>
        </div>



      </div>
    </div>
  </main>
  <?php require "footer.php"; ?>
  <script src="<?= constant('URL') ?>public/js/app.js" type="module"></script>
  <script src="<?= constant('URL') ?>public/js/sidebarDashboard.js" type="module"></script>
  <script src="<?= constant('URL') ?>public/js/reportes.js" type="module"></script>
</body>

</html>