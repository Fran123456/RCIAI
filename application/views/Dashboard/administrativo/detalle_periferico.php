<!DOCTYPE html>
<html>
<head>
	<title>Periferico</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->

	<style type="text/css" media="screen">
		.content1{
		    margin-top: 20px; 
		    margin-bottom: 20px;
		    margin-right: 20px; 
		    margin-left: 20px;
		}
	</style>
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url()?>assets/css/app/shopping.css ">

	<script src="<?php echo base_url()?>assets/package/dist/sweetalert2.all.min.js"></script>
	<script src="<?php echo base_url()?>assets/package/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->
	
	<!--vamos a crear la vista para el detalle de los disco duros-->
	<?php if($this->session->flashdata('success')): ?>
	<script type="text/javascript">
		swal({
				  type: 'success',
				  title: 'Periferico asignado correctamente',
		});
	</script>
	<?php endif; ?>
	<div class="content1">
		<center>
			<h3>Detalle de <?php echo $msj; ?> </h3>
		</center>
		<?php if($detalle != false) {?>
			<?php foreach ($detalle as $key ) { ?>
				
			
			<div class="row">
				
				<div class="col-md-4">
					<div class="form-group">
						<label>Codigo <?php echo $msj; ?></label>
						<input type="text" class="form-control" id="codigoDDE" readonly="" value="<?php echo empty($key->identificador) ? 'no disponible' : $key->identificador  ?>">
					</div>
					
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Serial</label>
						<input type="text" class="form-control" id="serialDDE" readonly="" value="<?php echo empty($key->serial) ? 'no disponible' : $key->serial  ?>">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Encargado del puesto</label>
						<input type="text" class="form-control" id="encargadoDDE" readonly="" value="<?php echo empty($key->encargado_puesto) ? 'no disponible' : $key->encargado_puesto  ?>">
					</div>
				</div>
				
			</div>

			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Tipo</label>
						<input type="text" class="form-control" id="nombreDDE" readonly="" value="<?php echo empty($key->nombre) ? 'no disponible' : $key->nombre  ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Marca</label>
						<input type="text" class="form-control" id="marcaDDE" readonly="" value="<?php echo empty($key->marca) ? 'no disponible' : $key->marca  ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Capacidad</label>
						<input type="text" class="form-control" id="capacidadDDE" readonly="" value="<?php echo empty($key->capacidad) ? 'no disponible' : $key->capacidad  ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Tipo de periferico</label>
						<input type="text" class="form-control" id="tipoDDE" readonly="" value="<?php echo empty($key->tipo) ? 'no disponible' : $key->tipo  ?>">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Velocidad</label>
						<input type="text" class="form-control" id="velocidadDDE" readonly="" value="<?php echo empty($key->velocidad) ? 'no disponible' : $key->velocidad  ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Estado</label>
						<input type="text" class="form-control" id="estadoDDE" readonly="" value="<?php echo empty($key->estatus) ? 'no disponible' : $key->estatus  ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Fecha ingreso</label>
						<input type="text" class="form-control" id="f_ingresoDDE" readonly="" value="<?php echo empty($key->fecha_ingreso) ? 'no disponible' : $key->fecha_ingreso  ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Origen</label>
						<input type="text" class="form-control" id="origenDDE" readonly="" value="<?php echo empty($key->origen[0]['unidad']) ? 'no disponible' : $key->origen[0]['unidad']  ?>">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Fecha salida</label>
						<input type="text" class="form-control" id="f_salidaDDE" readonly="" value="<?php echo empty($key->fecha_salida) ? 'no disponible' : $key->fecha_salida  ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Destino</label>
						<input type="text" class="form-control" id="destinoDDE" readonly="" value="<?php echo empty($key->destino[0]['unidad']) ? 'no disponible' : $key->destino[0]['unidad']  ?>">
					</div>
				</div>
			</div>
			<?php } ?>
		<?php } else {?>
			<center>
				<h3>SIN REGISTROS EN LA BASE DE DATOS</h3>
			</center>
		<?php } ?>
	</div>

	<a class="btn btn-success" href="<?php echo base_url('listado/'.$op=$unidad.'/'.$origen=$equipo)?>">ATRAS</a>
    <!--FIN CONTENIDO DE LA APLICACION-->


    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
    <script src=" <?php echo base_url()?>assets/js/administrativo/administrativo.js"></script>
</body>
</html>