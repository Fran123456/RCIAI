<!DOCTYPE html>
<html>
<head>
	<title>Reporteria</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
	
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->
    <style type="text/css">
    	.color{
    		color: red;
    	}
    </style>
	
	
	<!-- vamos a crear un listado de cada uno de los elementos que tiene o tendria cada área-->
		<h2>Reporteria </h2> 
		<hr>
	<div class="" >
		<div class="row" >

			
			<!--REPORTE 5-->
			<?php if($this->session->userdata('rol') == "administrador" || $this->session->userdata('rol') == "super usuario"): ?>
			<form method="post" action="<?php echo base_url()?>Reporte5_controller/reporte5">
				<div class="col-md-4">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-laptop" aria-hidden="true"></i> Reporte de laptops</h3>
								</div>
								<div class="panel-body text-center">
									<p>Reporte laptop que existen en el inventario</p>
									<div class="row">
										<div class="col-md-8">
											<label>Unidad</label>
											<select name="unidad2" id="unidad2" class="form-control">
										<script type="text/javascript"> $('#unidad2').append('<option value="todo">Todo</option>');</script>

											<?php for ($i=0; $i <count($unidades)-2 ; $i++): ?>
												
												<?php if($unidades[$i]['id_unidad'] != 4 && $unidades[$i]['id_unidad'] != 1 && $unidades[$i]['id_unidad'] != 38): ?>
												            <option value="<?php echo $unidades[$i]['id_unidad'] ?>"><?php echo $unidades[$i]['unidad'] ?></option>
											<?php endif; ?>

											<?php endfor; ?>
											</select>
										</div>
										<div class="col-md-4" style="padding-top: 10px">
											<button type="submit"><img height="50" width="50" src="<?php echo base_url()?>assets/Reporteria/excel.png"></button>
										</div>
										
									</div>
									
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
		 		</form>
		 	<?php endif; ?>
			<!--REPORTE 5-->


			<!--REPORTE 6-->
			<?php if($this->session->userdata('rol') == "administrador" || $this->session->userdata('rol') == "super usuario"): ?>
			<form method="post" action="<?php echo base_url()?>Reporte6_controller/reporte6">
				<div class="col-md-4">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-print" aria-hidden="true"></i> Reporte de impresores</h3>
								</div>
								<div class="panel-body text-center">
									<p>Reporte impresores que existen en el inventario</p>
									<div class="row">
										<div class="col-md-8">
											<label>Unidad</label>
											<select name="unidad3" id="unidad3" class="form-control">
										<script type="text/javascript"> $('#unidad3').append('<option value="todo">Todo</option>');</script>

											<?php for ($i=0; $i <count($unidades)-2 ; $i++): ?>
												
												<?php if($unidades[$i]['id_unidad'] != 4 && $unidades[$i]['id_unidad'] != 1 && $unidades[$i]['id_unidad'] != 38): ?>
												            <option value="<?php echo $unidades[$i]['id_unidad'] ?>"><?php echo $unidades[$i]['unidad'] ?></option>
											<?php endif; ?>

											<?php endfor; ?>
											</select>
										</div>
										<div class="col-md-4" style="padding-top: 10px">
											<button type="submit"><img height="50" width="50" src="<?php echo base_url()?>assets/Reporteria/excel.png"></button>
										</div>
										
									</div>
									
									
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
		 		</form>
		 		<?php endif; ?>
			<!--REPORTE 6-->


			<!--REPORTE 8-->
				<div class="col-md-4">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-arrows" aria-hidden="true"></i> Reporte de movimientos</h3>
								</div>
								<div class="panel-body text-center">
									<p>Reporte de todos los movimientos y asignaciones por año y por mes</p><br>
									<div class="row">
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalAno">Por año</button>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalMes">Por mes</button>
									</div>
									
									
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
			<!--REPORTE 8-->

             
			<!--REPORTE 11-->
			<form method="post" action="<?php echo base_url()?>Reporte11_controller/reporte11">
				<div class="col-md-4">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-desktop" aria-hidden="true"></i> Reporte general por unidad</h3>
								</div>
								<div class="panel-body text-center">
									<p>Reporte total del inventario es decir como se cierra el año por departamento (PC)</p>
									<div class="row">
										<div class="col-md-8">
											<label>Unidad</label>
											<select name="unidad" id="unidad" class="form-control">
												<option value="todo">Todo</option>
											<?php for ($i=0; $i <count($unidades) ; $i++): ?>
												
												<?php if($unidades[$i]['id_unidad'] != 4 && $unidades[$i]['id_unidad'] != 1 && $unidades[$i]['id_unidad'] != 38): ?>
												            <option value="<?php echo $unidades[$i]['id_unidad'] ?>"><?php echo $unidades[$i]['unidad'] ?></option>
											<?php endif; ?>

											<?php endfor; ?>
											</select>
										</div>
										<div class="col-md-4" style="padding-top: 10px">
											<button type="submit"><img height="50" width="50" src="<?php echo base_url()?>assets/Reporteria/excel.png"></button>
										</div>
										
									</div>
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
		 		 </form>
			<!--REPORTE 11-->
			

			<!--REPORTE 7 por unidad-->
			<form method="post" action="<?php echo base_url()?>Reporte7_controller/reporte7">
				<div class="col-md-4">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-battery-full" aria-hidden="true"></i> Reporte de UPS unidad</h3>
								</div>
								<div class="panel-body text-center">
									<p>Reporte general de todos los UPS por unidad - administrativo y laboratorios</p>
									<div class="row">
										<div class="col-md-8">
											<label>Unidad</label>
											<select name="unidad4" id="unidad4" class="form-control">
											<?php for ($i=0; $i <count($unidades) ; $i++): ?>
												
												<?php if($unidades[$i]['id_unidad'] != 4 && $unidades[$i]['id_unidad'] != 1 && $unidades[$i]['id_unidad'] != 38): ?>
												            <option value="<?php echo $unidades[$i]['id_unidad'] ?>"><?php echo $unidades[$i]['unidad'] ?></option>
											<?php endif; ?>

											<?php endfor; ?>
											</select>
										</div>
										<div class="col-md-4" style="padding-top: 10px">
											<button type="submit"><img height="50" width="50" src="<?php echo base_url()?>assets/Reporteria/excel.png"></button>
										</div>
										
									</div>
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
		 		 </form>
			<!--REPORTE 7 por unidad-->


				<!--REPORTE 7 por codigo-->
				<div class="col-md-4">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-battery-full" aria-hidden="true"></i> Consulta de UPS</h3>
								</div>
								<div class="panel-body text-center">
									<p>Realiza una consulta para poder ver un UPS ingresando el codigo</p>
									<div class="row">
										<div class="col-md-8">
											<label id="label"><span id="span">Codigo:</span></label>
											<input type="text" class="form-control" name="cod" id="cod">
										</div>
										<div class="col-md-4" style="padding-top: 10px; padding-bottom: 10px" >
											<br>
											<button type="button" onclick="reporte7();" class="btn btn-info btn-xs">Consultar</button>
										</div>
										
									</div>
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
			<!--REPORTE 7 por codigo-->


			<!--REPORTE 4 por codigo-->
				<div class="col-md-4">
					<form method="post" action="<?php echo base_url()?>Reporte4_controller/reporte4">
			         <!-- PANEL HEADLINE -->
							<div class="panel panel-headline">
									<div class="panel-heading">
										<h3 class="panel-title"><i class="fa fa-shopping-cart" aria-hidden="true"></i></i> Reporte de compras</h3>
									</div>
									<div class="panel-body text-center">
										<p>Reporte de compras por año para administración y laboratorios</p>
										<div class="row">
											<div class="col-md-8">
												<label id="label"><span id="span">Año:</span></label>

												<input required="" value="<?php echo date("Y") ?>" class="form-control" type="number" min="1000" max="5000" name="year">
											</div>
											<div class="col-md-4" style="padding-top: 10px">
												<button type="submit"><img height="50" width="50" src="<?php echo base_url()?>assets/Reporteria/excel.png"></button>
											</div>
											
										</div>
									</div>
							</div>
					<!-- END PANEL HEADLINE -->
					</form>
		 		 </div>
			<!--REPORTE 4 por codigo-->


     <!--REPORTE 9-->
    <?php if($this->session->userdata('rol') == "super usuario"): ?>
		<div class="col-md-8">
			<form method="post" action="<?php echo base_url()?>Reporte9_controller/reporte_9">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-pencil-square-o " aria-hidden="true"></i> Reporte equipo nuevo en el inventario</h3>
								</div>
								<div class="panel-body text-center">
									<p>Reporte de los equipos nuevos agregados al inventario en el año.</p>
									<div class="row">
										<div class="col-md-4">
											<label>Año</label>
											<input required="" value="<?php echo date("Y") ?>" class="form-control" type="number" min="1000" max="5000" name="anio_9">
										</div>

										<div class="col-md-4">
											<label>Fecha de compra</label>
											<select name="fecha_9" id="fecha_9" class="form-control">
												<option value="1">Semestre 1</option>
												<option value="2">Semestre 2</option>
												<option value="anual">Anual</option>
											</select>
										</div>

										
										<div class="col-md-4" style="padding-top: 10px">
											<button type="submit"><img height="50" width="50" src="<?php echo base_url()?>assets/Reporteria/excel.png"></button>
										</div>
									</div>
									<br>
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 	</form>

		</div>
		 <!--REPORTE 9-->
		
			<!--   REORTES PARA LA GERENTE   -->
			

		 	<!--REPORTE 12-->
		 	<div class="col-md-6">
		 		<form method="post" action="<?php echo base_url()?>Reporte12_controller/reporte_12">
				<div class="col-md-12">
		        	<!-- PANEL HEADLINE -->
					<div class="panel panel-headline">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-pencil-square-o " aria-hidden="true"></i> Reporte detalle de equipo</h3>
							</div>
							<div class="panel-body text-center">
								<p>detalle de equipos por unidad, encargado o código pc</p>
								<div class="row">
									<div class="col-md-4">
										<label>Consultar por:</label>
										<select class="form-control" name="consulta12" id="consulta12">
											<option value="1">Unidad</option>
											<option value="2">Nombre del encargado</option>
											<option value="3">Código PC</option>
										</select>
									</div>
									<div id="dato_12" class="col-md-4">
										
									</div>
									<div class="col-md-4" style="padding-top: 10px">
										<button type="submit"><img height="50" width="50" src="<?php echo base_url()?>assets/Reporteria/excel.png"></button>
									</div>
								</div>
							</div>
					</div>
					<!-- END PANEL HEADLINE -->
		 		</div>
		 	</form>
		 	</div>
			
		

		<div class="col-md-6">
			<!--REPORTE 10 Reporte de cambio de computadoras por unidad-->
			<form method="post" action="<?php echo base_url()?>Reporte10_controller/reporte_10">
		        	<!-- PANEL HEADLINE -->
					<div class="panel panel-headline">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-arrows" aria-hidden="true"></i> Reporte cambio de computadora</h3>
							</div>
							<div class="panel-body text-center">
								<p>movimiento de computadoras por unidad</p>
								<div class="row">
									<div class="col-md-4">
										<label>UNIDAD:</label>
										<select class="form-control" name="unidad10" id="unidad10">'+
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
									<div class="col-md-3">
										<label for="">Mes:</label>
										<select class="form-control" name="mes_10" id="mes_10">
											<option value=01>Enero</option>
											<option value=02>Febrero</option>
											<option value=03>Marzo</option>
											<option value=04>Abril</option>
											<option value=05>Mayo</option>
											<option value=06>Junio</option>
											<option value=07>Julio</option>
											<option value=08>Agosto</option>
											<option value=09>Septiembre</option>
											<option value=10>Octubre</option>
											<option value=11>Noviembre</option>
											<option value=12>Diciembre</option>
										</select>
									</div>
									<div class="col-md-3">
											<label>Año</label>
											<input required="" value="<?php echo date("Y") ?>" class="form-control" type="number" min="1000" max="5000" name="anio_10">
										</div>
									<div class="col-md-2" style="padding-top: 10px">
										<button type="submit"><img height="50" width="50" src="<?php echo base_url()?>assets/Reporteria/excel.png"></button>
									</div>
								</div>
							</div>
					</div>
					<!-- END PANEL HEADLINE -->
		 	</form>
		
	</div>
 <?php endif; ?>
