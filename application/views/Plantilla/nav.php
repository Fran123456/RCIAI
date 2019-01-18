<div id="wrapper"> <!--INICIO DEL DIV INICIAL -->
	<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href=""><img src="<?php echo base_url()?>assets/img/usam3.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<span class="badge bg-danger"><?php echo $this->session->userdata('contador') ?></span>
							</a>
							<?php if($this->session->userdata('contador') == 0): ?>
								<ul id="Layer1" style="width:400px; height:65px; overflow: scroll;" class="dropdown-menu notifications">
											<li class="text-center"><h4>No hay notificaciones</h4> <span class="dot bg-warning"></span></li>
								</ul>
							<?php else: ?>
								<ul id="Layer1" style="width:400px; height:515px; overflow: scroll;" class="dropdown-menu notifications">
										<?php foreach($this->session->userdata('notificaciones') as $value): ?>
											<li><a href='<?php echo base_url() ?>notifications/<?php echo $value->id ?>' class="notification-item"><h4><?php echo $value->titulo ?></h4> <span class="dot bg-warning"></span><?php echo $value->fecha ?></a></li>
										<?php endforeach; ?>
								</ul>
							<?php endif; ?>


						</li>
						<li class="dropdown">

             <?php if($this->session->userdata('rol') == "root"): ?>
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>
								 <?php echo $this->session->userdata('nombre') ?>
							 </span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
						 <?php else: ?>
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>
								 <?php echo $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido') ?>
							 </span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
						 <?php endif; ?>



							<ul class="dropdown-menu">
								<?php if($this->session->userdata('rol') == "root"): ?>
									<li><a href="<?php echo base_url()?>login_Controller/logout"><i class="lnr lnr-cog"></i><span>Salir</span></a></li>
								<?php else: ?>
									<li><a href="<?php echo base_url()?>profile"><i class="lnr lnr-user"></i> <span>Mi perfil</span></a></li>
									<li><a href="<?php echo base_url()?>news"><i class="lnr lnr-file-empty"></i> <span>Anuncio</span></a></li>
									<li><a href="<?php echo base_url()?>login_Controller/logout"><i class="lnr lnr-cog"></i><span>Salir</span></a></li>
								<?php endif; ?>


							</ul>
						</li>

					</ul>
				</div>
			</div>
		</nav>
