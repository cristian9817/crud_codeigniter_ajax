<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Peticion</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <!--<script>
        $(function(){
            $("#consultar").click(function(){
                var url="Peticion.php/peticion";
                $.ajax({
                    type:"POST",
                    url:url,
                    data: $("#formulario").serialize(),
                    success: function(data){
                        $("#result").html(data); 
                    }
                });
                return false;
            });
        });
    </script>-->
<body class="p-3">
    <h3>peticion Ajax</h3>
	<!--<form method='POST' name='formulario'>
        <label>Nombre</label>
        <input type="text" name="nombre">
        <input type="submit" value="consultar" name="consultar" class="btn btn-success">
    </form>
    <div id="result"></div>-->
    
    <form>
        <label >Nombre</label>
        <br>
        <input type="text" id="nombre" class="form-control">
        <br>
        <label>Apellido</label>
        <br>
        <input type="text" id="apellido" class="form-control">
        <br>
        <label>Edad</label>
        <br>
        <input type="text" id="edad" class="form-control">
        <br>
        <br>
        <div class="mb-3">
            <a href="<?= base_url('volver')?>"class="btn btn-danger">cancelar</a>
        <button type="button" id="enviar" class="btn btn-success">Enviar</button>
        </div>
        <br>
    </form>
    
    <br>
    <div id="respuesta"></div>

</body>
<script>
    $("#enviar").click(function(){
        var nombre = document.getElementById('nombre').value;
        var apellido = document.getElementById('apellido').value;
        var edad = document.getElementById('edad').value;
        var ruta = "nom= "+nombre+ " &ape= "+apellido+" &ed= "+edad;
        console.log(nombre);
        $.ajax({
            url:'Peticion/peticion',
            type:'POST',
            data: ruta,
            dataType: "json"
        })
        .done(function(response){
            console.log(response);
            alert(response.message);
            $('#respuesta').html(response.name+' '+response.lastname);
        })
        .fail(function(){

        })
        .always(function(){

        })
    });
</script>
</html>
