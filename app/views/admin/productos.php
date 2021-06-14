<!DOCTYPE html>
<html lang="es">

<head>
  <?php require "head.php"; ?>
  <title>Gestión de productos</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body id="body">
  <?php require "contenido.php";
  include("app/controller/database.php");
  $query = $pdo->prepare("SELECT producto.ID_PRODUCTO,producto.NOMBRE_PRODUCTO,producto.DESCRIPCION_PRODUCTO,  producto.CANTIDAD_PRODUCTO,  producto.VALOR_PRODUCTO, 
     producto.IMAGEN_PRODUCTO,categoria_producto.NOMBRE_CATEGORIA_PRODUCTO
     FROM producto
     INNER JOIN categoria_producto ON producto.ID_CATEGORIA_PRODUCTO = categoria_producto.ID_CATEGORIA_PRODUCTO
     ORDER BY  producto.NOMBRE_PRODUCTO ASC");
  $query->execute();
  $categoria = $pdo->prepare("SELECT * FROM categoria_producto");
  $categoria->execute();
  ?>
  <main class="main__container" id="main__container">
    <div>
      <h2 class="title_table">Modulo de Gestión de Productos</h2>
    </div>
    <div class="datatable-container">
      <div class="header-tools">
        <div class="tools">
          <ul>
            <li>
              <a href="<?php echo constant('URL'); ?>admin/agregar_producto"><button id="abrirPopup-add" class="add"><i class="fas fa-plus-circle"></i> Añadir</button></a>
              <button id="add_category" class="add_category"><i class="fas fa-folder-plus"></i> Añadir categoria</button>
              <!-- Formulario agregar producto -->
              <div id="pop-up-add" class="pop-up form-modal">
                <form action="<?php echo constant('URL'); ?>app/models/admin/productos/añadir_categoria.php" method="post" id="form_categoria" class="form_categoria">
                  <h2>Agregar categoria</h2>
                  <h3>Nombre categoria</h3>
                  <br>
                  <input type="text" id="nombre_categoria" name="NOMBRE_CATEGORIA_PRODUCTO">
                  <br>
                  <input type="submit" id="enviar_categoria" value="Enviar">
                  <input type="button" value="Cerrar" id="cerrar_categoria">
                </form>
              </div>

              <!-- Formulario editar categoria  -->
              <button id="update_category" class="update_category"><i class="fas fa-edit"></i> Editar categoria</button>
              <div id="pop-up-edit" class="pop-up form-modal">
                <form action="<?php echo constant('URL'); ?>app/models/admin/productos/verificar_actualizar_categoria.php" method="post" id="edit_category" class="edit_category">
                  <h2>Editar categoria</h2>
                  <h3>Categoria antigua </h3>
                  <br>
                  <select name="ID_CATEGORIA_PRODUCTO" class="id_categoria_producto" required="">
                    <option value="">Seleccionar</option>
                    <?php
                    $category = $categoria->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($category as $resultado_category) {
                    ?>
                      <option id="opcion_editar_categoria" value="<?php echo $resultado_category['ID_CATEGORIA_PRODUCTO'] ?>"><?php echo $resultado_category['NOMBRE_CATEGORIA_PRODUCTO'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <h3> Nueva categoria</h3>
                  <input type="text" id="categoria" name="NOMBRE_CATEGORIA_PRODUCTO">
                  <br>
                  <input type="submit" id="enviar_actualizacion_categoria" value="Enviar">
                  <input type="button" value="Cerrar" id="cerrar_actualizacion_categoria">
                </form>
              </div>


              <!-- Busqueda en la tabla  -->
            </li>
          </ul>
        </div>
        <div class="search">
          <input type="text" class="search-input" id="search_input" />
        </div>
      </div>
      <table class="datatable">
        <thead>
          <tr>
            <th>Categoria producto</th>
            <th>Nombre del producto</th>
            <th>Descripción del producto</th>
            <th>Cantidad</th>
            <th>Valor</th>
            <th>Imagen</th>
            <th>ACCIONES</th>
          </tr>
        </thead>
        <tbody id="producto">
          <?php
          $resultado = $query->fetchAll(PDO::FETCH_ASSOC);

          foreach ($resultado as $row) { ?>
            <tr>
              <td><?php echo $row["NOMBRE_CATEGORIA_PRODUCTO"] ?></td>
              <td><?php echo $row["NOMBRE_PRODUCTO"] ?></td>
              <td><?php echo $row["DESCRIPCION_PRODUCTO"] ?></td>
              <td><?php echo $row["CANTIDAD_PRODUCTO"] ?></td>
              <td><?php echo $row["VALOR_PRODUCTO"] ?></td>
              <td class="imagen_vista"><?php echo '<img src="' . $row["IMAGEN_PRODUCTO"] . '" style="width:300px;border-radius:10px;background:none;">'   ?></td>
              <td>
                <!-- Actualizar registro -->
                <a href="<?php echo constant('URL'); ?>admin/actualizar_producto?ID_PRODUCTO=<?php echo $row["ID_PRODUCTO"] ?>"><button class="abrirPopup-edit btn-edit" type="button" onclick="Editar('3');abrir()">Editar</button></a>
                <!-- Eliminar registro -->
                <a href="<?php echo constant('URL'); ?>app/models/admin/productos/eliminar_producto.php?ID_PRODUCTO=<?php echo $row["ID_PRODUCTO"] ?>" class="obtener_eliminar"><button class="abrirPopup-edit btn-delete" type="button">Eliminar</button></a>
            </tr>
          <?php
          }
          ?>
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
  </main>
  <?php require "footer.php"; ?>
  <script src="<?= constant('URL') ?>public/js/app.js" type="module"></script>
  <script src="<?= constant('URL') ?>public/js/sidebarDashboard.js"></script>
  <script src="<?= constant('URL') ?>public/js/alert_product.js"></script>
  <script src="<?= constant('URL') ?>public/js/modales_productos.js"></script>
  </div>
</body>

</html>