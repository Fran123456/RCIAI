<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">

						<li><a href="<?php echo base_url()?>dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						
						<!--USERS-->
						<?php if($this->session->userdata('rol') == "super usuario" || $this->session->userdata('rol') == "root"): ?>
						<li><a href="<?php echo base_url() ?>users" class=""><i class="fa fa-user"></i><span>Usuarios</span></a></li>
					   <?php endif; ?>
					   <!--USERS-->

					  <?php if($this->session->userdata('rol') != "root"): ?>
						<li><a href="<?php echo base_url() ?>notifications"><i class="fa fa-comment"></i><span>Anuncios leidos</span></a></li>
					  <?php endif; ?>


                        
						<!--- REFERENTE A LAS COMPRAS -->
						<?php if($this->session->userdata('rol') == "administrador" || $this->session->userdata('rol') == "super usuario"): ?>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fa fa-shopping-cart"></i> <span>Compra</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="<?php echo base_url()?>add-buy" class="">Agrega compra fisica</a></li>
									<li><a href="<?php echo base_url()?>add-element-buy" class="">Agrega elemento a compra</a></li>
									<li><a href="<?php echo base_url()?>compras-pendientes" class="">Compras pendiente</a></li>

									<!--<li><a href="<?php // echo base_url()?>shopping" class="">Crea una compra fisica</a></li>-->
									<li><a href="<?php echo base_url()?>shopping-service" class="">Crea una compra de servicio</a></li>
									<li><a href="<?php echo base_url()?>shopping-admin" class="">Administración de compra fisica</a></li>
									<li><a href="<?php echo base_url()?>shopping-services" class="">Administración de servicio</a></li>
									<!--<li><a href="<?php echo base_url()?>shopping-others" class="">Compras independientes</a></li>-->
								</ul>
							</div>
						</li>
						<?php endif; ?>
						


						<!-- INVENTARIO DE BODEGA -->
                      <?php if($this->session->userdata('rol') != "root"): ?>
						<li>
							<a href="#subPagesA" data-toggle="collapse" class="collapsed"><i class="fa fa-th-large fa-4x"></i> <span>Bodega</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPagesA" class="collapse ">
								<ul class="nav">
									<li><a href="<?php echo base_url()?>inventario-bodega" class="">Inventario Bodega</a></li>
									<?php if($this->session->userdata('rol') == 'administrador' || $this->session->userdata('rol') == 'super usuario'): ?>
								<!--	<li><a href="<?php echo base_url()?>elementos-disponibles" class="">Asignar monitor</a></li>-->

									<li><a href="<?php echo base_url()?>computadoras-disponibles" class="">Disponibilidad de PC</a></li>
									<li><a href="<?php echo base_url()?>laptops-disponibles" class="">Disponibilidad de laptop</a></li>
									<li><a href="<?php echo base_url()?>DDE-disponibles" class="">Disponibilidad de DDE</a></li>
									<!--<li><a href="<?php echo base_url()?>otros-disponibles" class="">Asignar otros</a></li>-->
									<li><a href="<?php echo base_url()?>Sustituir-periferico" class="">Disponibilidad de perifericos</a></li>

									<li><a href="<?php echo base_url()?>cpu-disponibles" class="">Disponibilidad de CPU</a></li>

									<li><a href="<?php echo base_url()?>Sustituir-periferico-code" class="">Disponibilidad de perifericos con codigo</a></li>
									<li><a href="<?php echo base_url()?>bodega-add" class="">Agregar a bodega</a></li>
									

									<li><a href="<?php echo base_url()?>Eliminar-bodega" class="">Elementos para desechar</a></li>
									<?php endif; ?>
								</ul>
							</div>
						</li>
					 <?php endif; ?>

                       <?php if($this->session->userdata('rol') == "administrador" || $this->session->userdata('rol') == "super usuario"): ?>
						<!-- administrativo -->
						<li>
							<a href="#subPages1" data-toggle="collapse" class="collapsed"><i class="fa fa-list-alt"></i> <span>Administrativo</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages1" class="collapse ">
								<ul class="nav">
									<li><a href="<?php echo base_url()?>mantenimiento-administrativo" class="">Inventario administrativo</a></li>
									<li><a href="<?php echo base_url()?>get-element" class="">Agregar a inventario</a></li>
									<!--<li><a href="<?php //echo base_url()?>software-administrativo" class="">Editar software</a></li>-->

								</ul>
							</div>
						</li>
					<?php endif; ?>
						


					<!-- laboratorios -->
						<?php if($this->session->userdata('rol') == "laboratorio" || $this->session->userdata('rol') == "super usuario"): ?>
						<li>
							<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="fa fa-desktop"></i> <span>Laboratorios</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages2" class="collapse ">
								<ul class="nav">
									<!--<li><a href="<?php //echo base_url()?>add-buy-lab" class="">Agrega compra PC</a></li>-->
									<!--<li><a href="<?php //echo base_url()?>add-PC-laboratorios-buy" class="">Agrega PC con compra</a></li>-->
									<li><a href="<?php echo base_url()?>add-PC-laboratorios" class="">Agrega PC sin compra</a></li>
									<li><a href="<?php echo base_url()?>prestamos" class="">Prestamos</a></li>
								</ul>

								<ul class="nav">
									<li><a href="<?php echo base_url('equipos/'.$id='lab-01');?>" class="">Laboratorio 1</a></li>
									<li><a href="<?php echo base_url('equipos/'.$id='lab-02');?>" class="">Laboratorio 2</a></li>
									<li><a href="<?php echo base_url('equipos/'.$id='lab-03');?>" class="">Laboratorio 3</a></li>
									<li><a href="<?php echo base_url('equipos/'.$id='lab-04');?>" class="">Laboratorio 4</a></li>
									<li><a href="<?php echo base_url('equipos/'.$id='lab-05');?>" class="">Laboratorio 5</a></li>
									<li><a href="<?php echo base_url('equipos/'.$id='lab-HW');?>" class="">Laboratorio HW</a></li>
									<li><a href="<?php echo base_url('equipos/'.$id='lab-red');?>" class="">Laboratorio de red</a></li>
									<li><a href="<?php echo base_url()?>Devoluciones-list" class="">Devoluciones</a></li>
								</ul>


							</div>
						</li>
					<?php endif; ?>
					

					

					<!-- MOVIMIENTOS-->
					 <?php if($this->session->userdata('rol') != "root"): ?>
						<li>
							<a href="#subPages4" data-toggle="collapse" class="collapsed"><i class="fa fa-paper-plane"></i> <span>Movimientos</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages4" class="collapse ">
								<ul class="nav">
									<li><a href="<?php echo base_url('movimientos') ?>">Control de movimientos</a></li>
									<li><a href="<?php echo base_url('formulario-movimientos') ?>">Crea un movimiento</a></li>
									
								</ul>

							</div>
						</li>
					<?php endif; ?>



                   <!--Edicion de hardware-->
                   <?php if($this->session->userdata('rol') != "root"): ?>
						<li>
							<a href="#subPagesyt" data-toggle="collapse" class="collapsed"><i class="fa fa-laptop" aria-hidden="true"></i> <span>Hardware y más</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPagesyt" class="collapse ">
								<ul class="nav">
									<li><a href="<?php echo base_url('adaptadores-red') ?>">Adaptador de red</a></li>
									<li><a href="<?php echo base_url('adaptadores-video') ?>">Adaptador de video</a></li>
									<li><a href="<?php echo base_url('almacenamiento') ?>">Almacenamiento</a></li>
									<li><a href="<?php echo base_url('sistema') ?>">Descripción de sistema</a></li>
									<li><a href="<?php echo base_url('componentes') ?>">Componentes del hardware</a></li>
								</ul>

							</div>
						</li>
						<!--Edicion de hardware-->
						<?php endif; ?>

                   
                   <!--REPORTERIA-->
                         <?php if($this->session->userdata('rol') != "root"): ?>
						 <li><a href="<?php echo base_url()?>reporteria"><i class="far fa-file-alt"></i> <span>Reporteria</span></a></li>
						 <?php endif; ?>
					<!--REPORTERIA-->
					


					<!--CONSULTAS-->
                          <?php if($this->session->userdata('rol') != "root"): ?>
						 <li>
						 	<a href="#consultas" data-toggle="collapse" class="collapsed"><i class="fa fa-search"></i> <span>Consultas</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
						 	<div id="consultas" class="collapse ">
								<ul class="nav">
									<li><a href="<?php echo base_url('detalle-equipo') ?>">Detalle equipo por codigo</a></li>
									<li><a href="<?php echo base_url('detalle-unidad') ?>">Inventario por unidad y laboratorio</a></li>
									<li><a href="<?php echo base_url('detalle-compras') ?>">Compras por unidad o tipo de producto</a></li>
								</ul>

							</div>
						 </li>
                         <?php endif; ?>
						 <!--CONSULTAS-->


                         <!--AUDIOVISUALES-->
                         <?php if($this->session->userdata('rol') == "administrador" || $this->session->userdata('rol') == "super usuario"): ?>
						 <li>
						 	<a href="#git" data-toggle="collapse" class="collapsed"><i class="fa fa-bars" ></i> <span>Audiovisuales</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
						 	<div id="git" class="collapse ">
								<ul class="nav">
									<li><a href="<?php echo base_url('Audiovisuales-teclados') ?>">Teclado</a></li>
									<li><a href="<?php echo base_url('Audiovisuales-mouses') ?>">Mouse</a></li>
									<li><a href="<?php echo base_url('Audiovisuales-cpus') ?>">CPU</a></li>
								</ul>

							</div>
						 </li>
						<?php endif; ?>
						   <!--AUDIOVISUALES-->


					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->

		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
