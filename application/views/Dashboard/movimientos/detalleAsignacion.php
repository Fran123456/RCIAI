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
	
	
	<!--verificamos si la variable es distinta de false-->
	<?php if($detalle != false) {?>
		<!--creamos el formulario-->
		<?php foreach($detalle as $d) {?>
		<div class="content">
			<div class="row">
				<div class="col-md-12">
					<center>
						<h3>Detalle de movimiento de asiganación</h3>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label >Fecha que se dio el cambio</label>
						<input type="date" class="form-control" id=""  readonly="" value="<?php echo $d->fecha_cambio ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label >codigo de equipo</label>
						<input type="text" class="form-control" id=""  readonly="" value="<?php echo $d->codigo_id ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label >Origen del equipo asignado</label>
						<input type="text" class="form-control" id=""  readonly="" value="<?php echo $d->origen_nuevoEquipo_id[0]['unidad'] ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label >Destino del equipo asignado</label>
						<input type="text" class="form-control" id=""  readonly="" value="<?php echo $d->destino_nuevoEquipo_id[0]['unidad'] ?>">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Tipo de cambio que sufrio el equipo</label>
						<input type="text" class="form-control" readonly="" value="<?php echo $d->cambio ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label >Encargado</label>
						<input type="text" class="form-control" id=""  readonly="" value="<?php echo $d->encargado ?>">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label >Tecnico</label>
						<input type="text" class="form-control" id=""  readonly="" value="<?php echo $d->tecnico ?>">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Descripción del cambio</label>
						<textarea name="" id="" cols="30" readonly="" rows="3"> <?php echo $d->descripcion_cambio ?> </textarea>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Descripción del equipo asignado</label>
						<textarea name="" id="" cols="30" readonly="" rows="3"> <?php echo $d->descripcion_equipoNuevo ?> </textarea>
					</div>
				</div>
			</div>
		</div>
		<!--fin del foreach-->
	<?php } ?>

	<?php } else { ?>
		<!--Desplegamos un mensaje que no hay datos-->
		<div>
			<center>
				<h3>SIN REGISTROS EN LA BASE DE DATOS</h3>
			</center>
		</div>
	<?php } ?>

	<!-- boton para regresar atras-->
	<a class="btn btn-success" href="<?php echo base_url('listado-asignaciones')?>">ATRAS</a>


    <!--FIN CONTENIDO DE LA APLICACION-->

    
    <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/js/movimientos/movimientos.js" ></script>
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
