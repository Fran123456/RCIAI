<!DOCTYPE html>
<html>
<head>
	<title>Almacenamiento</title>
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
   <script src="<?php echo base_url()?>assets/package/dist/sweetalert2.all.min.js"></script>
	<script src="<?php echo base_url()?>assets/package/dist/sweetalert2.min.js"></script>

	<?php if($this->session->flashdata('yupi')): ?>
   <script type="text/javascript">
   	     swal({
              type: 'success',
              title: 'Edición realizada con exito',
            });
   </script>
<?php endif; ?>
         




     <form method="post" action="<?php echo base_url()?>Hardware_Controller/almacenamiento_update">
       	  	<h3>Almacenamiento - <?php echo $data[0]['pc_id'] ?></h3>
       	  	<div class="col-md-4">
       	  			<table class="table">
					  <tbody>
					    <tr>
					      <td>Codigo:</td>
					      <td><input type="text" name="1" readonly="" class="form-control" value="<?php echo $data[0]['pc_id'] ?>"></td>
					    </tr>    
					    <tr><td>Marca disco:</td>
					      <td><input type="text" name="4" class="form-control" value="<?php echo $data[0]['marca_disco'] ?>"></td></tr>
					      <tr>
					      	<td>Sistema archivos:</td>
					      <td><input type="text" name="7" class="form-control" value="<?php echo $data[0]['sistema_archivos'] ?>"></td>
					      </tr>
					      <tr>
					    	<td>Letra unidad:</td>
					      <td><input type="text" name="10" class="form-control" value="<?php echo $data[0]['letra_unidad'] ?>"></td>
					    </tr>
					      
					  </tbody>
					</table>
       	  	</div>


       	  	<div class="col-md-4">
       	  			<table class="table">
					  <tbody>
					    <tr>
					      <td>Disco fisico:</td>
					      <td><input type="text" name="2" class="form-control" value="<?php echo $data[0]['disco_fisico1'] ?>"></td>
					    </tr>
					    <tr>
					      <td>dvd:</td>
					      <td><input type="text" name="5" class="form-control" value="<?php echo $data[0]['dvd1'] ?>"></td>
					    </tr>
					    <tr>
					      <td>Tamaño:</td>
					      <td><input type="text" name="8" class="form-control" value="<?php echo $data[0]['tamaño'] ?>"></td>
					    </tr>
					
					  </tbody>
					</table>
       	  	</div>


       	  	<div class="col-md-4">
       	  			<table class="table">
					  <tbody>
					    <tr>
					      <td>Capacidad:</td>
					      <td><input type="text" name="3" class="form-control" value="<?php echo $data[0]['capacidad'] ?>"></td>
					    </tr>
					    <tr>
					    	<td>Disco logico:</td>
					      <td><input type="text" name="6" class="form-control" value="<?php echo $data[0]['disco_logico'] ?>"></td>
					    </tr>
					     <tr>
					      <td>Espacio libre:</td>
					      <td><input type="text" name="9" class="form-control" value="<?php echo $data[0]['espacio_libre'] ?>"></td>
					    </tr>
					    
					  </tbody>
					</table>
       	  	</div>

       	  	<div class="col-md-12">
       	  		<hr>
       	  	   <button type="submit" class="btn btn-success">Editar</button>
       	  	</div>
     </form>
	

    <!--FIN CONTENIDO DE LA APLICACION-->

    <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/js/bodega/bodega.js" ></script>
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>