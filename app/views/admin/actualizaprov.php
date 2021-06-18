<!DOCTYPE html>
<html lang="es">
  <head>
  <?php require "head.php"; ?>
  <title>Gestión de proveedores</title>
</head>
  <body id="body">
      <?php

        $id=$_REQUEST['id'];
        $nombre=$_REQUEST['NP'];
        $direccion=$_REQUEST['DP'];
        $persona=$_REQUEST['PE'];
        $telefono=$_REQUEST['TP'];
      ?>
      <?php require "contenido.php"; ?>
      <main class="main__container">
        <div>
            <h2 class="title_table">Actualizar Proveedores</h2>
        </div>
        <div style="background-color: white;">
          <form action="http://192.168.213.129/app/models/admin/proveedores/actualizarprov2.php" method="post">
          	<label>ID Proveedor:</label><br>
            <input type="text" name="id" value="<?php echo $id;?>" readonly='readonly'><br><br>
            <label>Nombre Proveedor:</label><br>
            <input type="text" name="newname" value="<?php echo $nombre;?>"> <br><br>
            <label>Direccion Proveedor:</label> <br>
            <input type="text" name="newdireccion" value="<?php echo $direccion;?>"> <br><br>
            <label>Persona Encargada:</label> <br>
            <input type="text" name="newpersona" value="<?php echo $persona;?>"> <br><br>
            <label>Telefono Proveedor:</label> <br>
            <input type="text" name="newtelefono" value="<?php echo $telefono?>"><br><br>
            <input type="submit" value="Actualizar">
          </form>
        </div>
      </main>
      <?php require "footer.php"; ?>
  <script src="<?= constant('URL') ?>public/js/app.js" type="module"></script>
  <script src="<?= constant('URL') ?>public/js/sidebarDashboard.js"></script>
  </body>
</html>