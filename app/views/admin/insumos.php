<!DOCTYPE html>
<html lang="es">

<head>
  <?php require "head.php"; ?>
  <title>Gestión de insumos</title>
</head>
<body id="body">
  <?php require "contenido.php"; ?>
  <main class="main__container">
    <div>
      <h2 class="title_table">Modulo de Gestión de Insumos</h2>

    </div>
    <div class="datatable-container">
      <div class="header-tools">
        <div class="tools">
          <ul>
            <li>
              <button id="abrirPopup-add" class="add"><i class="fas fa-plus-circle"></i> Añadir</button>
            </li>
            <li>
              <button id="abrirPopup-add-categoria" class="add-categoria"><i class="fas fa-folder-plus"></i> Añadir Categoria</button>
            </li>
            <li>
              <button id="abrirPopup-edit-categoria" class="edit-categoria"><i class="fas fa-edit"></i> Editar Categoria</button>
            </li>
          </ul>
        </div>
      </div>
      <table class="datatable">
        <thead>
          <tr>
            <th>ID INSUMO</th>
            <th>NOMBRE INSUMO</th>
            <th>CANTIDAD INSUMO</th>
            <th>FECHA COMPRA</th>
            <th>VALOR INSUMO</th>
            <th>ID CATEGORIA</th>
            <th>ID PROVEEDOR</th>
            <th>ACCIONES</th>
          </tr>
        </thead>
        <tbody id="table_elements">

        </tbody>
      </table>
    </div>


    <!-- Modal Añadir Insumos -->
    <div id="pop-up-add" class="pop-up form-modal">
      <form id="pop_up_wrap_add" class="pop-up-wrap" method="POST">
        <a href="#" id="closePopup-add" class="closePopup"><i class="fas fa-times-circle"></i></a>
        <h4 class="form-title">Añadir Insumos</h4>
        <div class="form-fields">
          <div>
            <label for="">Nombre Insumo</label> <br />
            <input name="nombre" id="nombre"> <br>
            <label for="">Cantidad Insumos</label> <br />
            <input type="number" min="1" name="cantidad" id="cantidad" /> <br />
            <label for="">Fecha compra</label> <br />
            <input type="date" min="<?php echo $fecha_actual ?>" max="<?php echo date("Y-m-d", $mod_date); ?>" name="fecha_compra" id="add_fecha_compra" /> <br />
          </div>
          <div>
            <label for="">Valor Insumo</label> <br />
            <input type="number" step="0.01" min="1000" name="valor" id="add_valor" /> <br />
            <label for="">Id Proveedor</label> <br />
            <select name="proveedor" id="proveedor">
            </select> <br>
            <label for="">Id Categoria</label> <br />
            <select name="categoria" id="categoria_add">
            </select> <br>
          </div>
        </div>
        <input type="button" value="Registrar" id="registrar" />
      </form>
    </div>


    <!-- Modal Añadir Categoria Insumos -->
    <div id="pop-up-add-categoria" class="pop-up form-modal">
      <form id="pop_up_wrap_add_categoria" class="pop-up-wrap" method="POST">
        <a href="#" id="closePopup-add-category" class="closePopup"><i class="fas fa-times-circle"></i></a>
        <h4 class="form-title">Añadir Categoria</h4>
        <div class="form-fields">
          <div>
            <label for="">Nombre Categoria</label> <br />
            <input name="nombre" id="nombreCategoria"> <br>
          </div>
        </div>
        <input type="button" value="Añadir" id="registrarCategoria" />
      </form>
    </div>

    <!-- Modal Editar Categoria Insumos -->
    <div id="pop-up-edit-categoria" class="pop-up form-modal">
      <form id="pop_up_wrap_edit_categoria" class="pop-up-wrap" method="POST">
        <a href="#" id="closePopup-edit-category" class="closePopup"><i class="fas fa-times-circle"></i></a>
        <h4 class="form-title">Editar Categoria</h4>
        <div class="form-fields">
          <div>
            <label for="">ID Categoria</label> <br />
            <select id="categoria_edit" name="idCategoriaInsumo">

            </select>
          </div>
          <div>
            <label for="">Nombre Categoria</label> <br />
            <input name="nombre" id="nombreCategoria_edit"> <br>
          </div>
        </div>
        <input type="button" value="Actualizar" id="editarCategoria" />
      </form>
    </div>


    <!-- Modal Editar Insumos -->
    <div id="pop-up-edit" class="pop-up form-modal">
      <form id="pop_up_wrap_edit" class="pop-up-wrap" method="POST">
        <a href="#" id="closePopup-edit" class="closePopup"><i class="fas fa-times-circle"></i></a>
        <h4 class="form-title">Editar Insumo</h4>
        <div class="form-fields">
          <div>
            <label for="">ID Insumo</label> <br />
            <input type="text" name="id_insumo" id="id_insumo" readonly> <br>
            <label for="">Nombre Insumo</label> <br />
            <input name="nombreEditar" id="nombreEditar"> <br>
            <label for="">Cantidad Insumos</label> <br />
            <input type="number" min="1" name="cantidadEditar" id="cantidadEditar" /> <br />
            <label for="">Fecha compra</label> <br />
            <input type="date" min="<?php echo $fecha_actual ?>" max="<?php echo date("Y-m-d", $mod_date); ?>" name="fecha_compra" id="add_fecha_compra_editar" /> <br />
          </div>
          <div>
            <label for="">Valor Insumo</label> <br />
            <input type="number" step="0.01" min="1000" name="valorEditar" id="add_valor_Editar" /> <br />
            <label for="">Id Proveedor</label> <br />
            <input name="proveedorEditar" id="proveedorEditar"><br>
            <label for="">Id Categoria</label> <br />
            <input name="categoriaEditar" id="categoriaEditar"> <br>
          </div>
        </div>
        <input type="button" value="Guardar" id="edit" />
      </form>
    </div>
  </main>
  <?php require "footer.php"; ?>
  <script src="<?= constant('URL') ?>public/js/app.js" type="module"></script>
  <script src="<?= constant('URL') ?>public/js/sidebarDashboard.js" type="module"></script>
  <script src="<?= constant('URL') ?>public/js/insumos_admin.js"></script>
</body>

</html>