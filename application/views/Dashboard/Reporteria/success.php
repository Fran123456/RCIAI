<!DOCTYPE html>
<html>
<head>
	<title>404</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->

	<style type="text/css">
		.pad{
			margin-top: 190px;
		}
		.pad2{
			margin-top: 260px;
		}
		body{
			background-color: white;
		}
	</style>
</head>
<body>
    <div class="container">
    	<div class="row">
    		<div class="col-md-1 pad">
    			
    		</div>
    		<div class="col-md-5 pad">
    			<img src="<?php echo base_url()?>assets/Reporteria/404.png">
    		</div>
    		<div class="col-md-5 pad2">
    			<h4>Error no se pudo generar el reporte para los parametros que proporciono. <br>
    			<br>
    			<?php echo $mensaje ?>
    			<br>
    			<br>
    			<a class="btn btn-danger" href="<?php echo base_url()?>reporteria"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a>
    		</div>
    		<div class="col-md-1 pad">
    			
    		</div>

    	</div>
    </div>
</body>
</html>
