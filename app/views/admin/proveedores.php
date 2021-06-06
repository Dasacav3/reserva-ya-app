<!DOCTYPE html>
<html lang="es">

<head>
  <?php require "head.php"; ?>
  <title>Gestión de proveedores</title>
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
}


$img = $_SESSION['datos'][6];

?>

<body id="body" onmousemove="mouseMovement(event)">
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
      <table class="datatable">
        <thead>
          <div class="header-tools"> 
            <div class="tools">
              <ul>
                <li>
                  <a href="<?php echo constant('URL'); ?>admin/agregarprov"><button><i class="fas fa-plus-circle"></i> Añadir</button></a>
                  
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
          while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          ?>
            <tr>
              <th>
                <?php
                echo $row['ID_PROVEEDOR'];
                ?>
              </th>
              <td><?php
                  echo $row['NOMBRE_PROVEEDOR'];
                  ?></td>
              <td><?php
                  echo $row['DIRECCION_PROVEEDOR'];
                  ?></td>
              <td><?php
                  echo $row['PERSONA_ENCARGADA'];
                  ?></td>
              <td><?php
                  echo $row['TELEFONO_PROVEEDOR'];
                  ?></td>
              <td><a href="<?php echo constant('URL'); ?>admin/actualizaprov?id=<?php echo $row['ID_PROVEEDOR']; ?>&NP=<?php echo  $row['NOMBRE_PROVEEDOR']; ?>&DP=<?php echo  $row['DIRECCION_PROVEEDOR']; ?>&PE=<?php echo $row['PERSONA_ENCARGADA']; ?>&TP=<?php echo $row['TELEFONO_PROVEEDOR']; ?>"><button class="btn-edit"><i class='fas fa-edit'></i></button></a>
                <a href="<?php echo constant('URL'); ?>admin/eliminaprov?id=<?php echo $row['ID_PROVEEDOR']; ?>&NP=<?php echo  $row['NOMBRE_PROVEEDOR']; ?>&DP=<?php echo  $row['DIRECCION_PROVEEDOR']; ?>&PE=<?php echo $row['PERSONA_ENCARGADA']; ?>&TP=<?php echo $row['TELEFONO_PROVEEDOR']; ?>"><button class="btn-delete"><i class='fas fa-trash-alt'></i></button></a>
              </td>
            </tr>
        </tbody>
      <?php
          }
      ?>
      </table>
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