<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
	<!--<script language="javascript" type="text/javascript" src="<?php //echo base_url()?>assets/js/compra.js"></script> -->
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jquery.dataTables.min.css">
	<script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js" ></script>

    <!--CONTENIDO DE LA APLICACION-->
    
	<div class="">
		<div class="margen">
			<div>
				<h3>Compras de servicios registrados</h3>
			</div>
			<?php if(!$compras==false) {?>
			<table id="tabla" class="table table-dark">
				<thead class="thead-dark">
			    	<tr>
				      <th style="width: 250px" scope="col">tipo compra</th>
				      <th style="width: 250px" scope="col">N° factura</th>
				      <th style="width: 250px" scope="col">fecha  de compra</th>
				      <th style="width: 60px">ver</th>
				   <!--  <th style="width: 60px">eliminar</th>-->
			    	</tr>
			  	</thead>
			  	<tbody id='showdata'>
				<?php foreach ($compras as $compras) { ?>
			  		<tr>
						
						<td scope="row"> <?php echo $compras->tipo; ?></td>
						<td scope="row"> <?php echo $compras->n_factura; ?></td>
						<td scope="row"> <?php echo $compras->fecha_compra; ?></td>
						<td><a href="<?php echo base_url('services_C/mostrar/'.$id=$compras->id_compra);?>" class="btn btn-success item-view" data="<?php echo $compras->id_compra ?>"> <i class="fa fa-eye" aria-hidden="true"></i></a> </td>
						<!--<td><a href="javascript:;" class="btn btn-danger item-delete" data="<?php echo $compras->id_compra ?>"><i class="fa fa-trash" aria-hidden="true"></i> </a> </td>-->
					</tr>
				<?php } ?>
			  	</tbody>
			</table>
		<?php } else { ?>
			<div>
				<h4>Sin Datos en la base de datos</h4>
			</div>
		<?php } ?>
			
		</div>
	</div>

	<!--                                   modal view                                        -->

	<div class="modal" id="modalView" tabindex="-1" role="dialog">
	  <div class="modal-dialog modal-lg" id="mdialTamanio" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="viewForm" action="" method="">
	        	<div class="row">
	        		<div class="form-group">
	        			<div class="col-xs-1">
	        				<label >#</label>
    						<input type="text" id="id_compra" name="id_compra" class="form-control" disabled="">
  						</div>
  						<div class="col-xs-3">
  							<label>cantidad</label>
  							<input type="text" id="cantidad" name="cantidad" class="form-control" disabled="">
  						</div>
  						<div class="col-xs-4">
  							<label>Tipo de compra</label>
  							<input type="text" id="tipo" name="tipo" class="form-control" disabled="">
  						</div>
  						<div class="col-xs-4">
  							<label>Detalle</label>
  							<textarea class="form-control" id="detalle" name="detalle" rows="1" disabled=""></textarea>
  						</div>
	        		</div>
	        	</div>
				
	        	<div class="row">
	        		<div class="form-group">
	        			<div class="col-xs-4">
	        				<label>n° factura</label>
	        				<input type="text" id="n_factura" name="n_factura" class="form-control" disabled="">
	        			</div>
	        			<div class="col-xs-4">
	        				<label>Proveedor</label>
	        				<input type="text" id="proveedor" name="proveedor" class="form-control" disabled="">
	        			</div>
	        			<div class="col-xs-4">
	        				<label>Garantia</label>
	        				<input type="text" id="garantia" name="garantia" class="form-control" disabled="">
	        			</div>
	        		</div>
	        	</div>
				<br>
	        	<div class="row">
	        		<div class="form-group">
	        			<div class="col-xs-4">
	        				<label>Fecha autorización</label>
	        				<input type="text" id="f_autorizacion" name="f_autorizacion" class="form-control" disabled="">
	        			</div>
	        			<div class="col-xs-4">
	        				<label>Fecha compra</label>
	        				<input type="text" id="f_compra" name="f_compra" class="form-control" disabled="">
	        			</div>
	        			<div class="col-xs-4">
	        				<label>Total</label>
	        				<input type="text" id="total" name="total" class="form-control" disabled="">
	        			</div>
	        		</div>
	        	</div>
				<br>
	        	<div class="row">
	        		<div class="form-group">
	        			<div class="col-md-5">
	        				<label>Encargado de compra</label>
	        				<input type="text" id="usuario_id" name="usuario_id" class="form-control" disabled="">
	        			</div>
	        			<div class="col-md-7">
	        				<label>Observaciones</label>
	        				<textarea class="form-control" id="observaciones" name="observaciones" rows="1" disabled=""></textarea>
	        			</div>
	        		</div>
	        	</div>
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!--                                                                                 -->


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
					        ¿Seguro quieres eliminar esta compra?
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					        <button id="btnDelete" type="button" class="btn btn-danger">ELIMINAR</button>
					      </div>
					    </div>
					  </div>
					</div>