<!-- script para reportes de gerencia -->
<script>
	var valor;

	$(document).ready(function(){
		valor = $('#consulta12').val();
		//console.log(valor);
		var html = '<label id="label_parametro" for="parametro">Parametro</label>'+
							'<select class="form-control" name="parametro12" id="parametro12">'+
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
				$('#dato_12').append(html);

	});

	$('#consulta12').change(function(){
		valor = $(this).val();console.log(valor);
		switch(valor)
		{
			case "1":
				console.log('select');
				$('#label_parametro').remove();
				$('#parametro12').remove();

				var html='';

				var html = '<label id="label_parametro" for="parametro">Parametro</label>'+
							'<select class="form-control" name="parametro12" id="parametro12">'+
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
				$('#dato_12').append(html);

				////////////////////
			break;
			case "2":
			case "3":
				$('#label_parametro').remove();
				$('#parametro12').remove();
				var html = '';
				html += '<label id="label_parametro" for="parametro">Parametro</label>'+
						'<input name="parametro12" id="parametro12" type="text" class="form-control" required>';
				$('#dato_12').append(html);
			break;
		}
	});
</script>

<script type="text/javascript">
	
   $('#unidad').append('<option value="lab-01">LAB-01</option><option value="lab-02">LAB-02</option>'+
   '<option value="lab-03">LAB-03</option><option value="lab-04">LAB-04</option><option value="lab-05">LAB-05</option>'+
   '<option value="lab-red">LAB-RED</option><option value="lab-hw">LAB-HW</option>');


   $('#unidad4').append('<option value="01">LAB-01</option><option value="02">LAB-02</option>'+
   '<option value="03">LAB-03</option><option value="04">LAB-04</option><option value="05">LAB-05</option>'+
   '<option value="red">LAB-RED</option><option value="hw">LAB-HW</option>');
