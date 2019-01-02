<!DOCTYPE html>
<html>
<head>
	<title>Detalle por unidad</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
    <script src=" <?php echo base_url() ?>assets/js/vue.js">  </script>
	<style type="text/css" media="screen">
		.es{
			padding-right: 40px;
			padding-left: 40px;
			padding-top: 20px;padding-bottom: 20px;
			border: 1px solid gray; 

		}

		table th,td {
	      text-align: center;
	    }
	</style>
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->
    <div class="panel">
    	<center>
    		<h4>Consulta de inventario por unidad de trabajo y laboratorio</h4>
    	</center>
    	<div class="panel-body">
    		<div class="row">
    			<div class="col-md-4">
    				<label for="">Unidad administrativa o Laboratorio</label>
	    			<div class="input-group">
						<select class="form-control" name="unidades" id="unidades">
							<option value=2>Academica</option>
							<option value=33>Almacen y Bodega</option>
							<option value=27>Audiovisuales</option>
							<option value=8>Biblioteca</option>
							<option value=31>CEFADE</option>
							<option value=34>Celula de quimica</option>
							<option value=24>Ciencias Empresariales</option>
							<option value=13>Colecturia</option>
							<option value=5>Contabilidad</option>
							<option value=23>Control de calidad</option>
							<option value=18>Decanato de jurisprudencia</option>
							<option value=15>Egresados y graduados</option>
							<option value=30>Enfermeria</option>
							<option value=12>Extensión Cultural</option>
							<option value=28>Fiscalia</option>
							<option value=3>Gerencia General</option>
							<option value=22>Gestión Educativa</option>
							<option value=9>ICTUSAM</option>
							<option value=25>Informática</option>
							<option value=10>Medicina</option>
							<option value=19>Odontología</option>
							<option value=32>OFAL</option>
							<option value=36>Otros proyectos</option>
							<option value=7>Planificación</option>
							<option value=11>Proyecto Social</option>
							<option value=35>Proyecto USAID</option>
							<option value=21>Química y Farmacia</option>
							<option value=17>Rectoria y Vicerrectoria</option>
							<option value=26>Relaciones Píblicas</option>
							<option value=6>RRHH</option>
							<option value=14>Secretaria General</option>
							<option value=16>Ultrasonografia</option>
							<option value=29>URNI</option>
							<option value=20>Veterinaria</option>
							<option value="lab-01">Laboratorio 1</option>
							<option value="lab-02">Laboratorio 2</option>
							<option value="lab-03">Laboratorio 3</option>
							<option value="lab-04">Laboratorio 4</option>
							<option value="lab-05">Laboratorio 5</option>
							<option value="lab-HW">Laboratorio de Hardware</option>
							<option value="lab-red">Laboratorio de red</option>
						</select>
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
			<div id="detalle" class="panel-body">
				<!--  Descripción del sistema que se encuentra en la tabla descripcion_sistema  -->
			</div>
		</div>
		

	</div>


    <!--FIN CONTENIDO DE LA APLICACION-->
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->

    <script>
    	$('#consulta').click(function(){
    		
    		var unidad = $('#unidades').val();//vamos a obtener el valor de el select
    		var nombre = $('select[name="unidades"] option:selected').text();
    		//creamos una function ajax para obtener la información
    		$.ajax({
    			type: 'post',
    			url: '<?php echo base_url()?>get_detalle_unidad',
    			data: {unidad: unidad},
    			async: false,
    			dataType: 'json',
    			success: function(data){
    				if(data == false)
    				{
    					var html = '<center><h1>Sin registros en la base de datos</h1></center>';
    					$('#detalle').html(html);
    				}
    				else
    				{
    					
    					var i;
    					var html ='';
    					//limpiamos el div
    					$('#detalle').html(html);

    					//vamos a verificar si es una unidad o un laboratorio
    					switch(unidad)
    					{
    						case 'lab-01':
    						case 'lab-02':
    						case 'lab-03':
    						case 'lab-04':
    						case 'lab-05':
    						case 'lab-HW':
    						case 'lab-red':
    							//vamos a construir la tabla
			    				var html = '<div id="detalle_unidad">'+
			    								'<table class="table">'+
			    								'<caption><center>Equipos en '+ nombre +'</center></caption>'+
			    								'<thead>'+
				    								'<tr>'+
				    									'<th>Codigo</th>'+
				    									'<th>Capacidad Disco Duro</th>'+
				    									'<th>Memoria Ram</th>'+
				    									'<th>velocidad procesador</th>'+
				    									'<th>Motherboard<br>fabricante,modelo,versión</th>'+
				    									'<th>Tipo de monitor</th>'+
				    								'</tr>'+
				    							'</thead>'+
				    							'<tbody>';

				    				//vamos a agregar los datos que hemos traido
				    				for(i=0;i<data.length;i++){

										html +='<tr>'+
						      						'<td>'+ data[i].identificador_lab +'</td>'+
						      						'<td>'+ data[i].capacidad +'</td>'+
						      						'<td>'+ data[i].memoria_fisica +'</td>'+
						      						'<td>'+ data[i].velocidad_reloj +'</td>'+
						      						'<td>'+ data[i].fabricante_placa +', '+ data[i].modelo_placa + ', '+ data[i].version_placa +'</td>'+
						      						'<td>'+ data[i].nombre +'</td>'+
						    					'</tr>';
									}

					    			html += '</tbody>'+
					    					'</table>'+
											'</div>';
								$('#detalle').html(html);
							break;
							default:


		    					//vamos a construir la tabla
			    				var html = '<div id="detalle_unidad">'+
			    								'<table class="table">'+
			    								'<caption><center>Equipos en '+ nombre +'</center></caption>'+
			    								'<thead>'+
				    								'<tr>'+
				    									'<th>Codigo</th>'+
				    									'<th>Capacidad Disco Duro</th>'+
				    									'<th>Memoria Ram</th>'+
				    									'<th>velocidad procesador</th>'+
				    									'<th>Motherboard<br>fabricante,modelo,versión</th>'+
				    									'<th>Tipo de monitor</th>'+
				    									'<th>Encargado del equipo</th>'+
				    								'</tr>'+
				    							'</thead>'+
				    							'<tbody>';

				    				//vamos a agregar los datos que hemos traido
				    				for(i=0;i<data.length;i++){

										html +='<tr>'+
						      						'<td>'+ data[i].identificador +'</td>'+
						      						'<td>'+ data[i].capacidad +'</td>'+
						      						'<td>'+ data[i].memoria_fisica +'</td>'+
						      						'<td>'+ data[i].velocidad_reloj +'</td>'+
						      						'<td>'+ data[i].fabricante_placa +', '+ data[i].modelo_placa + ', '+ data[i].version_placa +'</td>'+
						      						'<td>'+ data[i].nombre +'</td>'+
						      						'<td>'+ data[i].encargado_puesto +'</td>'+
						    					'</tr>';
									}

					    			html += '</tbody>'+
					    					'</table>'+
											'</div>';
								$('#detalle').html(html);
						}
    				}
				
    			}
    		});
    	});
    </script>
    
</body>
</html>
