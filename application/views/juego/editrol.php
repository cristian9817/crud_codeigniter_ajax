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
		<form method="POST" action="<?php echo base_url('edit/rol/');?><?php echo $id;?>">
	<div class="mb-3">
		<label>Rol</label>
		<input type="text" name="rol" value="<?php echo $rol; ?>">
	</div>
	<div class="mb-3">
		<a href="<?= base_url('volver')?>"class="btn btn-danger">cancelar</a>
		</div >
	<div>
		<input type="submit" value="actualizar" class="btn btn-success" >
	</div>
	</form>
	</div>
</body>
</html>
