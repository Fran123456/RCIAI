<!DOCTYPE html>
<html>
<head>
	<title>PC laboratorio</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->

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

	<script src="<?php echo base_url()?>assets/package/dist/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url()?>assets/package/dist/sweetalert2.min.js"></script>
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->


     <?php if($this->session->flashdata('buy')):  ?>
        <script type="text/javascript">
          swal({
           type: 'success',
           title: 'ELEMENTO ASIGNADO CORRECTAMENTE',
           });
        </script>
        <?php endif; ?>

	<?php foreach($detalle as $key) {?>
	<div class="content1">
		<!--  Datos iniciales del sistema   -->
		<div class="row">
			<div class="col-md-12">
				<center>
					<h3>Datos Iniciales</h3>
				</center>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label >Identificador</label>
					<input type="text" class="form-control" name="identificador" id='identificador' readonly="" value="<?php echo isset($key->identificador_lab)?$key->identificador_lab : 'disponible'?>">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Fecha de ingreso</label>
					<input type="date" class="form-control" name="fecha_ing" readonly="" value="<?php echo isset($key->fecha_ingreso)?$key->fecha_ingreso : 'no disponible'?>">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label >Origen</label>
					<input type="text" class="form-control" name="nuevo" readonly="" value="<?php echo isset($key->origen[0]['unidad'])?$key->origen[0]['unidad'] : 'no disponible'?>">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Fecha de salida</label>
					<input type="date" class="form-control" name="fecha_s" readonly="" value="<?php echo isset($key->fecha_salida) ? $key->fecha_salida : 'no disponible'?>">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Destino</label>
					<input type="text" name="destino" class="form-control" readonly="" value="<?php echo isset($key->destino[0]['unidad'])?$key->destino[0]['unidad'] : 'no disponible'?>">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Serial del equipo</label>
					<input type="text" name="destino" class="form-control" readonly="" value="<?php echo isset($key->serial)?$key->serial : 'no disponible'?>">
				</div>
			</div>
		</div>

		<!--   Descripción del equipo   -->
		<div class="row">
			<div class="col-md-12">
				<center>
					<h3>Descripción del Sistema</h3>
				</center>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Nombre</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->nombre) ? $key->nombre : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Fabricante</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->fabricante) ? $key->fabricante : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Sistema operativo</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->sistema_operativo) ? $key->sistema_operativo : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Nucleo</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->nucleo) ? $key->nucleo : "no disponible" ?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>Paquete de versión</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->paquete_servicio) ? $key->paquete_servicio : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Versión</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->version) ? $key->version : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Usuario registrado</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->usuario_registrado) ? $key->usuario_registrado : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Memoria física</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->memoria_fisica) ? $key->memoria_fisica : "no disponible" ?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>Dominio/grupo de trabajo</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->dominio) ? $key->dominio : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Modelo</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->modelo) ? $key->modelo : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Número de serie</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->serie_des) ? $key->serie_des : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Organización</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->organizacion) ? $key->organizacion : "no disponible" ?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>Idioma del sistema</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->idioma) ? $key->idioma : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Zona horaria del sistema</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->zona_horaria) ? $key->zona_horaria : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Usuario con sesión abierta</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->usuario_sesion) ? $key->usuario_sesion : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Versión de Direct X</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->version_DirectX) ? $key->version_DirectX : "no disponible" ?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>Caja del sistema</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->caja_sistema) ? $key->caja_sistema : "no disponible" ?>">
				</div>
			</div>
		</div>

		<!-- Información de la placa base -->
		<div class="row">
			<div class="col-md-12">
				<center>
					<h3>
						Placa base
					</h3>
				</center>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Procesador</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->procesador) ? $key->procesador : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Velocidad del reloj (GHZ)</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->velocidad_reloj) ? $key->velocidad_reloj : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Fabricante del procesador</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->fabricante_procesador) ? $key->fabricante_procesador : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Etiqueta de la BIOS</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->etiqueta_BIOS) ? $key->etiqueta_BIOS : "no disponible" ?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>Fabricante de la BIOS</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->fabricante_BIOS) ? $key->fabricante_BIOS : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Versión de la BIOS</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->version_BIOS) ? $key->version_BIOS : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Número de serie de la BIOS</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->num_serie_BIOS) ? $key->num_serie_BIOS : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Fecha de instalación de la BIOS</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->fecha_instalacion_BIOS) ? $key->fecha_instalacion_BIOS : "no disponible" ?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>Fabricante de la placa base</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->fabricante_placa) ? $key->fabricante_placa : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Modelo de la placa base</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->modelo_placa) ? $key->modelo_placa : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Versión de placa base</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->version_placa) ? $key->version_placa : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Marca RAM</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->marca_ram) ? $key->marca_ram : "no disponible" ?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>Ranura de memoria 0</label>
					<textarea class="form-control"  rows="1" readonly="">
						<?php echo isset($key->ranura_memoria) ? ($key->ranura_memoria) : "" ?>
					</textarea>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Ranura de sistema 0</label>
					<textarea class="form-control"  rows="1" readonly="">
						<?php echo isset($key->ranura_sistema_0) ? $key->ranura_sistema_0 : "" ?>
					</textarea>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Ranura de sistema 1</label>
					<textarea class="form-control"  rows="1" readonly="">
						<?php echo isset($key->ranura_sistema_1) ? $key->ranura_sistema_1 : "" ?>
					</textarea>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Ranura de sistema 2</label>
					<textarea class="form-control"  rows="1" readonly="">
						<?php echo isset($key->ranura_sistema_2) ? $key->ranura_sistema_2 : "" ?>
					</textarea>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>Ranura de sistema 3</label>
					<textarea class="form-control"  rows="1" readonly="">
						<?php echo isset($key->ranura_sistema_3) ? $key->ranura_sistema_3 : "" ?>
					</textarea>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Ranura de sistema 4</label>
					<textarea class="form-control"  rows="1" readonly="">
						<?php echo isset($key->ranura_sistema_4) ? $key->ranura_sistema_4 : "" ?>
					</textarea>
				</div>
			</div>
		</div>

		<!-- información sibre el adaptador de red -->
		<div class="row">
			<div class="col-md-12">
				<center>
					<h3>
						Adaptador de red
					</h3>
				</center>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Adaptador de red 1</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->adaptador_1) ? $key->adaptador_1 : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Tipo de adaptador</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->tipo_adaptador) ? $key->tipo_adaptador : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Dirección IP</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->direccion_ip) ? $key->direccion_ip : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Subred IP</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->subred_ip) ? $key->subred_ip : "no disponible" ?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>Gateway IP predeterminado</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->gateway) ? $key->gateway : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Servidor primario WINS</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->servidor_primario) ? $key->servidor_primario : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Servidor DNS</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->servidor_dns) ? $key->servidor_dns : "no disponible" ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Servidor DHCP</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->servidor_dhcp) ? $key->servidor_dhcp : "no disponible" ?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>Dirección MAC</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->direccion_mac) ? $key->direccion_mac : "no disponible" ?>">
				</div>
			</div>
		</div>

		<!-- Información sobre el adaptador de Video-->
		<div class="row">
			<div class="col-md-12">
				<center>
					<h3>Adaptador de video</h3>
				</center>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Adaptador de video</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->adaptador1) ? $key->adaptador1 : "no disponible"?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Ram adaptador</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->adaptador_ram) ? $key->adaptador_ram : "no disponible"?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Tipo DAC</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->tipo_dac) ? $key->tipo_dac : "no disponible"?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Monitor de PC 1 S/N</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->monitor_pc1) ? $key->monitor_pc1 : "no disponible"?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>Resolución de video</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->resolucion_video) ? $key->resolucion_video : "no disponible"?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Velocidad de regeneración</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->velocidad) ? $key->velocidad : "no disponible"?>">
				</div>
			</div>
		</div>

		<!-- Información sobre el almacenamiento -->
		<div class="row">
			<div class="col-md-12">
				<center>
					<h3>Almacenamiento</h3>
				</center>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Disco fisico 1</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->disco_fisico1) ? $key->disco_fisico1 : "no disponible"?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Capacidad</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->capacidad) ? $key->capacidad : "no disponible"?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Disco logico/descripción</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->disco_fisico1) ? $key->disco_fisico1 : "no disponible"?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Sistema de archivos</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->sistema_archivo) ? $key->sistema_archivo : "no disponible"?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>Tamaño</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->tamaño) ? $key->tamaño : "no disponible"?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Espacio libre</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->espacio_libre) ? $key->espacio_libre : "no disponible"?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>DVD 1</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->dvd1) ? $key->dvd1 : "no disponible"?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Letra de unidad</label>
					<input type="text" class="form-control" readonly="" value="<?php echo isset($key->letra_unidad) ? $key->letra_unidad : "no disponible"?>">
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
				<?php if($software != false) {?>
				<div class="form-group">
					<div class="form-tb" >
						<table class="table table-dark table-bordered">
							<thead class="thead-dark">
								<tr>
									<th style="width: 200px" scope="col">Descripción</th>
									<th style="width: 200px" scope="col">Empresa</th>
									<th style="width: 200px" scope="col">Nombre de la carpeta</th>
									<th style="width: 200px" scope="col">Version</th>
									<th style="width: 200px" scope="col">Nombre del archivo</th>
								</tr>
							</thead>
							<tbody>
								<?php for($i=0;$i<count($software);$i++){ ?>
									<tr>
										<td>
											<?php echo $software[$i]['nombre']; ?>
										</td>
										<td>
											<?php echo $software[$i]['empresa']; ?>
										</td>
										<td>
											<?php echo $software[$i]['nom_carpeta']; ?>
										</td>
										<td>
											<?php echo $software[$i]['version']; ?>
										</td>
										<td>
											<?php echo $software[$i]['nom_archivo']; ?>
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

		<!-- información sobre Perifericos agregados en la pc del laboratorio   -->
		<div class="row" >
			<div class="col-md-12">
				<center>
					<h3>Perifericos</h3>
				</center>
			</div>
			<div class="col-md-12">
				<?php if($perifericos != false) {?>
				<div class="form-group">
					<div class="form-tb" >
						<table class="table table-dark table-bordered">
							<thead class="thead-dark">
								<tr>
									<th style="width: 200px" scope="col">Serial</th>
									<th style="width: 200px" scope="col">Tipo</th>
									<th style="width: 200px" scope="col">Tipo de periferico</th>
									<th style="width: 200px" scope="col">Marca</th>
								</tr>
							</thead>
							<tbody>
								<?php for($i=0;$i<count($perifericos);$i++){ ?>
									<tr>
										<td>
											<?php echo $perifericos[$i]['serial']; ?>
										</td>
										<td>
											<?php echo $perifericos[$i]['nombre']; ?>
										</td>
										<td>
											<?php echo $perifericos[$i]['tipo']; ?>
										</td>
										<td>
											<?php echo $perifericos[$i]['marca']; ?>
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
<a class="btn btn-success" href="<?php echo base_url('lab_lista_Controller/redireccionar/'.$lab=$key->identificador_lab)?>">ATRAS</a>

<?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
    <script src=" <?php echo base_url()?>assets/js/administrativo/administrativo.js"></script>
</body>
</html>
