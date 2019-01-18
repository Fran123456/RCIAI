<!DOCTYPE html>
<html>
<head>
	<title>Teclados</title>
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
	<script src="<?php echo base_url()?>assets/package/dist/sweetalert2.all.min.js"></script>
	<script src="<?php echo base_url()?>assets/package/dist/sweetalert2.min.js"></script>
	
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->


    <?php if($this->session->flashdata('success')):?>
        <script>
        	swal({
				  type: 'success',
				  title: 'Elemento agregado correctamente',
				})
        </script>
    <?php endif; ?>

     <?php if($this->session->flashdata('delete')):?>
        <script>
        	swal({
				  type: 'success',
				  title: 'Elemento eliminado correctamente',
				})
        </script>
    <?php endif; ?>

       <?php if($this->session->flashdata('edit')):?>
        <script>
        	swal({
				  type: 'success',
				  title: 'Elemento editado correctamente',
				})
        </script>
    <?php endif; ?>

    <!--CONTENIDO DE LA APLICACION-->
 <div class="row">
 	 <div class="col-md-6">
  	<h3> Teclados de audiovisuales </h3>
  </div>
  <div class="col-md-6 text-right">
  	<a href="<?php echo base_url() ?>Audiovisuales-teclados-agregar" class="btn btn-info">Nuevo teclado</a>
  </div>
 </div>
<br> <br>
	
<!--verificamos si la variable no viene vacia -->
<?php if(count($data) >0 ) {?>
	<!--Creamos la tabla donde vamos a mostrar nuestros registros de inventario Bodega-->
	<table id="tabla" class="table table-dark table-hover">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				
				<th scope="col">Codigo</th>
				<th scope="col">Marca</th>
				<th scope="col">Serie</th>
				<th scope="col">Tipo</th>
				<th scope="col">Equipo</th>
					<th scope="col">Editar</th>
						<th scope="col">Eliminar</th>

			</tr>
		</thead>
		<tbody id="showdata">
			<?php for ($i = 0 ; $i < count($data) ; $i++ ) { ?>
				<tr>
					<th><?php echo $i+1 ?></th>
					<td><?php echo empty($data[$i]['codigo']) ? '<span style= "color:red">no disponible</span>' : $data[$i]['codigo']?></td>
					<td><?php echo empty($data[$i]['marca']) ? '<span style= "color:red">no disponible</span>' : $data[$i]['marca'] ?></td>
					<td><?php echo empty($data[$i]['serie']) ? '<span style= "color:red">no disponible</span>' : $data[$i]['serie'] ?></td>
					<td><?php echo empty($data[$i]['tipo']) ? '<span style= "color:red">no disponible</span>' : $data[$i]['tipo'] ?></td>

					<td><?php echo empty($data[$i]['equipo']) ? '<span style= "color:red">no disponible</span>' : $data[$i]['equipo'] ?></td>
					<td><a href="<?php base_url();?>Audiovisuales-teclados-edit/<?php echo $data[$i]['id'];?>" class="btn btn-warning item-view"><i class="fa fa-edit" aria-hidden="true"></i></a></td>

					<td><a href="<?php base_url();?>Audiovisuales-teclados-eliminar/<?php echo $data[$i]['id'];?>" class="btn btn-danger item-view"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
				</tr>
			<?php } ?>
			
		</tbody>
	</table>
	<?php } else {?>
		<center>
			<h3>SIN REGISTROS EN LA BASE DE DATOS</h3>
		</center>
	<?php } ?>




    <!--FIN CONTENIDO DE LA APLICACION-->

    <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/js/bodega/bodega.js" ></script>
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>