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



    <!--FIN CONTENIDO DE LA APLICACION-->

    
    <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/js/movimientos/movimientos.js" ></script>
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
