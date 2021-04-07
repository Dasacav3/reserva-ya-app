<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>actualiza</title>
</head>
<body>
	<?php
	include('../../../controller/database.php');
$registros = mysqli_query($conn, "SELECT * FROM proveedor");
		if ($reg = mysqli_fetch_array($registros)) {
			mysqli_query($conn, "UPDATE proveedor SET NOMBRE_PROVEEDOR='$_REQUEST[newname]',DIRECCION_PROVEEDOR='$_REQUEST[newdireccion]',PERSONA_ENCARGADA='$_REQUEST[newpersona]',TELEFONO_PROVEEDOR=$_REQUEST[newtelefono] WHERE ID_PROVEEDOR=$_REQUEST[id]") or die ("Problemas en el SELECT" . mysqli_error($conn));
			echo "<script>alert('Se actualizo correctamente');</script>";
			?>
      <script>
         top.location.href="http://localhost/reservaya-mvc/app/views/admin/dashboard.php";
      </script>
  <?php
		}
		else{
			echo "<script>alert('Informacion incorrecta');
			window.history.go(-1)</script>";
		}
	?>
</body>
</html>