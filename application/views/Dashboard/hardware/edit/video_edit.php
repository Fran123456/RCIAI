<!DOCTYPE html>
<html>
<head>
	<title>adaptador</title>
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
         




     <form method="post" action="<?php echo base_url()?>Hardware_Controller/adaptador_update">
       	  	<h3>Adaptadores de red - <?php echo $data[0]['pc_id'] ?></h3>
       	  	<div class="col-md-4">
       	  			<table class="table">
					  <tbody>
					    <tr>
					      <td>Codigo:</td>
					      <td><input type="text" name="1" readonly="" class="form-control" value="<?php echo $data[0]['pc_id'] ?>"></td>
					    </tr>    
					    <tr><td>Dirección ip:</td>
					      <td><input type="text" name="4" class="form-control" value="<?php echo $data[0]['direccion_ip'] ?>"></td></tr>
					      <tr>
					      	<td>Servidor primario:</td>
					      <td><input type="text" name="7" class="form-control" value="<?php echo $data[0]['servidor_primario'] ?>"></td>
					      </tr>
					      <tr>
					      	<td>Dirección mac:</td>
					      <td><input type="text" name="10" class="form-control" value="<?php echo $data[0]['direccion_mac'] ?>"></td>
					      </tr>
					  </tbody>
					</table>
       	  	</div>


       	  	<div class="col-md-4">
       	  			<table class="table">
					  <tbody>
					    <tr>
					      <td>adaptador 1:</td>
					      <td><input type="text" name="2" class="form-control" value="<?php echo $data[0]['adaptador_1'] ?>"></td>
					    </tr>
					    <tr>
					      <td>Subred ip:</td>
					      <td><input type="text" name="5" class="form-control" value="<?php echo $data[0]['subred_ip'] ?>"></td>
					    </tr>
					    <tr>
					      <td>Servidor DNS:</td>
					      <td><input type="text" name="8" class="form-control" value="<?php echo $data[0]['servidor_dns'] ?>"></td>
					    </tr>
					     <tr>
					      <td>Tarjeta Extra:</td>
					      <td><input type="text" name="11" class="form-control" value="<?php echo $data[0]['tarjeta_extra'] ?>"></td>
					    </tr>
					    
					  </tbody>
					</table>
       	  	</div>


       	  	<div class="col-md-4">
       	  			<table class="table">
					  <tbody>
					    <tr>
					      <td>Tipo adaptador:</td>
					      <td><input type="text" name="3" class="form-control" value="<?php echo $data[0]['tipo_adaptador'] ?>"></td>
					    </tr>
					    <tr>
					    	<td>Gateway:</td>
					      <td><input type="text" name="6" class="form-control" value="<?php echo $data[0]['gateway'] ?>"></td>
					    </tr>
					    <tr>
					    	<td>Servidor dhcp:</td>
					      <td><input type="text" name="9" class="form-control" value="<?php echo $data[0]['servidor_dhcp'] ?>"></td>
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