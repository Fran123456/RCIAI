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
	
	
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->


	<h3> <?php echo $titulo ?> </h3>
<!--verificamos si la variable no viene vacia -->
<?php if($detalle!=false) {?>
	<!--Creamos la tabla donde vamos a mostrar nuestros registros de inventario Bodega-->
	<table id="tabla" class="table table-dark table-hover">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Identificador</th>
				
				<th scope="col">Fecha de ingreso</th>
				<th scope="col">Factura</th>
				<th scope="col">Sustituir Admin</th>
				<th scope="col">Sustituir Lab</th>
			</tr>
		</thead>
		<tbody id="showdata">
			<?php foreach ($detalle as $key ) { ?>
				<tr>
					<th><?php echo empty($key->pc_servidor_id) ? '<span style= "color:red">no disponible</span>' : $key->pc_servidor_id  ?></th>
					<td><?php echo empty($key->fecha_ingreso) ? '<span style= "color:red">no disponible</span>' : $key->fecha_ingreso?></td>
					<td><?php echo empty($key->n_factura) ? '<span style= "color:red">no disponible</span>' : $key->n_factura ?></td>
					<td><a href="<?php base_url();?>validar-cpu/<?php echo $key->serial;?>" class="btn btn-danger item-view"><i class="fa fa-edit" aria-hidden="true"></i></a></td>

					<td><a href="<?php base_url();?>validar-cpu-lab/<?php echo $key->serial;?>" class="btn btn-warning item-view"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
				</tr>
			<?php } ?>
			
		</tbody>
	</table>
	<?php } else {?>
		<center>
			<h3>SIN REGISTROS EN LA BASE DE DATOS</h3>
		</center>
	<?php } ?>




    <!--FIN CONTENIDO DE LA APLICACION-->

    <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/js/bodega/bodega.js" ></script>
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>