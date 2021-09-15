<!DOCTYPE html>
<html lang="es">

<head>
  <?php require "head.php"; ?>
  <title>Gestión de productos</title>
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
              <button id="add_product" class="add"><i class="fas fa-plus-circle"></i> Añadir</button>
              <button id="add_category" class="add_category"><i class="fas fa-folder-plus"></i> Añadir categoria</button>
              <!-- Formulario agregar categoria -->
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

            </li>
          </ul>
          <!-- Formulario agregar producto -->
          <div class="container_add_product" id="container_add_product">
            <form action="<?php echo constant('URL'); ?>app/models/admin/productos/verificar_agregar_productos.php" method="POST" class="form_add_product" id="form_add_product" enctype="multipart/form-data" autocomplete="ON">
              <a href="#" id="close_add_product" class="close_add_product"><i class="close-modal-product fa fa-times-circle fa-2x"></i></a>
              <label for="NOMBRE_PRODUCTO">Nombre producto</label>
              <br>
              <input type="text" maxlength="70" required="" class="NOMBRE_CATEGORIA_PRODUCTO" name="NOMBRE_PRODUCTO" id="NOMBRE_PRODUCTO" required="">
              <br>
              <label for="DESCRIPCION_PRODUCTO">Descripción del producto</label>
              <br>
              <textarea name="DESCRIPCION_PRODUCTO" id="DESCRIPCION_PRODUCTO" class="DESCRIPCION_PRODUCTO" cols="30" rows="10" required=""></textarea>
              <br>
              <label for="CANTIDAD_PRODUCTO">Cantidad producto</label>
              <br>
              <input type="number" min="1" id="CANTIDAD_PRODUCTO" required="" name="CANTIDAD_PRODUCTO" class="CANTIDAD_PRODUCTO">
              <br>
              <label for="VALOR_PRODUCTO">Valor producto</label>
              <br>
              <input type="number" step="0.01" min="1" name="VALOR_PRODUCTO" id="VALOR_PRODUCTO" class="VALOR_PRODUCTO" required="">
              <br>
              <label for="ID_CATEGORIA_PRODUCTO">Categoria</label>
              <br>
              <select name="ID_CATEGORIA_PRODUCTO" class="categoria_producto" required="">
                <option value="">Seleccionar</option>
                <?php
                foreach ($category as $resultado_category) {
                ?>
                  <option id="opcion_editar_categoria" value="<?php echo $resultado_category['ID_CATEGORIA_PRODUCTO'] ?>"><?php echo $resultado_category['NOMBRE_CATEGORIA_PRODUCTO'] ?></option>
                <?php
                }
                ?>
              </select>
              <br>0
              <label for="IMAGEN_PRODUCTO ">Imagen producto</label>
              <br>
              <input type="file" name="IMAGEN_PRODUCTO" id="IMAGEN_PRODUCTO " class="IMAGEN_PRODUCTO" accept="image/png, .jpeg, .jpg, image/gif" required="">
              <br>
              <input type="submit" value="Enviar" id="submit">
            </form>
          </div>
        </div>
        <!-- Formulario editar producto -->
        <div class="container_edit_product" id="container_edit_product">
          <form action="<?php echo constant('URL'); ?>app/models/admin/productos/verificar_actualizar.php" method="post" class="contact form_edit_product" id="form_edit_product" enctype="multipart/form-data" autocomplete="OFF">
            <a href="#" id="Button_close_edit_product" class="close_add_product"><i class="close-modal-product fa fa-times-circle fa-2x"></i></a>
            <input type="text" maxlength="70" required="" class="ID_EDIT_PRODUCT" name="ID_PRODUCTO" id="ID_EDIT_PRODUCT" readonly>
            <br>
            <label for="NOMBRE_PRODUCTO">Nombre producto</label>
            <br>
            <input type="text" maxlength="70" required="" class="NOMBRE_CATEGORIA_PRODUCTO" name="NOMBRE_PRODUCTO" id="NOMBRE_PRODUCTO_Editar">
            <br>
            <label for="DESCRIPCION_PRODUCTO">Descripción del producto</label>
            <br>
            <textarea name="DESCRIPCION_PRODUCTO" id="DESCRIPCION_PRODUCTO_Editar" class="DESCRIPCION_PRODUCTO" cols="30" rows="10"></textarea>
            <br>
            <label for="CANTIDAD_PRODUCTO">Cantidad producto</label>
            <br>
            <input type="number" min="1" id="CANTIDAD_PRODUCTO_Editar" name="CANTIDAD_PRODUCTO" class="CANTIDAD_PRODUCTO">
            <br>
            <label for="VALOR_PRODUCTO">Valor producto</label>
            <br>
            <input type="number" step="0.01" min="1" name="VALOR_PRODUCTO" id="VALOR_PRODUCTO_Editar" class="VALOR_PRODUCTO">
            <br>
            <label for="ID_CATEGORIA_PRODUCTO">Categoria</label>
            <br>
            <select name="ID_CATEGORIA_PRODUCTO" class="categoria_producto" required="">
              <option>Seleccionar</option>
              <?php
              foreach ($category as $resultado_category) {

              ?>
                <option id="opcion_editar_categoria" value="<?php echo $resultado_category['ID_CATEGORIA_PRODUCTO'] ?>"><?php echo $resultado_category['NOMBRE_CATEGORIA_PRODUCTO'] ?></option>
              <?php
              }
              ?>
            </select>
            <label for="IMAGEN_PRODUCTO ">Imagen producto</label>
            <br>
            <input type="file" name="IMAGEN_PRODUCTO" id="IMAGEN_PRODUCTO_Editar " class="IMAGEN_PRODUCTO" accept="image/png, .jpeg, .jpg, image/gif">
            <br>
            <input type="submit" value="Enviar" id="submit">
          </form>
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
          $resultado_categoria = $categoria->fetchAll(PDO::FETCH_BOTH);
          foreach ($resultado as $row_category) {
            $TraerDatos_categoria = $row[0] . "||" .
              $row[1];
          }

          $resultado = $query->fetchAll(PDO::FETCH_BOTH);
          $numProd = 0;
          foreach ($resultado as $row) {
            $numProd++;
            $TraerDatos = $row[0] . "||" .
              $row[1] . "||" .
              $row[2] . "||" .
              $row[3] . "||" .
              $row[4] . "||" .
              $row[5] . "||" .
              $row[6];
          ?>
            <tr>
              <td><?php echo $row["NOMBRE_CATEGORIA_PRODUCTO"] ?></td>
              <td><?php echo $row["1"] ?></td>
              <td><?php echo $row["2"] ?></td>
              <td><?php echo $row["3"] ?></td>
              <td><?php echo $row["4"] ?></td>
              <td class="imagen_vista"><?php echo '<img src="' . $row["5"] . '" style="width:140px;height:140px;border-radius:10px;background:none;">' ?>
              <td>
                <br>
                <!-- Actualizar registro -->
                <button class="abrirPopup-edit btn-edit actualizar_producto" data-id="<?php echo $TraerDatos; ?>">Editar</button>
                <br>
                <!-- Eliminar registro -->
                <a href="<?php echo constant('URL'); ?>app/models/admin/productos/eliminar_producto.php?ID_PRODUCTO=<?php echo $row["ID_PRODUCTO"] ?>" class="obtener_eliminar"><button class="abrirPopup-edit btn-delete" type="button">Eliminar</button></a>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </main>
  <?php require "footer.php"; ?>
  </div>
</body>
<script src="<?= constant('URL') ?>public/js/app.js" type="module"></script>
<script src="<?= constant('URL') ?>public/js/sidebarDashboard.js" type="module"></script>
<script src="<?= constant('URL') ?>public/js/alert_product.js"></script>
<script src="<?= constant('URL') ?>public/js/modales_productos.js"></script>

</html>