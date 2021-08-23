<!DOCTYPE html>
<html lang="es">

<head>
  <?php require "head.php"; ?>
  <title>Gestión de Usuarios</title>
</head>

<body id="body">
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
      </div>
      <table class="datatable">
        <thead>
          <th>ID USUARIO</th>
          <th>NOMBRE DE USUARIO</th>
          <th>TIPO USUARIO</th>
          <th>ESTADO USUARIO</th>
          <th>ACCIONES</th>
        </thead>
        <tbody id="table_elements">

        </tbody>
        <tfoot>
          <th>ID USUARIO</th>
          <th>NOMBRE DE USUARIO</th>
          <th>TIPO USUARIO</th>
          <th>ESTADO USUARIO</th>
          <th>ACCIONES</th>
        </tfoot>
      </table>
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
  <script src="<?= constant('URL') ?>public/js/app.js" type="module"></script>
  <script src="<?= constant('URL') ?>public/js/sidebarDashboard.js"></script>
  <script src="<?= constant('URL') ?>public/js/regularExpression.js"></script>
  <script src="<?= constant('URL') ?>public/js/usuarios_admin.js" type="module"></script>
</body>

</html>