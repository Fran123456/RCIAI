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
	</style>
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
                </div>

					<div class="margen">
						<h3>Perfil</h3>
						<hr>
						<div class="row">

							  <div class="col-md-4">
							  		<div class="form-group">
		                            <label  class="control-label">nombre</label>
		                            <input readonly value="<?php echo $this->session->userdata('nombre');?>" class="form-control" type="text"/>
		                       </div>
							  </div>
							  <div class="col-md-4">
							  		<div class="form-group">
		                            <label for="password" class="control-label" >apellido</label>
		                            <input  readonly type="text" value="<?php echo $this->session->userdata('apellido');?>" class="form-control" >
		                           </div>
							  </div>
							<div class="col-md-4">
								<div class="form-group">
		                            <label  class="control-label" >cargo</label>
		                            <input readonly  type="text" value="<?php echo $this->session->userdata('cargo');?>" class="form-control" >
		                           </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-7">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
				                            <label  class="control-label" >correo</label>
				                            <input readonly  type="text" value="<?php echo $this->session->userdata('correo');?>" class="form-control" >
				             </div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
				                            <label  class="control-label" >usuario</label>
				                            <input readonly  type="text" value="<?php echo $this->session->userdata('user');?>" class="form-control" >
				             </div>
									</div>
								</div>


							</div>
							<div class="col-md-5">
								<div class="form-group">
		                            <label  class="control-label" >rol</label>
		                            <input  readonly type="text" value="<?php echo $this->session->userdata('rol');?>" class="form-control" >
		                          </div>
							</div>
						</div>
						<div class="text-center">
								   <a href="<?php echo base_url()?>profile-edit" class="btn btn-danger">Editar</a>
						</div>
					</div>


    <!--FIN CONTENIDO DE LA APLICACION-->
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
