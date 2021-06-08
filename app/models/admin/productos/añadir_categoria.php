<?php
	include ("../../../controller/database.php");
	if (isset($_POST['NOMBRE_CATEGORIA_PRODUCTO'])) {
		$NOMBRE_CATEGORIA_PRODUCTO=$_POST['NOMBRE_CATEGORIA_PRODUCTO'];
	}
		else{
				echo "No llego el dato";
		}
		$insertar = $pdo->prepare("INSERT INTO categoria_producto(NOMBRE_CATEGORIA_PRODUCTO)VALUES ('$NOMBRE_CATEGORIA_PRODUCTO')");
		$insertar->execute();

			if ($insertar) {
			 	header("location: http://localhost/reservaya-mvc/admin/productos");
			 } else{
			 	echo "No se inserto";
			 }
			 $pdo=null;