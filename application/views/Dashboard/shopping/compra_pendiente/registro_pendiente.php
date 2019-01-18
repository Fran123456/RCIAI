<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jquery.dataTables.min.css">
	<script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js" ></script>
	<style type="text/css" media="screen">
		.content1{
		    margin-top: 20px; 
		    margin-bottom: 20px;
		    margin-right: 20px; 
		    margin-left: 20px;
		}
	</style>
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url()?>assets/css/app/shopping.css ">
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->
    <div>
		<h3>
			Compras Pendientes
		</h3>
	</div>
			<?php if(!$compras==false) {?>
    <table id="tabla" class="table table-dark table-hover">
		<thead class="thead-dark">
		   	<tr>
				      <th style="width: 150px" scope="col">Factura</th>
				      <th style="width: 250px" scope="col">Fecha de autorización</th>
				      <th style="width: 250px" scope="col">Fecha de compra</th>
				      <th style="width: 250px" scope="col">cantidad Total</th>
				      <th style="width: 250px" scope="col">Ingresados</th>
				      <th style="width: 250px" scope="col">Pendientes</th>
			    	</tr>
		</thead>
	  	<tbody id='showdata'>
	  		<?php foreach ($compras as $key){?>
				<tr>
					<td scope="row"><?php echo $key->n_factura; ?></td>
					<td scope="row"><?php echo $key->fecha_autorizacion; ?></td>
					<td scope="row"><?php echo $key->fecha_compra; ?></td>
					<td scope="row"><?php echo $key->cantidad; ?></td>
					<td scope="row"><?php echo $key->rest; ?></td>
					<td scope="row"><?php echo ($key->cantidad - $key->rest); ?></td>
				</tr>
	  		<?php }?>

	  	</tbody>
	</table>
	<?php } else { ?>
			<center>
			<h3>SIN COMPRAS PENDIENTES</h3>
		</center>
		<?php } ?>

    <!--FIN CONTENIDO DE LA APLICACION-->
    <script>
    	$(document).ready(function(){
		$("#tabla").dataTable({
	    	"language": {
	      		"url": "../assets/js/lenguaje.js"
	    	}
	  	}); 
		
	});
    </script>

	
	<!--<script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/js/laboratorio/laboratorio.js" ></script>-->
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>