</script>


<script type="text/javascript">
	
	function reporte7() {

		$('#hijito').remove();
		$('#mami').append('<div id="hijito"></div>');
		
		var codigo =  $('#cod').val();

		if(codigo ==""){
			$('#span').remove();
			$('#label').append('<span id="span" class="color" >Codigo: Error</span>');
		}else{
	        $('#span').remove();
			$('#label').append('<span id="span">Codigo:</span>');

			                $.ajax({
									type: 'ajax',
									method: 'post',
									url: '<?php echo base_url() ?>Reporte7_controller/reporte_code',
									data: {dato: codigo},
									async: false,
									dataType: 'json',
									success: function(data){
										console.log(data);

								     if(data.infoUPS.length > 0){
										if(data.centinela == "lab"){
                                          $('#exampleModal').modal('show');
                                          var html5 = '<h4>Codigo de PC: <strong>'+data.infoUPS[0].pc_servidor_id+'</strong></h4>'+
                                          '<h4>Nombre del equipo: <strong>'+data.infoPC[0].nombre+'</strong></h4>'+
                                          '<h4>Marca: <strong>'+data.infoUPS[0].marca+'</strong></h4>'+
                                          '<h4>Modelo/tipo: <strong>'+data.infoUPS[0].nombre+'</strong></h4>'+
                                          '<h4>Serial: <strong>'+data.infoUPS[0].serial+'</strong></h4>'+
                                          '<h4>Codigo UPS: <strong>'+data.ups[0].identificador_lab+'</strong></h4>';
                                          $('#hijito').append(html5);
										}else{
											$('#exampleModal').modal('show');
                                          var html5 = '<h4>Codigo de PC: <strong>'+data.infoUPS[0].pc_servidor_id+'</strong></h4>'+
                                          '<h4>Encargado: <strong>'+data.pc_inventario[0].encargado_puesto+'</strong></h4>'+
                                          '<h4>Nombre del equipo: <strong>'+data.infoPC[0].nombre+'</strong></h4>'+
                                          '<h4>Marca: <strong>'+data.infoUPS[0].marca+'</strong></h4>'+
                                          '<h4>Modelo/tipo: <strong>'+data.infoUPS[0].nombre+'</strong></h4>'+
                                          '<h4>Serial: <strong>'+data.infoUPS[0].serial+'</strong></h4>'+
                                          '<h4>Codigo UPS: <strong>'+data.ups[0].identificador+'</strong></h4>';
                                          $('#hijito').append(html5);
										}
									  }else{
									  	$('#span').remove();
			                            $('#label').append('<span id="span" class="color" >Codigo: El codigo no existe</span>');
									  }
									},
									error: function(){
										$('#span').remove();
			                            $('#label').append('<span id="span" class="color" >Codigo: El codigo no existe</span>');
									}

								});

		}


	}

