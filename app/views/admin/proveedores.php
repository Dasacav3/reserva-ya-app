<!DOCTYPE html>
<html lang="es">

<head>
  <?php require "head.php"; ?>
  <title>Gestión de proveedores</title>
</head>

<body id="body">
  <?php require "contenido.php"; ?>
  <main class="main__container">
    <div>
      <h2 class="title_table">Modulo de Gestión de Proveedores</h2>
    </div>
    <?php
    require 'app/controller/database.php';
    try {
      $query = $pdo->prepare("SELECT * FROM proveedor");
      $query->execute();
    } catch (Exception $e) {
      echo "Conexion Fallida: " . $e->getMessage();
    }
    ?>
    <div class="datatable-container">
      <table class="datatable" style="width: 100%;">
        <thead>
          <div class="header-tools">
            <div class="tools">
              <ul>
                <li>
                  <a href="#"><button id="btn-abrir-popup" class="btn-abrir-popup"><i class="fas fa-plus-circle"></i> Añadir</button></a>
                </li>
              </ul>
            </div>
            <div class="search">
              <input type="text" class="search-input" id="search_input" />
            </div>
          </div>
          <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>DIRECCION</th>
            <th>PERSONA ENCARGADA</th>
            <th>TELEFONO</th>
            <th colspan="2">ACCIONES</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = $query->fetch(PDO::FETCH_BOTH)) {
            $traerDatos = $row[0] . "||" .
              $row[1] . "||" .
              $row[2] . "||" .
              $row[3] . "||" .
              $row[4];
          ?>
            <tr>
              <th>
                <?php
                echo $row['0'];
                ?>
              </th>
              <td><?php
                  echo $row['1'];
                  ?></td>
              <td><?php
                  echo $row['2'];
                  ?></td>
              <td><?php
                  echo $row['3'];
                  ?></td>
              <td><?php
                  echo $row['4'];
                  ?></td>
              <td><a><button class="btn-edit hola" id="btn-abrir-popup-edit" onclick="llenarmodal('<?php echo $traerDatos; ?>');"><i class='fas fa-edit'></i></button></a>
                <a href="<?php echo constant('URL'); ?>app/models/admin/proveedores/eliminaprov2.php?id=<?php echo $row['ID_PROVEEDOR']; ?>" class="PRUEBA"><button class="btn-delete"><i class='fas fa-trash-alt'></i></button></a>
              </td>
            </tr>
        </tbody>
      <?php
          }
      ?>
      </table>
    </div>
  </main>

  <!-- Modal Añadir proveedores -->
  <div class="overlay" id="overlay">
    <div class="popup" id="popup">
      <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
      <h3>Agregar proveedor</h3>
      <form action="http://localhost/reservaya-mvc/app/models/admin/proveedores/aggprov.php" method="post">
        <label>Nombre Proveedor:</label><br>
        <input type="text" name="NOMBRE_PROVEEDOR"> <br><br>
        <label>Direccion Proveedor:</label> <br>
        <input type="text" name="DIRECCION_PROVEEDOR"> <br><br>
        <label>Persona Encargada:</label> <br>
        <input type="text" name="PERSONA_ENCARGADA"> <br><br>
        <label>Telefono Proveedor:</label> <br>
        <input type="text" name="TELEFONO_PROVEEDOR"><br><br>
        <input type="submit" class="btn-submit" value="Agregar">
      </form>
    </div>
  </div>

  <!-- Modal actualizar proveedores -->
  <div class="overlay" id="overlay-edit">
    <div class="popup" id="popup-edit">
      <a href="#" id="btn-cerrar-popup-edit" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
      <h3>Actualizar proveedor</h3>
      <form action="http://localhost/reservaya-mvc/app/models/admin/proveedores/actualizarprov2.php" method="post">
        <label>ID Proveedor:</label><br>
        <input type="text" name="id" id="identificador" readonly='readonly'><br><br>
        <label>Nombre Proveedor:</label><br>
        <input type="text" name="newname" id="nombre_prov"> <br><br>
        <label>Direccion Proveedor:</label> <br>
        <input type="text" name="newdireccion" id="direccion_prov"> <br><br>
        <label>Persona Encargada:</label> <br>
        <input type="text" name="newpersona" id="persona_encargada"> <br><br>
        <label>Telefono Proveedor:</label> <br>
        <input type="text" name="newtelefono" id="telefono_prov"><br><br>
        <input type="submit" value="Actualizar" id="btn_edit" class="btn-submit">
      </form>
    </div>
  </div>
  <?php require "footer.php"; ?>
  <script src="<?= constant('URL') ?>public/js/app.js" type="module"></script>
  <script src="<?= constant('URL') ?>public/js/sidebarDashboard.js"></script>
  <script src="<?= constant('URL') ?>public/js/proveedor.js"></script>
  <script src="<?= constant('URL') ?>public/js/alert_proveedor.js"></script>
</body>

</html>