<!DOCTYPE html>
<html>
<head>
	<title>componentes</title>
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
         




     <form method="post" action="<?php echo base_url()?>Hardware_Controller/componentes_update">
       	  	<h3>Componentes del hardware - <?php echo $data[0]['pc_id'] ?></h3>
       	  	<div class="col-md-4">
       	  			<table class="table">
					  <tbody>
					    <tr>
					      <td>Codigo:</td>
					      <td><input type="text" name="1" readonly="" class="form-control" value="<?php echo $data[0]['pc_id'] ?>"></td>
					    </tr>    
					    <tr><td>Fabricante procesador:</td>
					      <td><input type="text" name="4" class="form-control" value="<?php echo $data[0]['fabricante_procesador'] ?>"></td></tr>
					      <tr>
					      	<td>Versión BIOS:</td>
					      <td><input type="text" name="7" class="form-control" value="<?php echo $data[0]['version_BIOS'] ?>"></td>
					      </tr>
					      <tr>
					    	<td>Fabricante placa:</td>
					      <td><input type="text" name="10" class="form-control" value="<?php echo $data[0]['fabricante_placa'] ?>"></td>
					    </tr>
					    <tr>
					    	<td>Marca ram:</td>
					      <td><input type="text" name="13" class="form-control" value="<?php echo $data[0]['marca_ram'] ?>"></td>
					    </tr>
					    <tr>
					    	<td>Ranura sistema 1</td>
					      <td><input type="text" name="16" class="form-control" value="<?php echo $data[0]['ranura_sistema_1'] ?>"></td>
					    </tr>

					      <tr>
					    	<td>Ranura sistema 4</td>
					      <td><input type="text" name="19" class="form-control" value="<?php echo $data[0]['ranura_sistema_4'] ?>"></td>
					    </tr>
					      
					  </tbody>
					</table>
       	  	</div>


       	  	<div class="col-md-4">
       	  			<table class="table">
					  <tbody>
					    <tr>
					      <td>Procesador:</td>
					      <td><input type="text" name="2" class="form-control" value="<?php echo $data[0]['procesador'] ?>"></td>
					    </tr>
					    <tr>
					      <td>Etiqueta BIOS:</td>
					      <td><input type="text" name="5" class="form-control" value="<?php echo $data[0]['etiqueta_BIOS'] ?>"></td>
					    </tr>
					    <tr>
					      <td>Número serie BIOS:</td>
					      <td><input type="text" name="8" class="form-control" value="<?php echo $data[0]['num_serie_BIOS'] ?>"></td>
					    </tr>
					    <tr>
					      	<td>Modelo placa:</td>
					      <td><input type="text" name="11" class="form-control" value="<?php echo $data[0]['modelo_placa'] ?>"></td>
					      </tr>

					      <tr>
					      	<td>Ranura memoria:</td>
					      <td><input type="text" name="14" class="form-control" value="<?php echo $data[0]['ranura_memoria'] ?>"></td>
					      </tr>

					      <tr>
					      	<td>Ranura sistema 2:</td>
					      <td><input type="text" name="17" class="form-control" value="<?php echo $data[0]['ranura_sistema_2'] ?>"></td>
					      </tr>
					  </tbody>
					</table>
       	  	</div>


       	  	<div class="col-md-4">
       	  			<table class="table">
					  <tbody>
					    <tr>
					      <td>Velocidad reloj:</td>
					      <td><input type="text" name="3" class="form-control" value="<?php echo $data[0]['velocidad_reloj'] ?>"></td>
					    </tr>
					    <tr>
					    	<td>Fabricante BIOS:</td>
					      <td><input type="text" name="6" class="form-control" value="<?php echo $data[0]['fabricante_BIOS'] ?>"></td>
					    </tr>
					     <tr>
					      <td>Fecha instalacion BIOS:</td>
					      <td><input type="date" name="9" class="form-control" value="<?php echo $data[0]['fecha_instalacion_BIOS'] ?>"></td>
					    </tr>

					     <tr>
					    	<td>Versión placa:</td>
					      <td><input type="text" name="12" class="form-control" value="<?php echo $data[0]['version_placa'] ?>"></td>
					    </tr>

					    <tr>
					    	<td>ranura sistema 0:</td>
					      <td><input type="text" name="15" class="form-control" value="<?php echo $data[0]['ranura_sistema_0'] ?>"></td>
					    </tr>

					     <tr>
					    	<td>ranura sistema 3:</td>
					      <td><input type="text" name="18" class="form-control" value="<?php echo $data[0]['ranura_sistema_3'] ?>"></td>
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