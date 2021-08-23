<!DOCTYPE html>
<html lang="es">

<head>
  <?php require "head.php"; ?>
  <title>Gestión de Mesas</title>
</head>

<body id="body">
  <?php require "contenido.php"; ?>
  <main class="main__container">
    <div>
      <h2 class="title_table">Modulo de Gestión de Mesas</h2>
      <div class="datatable-container">
        <div class="header-tools">
          <div class="tools">
            <ul>
              <li>
                <button id="abrirPopup-add" class="add"><i class="fas fa-plus-circle"></i> Añadir</button>
              </li>
            </ul>
          </div>
        </div>
        <table class="datatable">
          <thead>
            <tr>
              <th>ID MESA</th>
              <th>CAPACIDAD MESA</th>
              <th>ESTADO MESA</th>
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody id="table_elements">

          </tbody>
          <tfoot>
            <tr>
              <th>ID MESA</th>
              <th>CAPACIDAD MESA</th>
              <th>ESTADO MESA</th>
              <th>ACCIONES</th>
            </tr>
          </tfoot>
        </table>
      </div>

      <!-- Modal Añadir mesa -->
      <div id="pop-up-add" class="pop-up form-modal">
        <form id="addMesaForm" class="pop-up-wrap" method="POST">
          <a href="#" id="closePopup-add" class="closePopup"><i class="fas fa-times-circle"></i></a>
          <h4 class="form-title">Añadir mesa</h4>
          <div class="form-fields">
            <div>
              <label for="">Capacidad Mesa</label> <br />
              <input type="number" name="capacidadMesa" id="capacidadMesa"> <br />
            </div>
          </div>
          <input type="button" value="Registrar" id="registrar" />
        </form>
      </div>

      <!-- Modal Editar mesa -->
      <div id="pop-up-edit" class="pop-up form-modal">
        <form id="editMesaForm" class="pop-up-wrap" method="POST">
        </form>
      </div>


    </div>
  </main>
  <?php require "footer.php"; ?>
  <script src="<?= constant('URL') ?>public/js/app.js" type="module"></script>
  <script src="<?= constant('URL') ?>public/js/sidebarDashboard.js"></script>
  <script defer src="<?= constant('URL') ?>public/js/mesas.js" type="module"></script>
</body>

</html>