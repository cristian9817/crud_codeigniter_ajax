<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<body>
	<div class="card text-white bg-dark mb-3" sytle="max-width: 18rem;">
	<div class="card-header">Login</div>
	<div class="card-body">
	<form method="POST" action="<?= base_url('login')?>">
	<div class="mb-3">
	<label>Usuario</label>
	<input type="text" name="usuario">
	</div>
	<div class="mb-3">
	<label>Contraseña</label>
	<input type="password" name="contraseña">
	</div>
	<div>
	<input type="submit" value="ingresar" class="btn btn-success">
	</div>
	</form>
	</div>
	</div>
</body>
</html>
