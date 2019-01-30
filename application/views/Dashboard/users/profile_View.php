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
						<?php if($this->session->userdata('rol') == "super usuario"): ?>
							<div class="text-rigth">
								<a href="javascript:;" onclick="cambiar_pass()" class="btn btn-danger">Cambiar Contraseña</a>
							</div>
						<?php endif; ?>
					</div>

	<!--                                        Modal cambiar contraseña                                               -->
					<div class="modal fade" id="modalChange" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <form id="changeForm" class="" action="" method="post">
					        	<div class="row">
					        		<div class="col-md-6">
					        			<div class="form-group">
					        				<input type="text" id="identificador" name="identificador" value="<?php echo $this->session->userdata('id') ?>">
											<label>Nueva Contraseña</label>
	 					        	 	 	<input type="text" class="form-control" id="changepass" name="changepass" value="" >
										</div>
					        		</div>
					        	</div>
					        </form>
					      </div>
					      <div class="modal-footer">
					        <button id="btnBack" type="button" class="btn btn-warning" data-dismiss="modal">ATRAS</button>
					        <button id="btnChange" type="button" onclick="cambiar()" class="btn btn-success">CAMBIAR</button>
					      </div>
					    </div>
					  </div>
					</div>

<script>
	function cambiar_pass()
	{
		$('#modalChange').modal();
	}

	//función para cambiar contraseña
	function cambiar(){
		//validamos para ver si esta vacio
		  var id = $('#identificador').val();
		  var pass = $('#changepass').val();
		  var con=0;
		  console.log(pass);
		  if(($('#changepass').val()=='') || ($('#changepass').val().length < 6)){
			$('#changepass').css('border','1px solid red');
		}else{
			con = 1;
		}

		if(con==1){
			//escondemos el modal
			$('#modalChange').modal('hide');
			swal({
			  title: '¿Esta seguro de cambiar la contraseña?',
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Si, cambiar!'
			}).then((result) => {
			  if (result.value) {
			  	$('#modalChange').modal('hide');
			  	//vamos a crear un ajax
			  	$.ajax({
			  		type: 'post',
			  		url: '<?php echo base_url() ?>cambiarpass',
			  		data: {
			  			id: id,
			  			pass: pass
			  		},
			  		dataType: 'json',
			  		success: function(msg){
			  			swal(
					      'Éxito!',
					      'Tu contraseña ha sido cambiada.',
					      'success'
					    );
					    $('#changepass').val('');
			  		},
			  		error: function(){
			  			swal({
						  type: 'error',
						  title: 'Oops...',
						  text: 'Algo salio mal!'
						})
			  		}
			  	});
			    
			  }else{
			  	$('#modalChange').modal('show');
			  }
			})
		}else{
			alert('este campo no puede estar vacio o tener menos de 6 caracteres');
		}
	}//fin de la función cambiar
</script>
    <!--FIN CONTENIDO DE LA APLICACION-->
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
