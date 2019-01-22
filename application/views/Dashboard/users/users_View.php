<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jquery.dataTables.min.css">
	<script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js" ></script>
	
	<style type="text/css">
		.margen{
			margin-left: 20px;
			margin-right: 20px;
			margin-top: 20px;
		}
		.margenUsuario{
			margin-left: 20px;
			margin-right: 20px;
		}
	</style>
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->
    
	<div class="">
		<div class="margen">
			<div class="alert alert-success" style="display: none;">

			</div>
			<button id="btnAdd" class="btn btn-success">Nuevo</button>
			<br><br>
			<table id="tabla" class="table table-dark table-hover">
				<thead class="thead-dark">
			    	<tr>
				      <th style="width: 20px" scope="col">#</th>
				      <th style="width: 350px" scope="col">Nombre</th>
				      <th style="width: 350px" scope="col">Rol</th>
				      <th style="width: 60px" scope="col">ver</th>
				      <th style="width: 60px">editar</th>
				      <th style="width: 60px">contraseña</th>
				      <th style="width: 60px">eliminar</th>
			    	</tr>
			  	</thead>
			  	<tbody id='showdata'>

			  	</tbody>
			</table>
		</div>
	</div>







					<!-- Modal guardar-->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel"></h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <form id="myForm" class="" action="" method="">
					        	<input type="hidden" name="id" value="">
										 <div class="row">
										 	<div class="col-md-6">
												<div class="form-group">
	 												<label>Nombre</label>
	 					        	 	 			<input required type="text" class="form-control" name="nombre" id="nombre" value="">
	 					        	 			</div>
										 	</div>
											<div class="col-md-6">
												<div class="form-group">
	 											 	<label>Apellido</label>
	 					        	 	 			<input required type="text" class="form-control" name="apellido" id="apellido" value="">
	 					        	 			</div>
										 	</div>
										 </div>

										 <div class="row">
											<div class="col-md-7">
												<div class="form-group">
 	 											 	<label>Correo electronico</label>
 	 					        	 	 			<input id="email" required type="email" class="form-control" name="email" value="">
 	 					        	   			</div>
											</div>

											<div class="col-md-5">
												<div class="form-group">
 													<label>Cargo</label>
 													<input required type="text" class="form-control" id="cargo" name="cargo" >
 												</div>
											</div>
										 </div>

										 <div class="row">
										 	<div class="col-md-6">
												<div class="form-group">
	 												<label>Usuario</label>
	 					        	 	 			<input required type="text" class="form-control" id="usuario" name="usuario" value="">
	 					        	 			</div>
										 	</div>
											<div class="col-md-6">
												<div class="form-group">
	 												<label>Contraseña</label>
	 					        	 	 			<input required type="password" class="form-control" id="pass"  name="pass" value="">
	 					        	 			</div>
										 	</div>
										 </div>

										 <div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Rol</label>
													
													<select id="rol" name="rol" class="form-control">
														<option value="super usuario">super usuario</option>
														<option value="administrador">administrativo</option>
														<option value="laboratorio">laboratorio</option>
													</select> 
											 	</div>
										 	</div>
										 	<div class="col-md-6">
										 		<div>
										 			<span id="msg">
										 				
										 			</span>
										 		</div>
										 	</div>
										 </div>
					        </form>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					        <button id="btnSave" type="button" class="btn btn-primary">Guardar</button>
					      </div>
					    </div>
					  </div>
					</div>


<!--                                        Modal editar                                               -->
					<div class="modal fade" id="modalEdith" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel"></h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <form id="editForm" class="" action="<?php echo base_url() ?>updateuser" method="post">
					        	<input type="hidden" id="id" name="id" value="">
										 <div class="row">
										 	<div class="col-md-6">
												<div class="form-group">
	 												<label>Nombre</label>
	 					        	 	 			<input required type="text" class="form-control" name="editnombre" id="editnombre" value="">
	 					        	 			</div>
										 	</div>
											<div class="col-md-6">
												<div class="form-group">
	 											 	<label>Apellido</label>
	 					        	 	 			<input required type="text" class="form-control" name="editapellido" id="editapellido" value="">
	 					        	 			</div>
										 	</div>
										 </div>

										 <div class="row">
											<div class="col-md-7">
												<div class="form-group">
 	 											 	<label>Correo electronico</label>
 	 					        	 	 			<input id="editemail" required type="email" class="form-control" name="editemail" value="">
 	 					        	   			</div>
											</div>

											<div class="col-md-5">
												<div class="form-group">
 													<label>Cargo</label>
 													<input required type="text" class="form-control" name="editcargo" id="editcargo" value="">
 												</div>
											</div>
										 </div>

										 <div class="row">
										 	<div class="col-md-6">
												<div class="form-group">
	 												<label>Usuario</label>
	 					        	 	 			<input required type="text" class="form-control" id="editusuario" name="editusuario" value="">
	 					        	 			</div>
										 	</div>
											<div class="col-md-6">
												<div class="form-group">
	 					        	 	 			<label>Rol</label>
													
													<select id="editrol" name="editrol" class="form-control">
														<option value="super usuario">super usuario</option>
														<option value="administrador">administrativo</option>
														<option value="laboratorio">laboratorio</option>
													</select> 
	 					        	 			</div>
										 	</div>
										 </div>
					        </form>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					        <button id="btnUpdate" type="button" class="btn btn-primary">Actualizar</button>
					      </div>
					    </div>
					  </div>
					</div>





