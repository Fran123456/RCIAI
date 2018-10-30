<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
    <style type="text/css">
		.margen{
			margin-left: 120px;
			margin-right: 120px;
			margin-top: 20px;
		}
		.margenAlert{
			margin-left: 300px;
			margin-right: 300px;
		}
		.borde{
			 border-top-width: 10px;
			  border-right-width: 1em;
			  border-bottom-width: thick;
			  border-left-width: thin;
		}
	</style>
	<script src="<?php echo base_url()?>assets/package/dist/sweetalert2.all.min.js"></script>
 <script src="<?php echo base_url()?>assets/package/dist/sweetalert2.min.js"></script>
	 <link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->


    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->


<!--CONTENIDO DE LA APLICACION-->
 <div class="margenAlert">
            <?php if(isset($mensaje)): ?>
            	    <?php if($mensaje[1] == false): ?>
			             <div class="alert alert-danger alert-dismissible " role="alert">
							     <?php echo $mensaje[0] ?>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>
						 <?php else: ?>
						 	<div class="alert alert-success alert-dismissible " role="alert">
							          <?php echo $mensaje[0] ?>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>
					     <?php endif; ?>
				   <?php endif; ?>

				   <?php if(isset($msm)): ?>
                             <div class="alert alert-danger alert-dismissible " role="alert">
							          <?php echo $msm ?>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>
				   <?php endif; ?>



		<?php if($this->session->flashdata('success')): ?>
		 <script type="text/javascript">
			 swal({
				type: 'success',
				title: 'ANUNCIO PUBLICADO CORRECTAMENTE',
			});
		 </script>
		<?php endif; ?>

		<?php if($this->session->flashdata('success1')): ?>
		 <script type="text/javascript">
			 swal({
				type: 'success',
				title: 'PC AGREGADA CORRECTAMENTE',
			});
		 </script>
		<?php endif; ?>


		<?php if($this->session->flashdata('mistake')): ?>
		 <div class="alert alert-success alert-dismissible " role="alert">
		  <strong><?php echo $this->session->flashdata('mistake') ?></strong>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<?php endif; ?>

 </div>



 <div class="">
 	<div class="row">
 		<div class="text-center">
 			<h2>RESUMEN</h2>
 			<br>
 		</div>
 		<div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
									<h3 class="panel-title">N° elementos en inventario de bodega</h3>
						</div>
						<div class="panel-body text-center">
							<i class="fa fa-th-large fa-4x" aria-hidden="true"></i>
						   <h2><?php echo $data['n_bodega'] ?></h2>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
									<h3 class="panel-title">N° elementos en inventario administrativo</h3>
						</div>
						<div class="panel-body text-center">
							<i class="fa fa-archive fa-4x" aria-hidden="true"></i>
						   <h2><?php echo $data['n_admin'] ?></h2>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
									<h3 class="panel-title">N° de compras realizadas por los usuarios</h3>
						</div>
						<div class="panel-body text-center">
							<i class="fa fa-shopping-cart fa-4x" aria-hidden="true"></i>
						   <h2><?php echo $data['n_compra'] ?></h2>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
									<h3 class="panel-title">N° elementos en inventario de laboratorios</h3>
						</div>
						<div class="panel-body text-center">
							<i class="fa fa-desktop fa-4x" aria-hidden="true"></i>
						   <h2><h2><?php echo $data['n_labo'] ?></h2></h2>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 	</div>
 </div>
<hr>
 <div class="row">
 	<div class="text-center">
 		<h2>INFORMACIÓN ADICIONAL</h2>
 		<br>
 	</div>
  <!--inicio-->

	<div class="panel panel-headline">
						<div class="panel-heading">
							<h4 class="panel-title">Datos actualizados <?php echo $hoy['mday']. "/".$hoy['mon']."/".$hoy['year']?></h4>
							<p ></p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12 col-sm-12">

								</div>
								<div class="col-md-12 col-sm-12">
									<div class="row">

										<?php if( $data['n_PC_admin']> 0): ?>
										<div class="col-md-12">
											<div class="metric">
												<span class="icon"><i class="fa fa-desktop"></i></span>
												<p>
													<span class="number"> <?php echo $data['n_PC_admin'] ?> </span>
													<span class="title">N° PC en inventario administrativo</span>
												</p>
											</div>
										</div>
										<?php endif; ?>

										<?php if( $data['n_DDE_admin']> 0): ?>
										<div class="col-md-12">
											<div class="metric">
												<span class="icon"><i class="fa fa-desktop"></i></span>
												<p>
													<span class="number"> <?php echo $data['n_DDE_admin'] ?> </span>
													<span class="title">N° discos externos en inventario administrativo</span>
												</p>
											</div>
										</div>
										<?php endif; ?>

										<?php if($data['n_laptop_admin']> 0): ?>
										<div class="col-md-12">
											<div class="metric">
												<span class="icon"><i class="fa fa-desktop"></i></span>
												<p>
													<span class="number"> <?php echo $data['n_laptop_admin'] ?> </span>
													<span class="title">N° de laptop en inventario administrativo</span>
												</p>
											</div>
										</div>
										<?php endif; ?>

										<br>
										<?php for($i = 0; $i < count($data['n_elements_bodega']['elementos']); $i++): ?>
										  <?php if($data['n_elements_bodega']['total'][$i] > 0): ?>
											<div class="col-md-12">
												<div class="metric">
													<span class="icon"><i class="fa fa-desktop"></i></span>
													<p>
														<span class="number"> <?php echo $data['n_elements_bodega']['total'][$i]; ?> </span>
														<span class="title">N° de <?php echo $data['n_elements_bodega']['elementos'][$i]; ?> en inventario de bodega</span>
													</p>
												</div>
										 	</div>
										 	<br>
									 	<?php endif; ?>
									 <?php endfor; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
  <!--fin-->
 </div>





<!--FIN CONTENIDO DE LA APLICACION-->


    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
