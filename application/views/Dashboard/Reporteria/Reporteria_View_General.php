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
				<div class="col-md-4">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-laptop" aria-hidden="true"></i> Reporte de laptop</h3>
								</div>
								<div class="panel-body text-center">
									<p>Reporte laptop que existen en el inventario</p>
									<div class="row">
											<a target="_blank" href="<?php echo base_url()?>Reporte5_controller/reporte5"><img height="50" width="50" src="<?php echo base_url()?>assets/Reporteria/excel.png"></a>
									</div>
									
									
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
			<!--REPORTE 5-->


			<!--REPORTE 5-->
				<div class="col-md-4">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-print" aria-hidden="true"></i> Reporte de impresores</h3>
								</div>
								<div class="panel-body text-center">
									<p>Reporte impresores que existen en el inventario</p>
									<div class="row">
											<a target="_blank" href="<?php echo base_url()?>Reporte6_controller/reporte6"><img height="50" width="50" src="<?php echo base_url()?>assets/Reporteria/excel.png"></a>
									</div>
									
									
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
			<!--REPORTE 5-->


			<!--REPORTE 8-->
				<div class="col-md-4">
		         <!-- PANEL HEADLINE -->
						<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-arrows" aria-hidden="true"></i> Reporte de movimientos</h3>
								</div>
								<div class="panel-body text-center">
									<p>Reporte de todos los movimientos y asignaciones por año y por mes</p>
									<div class="row">
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalAno">Por año</button>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalMes">Por mes</button>
									</div>
									
									
								</div>
						</div>
				<!-- END PANEL HEADLINE -->
		 		 </div>
			<!--REPORTE 8-->




		</div>
	</div>




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
      		<input class="form-control" type="text" name="year">
      	
        
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
          <input class="form-control" type="date" name="date">
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
