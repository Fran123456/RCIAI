<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->

<script src="<?php echo base_url()?>assets/package/dist/sweetalert2.all.min.js"></script>
	<script src="<?php echo base_url()?>assets/package/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
	<style type="text/css" media="screen">
		.content1{
		    margin-top: 20px; 
		    margin-bottom: 20px;
		    margin-right: 20px; 
		    margin-left: 20px;

		}
		.form-tb{
			-moz-box-shadow: 0px 1px 2px 0 rgba(0, 0, 0, 0.1);
			-webkit-box-shadow: 0px 1px 2px 0 rgba(0, 0, 0, 0.1);
			box-shadow: 0px 1px 2px 0px rgba(0,0,0,0.1);
			-webkit-border-radius: 2px;
			-moz-border-radius: 2px;
			border-radius: 6px;
			border-color: black;
			background-color:  #e5e8e8 ;
			color: black;
		}
	</style>
	<link rel="stylesheet" type="text/css" href=" <?php echo base_url()?>assets/css/app/shopping.css ">
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <?php if($this->session->flashdata('success')): ?>
	<script type="text/javascript">
		swal({
				  type: 'success',
				  title: 'laptop asignada correctamente',
		});
	</script>
<?php endif; ?>

    <!--CONTENIDO DE LA APLICACION-->
