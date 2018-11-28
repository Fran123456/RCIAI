<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<?php if($this->session->userdata('rol') == "root"): ?>
						        <li><a href="<?php echo base_url()?>dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
								<li><a href="<?php echo base_url() ?>users" class=""><i class="fa fa-user"></i><span>Usuarios</span></a></li>
					   <?php else: ?>
						<li><a href="<?php echo base_url()?>dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<?php if($this->session->userdata('rol') == "super usuario"): ?>
						<li><a href="<?php echo base_url() ?>users" class=""><i class="fa fa-user"></i><span>Usuarios</span></a></li>
						<?php endif; ?>
						<li><a href="<?php echo base_url() ?>notifications"><i class="fa fa-comment"></i><span>Anuncios leidos</span></a></li>
						<!--- REFERENTE A LAS COMPRAS -->
						<?php if($this->session->userdata('rol') == 'administrador' || $this->session->userdata('rol') == 'super usuario' ): ?>
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

									<li><a href="<?php echo base_url()?>Sustituir-periferico-code" class="">Disponibilidad de perifericos con codigo</a></li>
									<li><a href="<?php echo base_url()?>bodega-add" class="">Agregar a bodega</a></li>
									<?php endif; ?>
								</ul>
							</div>
						</li>

						<!-- administrativo -->
						<?php if($this->session->userdata('rol') == 'administrador' || $this->session->userdata('rol') == 'super usuario' ): ?>
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
						<?php if($this->session->userdata('rol') == 'laboratorio' || $this->session->userdata('rol') == 'super usuario' ): ?>
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
								</ul>
							</div>
						</li>
						<?php endif; ?>

					<!-- Inventario de audio visuales  -->
					<?php if($this->session->userdata('rol') == 'administrador' || $this->session->userdata('rol') == 'super usuario' ): ?>

						<!--<li>
							<a href="#subPages3" data-toggle="collapse" class="collapsed"><i class="fa fa-paint-brush"></i> <span>Audio visuales</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages3" class="collapse ">
								<ul class="nav">
									<li><a href="">Mouses</a></li>
									<li><a href="">Teclados</a></li>
									<li><a href="">CPU</a></li>
								</ul>

							</div>
						</li>-->


					<?php endif; ?>
					<!-- fin del inventario audiovisuales-->

					<!-- Notificaciones-->
					
						<li>
							<a href="#subPages4" data-toggle="collapse" class="collapsed"><i class="fa fa-paper-plane"></i> <span>Movimientos</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages4" class="collapse ">
								<ul class="nav">
									<li><a href="<?php echo base_url('movimientos') ?>">Control de movimientos</a></li>
								</ul>

							</div>
						</li>




						<li>
							<a href="#subPagesyt" data-toggle="collapse" class="collapsed"><i class="fa fa-laptop" aria-hidden="true"></i> <span>Hardware</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPagesyt" class="collapse ">
								<ul class="nav">
									<li><a href="<?php echo base_url('Movimientos') ?>">Adaptadores de red</a></li>
								</ul>

							</div>
						</li>



					<!-- fin del Root-->
					<?php endif; ?>

					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->

		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
