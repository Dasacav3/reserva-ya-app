<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Elimina</title>
</head>
<body>
	<?php
	include('../../../controller/database.php');
$registros = mysqli_query($conn, "SELECT * FROM proveedor");
		if ($reg = mysqli_fetch_array($registros)) {
			mysqli_query($conn, "DELETE FROM PROVEEDOR WHERE ID_PROVEEDOR=$_REQUEST[id]") 
			or die ("<script>alert('ELIMINAR INSUMOS PRIMERO');
			window.history.go(-1)</script>" . mysqli_error($conn));
			echo "<script>alert('Se elimino correctamente');</script>";
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