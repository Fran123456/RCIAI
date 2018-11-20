<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jquery.dataTables.min.css">
	<script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js" ></script>
	
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->
	
	<div class="row">
		<h3>Listado de asignaciones</h3>
	</div>

	<div class="row">
		<a class="btn btn-info" href="<?php echo base_url() ?>movimientos">ATRAS</a>
	</div>

	<br>
	<!--verificamos si hay movimientos-->
	<div class="row">
		<?php if($detalle != false) {?>
		<!--Creamos la tabla para mostrar los registros-->
		<table id="tabla" class="table table-dark table-hover">
			<thead class="thead-dark">
				<tr>
					<th>#</th>
					<th>fecha de cambio</th>
					<th>equipo</th>
					<th>ver</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($detalle as $key ) {?>
				<tr>
					<td scope="row"><?php echo $key->id_cambio ?></td>
					<td scope="row"><?php echo $key->fecha_cambio ?></td>
					<td scope="row"><?php echo $key->codigo_id ?></td>
					<td scope="row"> <a href="<?php echo base_url('detalle-asignacion/'.$id=$key->id_cambio);?>" class="btn btn-success item-view" ><i class="fa fa-eye" aria-hidden="true"></i></a> </td>
				</tr>
				<?php } ?>
				
			</tbody>
		</table>
	<?php } else { ?>
		<!--Desplegamos un mensaje que no hay datos-->
		<div>
			<center>
				<h3>SIN REGISTROS EN LA BASE DE DATOS</h3>
			</center>
		</div>
	<?php } ?>
	</div>



    <!--FIN CONTENIDO DE LA APLICACION-->

    
    <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/js/movimientos/movimientos.js" ></script>
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
