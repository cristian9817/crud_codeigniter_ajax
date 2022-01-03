<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Roles</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<body class="p-3">
	<h3>Rol </h3>

	
	<a href="<?= base_url('form/agregar/rol')?>" class="btn btn-success mb-3">Agregar</a>
	<a href="<?= base_url('listar/per')?>" class="btn btn-info mb-3">Personajes</a>
	<a href="<?= base_url('peticion')?>" class="btn btn-warning mb-3">Peticion</a>
	
	<div>
		<form >
			<input id="buscar"type="text" name="buscar"> <input type="button" id="find"value="buscar" class = "btn btn-dark">
		<table id="table"class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>ROL</th>
					<th>ACCIONES</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($rol as $key => $value): ?>
				<tr id="findRol">
					<td><?php echo $value->id?></td>
					<td><?php echo $value->rol?></td>
					<td>
						<a href="<?php echo base_url('form/edit/rol/').$value->id;?>" class="btn btn-warning">Editar</a>
						<a href="<?php echo base_url('eliminar/rol/').$value->id;?>" class="btn btn-danger">Eliminar</a>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</form>
	</div>

</body>
<script>
    $("#find").click(function(){
        var buscar = document.getElementById('buscar').value;
        
        var ruta = "buscar="+buscar;
        
        $.ajax({
            url:'<?=base_url('buscar/rol')?>',
            type:'POST',
            data: ruta,
            dataType: "json"
        })
        .done(function(response){
            console.log(response);
            //alert(response.message);
            $('#findRol').html('<td>'+response.data.rol.id+ '</td>');
								('<td>'+response.data.rol.rol+'</td>');
								('<td> <a href= class=btn btn-warning>Editar</a>');
								('<a href=class="btn btn-danger">Eliminar</a> ');
								('</td>');
        })
        .fail(function(){

        })
        .always(function(){

        })
    });
</script>
</html>
