<!DOCTYPE html>
<html>
<head>
	<title>sistema</title>
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
         




     <form method="post" action="<?php echo base_url()?>Hardware_Controller/sistema_update">
       	  	<h3>Sistema - <?php echo $data[0]['pc_ids'] ?></h3>
       	  	<div class="col-md-4">
       	  			<table class="table">
					  <tbody>
					    <tr>
					      <td>Codigo:</td>
					      <td><input type="text" name="1" readonly="" class="form-control" value="<?php echo $data[0]['pc_ids'] ?>"></td>
					    </tr>    
					    <tr><td>Sistema operativo:</td>
					      <td><input type="text" name="4" class="form-control" value="<?php echo $data[0]['sistema_operativo'] ?>"></td></tr>
					      <tr>
					      	<td>Versión:</td>
					      <td><input type="text" name="7" class="form-control" value="<?php echo $data[0]['version'] ?>"></td>
					      </tr>
					      <tr>
					    	<td>Dominio:</td>
					      <td><input type="text" name="10" class="form-control" value="<?php echo $data[0]['dominio'] ?>"></td>
					    </tr>
					      <tr>
					    	<td>Organizacion:</td>
					      <td><input type="text" name="13" class="form-control" value="<?php echo $data[0]['organizacion'] ?>"></td>
					    </tr>

					     <tr>
					      	<td>Usuario sesión:</td>
					      <td><input type="text" name="16" class="form-control" value="<?php echo $data[0]['usuario_sesion'] ?>"></td>
					      </tr>

					      
					      
					  </tbody>
					</table>
       	  	</div>


       	  	<div class="col-md-4">
       	  			<table class="table">
					  <tbody>
					    <tr>
					      <td>Nombre:</td>
					      <td><input type="text" name="2" class="form-control" value="<?php echo $data[0]['nombre'] ?>"></td>
					    </tr>
					    <tr>
					      <td>Nucleo:</td>
					      <td><input type="text" name="5" class="form-control" value="<?php echo $data[0]['nucleo'] ?>"></td>
					    </tr>
					    <tr>
					      <td>Usuario registrado:</td>
					      <td><input type="text" name="8" class="form-control" value="<?php echo $data[0]['usuario_registrado'] ?>"></td>
					    </tr>
					    <tr>
					      	<td>Modelo:</td>
					      <td><input type="text" name="11" class="form-control" value="<?php echo $data[0]['modelo'] ?>"></td>
					      </tr>
					       <tr>
					      	<td>Idioma:</td>
					      <td><input type="text" name="14" class="form-control" value="<?php echo $data[0]['idioma'] ?>"></td>
					      </tr>

					       <tr>
					      	<td>Versión DirectX:</td>
					      <td><input type="text" name="17" class="form-control" value="<?php echo $data[0]['version_DirectX'] ?>"></td>
					      </tr>



					  </tbody>
					</table>
       	  	</div>


       	  	<div class="col-md-4">
       	  			<table class="table">
					  <tbody>
					    <tr>
					      <td>Fabricante</td>
					      <td><input type="text" name="3" class="form-control" value="<?php echo $data[0]['fabricante'] ?>"></td>
					    </tr>
					    <tr>
					    	<td>Paquete servicio:</td>
					      <td><input type="text" name="6" class="form-control" value="<?php echo $data[0]['paquete_servicio'] ?>"></td>
					    </tr>
					     <tr>
					      <td>Memoria fisica:</td>
					      <td><input type="text" name="9" class="form-control" value="<?php echo $data[0]['memoria_fisica'] ?>"></td>
					    </tr>
					     <tr>
					      <td>Serie sistema:</td>
					      <td><input type="text" name="12" class="form-control" value="<?php echo $data[0]['serie_des'] ?>"></td>
					    </tr>
					    <tr>
					      <td>Zona horaria:</td>
					      <td><input type="text" name="15" class="form-control" value="<?php echo $data[0]['zona_horaria'] ?>"></td>
					    </tr>

					     <tr>
					      <td>Caja sistema:</td>
					      <td><input type="text" name="18" class="form-control" value="<?php echo $data[0]['caja_sistema'] ?>"></td>
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