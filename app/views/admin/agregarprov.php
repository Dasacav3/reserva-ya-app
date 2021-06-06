<!DOCTYPE html>
<html lang="es">

<head>
  <?php require "head.php"; ?>
  <title>Agregar proveedores</title>
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


<body id="body">
  <?php require "contenido.php"; include ("app/controller/database.php");?>
  <main class="main__container">
    <div>
      <h2 class="title_table">Agregar Proveedores</h2>
    </div>
    <div style="background-color: white;">
      <form action="http://localhost/reservaya-mvc/app/models/admin/proveedores/aggprov.php" method="post">
        <label>Nombre Proveedor:</label><br>
        <input type="text" name="NOMBRE_PROVEEDOR"> <br><br>
        <label>Direccion Proveedor:</label> <br>
        <input type="text" name="DIRECCION_PROVEEDOR"> <br><br>
        <label>Persona Encargada:</label> <br>
        <input type="text" name="PERSONA_ENCARGADA"> <br><br>
        <label>Telefono Proveedor:</label> <br>
        <input type="text" name="TELEFONO_PROVEEDOR"><br><br>
        <input type="submit" value="Agregar">
      </form>
    </div>
  </main>
  <?php require "footer.php"; ?>
  <script src="<?= constant('URL') ?>public/js/app.js" type="module"></script>
  <script src="<?= constant('URL') ?>public/js/sidebarDashboard.js"></script>
  <script src="<?= constant('URL') ?>public/js/informacion.js"></script>
</body>