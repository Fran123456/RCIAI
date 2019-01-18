<!DOCTYPE html>
<html>
<head>
	<title>video</title>
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
         




     <form method="post" action="<?php echo base_url()?>Hardware_Controller/video_update">
       	  	<h3>Adaptadores de video - <?php echo $data[0]['pc_id'] ?></h3>
       	  	<div class="col-md-4">
       	  			<table class="table">
					  <tbody>
					    <tr>
					      <td>Codigo:</td>
					      <td><input type="text" name="1" readonly="" class="form-control" value="<?php echo $data[0]['pc_id'] ?>"></td>
					    </tr>    
					  <!--  <tr><td>Modelo:</td>
					      <td><input type="text" name="4" class="form-control" value="<?php echo $data[0]['modelo'] ?>"></td></tr>
					      <tr>-->
					      	<td>Adaptador ram:</td>
					      <td><input type="text" name="7" class="form-control" value="<?php echo $data[0]['adaptador_ram'] ?>"></td>
					      </tr>
					      <tr>
					    	<td>Resolución de video:</td>
					      <td><input type="text" name="10" class="form-control" value="<?php echo $data[0]['resolucion_video'] ?>"></td>
					    </tr>
					      
					  </tbody>
					</table>
       	  	</div>
<input type="hidden" name="4" class="form-control" value="<?php echo $data[0]['modelo'] ?>">
<input type="hidden" name="2" class="form-control" value="<?php echo $data[0]['monitor_marca'] ?>">
<input type="hidden" name="5" class="form-control" value="<?php echo $data[0]['serie'] ?>">
<input type="hidden" name="3" class="form-control" value="<?php echo $data[0]['tipo'] ?>">

       	  	<div class="col-md-4">
       	  			<table class="table">
					  <tbody>
					    <tr>
					    <!--  <td>Monitor_marca:</td>
					      <td><input type="text" name="2" class="form-control" value="<?php echo $data[0]['monitor_marca'] ?>"></td>
					    </tr>
					    <tr>
					      <td>Serie:</td>
					      <td><input type="text" name="5" class="form-control" value="<?php echo $data[0]['serie'] ?>"></td>
					    </tr>
					    <tr>-->
					      <td>Tipo DAC:</td>
					      <td><input type="text" name="8" class="form-control" value="<?php echo $data[0]['tipo_dac'] ?>"></td>
					    </tr>
					    <tr>
					      	<td>Velocidad:</td>
					      <td><input type="text" name="11" class="form-control" value="<?php echo $data[0]['velocidad'] ?>"></td>
					      </tr>
					  </tbody>
					</table>
       	  	</div>


       	  	<div class="col-md-4">
       	  			<table class="table">
					  <tbody>
					    <tr>
					    <!--  <td>Tipo:</td>
					      <td><input type="text" name="3" class="form-control" value="<?php echo $data[0]['tipo'] ?>"></td>
					    </tr>
					    <tr>-->
					    	<td>Adaptador 1:</td>
					      <td><input type="text" name="6" class="form-control" value="<?php echo $data[0]['adaptador1'] ?>"></td>
					    </tr>
					     <tr>
					      <td>Monitor pc:</td>
					      <td><input type="text" name="9" class="form-control" value="<?php echo $data[0]['monitor_pc1'] ?>"></td>
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