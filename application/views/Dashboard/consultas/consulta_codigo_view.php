<!DOCTYPE html>
<html>
<head>
	<title>Detalle por codigo</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
    <script src=" <?php echo base_url() ?>assets/js/vue.js">  </script>
	<style type="text/css" media="screen">
		.es{
			padding-right: 40px;
			padding-left: 40px;
			padding-top: 20px;padding-bottom: 20px;
			border: 1px solid gray; 

		}
	</style>
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->
    <div class="panel">
    	<center>
    		<h4>Consulta de equipo por codigo de inventario</h4>
    	</center>
    	<div class="panel-body">
    		<div class="row">
    			<div class="col-md-4">
    				<label for="">Código de equipo de inventario</label>
	    			<div class="input-group">
						<input class="form-control" type="text" name="codigo" id="codigo" placeholder="Digite un código de un equipo">
						<span class="input-group-addon"><i id="icono"></i></span>
					</div>
	    			<span id="msj"></span>
    			</div>
    		</div>
    		<br>
    		<div class="row">
    			<div class="col-md-4">
    				<button id="consulta" class="btn btn-info">Consultar</button>
    			</div>
    		</div>
    	</div>
    </div>
	
	<!--aqui vamos a mostrar el detalle del equipo-->
	<div id="panel" class="panel">
		<div>
			<div id="detalle_adm" class="panel-body">
				<!--  Descripción del sistema que se encuentra en la tabla descripcion_sistema  -->
				

			</div>
		</div>
		

	</div>


    <!--FIN CONTENIDO DE LA APLICACION-->
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
    <script>
		$(document).ready(function(){
			$('#consulta').prop('disabled',true);
			$('#panel').hide();
			$('#detalle_adm').hide();
		})

	//función para verificar el código
    	$('#codigo').keyup(function(){
    		var codigo = $(this).val();
    		//convertimos el texto en mayuscula
    		$('#codigo').val($('#codigo').val().toUpperCase());
    		

    		if(codigo=='')
    		{
    			//$('#icono').removeClass('fa fa-times-circle-o');
    			$('#codigo').css('border-color','');
    			$('#msj').html('');
    			$('#icono').html('');
    			$('#consulta').prop('disabled','true');
    			$('#detalle').remove();
    		}
    		else
    		{
    			//función ajax para verificar el código
    			$.ajax({
	    			type: 'post',
	    			url: '<?php echo base_url()?>verificar',
	    			data: {codigo: codigo},
	    			dataType: 'json',
	    			success: function(data){
	    				if(data == false)
	    				{
	    					$('#codigo').css('border-color','red');
	    					$('#msj').html('Equipo no encontrado');
	    					//$('#icono').addClass('fa fa-times-circle-o');
	    					$('#icono').html('<img src="<?php echo base_url()?>assets/img/wrong.png"  width="20" height="20">');
	    					$('#consulta').prop('disabled',true);
	    				}
	    				else
	    				{
	    					$('#codigo').css('border-color','green');
	    					$('#msj').html('Equipo encontrado');
	    					//$('#icono').addClass('fa fa-check-circle-o');
	    					$('#icono').html('<img src="<?php echo base_url()?>assets/img/check.png"  width="20" height="20">');
	    					$('#consulta').prop('disabled',false);
	    				}
	    			}
	    		});
    		}

    		
    	});

    //función para mostrar el detalle del código
    	$('#consulta').click(function(){
    		$('#detalle').remove();
    		var codigo = $('#codigo').val();
    		//para saber si es equipo de inventario administrativo o de inventario laboratorio
    		var cod = codigo.slice(0,2);

    		//función ajax para obtener el detalle del equipo
    		
    		if(cod == 'PC')
    		{
    			//vamos a construir el formulario si es una PC de administrativo
    			$('#panel').show();
    			$('#detalle_adm').show();
    			$.ajax({
    				type: 'post',
    				url: '<?php echo base_url()?>get_detalle',
    				data: {codigo: codigo, cod: cod},
    				async: false,
    				dataType: 'json',
    				success: function(data){
    					if(data != false)
    					{
    						/////////////////////////////////////////////////////////////////////////////////////////////////
    						

    						var html = '<div id="detalle"><div class="row">'+
    									'<div class="col-md-12">'+
    									'<center>'+
    									'<h3>Descripción del sistema</h3>'+
    									'</center>'+
    									'</div>'+
    									'<div class="col-md-3">'+
						'<div class="form-group">'+
							'<label>Nombre del equipo</label>'+
							'<input type="text" class="form-control" id="nombre_equipo" readonly="">'+
						'</div>'+
					'</div>'+
					'<div class="col-md-3">'+
						'<div class="form-group">'+
							'<label>Usuario registrado</label>'+
							'<input type="text" class="form-control" id="usuario_registrado" readonly="">'+
						'</div>'+
					'</div>'+
					'<div class="col-md-3">'+
						'<div class="form-group">'+
							'<label>Dominio</label>'+
							'<input type="text" class="form-control" id="dominio" readonly="">'+
						'</div>'+
					'</div>'+
					'<div class="col-md-3">'+
						'<div class="form-group">'+
							'<label>Fabricante</label>'+
							'<input type="text" class="form-control" id="fabricante" readonly="">'+
						'</div>'+
					'</div>'+
					'<div class="col-md-3">'+
						'<div class="form-group">'+
							'<label>Sistema Operativo</label>'+
							'<input type="text" class="form-control" id="so" readonly="">'+
						'</div>'+
					'</div>'+
					'<div class="col-md-3">'+
						'<div class="form-group">'+
							'<label>Nucleo</label>'+
							'<input type="text" class="form-control" id="nucleo" readonly="">'+
						'</div>'+
					'</div>'+
					'<div class="col-md-3">'+
						'<div class="form-group">'+
							'<label>Memoria fisica (GB)</label>'+
							'<input type="text" class="form-control" id="ram" readonly="">'+
						'</div>'+
					'</div>'+
					'<div class="col-md-3">'+
						'<div class="form-group">'+
							'<label>Numero de serie</label>'+
							'<input type="text" class="form-control" id="serie_des" readonly="">'+
						'</div>'+
					'</div>'+
				'</div>'+

				
				'<div class="row">'+
					'<div class="col-md-12">'+
						'<center>'+
							'<h3>Descripción del hardware y adaptadores</h3>'+
						'</center>'+
					'</div>'+
					'<div class="col-md-3">'+
						'<div class="form-group">'+
							'<label>Procesador</label>'+
							'<input type="text" class="form-control" id="procesador" readonly="">'+
						'</div>'+
					'</div>'+
					'<div class="col-md-3">'+
						'<div class="form-group">'+
							'<label>Velocidad de reloj (GHZ)</label>'+
							'<input type="text" class="form-control" id="velocidad_reloj" readonly="">'+
						'</div>'+
					'</div>'+
					'<div class="col-md-3">'+
						'<div class="form-group">'+
							'<label>Fabricante Procesador</label>'+
							'<input type="text" class="form-control" id="fabricante_procesador" readonly="">'+
						'</div>'+
					'</div>'+
					'<div class="col-md-3">'+
						'<div class="form-group">'+
							'<label>Modelo de la Motherboard</label>'+
							'<input type="text" class="form-control" id="modelo_base" readonly="">'+
						'</div>'+
					'</div>'+
					'<div class="col-md-3">'+
						'<div class="form-group">'+
							'<label>Marca RAM</label>'+
							'<input type="text" class="form-control" id="marca_ram" readonly="">'+
						'</div>'+
					'</div>'+
					'<div class="col-md-3">'+
						'<div class="form-group">'+
							'<label>Dirección IP</label>'+
							'<input type="text" class="form-control" id="ip" readonly="">'+
						'</div>'+
					'</div>'+
					'<div class="col-md-3">'+
						'<div class="form-group">'+
							'<label>Tarjetas Extra</label>'+
							'<input type="text" class="form-control" id="tarjeta" readonly="">'+
						'</div>'+
					'</div>'+

					'<div class="col-md-3">'+
						'<div class="form-group">'+
							'<label >Disco fisico 1</label>'+
							'<input type="text" class="form-control" id="disco_fisico1" readonly="">'+
						'</div>'+
					'</div>'+
					'<div class="col-md-3">'+
						'<div class="form-group">'+
							'<label >Capacidad </label>'+
							'<input type="text" class="form-control" id="capacidad" readonly="">'+
						'</div>'+
					'</div>'+
					'<div class="col-md-3">'+
						'<div class="form-group">'+
							'<label >Marca disco duro</label>'+
							'<input type="text" class="form-control" id="marca_dd" readonly="">'+
						'</div>'+
					'</div>'+
					'<div class="col-md-3">'+
						'<div class="form-group">'+
							'<label >DVD</label>'+
							'<input type="text" class="form-control" id="dvd" readonly="">'+
						'</div>'+
					'</div>'+
				'</div>'+

				
				'<div class="row" >'+
					'<div class="col-md-12">'+
						'<center>'+
							'<h3>Perifericos</h3>'+
						'</center>'+
					'</div>'+
					'<div class="col-md-12">'+
						'<div class="form-group">'+
							'<div class="form-tb" >'+
								'<div id="perifericos">'+
									
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>'+
				'</div>'+
				'<div class="row" >'+
					'<div class="col-md-12">'+
						'<center>'+
							'<h3>Software instalado</h3>'+
						'</center>'+
					'</div>'+
					'<br>'+
					'<div class="col-md-12">'+
						'<div class="form-group">'+
							'<div class="form-tb" >'+
								'<div id="sw">'+
									
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>'+
				'</div></div>';

				$('#detalle_adm').append(html);


    						//////////////////////////////////////////////////////////////////////////////////////////////////

    						//Descripción del sistema
    						$('#nombre_equipo').val(data[0].nombre);
    						$('#usuario_registrado').val(data[0].usuario_registrado);
    						$('#dominio').val(data[0].dominio);
    						$('#fabricante').val(data[0].fabricante);
    						$('#so').val(data[0].sistema_operativo);
    						$('#nucleo').val(data[0].nucleo);
    						$('#ram').val(data[0].memoria_fisica);
    						$('#serie_des').val(data[0].serie_des);

    						//placa base
    						$('#procesador').val(data[0].procesador);
    						$('#velocidad_reloj').val(data[0].velocidad_reloj);
    						$('#fabricante_procesador').val(data[0].fabricante_procesador);
    						$('#modelo_base').val(data[0].modelo_placa);
    						$('#marca_ram').val(data[0].marca_ram);
    						$('#ip').val(data[0].direccion_ip);
    						$('#tarjeta').val(data[0].tarjeta_extra);
    						$('#disco_fisico1').val(data[0].disco_fisico1);
    						$('#capacidad').val(data[0].capacidad);
    						$('#marca_dd').val(data[0].marca_disco);
    						$('#dvd').val(data[0].dvd1);

    						//hacemos petición ajax para obtener los perifericos 
    						$.ajax({
    							type: 'post',
    							url: '<?php echo base_url()?>get_perifericos',
    							data: {codigo: codigo},
    							async: false,
    							dataType: 'json',
    							success: function(data){
    								if(data != false)
    								{
    									var html='<table class="table table-dark table-bordered"><thead class="thead-dark"><tr>'+
												'<th style="width: 200px" scope="col">Serial</th>'+
												'<th style="width: 200px" scope="col">Tipo de periferico</th>'+
												'<th style="width: 200px" scope="col">Tipo</th>'+
												'<th style="width: 200px" scope="col">Marca</th>'+
											'</tr>'+
										'</thead>'+
										'<tbody>';
	    								var i;

	    								for(i=0;i<data.length;i++)
	    								{
	    									html += '<tr>'+
	    												'<td>'+data[i].serial+'</td>'+
	    												'<td>'+data[i].tipo+'</td>'+
	    												'<td>'+data[i].nombre+'</td>'+
	    												'<td>'+data[i].marca+'</td>'+
	    											'</tr>';
	    								}
	    								html += '</tbody>'+
									'</table>';

	    								$('#perifericos').html(html);
    								}else{
    									$('#perifericos').html('<center><h3>Sin registros en la base de datos</h3></center>');
    								}
    							}
    						});

    						//petición ajax para obtener el sw
    						$.ajax({
    							type: 'post',
    							url: '<?php echo base_url()?>adm_software',
    							data: {codigo: codigo},
    							async: false,
    							dataType: 'json',
    							success: function(data){
    								if(data != false)
    								{
    									var html='<table class="table table-dark table-bordered"><thead class="thead-dark"><tr>'+
												'<th style="width: 200px" scope="col">Nombre</th>'+
												'<th style="width: 200px" scope="col">Versión</th>'+
											'</tr>'+
										'</thead>'+
										'<tbody>';
	    								var i;

	    								for(i=0;i<data.length;i++)
	    								{
	    									html += '<tr>'+
	    												'<td>'+data[i].nombre+'</td>'+
	    												'<td>'+data[i].version+'</td>'+
	    											'</tr>';
	    								}
	    								html += '</tbody>'+
									'</table>';

	    								$('#sw').html(html);
    								}else{
    									$('#sw').html('<center><h3>Sin registros en la base de datos</h3></center>');
    								}
    							}
    						});
    					}
    					else
    					{
    						alert('Error');
    					}
    				},
    				error: function(){
    					alert('error');
    				}
    			});
    		}
    		else
    		{
    			//si es un codigo de laboratorio
    	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    			//vamos a construir el formulario si es una PC de administrativo
    			$('#panel').show();
    			$('#detalle_adm').show();
    			$.ajax({
    				type: 'post',
    				url: '<?php echo base_url()?>get_detalle',
    				data: {codigo: codigo, cod: cod},
    				async: false,
    				dataType: 'json',
    				success: function(data){
    					if(data != false)
    					{
    						/////////////////////////////////////////////////////////////////////////////////////////////////
    						

    						var html = '<div id="detalle">'+
			    						//descripción del equipo
			    						'<div class="row">'+
										'<div class="col-md-12">'+
											'<center>'+
												'<h3>Descripción del Sistema</h3>'+
											'</center>'+
										'</div>'+
										'<div class="col-md-3">'+
											'<div class="form-group">'+
												'<label>Nombre</label>'+
												'<input id="nombre" type="text" class="form-control" readonly="" >'+
											'</div>'+
										'</div>'+
										'<div class="col-md-3">'+
											'<div class="form-group">'+
												'<label>Fabricante</label>'+
												'<input id="fabricante" type="text" class="form-control" readonly="" >'+
											'</div>'+
										'</div>'+
										'<div class="col-md-3">'+
											'<div class="form-group">'+
												'<label>Sistema operativo</label>'+
												'<input id="so" type="text" class="form-control" readonly="">'+
											'</div>'+
										'</div>'+
										'<div class="col-md-3">'+
											'<div class="form-group">'+
												'<label>Nucleo</label>'+
												'<input id="nucleo" type="text" class="form-control" readonly="">'+
											'</div>'+
										'</div>'+
									'</div>'+
									'<div class="row">'+
										'<div class="col-md-3">'+
											'<div class="form-group">'+
												'<label>Paquete de versión</label>'+
												'<input id="paquete" type="text" class="form-control" readonly="" >'+
											'</div>'+
										'</div>'+
										'<div class="col-md-3">'+
											'<div class="form-group">'+
												'<label>Versión</label>'+
												'<input id="version" type="text" class="form-control" readonly="">'+
											'</div>'+
										'</div>'+
										'<div class="col-md-3">'+
											'<div class="form-group">'+
												'<label>Usuario registrado</label>'+
												'<input id="usuario_registrado" type="text" class="form-control" readonly="">'+
											'</div>'+
										'</div>'+
										'<div class="col-md-3">'+
											'<div class="form-group">'+
												'<label>Memoria física</label>'+
												'<input id="memoria_fisica" type="text" class="form-control" readonly="">'+
											'</div>'+
										'</div>'+
									'</div>'+
									'<div class="row">'+
										'<div class="col-md-3">'+
											'<div class="form-group">'+
												'<label>Dominio/grupo de trabajo</label>'+
												'<input id="dominio" type="text" class="form-control" readonly="">'+
											'</div>'+
										'</div>'+
										'<div class="col-md-3">'+
											'<div class="form-group">'+
												'<label>Modelo</label>'+
												'<input id="modelo" type="text" class="form-control" readonly="" >'+
											'</div>'+
										'</div>'+
										'<div class="col-md-3">'+
											'<div class="form-group">'+
												'<label>Número de serie</label>'+
												'<input id="serie_des" type="text" class="form-control" readonly="" >'+
											'</div>'+
										'</div>'+
										'<div class="col-md-3">'+
											'<div class="form-group">'+
												'<label>Organización</label>'+
												'<input id="organizacion" type="text" class="form-control" readonly="" >'+
											'</div>'+
										'</div>'+
									'</div>'+
									'<div class="row">'+
										'<div class="col-md-3">'+
											'<div class="form-group">'+
												'<label>Idioma del sistema</label>'+
												'<input id="idioma" type="text" class="form-control" readonly="" >'+
											'</div>'+
										'</div>'+
										'<div class="col-md-3">'+
											'<div class="form-group">'+
												'<label>Caja del sistema</label>'+
												'<input id="caja_sistema" type="text" class="form-control" readonly="">'+
											'</div>'+
										'</div>'+
										
										'<div class="col-md-3">'+
											'<div class="form-group">'+
												'<label>Usuario con sesión abierta</label>'+
												'<input id="usuario_sesion" type="text" class="form-control" readonly="">'+
											'</div>'+
										'</div>'+
										'<div class="col-md-3">'+
											'<div class="form-group">'+
												'<label>Versión de Direct X</label>'+
												'<input id="version_DirectX" type="text" class="form-control" readonly="">'+
											'</div>'+
										'</div>'+
									'</div>'+
									'<div class="row">'+
										'<div class="col-md-4">'+
											'<div class="form-group">'+
												'<label>Zona horaria del sistema</label>'+
												'<input id="zona_horaria" type="text" class="form-control" readonly="">'+
											'</div>'+
										'</div>'+
									'</div>'+

									//información de la placa base
									'<div class="row">'+
									'<div class="col-md-12">'+
										'<center>'+
											'<h3>'+
												'Placa base'+
											'</h3>'+
										'</center>'+
									'</div>'+
									'<div class="col-md-3">'+
										'<div class="form-group">'+
											'<label>Procesador</label>'+
											'<input id="procesador" type="text" class="form-control" readonly="">'+
										'</div>'+
									'</div>'+
									'<div class="col-md-3">'+
										'<div class="form-group">'+
											'<label>Velocidad del reloj (GHZ)</label>'+
											'<input id="velocidad_reloj" type="text" class="form-control" readonly="">'+
										'</div>'+
									'</div>'+
									'<div class="col-md-3">'+
										'<div class="form-group">'+
											'<label>Fabricante del procesador</label>'+
											'<input id="fabricante_procesador" type="text" class="form-control" readonly="">'+
										'</div>'+
									'</div>'+
									'<div class="col-md-3">'+
										'<div class="form-group">'+
											'<label>Etiqueta de la BIOS</label>'+
											'<input id="etiqueta_BIOS" type="text" class="form-control" readonly="">'+
										'</div>'+
									'</div>'+
								'</div>'+
								'<div class="row">'+
									'<div class="col-md-3">'+
										'<div class="form-group">'+
											'<label>Fabricante de la BIOS</label>'+
											'<input id="fabricante_BIOS" type="text" class="form-control" readonly="">'+
										'</div>'+
									'</div>'+
									'<div class="col-md-3">'+
										'<div class="form-group">'+
											'<label>Versión de la BIOS</label>'+
											'<input id="version_BIOS" type="text" class="form-control" readonly="">'+
										'</div>'+
									'</div>'+
									'<div class="col-md-3">'+
										'<div class="form-group">'+
											'<label>Número de serie de la BIOS</label>'+
											'<input id="num_serie_BIOS" type="text" class="form-control" readonly="">'+
										'</div>'+
									'</div>'+
									'<div class="col-md-3">'+
										'<div class="form-group">'+
											'<label>Fecha de instalación de la BIOS</label>'+
											'<input id="fecha_instalacion_BIOS" type="text" class="form-control" readonly="">'+
										'</div>'+
									'</div>'+
								'</div>'+
								'<div class="row">'+
									'<div class="col-md-3">'+
										'<div class="form-group">'+
											'<label>Fabricante de la placa base</label>'+
											'<input id="fabricante_placa" type="text" class="form-control" readonly="">'+
										'</div>'+
									'</div>'+
									'<div class="col-md-3">'+
										'<div class="form-group">'+
											'<label>Modelo de la placa base</label>'+
											'<input id="modelo_placa" type="text" class="form-control" readonly="">'+
										'</div>'+
									'</div>'+
									'<div class="col-md-3">'+
										'<div class="form-group">'+
											'<label>Versión de placa base</label>'+
											'<input id="version_placa" type="text" class="form-control" readonly="">'+
										'</div>'+
									'</div>'+
									'<div class="col-md-3">'+
										'<div class="form-group">'+
											'<label>Marca RAM</label>'+
											'<input id="marca_ram" type="text" class="form-control" readonly="">'+
										'</div>'+
									'</div>'+
								'</div>'+
								'<div class="row">'+
									'<div class="col-md-3">'+
										'<div class="form-group">'+
											'<label>Ranura de memoria 0</label>'+
											'<textarea id="ranura_memoria" class="form-control"  rows="1" readonly="">'+
											'</textarea>'+
										'</div>'+
									'</div>'+
									'<div class="col-md-3">'+
										'<div class="form-group">'+
											'<label>Ranura de sistema 0</label>'+
											'<textarea id="ranura_sistema_0" class="form-control"  rows="1" readonly="">'+
											'</textarea>'+
										'</div>'+
									'</div>'+
									'<div class="col-md-3">'+
										'<div class="form-group">'+
											'<label>Ranura de sistema 1</label>'+
											'<textarea id="ranura_sistema_1" class="form-control"  rows="1" readonly="">'+
											'</textarea>'+
										'</div>'+
									'</div>'+
									'<div class="col-md-3">'+
										'<div class="form-group">'+
											'<label>Ranura de sistema 2</label>'+
											'<textarea id="ranura_sistema_2" class="form-control"  rows="1" readonly="">'+
											'</textarea>'+
										'</div>'+
									'</div>'+
								'</div>'+
								'<div class="row">'+
									'<div class="col-md-3">'+
										'<div class="form-group">'+
											'<label>Ranura de sistema 3</label>'+
											'<textarea id="ranura_sistema_3" class="form-control"  rows="1" readonly="">'+
											'</textarea>'+
										'</div>'+
									'</div>'+
									'<div class="col-md-3">'+
										'<div class="form-group">'+
											'<label>Ranura de sistema 4</label>'+
											'<textarea id="ranura_sistema_4" class="form-control"  rows="1" readonly="">'+
											'</textarea>'+
										'</div>'+
									'</div>'+
								'</div>'+
								//informacion sobre el adaptador de red
								'<div class="row">'+
								'<div class="col-md-12">'+
									'<center>'+
										'<h3>'+
											'Adaptador de red'+
										'</h3>'+
									'</center>'+
								'</div>'+
								'<div class="col-md-3">'+
									'<div class="form-group">'+
										'<label>Adaptador de red 1</label>'+
										'<input id="adaptador_1" type="text" class="form-control" readonly="">'+
									'</div>'+
								'</div>'+
								'<div class="col-md-3">'+
									'<div class="form-group">'+
										'<label>Tipo de adaptador</label>'+
										'<input id="tipo_adaptador" type="text" class="form-control" readonly="">'+
									'</div>'+
								'</div>'+
								'<div class="col-md-3">'+
									'<div class="form-group">'+
										'<label>Dirección IP</label>'+
										'<input id="direccion_ip" type="text" class="form-control" readonly="">'+
									'</div>'+
								'</div>'+
								'<div class="col-md-3">'+
									'<div class="form-group">'+
										'<label>Subred IP</label>'+
										'<input id="subred_ip" type="text" class="form-control" readonly="">'+
									'</div>'+
								'</div>'+
							'</div>'+
							'<div class="row">'+
								'<div class="col-md-3">'+
									'<div class="form-group">'+
										'<label>Gateway IP predeterminado</label>'+
										'<input id="gateway" type="text" class="form-control" readonly="">'+
									'</div>'+
								'</div>'+
								'<div class="col-md-3">'+
									'<div class="form-group">'+
										'<label>Servidor primario WINS</label>'+
										'<input id="servidor_primario" type="text" class="form-control" readonly="">'+
									'</div>'+
								'</div>'+
								'<div class="col-md-3">'+
									'<div class="form-group">'+
										'<label>Servidor DNS</label>'+
										'<input id="servidor_dns" type="text" class="form-control" readonly="">'+
									'</div>'+
								'</div>'+
								'<div class="col-md-3">'+
									'<div class="form-group">'+
										'<label>Servidor DHCP</label>'+
										'<input id="servidor_dhcp" type="text" class="form-control" readonly="">'+
									'</div>'+
								'</div>'+
							'</div>'+
							'<div class="row">'+
								'<div class="col-md-3">'+
									'<div class="form-group">'+
										'<label>Dirección MAC</label>'+
										'<input id="direccion_mac" type="text" class="form-control" readonly="">'+
									'</div>'+
								'</div>'+
							'</div>'+

							//información sobre adpatador de video
							'<div class="row">'+
							'<div class="col-md-12">'+
								'<center>'+
									'<h3>Adaptador de video</h3>'+
								'</center>'+
							'</div>'+
							'<div class="col-md-3">'+
								'<div class="form-group">'+
									'<label>Adaptador de video</label>'+
									'<input id="adaptador1" type="text" class="form-control" readonly="">'+
								'</div>'+
							'</div>'+
							'<div class="col-md-3">'+
								'<div class="form-group">'+
									'<label>Ram adaptador</label>'+
									'<input id="adaptador_ram" type="text" class="form-control" readonly="">'+
								'</div>'+
							'</div>'+
							'<div class="col-md-3">'+
								'<div class="form-group">'+
									'<label>Tipo DAC</label>'+
									'<input id="tipo_dac" type="text" class="form-control" readonly="">'+
								'</div>'+
							'</div>'+
							'<div class="col-md-3">'+
								'<div class="form-group">'+
									'<label>Monitor de PC 1 S/N</label>'+
									'<input id="monitor_pc1" type="text" class="form-control" readonly="">'+
								'</div>'+
							'</div>'+
							'</div>'+
							'<div class="row">'+
								'<div class="col-md-3">'+
									'<div class="form-group">'+
										'<label>Resolución de video</label>'+
										'<input id="resolucion_video" type="text" class="form-control" readonly="">'+
									'</div>'+
								'</div>'+
								'<div class="col-md-3">'+
									'<div class="form-group">'+
										'<label>Velocidad de regeneración</label>'+
										'<input id="velocidad" type="text" class="form-control" readonly="">'+
									'</div>'+
								'</div>'+
							'</div>'+

							//información sobre almacenamiento
							'<div class="row">'+
								'<div class="col-md-12">'+
									'<center>'+
										'<h3>Almacenamiento</h3>'+
									'</center>'+
								'</div>'+
								'<div class="col-md-3">'+
									'<div class="form-group">'+
										'<label>Disco fisico 1</label>'+
										'<input id="disco_fisico1" type="text" class="form-control" readonly="">'+
									'</div>'+
								'</div>'+
								'<div class="col-md-3">'+
									'<div class="form-group">'+
										'<label>Capacidad</label>'+
										'<input id="capacidad" type="text" class="form-control" readonly="">'+
									'</div>'+
								'</div>'+
								'<div class="col-md-3">'+
									'<div class="form-group">'+
										'<label>Disco logico/descripción</label>'+
										'<input id="disco_logico" type="text" class="form-control" readonly="">'+
									'</div>'+
								'</div>'+
								'<div class="col-md-3">'+
									'<div class="form-group">'+
										'<label>Sistema de archivos</label>'+
										'<input id="sistema_archivos" type="text" class="form-control" readonly="">'+
									'</div>'+
								'</div>'+
							'</div>'+
							'<div class="row">'+
								'<div class="col-md-3">'+
									'<div class="form-group">'+
										'<label>Tamaño</label>'+
										'<input id="tamaño" type="text" class="form-control" readonly="">'+
									'</div>'+
								'</div>'+
								'<div class="col-md-3">'+
									'<div class="form-group">'+
										'<label>Espacio libre</label>'+
										'<input id="espacio_libre" type="text" class="form-control" readonly="">'+
									'</div>'+
								'</div>'+
								'<div class="col-md-3">'+
									'<div class="form-group">'+
										'<label>DVD 1</label>'+
										'<input id="dvd1" type="text" class="form-control" readonly="">'+
									'</div>'+
								'</div>'+
								'<div class="col-md-3">'+
									'<div class="form-group">'+
										'<label>Letra de unidad</label>'+
										'<input id="letra_unidad" type="text" class="form-control" readonly="">'+
									'</div>'+
								'</div>'+
							'</div>'+

							//perifericos
							'<div class="row" >'+
							'<div class="col-md-12">'+
								'<center>'+
									'<h3>Perifericos</h3>'+
								'</center>'+
							'</div>'+
							'<div class="col-md-12">'+
								'<div class="form-group">'+
									'<div class="form-tb" >'+
										'<div id="perifericos">'+
											
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>'+
						'<div class="row" >'+
							'<div class="col-md-12">'+
								'<center>'+
									'<h3>Software instalado</h3>'+
								'</center>'+
							'</div>'+
							'<br>'+
							'<div class="col-md-12">'+
								'<div class="form-group">'+
									'<div class="form-tb" >'+
										'<div id="sw">'+
											
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'+



    						'</div>';

							$('#detalle_adm').append(html);


    						//////////////////////////////////////////////////////////////////////////////////////////////////

    						//Descripción del sistema
    						$('#nombre').val(data[0].nombre);
    						$('#fabricante').val(data[0].fabricante);
    						$('#so').val(data[0].sistema_operativo);
    						$('#nucleo').val(data[0].nucleo);
    						$('#paquete').val(data[0].paquete_servicio);
    						$('#version').val(data[0].version);
    						$('#usuario_registrado').val(data[0].usuario_registrado);
    						$('#memoria_fisica').val(data[0].memoria_fisica);
    						$('#dominio').val(data[0].dominio);
    						$('#modelo').val(data[0].modelo);
    						$('#serie_des').val(data[0].serie_des);
    						$('#organizacion').val(data[0].organizacion);
    						$('#idioma').val(data[0].idioma);
    						$('#zona_horaria').val(data[0].zona_horaria);
    						$('#usuario_sesion').val(data[0].usuario_sesion);
    						$('#version_DirectX').val(data[0].version_DirectX);
    						$('#caja_sistema').val(data[0].caja_sistema);

    						//placa base
    						$('#procesador').val(data[0].procesador);
    						$('#velocidad_reloj').val(data[0].velocidad_reloj);
    						$('#fabricante_procesador').val(data[0].fabricante_procesador);
    						$('#etiqueta_BIOS').val(data[0].etiqueta_BIOS);
    						$('#fabricante_BIOS').val(data[0].fabricante_BIOS);
    						$('#version_BIOS').val(data[0].version_BIOS);
    						$('#num_serie_BIOS').val(data[0].num_serie_BIOS);
    						$('#fecha_instalacion_BIOS').val(data[0].fecha_instalacion_BIOS);
    						$('#fabricante_placa').val(data[0].fabricante_placa);
    						$('#modelo_placa').val(data[0].modelo_placa);
    						$('#version_placa').val(data[0].version_placa);
    						$('#marca_ram').val(data[0].marca_ram);
    						$('#ranura_memoria').val(data[0].ranura_memoria);
    						$('#ranura_sistema_0').val(data[0].ranura_sistema_0);
    						$('#ranura_sistema_1').val(data[0].ranura_sistema_1);
    						$('#ranura_sistema_2').val(data[0].ranura_sistema_2);
    						$('#ranura_sistema_3').val(data[0].ranura_sistema_3);
    						$('#ranura_sistema_4').val(data[0].ranura_sistema_4);

    						//adaptador de red
    						$('#adaptador_1').val(data[0].adaptador_1);
    						$('#tipo_adaptador').val(data[0].tipo_adaptador);
    						$('#direccion_ip').val(data[0].direccion_ip);
    						$('#subred_ip').val(data[0].subred_ip);
    						$('#gateway').val(data[0].gateway);
    						$('#servidor_primario').val(data[0].servidor_primario);
    						$('#servidor_dns').val(data[0].servidor_dns);
    						$('#servidor_dhcp').val(data[0].servidor_dhcp);
    						$('#direccion_mac').val(data[0].direccion_mac);

    						//adaptador de video
    						$('#adaptador1').val(data[0].adaptador1);
    						$('#adaptador_ram').val(data[0].adaptador_ram);
    						$('#tipo_dac').val(data[0].tipo_dac);
    						$('#monitor_pc1').val(data[0].monitor_pc1);
    						$('#resolucion_video').val(data[0].resolucion_video);
    						$('#velocidad').val(data[0].velocidad);

    						//almacenamiento
    						$('#disco_fisico1').val(data[0].disco_fisico1);
    						$('#capacidad').val(data[0].capacidad);
    						$('#disco_logico').val(data[0].disco_logico);
    						$('#sistema_archivos').val(data[0].sistema_archivos);
    						$('#tamaño').val(data[0].tamaño);
    						$('#espacio_libre').val(data[0].espacio_libre);
    						$('#dvd1').val(data[0].dvd1);
    						$('#letra_unidad').val(data[0].letra_unidad);

    						

    						//hacemos petición ajax para obtener los perifericos 
    						$.ajax({
    							type: 'post',
    							url: '<?php echo base_url()?>get_perifericos',
    							data: {codigo: codigo},
    							async: false,
    							dataType: 'json',
    							success: function(data){
    								if(data != false)
    								{
    									var html='<table class="table table-dark table-bordered"><thead class="thead-dark"><tr>'+
												'<th style="width: 200px" scope="col">Serial</th>'+
												'<th style="width: 200px" scope="col">Tipo de periferico</th>'+
												'<th style="width: 200px" scope="col">Tipo</th>'+
												'<th style="width: 200px" scope="col">Marca</th>'+
											'</tr>'+
										'</thead>'+
										'<tbody>';
	    								var i;

	    								for(i=0;i<data.length;i++)
	    								{
	    									html += '<tr>'+
	    												'<td>'+data[i].serial+'</td>'+
	    												'<td>'+data[i].tipo+'</td>'+
	    												'<td>'+data[i].nombre+'</td>'+
	    												'<td>'+data[i].marca+'</td>'+
	    											'</tr>';
	    								}
	    								html += '</tbody>'+
									'</table>';

	    								$('#perifericos').html(html);
    								}else{
    									$('#perifericos').html('<center><h3>Sin registros en la base de datos</h3></center>');
    								}
    							}
    						});

    						//petición ajax para obtener el sw
    						$.ajax({
    							type: 'post',
    							url: '<?php echo base_url()?>lab_software',
    							data: {codigo: codigo},
    							async: false,
    							dataType: 'json',
    							success: function(data){
    								if(data != false)
    								{
    									var html='<table class="table table-dark table-bordered"><thead class="thead-dark"><tr>'+
												'<th style="width: 200px" scope="col">Descripción</th>'+
												'<th style="width: 200px" scope="col">Empresa</th>'+
												'<th style="width: 200px" scope="col">Nombre de la carpeta</th>'+
												'<th style="width: 200px" scope="col">Versión</th>'+
												'<th style="width: 200px" scope="col">Nombre del archivo</th>'+
											'</tr>'+
										'</thead>'+
										'<tbody>';
	    								var i;

	    								for(i=0;i<data.length;i++)
	    								{
	    									html += '<tr>'+
	    												'<td>'+data[i].nombre+'</td>'+
	    												'<td>'+data[i].empresa+'</td>'+
	    												'<td>'+data[i].nom_carpeta+'</td>'+
	    												'<td>'+data[i].version+'</td>'+
	    												'<td>'+data[i].nom_archivo+'</td>'+
	    											'</tr>';
	    								}
	    								html += '</tbody>'+
									'</table>';

	    								$('#sw').html(html);
    								}else{
    									$('#sw').html('<center><h3>Sin registros en la base de datos</h3></center>');
    								}
    							}
    						});
    					}
    					else
    					{
    						alert('Error');
    					}
    				},
    				error: function(){
    					alert('error');
    				}
    			});

    	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
    		}
    	});	
    </script>
</body>
</html>
