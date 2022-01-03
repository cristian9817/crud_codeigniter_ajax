
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Personajes</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<body class="p-3">
	<div class="container">
		<div class="row">
			<div class="col-5">
				<h3>Personajes</h3>
				<div class="mb-2">
		<form >
		<div class="mb-3">
		<label>ID</label>
		<input type="text" name="id" id="id">
	</div>
	<div class="mb-3">
		<label>Dios</label>
		<input type="text" name="dios" id="dios">
	</div>
	<div class="mb-3">
		<label>Maestria</label>
		<input type="text" name="maestria" id="maestria">
	</div>
	<div class="mb-3">
		<label>Panteon</label>
		<input type="text" name="panteon" id="panteon">
	</div>
	<div class="mb-3">
		<label>Rol</label>
		<select name="rolidfk" id="rolidfk">
			<?php //foreach($roles as $key => $value):?>
			<!--<option value="<?php //echo $value->id;?>"><?php //echo $value->rol?></option>-->
			<?php //endforeach ?>
			<option value="1">mago</option>
			<option value="2">Guerrero</option>
			<option value="11">Guardian</option>
		</select>
	</div>
	
	<div class="mb-3">
		<button type="button" id="cancelar" class="btn btn-danger">Cancelar</button>
		<button type="button" id="editar" class="btn btn-warning" onclick="update()">Editar</button>
		<button type="button" id="agregar" class="btn btn-success">Agregar</button>
	</div>
	</form>
	</div>
			</div>
				<div class="col-7">
					<a href="<?= base_url('volver')?>" class="btn btn-danger">atras</a>
					<!--<a href="" class="btn btn-success">Agregar</a>-->
					<div class="mb-3">
						<form >
						<input type="text" id="character" name="buscarper"> <input type="button" id="findCharacter" value="buscar" class="btn btn-dark">
					</div>
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>DIOS</th>
								<th>MAESTRIA</th>
								<th>PANTEON</th>
								<th>ROL</th>
								<th>ACCIONES</th>
							</tr>
						</thead>
						<tbody >
							<?php foreach($per as $key =>$value):?>
							<tr>
								<td ><?php echo $value->id;?></td>
								<td><?php echo $value->dios;?></td>
								<td><?php echo $value->maestria;?></td>
								<td><?php echo $value->panteon;?></td>
								<td><?php echo $value->rol;?></td>
								<td>
									<input type="button" class="btn btn-warning" onclick="seleccionar('<?php echo $value->id;?>')" value="seleccionar">
									<input type="button" class="btn btn-danger" onclick="borrar('<?php echo $value->id;?>')" value="eliminar">
								</td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				</form>
			</div>
		</div>
</body>
<script>
	$('#findCharacter').click(function(){
		var character = document.getElementById('character').value;

		var ruta = "character="+character;

		$.ajax({
			type:'POST',
			url: '<?= base_url('buscar/per')?>',
			data: ruta,
			dataType: 'json'
		})
		.done(function(response){
			console.log(response);
			
		})
		.fail(function(){

		})
		.always(function(){

		})
	});
	$('#agregar').click(function(){
		insert();
	});

	function insert(){
		var datos = new FormData();
		datos.append('dios',$('#dios').val());
		datos.append('maestria',$('#maestria').val());
		datos.append('panteon',$('#panteon').val());
		datos.append('rolidfk',$('#rolidfk').val());
		console.log(datos.get('dios'));
		console.log(datos.get('maestria'));
		console.log(datos.get('panteon'));
		$.ajax({
			type:'POST',
			url:'<?=base_url('Personaje/insert')?>',
			data: datos,
			processData:false,
			contentType:false,
			success: function(response){
				console.log(response);
			}
		})
	}

	function borrar(id){
		$.get('<?=base_url('Personaje/delete/')?>'+id,function(){

		});
	}

	function seleccionar(id){
		$.getJSON('<?=base_url('Personaje/get/')?>'+id, function(registros){
			console.log(registros);

			$('#id').val(registros.datos[0]['id']);
			$('#dios').val(registros.datos[0]['dios']);
			$('#maestria').val(registros.datos[0]['maestria']);
			$('#panteon').val(registros.datos[0]['panteon']);
			$('#rolidfk').val(registros.datos[0]['rol']);
		})
	}

	function update(){
		var datos = new FormData();

		datos.append('id',$('#id').val());
		datos.append('dios',$('#dios').val());
		datos.append('maestria',$('#maestria').val());
		datos.append('panteon',$('#panteon').val());
		datos.append('rolidfk',$('#rolidfk').val());
		$.ajax({
			type:'POST',
			url:'<?=base_url('Personaje/update')?>',
			data: datos,
			processData:false,
			contentType:false,
			success: function(response){
				console.log(response);
			}
		})
	}
	function getAll(){
		$('#data').empty();
		$.getJSON('<?=base_url('Personaje/index')?>',function(registros){
			/*var gods = [];
			$.each(data,function(llave, valor){
				if(llave>0){
					var template="<tr>";
						template="<td>"+valor.dios+"</td>";
						template="<td>"+valor.maestria+"</td>";
						template="<td>"+valor.panteon+"</td>";
						template="<td>"+valor.rolidfk+"</td>";
						template="<td> editar|borrar</td>";
						template+="</tr>";
						gods.push(template);
				}
			})
			$('#data').append(gods.join(""));*/
			console.log(registros);
		});
	}




	
	

</script>
</html>
