<!DOCTYPE html>
<html>
<head>
	<title>Reporteria</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
	
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->
	
	
	<!-- vamos a crear un listado de cada uno de los elementos que tiene o tendria cada área-->
		<h2>Reporteria </h2> 
		<hr>
	<div class="container" >
		<div class="row">

			
			<!--REPORTE 5-->
			<form method="post" action="<?php echo base_url()?>Reporte5_controller/reporte5">
				<div class="col-md-4">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-laptop" aria-hidden="true"></i> Reporte de laptops</h3>
								</div>
								<div class="panel-body text-center">
									<p>Reporte laptop que existen en el inventario</p>
									<div class="row">
										<div class="col-md-8">
											<label>Unidad</label>
											<select name="unidad2" id="unidad2" class="form-control">
										<script type="text/javascript"> $('#unidad2').append('<option value="todo">Todo</option>');</script>

											<?php for ($i=0; $i <count($unidades)-2 ; $i++): ?>
												
												<?php if($unidades[$i]['id_unidad'] != 4 && $unidades[$i]['id_unidad'] != 1 && $unidades[$i]['id_unidad'] != 38): ?>
												            <option value="<?php echo $unidades[$i]['id_unidad'] ?>"><?php echo $unidades[$i]['unidad'] ?></option>
											<?php endif; ?>

											<?php endfor; ?>
											</select>
										</div>
										<div class="col-md-4" style="padding-top: 10px">
											<button type="submit"><img height="50" width="50" src="<?php echo base_url()?>assets/Reporteria/excel.png"></button>
										</div>
										
									</div>
									
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
		 		</form>
			<!--REPORTE 5-->


			<!--REPORTE 6-->
			<form method="post" action="<?php echo base_url()?>Reporte6_controller/reporte6">
				<div class="col-md-4">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-print" aria-hidden="true"></i> Reporte de impresores</h3>
								</div>
								<div class="panel-body text-center">
									<p>Reporte impresores que existen en el inventario</p>
									<div class="row">
										<div class="col-md-8">
											<label>Unidad</label>
											<select name="unidad3" id="unidad3" class="form-control">
										<script type="text/javascript"> $('#unidad3').append('<option value="todo">Todo</option>');</script>

											<?php for ($i=0; $i <count($unidades)-2 ; $i++): ?>
												
												<?php if($unidades[$i]['id_unidad'] != 4 && $unidades[$i]['id_unidad'] != 1 && $unidades[$i]['id_unidad'] != 38): ?>
												            <option value="<?php echo $unidades[$i]['id_unidad'] ?>"><?php echo $unidades[$i]['unidad'] ?></option>
											<?php endif; ?>

											<?php endfor; ?>
											</select>
										</div>
										<div class="col-md-4" style="padding-top: 10px">
											<button type="submit"><img height="50" width="50" src="<?php echo base_url()?>assets/Reporteria/excel.png"></button>
										</div>
										
									</div>
									
									
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
		 		</form>
			<!--REPORTE 6-->


			<!--REPORTE 8-->
				<div class="col-md-4">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-arrows" aria-hidden="true"></i> Reporte de movimientos</h3>
								</div>
								<div class="panel-body text-center">
									<p>Reporte de todos los movimientos y asignaciones por año y por mes</p><br>
									<div class="row">
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalAno">Por año</button>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalMes">Por mes</button>
									</div>
									
									
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
			<!--REPORTE 8-->

             
			<!--REPORTE 11-->
			<form method="post" action="<?php echo base_url()?>Reporte11_controller/reporte11">
				<div class="col-md-4">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-desktop" aria-hidden="true"></i> Reporte general por unidad</h3>
								</div>
								<div class="panel-body text-center">
									<p>Reporte total del inventario es decir como se cierra el año por departamento (PC)</p>
									<div class="row">
										<div class="col-md-8">
											<label>Unidad</label>
											<select name="unidad" id="unidad" class="form-control">
											<?php for ($i=0; $i <count($unidades) ; $i++): ?>
												
												<?php if($unidades[$i]['id_unidad'] != 4 && $unidades[$i]['id_unidad'] != 1 && $unidades[$i]['id_unidad'] != 38): ?>
												            <option value="<?php echo $unidades[$i]['id_unidad'] ?>"><?php echo $unidades[$i]['unidad'] ?></option>
											<?php endif; ?>

											<?php endfor; ?>
											</select>
										</div>
										<div class="col-md-4" style="padding-top: 10px">
											<button type="submit"><img height="50" width="50" src="<?php echo base_url()?>assets/Reporteria/excel.png"></button>
										</div>
										
									</div>
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
		 		 </form>
			<!--REPORTE 11-->
			

			<!--REPORTE 7-->
			<form method="post" action="<?php echo base_url()?>Reporte7_controller/reporte7">
				<div class="col-md-4">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-battery-full" aria-hidden="true"></i> Reporte de UPS unidad</h3>
								</div>
								<div class="panel-body text-center">
									<p>Reporte general de todos los UPS por unidad - administrativo y laboratorios</p>
									<div class="row">
										<div class="col-md-8">
											<label>Unidad</label>
											<select name="unidad4" id="unidad4" class="form-control">
											<?php for ($i=0; $i <count($unidades) ; $i++): ?>
												
												<?php if($unidades[$i]['id_unidad'] != 4 && $unidades[$i]['id_unidad'] != 1 && $unidades[$i]['id_unidad'] != 38): ?>
												            <option value="<?php echo $unidades[$i]['id_unidad'] ?>"><?php echo $unidades[$i]['unidad'] ?></option>
											<?php endif; ?>

											<?php endfor; ?>
											</select>
										</div>
										<div class="col-md-4" style="padding-top: 10px">
											<button type="submit"><img height="50" width="50" src="<?php echo base_url()?>assets/Reporteria/excel.png"></button>
										</div>
										
									</div>
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
		 		 </form>
			<!--REPORTE 7-->
			


		</div>
	</div>