<!--                                                                                                    -->
<!--
	<script>
		$(function(){

	//showCompras();  

	$('#showdata').on('click','.item-delete',function(){
		var id = $(this).attr('data');
		$('#modalDelete').modal('show');
		$('#btnDelete').unbind().click(function(){
			$.ajax({
				type: 'ajax',
				method: 'post',
				async: false,
				url: '<?php //echo base_url() ?>deleteuser',
				data: {id:id},
				dataType: 'json',
				success: function(response){
					if(response.success){
						$('#modalDelete').modal('hide');
						$('.alert-success').html('Compra eliminado exitosamente').fadeIn().delay(5000).fadeOut('slow');
						showUsers();
					}else{
						alert('ERROR');
					}
				},
				error: function(){
					alert("ERROR ELIMINANDO");
				}
			});
		});
	});

	$('#showdata').on('click','.item-view',function(){
		var id = $(this).attr('data');
		
		$('#modalView').modal('show');
		$('#modalView').find('.modal-title').text('Información de compra');
		$('#viewForm').attr('action','<?php //echo base_url() ?> editcompra');

		$.ajax({
			type: 'ajax',
			method: 'post',
			url: '<?php //echo base_url()?>editcompra',
			data: {id: id},
			async: false,
			dataType: 'json',
			success: function(data){
				$('input[name=id_compra]').val(data.id_compra);
				$('input[name=tipo]').val(data.tipo);
				$('textarea[name=detalle]').val(data.detalle);
				$('input[name=cantidad]').val(data.cantidad);
				$('input[name=proveedor]').val(data.proveedor);
				$('input[name=n_factura]').val(data.n_factura);
				$('input[name=f_autorizacion]').val(data.fecha_autorizacion);
				$('input[name=f_compra]').val(data.fecha_compra);
				$('input[name=garantia]').val(data.garantia);
				$('input[name=total]').val(data.total);
				$('textarea[name=observaciones]').val(data.observaciones);
				$('input[name=usuario_id]').val(data.usuario);


			},
			error: function(){
				alert('No se puede cargar los datos');
			}
		});
	});  

	function showCompras(){
		$.ajax({
			type: 'ajax',
			url: '<?php //echo base_url() ?>showcompras',
			async: false,
			dataType: 'json',
			success: function(data){
				var html='';
				var i;

				for(i=0;i<data.length;i++){
					html +='<tr>'+
								'<td scope="row">'+ data[i].id_compra+ '</td>'+
								'<td scope="row">'+ data[i].tipo+ '</td>'+
								'<td scope="row">'+ data[i].n_factura+ '</td>'+
								'<td scope="row">'+ data[i].fecha_compra+ '</td>'+
								'<td><a href="javascript:;" class="btn btn-success item-view" data="'+data[i].id_compra+'"> <i class="fa fa-eye" aria-hidden="true"></i></a> </td>'+
								'<td><a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id_compra+'"><i class="fa fa-trash" aria-hidden="true"></i> </a> </td>'
						    '</tr>';
									}
				$('#showdata').html(html);
			},
			error: function(){
				alert('error');
			}
		});
	}





});
	</script>
				
-->

    <!--FIN CONTENIDO DE LA APLICACION-->
     <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/js/compras/compras.js" ></script>
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>