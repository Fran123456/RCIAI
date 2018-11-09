<!DOCTYPE html>
<html>
<head>
	<title>Detalle</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
	<script src="<?php echo base_url()?>assets/package/dist/sweetalert2.all.min.js"></script>
	  <script src="<?php echo base_url()?>assets/package/dist/sweetalert2.min.js"></script>

</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->
<?php if($detalle!=false) {?>
    <!--CONTENIDO DE LA APLICACION-->
    <?php foreach($detalle as $key){ ?>
			<?php if($this->session->flashdata('buyxx')): ?>
				<script type="text/javascript">
				swal({
			     	 type: 'success',
				   title: 'ELEMENTO AGREGADO CORRECTAMENTE',
				   });
				</script>
		 <?php endif; ?>
	<div class="content">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Serial</label>
						<input type="text" class="form-control" readonly="" id="serial" value="<?php echo empty($key->serial) ? 'no disponible' : $key->serial   ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" class="form-control" readonly="" id="nombre" value="<?php echo empty($key->nombre) ? 'no disponible' : $key->nombre  ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Marca</label>
						<input type="text" class="form-control" readonly=""  id="marca" value="<?php echo empty($key->marca) ? 'no disponible' : $key->marca  ?>">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Capacidad</label>
						<input type="text" class="form-control" readonly="" id="capacidad" value="<?php echo empty($key->capacidad) ? 'no disponible' : $key->capacidad  ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Tipo</label>
						<input type="text" class="form-control" readonly="" id=tipo value="<?php echo empty($key->tipo) ? 'no disponible' : $key->tipo  ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Velocidad</label>
						<input type="text" class="form-control" readonly="" id="velocidad" value="<?php echo empty($key->velocidad) ? 'no disponible' : $key->velocidad  ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Estatus</label>
						<input type="text" class="form-control" readonly="" id="estatus" value="<?php echo empty($key->estatus) ? 'no disponible' : $key->estatus  ?>">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Fecha ingreso</label>
						<input type="text" class="form-control" readonly="" id="fecha_ingreso" value="<?php echo empty($key->fecha_ingreso) ? 'no disponible' : $key->fecha_ingreso  ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Origen</label>
						<input type="text" class="form-control" readonly="" id="origen" value="<?php echo empty($key->origen[0]['unidad']) ? 'no disponible' : $key->origen[0]['unidad']  ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Fecha salida</label>
						<input type="text" class="form-control" readonly="" id="fecha_salida" value="<?php echo empty($key->fecha_salida) ? 'no disponible' : $key->fecha_salida  ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Destino</label>
						<input type="text" class="form-control" readonly="" id="destino" value="<?php echo empty($key->destino[0]['unidad']) ? 'no disponible' : $key->destino[0]['unidad']  ?>">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Compra asociada</label>
						<input type="text" class="form-control" readonly="" id="compra_asociada" value="<?php echo empty($key->compra_id) ? 'no disponible' : $key->compra_id  ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>PC asociado</label>
						<input type="text" class="form-control" id="pc_asociado" readonly="" value="<?php echo empty($key->pc_servidor_id) ? 'no disponible' : $key->pc_servidor_id  ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Fecha orden</label>
						<input type="text" class="form-control" readonly="" id="fecha_orden" value="<?php echo empty($key->fecha_orden) ? 'no disponible' : $key->fecha_orden  ?>">
					</div>
				</div>
			</div>
	</div>
	<?php } ?>
	<?php } else {?>
		<center>
			<h3>SIN REGISTROS EN LA BASE DE DATOS</h3>
		</center>
	<?php } ?>
    <!--FIN CONTENIDO DE LA APLICACION-->

    <a href="<?php echo base_url()?>bodega_Controller" class="btn btn-success">ATRAS</a>
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
	<script>
		$(document).ready(function(){
				comprobacion();

			function comprobacion(){
				if($('#pc_asociado').val() == 'no disponible'){
					$('#pc_asociado').css("color",'red');
				}
				if($('#serial').val() == 'no disponible'){
					$('#serial').css("color",'red');
				}
				if($('#nombre').val() == 'no disponible'){
					$('#nombre').css("color",'red');
				}
				if($('#marca').val() == 'no disponible'){
					$('#marca').css("color",'red');
				}
				if($('#capacidad').val() == 'no disponible'){
					$('#capacidad').css("color",'red');
				}
				if($('#tipo').val() == 'no disponible'){
					$('#tipo').css("color",'red');
				}
				if($('#velocidad').val() == 'no disponible'){
					$('#velocidad').css("color",'red');
				}
				if($('#estatus').val() == 'no disponible'){
					$('#estatus').css("color",'red');
				}
				if($('#fecha_ingreso').val() == 'no disponible'){
					$('#fecha_ingreso').css("color",'red');
				}
				if($('#origen').val() == 'no disponible'){
					$('#origen').val('Desconocido');
					//$('#origen').css("color",'red');
				}
				if($('#fecha_salida').val() == 'no disponible'){
					$('#fecha_salida').css("color",'red');
				}
				if($('#destino').val() == 'no disponible'){
					$('#destino').css("color",'red');
				}
				if($('#compra_asociada').val() == 'no disponible'){
					$('#compra_asociada').css("color",'red');
				}
				if($('#fecha_orden').val() == 'no disponible'){
					$('#fecha_orden').css("color",'red');
				}
			}
		});
	</script>


</body>
</html>
