<!DOCTYPE html>
<html>
<head>
	<title>Perifericos disponibles con codigo</title>
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

	<h3> Perifericos disponibles</h3>
<!--verificamos si la variable no viene vacia -->
<?php if(count($data) > 0) {?>
	<!--Creamos la tabla donde vamos a mostrar nuestros registros de inventario Bodega-->
	<table id="tabla" class="table table-dark table-hover">
		<thead class="thead-dark text-center">
			<tr >
				<th class="text-center" scope="col">Serial</th>
				<th class="text-center" scope="col">Periferico</th>
				<th class="text-center" scope="col">Sustitución-PC</th>
				<th class="text-center" scope="col">Sustitución-Unidad</th>
				<th class="text-center" scope="col">Asignar</th>
			</tr>
		</thead>
		<tbody id="showdata" class="text-center">
			<?php for($i = 0 ; $i<count($data) ; $i++) { ?>
				<tr>
					<th class="text-center"><?php echo empty($data[$i]['serial']) ? '<span style= "color:red">no disponible</span>' :$data[$i]['serial'] ?></th>
					<td><?php echo empty($data[$i]['tipo']) ? '<span style= "color:red">no disponible</span>' : $data[$i]['tipo'] ?></td>
					<td><a href="<?php base_url();?>remove-periferico-code/<?php echo $data[$i]['serial'];?>" class="btn btn-danger item-view"><i class="fa fa-edit" aria-hidden="true"></i></a></td>


                    <td><a href="<?php base_url();?>remove-periferico-code-unidad/<?php echo $data[$i]['serial'];?>" class="btn btn-warning item-view"><i class="fa fa-edit" aria-hidden="true"></i></a></td>

					<td><a href="<?php base_url();?>validar-periferico/<?php echo $data[$i]['serial'];?>" class="btn btn-success item-view"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
					<!--<td><a href="<?php base_url();?>remove-periferico-lab/<?php echo $data[$i]['serial'];?>" class="btn btn-info item-view"><i class="fa fa-edit" aria-hidden="true"></i></a></td>-->
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