<script type="text/javascript">
	
   $('#unidad').append('<option value="lab-01">LAB-01</option><option value="lab-02">LAB-02</option>'+
   '<option value="lab-03">LAB-03</option><option value="lab-04">LAB-04</option><option value="lab-05">LAB-05</option>'+
   '<option value="lab-red">LAB-RED</option><option value="lab-hw">LAB-HW</option>');


   $('#unidad4').append('<option value="lab-01">LAB-01</option><option value="lab-02">LAB-02</option>'+
   '<option value="lab-03">LAB-03</option><option value="lab-04">LAB-04</option><option value="lab-05">LAB-05</option>'+
   '<option value="lab-red">LAB-RED</option><option value="lab-hw">LAB-HW</option>');



  

</script>


<!--MODAL REPORTE 8-->
	<!-- Button trigger modal -->


<!-- Modal -->
<form method="post" action="<?php echo base_url()?>Reporte8_controller/reporte8_year" >
<div class="modal fade" id="exampleModalAno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Año</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <label>Ingrese un año:</label>
      		<input required="" class="form-control" type="text" name="year">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit"><img height="50" width="50" src="<?php echo base_url()?>assets/Reporteria/excel.png"></button>
      </div>
    </div>
  </div>
</div>
</form>



<form  method="post" action="<?php echo base_url()?>Reporte8_controller/reporte8_mes">
<div class="modal fade" id="exampleModalMes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
           <label>Ingrese fecha</label>          
          <input required="" class="form-control" type="date" name="date">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit"><img height="50" width="50" src="<?php echo base_url()?>assets/Reporteria/excel.png"></button>
      </div>
    </div>
  </div>
</div>
</form>
<!--MODAL REPORTE 8-->





    <!--FIN CONTENIDO DE LA APLICACION-->

    
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
