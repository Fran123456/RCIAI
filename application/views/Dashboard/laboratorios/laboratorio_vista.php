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
			<?php echo $lab; ?>
		</h3>
	</div>
			<?php if(!$registro==false) {?>
    <table id="tabla" class="table table-dark table-hover">
		<thead class="thead-dark">
		   	<tr>
				      <th style="width: 150px" scope="col">Identificador</th>
				      <th style="width: 250px" scope="col">Fecha de ingreso</th>
				      <th style="width: 60px">ver</th>
				      <th style="width: 60px">software</th>
			    	</tr>
		</thead>
	  	<tbody id='showdata'>
	  		<?php foreach ($registro as $key){?>
				<tr>
					<td scope="row"><?php echo $key->identificador_lab; ?></td>
					<td scope="row"><?php echo $key->fecha_ingreso; ?></td>
					<td><a href="<?php echo base_url('detalle-lab/'.$id=$key->identificador_lab);?>" class="btn btn-success item-view" data="<?php echo $key->identificador_lab ?>"><i class="fa fa-eye" aria-hidden="true"></i></a> </td>
					<td><a href="<?php echo base_url('lab_lista_Controller/mostrarSW/'.$id=$key->identificador_lab);?>" id="editar" class="btn btn-primary item-edit" data="<?php echo $key->identificador_lab ?>"><i class="fa fa-tasks" aria-hidden="true"></i></a> </td>
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