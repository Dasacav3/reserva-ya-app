<!DOCTYPE html>
<html lang="es">

<head>
  <?php require "head.php"; ?>
  <title>Gestión de proveedores</title>
</head>

<body id="body">
  <?php

  $id = $_REQUEST['id'];
  $nombre = $_REQUEST['NP'];
  $direccion = $_REQUEST['DP'];
  $persona = $_REQUEST['PE'];
  $telefono = $_REQUEST['TP'];
  ?>
  <?php require "contenido.php"; ?>
  <main class="main__container">
    <div>
      <h2 class="title_table">Eliminar Proveedores</h2>
    </div>
    <div style="background-color: white;">
      <form action="<?= constant('URL') ?>app/models/admin/proveedores/eliminaprov2.php" method="post">
        <h5>¿Seguro quiere eliminar?</h5>
        <label>ID Proveedor:</label><br>
        <input type="text" name="id" value="<?php echo $id; ?>" readonly='readonly'><br><br>
        <label>Nombre Proveedor:</label><br>
        <input type="text" name="newname" value="<?php echo $nombre; ?>" readonly='readonly'> <br><br>
        <label>Direccion Proveedor:</label> <br>
        <input type="text" name="newdireccion" value="<?php echo $direccion; ?>" readonly='readonly'> <br><br>
        <label>Persona Encargada:</label> <br>
        <input type="text" name="newpersona" value="<?php echo $persona; ?>" readonly='readonly'> <br><br>
        <label>Telefono Proveedor:</label> <br>
        <input type="text" name="newtelefono" value="<?php echo $telefono ?>" readonly='readonly'><br><br>
        <input type="submit" value="Eliminar">
        <a href="<?= constant('URL') ?>admin/proveedores"><input type="button" value="volver"></a>
      </form>
    </div>
  </main>
  <?php require "footer.php"; ?>
  <script src="<?= constant('URL') ?>public/js/app.js" type="module"></script>
  <script src="<?= constant('URL') ?>public/js/sidebarDashboard.js" type="module"></script>
</body>

</html>