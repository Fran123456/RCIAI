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
	

	<div class="">
		<div class="row">
			<div class="text-center">
	 			<h2>MOVIMIENTOS</h2>
	 			<br>
	 		</div>
		</div>
 	<div class="row">
 		<div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Sustituciones</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-sustituciones')?>"><i class="fa fa-refresh fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Asignación</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-asignaciones') ?>"><i class="glyphicon glyphicon-pushpin" style="font-size:55px" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Prestamo</h3>
						</div>
						<div class="panel-body text-center">
							<a href=""><i class="fa fa-share-alt fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Software</h3>
						</div>
						<div class="panel-body text-center">
							<a href=""><i class="fa fa-file-text fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 	</div>




    <!--FIN CONTENIDO DE LA APLICACION-->

    
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
