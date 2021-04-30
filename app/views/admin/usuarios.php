<!DOCTYPE html>
<html lang="es">

<head>
  <?php require "head.php"; ?>
  <title>Gestión de Usuarios</title>
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
      <h2 class="title_table">Modulo de Gestión de Usuarios</h2>
    </div>
    <div class="datatable-container">
      <div class="header-tools">
        <div class="tools">
          <ul>
            <li>
              <button id="abrirPopup-add" class="add"><i class="fas fa-plus-circle"></i> Añadir</button>
            </li>
          </ul>
        </div>
        <div class="search">
          <input type="text" class="search-input" id="search_input" placeholder="Busqueda" />
        </div>
      </div>
      <table class="datatable">
        <thead>
          <tr>
            <th>ID USUARIO</th>
            <th>NOMBRE DE USUARIO</th>
            <th>TIPO USUARIO</th>
            <th>ESTADO USUARIO</th>
            <th>ACCIONES</th>
          </tr>
        </thead>
        <tbody id="table_elements">

        </tbody>
      </table>
      <div class="footer-tools">
        <div class="list-items">
          Mostrar
          <select name="n-entries" id="n-entries" class="n-entries">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
          </select>
          entradas
        </div>
        <div class="pages">
          <ul>
            <div class="pagenumbers" id="pagination"></div>
          </ul>
        </div>
      </div>
    </div>


    <!-- Modal Añadir Usuarios -->
    <div id="pop-up-add" class="pop-up form-modal">
      <form id="pop_up_wrap_add" class="pop-up-wrap" method="POST">
        <a href="#" id="closePopup-add" class="closePopup"><i class="fas fa-times-circle"></i></a>
        <h4 class="form-title">Añadir usuario empleado</h4>
        <div class="form-fields">
          <div>
            <label for="">N° Documento</label> <br>
            <input type="text" name="doc_emp" id="doc_emp" /> <br>
            <label for="">Nombre</label> <br>
            <input type="text" name="name_emp" id="name_emp" /> <br>
            <label for="">Apellido</label> <br>
            <input type="text" name="last_emp" id="last_emp" /> <br>
            <label for="">Email</label> <br>
            <input type="email" name="email" id="email_emp" /> <br>
          </div>
          <div>
            <label for="">Celular</label> <br>
            <input type="tel" name="cel_emp" id="cel_emp" /> <br>
            <label for="">Contraseña</label> <br>
            <input type="password" name="pass_emp" id="pass_emp" /> <br>
            <label for="">Repetir Contraseña</label> <br>
            <input type="password" name="pass_emp2" id="pass_emp2" /> <br>
          </div>
        </div>

        <input type="button" value="Registrar" id="registrar" />
      </form>
    </div>



    <!-- Modal Editar Usuarios -->
    <div id="pop-up-edit" class="pop-up form-modal">
      <form id="pop_up_wrap_edit" class="pop-up-wrap" method="POST">

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
  <script src="<?= constant('URL') ?>public/js/datatable.js"></script>
  <script src="<?= constant('URL') ?>public/js/sidebarDashboard.js"></script>
  <script src="<?= constant('URL') ?>public/js/regularExpression.js"></script>
  <script src="<?= constant('URL') ?>public/js/usuarios_admin.js"></script>
</body>

</html>