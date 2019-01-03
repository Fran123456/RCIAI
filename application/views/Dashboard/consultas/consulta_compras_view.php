<!DOCTYPE html>
<html>
<head>
	<title>Consulta de compras</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->


	
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->
	 <!--CONTENIDO DE LA APLICACION-->
    <div class="panel">
    	<center>
    		<h4>Consulta de compras por unidad o tipo de producto</h4>
    	</center>
    	<div class="panel-body">
    		<div class="row">
    			<div class="col-md-4">
    				<label for=""><h3>Consultar por</h3></label>
	    			<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="opciones" id="opcion1" value="factura">
					  <label class="form-check-label" for="opcion1">Código de Factura</label>
					</div>
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="opciones" id="opcion2" value="unidad">
					  <label class="form-check-label" for="opcion2">Unidad administrativa o laboratorio</label>
					</div>
    			</div>
    		</div>
    		<br>
    		<div class="row">
    			<div id="tipo_consulta">
    				
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
			<div id="detalle" class="panel-body">
				<!--  Descripción del sistema que se encuentra en la tabla descripcion_sistema  -->
			</div>
		</div>
	</div>
		

	</div>
    <!--FIN CONTENIDO DE LA APLICACION-->

    
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->

	<script>
		$(document).ready(function(){

			$('#opcion1').click(function(){
				$('#lista_unidades').remove();
				$('#tipo').remove();

				var html = '<div id="tipo" class="col-md-4 mb-3">'+
					      '<label for="codigo_factura">Código de la factura</label>'+
					      '<input type="text" class="form-control" id="codigo_factura" placeholder="Digite el código de la factura" required>'+
					  	'</div>';
				$('#tipo_consulta').append(html);
			});

			$('#opcion2').click(function(){
				$('#tipo').remove();
				$('#lista_unidades').remove();

				var html = '<div id="lista_unidades" class="input-group">'+
							'<label>Seleccione la unidad a consultar</label>'+
							'<select class="form-control" name="unidades" id="unidades">'+
								'<option value=2>Academica</option>'+
								'<option value=33>Almacen y Bodega</option>'+
								'<option value=27>Audiovisuales</option>'+
								'<option value=8>Biblioteca</option>'+
								'<option value=31>CEFADE</option>'+
								'<option value=34>Celula de quimica</option>'+
								'<option value=24>Ciencias Empresariales</option>'+
								'<option value=13>Colecturia</option>'+
								'<option value=5>Contabilidad</option>'+
								'<option value=23>Control de calidad</option>'+
								'<option value=18>Decanato de jurisprudencia</option>'+
								'<option value=15>Egresados y graduados</option>'+
								'<option value=30>Enfermeria</option>'+
								'<option value=12>Extensión Cultural</option>'+
								'<option value=28>Fiscalia</option>'+
								'<option value=3>Gerencia General</option>'+
								'<option value=22>Gestión Educativa</option>'+
								'<option value=9>ICTUSAM</option>'+
								'<option value=25>Informática</option>'+
								'<option value=10>Medicina</option>'+
								'<option value=19>Odontología</option>'+
								'<option value=32>OFAL</option>'+
								'<option value=36>Otros proyectos</option>'+
								'<option value=7>Planificación</option>'+
								'<option value=11>Proyecto Social</option>'+
								'<option value=35>Proyecto USAID</option>'+
								'<option value=21>Química y Farmacia</option>'+
								'<option value=17>Rectoria y Vicerrectoria</option>'+
								'<option value=26>Relaciones Píblicas</option>'+
								'<option value=6>RRHH</option>'+
								'<option value=14>Secretaria General</option>'+
								'<option value=16>Ultrasonografia</option>'+
								'<option value=29>URNI</option>'+
								'<option value=20>Veterinaria</option>'+
								'<option value="lab-01">Laboratorio 1</option>'+
								'<option value="lab-02">Laboratorio 2</option>'+
								'<option value="lab-03">Laboratorio 3</option>'+
								'<option value="lab-04">Laboratorio 4</option>'+
								'<option value="lab-05">Laboratorio 5</option>'+
								'<option value="lab-HW">Laboratorio de Hardware</option>'+
								'<option value="lab-red">Laboratorio de red</option>'+
							'</select>'+
						'</div>';
				$('#tipo_consulta').append(html);
			});

			//boton
			$('#consulta').click(function(){
				$('#datos').remove();
				$('#msj1').remove();
				var tipo_consulta = $('input:radio[name=opciones]:checked').val();

				switch(tipo_consulta){
					case 'factura':
						var codigo_factura = $('#codigo_factura').val();

						//vamos a verificar si el campo de la factura tiene datos
						if(codigo_factura === ''){
							Swal(
							  'Atención!',
							  'El código de la factura no puede estar vacío',
							  'warning'
							);
							$('#codigo_factura').css("border-color","#a94442");
						}else{
							
							$('#codigo_factura').css("border-color","");
							//creamos una función ajax para obtener los datos
							$.ajax({
								type: 'post',
								url: '<?php echo site_url()?>Consultas_Controller/codigo_factura',
								data: {codigo_factura: codigo_factura},
								async: false,
								dataType: 'json',
								success: function(data){
									//verificamos si trae datos
									if(data === false)
									{
										var html = '<div id="msj1"><center><h3>El código de la factura <strong>'+ codigo_factura +'</strong> no existe en la base de datos</h3></center></div>';
										$('#detalle').append(html);
									}
									else
									{
										//vamos a construir el formulario
										var html = '<div id="datos" class="row">'+
														'<div class="form-group col-md-6">'+
				      										'<label for="num_factura">N° de factura</label>'+
				      										'<input type="text" class="form-control" id="num_factura" value="'+ data[0].n_factura +'" readonly>'+
				    									'</div>'+
				    									'<div class="form-group col-md-6">'+
				      										'<label for="fecha_compra">Fecha de compra</label>'+
				      										'<input type="text" class="form-control" id="fecha_compra" value="'+ data[0].fecha_compra +'" readonly>'+
				    									'</div>'+
				    									'<div class="form-group col-md-4">'+
				    										'<label for="total_Compra">Total de compra</label>'+
				    										'<div class="input-group">'+
																'<span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>'+
																'<input type="text" class="form-control" id="total_Compra" name="total_Compra" value="'+ data[0].total +'"  readonly>'+
															'</div>'+
				    									'</div>'+
				    									'<div class="form-group col-md-12">'+
				    										'<label for="detalle_factura">Detalle de la factura</label>'+
				    										'<textarea class="form-control" name="detalle_factura" id="detalle_factura" cols="30" rows="10" readonly>'+ data[0].detalle +'</textarea>'+
				    									'</div>'+
													'</div>';
										$('#detalle').append(html);
									}
								}
							});

						}
					break;
					case 'unidad':
						//removemos los posibles datos que hayan
						$('#datos').remove();
						$('#msj1').remove();
						
						var unidad = $('#unidades').val();//vamos a obtener el valor de el select
    					var nombre = $('select[name="unidades"] option:selected').text();
						var html = '';
						
						//hacemos la petición ajax
						$.ajax({
							type: 'post',
							url: '<?php echo site_url()?>Consultas_Controller/unidad_factura',
							data: {unidad: unidad},
							async: false,
							dataType: 'json', 
							success: function(data){
								if(data === false)
								{
									html = '<div id="msj1"><center><h3>sin registros en la base de datos</h3></center></div>';
								}
								else
								{
									html = '<div id="msj1"><center><h3>compras en '+ nombre +'</h3></center></div>';
								}

								$('#detalle').append(html);
							}
						});
					break;
				}
			});

			
		})


	</script>

</body>
</html>
