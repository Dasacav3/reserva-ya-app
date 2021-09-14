<?php
include("../../../controller/database.php");
$ID_PRODUCTO = $_GET["ID_PRODUCTO"];
$eliminar  = $pdo->prepare("DELETE FROM producto WHERE ID_PRODUCTO='$ID_PRODUCTO'");
$eliminar->execute();

if (!$eliminar) {
	echo 'Error al eliminar';
} else {
	echo "<script>window.history.go(-1)</script>";
}

$pdo = null;
