<!DOCTYPE html>
<html>
<head>
	<title>Area administrativa</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->

	
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->
    <script src="<?php echo base_url()?>assets/package/dist/sweetalert2.all.min.js"></script>
   <script src="<?php echo base_url()?>assets/package/dist/sweetalert2.min.js"></script>

    <!--CONTENIDO DE LA APLICACION-->

    <!--NAVEGACIÓN ADMINISTRATIVA-->
	<ul class="nav nav-pills">
	  <li class="nav-item">
	    <a class="nav-link active" href="<?php echo base_url()?>areas-administrativas">Áreas administrativas</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="<?php echo base_url('listado-elementos/'.$op='general')?>">Listado General</a>
	  </li>
	  
	</ul>
    <!--NAVEGACIÓN ADMINISTRATIVA-->

    <?php if($this->session->flashdata('buy')):  ?>
        <script type="text/javascript">
          swal({
           type: 'success',
           title: 'ELEMENTO AGREGADO CORRECTAMENTE',
           });
        </script>
    <?php endif; ?>



	
	<div class="">
		<div class="row">
			<div class="text-center">
	 			<h2>Áreas administrativas</h2>
	 			<br>
	 		</div>
		</div>
 	<div class="row">
 		<div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Academica</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='academica')?>"><i class="fa fa-university fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Gerencia general</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='gerencia_general')?>"><i class="fa fa-suitcase fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Contabilidad</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='contabilidad')?>"><i class="fa fa-calculator fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">RRHH</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='RRHH')?>"><i class="fa fa-handshake-o fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 	</div>

 	<div class="row">
 		<div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Planificación</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='planificacion')?>"><i class="fa fa-users fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Biblioteca</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='biblioteca')?>"><i class="fa fa-book fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">ICTUSAM</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='ICTUSAM')?>"><i class="fa fa-home fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Medicina</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='medicina')?>"><i class="fa fa-stethoscope fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 	</div>

 	<div class="row">
 		<div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Proyección social</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='proyeccion_social')?>"><i class="fa fa-calendar fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Extensión cultural</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='extension_cultural')?>"><i class="fa fa-language fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Colecturia</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='colecturia')?>"><i class="fa fa-money fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Secretaria general</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='secretaria_general')?>"><i class="fa fa-folder fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 	</div>

	<div class="row">
 		<div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Egresados y graduados</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='egresados_graduados')?>"><i class="fa fa-graduation-cap fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						
						<div class="panel-heading">
							<h3 class="panel-title">Ciencias empresariales</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='ciencias_empresariales')?>"><i class="fa fa-shopping-bag fa-4x" aria-hidden="true"></i> </a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Rectoria y vicerrectoria</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='rectoria_vicerrectoria')?>"><i class="fa fa-university fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Decanato de jurisprudencia</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='decanato_jurisprudencia')?>"><i class="fa fa-balance-scale fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 	</div>
	
	<div class="row">
 		<div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Odontologia</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='odontologia')?>"><i class="fa fa-stethoscope fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Veterinaria</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='veterinaria')?>"><i class="fa fa-paw fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Quimica y farmacia</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='quimica_farmacia')?>"><i class="fa fa-flask fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Gestión educativa</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='gestion_educativa')?>"><i class="fa fa-folder-open fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 	</div>

 	<div class="row">
 		<div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Control de calidad</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='control_calidad')?>"><i class="fa fa-thumbs-o-up fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						
						<div class="panel-heading">
							<h3 class="panel-title">Ultrasonografia</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='ultrasonografia')?>"><i class="fa fa-square fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Informatica</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='informatica')?>"><i class="fa fa-desktop fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Relaciones publicas</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='relaciones_publicas')?>"><i class="fa fa-users fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 	</div>

	<div class="row">
 		<div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Fiscalia</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='fiscalia')?>"><i class="fa fa-gavel fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Bodega informática</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='bodega_informatica')?>"><i class="fa fa-archive fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">URNI</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='URNI')?>"><i class="fa fa-paper-plane fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
									<h3 class="panel-title">Enfermeria</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='enfermeria')?>"><i class="fa fa-heartbeat fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 	</div>
	
	<div class="row">
 		<div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">CEFADE</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='CEFADE')?>"><i class="fa fa-th-large fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">OFAL</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='OFAL')?>"><i class="fa fa-home fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Almacen y bodega</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='almacen_bodega')?>"><i class="fa fa-archive fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Celula de quimica</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='celula_quimica')?>"><i class="fa fa-flask fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 	</div>

 	<div class="row">
 		<div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Proyecto USAID</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='USAID')?>"><i class="fa fa-desktop fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		</div>


 		 <div class="col-md-3">
         <!-- PANEL HEADLINE -->
				<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Otros Proyectos</h3>
						</div>
						<div class="panel-body text-center">
							<a href="<?php echo base_url('listado-elementos/'.$op='otros_proyectos')?>"><i class="fa fa-desktop fa-4x" aria-hidden="true"></i></a>
						</div>
				</div>
		<!-- END PANEL HEADLINE -->
 		 </div>
 	</div>

 </div>


    <!--FIN CONTENIDO DE LA APLICACION-->

    
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>