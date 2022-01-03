<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Editar</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<body class="p-3">
	<h3>Editar</h3>

	<div>
		<form method="POST" action="<?php echo base_url('edit/per/');?><?php echo $datos[0]['id'];?>">
	<div class="mb-3">
		<label>Dios</label>
		<input type="text" name="dios" value="<?php echo $datos[0]['dios']; ?>">
	</div>
	<div class="mb-3">
		<label>Maestria</label>
		<input type="text" name="maestria" value="<?php echo $datos[0]['maestria']; ?>">
	</div>
	<div class="mb-3">
		<label>Panteon</label>
		<input type="text" name="panteon" value="<?php echo $datos[0]['panteon']; ?>">
	</div>
	<div class="mb-3">
		<label>Rol</label>
		<select name="rolidfk" value="<?php echo $datos[0]['rol']?>" >
		<?php foreach($roles as $key => $value):?>
			<option value="<?php echo $value->id;?>"><?php echo $value->rol?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="mb-3">
		<a href="<?= base_url('volverper')?>" class="btn btn-danger">cancelar</a>
		<input type="submit" value="actualizar" class="btn btn-success">
	</div>
	</form>
	</div>
</body>
</html>
