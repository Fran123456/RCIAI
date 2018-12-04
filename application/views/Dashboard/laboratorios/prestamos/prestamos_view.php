<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->

	
   
	

	
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->
	<!--Creamos el formulario para los prestamos-->

	<form id="prestamo">
	  <div class="form-row">
	    <div class="form-group col-md-3">
	      <label for="fecha_retiro">Fecha de retiro de el equipo</label>
	      <input type="date" class="form-control" id="fecha_retiro" name="fecha_retiro" placeholder="Email">
	    </div>
	    <div class="form-group col-md-3">
	      <label for="fecha_prestamo">Fecha que se da el prestamo</label>
	      <input type="date" class="form-control" id="fecha_prestamo" name="fecha_prestamo" >
	    </div>
	    <div class="form-group col-md-3">
	      <label for="encargado">Encargado del equipo</label>
	      <input type="text" class="form-control" id="encargado" name="encargado" placeholder="Digite el nombre del encargado del equipo">
	    </div>
	    <div class="form-group col-md-3">
	      <label for="tecnico">Técnico</label>
	      <input type="text" class="form-control" id="tecnico" name="tecnico" placeholder="Digite el nombre del tecnico">
	    </div>
	  </div>

	  <div class="form-row">
		<div class="form-group col-md-3">
		    <label>Tipo de prestamo</label>
		    <select name="tipo_prestamo" id="tipo_prestamo" class="form-control">
		    	<option value=1>PC Completa</option>
		    	<option value=2>Periferico</option>
		    </select>
		</div>
		<div class="form-group col-md-3">
			<label for="">Equipo al que se le hara el prestamo</label>
			<input type="text" class="form-control" id="codigo" name="codigo" placeholder="Digite el código del equipo">
		</div>
		<div class="form-group col-md-6">
		    <label for="desc_prestamo">Porque solicita el prestamo</label>
		    <textarea name="desc_prestamo" id="desc_prestamo" class="form-control" cols="1" rows="1" placeholder="Descripción del porque solicitad el cambio"></textarea>
		</div>
		
	  </div>

	  <div class="form-row">
	  	<div class="form-group col-md-3">
		    <label>De donde se prestara el equipo</label>
		    <select name="laboratorios" id="laboratorios" class="form-control">
		    	<option value="" selected="">Seleccione un laboratorio</option>
		    	<option value=LAB1>laboratorio 1</option>
		    	<option value=LAB2>laboratorio 2</option>
		    	<option value=LAB3>laboratorio 3</option>
		    	<option value=LAB4>laboratorio 4</option>
		    	<option value=LAB5>laboratorio 5</option>
		    	<option value=HW>laboratorio de hardware</option>
		    	<option value=RED>laboratorio de red</option>
		    </select>
		</div>

		<div class="form-group col-md-3">
	  		<label>Seleccione equipo a prestar</label>
	  		<select name="equipo" id="equipo" class="form-control">
	  			
	  		</select>
	  	</div>

		<div id="periferico" class="form-group col-md-3">
	  		
	  	</div>

	  </div>

	  <div class="form-row">
	  	<div class="form-group col-md-12">
			<button class="btn btn-info" id="verificar1" type="button" onclick="verificar_codigo()">validar código</button>
		</div>
	  </div>

	  

	  <!--elementos que van a aparecer al presionar validar código -->
	  <div id="oculto">
	  	<div class="form-row">
		  	<div class="form-group col-md-6">
			    <label for="caract_equipo_f">Caracteristicas del equipo que queda en función</label>
			    <textarea name="caract_equipo_f" id="caract_equipo_f" class="form-control" cols="1" rows="1" placeholder="Nombre, Marca, Serial, etc"></textarea>
			</div>
		</div>

		<div class="form-row">
		  	<div class="form-group col-md-6">
			    <label for="caract_equipo_prestamo">Caracteristicas de equipo que recibe prestamo</label>
			    <textarea name="caract_equipo_prestamo" id="caract_equipo_prestamo" class="form-control" cols="1" rows="1" placeholder="Nombre, Marca, Serial, etc"></textarea>
			</div>
		</div>
	  </div>

	</form>




    <!--FIN CONTENIDO DE LA APLICACION-->

    <!--Script-->
    <script>
    	$(document).ready(function()
    	{
			//ocultamos el div

    		//función que quita color al escribir dentro del input
    		$('#codigo').keydown(function(){
    			$("#codigo").css("border-color","");
    		})

			$("#verificar1").prop("disabled", true);

			$('#codigo').change(function(){
				var valor = $(this).val();
				var eq = $('#equipo').val();
				console.log(eq);
				if((valor.length == 0) )
				{
					$("#verificar1").prop("disabled", true);
				}else{
					$("#verificar1").prop("disabled", false);

				}
			})


			$('#laboratorios').change(function(){
	    		//guardamos el select de equipos
	    		var equipos = $('#equipo');

	    		//guardamos el select de laboratorios
	    		var lab = $(this);

	    		if($(this).val() != '')
	    		{
	    			$.ajax({
	    				data: {lab: lab.val()},
	    				url: '<?php echo base_url()?>Movimientos_controller/obtener_equipo',
	    				type: 'POST',
	    				dataType: 'json',
	    				async: false,
	    				beforeSend: function()
	    				{
	    					equipos.prop('disabled', true);
	    				},
	    				success: function(r){
	    					if(r!=false)
	    					{
	    						lab.prop('disabled', false);
		    					//limpiamos el select de equipo
		    					equipos.find('option').remove();

		    					$(r).each(function(i,v){ //indice, valor
		    						equipos.append('<option value="' + v.identificador_lab + '">' + v.identificador_lab + '</option>');
		    					})
		    					equipos.prop('disabled',false);



	    					}else{
	    						equipos.find('option').remove();
	    						equipos.prop('disabled', true);		
	    					}
	    				},
	    				error: function()
	    				{
	    					alert('Ocurrio un error en el servidor');

	    				}
	    			});
	    		}
	    		else
	    		{
	    			equipos.find('option').remove();
	    			equipos.prop('disabled',true);
	    		}

	    	});
			
		})


    	


		function verificar_codigo()
		{
			//vamos a verificar el codigo digitado, si el codigo existe en el sistema
			var codigo = $('#codigo').val();
			var lab = $('#laboratorios').val();

			//creamos un ajax el cual le mandaremos el codigo y verificara que si existe
			$.ajax({
				type: 'post',
				async: false,
				url: '<?php echo base_url()?>Movimientos_controller/verificar_codigo',
				data: 'codigo='+codigo,
				dataType: 'json',
				success: function(valor){
					//hacemos un switch para evaluar el valor retornado
					switch(valor)
					{
						case 0:
							
							swal({
							  position: 'top-end',
							  type: 'warning',
							  title: 'El código del equipo no existe',
							  showConfirmButton: false,
							  timer: 1400
							})
							$("#codigo").val('');//limpiamos el input
							$("#codigo").css("border-color","#a94442");//pone el border del input en color rojo
							$("#codigo").focus();//ponemos el foco en el input del código

							break;
						case 1:
						case 2:
							swal({
							  position: 'top-end',
							  type: 'success',
							  title: 'Equipo encontrado',
							  showConfirmButton: false,
							  timer: 1400
							})
							$("#codigo").css("border-color","#66ff99");//pone el border del input en color rojo

							var tipo = $('#tipo_prestamo option:selected').val();
							if(tipo == 2)
							{
								$('#periferico').append('<label>Perifericos</label><select name="perifericos" id="perifericos" class="form-control"><option value=1 >Teclado</option><option value=2>Mouse</option></select>');
							}
			
							break;
					}
				}
			})

			

		}
    </script>

    <!--Script-->

    
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
