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
	
	<ul class="nav nav-pills">
	  <li class="nav-item">
	    <a class="nav-link active" href="<?php echo base_url()?>areas-administrativas">Áreas administrativas</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="<?php echo base_url('listado-elementos/'.$op='general')?>">Listado General</a>
	  </li>
	</ul>

	<!-- vamos a crear un listado de cada uno de los elementos que tiene o tendria cada área-->
		<h2>Elementos en <?php echo $msj ?> </h2> 
	<div class="container" >
		<div class="row">
			<!-- PC completas-->
				<div class="col-md-3">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Computadoras</h3>
								</div>
								<div class="panel-body text-center">
									<a href="<?php echo base_url('listado/'.$op=$unidad.'/'.$elemento='PC')?>"><i class="fa fa-desktop fa-4x" aria-hidden="true"></i></a>
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
			<!---->

			<!--laptops-->
				<div class="col-md-3">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Laptop</h3>
								</div>
								<div class="panel-body text-center">
									<a href="<?php echo base_url('listado/'.$op=$unidad.'/'.$elemento='LA')?>"><i class="fa fa-laptop fa-4x" aria-hidden="true"></i></a>
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
			<!---->

			<!--DDE-->
				<div class="col-md-3">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Disco duro externo</h3>
								</div>
								<div class="panel-body text-center">
									<a href="<?php echo base_url('listado/'.$op=$unidad.'/'.$elemento='DD')?>"><i class="fa fa-inbox fa-4x" aria-hidden="true"></i></a>
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
			<!---->

			<!--SERVIDORES -->
				<div class="col-md-3">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Servidores</h3>
								</div>
								<div class="panel-body text-center">
									<a href="<?php echo base_url('listado/'.$op=$unidad.'/'.$elemento='SV')?>"><i class="fa fa-server fa-4x" aria-hidden="true"></i></a>
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
			<!---->

			<!--UPS -->
				<div class="col-md-3">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">UPS</h3>
								</div>
								<div class="panel-body text-center">
									<a href="<?php echo base_url('listado/'.$op=$unidad.'/'.$elemento='UP')?>"><i class="fa fa-archive fa-4x" aria-hidden="true"></i></a>
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
			<!---->

			<!--Acces Point Radio -->
				<div class="col-md-3">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Access point</h3>
								</div>
								<div class="panel-body text-center">
									<a href="<?php echo base_url('listado/'.$op=$unidad.'/'.$elemento='AP')?>"><i class="fa fa-wifi fa-4x" aria-hidden="true"></i></a>
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
			<!---->

			<!--Web cam -->
				<div class="col-md-3">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Web cam</h3>
								</div>
								<div class="panel-body text-center">
									<a href="<?php echo base_url('listado/'.$op=$unidad.'/'.$elemento='WE')?>"><i class="fa fa-camera fa-4x" aria-hidden="true"></i></a>
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
			<!---->

			<!--Impresoras -->
				<div class="col-md-3">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Impresoras</h3>
								</div>
								<div class="panel-body text-center">
									<a href="<?php echo base_url('listado/'.$op=$unidad.'/'.$elemento='IM')?>"><i class="fa fa-print fa-4x" aria-hidden="true"></i></a>
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
			<!---->

		</div>
	</div>

    <!--FIN CONTENIDO DE LA APLICACION-->

    
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>