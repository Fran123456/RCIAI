<!DOCTYPE html>
<html>
<head>
	<title>Prestamos</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->

	
   
	

	
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->
	<!--Creamos el formulario para los prestamos-->

	<?php if($this->session->flashdata('exito')): ?>
			<script>
                swal(
				  'Éxito!',
				  'movimiento realizado!',
				  'success'
				)
            </script>
			<?php endif; ?>
	<?php if($this->session->flashdata('error1')): ?>
			<script>
                swal(
				  'Atención!',
				  'No se puede realizar prestamo con devolución de un CPU!',
				  'Warning'
				)
            </script>
			<?php endif; ?>
	<?php if($this->session->flashdata('error_pe')): ?>
			<script>
                swal(
				  'Atención!',
				  'la pc que recibe el prestamo, no tiene el periferico!',
				  'Warning'
				)
            </script>
			<?php endif; ?>

	<form id="Form_prestamo" method="post" action="<?php echo base_url()?>prestamo">
	  <div class="form-row">
	    <div class="form-group col-md-3">
	      <label for="fecha_retiro">Fecha de retiro de el equipo</label>
	      <input type="date" class="form-control" id="fecha_retiro" name="fecha_retiro"  placeholder="Email" required="">
	    </div>
	    <div class="form-group col-md-3">
	      <label for="fecha_prestamo">Fecha que se da el prestamo</label>
	      <input type="date" class="form-control" id="fecha_prestamo"  name="fecha_prestamo" required="" >
	    </div>
	    <div class="form-group col-md-3">
	      <label for="encargado">Encargado del equipo</label>
	      <input type="text" class="form-control" id="encargado" name="encargado"  placeholder="Digite el nombre del encargado del equipo" required="">
	    </div>
	    <div class="form-group col-md-3">
	      <label for="tecnico">Técnico</label>
	      <input type="text" class="form-control" id="tecnico" name="tecnico"  placeholder="Digite el nombre del tecnico" required="">
	    </div>
	  </div>

	  <input type="hidden" name="tipo_prestamo" id="tipo_prestamo" value="2">

	  <div class="form-row">
		<!--<div class="form-group col-md-3">
		    <label>Elemento a prestamo</label>-->

		    <!--<select name="tipo_prestamo" id="tipo_prestamo" class="form-control">
		    	<option value=1>PC Completa</option>
		    	<option value=2>Periferico</option>
		    </select>
		</div>-->
		<div class="form-group col-md-3">
			<label for="">Equipo al que se le hara el prestamo</label>
			<input type="text" class="form-control" id="codigo" name="codigo"  placeholder="Digite el código del equipo" required="">
		</div>
		<div class="form-group col-md-9">
		    <label for="desc_prestamo">Porque solicita el prestamo</label>
		    <textarea name="desc_prestamo" id="desc_prestamo" class="form-control"  cols="1" rows="1" placeholder="Descripción del porque solicitad el cambio" required=""></textarea>
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
	  		<label id="lp">Perifericos</label>
	  		<select name="perifericos" id="perifericos" class="form-control">
	  			<option value="TECLADO">Teclado</option>
	  			<option value="MOUSE">Mouse</option>
	  			<option value="MONITOR">Monitor</option>
	  			<option value="UPS">UPS</option>
	  			<option value="WEBCAM">Webcam</option>
	  			<!--<option value="CPU">CPU</option>-->
	  		</select>
	  	</div>

	  	<div id="verficarP" class="form-group col-md-3">
	  		<label id="lv" class="label-control">Verificar periferico a prestar</label> <br>
	  		<button class=" btn btn-info" id="verificar2" type="button" name="verificar2" onclick="verificarPeriferico()">Verificar</button>
	  	</div>

	  </div>

	  <div class="form row">
	  	
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

	  <div class="form-row">
	  	<div class="form-group col-md-4">
	  		<label for="">Tipo de prestamo</label>
	  		<select class="form-control" name="prestamo" id="prestamo">
	  			<option value="devolucion">Prestamo en devolución</option>
	  			<option value="sustitucion">Prestamo en sustitución</option>
	  		</select>
	  	</div>

	  	<!--este select se mostrara si se selecciona sustitucion-->
		<div id="estado_equipo" class="form-group col-md-4">
	  		<label for="">Estado del elemento que ira a bodega</label>
	  		<select class="form-control" name="estado" id="estado">
	  			<option value="Disponible">Disponible</option>
	  			<option value="Desechado">Desechado</option>
	  		</select>
	  	</div>

	  </div>

	  <div class="form-row">
	  	<div class="form-group col-md-12">
	  		<button id="movimiento" class="btn btn-success">Realizar movimiento</button>
	  	</div>
	  </div>

	</form>




    <!--FIN CONTENIDO DE LA APLICACION-->

    <!--Script-->
    <script>
    	$(document).ready(function()
    	{
			//ocultamos los div
			//$('#verficarP').hide();
			//$('#periferico').hide();
			$('#estado_equipo').hide();

    		//función que quita color al escribir dentro del input
    		

    		//vamos a verificar que el codigo del equipo a recibir el prestamo no sea igual al que hace el prestamo


/////////////////////////////////////////////////////////////////////////////////////////////////////////
    		/*$('#equipo').mousemove(function(){
    			var equipo = $(this).val();

    			if(equipo != null)
    			{
    				$('#movimiento').prop("disabled",false);
    			}else{
    				$('#movimiento').prop("disabled",true);
    			}
    		})*/
////////////////////////////////////////////////////////////////////////////////////////////////////////
    		$('#movimiento').prop("disabled",true);
			$("#verificar1").prop("disabled", true);
			$("#verificar2").prop("disabled",true);

			$('#codigo').change(function(){
				var valor = $(this).val();
				var eq = $('#equipo').val();
				console.log(eq);
				if((valor.length == 0) )
				{
					$("#verificar1").prop("disabled", true);
					$("#movimiento").prop("disabled",true);
				}else{
					$("#verificar1").prop("disabled", false);

				}
			})

			$('#prestamo').change(function(){
				var prestamo = $(this).val();
				if(prestamo == 'sustitucion')
				{
					$('#estado_equipo').show();
				}else{
					$('#estado_equipo').hide();
				}
			})

			$('#tipo_prestamo').change(function(){
				var tipo = $(this).val();
				if(tipo == 2)
				{
					$('#verficarP').show();
					$('#periferico').show();					
				}else{
					$('#verficarP').hide();
					$('#periferico').hide();
				}
			})


			$('#laboratorios').change(function(){
	    		//guardamos el select de equipos
	    		var equipos = $('#equipo');
	    		//boton para verificar si el periferico existe
	    		var ver2 = $('#verificar2');

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
	    					ver2.prop('disabled',true);
	    					$('#movimiento').prop("disabled",true);

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
		    					ver2.prop('disabled',false);
		    					ver2.addClass('btn btn-info');
		    					
		    					var ver_igual = verificar_codigos();//vamos a verificar si los codigos son distintos
		    					if(ver_igual==1)
		    					{
		    						//si son distintos los codigos
		    						$('#movimiento').prop("disabled",false);
		    					}
		    					else
		    					{
		    						//si los codigos son iguales
		    						$('#movimiento').prop("disabled",true);
		    					}

	    					}else{
	    						equipos.find('option').remove();
	    						equipos.prop('disabled', true);
	    						ver2.prop('disabled',true);
	    						$('#movimiento').prop("disabled",true);
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
	    			ver2.prop('disabled',true);
	    			$('#movimiento').prop("disabled",true);
	    		}

	    	});
			
		})

    	function verificar_codigos()
    	{
    		//vamos a verificar si los codigos de el equipo a prestar como el equipo que recibe el prestamo son iguales o no
    		var pc_codigo = $('#codigo').val();
    		var lab_codigo = $('#equipo').val();

    		if(pc_codigo == lab_codigo)
    		{
    			//si son iguales le mandamos un 0
    			return 0;
    		}
    		else
    		{
    			//si son distintos le mandamos un 1
    			return 1;
    		}
    	}

    	
    	function verificarPeriferico()
    	{
    		//esta función verifica si el periferico seleccionado de un equipo de laboratorio existe
    		var equipoLab = $('#equipo').val();
    		var periferico = $('#perifericos').val();
    		console.log(equipoLab);console.log(periferico);

    		//creamos una función ajax para verificar si ese periferico existe
    		$.ajax({
				type: 'post',
				async: false,
				url: '<?php echo base_url()?>Movimientos_controller/verificar_periferico',
				//data: 'equipoLab='+equipoLab,
				data: {equipoLab: equipoLab, periferico: periferico},
				dataType: 'json',
				success: function(valor){
					//hacemos un switch para evaluar el valor retornado
					if(valor==true){
						swal({
							  position: 'center',
							  type: 'success',
							  title: 'El equipo '+ equipoLab +' contiene el periferico '+periferico,
							  showConfirmButton: false,
							  timer: 2400
							})
					}else{
						swal({
							  position: 'center',
							  type: 'warning',
							  title: 'El equipo '+ equipoLab +' NO contiene el periferico '+periferico,
							  showConfirmButton: false,
							  timer: 2380
							})
					}
				},
				error: function()
				{
					alert('error');
				}
			})

    	}

    	$('#codigo').keyup(function(){
    		var codigo = $('#codigo').val();
    		console.log(codigo);
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
							
							//$("#codigo").val('');//limpiamos el input
							$("#codigo").css("border-color","#a94442");//pone el border del input en color rojo
							//$("#codigo").focus();//ponemos el foco en el input del código
							$("#movimiento").prop("disabled",true);

							break;
						case 1:
						case 2:
							
							var ver_igual = verificar_codigos();//vamos a verificar si los codigos son distintos

							$("#codigo").css("border-color","#66ff99");//pone el border del input en color verde

							if(ver_igual == 1){
								if($('#equipo').val() != null)
								{
									$("#movimiento").prop("disabled",false);//si son distintos habilitamos los el botón
								}
								else
								{
									$("#movimiento").prop("disabled",true);	//si son iguales bloqueamos el botón
								}
							} 

							
							

							break;
					}
				}
			})
    	});

		/*function verificar_codigo()
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
							  position: 'center',
							  type: 'warning',
							  title: 'El código del equipo no existe',
							  showConfirmButton: false,
							  timer: 1400
							})
							$("#codigo").val('');//limpiamos el input
							$("#codigo").css("border-color","#a94442");//pone el border del input en color rojo
							$("#codigo").focus();//ponemos el foco en el input del código
							$("#movimiento").prop("disabled",true);

							break;
						case 1:
						case 2:
							swal({
							  position: 'center',
							  type: 'success',
							  title: 'Equipo encontrado',
							  showConfirmButton: false,
							  timer: 1400
							})
							$("#codigo").css("border-color","#66ff99");//pone el border del input en color rojo
							if($('#equipo').val() != null){
								$("#movimiento").prop("disabled",false);
							}

							break;
					}
				}
			})
		}*/
    </script>

    <!--Script-->

    
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
