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


	try{
		$query=$pdo->prepare("SELECT * FROM proveedor");
		$query->execute();
	}catch(Exception $e){
		echo "Conexion Fallida: " . $e->getMessage();
	}

	if ($result = $query->fetchAll(PDO::FETCH_ASSOC)) {
		try{
			$query=$pdo->prepare("UPDATE proveedor SET NOMBRE_PROVEEDOR='$_REQUEST[newname]',DIRECCION_PROVEEDOR='$_REQUEST[newdireccion]',PERSONA_ENCARGADA='$_REQUEST[newpersona]',TELEFONO_PROVEEDOR=$_REQUEST[newtelefono] WHERE ID_PROVEEDOR=$_REQUEST[id]");
			$query->execute();
			echo "<script>alert('Se actualizo correctamente');</script>";
		}catch(Exception $e){
			echo "Conexion Fallida: " . $e->getMessage();
		}
	?>
      <script>
			top.location.href = "http://localhost/reservaya-mvc/admin/proveedores";
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