<!DOCTYPE html>
<html>
<head>
	<title>Detalle por codigo</title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
    <script src=" <?php echo base_url() ?>assets/js/vue.js">  </script>
	<style type="text/css" media="screen">
		.es{
			padding-right: 40px;
			padding-left: 40px;
			padding-top: 20px;padding-bottom: 20px;
			border: 1px solid gray; 

		}
	</style>
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->
    <div class="panel">
    	<center>
    		<h4>Consulta de equipo por codigo de inventario</h4>
    	</center>
    </div>
    <!--FIN CONTENIDO DE LA APLICACION-->

	 <!--SCRIPTS PARA LOS DESTINOS Y COMPRA-->
	<script src=" <?php echo base_url()?>assets/js/app/shopping.js "></script>
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>