<?php if($detalle  != false) {?>
	<?php foreach($detalle as $key) {?>
	<div class="content1">
		<!--  Datos iniciales del sistema   -->
		<div class="row">
			<div class="col-md-12">
				<center>
					<h3>Datos Iniciales</h3>
				</center>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label >Identificador</label>
					<input type="text" class="form-control" id="identificador" id='identificador' readonly="" value="<?php echo  empty($key->identificador) ? 'no disponible' : $key->identificador   ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Encargado del puesto</label>
					<input type="text" class="form-control" id="encargado" readonly="" value="<?php echo  empty($key->encargado_puesto) ? 'no disponible' :$key->encargado_puesto   ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Fecha de ingreso</label>
					<input type="date" class="form-control" id="fecha_ing" readonly="" value="<?php echo  empty($key->fecha_ingreso) ? 'no disponible' : $key->fecha_ingreso?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label >Origen</label>
					<input type="text" class="form-control" id="origen" readonly="" value="<?php echo  empty($key->origen[0]['unidad']) ? 'no disponible' : $key->origen[0]['unidad']   ?>">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>Fecha de salida</label>
					<input type="date" class="form-control" id="fecha_s" readonly="" value="<?php echo  empty($key->fecha_salida) ? 'no disponible' : $key->fecha_salida   ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Destino</label>
					<input type="text" id="destino" class="form-control" readonly="" value="<?php echo  empty($key->destino[0]['unidad']) ? 'no disponible' : $key->destino[0]['unidad']   ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Serial Laptop</label>
					<input type="text" id="destino" class="form-control" readonly="" value="<?php echo  empty($key->serial) ? 'no disponible' : $key->serial   ?>">
				</div>
			</div>
		</div>

		<!--  Información sobre la compra -->
		<div class="row">
			<div class="col-md-12">
				<center>
					<h3>Información de Compra</h3>
				</center>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Fecha de compra</label>
					<input type="text" id="fecha_compra" class="form-control" readonly="" value="<?php echo  empty($key->fecha_compra) ? 'no disponible' : $key->fecha_compra   ?>">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Numero de factura</label>
					<input type="text" id="factura" class="form-control" readonly="" value="<?php echo  empty($key->n_factura) ? 'no disponible' : $key->n_factura   ?>">
				</div>
			</div>
		</div>

		<!--  Descripción del sistema que se encuentra en la tabla descripcion_sistema  -->
		<div class="row">
			<div class="col-md-12">
				<center>
					<h3>Descripción del sistema</h3>
				</center>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Nombre del equipo</label>
					<input type="text" class="form-control" id="nombre_equipo" readonly="" value="<?php echo  empty($key->nombre) ? 'no disponible' : $key->nombre ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Usuario registrado</label>
					<input type="text" class="form-control" id="usuario_registrado" readonly="" value="<?php echo  empty($key->usuario_registrado) ? 'no disponible' : $key->usuario_registrado   ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Dominio</label>
					<input type="text" class="form-control" id="dominio" readonly="" value="<?php echo  empty($key->dominio) ? 'no disponible' : $key->dominio   ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Fabricante</label>
					<input type="text" class="form-control" id="fabricante" readonly="" value="<?php echo  empty($key->fabricante) ? 'no disponible' : $key->fabricante   ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Sistema Operativo</label>
					<input type="text" class="form-control" id="so" readonly="" value="<?php echo  empty($key->sistema_operativo) ? 'no disponible' : $key->sistema_operativo   ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Nucleo</label>
					<input type="text" class="form-control" id="nucleo" readonly="" value="<?php echo  empty($key->nucleo) ? 'no disponible' : $key->nucleo   ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Memoria fisica (GB)</label>
					<input type="text" class="form-control" id="ram" readonly="" value="<?php echo  empty($key->memoria_fisica) ? 'no disponible' : $key->memoria_fisica   ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Numero de serie</label>
					<input type="text" class="form-control" id="serie_des" readonly="" value="<?php echo  empty($key->serie_des) ? 'no disponible' : $key->serie_des   ?>">
				</div>
			</div>
			
		</div>

		<!--  Información del Procesador que esta en la tabla placa_base  -->
		<div class="row">
			<div class="col-md-12">
				<center>
					<h3>Descripción del hardware y adaptadores</h3>
				</center>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Procesador</label>
					<input type="text" class="form-control" id="procesador" readonly="" value="<?php echo  empty($key->procesador) ? 'no disponible' : $key->procesador   ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Velocidad de reloj (GHZ)</label>
					<input type="text" class="form-control" id="velocidad_reloj" readonly="" value="<?php echo  empty($key->velocidad_reloj) ? 'no disponible' : $key->velocidad_reloj   ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Fabricante Procesador</label>
					<input type="text" class="form-control" id="fabricante_procesador" readonly="" value="<?php echo  empty($key->fabricante_procesador) ? 'no disponible' : $key->fabricante_procesador   ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Modelo de la Motherboard</label>
					<input type="text" class="form-control" id="modelo_base" readonly="" value="<?php echo  empty($key->modelo_placa) ? 'no disponible' : $key->modelo_placa   ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Marca RAM</label>
					<input type="text" class="form-control" id="marca_ram" readonly="" value="<?php echo  empty($key->marca_ram) ? 'no disponible' : $key->marca_ram   ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Dirección IP</label>
					<input type="text" class="form-control" id="ip" readonly="" value="<?php echo  empty($key->direccion_ip) ? 'no disponible' : $key->direccion_ip   ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Tarjetas Extra</label>
					<input type="text" class="form-control" id="tarjeta" readonly="" value="<?php echo  empty($key->tarjeta_extra) ? 'no disponible' : $key->tarjeta_extra   ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Marca monitor</label>
					<input type="text" class="form-control" id="monitor" readonly="" value="<?php echo  empty($key->monitor_marca) ? 'no disponible' : $key->monitor_marca   ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Tipo monitor</label>
					<input type="text" class="form-control" id="tipo" readonly="" value="<?php echo  empty($key->tipo) ? 'no disponible' : $key->tipo   ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Tipo monitor</label>
					<input type="text" class="form-control" id="tipo" readonly="" value="<?php echo empty($key->tipo) ? 'no disponible' : $key->tipo  ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Modelo del monitor</label>
					<input type="text" class="form-control" id="modelo" readonly="" value="<?php echo empty($key->modelo) ? 'no disponible' : $key->modelo  ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label >Disco fisico 1</label>
					<input type="text" class="form-control" id="disco_fisico1" readonly="" value="<?php echo  empty($key->disco_fisico1) ? 'no disponible' : $key->disco_fisico1   ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label >Capacidad (GB)</label>
					<input type="text" class="form-control" id="capacidad" readonly="" value="<?php echo  empty($key->capacidad) ? 'no disponible' : $key->capacidad   ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label >Marca disco duro</label>
					<input type="text" class="form-control" id="marca_dd" readonly="" value="<?php echo  empty($key->marca_disco) ? 'no disponible' : $key->marca_disco   ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label >DVD</label>
					<input type="text" class="form-control" id="dvd" readonly="" value="<?php echo  empty($key->dvd1) ? 'no disponible' : $key->dvd1   ?>">
				</div>
			</div>

		</div>

		
		<!--  Información sobre Software instalado que esta en la tabla software  -->
		<div class="row" >
			<div class="col-md-12">
				<center>
					<h3>Software instalado</h3>
				</center>
			</div>
			<div class="col-md-12">
				<?php if($software!=false) {?>
				<div class="form-group">
					<div class="form-tb" >
						<table class="table table-dark table-bordered">
							<thead class="thead-dark">
								<tr>
									<th style="width: 200px" scope="col">Nombre</th>
									<th style="width: 200px" scope="col">Version</th>
								</tr>
							</thead>
							<tbody>
								<?php for($i=0;$i<count($software);$i++){ ?>
									<tr>
										<td>
											<?php echo  empty($software[$i]['nombre']) ? 'no disponible' : $software[$i]['nombre']   ; ?>
										</td>
										<td>
											<?php echo  empty($software[$i]['version']) ? 'no disponible' : $software[$i]['version']   ; ?>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<?php } else {?>
					<center>
						<h3>SIN REGISTROS EN LA BASE DE DATOS</h3>
					</center>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>
<?php } else { ?>
	<center>
		<h3>SIN REGISTROS EN LA BASE DE DATOS</h3>
	</center>
<?php } ?>
<a class="btn btn-success" href="<?php echo base_url('listado/'.$op=$unidad.'/'.$origen=$equipo)?>">ATRAS</a>
<?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
    <script src=" <?php echo base_url()?>assets/js/administrativo/administrativo.js"></script>
</body>
</html>