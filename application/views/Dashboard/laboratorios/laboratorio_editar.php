<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->

	<script src="<?php echo base_url()?>assets/package/dist/sweetalert2.all.min.js"></script>
	<script src="<?php echo base_url()?>assets/package/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/package/dist/sweetalert2.min.css">

	<script>
		$(document).ready(function(){
			verificar();
		})

		function verificar(){
			if($("#verificar").val()==0){
				$("#eliminarTodo").attr("disabled", true);
			}
		}

		//función para abrir el modal y mandarle una información
		function openModalDelete(id){
			$('#DeleteModal').modal('show');
			//$('input[name=valor]').val(id);
			$('#valor').val(id);
		}//fin openModalDelete

		function openModalDeleteTODO(){
			$('#DeleteModalALL').modal('show');
			//$('input[name=valor]').val(id);
			//$('#valor').val(id);
		}

		

		//esta función nos sirve para obtener los datos del software y abrir el modal para poder editar los campos
		function openModalEdit(id){
			$('#ModalEdit').modal('show');
			console.log(id);
			//vamos hacer una petición ajax para poder agregar valores a los input

			$.ajax({
				type: 'post',
				data: 'id='+id,
				url: '<?php echo base_url()?>lab_lista_Controller/editSoftware',
				dataType: 'json',
				success: function(data){
					console.log(data);
					//mandamos los datos al modal para que sean editados
					$('#id').val(data[0]['id']);
					$('#idpc').val(data[0]['PC_lab_id']);
					$('#descripcionE').val(data[0]['nombre']);
					$('#empresaE').val(data[0]['empresa']);
					$('#nom_carpetaE').val(data[0]['nom_carpeta']);
					$('#versionE').val(data[0]['version']);
					$('#nom_archivoE').val(data[0]['nom_archivo']);
				},
				error: function(){
					alert('no');
				}
			})
		}//fin de openMOdalEdit

	</script>