</script>



<!--MODAL REPORTE 7 CODE -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="mami" class="modal-body">
        <div id="hijito">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
<!--MODAL REPORTE 7 CODE -->


















<!--MODAL REPORTE 8-->
	<!-- Button trigger modal -->


<!-- Modal -->
<form method="post" action="<?php echo base_url()?>Reporte8_controller/reporte8_year" >
<div class="modal fade" id="exampleModalAno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Año</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <label>Ingrese un año:</label>
      		<input required="" value="<?php echo date("Y") ?>" class="form-control" type="number" min="1000" max="5000" name="year">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit"><img height="50" width="50" src="<?php echo base_url()?>assets/Reporteria/excel.png"></button>
      </div>
    </div>
  </div>
</div>
</form>



<form  method="post" action="<?php echo base_url()?>Reporte8_controller/reporte8_mes">
<div class="modal fade" id="exampleModalMes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
           <label>Ingrese mes</label>          
           <select name="dia" class="form-control">
            <option value="01">Enero</option>
            <option value="02">Febrero</option>
            <option value="03">Marzo</option>
            <option value="04">Abril</option>
            <option value="05">Mayo</option>
            <option value="06">Junio</option>
            <option value="07">Julio</option>
            <option value="08">Agosto</option>
            <option value="09">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
           </select>
           <label>Ingrese año</label>          
          <input required="" min="1000" max="5000" value="<?php echo date("Y") ?>" class="form-control" type="number" name="year">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit"><img height="50" width="50" src="<?php echo base_url()?>assets/Reporteria/excel.png"></button>
      </div>
    </div>
  </div>
</div>
</form>
<!--MODAL REPORTE 8-->





    <!--FIN CONTENIDO DE LA APLICACION-->

    
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
