<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>php</title>
</head>
<body>
	<?php
	include('../../../controller/database.php');
 $query = "INSERT INTO PROVEEDOR (NOMBRE_PROVEEDOR,DIRECCION_PROVEEDOR,PERSONA_ENCARGADA,TELEFONO_PROVEEDOR) VALUES ('$_REQUEST[NOMBRE_PROVEEDOR]','$_REQUEST[DIRECCION_PROVEEDOR]','$_REQUEST[PERSONA_ENCARGADA]',$_REQUEST[TELEFONO_PROVEEDOR])";	
 	echo "<script>alert('Se agrego correctamente');</script>";

	$result = $conn -> query($query);

	if (!$result) die ("Falla al acceder a la base de datos");
?>

	<script>
         top.location.href="http://localhost/reservaya-mvc/app/views/admin/dashboard.php";
      </script>

<?php
	$conn -> close();
?>
</body>
</html>