</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->


	<!--  Información sobre Software instalado que esta en la tabla software  -->

	
		<div class="row" >
			<!-- al eliminar un elemento -->
			<?php if($this->session->flashdata('Exitos')): ?>
			<script>
                swal(
				  'Éxito!',
				  'El registro ha sido eliminado!',
				  'success'
				)
            </script>
			<?php endif; ?>
			<!--si hay algun error al eliminar-->
			<?php if($this->session->flashdata('Errors')): ?>
			<script>
                swal(
				  'Atención!',
				  'El registro no ha podido ser eliminado!',
				  'error'
				)
            </script>
			<?php endif; ?>
		<!--                                               -->
			<!-- al guardar un elemento -->
			<?php if($this->session->flashdata('agregado')): ?>
			<script>
                swal(
				  'Éxito!',
				  'El registro ha sido guardado!',
				  'success'
				)
            </script>
			<?php endif; ?>

			<?php if($this->session->flashdata('error2')): ?>
			<script>
                swal(
				  'Atención!',
				  'El registro no ha podido ser eliminado!',
				  'error'
				)
            </script>
			<?php endif; ?>

			<!-- al actualizar un elemento -->
			<?php if($this->session->flashdata('actualizado')): ?>
			<script>
                swal(
				  'Éxito!',
				  'El registro ha sido actualizado!',
				  'success'
				)
            </script>
			<?php endif; ?>

			<?php if($this->session->flashdata('Error_update')): ?>
			<script>
                swal(
				  'Atención!',
				  'El registro no ha podido ser actualizado!',
				  'error'
				)
            </script>
			<?php endif; ?>



			<div class="col-md-12">
				<center>
					<h3>Software instalado</h3>
				</center>
			</div>

			<div class="col-md-12">
				<!-- Button trigger modal para agregar un software-->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd">
				  Agregar software
				</button>
				<button id="eliminarTodo" style="margin-left: 15px" class="btn btn-danger" onclick="openModalDeleteTODO()">
					Eliminar software
				</button>

				<!-- Modal para guardar  -->
				<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        	<h5 class="modal-title" id="exampleModalCenterTitle">Agregar nuevo software</h5>
					        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          		<span aria-hidden="true">&times;</span>
					        	</button>
					      	</div>
					      	<!--Agregamos un formulario para guardar los elementos del software-->
						    <form method="post" action="<?php echo base_url()?>agregar">

						      	<div class="modal-body">
						      		<div class="row">
							      			<div class="form-group">
							      				<div class="col-md-4">
							      				<label for="descripcion">Nombre</label>
							       				<input type="text" id="descripcion" class="form-control" name="descripcion" required="" placeholder="Digitar">
							      			</div>
							      			<div class="col-md-4">
							      				<label for="empresa">Empresa</label>
							       				<input type="text" id="empresa" class="form-control" name="empresa"  placeholder="Digitar">
							      			</div>
							      			<div class="col-md-4">
							      				<label for="nom_carpeta">Nombre de la carpeta</label>
							       				<input type="text" id="nom_carpeta" class="form-control" name="nom_carpeta"  placeholder="Digitar">
							      			</div>
						      			</div>
						      		</div>
						      		<br>
						      		<div class="row">
						      			<div class="col-md-3">
						      				<div class="form-group">
						      					<label for="version">Versión</label>
						       					<input type="text" id="version" class="form-control" name="version"  placeholder="Digitar">
						      				</div>
						      			</div>
						      			<div class="col-md-3">
						      				<label for="nom_archivo">Nombre del archivo</label>
						       				<input type="text" id="nom_archivo" class="form-control" name="nom_archivo"  placeholder="Digitar">
						      			</div>
						      		</div>
							    </div>
						      	<div class="modal-footer">
						        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						        	<button type="submit" class="btn btn-primary">Guardar cambios</button>
						      	</div>
						    </form>
					    </div>
					</div>
				</div>
			</div>

			<!-- fin del model guardar   -->

			<!--  modal alerta eliminar    -->

				<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="ModalLabel">Confirmar eliminación</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <form method="post" action="<?php echo base_url()?>eliminar">
				      <div class="modal-body">
				        ¿Seguro quieres eliminar este registro?

				        	<input id="valor" type="hidden" name="valor">

				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				        <button type="submit" class="btn btn-danger">Eliminar</button>
				      </div>
				      </form>
				    </div>
				  </div>
				</div>


			<!--                             -->


				<!--  modal alerta eliminar TODOS  -->

				<div class="modal fade" id="DeleteModalALL" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="ModalLabel">Confirmar eliminación</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <form method="post" action="<?php echo base_url()?>eliminar_todo">
				      <div class="modal-body">
				        ¿Seguro quieres eliminar TODOS los registros?
						<input type="hidden" name="valor2" value="<?php echo $this->uri->segment(3); ?>">
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				        <button type="submit" class="btn btn-danger">Eliminar</button>
				      </div>
				      </form>
				    </div>
				  </div>
				</div>


			<!--                             -->

			<!-- Modal para Editar  -->
				<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        	<h5 class="modal-title" id="exampleModalCenterTitle">Editar nuevo software</h5>
					        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          		<span aria-hidden="true">&times;</span>
					        	</button>
					      	</div>
					      	<!--Agregamos un formulario para guardar los elementos del software-->
						    <form method="post" action="<?php echo base_url()?>actualizar-software">
								<!--input escondido que tendra el id de la pc-->
								<input type="hidden" id="id" name="id" >
								<input type="hidden" id="idpc" name="idpc" >
						      	<div class="modal-body">
						      		<div class="row">
							      			<div class="form-group">
							      				<div class="col-md-4">
							      				<label for="descripcionE">Nombre</label>
							       				<input type="text" id="descripcionE" class="form-control" name="descripcionE" required="" placeholder="Digitar">
							      			</div>
							      			<div class="col-md-4">
							      				<label for="empresaE">Empresa</label>
							       				<input type="text" id="empresaE" class="form-control" name="empresaE"  placeholder="Digitar">
							      			</div>
							      			<div class="col-md-4">
							      				<label for="nom_carpetaE">Nombre de la carpeta</label>
							       				<input type="text" id="nom_carpetaE" class="form-control" name="nom_carpetaE" required="" placeholder="Digitar">
							      			</div>
						      			</div>
						      		</div>
						      		<br>
						      		<div class="row">
						      			<div class="col-md-3">
						      				<div class="form-group">
						      					<label for="versionE">Versión</label>
						       					<input type="text" id="versionE" class="form-control" name="versionE"  placeholder="Digitar">
						      				</div>
						      			</div>
						      			<div class="col-md-3">
						      				<label for="nom_archivoE">Nombre del archivo</label>
						       				<input type="text" id="nom_archivoE" class="form-control" name="nom_archivoE" required="" placeholder="Digitar">
						      			</div>
						      		</div>
							    </div>
						      	<div class="modal-footer">
						        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						        	<button type="submit" class="btn btn-primary">Guardar cambios</button>
						      	</div>
						    </form>
					    </div>
					</div>
				</div>
			</div>

			<!-- fin del model guardar   -->



			<!---->

			<?php if($software!=false){
				$v=1;
			}else{ $v=0;} ?>
			<input type="hidden" id="verificar" value="<?php echo $v ?>">
			<div class="col-md-12">
				<?php if($software!=false) {?>
				<div class="form-group">
					<div class="table-responsive" >
						<input hidden type="text" name="h" id="h">
						<table id="tabla" class="table table-dark table-hover" >
							<thead class="thead-dark">
								<tr>
									<th></th>
									<th style="width: 200px" scope="col">Nombre del software</th>
									<th style="width: 200px" scope="col">Empresa</th>
									<th style="width: 240px" scope="col">Nombre de la carpeta</th>
									<th style="width: 200px" scope="col">Version</th>
									<th style="width: 200px" scope="col">Nombre del archivo</th>
									<th style="width: 10px" scope="col">Editar</th>
									<th style="width: 10px" scope="col">Eliminar</th>
								</tr>
							</thead>
							<tbody style="cursor:pointer;">
								<?php for($i=0;$i<count($software);$i++){ ?>
									<tr>
										<td>
											<input type="hidden" id="id" name="id" value="<?php echo $software[$i]['id']; ?>">
										</td>
										<td>
											<?php echo empty($software[$i]['nombre']) ? '<span style= "color:red">no disponible</span>' : $software[$i]['nombre']  ; ?>
										</td>
										<td>
											<?php echo empty($software[$i]['empresa']) ? '<span style= "color:red">no disponible</span>' : $software[$i]['empresa']  ; ?>
										</td>
										<td>
											<?php echo empty($software[$i]['nom_carpeta']) ? '<span style= "color:red">no disponible</span>' : $software[$i]['nom_carpeta']  ; ?>
										</td>
										<td>
											<?php echo empty($software[$i]['version']) ? '<span style= "color:red">no disponible</span>' : $software[$i]['version']  ; ?>
										</td>
										<td>
											<?php echo empty($software[$i]['nom_archivo']) ? '<span style= "color:red">no disponible</span>' : $software[$i]['nom_archivo']  ; ?>
										</td>
										<td>
											<button id="openModalE" onclick="openModalEdit(<?php echo $software[$i]['id'] ?>);" type="button" class="btn btn-info" ><i class="fa fa-pencil" aria-hidden="true"></i></button>
										</td>
										<td>
											<button id="openModalD" onclick="openModalDelete(<?php echo $software[$i]['id'] ?>);" type="button" class="btn btn-danger" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<?php } else {?>
					<center>
						<h3>SIN REGISTROS EN LA BASE DE DATOS</h3>
					</center>
				<?php } ?>
			</div>
		</div>

		<a class="btn btn-success" href="<?php echo base_url('lab_lista_Controller/redireccionar/'.$lab=$this->uri->segment(3))?>">ATRAS</a>
    <!--FIN CONTENIDO DE LA APLICACION-->


    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