<!--                                                                                                    -->


<!--                                        Modal eliminar                                               -->
					<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Confirmar Eliminación</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        ¿Seguro quieres eliminar este usuario?
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					        <button id="btnDelete" type="button" class="btn btn-danger">ELIMINAR</button>
					      </div>
					    </div>
					  </div>
					</div>
<!--                                                                                                    -->


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
					        				<input type="hidden" id="identificador" name="identificador">
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
<!--                                                                                                    -->

<!--                                        Modal ver                                               -->
					<div class="modal fade" id="modalView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel"></h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <form id="viewForm" class="" action="<?php echo base_url() ?>updateuser" method="post">
					        	<input type="hidden" id="id" name="id" value="">
										 <div class="row">
										 	<div class="col-md-6">
												<div class="form-group">
	 												<label>Nombre</label>
	 					        	 	 			<input required type="text" class="form-control" name="viewnombre" id="viewnombre" value="" readonly="readonly">
	 					        	 			</div>
										 	</div>
											<div class="col-md-6">
												<div class="form-group">
	 											 	<label>Apellido</label>
	 					        	 	 			<input required type="text" class="form-control" name="viewapellido" id="viewapellido" value="" readonly="readonly">
	 					        	 			</div>
										 	</div>
										 </div>

										 <div class="row">
											<div class="col-md-7">
												<div class="form-group">
 	 											 	<label>Correo electronico</label>
 	 					        	 	 			<input id="viewemail" required type="email" class="form-control" name="viewemail" value="" readonly="readonly">
 	 					        	   			</div>
											</div>

											<div class="col-md-5">
												<div class="form-group">
 													<label>Cargo</label>
 													<input required type="text" class="form-control" name="viewcargo" id="viewcargo" value="" readonly="readonly">
 												</div>
											</div>
										 </div>

										 <div class="row">
										 	<div class="col-md-6">
												<div class="form-group">
	 												<label>Usuario</label>
	 					        	 	 			<input required type="text" class="form-control" id="viewusuario" name="viewusuario" value="" readonly="readonly">
	 					        	 			</div>
										 	</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Rol</label>
													
													<input id="viewrol" name="viewrol" class="form-control" readonly="readonly"> 
											 	</div>
										 	</div>
										 </div>
					        </form>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					      </div>
					    </div>
					  </div>
					</div>





<!--                                                                                                    -->





