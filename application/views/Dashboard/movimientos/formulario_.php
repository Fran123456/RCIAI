<!DOCTYPE html>
<html>
<head>
	<title>Formulario de movimientos</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jquery.dataTables.min.css">
	<script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js" ></script>
	
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->
	
	<div class="row text-center">
		<h3>MOVIMIENTO DE HARDWARE INTERNO O DE SOFTWARE</h3>
	</div>

	<br>
	<!--verificamos si hay movimientos-->
	<form class="" method="post" action="<?php echo base_url()?>form_controller/send">
	<div class="row">
       <div class="col-md-3">
       	 <div class="form-group">
       	 	<label>Fecha de retiro:</label>
       	 	<input type="date" class="form-control" name="fecha_retiro">
       	 </div>
       </div>
       <div class="col-md-3">
       	 <div class="form-group">
       	 	<label>Fecha de cambio:</label>
       	 	<input type="date" class="form-control" name="fecha_cambio">
       	 </div>
       </div>

       <div class="col-md-3">
       	 <div class="form-group">
       	 	<label>Codigo</label>
       	 	<input type="text" class="form-control" name="codigo_id">
       	 </div>
       </div>



       <div class="col-md-3">
       	 <div class="form-group">
       	 	<label>Unidad a la que pertenece del elemento a reemplazar</label>
       	 	<select class="form-control" name="unidad_pertenece_id">
       	 		<?php for ($i=0; $i <count($unidades) ; $i++):?>
                   <option value="<?php echo $unidades[$i]['id_unidad'] ?>"><?php echo $unidades[$i]['unidad'] ?></option>
       	 		<?php endfor; ?>
       	 	</select>
       	 </div>
       </div>
    </div>

 <div class="row">
       <div class="col-md-3">
       	 <div class="form-group">
       	 	<label>Unidad de traslado del elemento a reeemplazar</label>
       	 	<select class="form-control" name="unidad_traslado_id">
       	 		<?php for ($i=0; $i <count($unidades) ; $i++):?>
                   <option value="<?php echo $unidades[$i]['id_unidad'] ?>"><?php echo $unidades[$i]['unidad'] ?></option>
       	 		<?php endfor; ?>
       	 	</select>
       	 </div>
       </div>

       <div class="col-md-3">
       	 <div class="form-group">
       	 	<label>Tipo de cambio que sufrio el equipo</label>
       	 	<input type="text" class="form-control" name="cambio">
       	 </div>
       </div>

       <div class="col-md-3">
       	 <div class="form-group">
       	 	<label>Breve descripción porque se hizo el cambio(Daño,obsoleto, etc.) </label>
       	 	<textarea class="form-control" name="descripcion_cambio"></textarea>
       	 </div>
       </div>

       <div class="col-md-3">
       	 <div class="form-group">
       	 	<label>Unidad de origen del elemento que queda en sustitución</label>
       	 	<select class="form-control" name="origen_nuevoEquipo_id">
       	 		<?php for ($i=0; $i <count($unidades) ; $i++):?>
                   <option value="<?php echo $unidades[$i]['id_unidad'] ?>"><?php echo $unidades[$i]['unidad'] ?></option>
       	 		<?php endfor; ?>
       	 	</select>
       	 </div>
       </div>
     </div>



 <div class="row">
       <div class="col-md-3">
       	 <div class="form-group">
       	 	<label>Unidad de destino del elemento que queda en sustitución</label>
       	 	<select class="form-control" name="destino_nuevoEquipo_id">
       	 		<?php for ($i=0; $i <count($unidades) ; $i++):?>
                   <option value="<?php echo $unidades[$i]['id_unidad'] ?>"><?php echo $unidades[$i]['unidad'] ?></option>
       	 		<?php endfor; ?>
       	 	</select>
       	 </div>
       </div>

       <div class="col-md-3">
             <div class="form-group">
                  <label>Breve descripción del equipo retirado </label>
                  <textarea class="form-control" name="descripcion_equipoRetirado"></textarea>
             </div>
       </div>

       <div class="col-md-3">
       	 <div class="form-group">
       	 	<label>Breve descripción del elemento nuevo </label>
       	 	<textarea class="form-control" name="descripcion_equipoNuevo"></textarea>
       	 </div>
       </div>

       <div class="col-md-3">
       	 <div class="form-group">
       	 	<label>Encargado </label>
       	 	<input type="text" class="form-control" name="encargado">
       	 </div>
       </div>


       
</div>

<div class="row">

      <div class="col-md-3">
             <div class="form-group">
                  <label>Tecnico </label>
                  <input type="text" class="form-control" name="tecnico">
             </div>
       </div>


       <div class="col-md-3">
       	 <div class="form-group">
       	 	<label>Tipo de movimiento</label>
       	 	 <select class="form-control" name="tipoHardSoft">

       	 	 	<option value="HARDWARE-INTERNO">HARDWARE INTERNO</option>
       	 	 	<option value="SOFTWARE">SOFTWARE</option>
                        <option value="HARDWARE-EXTERNO">HARDWARE-EXTERNO</option>
       	 	 </select>
       	 </div>
       </div>

       <div class="col-md-3">
       	 <div class="form-group">
       	 	<label>Asignación/Movimiento</label>
       	 	 <select class="form-control" name="tipo_movimiento">
       	 	 	<option value="Asignacion-bodega">ASIGNACIÓN</option>
       	 	 	<option value="Sustitucion-bodega">SUSTITUCIÓN</option>
       	 	 	<option value="Sustitucion-compra">SUSTITUCIÓN COMPRA</option>
       	 	 </select>
       	 </div>
       </div>
	</div>

      <div class="row">
            <div class="col-md-3">
             <div class="form-group">
                  <label>Serial (Elemento nuevo)</label>
                  <input type="text" class="form-control" name="serial_nuevo">
             </div>
       </div>
      </div>

	<button type="submit" class="btn btn-success">Enviar</button>
</form>


    <!--FIN CONTENIDO DE LA APLICACION-->

    
    <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/js/movimientos/movimientos.js" ></script>
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
