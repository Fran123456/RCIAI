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

	<ul class="nav nav-pills">
	  <li class="nav-item">
	    <a class="nav-link active" href="<?php echo base_url()?>areas-administrativas">Áreas administrativas</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="<?php echo base_url('listado-elementos/'.$op='general')?>">Listado General</a>
	  </li>
	  
	</ul>

    <div class="row">
    	<h3><?php echo $mensaje; ?></h3>
    </div>
    <div class="row">
    		<a class="btn btn-info" href="<?php echo base_url('listado-elementos/'.$op=$this->uri->segment(2)) ?>">ATRAS</a>
    </div>
    <br>
    <div class="row">
    	<?php if($registro!=false) {?>
	    
	    <table id="tabla" class="table table-dark table-hover">
			<thead class="thead-dark">
			   	<tr>
					      <th style="width: 200px" scope="col">Identificador</th>
					      <th style="width: 250px" scope="col">Encargado</th>
					      <th style="width: 250px" scope="col">Fecha de ingreso</th>
					      <th style="width: 60px">Ver</th>
				    	</tr>
			</thead>
		  	<tbody id='showdata'>
		  		<?php foreach ($registro as $key){?>
					<tr>
						<td scope="row"><?php echo empty($key->identificador) ? '<span style= "color:red">no disponible</span>' : $key->identificador ; ?></td>
						<td scope="row"><?php echo empty($key->encargado_puesto) ? '<span style= "color:red">no disponible</span>' : $key->encargado_puesto ; ?></td>
						<td scope="row"><?php echo empty($key->fecha_ingreso) ? '<span style= "color:red">no disponible</span>' : $key->fecha_ingreso ; ?></td>
				
						
						<td><a href="<?php echo base_url('detalle/'.$id=$key->identificador.'/'.$unidad=$this->uri->segment(2));?>" class="btn btn-success item-view" ><i class="fa fa-eye" aria-hidden="true"></i></a> </td>
					</tr>
		  		<?php }?>

		  	</tbody>
		</table>
		<?php } else {?>
			<center>
				<h3>SIN REGISTROS EN LA BASE DE DATOS</h3>
			</center>
		<?php } ?>
    </div>

    <!--FIN CONTENIDO DE LA APLICACION-->

	
	<script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/js/administrativo/administrativo.js" ></script>
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>