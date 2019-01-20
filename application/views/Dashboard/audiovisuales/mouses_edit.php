<!DOCTYPE html>
<html>
<head>
	<title>Mouse</title>
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
  	  <h3> Agrega un elemento:  </h3>
     </div>
<br>
	<form method="post" action="<?php echo base_url() ?>AudioVisualesController/edit_mouse_db">
	     <div class="col-md-4">
	     	<input type="hidden" name="id" value="<?php echo $data[0]['id'] ?>">
	     	<label>Codigo</label>
	     	<input type="text" name="codigo" value="<?php echo $data[0]['codigo'] ?>" class="form-control">
	     </div>

	     <div class="col-md-4">
	     	<label>Marca</label>
	     	<input type="text" value="<?php echo $data[0]['marca'] ?>" name="marca" class="form-control">
	     </div>

	     <div class="col-md-4">
	     	<label>serie</label>
	     	<input type="text" name="serie" value="<?php echo $data[0]['serie'] ?>" class="form-control">
	     </div>

	     <div class="col-md-4">
	     	<label>Tipo</label>
	     	<input type="text" name="tipo" value="<?php echo $data[0]['tipo'] ?>" class="form-control">
	     </div>

	     <div class="col-md-4">
	     	<label>Equipo</label>
	     	<input type="text" name="equipo" value="<?php echo $data[0]['equipo'] ?>" class="form-control">
	     </div>

	     <div class="col-md-4">
	     	<br>
	     	<button type="submit"  class="btn btn-info">Editar</button>
	     </div>
   </form>
</div>
	
    <!--FIN CONTENIDO DE LA APLICACION-->

    <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/js/bodega/bodega.js" ></script>
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>