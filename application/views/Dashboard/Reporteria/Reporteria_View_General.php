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
	
	
	<!-- vamos a crear un listado de cada uno de los elementos que tiene o tendria cada área-->
		<h2>Reporteria </h2> 
		<hr>
	<div class="container" >
		<div class="row">
			
			<!--REPORTE 5-->
				<div class="col-md-4">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-laptop" aria-hidden="true"></i> Reporte de laptop</h3>
								</div>
								<div class="panel-body text-center">
									<p>Reporte laptop que existen en el inventario</p>
									<div class="row">
											<a target="_blank" href="<?php echo base_url()?>Reporte5_controller/reporte5"><img height="50" width="50" src="<?php echo base_url()?>assets/Reporteria/excel.png"></a>
									</div>
									
									
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
			<!--REPORTE 5-->



		</div>
	</div>

    <!--FIN CONTENIDO DE LA APLICACION-->

    
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
