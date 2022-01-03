<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Agregar</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<body class="p-3">
	<h3>Agregar</h3>


	<div class="mb-2">
		<form method="POST" action="<?= base_url('agregar/per')?>">
	<div class="mb-3">
		<label>Dios</label>
		<input type="text" name="dios">
	</div>
	<div class="mb-3">
		<label>Maestria</label>
		<input type="text" name="maestria">
	</div>
	<div class="mb-3">
		<label>Panteon</label>
		<input type="text" name="panteon">
	</div>
	<div class="mb-3">
		<label>Rol</label>
		<select name="rolidfk">
			<?php foreach($roles as $key => $value):?>
			<option value="<?php echo $value->id;?>"><?php echo $value->rol?></option>
			<?php endforeach ?>
		</select>
	</div>
	
	<div class="mb-3">
		<a href="<?= base_url('volverper')?>" class="btn btn-danger">cancelar</a>
		<input type="submit" value="agregar" class="btn btn-success">
	</div>
	</form>
	</div>
</body>
</html>
