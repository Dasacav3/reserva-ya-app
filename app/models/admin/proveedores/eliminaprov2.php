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
	try {
		$query = $pdo->prepare("SELECT * FROM proveedor");
		$query->execute();
	} catch (Exception $e) {
		echo "Conexion Fallida: " . $e->getMessage();
	}
	if ($result = $query->fetchAll(PDO::FETCH_ASSOC)) {
		try {
			$query = $pdo->prepare("DELETE FROM PROVEEDOR WHERE ID_PROVEEDOR = :id");
			$query->bindParam(":id", $_REQUEST['id']);
			$query->execute();
		} catch (Exception $e) {
			echo "Conexion Fallida: " . $e->getMessage();
			echo "<script>alert('ELIMINAR INSUMOS PRIMERO');
				window.history.go(-1);</script>";
		}
		echo "<script>alert('Se elimino correctamente');</script>";
	?>
		<script>
			top.location.href = "http://192.168.213.129/admin/proveedores";
		</script>
	<?php
	} else {
		echo "<script>alert('Informacion incorrecta');
			window.history.go(-1)</script>";
	}
	?>
</body>

</html>