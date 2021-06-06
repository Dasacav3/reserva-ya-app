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
	try{
		$query=$pdo->prepare("INSERT INTO PROVEEDOR (NOMBRE_PROVEEDOR,DIRECCION_PROVEEDOR,PERSONA_ENCARGADA,TELEFONO_PROVEEDOR) VALUES (:nombre,:direccion,:persona,:cel)");
		$query->bindParam(":nombre",$_REQUEST['NOMBRE_PROVEEDOR']);
		$query->bindParam(":direccion",$_REQUEST['DIRECCION_PROVEEDOR']);
		$query->bindParam(":persona",$_REQUEST['PERSONA_ENCARGADA']);
		$query->bindParam(":cel",$_REQUEST['TELEFONO_PROVEEDOR']);
		$query->execute();
	}catch(Exception $e){
		echo "Conexion Fallida: " . $e->getMessage();
	}	
 	echo "<script>alert('Se agrego correctamente');</script>";

?>

	<script>
         top.location.href="http://localhost/reservaya-mvc/admin/proveedores";
      </script>

<?php
	$pdo=null;
?>
</body>
</html>