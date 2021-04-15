<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../dist/img/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="../../dist/css/normalize.css">
  <link rel="stylesheet" href="../../dist/css/dashboard.css">
  <link rel="stylesheet" href="../../dist/css/datatable.css" />
  <link rel="stylesheet" href="../../dist/css/modals.css" />

  <!-- FontAwesome -->
  <link rel="stylesheet" href="../../../../lib/fontawesome-5.15.2/css/all.min.css">
  <script src="../../../../lib/fontawesome-5.15.2/js/all.min.js"></script>
  <!-- Sweer Alert -->
  <script src="../../../../lib/sweetaler2/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="../../../../lib/sweetaler2/sweetalert2.min.css">
  <title>Gestión de Proveedores</title>
</head>
<?php
session_start();

$sesion = $_SESSION['datos'];

if ($sesion == null || $sesion = '') {
?>
  <script>
    function Regresar() {
      alert('El acceso esta prohibido');
      window.history.go(-1);
    }
    Regresar();
  </script>
<?php
  die();
}

$img = $_SESSION['datos'][6];

?>

<body id="body">
  <div class="container">
    <nav class="navbar">
      <div class="nav_icon" onclick="toggleSidebar()">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </div>
      <div class="navbar__left">
        <h4>¡Bienvenid<i class="fas fa-at"></i> <?php echo $_SESSION['datos'][3] . " " . $_SESSION['datos'][4]; ?>!</h4>
      </div>
      <div class="navbar__right">
        <a href="../informacion/soporte.php">
          <i class="fa fa-question-circle" aria-hidden="true"></i>
        </a>
        <a href="../../../models/logout.php">
          <i class="fa fa-power-off" aria-hidden="true"></i>
        </a>
        <a href="../usuarios/updateInfo.php">
          <img class="foto_perfil" src="<?php echo $img; ?>" />
        </a>
      </div>
    </nav>

    <main class="main__container">
      <div>
        <h2 class="title_table">Modulo de Gestión de Proveedores</h2>
      </div>
      <?php
      include('../../../controller/database.php');
      try{
        $query=$pdo->prepare("SELECT * FROM proveedor");
        $query->execute();
      }catch(Exception $e){
        echo "Conexion Fallida: " . $e->getMessage();
      }
      ?>
      <div class="datatable-container">
        <table class="datatable">
          <thead>
            <tr>
              <th colspan="1" style="text-align: center;"><a href="http://localhost/reservaya-mvc/app/views/admin/proveedores/agregarprov.php"><input type="button" value="AGREGAR" style="background: none; color: #fff; border: none;"></a></th>
            </tr>
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
                <td><a href="http://localhost/reservaya-mvc/app/models/admin/proveedores/actualizaprov.php?id=<?php echo $row['ID_PROVEEDOR']; ?>&NP=<?php echo $row['NOMBRE_PROVEEDOR']; ?>&DP=<?php echo $row['DIRECCION_PROVEEDOR']; ?>&PE=<?php echo $row['PERSONA_ENCARGADA']; ?>&TP=<?php echo $row['TELEFONO_PROVEEDOR']; ?>"><input type="button" value="Modificar" class="btn-edit"></a>
                <a href="http://localhost/reservaya-mvc/app/models/admin/proveedores/eliminaprov.php?id=<?php echo $row['ID_PROVEEDOR']; ?>&NP=<?php echo $row['NOMBRE_PROVEEDOR']; ?>&DP=<?php echo $row['DIRECCION_PROVEEDOR']; ?>&PE=<?php echo $row['PERSONA_ENCARGADA']; ?>&TP=<?php echo $row['TELEFONO_PROVEEDOR']; ?>"><input type="button" value="Eliminar" class="btn-delete"></a></td>
              </tr>
          </tbody>
        <?php
            }
        ?>
        </table>
      </div>
    </main>
    <div id="sidebar">
      <div class="sidebar__title">
        <div class="sidebar__img">
          <img src="../../dist/img/logo-reservaya.png" alt="logo" />
        </div>
        <i onclick="closeSidebar()" class="fa fa-times" id="sidebarIcon" aria-hidden="true"></i>
      </div>

      <div class="sidebar__menu">
        <div class="sidebar__link">
          <i class="fa fa-home"></i>
          <a href="../dashboard.php">Inicio</a>
        </div>
        <div class="sidebar__link">
          <i class="fa fa-id-card" aria-hidden="true"></i>
          <a href="../usuarios/updateInfo.php">Actualizar información</a>
        </div>
        <div class="sidebar__link">
          <i class="fas fa-book"></i>
          <a href="../reservas/reserva.php">Reservaciones</a>
        </div>
        <div class="sidebar__link">
          <i class="fa fa-archive"></i>
          <a href="../mesas/mesas.php">Mesas</a>
        </div>
        <div class="sidebar__link">
          <i class="fa fa-utensils"></i>
          <a href="../productos/productos.php">Productos</a>
        </div>
        <div class="sidebar__link">
          <i class="fa fa-check-circle"></i>
          <a href="../insumos/insumos.php">Insumos</a>
        </div>
        <div class="sidebar__link active_menu_link">
          <i class="fa fa-truck"></i>
          <a href="../proveedores/proveedores.php">Proveedores</a>
        </div>
        <div class="sidebar__link">
          <i class="fa fa-user"></i>
          <a href="../usuarios/usuarios.php">Usuarios</a>
        </div>
        <div class="sidebar__link">
          <i class="fa fa-address-book"></i>
          <a href="../informacion/informacion.php">información</a>
        </div>
        <div class="sidebar__link">
          <i class="fa fa-question-circle"></i>
          <a href="../informacion/soporte.php">Soporte</a>
        </div>


        <div class="sidebar__divider">
          <hr>
        </div>

        <div class="sidebar__link">
          <p class="sidebar__role">Rol administrador</p>
        </div>

      </div>
    </div>
  </div>
  <script src="../../dist/js/sidebarDashboard.js"></script>
  </script>
</body>

</html>