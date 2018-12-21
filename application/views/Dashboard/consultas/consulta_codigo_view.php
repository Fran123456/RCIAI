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
	<div class="panel">
		<div id="detalle_adm">
			<div class="panel-body">
				<!--  Descripción del sistema que se encuentra en la tabla descripcion_sistema  -->
				<div class="row">
					<div class="col-md-12">
						<center>
							<h3>Descripción del sistema</h3>
						</center>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Nombre del equipo</label>
							<input type="text" class="form-control" id="nombre_equipo" readonly="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Usuario registrado</label>
							<input type="text" class="form-control" id="usuario_registrado" readonly="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Dominio</label>
							<input type="text" class="form-control" id="dominio" readonly="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Fabricante</label>
							<input type="text" class="form-control" id="fabricante" readonly="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Sistema Operativo</label>
							<input type="text" class="form-control" id="so" readonly="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Nucleo</label>
							<input type="text" class="form-control" id="nucleo" readonly="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Memoria fisica (GB)</label>
							<input type="text" class="form-control" id="ram" readonly="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Numero de serie</label>
							<input type="text" class="form-control" id="serie_des" readonly="">
						</div>
					</div>
				</div>

				<!--  Información del Procesador que esta en la tabla placa_base  -->
				<div class="row">
					<div class="col-md-12">
						<center>
							<h3>Descripción del hardware y adaptadores</h3>
						</center>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Procesador</label>
							<input type="text" class="form-control" id="procesador" readonly="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Velocidad de reloj (GHZ)</label>
							<input type="text" class="form-control" id="velocidad_reloj" readonly="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Fabricante Procesador</label>
							<input type="text" class="form-control" id="fabricante_procesador" readonly="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Modelo de la Motherboard</label>
							<input type="text" class="form-control" id="modelo_base" readonly="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Marca RAM</label>
							<input type="text" class="form-control" id="marca_ram" readonly="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Dirección IP</label>
							<input type="text" class="form-control" id="ip" readonly="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Tarjetas Extra</label>
							<input type="text" class="form-control" id="tarjeta" readonly="">
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label >Disco fisico 1</label>
							<input type="text" class="form-control" id="disco_fisico1" readonly="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label >Capacidad </label>
							<input type="text" class="form-control" id="capacidad" readonly="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label >Marca disco duro</label>
							<input type="text" class="form-control" id="marca_dd" readonly="">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label >DVD</label>
							<input type="text" class="form-control" id="dvd" readonly="">
						</div>
					</div>
				</div>

				<!-- información sobre Perifericos agregados en la pc del laboratorio   -->
				<div class="row" >
					<div class="col-md-12">
						<center>
							<h3>Perifericos</h3>
						</center>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<div class="form-tb" >
								<div id="perifericos">
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" >
					<div class="col-md-12">
						<center>
							<h3>Software instalado</h3>
						</center>
					</div>
					<br>
					<div class="col-md-12">
						<div class="form-group">
							<div class="form-tb" >
								<div id="sw">
									
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		

	</div>


    <!--FIN CONTENIDO DE LA APLICACION-->
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
    <script>
		$(document).ready(function(){
			$('#consulta').prop('disabled',true);
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
    		var codigo = $('#codigo').val();
    		//para saber si es equipo de inventario administrativo o de inventario laboratorio
    		var cod = codigo.slice(0,2);

    		//función ajax para obtener el detalle del equipo
    		
    		if(cod == 'PC')
    		{
    			//vamos a construir el formulario si es una PC de administrativo
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
    			alert(cod);
    		}
    	});	
    </script>
</body>
</html>
