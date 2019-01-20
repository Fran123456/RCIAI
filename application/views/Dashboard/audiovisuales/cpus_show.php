<!DOCTYPE html>
<html>
<head>
	<title>CPU</title>
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
 <div class="row">
 	 <div class="col-md-12">
  	  <h3>Ver CPU  </h3>
     </div>
<br>
	<form method="post" action="<?php echo base_url() ?>AudioVisualesController/edit_teclado_db">
	     <div class="col-md-4">
	     	<input type="hidden" name="id" value="<?php echo $data[0]['id'] ?>">
	     	<label>Codigo</label>
	     	<input type="text" readonly="" name="codigo" value="<?php echo $data[0]['codigo'] ?>" class="form-control">
	     </div>


	     <div class="col-md-4">
	     	<label>Disco</label>
	     	<input type="text" readonly="" name="disco" value="<?php echo $data[0]['disco'] ?>" class="form-control">
	     </div>

	     <div class="col-md-4">
	     	<label>Capacidad disco</label>
	     	<input type="text" readonly="" name="capacidad_dd" value="<?php echo $data[0]['capacidad_dd'] ?>" class="form-control">
	     </div>

	     <div class="col-md-4">
	     	<label>Memoria Ram</label>
	     	<input type="text" readonly="" name="ram" value="<?php echo $data[0]['ram'] ?>" class="form-control">
	     </div>

	     <div class="col-md-4">
	     	<label>Capacidad memoria Ram</label>
	     	<input type="text" readonly="" name="capacidad_ram" value="<?php echo $data[0]['capacidad_ram'] ?>" class="form-control">
	     </div>

	     <div class="col-md-4">
	     	<label>Procesador</label>
	     	<input type="text" readonly="" name="procesador"  value="<?php echo $data[0]['procesador'] ?>" class="form-control">
	     </div>


	     <div class="col-md-4">
	     	<label>Reloj del procesador</label>
	     	<input type="text" readonly="" name="reloj" value="<?php echo $data[0]['reloj'] ?>" class="form-control">
	     </div>

	     <div class="col-md-4">
	     	<label>Motherboard</label>
	     	<input type="text" readonly="" name="motherboard"  value="<?php echo $data[0]['motherboard'] ?>" class="form-control">
	     </div>

	     <div class="col-md-4">
	     	<label>Modelo motherboard</label>
	     	<input type="text" readonly="" name="modelo_mod" value="<?php echo $data[0]['modelo_mod'] ?>" class="form-control">
	     </div>

	     <div class="col-md-4">
	     	<label>Equipo</label>
	     	<input type="text" readonly="" name="equipo" value="<?php echo $data[0]['equipo'] ?>" class="form-control">
	     </div>

	     <div class="col-md-4">
	     	<label>Sistema operativo</label>
	     	<input type="text" readonly="" name="sistema_operativo" value="<?php echo $data[0]['sistema_operativo'] ?>" class="form-control">
	     </div>
                     
	     <div class="col-md-12">
	     	<br>
	     	<a class="btn btn-info" href="<?php echo base_url()?>Audiovisuales-cpus">Atras</a>
	     </div>
   </form>
</div>
	
    <!--FIN CONTENIDO DE LA APLICACION-->

    <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/js/bodega/bodega.js" ></script>
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>