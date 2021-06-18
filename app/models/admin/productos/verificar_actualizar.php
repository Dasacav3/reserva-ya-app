<?php
include ("../../../controller/database.php");
if (isset($_POST['ID_CATEGORIA_PRODUCTO'])) {
		$ID_CATEGORIA_PRODUCTO=$_POST['ID_CATEGORIA_PRODUCTO'];
	}
	
	$ID_PRODUCTO= $_POST['ID_PRODUCTO'];
  	$NOMBRE_PRODUCTO = $_POST['NOMBRE_PRODUCTO'];
	$DESCRIPCION_PRODUCTO = $_POST['DESCRIPCION_PRODUCTO'];
	$CANTIDAD_PRODUCTO = $_POST['CANTIDAD_PRODUCTO'];
	$VALOR_PRODUCTO = $_POST['VALOR_PRODUCTO'];
	var_dump($NOMBRE_PRODUCTO);
	var_dump($ID_PRODUCTO);
	var_dump($ID_CATEGORIA_PRODUCTO);
	var_dump($DESCRIPCION_PRODUCTO);
	var_dump($CANTIDAD_PRODUCTO);
	var_dump($VALOR_PRODUCTO);
	if ($_FILES["IMAGEN_PRODUCTO"]) {
            $nombre_base = basename($_FILES["IMAGEN_PRODUCTO"]["name"]);
            $nombre_final = date("m-d-y"). "-" . date("h-i-s"). "-" . $nombre_base;
            $ruta = "../../../../public/products_img/" . $nombre_final;
            $url = "http://34.67.243.191/public/products_img/" . $nombre_final;
            $subirimagen = move_uploaded_file($_FILES["IMAGEN_PRODUCTO"]["tmp_name"], $ruta);
		var_dump($url);
	}

	
            $queryProducto = $pdo->prepare("UPDATE producto SET ID_CATEGORIA_PRODUCTO = :ID_CATEGORIA_PRODUCTO, NOMBRE_PRODUCTO = :NOMBRE_PRODUCTO, DESCRIPCION_PRODUCTO = :DESCRIPCION_PRODUCTO, CANTIDAD_PRODUCTO = :CANTIDAD_PRODUCTO, VALOR_PRODUCTO = :VALOR_PRODUCTO WHERE ID_PRODUCTO = :ID_PRODUCTO");
            $queryProducto->bindParam(":ID_CATEGORIA_PRODUCTO",$ID_CATEGORIA_PRODUCTO);
            $queryProducto->bindParam(":NOMBRE_PRODUCTO",$NOMBRE_PRODUCTO);
            $queryProducto->bindParam(":DESCRIPCION_PRODUCTO",$DESCRIPCION_PRODUCTO);
            $queryProducto->bindParam(":CANTIDAD_PRODUCTO",$CANTIDAD_PRODUCTO);
            $queryProducto->bindParam(":VALOR_PRODUCTO",$VALOR_PRODUCTO);
            $queryProducto->bindParam(":ID_PRODUCTO",$ID_PRODUCTO);
            $queryProducto->execute();        
            if (empty($_POST['IMAGEN_PRODUCTO'])) {
            	echo "llego";
				$queryimagen = $pdo->prepare("UPDATE producto SET IMAGEN_PRODUCTO = :url WHERE ID_PRODUCTO = :ID_PRODUCTO");
            	$queryimagen->bindParam(':url',$url);
            	$queryimagen->bindParam(":ID_PRODUCTO",$ID_PRODUCTO);
            	$queryimagen->execute();
            	echo "valor no nullo";
            }
            else{
            	echo "valor nulo";
            }
             if ($queryProducto) {
           header("location:http://34.67.243.191/admin/productos"); 
      }
      else{
            echo "No se pudo actualizar la categoria";
             header("location:http://34.67.243.191/admin/productos"); 
      }
    
$pdo=null;
?> 