<!--                                                                                                     -->
				<script>

					var caract = /^([a-zA-Z0-9_\.\-])+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;

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

					$(function(){
						showUsers();

						
						$('#btnAdd').click(function(){
							$('#myModal').modal('show');
							$('#myModal').find('.modal-title').text('Agregar nuevo usuario');
							$('myForm').attr('action','<?php echo base_url() ?>adduser')
						});

						$('#cambiar').click(function(){
							//$('#editpass').prop('readonly','false');
							//$('#editpass').val("");
							$('#modalChange').modal('show');
							$('#modalChange').find('.modal-title').text('Cambiar contraseña');
						});

						

						

						$('#btnSave').click(function(){

							var data = $('#myForm').serialize();



							var varNombre = $('input[name=nombre]');
							var varApellido = $('input[name=apellido]');
							var varEmail = $('input[name=email]');
							var varCargo = $('input[name=cargo]');
							var varUsuario = $('input[name=usuario]');
							var varContraseña = $('input[name=pass]');
							var varRol = $('select[name=rol]');

							var result = 0;

							


							if(varNombre.val()==''){
								varNombre.parent().parent().addClass('has-error');

							}else{
								varNombre.parent().parent().removeClass('has-error');
								result+=1;
							}


							if(varApellido.val()==''){
								varApellido.parent().parent().addClass('has-error');
							}else{
								varApellido.parent().parent().removeClass('has-error');
								result+=1;
							}


							if((varEmail.val()=='') || (!(caract.test(varEmail.val())))){
								varEmail.parent().parent().addClass('has-error');
							}else{
								varEmail.parent().parent().removeClass('has-error');
								result+=1;
							}

							if(varCargo.val()==''){
								varCargo.parent().parent().addClass('has-error');
							}else{
								varCargo.parent().parent().removeClass('has-error');
								result+=1;
							}

							if(varUsuario.val()==''){
								varUsuario.parent().parent().addClass('has-error');
							}else{
								varUsuario.parent().parent().removeClass('has-error');
								result+=1;
							}


							if((varContraseña.val()=='') || (varContraseña.val().length < 6)){
								varContraseña.parent().parent().addClass('has-error');
								$('#msg').text('La contraseña debe ser mayor o igual a 6 caracteres');
							}else{
								varContraseña.parent().parent().removeClass('has-error');
								result+=1;
							}


							if(varRol.val()==''){
								varRol.parent().parent().addClass('has-error');
							}else{
								varRol.parent().parent().removeClass('has-error');
								result+=1;
							}

							

							if(result==7){
								$.ajax({
									type: 'ajax',
									method: 'post',
									url: '<?php echo base_url() ?>adduser',
									data: data,
									async: false,
									dataType: 'json',
									success: function(response){
										if(response.success){

											$('#myModal').modal('hide');

											$('#myForm')[0].reset();

											//$('.alert-success').html('Usuario agregado satisfactoriamente').fadeIn().delay(5000).fadeOut('slow');
											swal(
											  'Éxito!',
											  'Usuario agregado!',
											  'success'
											)
											showUsers();
										}else{
											//alert('ERROR USUARIO YA EN USO');
											swal(
											  'Érror!',
											  'Usuario ya en uso!',
											  'warning'
											);
											document.getElementById('usuario').focus();
										}
									},
									error: function(){
										alert('NO SE PUEDE AGREGAR DATOS');
									}
								});
							}
						});

						$('#btnUpdate').click(function(){

							var datos = $('#editForm').serialize();


							var editUsuario = $('input[name=editusuario]');
							var editNombre = $('input[name=editnombre]');
							var editApellido = $('input[name=editapellido]');
							var editEmail = $('input[name=editemail]');
							var editCargo = $('input[name=editcargo]');
							//var editContraseña = $('input[name=editpass]');
							var editRol = $('select[name=editrol]');

							var result = 0;


							if(editUsuario.val()==''){
								editUsuario.parent().parent().addClass('has-error');

							}else{
								editUsuario.parent().parent().removeClass('has-error');
								result+=1;
							}

							if(editNombre.val()==''){
								editNombre.parent().parent().addClass('has-error');

							}else{
								editNombre.parent().parent().removeClass('has-error');
								result+=1;
							}


							if(editApellido.val()==''){
								editApellido.parent().parent().addClass('has-error');
							}else{
								editApellido.parent().parent().removeClass('has-error');
								result+=1;
							}


							if((editEmail.val()=='') || (!(caract.test(editEmail.val())))){
								editEmail.parent().parent().addClass('has-error');
							}else{
								editEmail.parent().parent().removeClass('has-error');
								result+=1;
							}


							if(editCargo.val()==''){
								editCargo.parent().parent().addClass('has-error');
							}else{
								editCargo.parent().parent().removeClass('has-error');
								result+=1;
							}


							/*if(editContraseña.val()==''){
								editContraseña.parent().parent().addClass('has-error');
							}else{
								editContraseña.parent().parent().removeClass('has-error');
								result+=1;
							}*/


							if(editRol.val()==''){
								editRol.parent().parent().addClass('has-error');
							}else{
								editRol.parent().parent().removeClass('has-error');
								result+=1;
							}

							
							if(result==6){
								$.ajax({
									type: 'ajax',
									method: 'post',
									url: '<?php echo base_url() ?>updateuser',
									data: datos,
									async: false,
									dataType: 'json',
									success: function(response){
										if(response.success){
											
											$('#modalEdith').modal('hide');

											$('#editForm')[0].reset();

											//$('.alert-success').html('Usuario actualizado satisfactoriamente').fadeIn().delay(5000).fadeOut('slow');
											swal(
											  'Éxito!',
											  'Usuario actualizado satisfactoriamente!',
											  'success'
											)
											showUsers();
										}else{
											alert('ERROR USUARIO YA EN USO');
											document.getElementById('editusuario').focus();
										}
									},
									error: function(){
										alert('ERROR USUARIO YA EN USO');
											document.getElementById('editusuario').focus();
									}
								});
							}
						});

						//nos mostrara el modal para cambiar la contraseña
						$('#showdata').on('click','.item-pass',function(){
							var id = $(this).attr('data');
							$('#identificador').val(id);
							$('#modalChange').modal('show');
						});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						$('#showdata').on('click','.item-edit',function(){

							var id = $(this).attr('data');

							$('#modalEdith').modal('show');
							$('#modalEdith').find('.modal-title').text('Editar Usuario');


							$('#editForm').attr('action','<?php echo base_url() ?>edituser');

							$.ajax({
								type: 'ajax',
								method: 'post',
								url: '<?php echo base_url() ?>edituser',

								data: {id: id},
								async: false,
								dataType: 'json',
								success: function(data){

									$('input[name=editusuario]').val(data.usuario);
									$('input[name=editnombre]').val(data.nombre);
									$('input[name=editapellido]').val(data.apellido);
									$('input[name=editemail]').val(data.correo);
									$('input[name=editcargo]').val(data.cargo);
									$('input[name=editpass]').val(data.password);
									$('select[name=editrol]').val(data.rol);

									$('input[name=id]').val(data.id_usuario);

									$('#editpass').prop('readonly','true');
								},
								error: function(){
									alert('No se puede editar los datos');
								}
							});
						});


						$('#showdata').on('click','.item-view',function(){

							var id = $(this).attr('data');

							$('#modalView').modal('show');
							$('#modalView').find('.modal-title').text('Información del usuario');


							$('#viewForm').attr('action','<?php echo base_url() ?>edituser');

							$.ajax({
								type: 'ajax',
								method: 'post',
								url: '<?php echo base_url() ?>edituser',

								data: {id: id},
								async: false,
								dataType: 'json',
								success: function(data){

									$('input[name=viewusuario]').val(data.usuario);
									$('input[name=viewnombre]').val(data.nombre);
									$('input[name=viewapellido]').val(data.apellido);
									$('input[name=viewemail]').val(data.correo);
									$('input[name=viewcargo]').val(data.cargo);
									$('input[name=viewpass]').val(data.password);
									$('input[name=viewrol]').val(data.rol);

									$('input[name=id]').val(data.id_usuario);
								},
								error: function(){
									alert('No se puede editar los datos');
								}
							});
						});


						$('#showdata').on('click','.item-delete',function(){
							var id = $(this).attr('data');
							$('#modalDelete').modal('show');
							$('#btnDelete').unbind().click(function(){
								$.ajax({
									type: 'ajax',
									method: 'post',
									async: false,
									url: '<?php echo base_url() ?>deleteuser',
									data: {id:id},
									dataType: 'json',
									success: function(response){
										if(response.success){
											$('#modalDelete').modal('hide');
											//$('.alert-success').html('Usuario eliminado exitosamente').fadeIn().delay(5000).fadeOut('slow');
											swal(
											  'Éxito!',
											  'Usuario eliminado!',
											  'success'
											)
											showUsers();
										}else{
											swal(
											  'Alerta!',
											  'No se pudo eliminar el usuario!',
											  'error'
											)
										}
									},
									error: function(){
										alert("ERROR ELIMINANDO");
									}
								});
							});
						});


						function showUsers(){
							$.ajax({
								type: 'ajax',
								url: '<?php echo base_url() ?>profile_Controller/showUsersAjax',
								async: false,
								dataType: 'json',
								success: function(data){
									var html = '';
									var i;
									var j=1;

									for(i=0;i<data.length;i++){
										html +='<tr>'+
						      						'<th scope="row">'+ j++ + '</th>'+
						      						'<td>'+data[i].nombre + " " +data[i].apellido + '</td>'+
						      						'<td>'+data[i].rol+'</td>'+
						      						'<td><a href="javascript:;" class="btn btn-success item-view" data="'+data[i].id_usuario+'"> <i class="fa fa-eye" aria-hidden="true"></i></a> </td>'+
						      						'<td><a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id_usuario+'"> <i class="fa fa-pencil" aria-hidden="true"></i></a> </td>'+
						      						'<td><a href="javascript:;" class="btn btn-warning item-pass" data="'+data[i].id_usuario+'"> <i class="fa fa-lock" aria-hidden="true"></i></a> </td>'+
						      						'<td><a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id_usuario+'"><i class="fa fa-trash" aria-hidden="true"></i> </a> </td>'
						    					'</tr>';
									}
									$('#showdata').html(html);
								},
								error: function(){
									alert('NO se pudo obtener los datos');
								}
							});
						}


					});
				</script>


    <!--FIN CONTENIDO DE LA APLICACION-->
    <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/js/usuario/usuario.js" ></script>
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
