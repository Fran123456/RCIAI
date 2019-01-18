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
	</style>
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->
        <form method="post" action="<?php echo base_url()?>profile-change">
          <div class="margen">
						<h3>Perfil</h3>
						<hr>
						<div class="row">
							  <div class="col-md-4">
							  		<div class="form-group">
		                            <label  class="control-label">nombre</label>
		                            <input required name="nombre" value="<?php echo $this->session->userdata('nombre');?>" class="form-control" type="text"/>
		                       </div>
							  </div>
							  <div class="col-md-4">
							  		<div class="form-group">
		                            <label for="password" class="control-label" >apellido</label>
		                            <input required  type="text" name="apellido" value="<?php echo $this->session->userdata('apellido');?>" class="form-control" >
		                           </div>
							  </div>
							<div class="col-md-4">
								<div class="form-group">
		                            <label  class="control-label" >cargo</label>
		                            <input required readonly type="text" name="cargo" value="<?php echo $this->session->userdata('cargo');?>" class="form-control" >
		                           </div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-7">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
				                            <label  class="control-label" >correo</label>
				                            <input  required type="text" name="correo" value="<?php echo $this->session->userdata('correo');?>" class="form-control" >
				              </div>
									</div>
									<div class="col-md-6">
									    	<div class="form-group">
				                            <label  class="control-label" >usuario</label>
				                            <input  required type="text" readonly name="user" value="<?php echo $this->session->userdata('user');?>" class="form-control" >
				                </div>
									</div>
								</div>

							</div>
							<div class="col-md-5">
								<div class="form-group">
		                            <label  class="control-label" >rol</label>
		                            <input readonly required name="rol" type="text" value="<?php echo $this->session->userdata('rol');?>" class="form-control" >
		                          </div>
							</div>
						</div>


						<div class="text-center">
						 <button type="subtmit" class="btn btn-danger">Actualizar</button>
						</div>
					</div>
      </form>



    <!--FIN CONTENIDO DE LA APLICACION-->
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
