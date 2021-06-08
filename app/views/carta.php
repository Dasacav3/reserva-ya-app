<?php 
  include ("app/controller/database.php"); 
  try{
     $sql_categorias = $pdo->prepare("SELECT * FROM categoria_producto");
     $sql_categorias->execute(); 
     if(isset($_GET['ID_CATEGORIA_PRODUCTO'])){
     	$ID_CATEGORIA_PRODUCTO=$_GET['ID_CATEGORIA_PRODUCTO'];
     	$sql_productos = $pdo->prepare("SELECT NOMBRE_PRODUCTO,DESCRIPCION_PRODUCTO,CANTIDAD_PRODUCTO,VALOR_PRODUCTO,IMAGEN_PRODUCTO  FROM producto WHERE ID_CATEGORIA_PRODUCTO=$ID_CATEGORIA_PRODUCTO") ;	
     }else{ 
     	$sql_productos = $pdo->prepare("SELECT producto.ID_PRODUCTO,producto.NOMBRE_PRODUCTO,producto.DESCRIPCION_PRODUCTO,  producto.CANTIDAD_PRODUCTO,  producto.VALOR_PRODUCTO, 
     producto.IMAGEN_PRODUCTO,categoria_producto.NOMBRE_CATEGORIA_PRODUCTO
     FROM producto
     INNER JOIN categoria_producto ON producto.ID_CATEGORIA_PRODUCTO = categoria_producto.ID_CATEGORIA_PRODUCTO
     ORDER BY categoria_producto.NOMBRE_CATEGORIA_PRODUCTO  ASC");
     }
     $sql_productos->execute();
 } 
  catch (Exception $e) { 
            echo "Conexion fallida " . $e->getMessage();
            die();
        }

 ?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Carta</title>
    <link rel="shortcut icon" href="<?= constant('URL') ?>public/img/favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="<?= constant('URL') ?>public/css/carta.css">
</head>
<body>
        <nav class="navegacion">
            <ul class="menu">
                <li><a href="<?= constant('URL') ?>">Inicio</a></li>
                <li><a href="<?= constant('URL') ?>login">Iniciar sesión</a></li>
                <li><a href="#">Productos</a>
                <ul class="submenu">
                <?php 
            while($fila=$sql_categorias->fetch(PDO::FETCH_NUM)){
                        $ID_CATEGORIA_PRODUCTO=$fila[0];
                        $CATEGORIA=$fila[1];

         ?>

                        <li><a class="list_product" href="carta?ID_CATEGORIA_PRODUCTO=<?php echo $ID_CATEGORIA_PRODUCTO ?>"><?php echo$CATEGORIA ; ?></a></li> 

         <?php 
            }
          ?>
          <hr>
         <li><a class="list" href="<?= constant('URL') ?>carta">Todos los productos</a></li>
         <hr>
    </ul>
    </ul>
        </nav>
	<h1 class="titulo">Menu</h1>
    <br>
    <div class="container">
		 <?php
                $resultado = $sql_productos->fetchAll(PDO::FETCH_ASSOC);

                foreach ($resultado as $row) {
                ?>
                <div class="card">
                <br>
                <p><?php echo '<img src="'.$row["IMAGEN_PRODUCTO"].'">'  ?></p>
                <br>
                <p><?php echo $row["NOMBRE_PRODUCTO"] ?></p>
                <br>
                <p><?php echo $row["DESCRIPCION_PRODUCTO"] ?></p>
                <br>
                <p>$<?php echo $row["VALOR_PRODUCTO"] ?></p>
                <br>
                </div>
              <?php
                     } ;
            ?>
    </div>
</body>
</html>