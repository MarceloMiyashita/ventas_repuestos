<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Codigo de Barras</title>
	<style>
		html, body{
			padding: 5px 0 0 0;
			margin: 0;
			text-align: center;
			font-size: 12px;
			font-weight: bold;
		}
	

	</style>
</head>
<body>
	<div><?php echo $nombre_producto ?></div>
	<div><?php echo $localizacion ?></div>
	<div>
		<img src="./assets/barcode/<?php echo $codigo_barras ?>.png" alt="" >
	</div>

	
	
	
</body>
</html>
