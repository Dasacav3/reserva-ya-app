<html lang="en"> 
<head>
	<meta charset="UTF-8"> 
	<title>Document</title>
	<link rel="stylesheet" href="<?= constant('URL') ?>public/css/add.css">
	<link rel="stylesheet" href="<?= constant('URL') ?>public/css/normalize.css">
</head> 
<body> 
	<?php
		include ("app/controller/database.php");  
		$query = $pdo->prepare("SELECT * FROM categoria_producto");	
		$query->execute(); 
	?>
	<div class="container">
		<form  action="http://192.168.213.129/app/models/admin/productos/verificar_agregar_productos.php" method="post"  class="contact" id="contact"  enctype="multipart/form-data" autocomplete="OFf">
			<br>
			<label for="NOMBRE_PRODUCTO">Nombre producto</label>
			<br>
			<input type="text" maxlength="70" required="" class="NOMBRE_CATEGORIA_PRODUCTO" name="NOMBRE_PRODUCTO" id="NOMBRE_PRODUCTO">
			<br>
			<label for="DESCRIPCION_PRODUCTO">Descripción del producto</label>
			<br>
			<textarea name="DESCRIPCION_PRODUCTO" id="DESCRIPCION_PRODUCTO" class="DESCRIPCION_PRODUCTO" cols="30" rows="10"></textarea>
			<br>
			<label for="CANTIDAD_PRODUCTO">Cantidad producto</label>
			<br>
			<input type="number" min="1" id="CANTIDAD_PRODUCTO" name="CANTIDAD_PRODUCTO"
			class="CANTIDAD_PRODUCTO">
			<br>
			<label for="VALOR_PRODUCTO">Valor producto</label>
			<br>
			<input type="number" min="1" name="VALOR_PRODUCTO" id="VALOR_PRODUCTO"
			class="VALOR_PRODUCTO">
			<br>
			<label for="ID_CATEGORIA_PRODUCTO">Categoria</label>
			<br>
			<select name="ID_CATEGORIA_PRODUCTO" class="ID_CATEGORIA_PRODUCTO" required="">
				<option value="">seleccionar</option>		
				<?php 
					$result = $query->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result as $resultado) {
				 ?>
				 <option value="<?php echo $resultado['ID_CATEGORIA_PRODUCTO']?>"><?php echo $resultado['NOMBRE_CATEGORIA_PRODUCTO']?></option>
				<?php 
					}
				?>
			</select>
			<label for="IMAGEN_PRODUCTO	">Imagen producto</label>
			<br>
			<input type="file" name="IMAGEN_PRODUCTO" id="IMAGEN_PRODUCTO	"
			class="IMAGEN_PRODUCTO" accept="image/png, .jpeg, .jpg, image/gif">
			<br>
			<input type="submit" value="Enviar" id="submit">
		</form>
	</div>
</body>
</html>
