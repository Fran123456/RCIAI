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
			PC's, Lapto's y Servidores en Inventario administrativo
		</h3>
	</div>
			<?php if(!$registro==false) {?>
    <table id="tabla" class="table table-dark table-hover">
		<thead class="thead-dark">
		   	<tr>
				      <th style="width: 150px" scope="col">Identificador</th>
				      <th style="width: 250px" scope="col">Fecha de ingreso</th>
				      <th style="width: 60px">software</th>
			    	</tr>
		</thead>
	  	<tbody id='showdata'>
	  		<?php foreach ($registro as $key){?>
				<tr>
					<td scope="row"><?php echo empty($key->identificador) ? '<span style= "color:red">no disponible</span>' : $key->identificador ?></td>
					<td scope="row"><?php echo empty($key->fecha_ingreso) ? '<span style= "color:red">no disponible</span>' : $key->fecha_ingreso ?></td>
					<td><a href="<?php echo base_url('administrativo_Controller/SW/'.$id=$key->identificador);?>" id="editar" class="btn btn-primary item-edit" data="<?php echo $key->identificador ?>"><i class="fa fa-tasks" aria-hidden="true"></i></a> </td>
				</tr>
	  		<?php }?>

	  	</tbody>
	</table>
	<?php } else { ?>
			<center>
			<h3>SIN REGISTROS EN LA BASE DE DATOS</h3>
		</center>
		<?php } ?>

    <!--FIN CONTENIDO DE LA APLICACION-->

	
	<script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/js/laboratorio/laboratorio.js" ></script>
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>