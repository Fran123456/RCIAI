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
			<div>
				<h3>Compras Fisicas registradas</h3>
			</div>
			
			<?php if(!$compras==false) {?>
			<table  id="tabla" class="table table-dark table-hover table-responsive">
				<thead class="thead-dark">
			    	<tr>
				      
				      <th style="width: 250px" scope="col">Elementos de compra</th>
				      <th style="width: 250px" scope="col">N° factura</th>
				      <th style="width: 250px" scope="col">fecha  de compra</th>
				      <th style="width: 60px">ver</th>
				      <!--<th style="width: 60px">eliminar</th>-->
			    	</tr>
			  	</thead>
			  	<tbody id='showdata'>
				<?php foreach ($compras as $compras) { ?>
			  		<tr>
						<td scope="row"> <?php echo empty($compras->tipo) ? '<span style= "color:red">no disponible</span>' : $compras->tipo ; ?></td>
						<td scope="row"> <?php echo empty($compras->n_factura) ? '<span style= "color:red">no disponible</span>' : $compras->n_factura ; ?></td>
						<td scope="row"> <?php echo empty($compras->fecha_compra) ? '<span style= "color:red">no disponible</span>' : $compras->fecha_compra ; ?></td>
						<td><a href="<?php echo base_url('shopping/mostrar/'.$id=$compras->id_compra);?>" class="btn btn-success item-view" data="<?php echo $compras->id_compra ?>"> <i class="fa fa-eye" aria-hidden="true"></i></a> </td>
						<!--<td><a href="javascript:;" class="btn btn-danger item-delete" data="<?php //echo $compras->id_compra ?>"><i class="fa fa-trash" aria-hidden="true"></i> </a> </td>-->
					</tr>
				<?php } ?>
			  	</tbody>
			</table>
		<?php } else { ?>
			<div>
				<h4>Sin Datos</h4>
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
    						<input type="text" id="id_compra" name="id_compra" class="form-control" readonly="">
  						</div>
  						<div class="col-xs-3">
  							<label>cantidad</label>
  							<input type="text" id="cantidad" name="cantidad" class="form-control" readonly="">
  						</div>
  						<div class="col-xs-4">
  							<label>Tipo de compra</label>
  							<input type="text" id="tipo" name="tipo" class="form-control" readonly="">
  						</div>
  						<div class="col-xs-4">
  							<label>Detalle</label>
  							<textarea class="form-control" id="detalle" name="detalle" rows="1" readonly=""></textarea>
  						</div>
	        		</div>
	        	</div>
				
	        	<div class="row">
	        		<div class="form-group">
	        			<div class="col-xs-4">
	        				<label>n° factura</label>
	        				<input type="text" id="n_factura" name="n_factura" class="form-control" readonly="">
	        			</div>
	        			<div class="col-xs-4">
	        				<label>Proveedor</label>
	        				<input type="text" id="proveedor" name="proveedor" class="form-control" readonly="">
	        			</div>
	        			<div class="col-xs-4">
	        				<label>Garantia</label>
	        				<input type="text" id="garantia" name="garantia" class="form-control" readonly="">
	        			</div>
	        		</div>
	        	</div>
				<br>
	        	<div class="row">
	        		<div class="form-group">
	        			<div class="col-xs-4">
	        				<label>Fecha autorización</label>
	        				<input type="text" id="f_autorizacion" name="f_autorizacion" class="form-control" readonly="">
	        			</div>
	        			<div class="col-xs-4">
	        				<label>Fecha compra</label>
	        				<input type="text" id="f_compra" name="f_compra" class="form-control" readonly="">
	        			</div>
	        			<div class="col-xs-4">
	        				<label>Total</label>
	        				<input type="text" id="total" name="total" class="form-control" readonly="">
	        			</div>
	        		</div>
	        	</div>
				<br>
	        	<div class="row">
	        		<div class="form-group">
	        			<div class="col-md-5">
	        				<label>Encargado de compra</label>
	        				<input type="text" id="usuario_id" name="usuario_id" class="form-control" readonly="">
	        			</div>
	        			<div class="col-md-7">
	        				<label>Observaciones</label>
	        				<textarea class="form-control" id="observaciones" name="observaciones" rows="1" readonly=""></textarea>
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

    <!--FIN CONTENIDO DE LA APLICACION-->
    <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/js/compras/compras.js" ></script>
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>