<?php
include ("../../../controller/database.php");
if (isset($_POST['ID_CATEGORIA_PRODUCTO'])) {
		$ID_CATEGORIA_PRODUCTO= $_POST['ID_CATEGORIA_PRODUCTO'];
	}else{
            echo "no se recibio una categoria para editar";
      }
	
	$NOMBRE_CATEGORIA_PRODUCTO= $_POST['NOMBRE_CATEGORIA_PRODUCTO'];

	var_dump($ID_CATEGORIA_PRODUCTO);
	var_dump($NOMBRE_CATEGORIA_PRODUCTO);
	
            $query_categoria = $pdo->prepare("UPDATE categoria_producto SET NOMBRE_CATEGORIA_PRODUCTO = :NOMBRE_CATEGORIA_PRODUCTO WHERE ID_CATEGORIA_PRODUCTO = :ID_CATEGORIA_PRODUCTO");
            $query_categoria->bindParam(":ID_CATEGORIA_PRODUCTO",$ID_CATEGORIA_PRODUCTO);
            $query_categoria->bindParam(":NOMBRE_CATEGORIA_PRODUCTO",$NOMBRE_CATEGORIA_PRODUCTO);
            $query_categoria->execute();
      if ($query_categoria) {
           header("location:http://34.67.243.191/admin/productos"); 
      }
      else{
            echo "No se pudo actualizar la categoria";
             header("location:http://34.67.243.191/admin/productos"); 
      }
    
$pdo=null;
