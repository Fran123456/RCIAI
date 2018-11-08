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
	<h3>Inventario de Bodega</h3>
<?php if($detalle!=false) {?>
	<!--Creamos la tabla donde vamos a mostrar nuestros registros de inventario Bodega-->
	<table id="tabla" class="table table-dark table-hover">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Serial</th>
				<th scope="col">Nombre</th>
				<th scope="col">Fecha de ingreso</th>
				<th scope="col">ver</th>
				<!--<th scope="col">editar</th>
				<th scope="col">eliminar</th>-->
			</tr>
		</thead>
		<tbody id="showdata">
			<?php foreach ($detalle as $key ) { ?>
				<tr>
					<th><?php echo empty($key->serial) ? '<span style= "color:red">no disponible</span>' : $key->serial ?></th>
					<td><?php echo empty($key->nombre) ? '<span style= "color:red">no disponible</span>' : $key->tipo ?></td>
					<td><?php echo empty($key->fecha_ingreso) ? '<span style= "color:red">no disponible</span>' : $key->fecha_ingreso ?></td>
					<td><a href="<?php echo base_url('bodega_Controller/detalle/'.$id=$key->serial);?>"  data='<?php echo $key->serial ?>' class="btn btn-success item-view"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
					<!--<td><a  href="javascript:;"  data='<?php //echo $key->serial ?>' class="btn btn-success item-view"><i class="fa fa-eye" aria-hidden="true"></i></a></td>-->
				<!--	<td><a  href="javascript:;"  data='<?php// echo $key->serial ?>' class="btn btn-info item-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
					<td><a  href="javascript:;"  data='<?php// echo $key->serial ?>' class="btn btn-danger item-delete"><i class="fa fa-trash" aria-hidden="true"></i></a></td>-->
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