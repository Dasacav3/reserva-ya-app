<?php
include("../../../controller/database.php");
if (isset($_POST['ID_CATEGORIA_PRODUCTO'])) {
	$ID_CATEGORIA_PRODUCTO = $_POST['ID_CATEGORIA_PRODUCTO'];
} else {
	echo "No se recibe la categoria";
}
$NOMBRE_PRODUCTO = $_POST['NOMBRE_PRODUCTO'];
$DESCRIPCION_PRODUCTO = $_POST['DESCRIPCION_PRODUCTO'];
$CANTIDAD_PRODUCTO = $_POST['CANTIDAD_PRODUCTO'];
$VALOR_PRODUCTO = $_POST['VALOR_PRODUCTO'];
if ($_FILES["IMAGEN_PRODUCTO"]) {
	$nombre_base = basename($_FILES["IMAGEN_PRODUCTO"]["name"]);
	$nombre_final = date("m-d-y") . "-" . date("h-i-s") . "-" . $nombre_base;
	$ruta = "../../../../public/products_img/" . $nombre_final;
	$url = "http://localhost/reservaya-mvc/public/products_img/" . $nombre_final;
	$subirimagen = move_uploaded_file($_FILES["IMAGEN_PRODUCTO"]["tmp_name"], $ruta);
	if ($subirimagen) {
		$insertar = $pdo->prepare("INSERT INTO producto (ID_CATEGORIA_PRODUCTO,NOMBRE_PRODUCTO,DESCRIPCION_PRODUCTO,CANTIDAD_PRODUCTO,VALOR_PRODUCTO,IMAGEN_PRODUCTO) VALUES ($ID_CATEGORIA_PRODUCTO,'$NOMBRE_PRODUCTO','$DESCRIPCION_PRODUCTO',$CANTIDAD_PRODUCTO,$VALOR_PRODUCTO,'$url')");
		$insertar->execute();

		if ($insertar) {
			header("location:http://localhost/reservaya-mvc/admin/productos");
		} else {
			echo "No se inserto";
		}
		$pdo = null;
	}
}
