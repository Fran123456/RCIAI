<!DOCTYPE html>
<html>
<head>
	<title>Lista de elementos para signar</title>
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

	 <script src="<?php echo base_url()?>assets/package/dist/sweetalert2.all.min.js"></script>
	<script src="<?php echo base_url()?>assets/package/dist/sweetalert2.min.js"></script>
	
	
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->



<?php if($this->session->flashdata('validar')): ?>
<script type="text/javascript">
	 swal({
              type: 'success',
              title: 'El elemento se ha devolvido correctamente',
            });
</script>

<?php endif; ?>

<?php if($this->session->flashdata('validar2')): ?>
<script type="text/javascript">
	 swal({
              type: 'success',
              title: 'El elemento se ha asignado correctamente',
            });
</script>

<?php endif; ?>

	<h3> PRESTAMOS PENDIENTES PARA DEVOLVER </h3>
<!--verificamos si la variable no viene vacia -->
<?php if(count($elementos) > 0) {?>
	<!--Creamos la tabla donde vamos a mostrar nuestros registros de inventario Bodega-->
	<table id="tabla" class="table table-dark table-hover">
		<thead class="thead-dark">
			<tr>
				<td>#</td>
				<th scope="col">Serial</th>
				<th scope="col">destino</th>
				<th scope="col">Devolver</th>
				<th scope="col">Asignar</th>
			</tr>
		</thead>
		<tbody id="showdata">
			<?php for($i = 0; $i<count($elementos); $i++) { ?>
				<tr>
					<td><?php echo $i+1 ?></td>
					<td><?php echo $elementos[$i]['serial'] ?></td>
					<td><?php echo $unidad['destino'][$i][0]['unidad'] ?></td>
					<td><a href="<?php base_url();?>retornar/<?php echo $elementos[$i]['serial']?>" class="btn btn-success item-view"><i class="fa fa-edit" aria-hidden="true"></i></a></td>

					<td><a href="<?php base_url();?>asignar-prestamo/<?php echo $elementos[$i]['serial']?>" class="btn btn-warning item-view"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
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