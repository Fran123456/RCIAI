<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
	<!--<script language="javascript" type="text/javascript" src="<?php echo base_url()?>assets/js/compra.js"></script> -->
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

    <?php foreach($compras as $compras) {?>
	<form id="viewForm" action="" class="margen" method="">
	        	<div class="row ">
	        		<div class="form-group">
	        			<div class="col-xs-3">
	        				<label >Identificador de compra</label>
    						<input type="text" id="id_compra" name="id_compra" class="form-control" readonly="" value="<?php echo empty($compras->id_compra) ? 'no disponible' : $compras->id_compra ?>">
  						</div>
  						
  						<div class="col-md-4">
  							<label>Tipo de servicio</label>
  							<input type="text" id="tipo" name="tipo" class="form-control" readonly="" value="<?php echo empty($compras->tipo) ? 'no disponible' : $compras->tipo ?>">
  						</div>
  						<div class="col-md-5">
  							<label>Detalle</label>
  							<textarea class="form-control" id="detalle" name="detalle" rows="1" readonly=""><?php echo empty($compras->detalle) ? 'no disponible' : $compras->detalle ?></textarea>
  						</div>
	        		</div>
	        	</div>
				<br>
	        	<div class="row">
	        		<div class="form-group">
	        			<div class="col-md-6">
	        				<label>n° factura</label>
	        				<input type="text" id="n_factura" name="n_factura" class="form-control" readonly="" value="<?php echo empty($compras->n_factura) ? 'no disponible' : $compras->n_factura ?>">
	        			</div>
	        			<div class="col-md-6">
	        				<label>Proveedor</label>
	        				<input type="text" id="proveedor" name="proveedor" class="form-control" readonly="" value="<?php echo empty($compras->proveedor) ? 'no disponible' : $compras->proveedor ?>">
	        			</div>
	        		</div>
	        	</div>
				<br>
	        	<div class="row">
	        		<div class="form-group">
	        			<div class="col-md-4">
	        				<label>Fecha autorización</label>
	        				<input type="text" id="f_autorizacion" name="f_autorizacion" class="form-control" readonly="" value="<?php echo empty($compras->fecha_autorizacion) ? 'no disponible' : $compras->fecha_autorizacion ?>">
	        			</div>
	        			<div class="col-md-4">
	        				<label>Fecha compra</label>
	        				<input type="text" id="f_compra" name="f_compra" class="form-control" readonly="" value="<?php echo empty($compras->fecha_compra) ? 'no disponible' : $compras->fecha_compra ?>">
	        			</div>
	        			<div class="col-md-4">
	        				<label>Total</label>
	        				<input type="text" id="total" name="total" class="form-control" readonly="" value="$<?php echo empty($compras->total) ? 'no disponible' : $compras->total ?>">
	        			</div>
	        		</div>
	        	</div>
				<br>
	        	<div class="row">
	        		<div class="form-group">
	        			<div class="col-md-5">
	        				<label>Encargado de compra</label>
	        				<input type="text" id="usuario_id" name="usuario_id" class="form-control" readonly="" value="<?php echo empty($compras->usuario) ? 'no disponible' : $compras->usuario ?>">
	        			</div>
	        			<div class="col-md-7">
	        				<label>Observaciones</label>
	        				<textarea class="form-control" id="observaciones" name="observaciones" rows="1" readonly=""><?php echo empty($compras->observaciones) ? 'no disponible' : $compras->observaciones ?></textarea>
	        			</div>
	        		</div>
	        	</div>
	        	<br>
	        	<a class="btn btn-success" href="<?php echo base_url()?>pagina/servicio">ATRAS</a>
	        </form>
	    <?php } ?>
	        <br>
	        
<!--FIN CONTENIDO DE LA APLICACION-->
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>