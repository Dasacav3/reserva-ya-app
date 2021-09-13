<?php 
	include ("../../../controller/database.php");
	if ($conn -> connect_error) {
	die("Error no se puede conectar al servidor" . $conn-> connect_error);
	}
	$ID_PRODUCTO = $_GET["ID_PRODUCTO"];
	$eliminar  = $pdo->prepare("DELETE FROM producto WHERE ID_PRODUCTO='$ID_PRODUCTO'");

	$eliminar->execute();

	if (!$eliminar) {
		echo 'Error al eliminar';
	}else{
		header("location: " . $_ENV['URL'] . "admin/productos");	
	}

	mysqli_close($conn);
