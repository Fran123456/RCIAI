<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require 'application/views/Plantilla/Bootstrap.php'; ?> <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LOS ENLACES A ARCHIVOS BOOTSTRAP, JS, FONTS-->
	<style type="text/css">
		.margen{
			margin-left: 100px;
			margin-right: 100px;
			margin-top: 20px;
		}
		.margenUsuario{
			margin-left: 20px;
			margin-right: 20px;
		}
	</style>
  <script src="<?php echo base_url()?>assets/ckeditor_4.10.1_full/ckeditor/ckeditor.js"></script>
</head>
<body>
    <?php require 'application/views/Plantilla/nav.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA LA BARRA DE NAVEGACION-->
    <?php require 'application/views/Plantilla/panel.php'; ?>  <!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL MENU DESPLEGABLE-->

    <!--CONTENIDO DE LA APLICACION-->

                  <div class="margen">
                  	<form method="post" action="<?php echo base_url()?>news-add">
                  		<div class="row">
                  			<div class="col-12">
                  				<div class="form-group">
                  					<label>Título</label>
                  					<input type="text" name="titulo" class="form-control">
                  				</div>
                  			</div>
                  			<div class="col-12">
                  				<div class="form-group">
                  					<label>mensaje</label>
                  					<textarea id="mensaje" rows="20"   class="form-control" name="mensaje"></textarea>
                  				</div>
                  			</div>
                  			<input type="text" hidden value="sin leer" name="estado">
                  		</div>
                  		<div class="text-center">
                  			<button type="submit" class="btn btn-info">Publicar</button>
                  		</div>
                  	</form>
                  </div>

           <script>
                CKEDITOR.replace( 'mensaje' );
            </script>


    <!--FIN CONTENIDO DE LA APLICACION-->
    <?php require 'application/views/Plantilla/footer.php';?><!-- AQUI REQUERIMOS DE EL ARCHIVO QUE NOS PROPORCIONA EL FOOTER-->
</body>
</html>
